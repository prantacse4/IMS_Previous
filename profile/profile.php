<?php 
include 'header3.php';
$email="";
if (isset( $_SESSION['email'])) {
  $email =  $_SESSION['email'];
}

$query = "SELECT * FROM users WHERE user_email = '$email'";
$row = $db->select($query)->fetch_assoc();
$id = $row['user_id'];


if(isset($_POST['update']))
{
  $user_fullname = mysqli_real_escape_string($db->link, $_POST['user_fullname']);
  $username = mysqli_real_escape_string($db->link, $_POST['username']);
  $user_phone = mysqli_real_escape_string($db->link, $_POST['user_phone']);
  $query2 = "UPDATE users
  SET
    user_fullname='$user_fullname',
    username='$username',
    user_phone='$user_phone'
    WHERE user_id ='$id' ";
  $update = $db->update($query2);
  if($update){
       echo "<script>window.location.href='profile.php'</script>"; 
     }
     else{
      echo '$error';
     }
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
            <h1 class="m-0 text2">&nbsp;&nbsp;&nbsp;P r o f i l e</h1>
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
                <h3 class="card-title text-center">Profile Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                <div class="card-body">

                    <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-6">
                      <img class="pro_image" src="../assets/image/profile.png">
                    </div>
                  </div>



                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Full Name</label>
                    <div class="col-sm-6">
                      <input type="text" name="user_fullname" class="form-control" value="<?php echo $row['user_fullname']; ?>"  Required>
                    </div>

                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-6">
                      <input type="text" name="username" class="form-control"  value="<?php echo $row['username']; ?>"  Required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-6">
                      <input type="text" name="user_phone" class="form-control" value="<?php echo $row['user_phone']; ?>"   Required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-6">
                      <input type="email" name="user_email" class="form-control" 
                       value="<?php echo $row['user_email']; ?>"   Required Readonly>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 ">Password </label>

                    <div class="col-sm-6" id="show_hide_password">
                      <input type="password" name="user_password" class="form-control"  value="<?php echo $row['user_password']; ?>"  Required>
                      <div class="input-group-addon">
                       <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                      </div>
                     
                    </div>                   
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-4">
                      <button type="submit" name="update" class="btn btn-info btn-2">Update Info</button>
                      
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
              </form>
            </div>
            <!-- /.card -->

       
    </div>
  </section>
<script type="text/javascript">
    
    $(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
});
</script>

 <?php include '../inc/footer.php'; ?>
