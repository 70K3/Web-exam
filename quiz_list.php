<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
  <title>Quiz List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

   <?php 
                $userID= $_SESSION["userID"];  
                //echo $userID;
   ?>
</head>
<body> <style> body{ background-image: url("pic/gg.jpg");  }</style>

  <!-- Navbar -->
      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="Page_Home.php?userID=<?=$userID;?>">The Quiz</a>
          </div>
        <div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
              <li><a href="quiz_list.php?userID=<?echo $userID;?>">List</a></li>
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
        <div class="col-sm-2">
            
        </div>
        <div class="col-sm-8">
          
              <h1 class="w3-text-teal">Quiz</h1>
              <?php
                  $objConnect = mysqli_connect("mysql.hostinger.in.th","u692783740_1234","webappproject") or die("Error Connect to Database");
                  $objDB = mysqli_select_db($objConnect,"u692783740_wapj");
                  $strSQL = "SELECT * FROM name_exam";
                  $objQuery = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]");
              ?>
              <div class="well">
              <table class="table table-hover">
               <thead>
                  <tr>
                    <th><div align="center">Quiz Title</div></th>
                    <th><div align="center">Point</div></th>  
                  </tr>
               </thead>
               <tbody>
                  <?php
                       while($objResult = mysqli_fetch_array($objQuery))
                  { if($objResult["status"] == "ON"){
                  ?>
                  <tr>
                      <div align="center">
                        <td><div align="center"><?php echo $objResult["name_exam"];?></div></td>
                        <td><div align="center"><?php echo $objResult["amount"];?></div></td>

                        <?php $name_exam = $objResult["name_exam"]; ?>

                        <td><form action="quiz_do_it.php">
                          <input type="hidden" name="userID" value="<?php echo $userID;?>">
                          
                          <div align="center"><button type="submit" class="btn btn-default"name = "n_eID" value="<?php echo $objResult["n_eID"];?>">Start test</button></div> 
                        </form></td>  
                     </tr>
                  
                  <?php
                  }}
                  ?>
               </tbody>
              </table>
              </div>

               <?php
                    mysqli_close($objConnect);
               ?>
        
        </div>  
        <div class="col-sm-2">

        </div>
      </div>

</body>
</html>
