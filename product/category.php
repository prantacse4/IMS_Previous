<?php
  $page='';
  $page = 'product_category';
	include 'header3.php';
  include '../config/config.php';
  include '../config/Database.php';
  $db= new Database();
  $query="SELECT * FROM category";
  $read=$db->select($query);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text2">P r o d u c t &nbsp; C a t e g o r y</h1>
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
              <h3 class="card-title card-title2">Product Category Information</h3>
                <a href="cat_create.php" class="btn btn-success btn-add"><i class="fa fa-plus"></i> Add Category</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped  tablepranta">
                <thead class="theadcolor">
                <tr>
                  <th>Category Name</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody class="tablepranta2">
<?php
     if($read) {
    while($row=$read->fetch_assoc()) {
?>

                <tr>
                  <td><?php echo $row['cat_name'];?></td>
                  <td><?php echo $row['cat_desc'];?></td>
                  <td>
                    <a href="cat_view.php?id=<?php echo $row['cat_id']; ?>" style="color: white;"> 
                      <button  class="btn btn-info">
                        <span class="fa fa-eye"></span>
                      </button> 
                  </a>
                  <a href="cat_edit.php?id=<?php echo $row['cat_id']; ?>" style="color: white;"> 
                    <button class="btn btn-success">
                      <span class="fa fa-edit"></span>
                    </button>
                  </a>
                  <a href="cat_delete.php?id=<?php echo $row['cat_id']; ?>" style="color: white;"> 
                    <button class="btn btn-danger">
                      <span class="fa fa-trash-alt"></span>
                    </button>
                  </a>
                   
                  </td>
                </tr>
<?php } } ?>
              </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </section>


<?php
	include '../inc/footer.php';
?>