<html>
<head>
  <meta charset="UTF-8">
  <title>title</title>
  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css">
  <style>

    form {
      margin-bottom: 0;
    }
    .models--actions {
      margin-bottom: 15px;
    }
  </style>
</head>
<body>
  @include('partials.head')
  @include('entrust-gui::partials.navigation')
  <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <h1>@yield('heading')</h1>
          @include('entrust-gui::partials.notifications')
          @yield('content')
        </div>
      </div>
    </div>
  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.js"></script>
  <script>
  (function() {
    $('select').select2();
  })();
  </script>
</body>
</html>
