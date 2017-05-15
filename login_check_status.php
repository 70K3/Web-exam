<?php
	session_start();
	mysql_connect("mysql.hostinger.in.th","u692783740_1234","webappproject");
	mysql_select_db("u692783740_wapj");

	$strSQL = "SELECT * FROM user WHERE userName = '".mysql_real_escape_string($_POST['username']).
	"'and password = '".mysql_real_escape_string($_POST['password'])."'";

	 $objQuery = mysql_query($strSQL);
	 $objResult = mysql_fetch_array($objQuery);

	if(!$objResult){
		echo "Username and Password Incorrect!";
		header("location:index.html");
	}
	else{
		$_SESSION["userID"] = $objResult["userID"];
		$_SESSION["Status"] = $objResult["Status"];
 
		session_write_close();
 		if($objResult["Status"] == "Admin"){
			header("location:Page_Admin.php");
		}
		else{
			header("location:Page_Home.php?userID=" .$_SESSION["userID"]);
		}
	}
	mysql_close();
?>
