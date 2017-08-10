@extends('template')

@section('content')

    <div class="col-md-12">

            <?php
                $head = ['id', 'Name', 'facebook', 'Rank', 'img','E/D'];
                $data = [];

                $people=json_decode( json_encode($people, true));
                //dd($people, json_decode( json_encode($people, true)));

                // $people[1]['id'];
                //
                // $people[1]->id;

                for ($i=0; $i < count($people); $i++) {
                    $data[$i]  = [
                        $people[$i]->id,
                        $people[$i]->name,
                        $people[$i]->facebook,
                        $people[$i]->Rank,
                        $people[$i]->img,
                        $people[$i]->deleted_at];
                }
            ?>


        </table>
    </div>
    <style media="screen">
        div.crop-image {
            width: 100%;
            height: 256px;
            overflow: hidden;
        }
        div.crop-image img {
            position: relative;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            height: 100%;
            width: auto;
        }
    </style>
    <div class="row">
        @for ($i=0; $i < count($data); $i++)
            <div class="col-sm-6 col-md-3">
                <div class="thumbnail">
                    <div class="crop-image">
                         <img border="0" alt="" src="{{ url($data[$i][4]) }}"  style="height:256px;">
                    </div>

                  <div class="caption">
                    <h5><a href="{{ url($data[$i][2]) }}">{{ $data[$i][1] }}</a></h5>
                    <h5>Rank:{{ $data[$i][3] }}</h5>
                    <div class="form-group">

                    @if ($data[$i][5] != null )

                              <a href="#!restore" onclick="confirmDelete('Are you sure to restore?', '{{ url('all/restore', $data[$i][0]) }}', 'restore');" class="btn btn-warning">Restore</a>
                     @else
                            <a href="{{ url('all/'.$data[$i][0].'/edit') }}" class="btn btn-primary">Edit</a>
                              <a href="#!delete" onclick="confirmDelete('Are you sure to delete ?', '{{ url('all', $data[$i][0]) }}', 'delete');" class="btn btn-danger">Delete</a>
                    @endif
                    </div>
                  </div>
                </div>
            </div>
        @endfor
    </div>



@endsection
