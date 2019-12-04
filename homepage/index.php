<?php
session_start();
include "../inc/header2.php";
if (!isset($_SESSION['email'])) {
  echo "<script>window.location.href='../login_register/login_register.php'</script>";
}
$e=0;
$f="";
if (isset( $_SESSION['email'])) {
  $email =  $_SESSION['email'];
  $f = $email;
  $f='<div class="text-center"><a class="btn btn-danger" href="logout.php?logout="1" ">Logout</a></div> ';
  $e=1;
}

?>

 


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <H1>WELCOME ADMIN</H1>
        <div class="text-center">
          <h2><?php if ($e==1) { echo $email; } ?></h2>
        </div>
        <?php if ($e==1) {
      echo $f;
    } ?>

        <!-- main body start from here -->
       



        <!-- main body start from here -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <?php 
  include "../inc/footer.php";
  ?>