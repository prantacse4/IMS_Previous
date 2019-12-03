<?php
  include '../config/library.php';
  $db= new Database();


$db = new Database();
$id = $_GET['id'];

if(isset($_POST['update']))
{
  $name = mysqli_real_escape_string($db->link, $_POST['name']);
  $description = mysqli_real_escape_string($db->link, $_POST['description']);
  $status =  $_POST['status'];
  $query = "UPDATE category
  SET
    name='$name',
    description = '$description',
    status = '$status'
    WHERE cat_id =$id";
  $update = $db->update($query);
  if($update){
       echo "<script>window.location.href='category.php'</script>"; 
     }
     else{
      echo '$error';
     }
}

$query = "SELECT * FROM category WHERE cat_id = $id";
$row = $db->select($query)->fetch_assoc();
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
            <h1 class="m-0 text-dark">Update Product Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item "><a href="category.php">Category</a></li>
              <li class="breadcrumb-item active">Update Category</li>
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
              <form class="form-horizontal" action="cat_edit.php?id=<?php echo $id; ?>" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Category Name</label>
                    <div class="col-sm-6">
                      <input type="text" name="name" value="<?php echo $row['name'] ?>" class="form-control" id="inputEmail3" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-6">
                      <input type="text" value="<?php echo $row['description'] ?>" name="description" class="form-control" id="inputPassword3" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-6">
                      <input type="number" name="status" value="<?php echo $row['status'] ?>" class="form-control" id="inputPassword3" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-4">
                      <button type="submit" name="update" class="btn btn-success">Update</button>
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