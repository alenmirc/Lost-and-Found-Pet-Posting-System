
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Pet Info</title>
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
      /* PROFILE START */
      .card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}

/*
NEW CSS START
*/
.icon-img {
  width: 20px; /* Adjust the width as needed */
  height: 20px; /* Adjust the height as needed */
  margin-right: 5px; /* Add some spacing between the image and text */
}
/*
END CSS START
*/
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
	        	<li class="nav-item"><a href="lostpets.php" class="nav-link">Lost Pets</a></li>
	        	<li class="nav-item active"><a href="foundpets.php" class="nav-link">Found Pets</a></li>
	        	<li class="nav-item"><a href="registerpet.php" class="nav-link">Register Pet</a></li>
	          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
			  </ul>
	          <form class="form-inline my-2 my-lg-0">

      <?php

include("config.php");

$viewid = $_GET['id'];









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



$sql = "SELECT id,registered, petname, petid, pet, fur, breed, petimage,  placefound, date, expirationdate FROM reportfoundpet WHERE id=$viewid";
$result = $db->query($sql);
while($row = $result->fetch_assoc()) {

    $expirationdate = $row['expirationdate'];
    $currentDate = date("Y-m-d"); // Get the current date
    
    $daysLeft = floor((strtotime($expirationdate) - strtotime($currentDate)) / (60 * 60 * 24));

    $register = $row['registered']; // Assuming $row['register'] contains the register value

    if ($register == 0) {
      $registerText = "Unregistered Pet";
    } elseif ($register == 1) {
      $registerText = "Registered Pet";
    } else {
      $registerText = " ";
    }
?>
      </form>

	        
	      </div>
	    </div>
	  </nav>


    <?php

// Check if success message is set
if (isset($_SESSION['Success'])) {
  $successMessage = $_SESSION['Success'];
  // Unset the success message to clear it after displaying
  unset($_SESSION['Success']);
}

if (isset($_SESSION['updated'])) {
  $updatedmsg = $_SESSION['updated'];
  // Unset the success message to clear it after displaying
  unset($_SESSION['updated']);
}
?>
<?php if (isset($successMessage)) : ?>
  <div class="alert alert-success"><?php echo $successMessage; ?></div>
<?php endif; ?>


<?php if (isset($updatedmsg)) : ?>
  <div class="alert alert-success"><?php echo $updatedmsg; ?></div>
<?php endif; ?>

    <!-- END nav -->
   

    <section class="ftco-section bg-light">
    <div class="container bootstrap snippets bootdey">
        <div class="container">
       
            <div class="main-body">
            <a href="foundpets.php" class="btn btn-primary go-back-btn mb-3">Go Back</a>
                    <div class="row gutters-sm">
                      
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <img src="<?php echo $row['petimage'] ?>" alt="Admin"  class="col-md-12">
                                        <div class="mt-3">
                                            <h4><?php echo $registerText; ?></h4>
                                            
                                            <p class="text-muted font-size-sm">Date Posted: <?php echo $row['date'] ?>
                                            <p class="text-muted font-size-sm">Status: <?php  if ($daysLeft > 0) {
            echo "<span class='badge badge-pill badge-success'>Active</span>";
        } else {
            echo "<span class='badge badge-pill badge-danger'>Expired</span>";
        } ?> </p>
                                            <p class="font-weight-bold font-size-sm">If you think I am your missing pet, kindly click THIS IS MY PET button to positively identify me. Make sure to have a proof of ownership such as pictures or vet records and your picture ID.</P>
                                            <a href='foundinfo.php?id=<?php echo $row['id'] ?>'><button class="btn btn-success mt-3">This is my pet 
                  </button></a>

                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                     
                        </div>
      
                        <div class="col-md-8 mb-3">
                            <!-- Copy the first column here -->
                            
                            <div class="card">
                            <div class="col-sm-5 mt-3 ml-1">
                            <h4 >Pet Information</h4>
</div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <h6 >LFPRS Registered</h6>
                                        </div>
                                        <div class="col-sm-7 text-secondary">
                                        <?php if ($row['registered'] == 1) {
  echo "Yes";
} elseif ($row['registered'] == 0) {
  echo "No";
} ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <h6 class="mb-0">Pet ID</h6>
                                        </div>
                                        <div class="col-sm-7 text-secondary">
                                            <?php echo $row['petid'] ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <h6 class="mb-0">Pet</h6>
                                        </div>
                                        <div class="col-sm-7 text-secondary">
                                            <?php echo $row['pet'] ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <h6 class="mb-0">Pet Name</h6>
                                        </div>
                                        <div class="col-sm-7 text-secondary">
                                            <?php echo $row['petname'] ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <h6 class="mb-0">Breed</h6>
                                        </div>
                                        <div class="col-sm-7 text-secondary">
                                            <?php echo $row['breed'] ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <h6 class="mb-0">Fur</h6>
                                        </div>
                                        <div class="col-sm-7 text-secondary">
                                            <?php echo $row['fur'] ?>
                                        </div>
                                    </div> <hr>
                                  
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <h6 class="mb-0">Place found</h6>
                                        </div>
                                        <div class="col-sm-7 text-secondary">
                                            <?php echo $row['placefound'] ?>
                                        </div>
                                    </div> <hr>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <h6 class="mb-0">Date Posted</h6>
                                        </div>
                                        <div class="col-sm-7 text-secondary">
                                            <?php echo $row['date'] ?>
                                        </div>
                                        
                                    </div>
                                   
                                   
                                </div>
                                
                            </div>

                <?php
                } 
                ?>
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