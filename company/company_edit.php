<?php 
$page ='company';
  include 'header3.php';

$id="";
$id = $_GET['id'];
if (isset($_POST['update'])) {
  $com_name=mysqli_real_escape_string($db->link, $_POST['com_name']);
  $com_desc=mysqli_real_escape_string($db->link, $_POST['com_desc']);
  $com_contact=mysqli_real_escape_string($db->link, $_POST['com_contact']);
  $com_location=mysqli_real_escape_string($db->link, $_POST['com_location']);
  $com_address=mysqli_real_escape_string($db->link, $_POST['com_address']);
  $query = "UPDATE company
  SET
    com_name='$com_name',
    com_desc='$com_desc',
    com_contact = '$com_contact',
    com_location='$com_location',
    com_address = '$com_address'
    WHERE com_id ='$id' ";
  $update = $db->update($query);

    echo "<script>alert('Record Updated successfully');</script>";
    echo "<script>window.location.href='company.php'</script>"; 
    
}
if(isset($_POST['cancel'])){
  echo "<script>window.location.href='company.php'</script>"; 
}
$query2 = "SELECT * FROM company WHERE com_id = $id";
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
                      <input type="text" name="com_name" class="form-control" value="<?php echo $row['com_name']; ?>"  placeholder="Enter Company Name">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-6">
                      <input type="text" name="com_desc" value="<?php echo $row['com_desc']; ?>" class="form-control" placeholder="Enter Company Description">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Contact</label>
                    <div class="col-sm-6">
                      <input type="text" name="com_contact" value="<?php echo $row['com_contact']; ?>" class="form-control"  placeholder="Enter Contact Number">
                    </div>
                  </div>


                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Location</label>
                    <div class="col-sm-6">
                      <input type="text" name="com_location" value="<?php echo $row['com_location']; ?>" class="form-control"  placeholder="Enter Location">
                    </div>
                  </div>



                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-6">
                      <input type="text" name="com_address" class="form-control" value="<?php echo $row['com_address']; ?>" placeholder="Enter Address">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-4">
                      <button type="submit" name="update" class="btn btn-2 btn-success">Update</button>
                      <button type="reset" class="btn btn-2 btn-danger">Reset</button>
                      <a class="btn btn-info btn-2" href="company.php">Go Back</a>
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