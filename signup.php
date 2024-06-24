<!DOCTYPE html>
<html lang="en">
  <head>
    <title>LFPRS - Sign Up</title>
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

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
?>
      </form>

	        
	      </div>
	    </div>
	  </nav>



    <!-- END nav -->
    <section class="ftco-section bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-7">
        <div class="contact-wrap w-100 p-md-5 p-4">
          <h3 class="mb-4">Sign Up</h3>
          <form method="POST" id="signupForm" name="signupForm" class="contactForm">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="label" for="firstName">First Name</label>
                  <input type="text" class="form-control" name="firstname" id="firstName" placeholder="First Name" required>
                </div>
              </div>
              <div class="col-md-6"> 
                <div class="form-group">
                  <label class="label" for="lastName">Last Name</label>
                  <input type="text" class="form-control" name="lastname" id="lastName" placeholder="Last Name" required>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label class="label" for="email">Email Address</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="label" for="phoneNumber">Phone Number</label>
                  <input type="tel" class="form-control" name="phonenumber" id="phoneNumber" placeholder="Phone Number" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="label" for="address">Address</label>
                  <input type="text" class="form-control" name="address" id="address" placeholder="Address" required>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label class="label" for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" id="termsCheckbox" required>
                  <label class="form-check-label" for="termsCheckbox">I agree to the <a href="termsandcondition.php">terms and conditions.</a></label>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <input type="submit" name="submit" value="Sign Up" class="btn btn-primary">
                  <?php


if (isset($_POST['submit'])) {


$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email']; 
$phonenumber = $_POST['phonenumber'];
$address = $_POST['address'];
$password = $_POST['password'];


$sql="SELECT * FROM users where email= '$email'";
$check = $db->query($sql);
  
if($check->num_rows >0){
      echo  "<br><br><div class='alert alert-danger' role='alert'>Email already exist! </div>"; 
  }

else {

  $v_code = md5(uniqid());


  $sql="INSERT into users VALUES ('','$firstname','$lastname','$email','$phonenumber','$address','$password','$v_code', 0)" ;
  $db->query($sql);
  


  require ("PHPMailer/PHPMailer.php");
  require ("PHPMailer/SMTP.php");
  require ("PHPMailer/Exception.php");




  $mail = new PHPMailer(true);
  $mail->isSMTP();                                            //Send using SMTP
  $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
  $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
  $mail->Username   = 'lfprsofficial@gmail.com';                     //SMTP username
  $mail->Password   = '//change!!';                               //SMTP password
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
  $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

  //Recipients
  $mail->setFrom('lfprsofficial@gmail.com', 'LFPRS');
  $mail->addAddress($email);     //Add a recipient


  //Content
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = 'Email Verification from LFPRS';
  $mail->Body    = "Thanks for registration! Click the link below to verify the email address 
  <br><a href='http://localhost/lfprs/verify.php?code=$v_code'>VERIFY</a>";

  $mail->send();
  

  
  echo  "<br><br><div class='alert alert-success' role='alert'> Registration successful. Please check your email to verify your account. </div>"; 
}
}
?>
                  <div class="submitting"></div>
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
