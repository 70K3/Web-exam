<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	
<?php 	
			ob_start();
			$objConnect = mysqli_connect("mysql.hostinger.in.th","u692783740_1234","webappproject") or die("Error Connect to Database");
		  	$objDB = mysqli_select_db($objConnect,"u692783740_wapj");

		  
      		$quizID = $_POST["quizID"];
      		$quiz = $_POST["quiz"];
      		$choice_a = $_POST["choicea"];
      		$choice_b = $_POST["choiceb"];
      		$choice_c = $_POST["choicec"];
      		$choice_d = $_POST["choiced"];
      		$rchoice = $_POST["rchoice"];

      		 //echo $n_eID;
      		// echo $rchoice;
      		//input value quiz form DB
			
			 //$objQuery = mysql_query($strSQL);


			 if($_POST["quiz"] != NULL && $_POST["choicea"] != NULL && $_POST["choiceb"] != NULL && $_POST["choicec"] != NULL && $_POST["choiced"] != NULL && $_POST["rchoice"] != NULL ){
			 	

				$strSQL = "UPDATE quiz_exam SET 
						quiz = '$quiz',
						choice_a = '$choice_a',
						choice_b = '$choice_b',
						choice_c ='$choice_c',
						choice_d ='$choice_d',
						choice_true ='$rchoice'
						WHERE quizID = $quizID";
			
			 	$objQuery = mysqli_query($objConnect,$strSQL);

			 	if($objQuery){
			 
    	  			$strSQL2 = mysqli_query($objConnect,"SELECT n_eID FROM quiz_exam WHERE quizID = $quizID")or die(mysql_error()); 
			 		While($info = mysqli_fetch_array( $strSQL2 ))
					{
						$n_eID = $info['n_eID'];

						//echo $n_eID;
						//$n_eID = $_GET[$n_eID];
						ob_end_clean();
						header('Location: show_quiz.php?n_eID='.$n_eID);
					}
    	  					
			  	}
			  }
			  else if($_POST["quiz"] == NULL || $_POST["choicea"] == NULL || $_POST["choiceb"] == NULL || $_POST["choicec"] == NULL || $_POST["choiced"] == NULL || $_POST["rchoice"] == NULL ){
						
						$strSQL2 = mysqli_query($objConnect,"SELECT n_eID FROM quiz_exam WHERE quizID = $quizID")or die(mysql_error()); 
			 			While($info = mysqli_fetch_array( $strSQL2 ))
						{
							$n_eID = $info['n_eID'];

							ob_end_clean();
							header('Location:edit_quiz.php?n_eID='.$n_eID);  //?quizID='.$quizID);
						}
			  }
			  else{
					echo "Error Save [".$strSQL."]";
			}
			
			mysqli_close($objConnect);
	?>

</body>
</html>