<?php
//index.php
$ck=0;
$cnt=0;
$connect = new PDO("mysql:host=localhost;dbname=stock", "root", "");
function fill_unit_select_box($connect)
{ 
 $output = '';
 $query = "SELECT * FROM company ORDER BY com_id DESC";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["com_id"].'">'.$row["com_name"].'</option>';
 }
 return $output;
}
function fill_unit_select_box1($connect)
{ 
 $output = '';
 $query = "SELECT * FROM company ORDER BY com_id DESC";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["com_id"].'">'.$row["com_name"].'</option>';
 }
 return $output;
}
function fill_unit_select_box2($connect)
{ 
 $output = '';
 $query = "SELECT * FROM supplier ORDER BY sup_id DESC";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["sup_id"].'">'.$row["sup_name"].'</option>';
 }
 return $output;
}
function fill_unit_select_box3($connect)
{ 
 $output = '';
 $query = "SELECT * FROM product ORDER BY pro_id DESC";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["pro_id"].'">'.$row["pro_name"].'</option>';
 }
 return $output;
}

?>

<?php 

include 'inc/header2.php';
date_default_timezone_set("Asia/Dhaka");
 ?>

 <link rel="stylesheet" type="text/css" href="inc/style.css">
 <div class="text-center">
  <h1>Purchase</h1>
 </div>

  <form method="post" id="insert_form">

 <div class="contents">
  <h3 class="headingc">Purchase</h3>
    <div class="d-flex">
      <div class="mr-auto p-2">

  <table class="table">
  <tbody>

    <tr>
      <th scope="row">Purchase Number</th>
      <td><input class="form-control" type="text" name="pur_number" value="<?php echo '100' ?>" readonly></td>
    </tr>
    
    <tr>
      <th scope="row">Company</th>
    <td><select name="com_id" class="form-control com_id" required ><option value="">Select Company</option><?php echo fill_unit_select_box1($connect); ?></select></td>
    </tr>

    <tr>
      <th scope="row">Supplier</th>
       <td>
      <select name="sup_id" class="form-control sup_id" required><option value="">Select Supplier</option>    <?php echo fill_unit_select_box2($connect); ?></select>
       </td>
    </tr>

    <tr>
      <th scope="row">Purchase Date</th>
          <td>
            <input class="form-control" type="date" name="pur_date" id="today2" >
          </td>
  </tr>
     <tr>
      <th scope="row">Total Balance</th>
      <td><input  class="form-control" type="number" name="total_balance" value="" Readonly ></td>
    </tr>
    <tr>
      <th scope="row">Total Amount</th>
      <td><input class="form-control" type="number" name="total_pur_price" value="" readonly placeholder="Automatically Filled" id="total_amount1"></td>
    </tr>
        
  </tbody>
    </table>
  
  </div>

  <div class="p-2">
      <table class="table">
        <tbody>
       <tr>
          <th scope="row">Discount Type</th>
           <td><select onclick="discount2();" class="browser-default custom-select custom-select-lg mb-3" name="discount" id="dis">
                 <option onclick="discount2();" value="2" selected>Amount</option>
                 <option onclick="discount2();" value="1">Perchantage</option>
                 
              </select>
            </td>
        </tr>

    <tr>
      <th scope="row">Total Discount</th>
      <td><input id="total_discount" onkeyup="discount2()" class="form-control" type="number" name="total_discount" value="" max='' ></td>
    </tr>

    <tr>
      <th scope="row">Discount Amount</th>
      <td><input  class="form-control" type="number" name="discount_amount" id="discount_amount" value="" Readonly placeholder="Automatically Filled"></td>
    </tr> 

    <tr>
      <th scope="row">Payable Amount</th>
      <td><input  class="form-control" type="number" name="payable_amount" id="payable_amount" value="" Readonly placeholder="Automatically Filled"></td>
    </tr> 
    <tr>
      <th scope="row">Payment</th>
      <td><input  class="form-control" type="number" name="total_payment" id="payment" onkeyup="payment2()" value="" required></td>
    </tr>
    
    <tr>
      <th scope="row">Due</th>
      <td><input  class="form-control" type="number" name="due" id="due" value="" Readonly placeholder="Automatically Filled"></td>
    </tr>
      </tbody>
   </table>
  </div>
</div>
</div>

<br>








<div class="contents">
  <h3 class="headingc c2">Purchase Details <span><button type="button" name="add" class="pluss add"> + </button></span></h3>
<div class="d-flex">
  <div class="mr-auto p-2 p234">

   
    <div class="table-repsonsive">
     <span id="error"></span>
     <table class="table" id="item_table">
      <tbody>
      <tr>
        <th scope="row"> </th>

      <th scope="row" class="text-center">Product</th>
      <th scope="row" class="text-center">Quantity</th>
      <th scope="row" class="text-center">Purchasing Price</th>
      <th scope="row" class="text-center">Selling Price</th>
      <th scope="row" class="text-center">Total Amount</th>
       
      </tr>
    </tbody>
     </table>
    

    </div>

  </div>

    </div>
    </div><br>
      <div align="center">
         <input type="submit" name="submit" class="btn btn-info" value="Purchase" />
     </div>
<br>

</form>

<div class="text-center">
  <a class="btn btn-info" href="sale.php">Sale</a>
</div>
<?php 
include 'inc/footer.php';
 ?>
<script>
$(document).ready(function(){
 
var html = '';
  html += '<tr>'; 
  html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove">&#9940;</button></td>';
  html += '<td><select name="pro_id[]" class="form-control pro_id" required ><option value="" required >Select Product</option><?php echo fill_unit_select_box3($connect); ?></select></td>';

  html += '<td><input type="number" name="pro_qty[]" class="form-control pro_qty" onkeyup ="calculate(0)" id="qty-0" required /></td>';
  html += '<td><input type="number" name="pro_pur_price[]" class="form-control pro_pur_price" onkeyup ="calculate(0)" id="pur-0" required/></td>';
   html += '<td><input type="number" name="sale_price[]" class="form-control sale_price" onkeyup ="calculate(0)" id="sale-0" required /></td>';


  html += '<td><input type="number" value ="" name="total_amount[]" class="form-control total_amount" readonly id="total-0"/></td></tr>';

 $('#item_table').append(html);

 var cnt2=0;
 $(document).on('click', '.add', function(){


  cnt2=cnt2+1;
  var html = '';
  html += '<tr>'; 
  html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove">&#9940;</span></button></td>';
  
  html += '<td><select name="pro_id[]" class="form-control pro_id"><option value="" required >Select Product</option><?php echo fill_unit_select_box3($connect); ?></select></td>';

  html += '<td><input type="number" name="pro_qty[]" class="form-control pro_qty" onkeyup ="calculate('+cnt2+')" id="qty-'+cnt2+'" required /></td>';
  html += '<td><input type="number" name="pro_pur_price[]" class="form-control pro_pur_price" onkeyup ="calculate('+cnt2+')" id="pur-'+cnt2+'" required /></td>';
  html += '<td><input type="number" name="sale_price[]" class="form-control sale_price" onkeyup ="calculate('+cnt2+')" id="sale-'+cnt2+'" required /></td>';
  
  html += '<td><input type="number" value ="0" name="total_amount[]" class="form-control total_amount" readonly id="total-'+cnt2+'"/></td></tr>';

  
 

  $('#item_table').append(html);
 });
 
 $(document).on('click', '.remove', function(){
  
  if(confirm("Are you sure, want to delete this?"))
       {
       $(this).closest('tr').remove();
       fun1();
      }
 });
 
 $('#insert_form').on('submit', function(event){
  event.preventDefault();
  var error = '';
  
  $('.pro_id').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "Select Product in Row "+count+" \n";
    return false;
   }
   count = count + 1;
  });
   $('.pro_qty').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "Enter Quantity in Row "+count+" \n";
    return false;
   }
   count = count + 1;
  });
  $('.pro_pur_price').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "Enter Purchase Price in Row "+count+"\n";
    return false;
   }
   count = count + 1;
  });
  $('.sale_price').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "Enter Selling Price in Row  "+count+"\n";
    return false;
   }
   count = count + 1;
  });
 
  
  var form_data = $(this).serialize();

  if(error == '')
  {
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     
      $('#item_table').find("tr:gt(0)").remove();
      alert("Successfully Inserted");
     
    }
   });
  }
  else
  {
   alert(error);
  }
 });
 
});

  function calculate(x){
      var quan=document.getElementById('qty-'+x).value;
    var purchase=document.getElementById('pur-'+x).value;
    var bef=document.getElementById('total-'+x).value;
      document.getElementById('total-'+x).value=(quan*purchase);
      fun1();
     
    
  }
   function payment2(){
      var payable=document.getElementById("payable_amount").value;
  var pay=document.getElementById("payment").value;
  document.getElementById("due").value=payable-pay;
  }
  function discount2(){
     var z;
    var ans;
    var total=document.getElementById("total_amount1").value;
    if(total==''){total=0;}
     var x=document.getElementById("total_discount").value;
     ans=x;
     var tmp=document.getElementById("dis").value;;
     
     if(tmp=='1'){
      document.getElementById("total_discount").max = '100';
      ans=(((total)/100)*x);
     }
     else{
      document.getElementById("total_discount").max = '10000000000'; 
     }
     
      document.getElementById("discount_amount").value=ans;
      document.getElementById("payable_amount").value=total-ans;
      payment2();
  }

document.querySelector("#today2").valueAsDate = new Date();


  function fun1(){
  var total=0;
  $('.total_amount').each(function(){
       var tm=$(this).val();
       total+=parseInt(tm, 10);
  });
  document.getElementById("total_amount1").value=total;
  discount2();
  payment2();
}

</script>
