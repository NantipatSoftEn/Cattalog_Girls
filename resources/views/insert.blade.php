@extends('template')
@section('content')
    <div class="col-md-8">
      <form class="" action="{{ url('all') }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <label for=""><h1>Picture</h1></label> <br>


          <div class="form-group">
              <input type="file" name="fileToUpload" id="fileToUpload" class="btn btn-default">
          </div>

          <div class="form-group">
              <input type="text" class="form-control" name="name" placeholder="Name">
          </div>

          <div class="form-group">
              <input type="text" class="form-control" name="facebook" placeholder="facebook">
          </div>

          <div class="form-group">
              <input ßtype="text" class="form-control" name="rank" placeholder="Rank">
          </div>

            <button type="submit" class="btn btn-default">Submit</button>
         <br>

      </form>
    </div>
@endsection
