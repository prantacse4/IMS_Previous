<?php
	include '../inc/header2.php';
//	include '../inc/sidebar.php';
//  include '../config/config.php';
 // include '../config/Database.php';
 // $db= new Database();
 // $query="SELECT * FROM category";
 // $read=$db->select($query);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Product Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
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




	     <div class="card">
            <div class="card-header">
              <h3 class="card-title">Product Category Information</h3>
                <a href="cat_create.php" class="abutton">Add Category</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body" >
              <div style="overflow-x:auto;">
              <table  id="example1" class="table table-bordered table-striped forproducttable" >
                <thead style="background-color: #1abc9c;">
                <tr>
                  <th>Product Name</th>
                  <th>Description</th>
                  <th>Product Code</th>
                  <th>Quatity Type</th>
                  <th>Quantity</th>
                  <th>Total Price</th>
                  <th>Avarage Price</th>
                  <th>MRP</th>
                  <th>Wholesale Price</th>
                  <th>MFG Date</th>
                  <th>Expire Date</th>
                  <th>Image</th>
                  <th>Location</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
<?php
      //    if($read) {
        //    while($row=$read->fetch_assoc()) {
?>

                <tr>
                  <td>aa<?php // echo $row['name'];?></td>
                  <td>aa<?php // echo $row['description'];?></td>
                  <td>aa<?php // echo $row['status'];?></td>
                  <td>sghjka</td>
                  <td>sghjka</td>
                  <td>sghjka</td>
                  <td>sghjka</td>
                  <td>sghjka</td>
                  <td>sghjka</td>
                  <td>sghjka</td>
                  <td>sghjka</td>
                  <td>sghjka</td>
                  <td>sghjka</td>
                  <td>
                    <a href="cat_view.php?id=<?php // echo $row['id']; ?>" style="color: white;"> 
                      <button  class="btn btn-info">
                        <span class="far fa-eye"></span>
                      </button> 
                  </a>
                  <a href="cat_edit.php?id=<?php // echo $row['id']; ?>" style="color: white;"> 
                    <button class="btn btn-success">
                      <span class="fa fa-edit"></span>
                    </button>
                  </a>
                  <a href="cat_delete.php?id=<?php // echo $row['id']; ?>" style="color: white;"> 
                    <button class="btn btn-danger">
                      <span class="fa fa-trash-alt"></span>
                    </button>
                  </a>
                   
                  </td>
                </tr>
<?php // } } ?>
              </tbody>
              </table>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </section>


<?php
	include '../inc/footer.php';
?>