@extends('template')

@section('script')
    <form id="form-delete" method="post">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
    </form>
    <script type="text/javascript">
        function confirmDelete(msg, url) {
            if (confirm(msg)) {
                $('form#form-delete').attr('action', url);
                $('form#form-delete').submit();
            } else {
                alert('Canceled');
            }
        }
    </script>
@endsection
@section('content')
    <div class="col-md-12">
        <table class='table table-bordered table-inverse'>

            <?php
                $head = ['id', 'Name', 'facebook', 'Rank', 'img','E/D'];
                $data = [];
                for ($i=0; $i < count($people); $i++) {
                    $data[$i]  = [$people[$i]->id,$people[$i]->name,$people[$i]->facebook,$people[$i]->Rank,$people[$i]->img ];
                }
            ?>
            <tr>
            @for ($i=0; $i < count($head) ; $i++)
                    <th>{{ $head[$i] }}</th>
            @endfor
            </tr>


             @for ($i=0; $i < count($data); $i++)
                <tr>
                @for ($j=0; $j < 5 + 1; $j++)

                    @if ($j == 4)
                        <th><img border="0" alt="" src="{{ url($data[$i][$j]) }}" class ="img-responsive"></th>
                    @elseif ($j == 2)
                        <th><a href="{{ url($data[$i][$j]) }}">{{ url($data[$i][$j]) }}</a></th>
                    @elseif ($j == 5)
                        <th>
                              <div class="form-group">
                                  <a href="{{ url('all/'.$data[$i][0].'/edit') }}" class="btn btn-primary">Edit</a>
                              </div>
                              <div class="form-group">
                                    <a href="#!delete" onclick="confirmDelete('Are you sure to delete ?', '{{ url('all', $data[$i][0]) }}');" class="btn btn-danger">Edit</a>
                              </div>
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
@endsection
