
<!DOCTYPE html>
<html>
<head>
  <title>Page Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
<body> <style> body{ background-color: #1a1a1a;} </style>

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

      <!-- Grid -->
      <div class="row">
        <div class="col-sm-2">
            <?php 
                $n_eID = $_GET["n_eID"];
            ?>
        </div>
        <div class="col-sm-8">
          
        
        
        <?php
                $objConnect = mysqli_connect("mysql.hostinger.in.th","u692783740_1234","webappproject") or die("Error Connect to Database");
                $objDB = mysqli_select_db($objConnect,"u692783740_wapj");

                $strSQL = "SELECT name_exam FROM name_exam WHERE n_eID = $n_eID";
                $response = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]");
        ?> 
                <?php   
                    While($info = mysqli_fetch_array( $response ))
                {?>
                    <h1><?php echo $info["name_exam"]; ?></h1>
               <?php 
                } ?> 
      
                <!-- ...................................................................................................... -->
      <div class="well">
       <table class="table table-hover">
                    <thead>
                          <tr>
                              <th><div align="center">Student ID</div></th>
                              <th><div align="center">Name-Surname</div></th>  
                              <th><div align="center">Score</div></th>  
                          </tr>
                    </thead>


        <?php 
                $strSQL2 = "SELECT  userID,studentid,Name FROM user WHERE status = 'User' AND studentid LIKE '58%'";
                $response2 = mysqli_query($objConnect,$strSQL2) or die ("Error Query [".$strSQL2."]");

        ?>
         <?php      while ($info2 = mysqli_fetch_array( $response2 )) {
                             $userID = $info2["userID"];
                             $studentid = $info2["studentid"];
                             $name = $info2["Name"];

                    $strSQL3 = "SELECT ascore FROM score_exam WHERE userID = $userID AND n_eID = $n_eID";
                    $response3 = mysqli_query($objConnect,$strSQL3) or die ("Error Query [".$strSQL3."]"); 

                        while($info3 = mysqli_fetch_array($response3)) {
                              $ascore = $info3["ascore"];
                             

         ?>              
                              <tbody>
                                  <tr>
                                     <td><div align="center"><?php echo $studentid?></div></td> 
                                     <td><div align="center"><?php echo $name?></div></td> 
                                     <td><div align="center"><?php echo $ascore?></div></td>
                                


        <?php             }?>  
        <?php             }?>

        
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
