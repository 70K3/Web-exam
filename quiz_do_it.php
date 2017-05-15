<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
  <title>Do quiz</title>
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
<body>

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
        <div class="col-sm-2">
             <?php 
                $n_eID = $_GET["n_eID"];  // input value n_eID form DB
               
                 $objConnect = mysqli_connect("mysql.hostinger.in.th","u692783740_1234","webappproject") or die("Error Connect to Database");
                  $objDB = mysqli_select_db($objConnect,"u692783740_wapj");

                  $strSQL = "SELECT * FROM name_exam WHERE n_eID = $n_eID "; //ORDER BY quizID ASC LIMIT 1" ;
                  $response = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]");

                  while($result2=mysqli_fetch_array($response))
                  {
                      $name_exam = $result2["name_exam"];
                  }
                  
            ?> 
        </div>
        <div class="col-sm-8">
             <h1 class="w3-text-teal"><?php echo $name_exam; ?></h1>
            <br>
            <div class="well">

            <?php
                
                $strSQL = "SELECT * FROM quiz_exam WHERE n_eID = $n_eID "; //ORDER BY quizID ASC LIMIT 1" ;
                $response = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]");
            ?> 
           
            <?php 
                $count = 0;
                while($result=mysqli_fetch_array($response))
                { ?>

                  <form method="post" action="quiz_check_choice.php">                
                    <?php echo $result["quiz"];?><p><p>
                    <ul class="list-group">
                    <li class="list-group-item">
                    <input type="radio" name="rchoice<?php echo $count;?>"  value="a">
                    <?php echo "a : "?>
                    <?php echo $result["choice_a"];?><p>
                    <li class="list-group-item">

                    <input type="radio" name="rchoice<?php echo $count;?>"  value="b">    
                    <?php echo "b : "?>
                    <?php echo $result["choice_b"];?><p>
                    <li class="list-group-item">

                    <input type="radio" name="rchoice<?php echo $count;?>"  value="c">  
                    <?php echo "c : "?>
                    <?php echo $result["choice_c"];?><p>
                    <li class="list-group-item">

                    <input type="radio" name="rchoice<?php echo $count;?>"  value="d">
                    <?php echo "d : "?>
                    <?php echo $result["choice_d"];?><p>
                    
                    </ul>
                    <?php $count++; ?>
                
              <?php   
              }?>
              
                  <input type="hidden" name="userID" value="<?php echo $userID;?>"> 
                  <input type="hidden" name="count" value="<?php echo $count;?>">                          
                  <p><button type="submit" class="btn btn-default" name ="n_eID" value="<?php echo $n_eID?>">Send Answer</button></p>
             </form>
              
             <?php
                    mysqli_close($objConnect);
              ?> 

              </div>
        </div>  
        <div class="col-sm-2">
          
        </div>
    </div>

</body>
</html>

