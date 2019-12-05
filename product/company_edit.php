<?php 
include '../inc/header2.php';


  include '../config/config.php';
  include '../config/Database.php';

$db = new Database();
$id="";
$id = $_GET['id'];
//echo "dsayddddddddddddddddddddgsaydd".$id.$_GET['id']."  test2  ";
if (isset($_POST['update'])) {
  $name = mysqli_real_escape_string($db->link, $_POST['name']);
  $contact = mysqli_real_escape_string($db->link, $_POST['contact']);
  $address = mysqli_real_escape_string($db->link, $_POST['address']);
  $query = "UPDATE company
  SET
    name='$name',
    contact = '$contact',
    address = '$address'
    WHERE c_id ='$id' ";
  $update = $db->update($query);

    echo "<script>alert('Record Updated successfully');</script>";
    echo "<script>window.location.href='company.php'</script>"; 
    
}
if(isset($_POST['cancel'])){
  echo "<script>window.location.href='company.php'</script>"; 
}
$query2 = "SELECT * FROM company WHERE c_id = $id";
$row = $db->select($query2)->fetch_assoc();
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Company</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item "><a href="company.php">Company</a></li>
              <li class="breadcrumb-item active">Edit Company</li>
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
                <h3 class="card-title">Company Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Company Name</label>
                    <div class="col-sm-6">
                      <input type="text" name="name" class="form-control" id="inputEmail3" value="<?php echo $row['name']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Contact No.</label>
                    <div class="col-sm-6">
                      <input type="text" name="contact" class="form-control" id="inputPassword3" value="<?php echo $row['contact']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-6">
                      <input type="text" name="address" class="form-control" id="inputPassword3"  value="<?php echo $row['address']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-4">
                      <button type="submit" name="update" class="btn btn-success">Update</button>
                      <button type="submit" class="btn btn-danger" name="cancel">Cancel</button>
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