@extends('template')

@section('content')
    <div class="col-md-4">
        <table class="table table-bordered table-inverse">

                <?php
                    $head = ['id', 'Name', 'facebook', 'Rank', 'img'];
                    $data  =[$people->id,$people->name,$people->facebook,$people->Rank,$people->img ];
                    //dd($data);
                ?>



                @for ($i=0; $i < count($data); $i++)
                    <tr>
                        <th>{{ $head[$i] }}</th>
                        @if ($i == 4)
                            <th><img border="0" alt="" src="{{ url($data[$i]) }}" class ="img-responsive"></th>
                        @else
                            <th>{{ $data[$i] }}</th>
                        @endif

                    </tr>
                @endfor
        </table>
    </div>

@endsection
