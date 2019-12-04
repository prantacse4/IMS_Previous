<?php
  //include '../inc/header.php';
  include '../inc/sidebar.php';
  include '../config/config.php';
  include '../config/Database.php';
  $db= new Database();
if(isset($_POST['submit2']))
{
  $p_name=mysqli_real_escape_string($db->link, $_POST['p_name']);
  $description=mysqli_real_escape_string($db->link, $_POST['description']);
  $product_code=mysqli_real_escape_string($db->link, $_POST['product_code']);
  $quantity_type=mysqli_real_escape_string($db->link, $_POST['quantity_type']);
  $cat_id= $_POST['cat_id'];
  $c_id=$_POST['c_id'];
  $quantity= $_POST['quantity'];
  $total_price= $_POST['total_price'];
  $avg_price=$total_price/$quantity;
  $mrp= $_POST['mrp'];
  $wholesale_price= $_POST['wholesale_price'];
  $mfg= $_POST['mfg'];
  $expire_date= $_POST['expire_date'];
  $location=mysqli_real_escape_string($db->link, $_POST['location']);

  $imgName = $_FILES['image']['name'];
    $imgTmp = $_FILES['image']['tmp_name'];
    $imgSize = $_FILES['image']['size'];
    $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
      $allowExt  = array('jpeg', 'jpg', 'png', 'gif');
      $userPic = time().'_'.rand(1000,9999).'.'.$imgExt;
      move_uploaded_file($imgTmp ,$upload_dir.$userPic);


  if ($quantity_type=='' || $cat_id=='' || $c_id=='') {
    $error="Field must not be empty";
  }
  else
  {
    $query="INSERT INTO product(p_name, description, product_code,quantity_type,cat_id,c_id,quantity,total_price,avg_price,mrp,wholesale_price,mfg,expire_date,image,location) VALUES('$p_name', '$description', '$product_code','$quantity_type','$cat_id','$c_id','$quantity','$total_price','$avg_price','$mrp','$wholesale_price','$mfg','$expire_date','$userPic','$location')";
    $insert=$db->insert($query);
    if($insert){
       echo "<script>window.location.href='product.php'</script>"; 
     }
     else{
      echo '$error';
     }
  }
  echo "<script>window.location.href='product.php'</script>"; 
}
?>


<?php
$query2="SELECT * FROM category";
  $row2=$db->select($query2);

  $query3="SELECT * FROM company";
  $row3=$db->select($query3);
?>






<?php 
include "../inc/header2.php";include '../inc/sidebar.php';
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
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Product Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="cat_create.php" method="post">
                <div class="card-body">

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Product Name</label>
                    <div class="col-sm-6">
                      <input type="text" name="p_name" class="form-control"  placeholder="Enter Product Name" Required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-6">
                      <input type="text" name="description" class="form-control"  placeholder="Description about product" Required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Product Code</label>
                    <div class="col-sm-6">
                      <input type="text" name="product_code" class="form-control"  placeholder="Product code" Required>
                    </div>
                  </div>



                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Category Name</label>
                    
                    <div class="col-sm-6">
                       <div class="form-group">
                  <select name="cat_id" class="browser-default custom-select selectmenu">
                      
                      <option value="" selected>Select Category</option>

                      <?php
     if($row2) {
    while($row22=$row2->fetch_assoc()) {
?>
                      <option value="<?php echo $row22['id']; ?>"><?php echo $row22['name']; ?></option>
                      <?php } } ?>
                      
                      </select>
                </div>
                    </div>
                  </div>




                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Company Name</label>
                    
                    <div class="col-sm-6">
                       <div class="form-group">
                  <select name="c_id" class="browser-default custom-select selectmenu">
                      <option value="" selected>Select Company</option>
                      <?php
     if($row3) {
    while($row32=$row3->fetch_assoc()) {
?>
                      <option value="<?php echo $row32['name']; ?>"><?php echo $row32['name']; ?></option>
                      <?php } } ?>
                      </select>
                </div>
                    </div>
                  </div>




                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Quantity Type</label>
                    
                    <div class="col-sm-6">
                       <div class="form-group">
                  <select name="quantity_type" class="browser-default custom-select selectmenu">
                      <option value="" selected>Select Quantity type</option>
                      <option value="kg">Kg</option>
                      <option value="piece">Piece</option>
                      <option value="unit">Unit</option>
                      </select>
                </div>
                    </div>
                  </div>

                  <script type="text/javascript">function selectValidation() {
            var selectIsValid = true;
            $('.selectmenu').each(function(){
                if($(this).val()==='') {
                    selectIsValid = false;
                } else {
                    selectIsValid = true;
                }
            });
            console.log(selectIsValid);
            if(selectIsValid) {
            }
            return false;
        }</script>



                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Quantity</label>
                    <div class="col-sm-6">
                      <input type="text" name="quantity" class="form-control"  placeholder="Quantity"  Required>
                    </div>
                  </div>

                   <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Total Price</label>
                    <div class="col-sm-6">
                      <input type="text" name="total_price" class="form-control"  placeholder="Total price"  Required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">MRP Price</label>
                    <div class="col-sm-6">
                      <input type="text" name="mrp" class="form-control"  placeholder="MRP price"  Required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Wholesale Price</label>
                    <div class="col-sm-6">
                      <input type="text" name="wholesale_price" class="form-control"  placeholder="Wholesale price"  Required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">MFG</label>
                    <div class="col-sm-6">
                      <input type="date" name="mfg" class="form-control"  placeholder="Total price"  Required>
                    </div>
                  </div>

               

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Expire Date</label>
                    <div class="col-sm-6">
                      <input type="date" name="expire_date" class="form-control"  placeholder="Expire date"  Required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-6">
                      <input type="file" name="image" class="form-control"  placeholder="Choose image" >
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Location</label>
                    <div class="col-sm-6">
                      <input type="text" name="location" class="form-control"  placeholder="Location"  Required>
                    </div>
                  </div>



 
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-4">
                      <button type="submit" name="submit2" class="btn btn-success">Submit</button>
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

