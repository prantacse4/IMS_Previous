
<?php  
	include '../inc/header2.php';


  include '../config/config.php';
  include '../config/Database.php';

  $db= new Database();

if(isset($_POST['submit']))
{
  $name=mysqli_real_escape_string($db->link, $_POST['name']);
  $contact=mysqli_real_escape_string($db->link, $_POST['contact']);
  $address=mysqli_real_escape_string($db->link, $_POST['address']);
  if ($name=='' || $contact=='' || $address=='') {
    $error="Field must not be empty";
  }
  else
  {
    $query="INSERT INTO company(name, contact, address) VALUES('$name','$contact', '$address')";
    $insert=$db->insert($query);
    if($insert){
       echo "<script>alert('Record Created successfully');</script>";
       echo "<script>window.location.href='company.php'</script>"; 
     }
     else{
      echo '$error';
     }
  }
}
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Company</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item "><a href="company.php">Company</a></li>
              <li class="breadcrumb-item active">Add Company</li>
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
              <form class="form-horizontal" action="company_create.php" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Company Name</label>
                    <div class="col-sm-6">
                      <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="Enter Company Name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Contact No.</label>
                    <div class="col-sm-6">
                      <input type="text" name="contact" class="form-control" id="inputPassword3" placeholder="Enter Contact Number">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-6">
                      <input type="text" name="address" class="form-control" id="inputPassword3" placeholder="Enter Address">
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