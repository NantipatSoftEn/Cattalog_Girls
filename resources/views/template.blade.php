<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="{{elixir('css/app.css')}}">

  <title>CATTALOG</title>
</head>

<body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Cattalog</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <li class="active"><a href="{{url('all')}}">Home</a></li>
            <li class="active"><a href="{{url('all/create')}}">Create</a></li>


        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
    <!--/.container-fluid -->
  </nav>
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              @yield('content')
          </div>
      </div>
  </div>
</body>

{{--For Form delect--}}
<form id="form-delete" method="post">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
</form>
<script type="text/javascript">
    function confirmDelete(msg, url, action) {
        if (confirm(msg)) {
            if(action == 'restore'){
                window.location.href = url;
            }else{
                var element = document.getElementById('form-delete');
                element.action = url;
                element.submit();
            }

            // $('form#form-delete').attr('action', url);
            // $('form#form-delete').submit();
        } else {
            alert('Canceled');
        }
    }
</script>

</html>
