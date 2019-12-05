
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
  $c_id=mysqli_real_escape_string($db->link, $_POST['company']);
  //$c_id='2';
  if ($name=='' || $contact=='' || $address=='' || $c_id=='') {
    $error="Field must not be empty";
  }
  else
  {
$query="INSERT INTO supplier(name, contact, address,c_id) VALUES('$name','$contact', '$address','$c_id')";
    $insert=$db->insert($query);
    if($insert){
       echo "<script>alert('Record Created successfully');</script>";
// Code for redirection
    echo "<script>window.location.href='supplier.php'</script>"; 
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
            <h1 class="m-0 text-dark">Add Supplier</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item "><a href="supplier.php">Supplier</a></li>
              <li class="breadcrumb-item active">Add Supplier</li>
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
                <h3 class="card-title">Supplier Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Supplier Name</label>
                    <div class="col-sm-6">
                      <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="Enter Supplier Name">
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

                    <label for="inputPassword3" class="col-sm-2 col-form-label">Company</label>
                    <div class="col-sm-6">
                      <select class="browser-default custom-select" name="company">
        <?php 
            $query4="SELECT * FROM company";
            $read4=$db->select($query4);
            if ($read4) {
          while ($row4=$read4->fetch_assoc()) {

               ?>
                <option value="<?php echo $row4['c_id']; ?>"><?php echo $row4['name']; ?></option>
           <?php 
             }
           }
          ?>
                      </select>
                      
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