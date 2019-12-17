<?php
  $page='';
  $page = 'product_list';
  include 'header3.php';
  $query="SELECT * FROM product";
  $read=$db->select($query);

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
            <h1 class="m-0 text2">P r o d u c t s &nbsp; A v a i l a b l e</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
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
      <h3 class="card-title card-title2">Product Information</h3>
         <a href="pro_create.php" class="btn btn-success btn-add"> <i class="fa fa-plus"></i> Add Product</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body" >
              <div style="overflow-x:auto;">
              <table  id="example1" class="table table-bordered table-striped forproducttable tablepranta" >
                <thead class="theadcolor">
                <tr>
                  <th>Product Name</th>
                  <th>Product Code</th>
                  <th>Quantity</th>
                  <th>MRP</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody class="tablepranta2">
<?php
       if($read) {

        while($row=$read->fetch_assoc()) {
          $cat_id=$row['pro_cat'];
          $query4="SELECT * FROM category where cat_id='$cat_id'";
          $cat=$db->select($query4);

          $com_id=$row['pro_com'];
          $query5="SELECT * FROM company where com_id='$com_id'";
          $com=$db->select($query5);

?>

        <tr>
          <td><?php  echo $row['pro_name'];?></td>
         <td><?php  echo $row['pro_code'];?></td>
         <td><?php  echo $row['pro_qty'];?></td>
        <td><?php  echo $row['pro_mrp'];?></td>
         <td>


           <?php $pro_id =$row['pro_id'];  ?>

      <button class="btn btn-info" data-toggle="modal" data-target="#myModal-<?php echo $pro_id;  ?>">
            <span class="far fa-eye"></span>
       </button> 


        <div class="modal fade" id="myModal-<?php echo $pro_id; ?>" role="dialog">
                <div class="modal-dialog modal-lg">
      <!-- Modal content-->
                  <div class="modal-content">
                   <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   </div>
                 <div class="modal-body">
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
              
       
                <div class="card-body">
                  <div class="form-group row">
           <label for="inputEmail3" class="col-sm-2 col-form-label">Product Name</label>
             <div class="col-sm-6">
               <p style="padding-top :8px;">: <?php echo $row['pro_name']; ?></p>
           </div>
        </div>

                  <div class="form-group row">
       <label for="inputPassword3" class="col-sm-2 col-form-label">Quantity</label>
       <div class="col-sm-6">
     <p style="padding-top :8px;">: <?php echo $row['pro_qty']; ?></p>
     </div>
      </div>


                
                                                    <div class="form-group row">
                                                      <label for="inputPassword3" class="col-sm-2 col-form-label">Category</label>
                                                        <div class="col-sm-6">
                                                         <p style="padding-top :8px;">: <?php echo $row['pro_cat']; ?></p>
                                                      </div>
                                                    </div>


                            <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Company</label>
            <div class="col-sm-6">
            <p style="padding-top :8px;">: <?php echo $row['pro_com']; ?></p>
              </div>
            </div>

            <div class="form-group row">
      <label for="inputPassword3" class="col-sm-2 col-form-label">Purchase Price</label>
      <div class="col-sm-6">
      <p style="padding-top :8px;">: <?php echo  $row['pro_pprice']; ?></p>
        </div>
      </div>

       <div class="form-group row">
      <label for="inputPassword3" class="col-sm-2 col-form-label">Wholesale Price</label>
      <div class="col-sm-6">
      <p style="padding-top :8px;">: <?php echo  $row['pro_wholesale']; ?></p>
        </div>
      </div>

      <div class="form-group row">
      <label for="inputPassword3" class="col-sm-2 col-form-label">MRP Price</label>
      <div class="col-sm-6">
      <p style="padding-top :8px;">: <?php echo  $row['pro_mrp']; ?></p>
        </div>
      </div>

      <div class="form-group row">
      <label for="inputPassword3" class="col-sm-2 col-form-label">Location</label>
      <div class="col-sm-6">
      <p style="padding-top :8px;">: <?php echo  $row['pro_location']; ?></p>
        </div>
      </div>

      <div class="form-group row">
      <label for="inputPassword3" class="col-sm-2 col-form-label">Notes</label>
      <div class="col-sm-6">
      <p style="padding-top :8px;">: <?php echo  $row['pro_notes']; ?></p>
        </div>
      </div>



 

         <div class="form-group row">
         <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
          </div>
         </div>
                <!-- /.card-body -->
         </div>
            <!-- /.card -->
    </div>
  </section>

               </div>
              

             <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>

           </div>
         </div> 

     </div>


                <a href="pro_edit.php?id=<?php echo $row['pro_id']; ?>" style="color: white;"> 
                    <button class="btn btn-success">
                      <span class="fa fa-edit"></span>
                    </button>
                  </a>










                  <a href="pro_delete.php?id=<?php  echo $row['pro_id']; ?>" style="color: white;"> 
                    <button class="btn btn-danger">
                      <span class="fa fa-trash-alt"></span>
                    </button>
                  </a>





                   
                  </td>
                </tr>
<?php  } } ?>
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