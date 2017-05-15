<?php 
		ob_start();
		$quizID = $_POST["quizID"];
		$rchoice = $_POST["rchoice"];
		$userID = $_POST["userID"];
	  	echo $quizID;
		 echo $rchoice;

			$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
		  	$objDB = mysql_select_db("wapj");


		  	$strSQL = "SELECT quizID ,choice_true ,n_eID  FROM quiz_exam WHERE quizID = $quizID" ;
		  	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
 
		  	While($info = mysql_fetch_array( $objQuery ))
		  	{
		  			$n_eID = $info["n_eID"];

		  		//	test case
		  			if($rchoice == $info["choice_true"]){            // save score whem True
                        echo "true";
                        $ascore = 1;
                    }    
                    else{
                        echo "fault";
                        $ascore = 0;
                    }
        	}

            $strSQL3 = "INSERT INTO score_exam";
            $strSQL3 .="(n_eID,userID,quizID,ascore)";
            $strSQL3 .="VALUES";
            $strSQL3 .="('".$n_eID."','".$userID."','".$quizID."','".$ascore."')";

            $objQuery3 = mysql_query($strSQL3) or die ("Error Query [".$strSQL3."]");
		    

		  	//ob_end_clean();
			//header('Location: quiz_do_it.php?n_eID='.$n_eID);

	mysql_close($objConnect);
	?> 


