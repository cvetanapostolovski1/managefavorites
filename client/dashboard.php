<?php
   //include auth_session.php file on all user panel pages
   include("../server/auth_session.php");
   
   ?>
<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Bootstrap CSS -->
      <link href="assets/style.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">

   <title>Dahboard</title>
   </head>
   <body>
      <div class="container-fluid">
      <div class="form">
         <p>Hey, <?php echo $_SESSION['username']; ?>!</p>
         <p>You are in user dashboard page.</p>
         <p><a href="../server/logout.php">Logout</a></p>
      </div>
	  <div class="row"><div id="message" class="alert" role="alert"></div></div>
      <div class="row">
      <div class="col-md-7">
		<h3 class='text-center'>My favorite countries</h3>
		<hr/>
         <table id="favoriteCountries" class="table table-striped">
            <thead>
               <tr>
                  <th scope="col">Edit</th>
                  <th scope="col">Name</th>
                  <th scope="col">Region</th>
                  <th scope="col">Population</th>
                  <th scope="col">Created</th>
                  <th scope="col">Comment</th>
                  <th scope="col">Remove</th>
               </tr>
            </thead>
         </table>
		 </div>
		 <div class="col-md-5">
		<h3 class='text-center'>All countries</h3>
		<hr/>
         <table id="allCountries" class="table table-striped">
            <thead>
               <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Region</th>
                  <th scope="col">Population</th>
                  <th scope="col">Favourite</th>
               </tr>
            </thead>
         </table>
      </div>
	  </div>
	  </div>
	 <input type=hidden id="userId" name="userId" value="<?php echo $_SESSION['user_id']; ?>"/>
	<script type="text/javascript" async="" src="assets/script.js"></script>		 
   </body>
</html>