<!DOCTYPE html>
<html>
<head>
  <title>Page Create</title>
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

      <!-- Grid -->
      <div class="row">
        <div class="col-sm-2">

        </div>
        <div class="col-sm-8">
          <div class="col-sm-2">

          </div>
          <div class="col-sm-8">
            <h1 class="w3-text-teal">Create Quiz</h1><br>
            <form class="form-inline" name="createquiz" method="post" action="create_quiz_save.php">
  		        <div class="form-group">
  		            <font color="white">Question: </font><input type="text" class="form-control" id="quiz" name="quiz" placeholder="Enter Question" size="74"><p><p>
                  <input type="radio" name="rchoice" value="a">
                  <font color="white">Answer a: </font><input type="text" class="form-control" id="choicea" name="choicea" placeholder="Enter Answer" size="64"><p>
                  <input type="radio" name="rchoice" value="b">
                  <font color="white">Answer b: </font><input type="text" class="form-control" id="choiceb" name="choiceb" placeholder="Enter Answer" size="64"><p>
                  <input type="radio" name="rchoice" value="c">
                  <font color="white">Answer c: </font><input type="text" class="form-control" id="choicec" name="choicec" placeholder="Enter Answer" size="64"><p>
                  <input type="radio" name="rchoice" value="d">
                  <font color="white">Answer d: </font><input type="text" class="form-control" id="choiced" name="choiced" placeholder="Enter Answer" size="64"><p>
  		            <br>
                  <button type="submit" class="btn btn-default">confirm</button>
  		        </div>
            </form>
          </div>

          <div class="col-sm-2">

          </div>
        </div>
        <div class="col-sm-2">

        </div>
    

</body>
</html>

