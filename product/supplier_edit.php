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
  $c_id = mysqli_real_escape_string($db->link, $_POST['company']);
  $query = "UPDATE supplier
  SET
    name='$name',
    contact = '$contact',
    address = '$address',
    c_id='$c_id'
    WHERE s_id ='$id' ";
  $update = $db->update($query);

    echo "<script>alert('Record Updated successfully');</script>";
    echo "<script>window.location.href='supplier.php'</script>"; 
    
}
 if(isset($_POST['cancel'])){
  echo "<script>window.location.href='supplier.php'</script>"; 
 }
$query2 = "SELECT * FROM supplier WHERE s_id = $id ";
$row = $db->select($query2)->fetch_assoc();

$c_id=$row['c_id'];
$query3 = "SELECT * FROM company WHERE c_id = $c_id ";
$row2 = $db->select($query3)->fetch_assoc();

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
              <li class="breadcrumb-item "><a href="supplier.php">Supplier</a></li>
              <li class="breadcrumb-item active">Edit Supplier</li>
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

                    <label for="inputPassword3" class="col-sm-2 col-form-label">Company</label>
                    <div class="col-sm-6">
                      


                        <select class="browser-default custom-select" name="company">
        <?php 
            $query4="SELECT * FROM company";
            $read4=$db->select($query4);
            if ($read4) {
          while ($row4=$read4->fetch_assoc()) {
            if($row['c_id']==$row4['c_id']){
              ?>
               <option selected value="<?php echo $row4['c_id']; ?>"><?php echo $row4['name']; ?></option>
               <?php
            }
            else{
               ?>
                <option value="<?php echo $row4['c_id']; ?>"><?php echo $row4['name']; ?></option>
           <?php 
         }
             }
           }
          ?>
                      </select>





                      
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