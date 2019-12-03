<?php
//	include '../inc/header.php';
	//include '../inc/sidebar.php';
  include '../config/config.php';
  include '../config/Database.php';
  $db= new Database();
if(isset($_POST['submit']))
{
  $cname=mysqli_real_escape_string($db->link, $_POST['cname']);
  $description=mysqli_real_escape_string($db->link, $_POST['description']);
  $status=mysqli_real_escape_string($db->link, $_POST['status']);


  if ($cname=='' || $description=='' || $status=='') {
    $error="Field must not be empty";
  }
  else
  {
    $query="INSERT INTO category(name, description, status) VALUES('$cname','$description', '$status')";
    $insert=$db->insert($query);
    if($insert){
       echo "<script>window.location.href='category.php'</script>"; 
     }
     else{
      echo '$error';
     }
  }
}
?>


<?php 
include "../inc/header2.php";
 ?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Product Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item "><a href="category.php">Category</a></li>
              <li class="breadcrumb-item active">Add Category</li>
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
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Product Category Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="cat_create.php" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Category Name</label>
                    <div class="col-sm-6">
                      <input type="text" name="cname" class="form-control" id="inputEmail3" placeholder="Enter Product Category Name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-6">
                      <input type="text" name="description" class="form-control" id="inputPassword3" placeholder="Description about category">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-6">
                      <input type="number" name="status" class="form-control" id="inputPassword3" value="1">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-4">
                      <button type="submit" name="submit" class="btn btn-success">Submit</button>
                      <button type="reset" class="btn btn-danger">Cancel</button>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
              </form>
            </div>
            <!-- /.card -->

	   
    </div>
  </section>
<!-- End Main content -->

<?php
include '../inc/footer.php';
?>