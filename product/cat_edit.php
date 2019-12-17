<?php
$page='';
$page = 'product_category';
include 'header3.php';
$id = $_GET['id'];

if(isset($_POST['update']))
{
  $cat_name = mysqli_real_escape_string($db->link, $_POST['cat_name']);
  $cat_desc = mysqli_real_escape_string($db->link, $_POST['cat_desc']);
  $query = "UPDATE category
  SET
    cat_name='$cat_name',
    cat_desc = '$cat_desc'
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
                    <label  class="col-sm-2 col-form-label">Category Name</label>
                    <div class="col-sm-6">
                      <input type="text" name="cat_name" value="<?php echo $row['cat_name'] ?>" class="form-control"  >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-6">
                      <input type="text" value="<?php echo $row['cat_desc'] ?>" name="cat_desc" class="form-control"  >
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-4">
                      <button type="submit" name="update" class="btn btn-success btn-2">Update</button>
                      <button type="reset" class="btn btn-danger btn-2">Reset</button>
                      <a class="btn btn-info " href="category.php">Go Back</a>
                      
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