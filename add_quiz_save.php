<?php 	
			ob_start();
			$objConnect = mysqli_connect("mysql.hostinger.in.th","u692783740_1234","webappproject") or die("Error Connect to Database");
		  	$objDB = mysqli_select_db($objConnect,"u692783740_wapj");

			$addSQL = "INSERT INTO quiz_exam";
			$addSQL .="(quiz,choice_a,choice_b,choice_c,choice_d,choice_true,n_eID)";
			$addSQL .="VALUES";
			$addSQL .="('".$_POST["quiz"]."','".$_POST["choicea"]."','".$_POST["choiceb"]."','".$_POST["choicec"]."','".$_POST["choiced"]."','".$_POST["rchoice"]."','".$_POST["n_eID"]."')";
			

			$addQuery = mysqli_query($objConnect,$addSQL);

			//echo $_POST["n_eID"];

			// update amonut in DB
			$add_amSQL = mysqli_query($objConnect,"SELECT n_eID , amount ,backup FROM name_exam WHERE n_eID = $_POST[n_eID]")or die(mysql_error()); 
			While($info = mysqli_fetch_array( $add_amSQL ))
			{
					$idinfo = $info['n_eID'];
					$newinfo = $info['amount'] + 1 ;
					$bbinfo = $info['backup'] + 1 ;
			}
			$sadd_amSQL = "UPDATE name_exam SET amount ='$newinfo' ,backup='$bbinfo' WHERE n_eID=$idinfo";
			$sadd_amSQLx = mysqli_query($objConnect,$sadd_amSQL);


			if($addQuery){
				//echo "add success";
				ob_end_clean(); 
     	  		header('Location:Page_Admin.php' );
			}
			else{
				echo "Error add [".$addSQL."]";
			}


			mysqli_close($objConnect);
?>