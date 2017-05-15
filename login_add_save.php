<html>
<head>
	<title>addloginsave</title>
</head>
<body>

	<?php 	ob_start();
			$objConnect = mysqli_connect("mysql.hostinger.in.th","u692783740_1234","webappproject") or die("Error Connect to Database");
		  	$objDB = mysqli_select_db($objConnect,"u692783740_wapj");

			$strSQL = "INSERT INTO user";
			$strSQL .="(Name,studentid,email,userName,password)";
			$strSQL .="VALUES";
			$strSQL .="('".$_POST["myname"]."','".$_POST["mystdid"]."','".$_POST["myemail"]."','".$_POST["username"]."','".$_POST["password"]."')";
			
			
			if($_POST["myname"] != NULL && $_POST["mystdid"] != NULL && $_POST["myemail"] != NULL && $_POST["username"] != NULL && $_POST["password"] != NULL ){
				$objQuery = mysqli_query($objConnect,$strSQL);
				if($objQuery){
					//echo "Save Done.Click";
					ob_end_clean(); 
    				header('Location: index.html');
    			}
			}
			else if($_POST["myname"] == NULL || $_POST["mystdid"] == NULL || $_POST["myemail"] == NULL || $_POST["username"] == NULL || $_POST["password"] == NULL ){ //Check have or not data
					//echo "กรุณากรอกข้อมูลให้ครบถ้วน 
					ob_end_clean(); 
    				header('Location: login_add_from.php');
			}
			else{
				echo "Error Save [".$strSQL."]";
			}
			mysqli_close($objConnect);
	?>

</body>
</html>