<?php 

include "../config/library.php";
$id = $_GET['id'];
$db = new Database();
  $query = "DELETE FROM category WHERE cat_id=$id";
  $delete = $db->delete($query);

 ?>