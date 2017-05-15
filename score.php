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
        <div class="col-sm-2">
            
        </div>
        <div class="col-sm-8">
          
        <h1>Score</h1>
        <div class="well">
        <?php
                $objConnect = mysqli_connect("mysql.hostinger.in.th","u692783740_1234","webappproject") or die("Error Connect to Database");
                $objDB = mysqli_select_db($objConnect,"u692783740_wapj");

                $strSQL = "SELECT * FROM user WHERE userID = $userID ";
                $response = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]");
        ?> 
                <?php   
                    While($info = mysqli_fetch_array( $response ))
                {?>
                    <h5> Name       : <?php echo $info["Name"]; ?></h5>
                    <h5> Student ID : <?php echo $info["studentid"]; ?></h5>
                      
                <?php 
                } ?> 
      </div>
                <!-- ...................................................................................................... -->
      <div class="well">
       <table class="table table-hover">
                    <thead>
                          <tr>
                              <th><div align="center">Quiz Title</div></th>
                              <th><div align="center">Point</div></th>  
                              <th><div align="center">Your Score</div></th>  
                          </tr>
                    </thead>


        <?php 
                $strSQL2 = "SELECT DISTINCT n_eID FROM score_exam WHERE userID = $userID";
                $response2 = mysqli_query($objConnect,$strSQL2) or die ("Error Query [".$strSQL2."]");
        
               while ($info2 = mysqli_fetch_array( $response2 )) {
                      $n_eID = $info2["n_eID"];
                      
                      $strSQL3 = "SELECT ascore FROM score_exam WHERE userID = $userID AND n_eID = $n_eID";
                      $response3 = mysqli_query($objConnect,$strSQL3) or die ("Error Query [".$strSQL3."]");

                      $strSQL5 = "SELECT name_exam , amount FROM name_exam WHERE n_eID = $n_eID";
                      $response5 = mysqli_query($objConnect,$strSQL5) or die ("Error Query [".$strSQL5."]"); 

        ?>
        <?php              while($info5 = mysqli_fetch_array($response5)){ 
                            $name = $info5["name_exam"];
                            $amount = $info5["amount"];
                             while($info3 = mysqli_fetch_array($response3)) {
                               $ascore = $info3["ascore"];
                             

        ?>              
                              <tbody>
                                  <tr>
                                     <td><div align="center"><?php echo $name?></div></td> 
                                     <td><div align="center"><?php echo $amount?></div></td> 
                                     <td><div align="center"><?php echo $ascore?></div></td>
                                


        <?php             }?>  
        <?php             }?>

        <?php }?>
                                  </tr>  
                              </tbody>
        </table>
      </div>

                <!--  ......................................................................................................-->
                   

        <?php
              mysqli_close($objConnect);
        ?>
          
        </div>  
        <div class="col-sm-2">

        </div>
      </div>
 

</body>
</html>
