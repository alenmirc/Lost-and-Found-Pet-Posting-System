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

    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/img2.jpg');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
  <div class="row no-gutters slider-text align-items-center" data-scrollax-parent="true">
    <div class="col-md-12 ftco-animate text-center">
          	<h1 class="mb-4">About Us</h1>
            
          </div>
        
      </div>
    </div>
  </div>
</section>


    
    <section class="ftco-section bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="wrapper">
          <div class="row no-gutters">
            <div class="col-md-12">
              <div class="contact-wrap w-100 p-md-5 p-4">
 
              <p class="lead text-center">We help lost pets find their way back home and assist in reuniting families with their beloved companions. Made by DICT 3-5 | Research Project<br><br><br>The Lost and Found Pet Rescue System (LFPRS) aims to address this fear by reuniting lost pets with their owners and promoting pet safety. By connecting communities and facilitating communication, the LFPRS helps to ensure that lost pets are quickly and safely returned to their homes. The LFPRS seeks to strengthen this bond by connecting communities and providing the resources and support that pet owners and rescuers need to succeed.
<br><br><br>Disclaimer: All images utilized on the Lost and Found Pet Rescue System website are obtained from royalty-free sources.</p>
                  <div class="row">

                 
               
             
                 
</div>

                  </div>
                </form>
              </div>
            </div>
           
</section>



    <section class="ftco-section bg-light">
    <hr>
<h2 class="text-center">Meet Our team</h2><br><br><br>
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-lg-4 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url(images/team/alen.jpg); object-fit:cover;"></div>
							</div>
							<div class="text pt-3 px-3 pb-4 text-center">
								<h3>Alen Banez</h3>
								<div class="faded">
									<p>Programmer</p>
	              </div>
							</div>
						</div>
					</div>
          <div class="col-md-6 col-lg-4 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url(images/team/cherry.jpg);"></div>
							</div>
							<div class="text pt-3 px-3 pb-4 text-center">
								<h3>Cherry Cantuba III</h3>
								<div class="faded">
									<p>-</p>
	              </div>
							</div>
						</div>
					</div>
          <div class="col-md-6 col-lg-4 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url(images/team/sanje.jpg);"></div>
							</div>
							<div class="text pt-3 px-3 pb-4 text-center">
								<h3>Joseph Sanje</h3>
								<div class="faded">
									<p>-</p>
	              </div>
							</div>
						</div>
					</div>
          <div class="col-md-6 col-lg-4 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url(images/team/johanes.jpg);"></div>
							</div>
							<div class="text pt-3 px-3 pb-4 text-center">
								<h3>Johanes Panis</h3>
								<div class="faded">
									<p>-</p>
	              </div>
							</div>
						</div>
					</div>
          <div class="col-md-6 col-lg-4 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url(images/team/charlie.jpg);"></div>
							</div>
							<div class="text pt-3 px-3 pb-4 text-center">
								<h3>Charlie Golis</h3>
								<div class="faded">
									<p>-</p>
	              </div>
							</div>
						</div>
					</div>
          <div class="col-md-6 col-lg-4 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url(images/team/manalac.jpg);"></div>
							</div>
							<div class="text pt-3 px-3 pb-4 text-center">
								<h3>Joshua Manalac</h3>
								<div class="faded">
									<p>-</p>
	              </div>
							</div>
						</div>
					</div>





</div></div></section>





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