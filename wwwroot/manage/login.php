<?php
   include("../config.php");
   //require('templateTop.php');
   
   session_start();
   
 
 
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = $_POST['username'];
      $mypassword = $_POST['password']; 
      
    
		echo $myusername;
		echo $mypassword;
		
		  $sql = 'SELECT * FROM adminusers WHERE username = "'.$myusername.'" and password = "'.$mypassword.'"';
		  
		  $stmt = $db->prepare($sql);
		  $result = $stmt->execute();
		  $count = $stmt->rowCount();
		
		
	    
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         //session_register("myusername");
         $_SESSION['adminUsername'] = $myusername;
		 
         
         header("Location: /manage/");
		 
      }else {
         echo "Your Login Name or Password is invalid";
		 die();
      }
   }
?>
<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Bootstrap 4 Dependencies -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="landing-page.css">
</head>
   
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="row" style="width: 100%;">
		<div class="col-3 text-center"> <a class="navbar-brand" href="/"><img src="../../resources/nsf-logo.png" style="width: 45%;"></a></div>
		<div class="col-3 text-center"> <a class="navbar-brand" href="/"><img src="../../resources/gencyber-logo.png" style="width: 45%;"></a></div>
		<div class="col-3 text-center"> <a class="navbar-brand" href="/"><img src="../../resources/nsa-logo.png" style="width: 45%;"></a></div>
		<div class="col-3 text-center"> <a class="navbar-brand" href="/"><img src="../../resources/jsu-logo.svg" style="width: 45%;"></a></div>
	</div>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
  </div>
</nav>
<div class="jumbotron text-center">
 <h1>Sign In</h1>
</div>
<div class="col-md-6 mx-auto">	
	<div class="card">
		<div class="card-header">
		Sign In
		</div>
		<div class="card-body">
		<form action = "" method = "post">
			 <div class="form-group">
				<label for="">Username:</label>
				<input type="text" class="form-control" id="username" name ="username" placeholder="Enter username">
			 </div>
			 <div class="form-group">
				<label for="">Password:</label>
				<input type="password" class="form-control" id="password" name ="password" placeholder="Enter password">
			 </div>
			 <button type="submit" class="btn btn-primary">Submit</button>
				 
		</form>
			   
			   
		</div>
	</div>
      
			
</div>

   </body>
</html>