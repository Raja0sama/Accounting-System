<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
     <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">

    <link rel="stylesheet" href="{{ asset("css/app.css") }}" >

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset("core/vendor/bootstrap/css/bootstrap.min.css") }}" >
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset("core/vendor/font-awesome/css/font-awesome.min.css") }}" >
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="{{ asset("core/css/font.css") }}" >
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset("core/css/style.default.css") }}" id="theme-stylesheet" >
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset("core/css/custom.css") }}" >
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset("core/img/favicon1.png") }}" >


    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>

    <div class="login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo" style='color:red'>
<h1>Super Sami Accounting Management</h1>                  </div>
                  <p>(Accounts Management Sysytem)</p>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">

                    <form name="form" id="form1" action="" method="post" class="form-validate">
                        @csrf
                        <div class="form-group">
                          <input id="uname" type="text" name="name" required autofocus  value="{{ old('name') }}" data-msg="Please enter your username" class="input-material" autocomplete="name">
                          <label for="login-username" class="label-material">User Name</label>
                          @error('name')
                              <span style="color:red" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
                        <div class="form-group">
                          <input id="pass" type="password" name="password" required data-msg="Please enter your password" class="input-material">
                          <label for="login-password" class="label-material">Password</label>
                          @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div><input type="submit" name="login" id="login" value="Login" class="btn btn-primary">
                        <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                      </form><a href="#" class="forgot-pass">Forgot Password?</a><br><small>Do not have an account? </small><a href="register.html" class="signup">Signup</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="copyrights text-center">
        <p>Design by <a href="https://super-sami.com/" class="external">Raja Osama - SuperSami</a></p>
        <!-- Please do not remove the backlink to us unless you support further theme's development at https://super-sami.com/donate. It is part of the license conditions. Thank you for understanding :)-->
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{ asset("core/vendor/jquery/jquery.min.js") }}" ></script>
    <script src="{{ asset("core/vendor/popper.js/umd/popper.min.js")}}"> </script>
    <script src="{{ asset("core/vendor/bootstrap/js/bootstrap.min.js")}}" ></script>
    <script src="{{ asset("core/vendor/jquery.cookie/jquery.cookie.js")}}"></script>
    <script src="{{ asset("core/vendor/chart.js/Chart.min.js") }}" ></script>
    <script src="{{ asset("core/vendor/jquery-validation/jquery.validate.min.js") }}" ></script>
    <script src="{{ asset("core/js/front.js") }}" ></script>
  </body>
</html>

