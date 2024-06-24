<!DOCTYPE html>
<html lang="en">
  <head>
    <title>LFPRS - Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/style.css">

  </head>
  <body>


		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	    	<a class="navbar-brand" href="#"><span class="flaticon-pawprint-1 mr-2"></span>LFPRS</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
	        	<li class="nav-item"><a href="lostpets.php" class="nav-link">Lost Pets</a></li>
	        	<li class="nav-item"><a href="foundpets.php" class="nav-link">Found Pets</a></li>
	        	<li class="nav-item"><a href="registerpet.php" class="nav-link">Register Pet</a></li>
	          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
			  </ul>
	          <form class="form-inline my-2 my-lg-0">

      <?php
include("config.php");

if(!isset($_SESSION['users'])){
  echo "<a href='login.php'><button type='button' class='btn btn-info ml-5 mr-2'>Sign In</button></a>";
  echo "<a href='signup.php'><button type='button' class='btn btn-light'>Sign Up</button></a>";
}

else{
  $users = $_SESSION['users'];
 header ('location:index.php');
}

?>
      </form>

	        
	      </div>
	    </div>
	  </nav>

    <?php

if (isset($_SESSION['loginfirst'])) {
  $loginfirst = $_SESSION['loginfirst'];
  // Unset the success message to clear it after displaying
  unset($_SESSION['loginfirst']);
}
  if (isset($_SESSION['verify'])) {
  $verified = $_SESSION['verify'];
  // Unset the success message to clear it after displaying
  unset($_SESSION['verify']);
}
?>
<?php if (isset($verified)) : ?>
  <div class="alert alert-success"><?php echo $verified; ?></div>
<?php endif;
 ?>

 <?php if (isset($loginfirst)) : ?>
  <div class="alert alert-info"><?php echo $loginfirst; ?></div>
<?php endif;
 ?>

    <!-- END nav -->
    <section class="ftco-section bg-light">
			<div class="container">
			  <div class="row justify-content-center">
				<div class="col-md-6 text-center mb-2">
				  <h2 class="heading-section">Sign In</h2>
				</div>
			  </div>
			  <div class="row justify-content-center">
				<div class="col-md-6">
				  <div class="contact-wrap w-100 p-md-5 p-4">
					<form method="POST" action="#" id="loginForm" name="loginForm" class="contactForm">
					  <div class="row">
						<div class="col-md-12">
						  <div class="form-group">
							<label class="label" for="email">Email Address</label>
							<input type="email" class="form-control" name="email" id="email" placeholder="Email">
						  </div>
						</div>
						<div class="col-md-12">
						  <div class="form-group">
							<label class="label" for="password">Password</label>
							<input type="password" class="form-control" name="password" id="password" placeholder="Password">
						  </div>
						</div>
						<div class="col-md-12">
						  <div class="form-group">
              <a href="signup.php">Don't have an account? Sign Up</a><br><br>
							<input type="submit" name="submit" value="Sign In" class="btn btn-primary">
							<div class="submitting"></div>

              <?php

  
if (isset($_POST['submit'])) {

$email = $_POST['email'];
$password = $_POST['password'];

$sql="SELECT * FROM users where email= '$email' AND password = '$password' ";
$query = $db->query($sql);

if($query->num_rows == 0){
    echo  "<br><div class='alert alert-danger' role='alert'> Invalid email or password! </div>"; 

}
else {
  $data = $query->fetch_assoc();
  if ($data['is_verified'] == 0) {
    echo "<br><div class='alert alert-danger' role='alert'> Your account is not verified yet. </div>";
    }
else {
    $_SESSION['users'] = $data;
    header("location:profile.php");
}
}}
?>
						  </div>
						</div>
					  </div>
					</form>
				  </div>
				</div>
			  </div>
			</div>
		  </section>
		  
      


    <footer class="footer">
			<div class="container">
			<div class=" text-center">
			<p>
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved. Lost and Found Pet Rescue System</p>
          </div>
</div>
          <div class="text-center">
<div hidden>
            <p class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
</div>
			</div>
		</footer>

    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>


    
  </body>
</html>