<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\People;

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
        //dd($this->people->xx());

        $people = People::all();
        //dd($people);
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
        echo "Cheak=".$id;
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
        /*$people = People::find($id);

        return View('')*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $people = People::delete($id);
        // return
    }
}
