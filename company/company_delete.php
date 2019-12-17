<?php
  include '../config/config.php';
  include '../config/Database.php';

 ?>
 <?php 
  $db=new Database();
  $query="SELECT * FROM company";
  $read=$db->select($query);

if (isset($_GET['id'])) {
   $id = $_GET['id'];
   $query = "delete from company where com_id='$id'";
   $result = $db->delete($query);
    if($result){
       echo "<script>alert('Deleted successfully');</script>";
// Code for redirection
    echo "<script>window.location.href='company.php'</script>"; 
    }
   }

  ?>