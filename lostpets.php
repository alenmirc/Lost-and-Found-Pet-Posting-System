<?php
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Lost Pets</title>
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
<style>
.ftco-section .row.justify-content-end {
  justify-content: flex-end;
}

.search-input {
  width: 100%;
}
  </style>

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
	        	<li class="nav-item active"><a href="lostpets.php" class="nav-link">Lost Pets</a></li>
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
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bglost.jpg');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
  <div class="row no-gutters slider-text align-items-center" data-scrollax-parent="true">
    <div class="col-md-12 ftco-animate text-center">
          	<h1 class="mb-4">Lost your pet? We're here to help</h1>
            <p><a href="reportlostpet.php" class="btn btn-primary mr-md-4 py-3 px-4">Post your pet <span class="ion-ios-arrow-forward"></span></a></p>
          </div>
        
      </div>
    </div>
  </div>
</section>
    <section class="ftco-section bg-light">
  <div class="container">
    <div class="row justify-content-end">
      <div class="col-md-3">
        <form action="" method="GET" class="mb-3">
          <div class="input-group">
            <input type="text" name="search" class="form-control search-input" placeholder="Search for a pet">
            <div class="input-group-append">
              <button type="submit" class="btn btn-primary">Search</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="row justify-content-center">

    <?php


$currentDate = date("Y-m-d");
if (isset($_GET['search'])) {
  // Sanitize the user input to prevent SQL injection
  $searchTerm = $db->real_escape_string($_GET['search']);

  // Modify the SQL query to include the search term and approved condition
  $sql = "SELECT id, pet, registered, petname, fur, breed, petimage, lastfound, date, approved, expirationdate FROM reportlostpet WHERE expirationdate >= '$currentDate' AND approved = 1 AND (petname LIKE '%$searchTerm%' OR pet LIKE '%$searchTerm%' OR registered LIKE '%$searchTerm%' OR fur LIKE '%$searchTerm%' OR breed LIKE '%$searchTerm%' OR lastfound LIKE '%$searchTerm%') ORDER BY id DESC";

} else {
  // Default SQL query without search term but with approved condition
  $sql = "SELECT id, pet, registered, petname, fur,  breed, petimage, lastfound, date, approved, expirationdate FROM reportlostpet WHERE expirationdate >= '$currentDate' AND approved = 1 ORDER BY id DESC";
}

$result = $db->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {
    // Process and display the search results
    // ...

    
$date = $row['date']; // Assuming $row['date'] contains the date value

// Convert the date to a timestamp
$timestamp = strtotime($date);

// Get the current date and today's timestamp
$currentDate = date('Y-m-d');
$currentTimestamp = strtotime($currentDate);

// Calculate the difference in days
$daysDiff = floor(($currentTimestamp - $timestamp) / (60 * 60 * 24));

// Format the date display
if ($daysDiff == 0) {
  $formattedDate = "Posted today";
} elseif ($daysDiff == 1) {
  $formattedDate = "Posted yesterday";
} else {
  $formattedDate = "Posted " . $daysDiff . " days ago";
}


?>

					<a href="lost.php?id=<?php echo $row['id'] ?>"><div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url(<?php echo $row['petimage'] ?>);  object-fit: cover;"></div>
							</div>
							<div class="text pt-3 px-3 pb-4 text-center">
								<h3><?php echo $row['petname'] ?></h3>
								<span class="position mb-2"><?php echo $formattedDate; ?></span></a>
								<div class="faded">
									<p>Last Seen: <?php echo $row['lastfound'] ?></p>
	              </div>
							</div>
						</div>
					</div>
				
         
	
          <?php
  }
} else {
  echo "0 results";
}

?>
				
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