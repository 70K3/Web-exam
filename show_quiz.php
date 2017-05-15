<!DOCTYPE html>
<html>
<head>
  <title>Show Quiz</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body> <style> body { background-color: #1a1a1a;} </style> 
      <!-- Navbar -->
      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
              <a class="navbar-brand" href="Page_Admin.php?userID=<?$userID;?>">The Quiz</a>
          </div>
        <div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">

              <li><a href="users.php?userID=<?=$userID;?>">users</a></li>
              <li><a href="score_user.php?userID=<?=$userID;?>">Score</a></li>
              <li><a href="index.html">Log Out</a></li>
            </ul>
          </div>
        </div>
        </div>
      </nav><br><br><br>

      <div class="row">
        <div class="col-sm-2">

        </div>

        <div class="col-sm-8">
            <h1 class="w3-text-teal">Show</h1>
            <br>
            <div class="well">
            <?php 
                $n_eID = $_GET["n_eID"];  // input value n_eID form DB
                //echo $n_eID;
            ?>

            <?php
                $objConnect = mysqli_connect("mysql.hostinger.in.th","u692783740_1234","webappproject") or die("Error Connect to Database");
                $objDB = mysqli_select_db($objConnect,"u692783740_wapj");

                $strSQL = "SELECT quizID , quiz , choice_a , choice_b , choice_c , choice_d ,choice_true FROM quiz_exam WHERE n_eID = $n_eID" ;
                $objQuery = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]");
            ?> 

            <?php 
                While($info = mysqli_fetch_array( $objQuery ))
                { ?>

                                
                    <?php echo $info["quiz"];?><p><p>
                    <ul class="list-group">
                    <li class="list-group-item">
                    <?php echo "a : "?>
                    <?php echo $info["choice_a"];?><p>
                    <li class="list-group-item">

                    <?php echo "b : "?>
                    <?php echo $info["choice_b"];?><p>
                    <li class="list-group-item">

                    <?php echo "c : "?>
                    <?php echo $info["choice_c"];?><p>
                    <li class="list-group-item">

                    <?php echo "d : "?>
                    <?php echo $info["choice_d"];?><p>
                    <li class="list-group-item">
                    <?php echo "True answer : "?>
                    <?php echo $info["choice_true"];?>
                    </ul>    
                    
                    <form action="edit_quiz.php" method="get">

                      <input type="hidden" name="quiz" value="<?php echo $info["quiz"];?>">
                      <input type="hidden" name="choice_a" value="<?php echo $info["choice_a"];?>">
                      <input type="hidden" name="choice_b" value="<?php echo $info["choice_b"];?>">
                      <input type="hidden" name="choice_c" value="<?php echo $info["choice_c"];?>">
                      <input type="hidden" name="choice_d" value="<?php echo $info["choice_d"];?>">

                      <button type="submit" class="btn btn-default"name = "quizID" value="<?php echo $info["quizID"];?>">Edit</button>
                    </form>
                    <p>
                    <form action="delete_a_quiz.php">
                      <button type="submit" class="btn btn-danger" name = "quizID" value="<?php echo $info["quizID"];?>">Delete</button>
                    </form>

                    <hr color= "black">
                  
              
              <?php   
                }?>
                
              <?php
                    mysqli_close($objConnect);
              ?>
              </div>
              <center>
              <form action="Page_Admin.php">
                  <button type="submit" class="btn btn-default">OK</button>
              </form>
              </center>
              <br><br>
          <div class="col-sm-2">

          </div>
      </div>


</body>
</html>

