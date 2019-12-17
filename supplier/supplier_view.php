<?php 
include 'header3.php';

$id="";
$id = $_GET['id'];

$query2 = "SELECT * FROM supplier WHERE s_id = '$id'";
//$row = $db->select($query2)->fetch_assoc();
$res = $db->select($query2);
$row = $res->fetch_assoc();

$c_id=$row['c_id'];
$query3 = "SELECT * FROM company WHERE c_id = '$c_id'";
$res3 = $db->select($query3);
$row2 = $res3->fetch_assoc();
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">View Supplier Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item "><a href="supplier.php">Supplier</a></li>
              <li class="breadcrumb-item active">View Supplier</li>
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
              <form class="form-horizontal" action="supplier.php" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Supplier Name</label>
                    <div class="col-sm-6">
                      <p style="padding-top :8px;">: <?php echo $row['name']; ?></p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Contact No.</label>
                    <div class="col-sm-6">
                      <p style="padding-top :8px;">: <?php echo $row['contact']; ?></p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-6">
                      <p style="padding-top :8px;">: <?php echo $row['address']; ?></p>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Company Name</label>
                    <div class="col-sm-6">
                      <p style="padding-top :8px;">: <?php echo $row2['name']; ?></p>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
                    
                    <div class="col-sm-4">
                      <button type="submit" name="update" class="btn btn-success">Back</button>
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