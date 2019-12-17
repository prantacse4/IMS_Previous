<?php 

include "../config/library.php";
$id = $_GET['id'];
$db = new Database();
  $query = "DELETE FROM product WHERE pro_id=$id";
  $delete = $db->delete($query);
  if($delete){
       echo "<script>window.location.href='product.php'</script>"; 
     }
     else{
      echo '$error';
     }

 ?>