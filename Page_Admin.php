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

        </div>
        <div class="col-sm-8">
              <h1 class="w3-text-teal">NEW</h1>

              <div class="well">

              <form class="form-inline" name="nameexam" method="post" action="build_table.php">
              <div class="form-group">
                    <label>Quiz Title:</label>
                    <input type="text" class="form-control" id="name exam" name="name_exam" placeholder="Enter quiz title">
                    <label>Amount Question:</label>
                    <input type="number" class="form-control" id="amount exam" name="amount_exam" placeholder="amount" min="0" max="200" value="amount_exam">
                    
                    <div class="form-group">
                    <label form="text">Status : </label>
                    <select name="status" class="form-control">
                        <option value="ON">ON</option>
                        <option value="OFF">OFF</option>
                   </select>
                    </div>

                    <button type="submit" class="btn btn-default">OK</button>
              </div>
              </form>
              </div>

              <h1 class="w3-text-teal">LIST</h1>
              <div class="well">
              
              <?php
                  $objConnect = mysqli_connect("mysql.hostinger.in.th","u692783740_1234","webappproject") or die("Error Connect to Database");
                  $objDB = mysqli_select_db($objConnect,"u692783740_wapj");
                  $strSQL = "SELECT * FROM name_exam";
                  $objQuery = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]");
              ?>

              <table class="table table-hover">
               <thead>
                  <tr>
                    <!-- <th><div align="center">ID</div></th> -->
                    <th><div align="center">Quiz Title</div></th>
                    <th><div align="center">Amount Question</div></th>  
                    <th><div align="center">Add</div></th> 
                    <th><div align="center">Show</div></th> 
                    <th><div align="center">Delete</div></th>
                    <th><div align="center">Status</div></th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                       while($objResult = mysqli_fetch_array($objQuery))
                  {
                  ?>
                  <tr>
                      <!-- <td><div align="center"><?php echo $objResult["n_eID"];?></div></td> -->
                      <td><div align="center"><?php echo $objResult["name_exam"];?></td>
                      <td><div align="center"><?php echo $objResult["amount"];?></td>

                      <td><form action="add_quiz.php">
                        <div align="center"><button type="submit" class="btn btn-default"name = "n_eID" value="<?php echo $objResult["n_eID"];?>">Add</button></div>
                      </form></td>

                      <td><form action="show_quiz.php" method='get'>
                        <div align="center"><button type="submit" class="btn btn-default" name = "n_eID" value="<?php echo $objResult["n_eID"];?>">Show</button></div>
                      </form></td>

                      <td><form action="delete_all_quiz.php?">   <!--send n_eID-->
                        <div align="center"><button type="submit" class="btn btn-danger" name = "n_eID" value="<?php echo $objResult["n_eID"];?>">Delete</button></div>
                      </form></td>

                      <td>  <!--send n_eID-->
                        <div align="center"><a href="change_status.php?n_eID=<?php echo $objResult["n_eID"];?>"><?php echo $objResult["status"];?></div>
                      </td>

                  </tr>
                  <?php
                  }
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

