<!--
* jonnyalexbh
* @Description: layouts errors
-->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>App | @yield('title')</title>
  <!-- application -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- font-awesome framework -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  @yield('css')

  <style media="screen">
  body {
    position: fixed;
    overflow-y: scroll;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-size: cover;
    background-position: 50% 50%;
    background-color: #EEE;
    background-repeat:repeat;
  }

  .error {
    margin-top: 180px;
    margin-bottom: 0px;
  }

  .title {
    font-size: 45px;
    color: #39607c;
  }

  .logo-mp {
    margin-top: 30px;
  }
  </style>
</head>
<body>

  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="error">
          @yield('content')
        </div>
      </div>
    </div>
  </div>

  @yield('js')

</body>
</html>
