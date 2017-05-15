<?php 	
			ob_start();
			$objConnect = mysqli_connect("mysql.hostinger.in.th","u692783740_1234","webappproject") or die("Error Connect to Database");
		  	$objDB = mysqli_select_db($objConnect,"u692783740_wapj");

			$strSQL = "INSERT INTO quiz_exam";
			$strSQL .="(quiz,choice_a,choice_b,choice_c,choice_d,choice_true)";
			$strSQL .="VALUES";
			$strSQL .="('".$_POST["quiz"]."','".$_POST["choicea"]."','".$_POST["choiceb"]."','".$_POST["choicec"]."','".$_POST["choiced"]."','".$_POST["rchoice"]."')";
			
			$objQuery = mysqli_query($objConnect,$strSQL);

			if($objQuery){
					//echo "Save Done" ;
					// Call data from table name_exam for add n_eID
					$dtSQL = mysqli_query($objConnect,"SELECT n_eID , amount ,backup FROM name_exam ORDER BY n_eID DESC LIMIT 1 ")or die(mysql_error()); 
					While($info = mysqli_fetch_array( $dtSQL ))
					{
						$idinfo = $info['n_eID'];
						$bbinfo = $info['backup'];
						$newinfo = $info['amount'] - 1 ;  //countdown

						//  echo $x;			//test case
						//  echo $newinfo;
						//  echo $idinfo;
						// $sdtSQL = "UPDATE name_exam SET amount ='$newinfo' WHERE n_eID=$idinfo";
						// $sdtSQLx = mysql_query($sdtSQL); //update data for countdown
					}
					
				
						$sdtSQL = "UPDATE name_exam SET amount ='$newinfo' WHERE n_eID=$idinfo";
						$sdtSQLx = mysqli_query($objConnect,$sdtSQL); //update data for countdown

						$sdtkey = mysqli_query($objConnect,"SELECT quizID FROM quiz_exam ORDER BY quizID DESC LIMIT 1 ")or die(mysql_error()); 
						While($dtkey = mysqli_fetch_array( $sdtkey ))
						{
							$idquiz = $dtkey['quizID'];
							$updtkey = "UPDATE quiz_exam SET n_eID ='$idinfo' WHERE quizID = $idquiz"; //
							$updtkeyx = mysqli_query($objConnect,$updtkey); //update n_eID

						}
						
					if($newinfo != "0"){
							ob_end_clean(); 
    	  					header('Location: create_quiz.php' ); //Jump to create_quiz.php
					}
					else{
						//return data original
						$sdtSQL = "UPDATE name_exam SET amount ='$bbinfo' WHERE n_eID=$idinfo"; 
						$sdtSQLx = mysqli_query($objConnect,$sdtSQL); //return to table
						ob_end_clean(); 
    	  				header('Location: Page_Admin.php' );  //Jump to Page_Admin.php
    	  				
					}
			  }
			  else{
					echo "Error Save [".$strSQL."]";
			}
			
			mysqli_close($objConnect);
	?>