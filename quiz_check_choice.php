<?php 
		ob_start();
		$count = $_POST["count"];
		$userID = $_POST["userID"];
		$n_eID = $_POST["n_eID"];

		//echo "cccc $count $n_eID";
		for($i=0; $i < $count; $i++){
				$s_choice[$i] = trim($_POST["rchoice" .$i] );

				//echo $s_choice[$i] ;		
		}

	 		$objConnect = mysqli_connect("mysql.hostinger.in.th","u692783740_1234","webappproject") or die("Error Connect to Database");
            $objDB = mysqli_select_db($objConnect,"u692783740_wapj");


	 	  	$strSQL = "SELECT quizID ,choice_true  FROM quiz_exam WHERE n_eID = $n_eID" ;
	 	  	$objQuery = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]");

	 	  	$i=0;
		  	While($info = mysqli_fetch_array( $objQuery ))
		  	{
	 	  			
	 	  			$t_choice[$i] = $info["choice_true"];
	 	  			//echo $t_choice[$i]; 
	 	  			$i++;
	 	  	}

	 	  	$ascore=0;
	 	  	for($i=0; $i < $count; $i++){
				if($s_choice[$i] == $t_choice[$i])
					$ascore+=1;	
				else
					$ascore+=0;	
			}

			//echo $ascore;

             $strSQL3 = "INSERT INTO score_exam";
             $strSQL3 .="(n_eID,userID,quizID,ascore)";
             $strSQL3 .="VALUES";
             $strSQL3 .="('".$n_eID."','".$userID."','".$info["quizID"]."','".$ascore."')";

             $objQuery3 = mysqli_query($objConnect,$strSQL3) or die ("Error Query [".$strSQL3."]");
		    

	 	  	ob_end_clean();
	 		header('Location: quiz_list.php?userID='.$userID);

	mysqli_close($objConnect);
	?> 


