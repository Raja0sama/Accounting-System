<?Php 
 session_start();
include("Connection.php");
 if(isset($_POST['login'])){
  
  
  
   $uname = $_POST['uname']; 
   $pass = $_POST['pass'];
   $query = mysqli_query($con,"select * from users where uname = '$uname' && pass = '$pass' ");
   $uname2 = "";
   $pass2 = "";
   print_r($query);
   while($row = mysqli_fetch_array($query)){
     $uname2 = $row['uname'];
     $pass2 = $row['pass'];
     $_SESSION['s_uname'] = $uname2; 
     $_SESSION['s_pass'] = $pass2;
     } 
     if($uname != "" && $pass != ""){
       
        if($uname === $uname2 && $pass === $pass2)
        { 
            
            ?>
  <style type="text/css">
	html {
  height: 100%;
}

body {
  height: 100%;
  background: black;
  display: flex;
  align-items: center;
  justify-content: center;
}

.loader {
  position: relative;
  width: 75px;
  height: 100px;
}
.loader__bar {
  position: absolute;
  bottom: 0;
  width: 10px;
  height: 50%;
  background: #fff;
  -webkit-transform-origin: center bottom;
          transform-origin: center bottom;
  box-shadow: 1px 1px 0 rgba(0, 0, 0, 0.2);
}
.loader__bar:nth-child(1) {
  left: 0px;
  -webkit-transform: scale(1, 0.2);
          transform: scale(1, 0.2);
  -webkit-animation: barUp1 4s infinite;
          animation: barUp1 4s infinite;
}
.loader__bar:nth-child(2) {
  left: 15px;
  -webkit-transform: scale(1, 0.4);
          transform: scale(1, 0.4);
  -webkit-animation: barUp2 4s infinite;
          animation: barUp2 4s infinite;
}
.loader__bar:nth-child(3) {
  left: 30px;
  -webkit-transform: scale(1, 0.6);
          transform: scale(1, 0.6);
  -webkit-animation: barUp3 4s infinite;
          animation: barUp3 4s infinite;
}
.loader__bar:nth-child(4) {
  left: 45px;
  -webkit-transform: scale(1, 0.8);
          transform: scale(1, 0.8);
  -webkit-animation: barUp4 4s infinite;
          animation: barUp4 4s infinite;
}
.loader__bar:nth-child(5) {
  left: 60px;
  -webkit-transform: scale(1, 1);
          transform: scale(1, 1);
  -webkit-animation: barUp5 4s infinite;
          animation: barUp5 4s infinite;
}
.loader__ball {
  position: absolute;
  bottom: 10px;
  left: 0;
  width: 10px;
  height: 10px;
  background: #fff;
  border-radius: 50%;
  -webkit-animation: ball 4s infinite;
          animation: ball 4s infinite;
}

@-webkit-keyframes ball {
  0% {
    -webkit-transform: translate(0, 0);
            transform: translate(0, 0);
  }
  5% {
    -webkit-transform: translate(8px, -14px);
            transform: translate(8px, -14px);
  }
  10% {
    -webkit-transform: translate(15px, -10px);
            transform: translate(15px, -10px);
  }
  17% {
    -webkit-transform: translate(23px, -24px);
            transform: translate(23px, -24px);
  }
  20% {
    -webkit-transform: translate(30px, -20px);
            transform: translate(30px, -20px);
  }
  27% {
    -webkit-transform: translate(38px, -34px);
            transform: translate(38px, -34px);
  }
  30% {
    -webkit-transform: translate(45px, -30px);
            transform: translate(45px, -30px);
  }
  37% {
    -webkit-transform: translate(53px, -44px);
            transform: translate(53px, -44px);
  }
  40% {
    -webkit-transform: translate(60px, -40px);
            transform: translate(60px, -40px);
  }
  50% {
    -webkit-transform: translate(60px, 0);
            transform: translate(60px, 0);
  }
  57% {
    -webkit-transform: translate(53px, -14px);
            transform: translate(53px, -14px);
  }
  60% {
    -webkit-transform: translate(45px, -10px);
            transform: translate(45px, -10px);
  }
  67% {
    -webkit-transform: translate(37px, -24px);
            transform: translate(37px, -24px);
  }
  70% {
    -webkit-transform: translate(30px, -20px);
            transform: translate(30px, -20px);
  }
  77% {
    -webkit-transform: translate(22px, -34px);
            transform: translate(22px, -34px);
  }
  80% {
    -webkit-transform: translate(15px, -30px);
            transform: translate(15px, -30px);
  }
  87% {
    -webkit-transform: translate(7px, -44px);
            transform: translate(7px, -44px);
  }
  90% {
    -webkit-transform: translate(0, -40px);
            transform: translate(0, -40px);
  }
  100% {
    -webkit-transform: translate(0, 0);
            transform: translate(0, 0);
  }
}

@keyframes ball {
  0% {
    -webkit-transform: translate(0, 0);
            transform: translate(0, 0);
  }
  5% {
    -webkit-transform: translate(8px, -14px);
            transform: translate(8px, -14px);
  }
  10% {
    -webkit-transform: translate(15px, -10px);
            transform: translate(15px, -10px);
  }
  17% {
    -webkit-transform: translate(23px, -24px);
            transform: translate(23px, -24px);
  }
  20% {
    -webkit-transform: translate(30px, -20px);
            transform: translate(30px, -20px);
  }
  27% {
    -webkit-transform: translate(38px, -34px);
            transform: translate(38px, -34px);
  }
  30% {
    -webkit-transform: translate(45px, -30px);
            transform: translate(45px, -30px);
  }
  37% {
    -webkit-transform: translate(53px, -44px);
            transform: translate(53px, -44px);
  }
  40% {
    -webkit-transform: translate(60px, -40px);
            transform: translate(60px, -40px);
  }
  50% {
    -webkit-transform: translate(60px, 0);
            transform: translate(60px, 0);
  }
  57% {
    -webkit-transform: translate(53px, -14px);
            transform: translate(53px, -14px);
  }
  60% {
    -webkit-transform: translate(45px, -10px);
            transform: translate(45px, -10px);
  }
  67% {
    -webkit-transform: translate(37px, -24px);
            transform: translate(37px, -24px);
  }
  70% {
    -webkit-transform: translate(30px, -20px);
            transform: translate(30px, -20px);
  }
  77% {
    -webkit-transform: translate(22px, -34px);
            transform: translate(22px, -34px);
  }
  80% {
    -webkit-transform: translate(15px, -30px);
            transform: translate(15px, -30px);
  }
  87% {
    -webkit-transform: translate(7px, -44px);
            transform: translate(7px, -44px);
  }
  90% {
    -webkit-transform: translate(0, -40px);
            transform: translate(0, -40px);
  }
  100% {
    -webkit-transform: translate(0, 0);
            transform: translate(0, 0);
  }
}
@-webkit-keyframes barUp1 {
  0% {
    -webkit-transform: scale(1, 0.2);
            transform: scale(1, 0.2);
  }
  40% {
    -webkit-transform: scale(1, 0.2);
            transform: scale(1, 0.2);
  }
  50% {
    -webkit-transform: scale(1, 1);
            transform: scale(1, 1);
  }
  90% {
    -webkit-transform: scale(1, 1);
            transform: scale(1, 1);
  }
  100% {
    -webkit-transform: scale(1, 0.2);
            transform: scale(1, 0.2);
  }
}
@keyframes barUp1 {
  0% {
    -webkit-transform: scale(1, 0.2);
            transform: scale(1, 0.2);
  }
  40% {
    -webkit-transform: scale(1, 0.2);
            transform: scale(1, 0.2);
  }
  50% {
    -webkit-transform: scale(1, 1);
            transform: scale(1, 1);
  }
  90% {
    -webkit-transform: scale(1, 1);
            transform: scale(1, 1);
  }
  100% {
    -webkit-transform: scale(1, 0.2);
            transform: scale(1, 0.2);
  }
}
@-webkit-keyframes barUp2 {
  0% {
    -webkit-transform: scale(1, 0.4);
            transform: scale(1, 0.4);
  }
  40% {
    -webkit-transform: scale(1, 0.4);
            transform: scale(1, 0.4);
  }
  50% {
    -webkit-transform: scale(1, 0.8);
            transform: scale(1, 0.8);
  }
  90% {
    -webkit-transform: scale(1, 0.8);
            transform: scale(1, 0.8);
  }
  100% {
    -webkit-transform: scale(1, 0.4);
            transform: scale(1, 0.4);
  }
}
@keyframes barUp2 {
  0% {
    -webkit-transform: scale(1, 0.4);
            transform: scale(1, 0.4);
  }
  40% {
    -webkit-transform: scale(1, 0.4);
            transform: scale(1, 0.4);
  }
  50% {
    -webkit-transform: scale(1, 0.8);
            transform: scale(1, 0.8);
  }
  90% {
    -webkit-transform: scale(1, 0.8);
            transform: scale(1, 0.8);
  }
  100% {
    -webkit-transform: scale(1, 0.4);
            transform: scale(1, 0.4);
  }
}
@-webkit-keyframes barUp3 {
  0% {
    -webkit-transform: scale(1, 0.6);
            transform: scale(1, 0.6);
  }
  100% {
    -webkit-transform: scale(1, 0.6);
            transform: scale(1, 0.6);
  }
}
@keyframes barUp3 {
  0% {
    -webkit-transform: scale(1, 0.6);
            transform: scale(1, 0.6);
  }
  100% {
    -webkit-transform: scale(1, 0.6);
            transform: scale(1, 0.6);
  }
}
@-webkit-keyframes barUp4 {
  0% {
    -webkit-transform: scale(1, 0.8);
            transform: scale(1, 0.8);
  }
  40% {
    -webkit-transform: scale(1, 0.8);
            transform: scale(1, 0.8);
  }
  50% {
    -webkit-transform: scale(1, 0.4);
            transform: scale(1, 0.4);
  }
  90% {
    -webkit-transform: scale(1, 0.4);
            transform: scale(1, 0.4);
  }
  100% {
    -webkit-transform: scale(1, 0.8);
            transform: scale(1, 0.8);
  }
}
@keyframes barUp4 {
  0% {
    -webkit-transform: scale(1, 0.8);
            transform: scale(1, 0.8);
  }
  40% {
    -webkit-transform: scale(1, 0.8);
            transform: scale(1, 0.8);
  }
  50% {
    -webkit-transform: scale(1, 0.4);
            transform: scale(1, 0.4);
  }
  90% {
    -webkit-transform: scale(1, 0.4);
            transform: scale(1, 0.4);
  }
  100% {
    -webkit-transform: scale(1, 0.8);
            transform: scale(1, 0.8);
  }
}
@-webkit-keyframes barUp5 {
  0% {
    -webkit-transform: scale(1, 1);
            transform: scale(1, 1);
  }
  40% {
    -webkit-transform: scale(1, 1);
            transform: scale(1, 1);
  }
  50% {
    -webkit-transform: scale(1, 0.2);
            transform: scale(1, 0.2);
  }
  90% {
    -webkit-transform: scale(1, 0.2);
            transform: scale(1, 0.2);
  }
  100% {
    -webkit-transform: scale(1, 1);
            transform: scale(1, 1);
  }
}
@keyframes barUp5 {
  0% {
    -webkit-transform: scale(1, 1);
            transform: scale(1, 1);
  }
  40% {
    -webkit-transform: scale(1, 1);
            transform: scale(1, 1);
  }
  50% {
    -webkit-transform: scale(1, 0.2);
            transform: scale(1, 0.2);
  }
  90% {
    -webkit-transform: scale(1, 0.2);
            transform: scale(1, 0.2);
  }
  100% {
    -webkit-transform: scale(1, 1);
            transform: scale(1, 1);
  }
}
</style>
  <div class="loader">
  <div class="loader__bar"></div>
  <div class="loader__bar"></div>
  <div class="loader__bar"></div>
  <div class="loader__bar"></div>
  <div class="loader__bar"></div>
  <div class="loader__ball"></div>
</div>
  
  <?php
            
   echo ("<script LANGUAGE='JavaScript'>
   window.location.href='paymentdesign.php';
    </script>");
     }
     else
     { 
   echo "<script>alert('Invalid Username or Password');</script>"; } 
} 
else{ 
echo "<script>alert('Please Enter');</script>"; 
}                             
 }
 
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="css/font.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon1.png">
    
    
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
                  <div class="logo">
<h1>Super Sami Accounting Managment</h1>                  </div>
                  <p>(Accounts Management Sysytem)</p>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                 
                    <form name="form" id="form1" action="" method="post" class="form-validate">
                    <div class="form-group">
                      <input id="uname" type="text" name="uname" required data-msg="Please enter your username" class="input-material">
                      <label for="login-username" class="label-material">User Name</label>
                    </div>
                    <div class="form-group">
                      <input id="pass" type="password" name="pass" required data-msg="Please enter your password" class="input-material">
                      <label for="login-password" class="label-material">Password</label>
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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="js/front.js"></script>
  </body>
</html>

