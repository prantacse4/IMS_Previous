<?php
//insert.php;
  include 'config/config.php';
  include 'config/Database.php';

  $db= new Database();
if(isset($_POST["pro_id"]))
{ 
  $connect = new PDO("mysql:host=localhost;dbname=stock", "root", "");

  //$sale_date=$_POST['sale_date'];
  
  $sale_date='2019-12-06 09:17:19';
  $sale_cus=$POST['sale_cus'];
  $sale_by='user';
  $sale_amount=$_POST['sale_amount'];
  $sale_discount=$_POST['discount_amount'];
  $sale_payment=$_POST['total_payment'];
  $sale_due=$_POST['due'];
  $sale_type=$_POST['sale_type'];
  
  

  $query22 = "SELECT * FROM sale order by sale_id DESC LIMIT 1";
  $row = $db->select($query22)->fetch_assoc();
  $id=$row['sale_id']+1;

  if($sale_due>0){
    $q4="INSERT INTO sale_due(sale_cus, sale_due, due_payment_date) 
    VALUES('$sale_cus', '$sale_due', '2019-12-20')";

    $s22 = $connect->prepare($q4);
    $s22->execute();
    $res223 = $s22->fetchAll();
  }
$q2="INSERT INTO sale(sale_cus,sale_by,sale_amount,sale_discount,sale_payment,sale_due,sale_type) 
  VALUES('$sale_cus','$sale_by','$sale_amount','$sale_discount','$sale_payment','$sale_due','$sale_type')";

  $state2 = $connect->prepare($q2);
  $state2->execute();
  $result23 = $state2->fetchAll();

 for($count = 0; $count < count($_POST["pro_id"]); $count++)
 {  
  $query2 = "INSERT INTO sale_product
     (     sale_id, pro_id,  pro_qty,  sale_price,   sale_total_amount) 
  VALUES ( '$id',  :pro_id, :pro_qty,  :sale_price, :total_amount)
  ";
  $statement2 = $connect->prepare($query2);
  $statement2->execute(
   array(
    
    ':pro_id'  => $_POST["pro_id"][$count], 
    ':pro_qty'  => $_POST["pro_qty"][$count],
    ':sale_price'  => $_POST["sale_price"][$count],
    ':total_amount'  => $_POST["total_amount"][$count]
   )
  );
 }
 $result3 = $statement2->fetchAll();

 if(isset($result3))
 {
  echo 'ok';
 }
}
?>
