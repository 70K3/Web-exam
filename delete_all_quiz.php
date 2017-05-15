<?php 	
			ob_start();
			$objConnect = mysqli_connect("mysql.hostinger.in.th","u692783740_1234","webappproject") or die("Error Connect to Database");
		  	$objDB = mysqli_select_db($objConnect,"u692783740_wapj");

		  	$dltSQL = "DELETE FROM name_exam ";
			$dltSQL .="WHERE n_eID = '".$_GET["n_eID"]."' ";

			$dltQuery = mysqli_query($objConnect,$dltSQL);

			if($dltQuery){
				//echo "Delete success";
				ob_end_clean(); 
    	  		header('Location:Page_Admin.php');
			}
			else
			{
				echo "Error Delete [".$dltSQL."]";
			}


			mysql_close($objConnect);
?>