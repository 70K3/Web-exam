<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
  <title>Page Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <?php 
                $userID= $_SESSION["userID"]  
                //echo $userID;
  ?>
 
</head>
<body> <style> body{ background : #f2f2f2 url("pic/de.jpg") no-repeat fixed center bottom;}</style>

  <!-- Navbar -->
      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="Page_Home.php?userID=<?$userID;?>">The Quiz</a>
          </div>
        <div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
              <li><a href="quiz_list.php?userID=<?=$userID;?>">List</a></li>
              <li><a href="score.php?userID=<?=$userID;?>">Score</a></li>
              <li><a href="#section3">About</a></li>
              <li><a href="index.html">Log Out</a></li>
            </ul>
          </div>
        </div>
        </div>
      </nav><br><br><br>

      <!-- Grid -->
      <div class="row">
        
        <div class="col-sm-3">
          
             
        </div>
        <div class="col-sm-6">

          <br><br><br>
          <?php
                $objConnect = mysqli_connect("mysql.hostinger.in.th","u692783740_1234","webappproject") or die("Error Connect to Database");
                $objDB = mysqli_select_db($objConnect,"u692783740_wapj");

                $strSQL = "SELECT * FROM user WHERE userID = $userID ";
                $response = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]");
        ?> 
                <?php   
                    While($info = mysqli_fetch_array( $response ))
                {?>

                    <div align="center"><h3 style="color:black;">Welcome <?php echo $info["Name"];?>.</h3></div>

                <?php 
                } ?> 
        
       
        </div>
        
        <div class="col-sm-3">
           
        </div>
        
      </div>
  

</body>
</html>

