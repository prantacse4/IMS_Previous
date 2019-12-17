<?php
$page='';
  $page = 'product_list';
  include 'header3.php';
  
if(isset($_POST['submit2']))
{
  $pro_name=mysqli_real_escape_string($db->link, $_POST['pro_name']);
  $pro_code=mysqli_real_escape_string($db->link, $_POST['pro_code']);
  $cat_id= $_POST['pro_cat'];
  $com_id=$_POST['pro_com'];
  $pro_type=mysqli_real_escape_string($db->link, $_POST['pro_type']);
  $pro_qty= $_POST['pro_qty'];
  $pro_pprice= $_POST['pro_pprice'];
  $pro_wholesale= $_POST['pro_wholesale'];
  $pro_mrp= $_POST['pro_mrp'];
  $pro_location=mysqli_real_escape_string($db->link, $_POST['pro_location']);
  $pro_notes=mysqli_real_escape_string($db->link, $_POST['pro_notes']);





  if ($pro_type=='' || $cat_id=='' || $com_id=='') {
    $error="Field must not be empty";
  }
  else
  {
    $query="INSERT INTO product(pro_name,pro_code,pro_cat,pro_com,pro_type,pro_qty,pro_pprice,pro_wholesale,pro_mrp,pro_location,pro_notes) 
    VALUES
    ('$pro_name','$pro_code','$cat_id','$com_id','$pro_type','$pro_qty','$pro_pprice','$pro_wholesale','$pro_mrp','$pro_location','$pro_notes')";
    $insert=$db->insert($query);
    if($insert){
       echo "<script>window.location.href='product.php'</script>"; 
     }
     else{
      echo '$error';
     }
  }
}
 // echo "<script>window.location.href='product.php'</script>"; 
?>


<?php
$query2="SELECT * FROM category";
  $row2=$db->select($query2);

  $query3="SELECT * FROM company";
  $row3=$db->select($query3);
?>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Product Information</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item "><a href="product.php">Products</a></li>
              <li class="breadcrumb-item active">Add Product</li>
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
                <h3 class="card-title">Product Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                <div class="card-body">

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Product Name</label>
                    <div class="col-sm-6">
                      <input type="text" name="pro_name" class="form-control"  placeholder="Enter Product Name" Required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Notes</label>
                    <div class="col-sm-6">
                      <input type="text" name="pro_notes" class="form-control"  placeholder="Description about product" Required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Product Code</label>
                    <div class="col-sm-6">
                      <input type="text" name="pro_code" class="form-control"  placeholder="Product code" Required>
                    </div>
                  </div>



                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Category Name</label>
                    
                    <div class="col-sm-6">
                       <div class="form-group">
                  <select name="pro_cat" class="browser-default custom-select selectmenu">
                      
                      <option value="" selected>Select Category</option>

                      <?php
     if($row2) {
    while($row22=$row2->fetch_assoc()) {
?>
                      <option value="<?php echo $row22['cat_id']; ?>"><?php echo $row22['cat_name']; ?></option>
                      <?php } } ?>
                      
                      </select>
                </div>
                    </div>
                  </div>




                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Company Name</label>
                    
                    <div class="col-sm-6">
                       <div class="form-group">
                  <select name="pro_com" class="browser-default custom-select selectmenu">
                      <option value="" selected>Select Company</option>
                      <?php
     if($row3) {
    while($row32=$row3->fetch_assoc()) {
?>
                      <option value="<?php echo $row32['com_id']; ?>"><?php echo $row32['com_name']; ?></option>
                      <?php } } ?>
                      </select>
                </div>
                    </div>
                  </div>




                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Quantity Type</label>
                    
                    <div class="col-sm-6">
                       <div class="form-group">
                  <select name="pro_type" class="browser-default custom-select selectmenu">
                      <option value="" selected>Select Quantity type</option>
                      <option value="kg">Kg</option>
                      <option value="piece">Piece</option>
                      <option value="unit">Unit</option>
                      </select>
                </div>
                    </div>
                  </div>

                 



                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Quantity</label>
                    <div class="col-sm-6">
                      <input type="number" name="pro_qty" class="form-control"  placeholder="Quantity"  Required>
                    </div>
                  </div>

                   <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Purchasing Price</label>
                    <div class="col-sm-6">
                      <input type="text" name="pro_pprice" class="form-control"  placeholder="Total price"  Required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">MRP Price</label>
                    <div class="col-sm-6">
                      <input type="text" name="pro_mrp" class="form-control"  placeholder="MRP price"  Required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Wholesale Price</label>
                    <div class="col-sm-6">
                      <input type="text" name="pro_wholesale" class="form-control"  placeholder="Wholesale price"  Required>
                    </div>
                  </div>


               




                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Location</label>
                    <div class="col-sm-6">
                      <input type="text" name="pro_location" class="form-control"  placeholder="Location"  Required>
                    </div>
                  </div>



 
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-4">
                      <button type="submit" name="submit2" class="btn btn-success btn-2">Submit</button>
                      <button type="reset" class="btn btn-danger btn-2">Reset</button>
                      <a class="btn btn-info " href="product.php">Go Back</a>
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