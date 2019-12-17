<?php 
include 'header3.php';
if (isset( $_SESSION['email'])) {
  $email =  $_SESSION['email'];
}

 ?>




<link rel="stylesheet" type="text/css" href="../assets/profile.css">

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text2">&nbsp;&nbsp;&nbsp;H E L P</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><a href="#">Profile</a></li>

            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- main body start from here -->

        <!-- Horizontal Form -->
            <div class="card card-info card2">
              <div class="card-header">
                <h3 class="card-title text-center">HELP</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <h1>We will open our help center very soon.</h1>

                  <img class="img-fluid" alt="Responsive image" src="../assets/image/underconstruction.gif">

                    




               





 
                
                </div>
                <!-- /.card-body -->
              </form>
            </div>
            <!-- /.card -->

       
    </div>
  </section>

 <?php include '../inc/footer.php'; ?>
