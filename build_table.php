<?php

			// save data to name_exam table
			ob_start();
			$objConnect = mysqli_connect("mysql.hostinger.in.th","u692783740_1234","webappproject") or die("Error Connect to Database");
		  	$objDB = mysqli_select_db($objConnect,"u692783740_wapj");

			$strSQL = "INSERT INTO name_exam";
			$strSQL .="(name_exam,amount,backup,status)";
			$strSQL .="VALUES";
			$strSQL .="('".$_POST["name_exam"]."','".$_POST["amount_exam"]."','".$_POST["amount_exam"]."','".$_POST["status"]."')";
			
			if($_POST["name_exam"] != NULL && $_POST["amount_exam"] != NULL && $_POST["amount_exam"] != 0){  //Check have or not data
				$objQuery = mysqli_query($objConnect,$strSQL);

				if($objQuery){
					echo "Save Done";
					ob_end_clean(); 
    	 			header('Location: create_quiz.php' );	//Jump to create_quiz.php
				}
			}
			else if($_POST["name_exam"] == NULL || $_POST["amount_exam"] == NULL || $_POST["amount_exam"] == 0){ //Check have or not data
					//echo "กรุณากรอกข้อมูลให้ครบถ้วน <a href=Page_Admin.php>Click</a>";
					ob_end_clean(); 
    	 			header('Location: Page_Admin.php' );

			}
			else{
					echo "Error Save [".$strSQL."]";
			}
			mysqli_close($objConnect);


?>

