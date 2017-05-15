<?php 	
			ob_start();
			$objConnect = mysqli_connect("mysql.hostinger.in.th","u692783740_1234","webappproject") or die("Error Connect to Database");
		  	$objDB = mysqli_select_db($objConnect,"u692783740_wapj");

		  	$n_eID = $_GET["n_eID"];

		  	$strSQL = mysqli_query($objConnect,"SELECT status FROM name_exam WHERE n_eID = $n_eID")or die(mysql_error()); 
			
			While($info = mysqli_fetch_array( $strSQL )){

			$status = $info["status"] ;

			if($status == "ON"){
				$strSQL2 = "UPDATE name_exam SET 
						status = 'OFF'
						WHERE n_eID = $n_eID";
				$objQuery = mysqli_query($objConnect,$strSQL2);

				ob_end_clean();
				header('Location:Page_Admin.php');
			}
			else{
		  		$strSQL2 = "UPDATE name_exam SET 
						status = 'ON'
						WHERE n_eID = $n_eID";
				$objQuery = mysqli_query($objConnect,$strSQL2);

				ob_end_clean();
				header('Location:Page_Admin.php');
			}

	
			}

			mysqli_close($objConnect);
	
?>