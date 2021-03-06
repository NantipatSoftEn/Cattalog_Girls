<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\People;
use Validator;

class CattalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /*public $people;
    public function __construct(){
       $this->people = new People;
    }*/

    public function index()
    {

        $people = [];

         // Get Data all
         $people = array_merge($people, People::get()->toArray());

         // Get Data SoftDeletes Only
         $people = array_merge($people ,People::onlyTrashed()->get()->toArray());

        return view('showall' ,compact('people'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        /* Validator */
        $validator = Validator::make($request->all(), [
            'name'       => 'required|string|nullable|max:20',
            'facebook'   => 'required|string|nullable|max:150',
            'rank'       =>  'required|nullable|numeric|max:100',
            'fileToUpload'=> 'required|mimes:jpeg,bmp,png'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $people = new People;
        $people->name = $request->name;
        $people->facebook = $request->facebook;
        $people->rank = $request->rank;




        // dd($request->file('fileToUpload'));
        if (($request->hasFile('fileToUpload'))) {
            //dd($request->file('fileToUpload');
            try {
                $file = $request->file('fileToUpload'); // Name form Upload
                $name = time() . '.' . $file->getClientOriginalExtension(); // Get Extension

                $request->file('fileToUpload')->move("image", $name);
                $people->img = "image/".$name;
            } catch (\Exception $e) {
                dd($e);
            }
        }



        $people->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $people = People::find($id);

        return view('show', compact('people'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $people = People::find($id);
        return view('edit',compact('people'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $people = people::find($id);

        $people->name = $request->name;
        $people->facebook = $request->facebook;
        $people->rank = $request->rank;



        // dd($request->file('fileToUpload'));
        if (($request->hasFile('fileToUpload'))) {
            //dd($request->file('fileToUpload');
            try {
                $file = $request->file('fileToUpload'); // Name form Upload
                $name = time() . '.' . $file->getClientOriginalExtension(); // Get Extension

                $request->file('fileToUpload')->move("image", $name);
                $people->img = "image/".$name;
            } catch (\Exception $e) {
                dd($e);
            }
        }



        $people->save();
        return redirect('all');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Normal Delects
        $people = People::find($id)->delete();

        //SoftDeletes
        // $people= People::withTrashed()
        //         ->where('id', $id)

        return back();
    }
    public function restone_all($id)
    {
        $people = People::onlyTrashed()->where('id', $id)->first();

        // Check count people
        if(!empty($people))
            $people->restore();

        return redirect('all');
    }
    /*public function restone_one($id)
    {
        App\::withTrashed()
        ->where('airline_id', 1)
        ->restore();
    }*/
}
