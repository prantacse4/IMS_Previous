<?php 
session_start();
include "../config/library.php";
$db= new Database();

if (isset($_SESSION['email'])) {
  echo "<script>window.location.href='../homepage/index.php'</script>";
}

$error = "";
$e=0;
if (isset($_POST['login'])) {
  $email = mysqli_real_escape_string($db->link, $_POST['email']);
  $password = mysqli_real_escape_string($db->link, $_POST['password']);

    $query = "SELECT * FROM users WHERE user_email = '" . $email . "'
     and user_password = '" . $password . "'";
    $result = mysqli_query($db->link,$query);
    $user_data = mysqli_fetch_array($result);
    $count_row = $result->num_rows;

    if ($count_row == 1) {
      $_SESSION['email'] = $email;
      $_SESSION['success'] = "You are now logged in.";


        if(!empty($_POST["remember"]))   
         {  
          setcookie ("member_login",$email,time()+ (10 * 365 * 24 * 60 * 60));  
          setcookie ("member_password",$password,time()+ (10 * 365 * 24 * 60 * 60));
         }  
         else  
         {  
          if(isset($_COOKIE["member_login"]))   
          {  
           setcookie ("member_login","");  
          }  
          if(isset($_COOKIE["member_password"]))   
          {  
           setcookie ("member_password","");  
          }  
         } 


       echo "<script>window.location.href='../homepage/index.php'</script>";
    }else {
      $error="Email/Password is wrong!.";
    $e=1;
    $f='<div class="warning danger danl text-center"> <Strong>Danger!</Strong> Email/Password is wrong!. </div>';
    }
}
 ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>IMS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="login_register.css">
</head>
<body class="hold-transition register-page">

<div class="login-box">
  
  <!-- /.login-logo -->
  <div class="card radius">
    <div class="card-body login-card-body lcbody radius">
      <div class="login-logo">
    <a href=""><b>IMS</b></a><br>
    <img class="text-center imgradius" src="images/avatar.gif" >
  </div>
      <p class="login-box-msg">Sign in to start your session</p>

      <?php if ($e==1) {
      echo $f;
    } ?>



      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" Required value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" Required value="<?php if(isset($_COOKIE["member_password"])) { echo $_COOKIE["member_password"]; } ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
       
          <div class="text-centert">
            <div class="icheck-primary">
              <input type="checkbox" name="remember" id="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?>>
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col --><br>
          <div class="text-center">
            <button type="submit" name="login" class="btn btn-lg btn-primary buttonlg">Sign In</button>
          </div>
          <!-- /.col -->
       
      <!-- </form> -->
      <br>


      <!-- /.social-auth-links -->
      <p class="mb-0">
        <p  data-toggle="modal" data-target="#exampleModalCenter">Request for membership</p>
        
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>









<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">






<div class=" register-box reg">

  <div class="card radius">
    <div class="card-body login-card-body lcbody radius">
      <div class="login-logo">
    <a href="../../index2.html"><b>IMS</b></a><br>
    <img class="text-center imgradius" src="images/avatar.gif" >
  </div>
      <p class="login-box-msg">Register a new membership</p>

<!--       <form action="../../index.html" method="post"> -->
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Full name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        
          
          <!-- /.col -->
          <br>
          <div class="text-center">
            <button name="request" type="submit" class="btn btn-lg btn-primary buttonlg">Request</button>
          </div>
          <!-- /.col -->
       
      </form>
      <br>


      <a  class="text-center" data-dismiss="modal">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
 </div>

    </div>
  </div>
</div>

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>
