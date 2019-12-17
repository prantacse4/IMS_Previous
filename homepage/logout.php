<?php 
session_start();
/*include "../config/session.php";*/


  session_destroy();
  	unset($_SESSION['email']);
  	echo "<script>window.location.href='../login_register/login_register.php'</script>";

  if (!isset($_SESSION['email'])) {
  echo "<script>window.location.href='../login_register/login_register.php'</script>";
}
 ?>