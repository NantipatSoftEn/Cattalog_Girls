@extends('template')
@section('content')
    <div class="col-md-4">
      <form class="" action="{{ url('all', $people->id) }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          {{ method_field('PUT') }}


          <img border="0" alt="" src="{{ url($people->img) }}" class ="img-responsive">
          <input type="file" name="fileToUpload" id="fileToUpload" value="{{$people->img}}">
          <br>
          <br>

          <div class="form-group">
              <input type="text" class="form-control" name="name" placeholder="Name" value="{{$people->name}}">
              <input type="text" class="form-control" name="facebook" placeholder="facebook" value="{{$people->facebook}}">
              <input ßtype="text" class="form-control" name="rank" placeholder="Rank" value="{{$people->Rank}}">
          </div>
            <button type="submit" class="btn btn-default">Submit</button>
         <br>

      </form>
    </div>
@endsection
