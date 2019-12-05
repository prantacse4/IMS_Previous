<?php
 
 
  include '../config/config.php';
  include '../config/Database.php';

  $db= new Database();


  //$id=$_GET['id'];
$id='19';
  
if(isset($_POST['submit2']))
{
  $p_name=mysqli_real_escape_string($db->link, $_POST['p_name']);
  $description=mysqli_real_escape_string($db->link, $_POST['description']);
  $product_code=mysqli_real_escape_string($db->link, $_POST['product_code']);
  $quantity_type=mysqli_real_escape_string($db->link, $_POST['quantity_type']);
  $cat_id= 'cat_id';
  $c_id=$_POST['c_id'];
  $quantity= $_POST['quantity'];
  $total_price= $_POST['total_price'];
  $avg_price=$total_price/$quantity;
  $mrp= $_POST['mrp'];
  $wholesale_price= $_POST['wholesale_price'];
  $mfg= $_POST['mfg'];
  $expire_date= $_POST['expire_date'];
  $location=mysqli_real_escape_string($db->link, $_POST['location']);

  $upload_dir = 'uploads/';
  $imgName = $_FILES['image']['name'];
  $imgTmp = $_FILES['image']['tmp_name'];
  $imgSize = $_FILES['image']['size'];

 //$imgExt = explode(".", strtolower($_FILES['image']['name']));
  $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
  $allowExt  = array('jpeg', 'jpg', 'png', 'gif');
  $userPic = time().'_'.rand(1000,9999).'.'.$imgExt;

  if(in_array($imgExt, $allowExt)){

        if($imgSize < 8000000){
          move_uploaded_file($imgTmp ,$upload_dir.$userPic);
        }else{
          $errorMsg = 'Image too large';
        }
      }else{
        $errorMsg = 'Please select a valid image';
      }
  if ($quantity_type=='' || $cat_id=='' || $c_id=='') {
    $error="Field must not be empty";
  }
  else
  {
    //$p_id=$_GET['id'];
    $query29="UPDATE INTO product
    SET
        cat_id='$cat_id',
        c_id='$c_id',
        p_name='$p_name',
        description='$description',
        product_code='$product_code',
        quantity_type='$quantity_type',
        quantity='$quantity',
        total_price='$total_price',
        avg_price='$avg_price',
        mrp='$mrp',
        wholesale_price='$wholesale_price',
        mfg='$mfg',
        expire_date='$expire_date',
        image='$userPic',
        location='$location'
        WHERE p_id =$p_id";
        $qq29 = $db->update($query29);
    if($qq29){
       echo "<script>window.location.href='product.php'</script>"; 
     }
     else{
      echo '$error';
     }
  }
 // echo "<script>window.location.href='product.php'</script>"; 
}

$query44 = "SELECT * FROM product WHERE p_id = '$id'";
$row=$db->select($query44)->fetch_assoc();



$query2="SELECT * FROM category";
  $row2=$db->select($query2);

  $query3="SELECT * FROM company";
  $row3=$db->select($query3);
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


<!-- Horizontal Form -->
            <div class="card card-info">
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
                      <input type="text" name="p_name" class="form-control"  placeholder="Enter Product Name" Required value="<?php echo $row['p_name'] ?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-6">
                      <input type="text" name="description" class="form-control"  placeholder="Description about product" Required value="<?php echo $row['description'] ?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Product Code</label>
                    <div class="col-sm-6">
                      <input type="text" name="product_code" class="form-control"  placeholder="Product code" Required value="<?php echo $row['product_code'] ?>">
                    </div>
                  </div>



                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Category Name</label>
                    
                    <div class="col-sm-6">
                       <div class="form-group">
                  <select name="cat_id" class="browser-default custom-select selectmenu">
                      
                      
                      <?php
                      
     if($row2) {
    while($row22=$row2->fetch_assoc()) {
      if($row22['cat_id']==$row['cat_id']){
        ?>
        <option value="<?php echo $row22['cat_id']; ?>" selected><?php echo $row22['name']; ?></option>
        <?php
      }
      else{
?>
                      <option value="<?php echo $row22['cat_id']; ?>"><?php echo $row22['name']; ?></option>
                      <?php } } } ?>
                      
                      </select>
                </div>
                    </div>
                  </div>




                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Company Name</label>
                    
                    <div class="col-sm-6">
                       <div class="form-group">
                  <select name="c_id" class="browser-default custom-select selectmenu">
                     
                      <?php
                      $query55="SELECT * FROM company";
                      $read55=$db->select($query55);
     if($read55) {
    while($row32=$read55->fetch_assoc()) {
      if($row32['c_id']==$row['c_id']){
        ?>
        <option value="<?php echo $row32['c_id']; ?>" selected> <?php echo $row32['name']; ?></option>
        <?php
      }
      else{
?>
                      <option value="<?php echo $row32['c_id']; ?>"><?php echo $row32['name']; ?></option>
                      <?php } } }?>
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

                 



                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Quantity</label>
                    <div class="col-sm-6">
                      <input type="text" name="quantity" class="form-control"  placeholder="Quantity"  Required value="<?php echo $row['quantity']; ?>">
                    </div>
                  </div>

                   <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Total Price</label>
                    <div class="col-sm-6">
                      <input type="text" name="total_price" class="form-control"  placeholder="Total price"  Required value="<?php echo $row['total_price']; ?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">MRP Price</label>
                    <div class="col-sm-6">
                      <input type="text" name="mrp" class="form-control"  placeholder="MRP price"  Required value="<?php echo $row['mrp']; ?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Wholesale Price</label>
                    <div class="col-sm-6">
                      <input type="text" name="wholesale_price" class="form-control"  placeholder="Wholesale price"  Required value="<?php echo $row['wholesale_price']; ?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">MFG</label>
                    <div class="col-sm-6">
                      <input type="date" name="mfg" class="form-control"  placeholder="Total price"  Required value="<?php echo $row['mfg']; ?>">
                    </div>
                  </div>

               

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Expire Date</label>
                    <div class="col-sm-6">
                      <input type="date" name="expire_date" class="form-control"  placeholder="Expire date"  Required value="<?php echo $row['expire_date']; ?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Image</label>
                    

                    <div class="col-sm-6">
                        <img src="<?php $upload_dir = 'uploads/';echo $upload_dir.$row['image']; ?>" width="100">
                        <input type="file" name="image" class="form-control"  placeholder="Choose image" >
                      </div>
                  </div>


                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Location</label>
                    <div class="col-sm-6">
                      <input type="text" name="location" class="form-control"  placeholder="Location"  Required value="<?php echo $row['location']; ?>">
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

      <?php
  include '../inc/footer.php';
?>