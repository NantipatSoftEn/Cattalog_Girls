@extends('template')

@section('content')

    <div class="col-md-12">
        <table class='table table-bordered table-inverse'>

            <?php
                $head = ['id', 'Name', 'facebook', 'Rank', 'img','E/D'];
                $data = [];
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
            <tr>
            @for ($i=0; $i < count($head) ; $i++)
                    <th>{{ $head[$i] }}</th>
            @endfor
            </tr>


             @for ($i=0; $i < count($data); $i++)
                <tr>
                @for ($j=0; $j < 5 + 1  ; $j++)       {{-- 5 colum data + 1 colum btn --}}

                    @if ($j == 4)                   {{--  colum 4 show img --}}
                        <th><img border="0" alt="" src="{{ url($data[$i][$j]) }}" class ="img-responsive"></th>

                    @elseif ($j == 2)               {{--  colum 2 show  link facebook --}}

                        <th><a href="{{ url($data[$i][$j]) }}">Warp</a></th>

                    @elseif ($j == 5)               {{--  colum 5 show btn edit+delete  --}}
                        <th>

                              <div class="form-group">
                                  <a href="{{ url('all/'.$data[$i][0].'/edit') }}" class="btn btn-primary">Edit</a>
                              </div>
                              @if ($data[$i][$j] != null )
                                  <div class="form-group">
                                        <a href="#!restore" onclick="confirmDelete('Are you sure to restore?', '{{ url('all/restore', $data[$i][0]) }}', 'restore');" class="btn btn-warning">Restore</a>
                                  </div>
                               @else
                                  <div class="form-group">
                                        <a href="#!delete" onclick="confirmDelete('Are you sure to delete ?', '{{ url('all', $data[$i][0]) }}', 'delete');" class="btn btn-danger">Delete</a>
                                  </div>

                              @endif



                              {{-- <form id="form-delete{{ $i }}" action="{{ url('all', $data[$i][0]) }}" method="post" style="display: none;">
                                  {{ csrf_field() }}
                                  {{ method_field('DELETE') }}
                              </form> --}}
                        </th>

                    @else
                        <th>{{ $data[$i][$j] }}</th>
                    @endif
                @endfor
                <tr>
            @endfor

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
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <div class="crop-image">
                         <img border="0" alt="" src="{{ url($data[$i][4]) }}"  style="height:256px;">
                    </div>

                  <div class="caption">
                    <h3>{{ $data[$i][1] }}</h3>
                    <p>Test</p>
                    <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                  </div>
                </div>
            </div>
        @endfor
    </div>



@endsection
