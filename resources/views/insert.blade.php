@extends('template')
@section('content')
    <div class="col-md-8">
      <form class="" action="{{ url('all') }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <label for=""><h1>Picture</h1></label> <br>

          <input type="file" name="fileToUpload" id="fileToUpload" >


          <div class="form-group">
              <input type="text" class="form-control" name="name" placeholder="Name">
              <input type="text" class="form-control" name="facebook" placeholder="facebook">
              <input ßtype="text" class="form-control" name="rank" placeholder="Rank">
          </div>
            <button type="submit" class="btn btn-default">Submit</button>
         <br>

      </form>
    </div>
@endsection
