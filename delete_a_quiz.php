<?php 	
			ob_start();
			$objConnect = mysqli_connect("mysql.hostinger.in.th","u692783740_1234","webappproject") or die("Error Connect to Database");
		  	$objDB = mysqli_select_db($objConnect,"u692783740_wapj");

		 //  	$dltSQL = "DELETE FROM quiz_exam ";
			// $dltSQL .="WHERE quizID = '".$_GET["quizID"]."' ";

			// $dltQuery = mysql_query($dltSQL);

			if($_GET["quizID"] != NULL){
				//echo "Delete success";
				$strSQL2 = mysqli_query($objConnect,"SELECT n_eID FROM quiz_exam WHERE quizID = '".$_GET["quizID"]."'") or die(mysqli_error()); 
			 		While($info = mysqli_fetch_array( $strSQL2 ))
					{
						$n_eID = $info['n_eID'];
						$strSQL3 = mysqli_query($objConnect,"SELECT amount FROM name_exam WHERE n_eID = $n_eID") or die(mysqli_error()); 
			 			While($info3 = mysqli_fetch_array( $strSQL3 ))	
			 			{
			 				
			 				$newamount = $info3['amount'] - 1 ;

			 			}

						$dltSQL = "DELETE FROM quiz_exam ";
						$dltSQL .="WHERE quizID = '".$_GET["quizID"]."' ";

						$dltQuery = mysqli_query($objConnect,$dltSQL);

						$udSQL = "UPDATE name_exam SET amount = '$newamount' WHERE n_eID = $n_eID";
						$udQuery = mysqli_query($objConnect,$udSQL);

						ob_end_clean();
						header('Location: show_quiz.php?n_eID='.$n_eID);
					}
			}
			else
			{
				echo "Error Delete [".$dltSQL."]";
			}


			mysqli_close($objConnect);
?>