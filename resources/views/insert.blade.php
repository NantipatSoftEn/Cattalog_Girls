<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{url('css/app.css')}}">
    <title>insert</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-4">

          <form class="" action="{{ url('all') }}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <label for=""><h1>Picture</h1></label> <br>

              <input type="file" name="fileToUpload" id="fileToUpload">
              

              <div class="form-group">
                  <input type="text" class="form-control" name="name" placeholder="Name">
                  <input type="text" class="form-control" name="facebook" placeholder="facebook">
                  <input type="text" class="form-control" name="rank" placeholder="Rank">
              </div>
                <button type="submit" class="btn btn-default">Submit</button>
             <br>

          </form>
        </div>
      </div>
    </div>


  </body>
</html>
