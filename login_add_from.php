 <!DOCTYPE html>
<html>
<head>
  <title>Page Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
      <div class="row">
          <div class="col-sm-3">

          </div>
          <div class="col-sm-6">
              <div class="col-sm-2">

              </div>
              <div class="col-sm-8">

	            <center><p><h1>Register</h1></center>

	            <form name="frmadd" method="post" action="login_add_save.php">
  		            <div class="form-group">
    		            <label form="text">Name-Surname:</label>
    		            <input name="myname" type="text" id="myname" class="form-control">
  		            </div><p>
		
                  <div class="form-group">
                    <label form="text">Student ID:</label>
                    <input name="mystdid" type="text" id="mystdid" class="form-control">
                  </div><p>  

                  <!-- <div class="form-group">
                    <label form="text">Faculty:</label>
                    <select name="myfaculty" class="form-control">
                        <option value="Department of Computer Engineering">Department of Computer Engineering</option>
                        <option value="Faculty of International Studies">Faculty of International Studies</option>
                        <option value="Faculty of Hospitality and Tourism">Faculty of Hospitality and Tourism</option>
                        <option value="Faculty of Technology and Environment">Faculty of Technology and Environment</option>
                    </select>
                  </div><p> -->

                  <div class="form-group">
                    <label form="text">E-mail:</label>
                    <input name="myemail" type="e-mail" id="myemail" class="form-control">
                  </div><p>

		              <div class="form-group">
        	           <label form="text">Username:</label>
        	           <input name="username" type="text" id="username" class="form-control">
      		        </div><p>
  		      
                  <div class="form-group">
    		             <label form="pwd">Password:</label>
    		             <input name="password" type="password" id="password" class="form-control">
  		            </div><p>

                  <!-- <div class="form-group">
                     <label form="pwd">Re-Password:</label>
                     <input name="password" type="password" id="password" class="form-control">
                  </div><p> -->
  		
  		            <input type="submit" name="btnsave" value="Save" class="btn btn-default"></p>
              </form>
              <form name="btncancle" action="index.html">
                  <input type="submit" name="btnsave" value="Cancel" class="btn btn-default"></p>
              </form></center>
              <div class="col-sm-2">

        </div>

        <div class="col-sm-3">

        </div>
    </div>
</body>
</html>


