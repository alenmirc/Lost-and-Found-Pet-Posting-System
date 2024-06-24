<?php
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Report Found Pet</title>
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


if(!isset($_SESSION['users'])){
  echo "<a href='login.php'><button type='button' class='btn btn-info ml-5 mr-2'>Sign In</button></a>";
  echo "<a href='signup.php'><button type='button' class='btn btn-light'>Sign Up</button></a>";
}
else{

  $users = $_SESSION['users'];
  $userid = $users['id'];

  $sql = "SELECT count(*) FROM notifylost WHERE userid=$userid  ";
  $result = $db->query($sql);
    
  // Display data on web page
  while($row = mysqli_fetch_array($result)) {

$users = $_SESSION['users'];
echo "<A href='profile.php' name='profile'><button type='button' class='btn btn-info ml-5 mr-1'>Profile <span class='badge badge-light'>{$row['count(*)']}</span></button></a>";
echo "<A href='logout.php' name='logout'><button type='button' class='btn btn-light'>Log Out</button></a>";
}
}

?>
      </form>

	        
	      </div>
	    </div>
	  </nav>

    <section class="ftco-section bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="wrapper">
          <div class="row no-gutters">
            <div class="col-md-12">
              <div class="contact-wrap w-100 p-md-5 p-4">
 
               
                  <div class="row">

                  <h1>Terms and Agreement for Lost and Found Pet Rescue System</h1>
  
  <h2>1. Collection and Use of Information</h2>
  <p>
    a. You acknowledge and consent to the collection and use of personal information you provide during the sign-up process. The collection and use of this information are governed by our Privacy Policy, which outlines how we handle and protect your data.
  </p>
  <p>
    b. You agree that the information you provide is accurate, current, and complete, and you will promptly update any changes to ensure its accuracy.
  </p>
  
  <h2>2. Lost and Found Pet Listings</h2>
  <p>
    a. By using the Website, you acknowledge and agree that any lost or found pet listings you create or submit will be publicly available on the Website. Other users will be able to view, search, and contact you regarding these listings.
  </p>
  <p>
    b. You are solely responsible for the accuracy and completeness of the information provided in the lost and found pet listings.
  </p>
  
  <h2>3. Ownership and Licensing of Images</h2>
  <p>
    a. You agree that any images or photographs you upload to the Website for use in lost or found pet listings are either owned by you or that you have obtained the necessary rights and permissions to use and display the images.
  </p>
  <p>
    b. By uploading images to the Website, you grant Lost and Found Pet Rescue System a non-exclusive, worldwide, royalty-free license to use, reproduce, modify, adapt, publish, translate, distribute, and display the images for the purpose of promoting lost and found pet listings on the Website.
  </p>
  
  <h2>4. User Responsibilities</h2>
  <p>
    a. You acknowledge that Lost and Found Pet Rescue System is not responsible for the outcome of any interactions, agreements, or disputes that may occur between users of the Website.
  </p>
  <p>
    b. You agree to use the Website in accordance with all applicable laws and regulations and to refrain from engaging in any illegal, harmful, or inappropriate activities.
  </p>
  
  <h2>5. Limitation of Liability</h2>
  <p>
    a. Lost and Found Pet Rescue System makes no warranties or representations regarding the accuracy, completeness, or reliability of the information provided on the Website, including lost and found pet listings.
  </p>
  <p>
    b. To the extent permitted by Philippine law, Lost and Found Pet Rescue System shall not be liable for any direct, indirect, incidental, consequential, or punitive damages arising out of or in connection with your use of the Website or any services provided therein.
  </p>
  
  <h2>6. Modifications to Terms and Conditions</h2>
  <p>
    Lost and Found Pet Rescue System reserves the right to modify these terms and conditions at any time without prior notice. Your continued use of the Website following any changes constitutes acceptance of the modified terms and conditions.
  </p>
  
  <h2>7. Governing Law and Jurisdiction</h2>
  <p>
    These terms and conditions shall be governed by and construed in accordance with the laws of the Philippines. Any dispute arising out of or in connection with these terms and conditions shall be subject to the exclusive jurisdiction of the courts of the Philippines.
  </p>
                
             
                 
</div>

                  </div>
                </form>
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