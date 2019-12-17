<?php
//insert.php;
  include 'config/config.php';
  include 'config/Database.php';

  $db= new Database();
if(isset($_POST["pro_id"]))
{ 
  $connect = new PDO("mysql:host=localhost;dbname=stock", "root", "");

   $pur_code='111';
  $pur_date=$_POST['pur_date'];
  $pur_company=$_POST['com_id'];
  $pur_supplier=$_POST['sup_id'];
  $pur_price=$_POST['total_pur_price'];
  $pur_paid=$_POST['total_payment'];
  $pur_due=$_POST['due'];
  $pur_discount=$_POST['discount_amount'];
  $added_date='2019-12-06 19:31:21';
  $added_by='user';

  $query22 = "SELECT * FROM purchase order by pur_id DESC LIMIT 1";
  $row = $db->select($query22)->fetch_assoc();
  $id=$row['pur_id']+1;

  if($pur_discount>0){
    $qq2="INSERT INTO purchase_discount(com_id,dis_amount) 
    VALUES('$pur_company','$pur_discount')";

    $state12 = $connect->prepare($qq2);
    $state12->execute();
    $result222 = $state12->fetchAll();
  }
  if($pur_due>0){
    $qq3="INSERT INTO purchase_due(pur_com, pur_due, due_payment_date) 
    VALUES('$pur_company', '$pur_due', '2019-12-20')";

    $state13 = $connect->prepare($qq3);
    $state13->execute();
    $result223 = $state13->fetchAll();
  }

$q="INSERT INTO purchase(pur_code,    pur_date,pur_company,pur_supplier,pur_price,pur_paid,pur_due,pur_discount,added_date,added_by) 
  VALUES('$pur_code', '$pur_date', '$pur_company', '$pur_supplier', '$pur_price', '$pur_paid', '$pur_due','$pur_discount','$added_date','$added_by')";

  
  
 

  $state = $connect->prepare($q);
  $state->execute();
  $result2 = $state->fetchAll();

 $order_id = uniqid();
 for($count = 0; $count < count($_POST["pro_id"]); $count++)
 {  
  $query = "INSERT INTO purchase_product
  (     pur_id,        pro_id,  pro_qty,  pro_purchase_price, pro_selling_price, pur_price) 
  VALUES ( '$id', :pro_id, :pro_qty, :pro_pur_price,     :sale_price,    :total_amount)
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    
    ':pro_id'  => $_POST["pro_id"][$count], 
    ':pro_qty'  => $_POST["pro_qty"][$count],
    ':pro_pur_price'  => $_POST["pro_pur_price"][$count],
    ':sale_price'  => $_POST["sale_price"][$count],
    ':total_amount'  => $_POST["total_amount"][$count]
   )
  );
 }
 $result = $statement->fetchAll();

 if(isset($result))
 {
  echo 'ok';
 }
}
?>
