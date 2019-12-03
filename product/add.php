<?php
  require_once('db.php');
  $upload_dir = 'uploads/';

  if (isset($_POST['Submit'])) {

    $imgName = $_FILES['image']['name'];
		$imgTmp = $_FILES['image']['tmp_name'];
		$imgSize = $_FILES['image']['size'];
		$imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
			$allowExt  = array('jpeg', 'jpg', 'png', 'gif');
			$userPic = time().'_'.rand(1000,9999).'.'.$imgExt;
			move_uploaded_file($imgTmp ,$upload_dir.$userPic);



		
			$sql = "insert into contacts(name, contact, email, image)
					values('".$name."', '".$contact."', '".$email."', '".$userPic."')";

		}
  }
?>
