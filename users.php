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
<body> <style> body{ background-color: #1a1a1a;}</style>
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

    

                    <br><center><h1>Users</h1></center><br>
                    <div class="well">
        <table class="table table-striped">
               <thead>
                  <tr>
                    <th><div align="center">ID 55</div></th>
                    <th><div align="center">ID 56</div></th> 
                    <th><div align="center">ID 57</div></th>
                    <th><div align="center">ID 58</div></th> 

                  </tr>
               </thead>
    <?php 
                $objConnect = mysqli_connect("mysql.hostinger.in.th","u692783740_1234","webappproject") or die("Error Connect to Database");
                $objDB = mysqli_select_db($objConnect,"u692783740_wapj");
    ?>
                <tbody>
                    <tr>
                        <td>
        <?php 
                $strSQL = "SELECT * FROM user WHERE status = 'User' AND studentid LIKE '55%'";
                $response = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]");
        ?> 
                <?php   
                    While($info = mysqli_fetch_array( $response ))
                {?>
                       <div class="well">
                        <h5> Name       : <?php echo $info["Name"]; ?></h5><p>
                        <h5> Student ID : <?php echo $info["studentid"]; ?></h5><p>
                        
                        <h5> E-mail    : <?php echo $info["email"]; ?></h5><p> 
                    </div>

                <?php 
                } ?> 
                        </td>
                        <td>
        <?php 
                $strSQL = "SELECT * FROM user WHERE status = 'User' AND studentid LIKE '56%'";
                $response = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]");
        ?> 
                <?php   
                    While($info = mysqli_fetch_array( $response ))
                {?>

                    <div class="well">
                        <h5> Name       : <?php echo $info["Name"]; ?></h5><p>
                        <h5> Student ID : <?php echo $info["studentid"]; ?></h5><p>
                        
                        <h5> E-mail    : <?php echo $info["email"]; ?></h5><p>
                    </div>

                <?php 
                } ?> 
                        </td>
                        <td>
        <?php 
                $strSQL = "SELECT * FROM user WHERE status = 'User' AND studentid LIKE '57%'";
                $response = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]");
        ?> 
                <?php   
                    While($info = mysqli_fetch_array( $response ))
                {?>
                      <div class="well">
                        <h5> Name       : <?php echo $info["Name"]; ?></h5><p>
                        <h5> Student ID : <?php echo $info["studentid"]; ?></h5><p>
                        
                        <h5> E-mail    : <?php echo $info["email"]; ?></h5><p> 
                    </div>

                <?php 
                } ?> 
                        </td>
                        <td>
        <?php 
                $strSQL = "SELECT * FROM user WHERE status = 'User' AND studentid LIKE '58%'";
                $response = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]");
        ?> 
                <?php   
                    While($info = mysqli_fetch_array( $response ))
                {?>

                   <div class="well">
                        <h5> Name       : <?php echo $info["Name"]; ?></h5><p>
                        <h5> Student ID : <?php echo $info["studentid"]; ?></h5><p>
                        
                        <h5> E-mail    : <?php echo $info["email"]; ?></h5><p> 
                    </div>

                <?php 
                } ?>   
                        </td>

                    </tr>
                </tbody>
            </table>
        </div>
               <!--  <form action = "Page_Admin.php">
                    <button type="submit" class="btn btn-default">Back</button>
                </form> -->

                <br>
      
</body>
</html>     