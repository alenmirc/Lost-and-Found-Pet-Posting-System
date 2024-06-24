<?php
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>LFPRS - Profile</title>
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
	        	<li class="nav-item"><a href="foundpets.php" class="nav-link">Found Pets</a></li>
	        	<li class="nav-item"><a href="registerpet.php" class="nav-link">Register Pet</a></li>
	          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
			  </ul>
	          <form class="form-inline my-2 my-lg-0">

      <?php

if(!isset($_SESSION['users'])){
  $_SESSION['loginfirst'] = "Please login first to continue.";
  header("Location: login.php");
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
    
    <?php


$sql = "SELECT firstname, lastname, email, phonenumber, address FROM users WHERE id=$userid";
$result = $db->query($sql);
while($row = $result->fetch_assoc()) {



?>
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="images/profile.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4><?php echo $row['firstname'] . ' ' . $row['lastname']; ?></h4>
                      <p class="text-secondary mb-1">Verified User</p>
                      <p class="text-muted font-size-sm">
                        
                      <?php echo $row['address'] ?></p>
                      <a href='notification.php'><button class="btn btn-success">Notification <?php 
                    $sqlcount = "SELECT count(*) FROM notifylost WHERE userid=$userid  ";
                    $resultcount = $db->query($sqlcount);
                      
                    // Display data on web page
                    while($countrow = mysqli_fetch_array($resultcount)) {
                      echo "<span class='badge badge-light'>{$countrow['count(*)']}</span>";
                    } ?> 
                  </button></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><img  src="images/registerapet.png" class="icon-img">My Registered Pets</h6>
                    <span class="text-secondary">
                      
                    <?php 
                    $sqlcount = "SELECT count(*) FROM registerpet WHERE userid=$userid  ";
                    $resultcount = $db->query($sqlcount);
                      
                    // Display data on web page
                    while($countrow = mysqli_fetch_array($resultcount)) {
                      echo $countrow['count(*)'];
                    }


                    ?>
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><img  src="images/lostapet.png" class="icon-img">Lost Pets Posted</h6>
                    <span class="text-secondary">
                    <?php 
                    $sqlcount = "SELECT count(*) FROM reportlostpet WHERE userid=$userid  ";
                    $resultcount = $db->query($sqlcount);
                      
                    // Display data on web page
                    while($countrow = mysqli_fetch_array($resultcount)) {
                      echo $countrow['count(*)'];
                    }


                    ?>
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><img  src="images/foundapet.png" class="icon-img">Found Pets Posted</h6>
                    <span class="text-secondary"> 
                      
                      <?php 
                    $sqlcount = "SELECT count(*) FROM reportfoundpet WHERE userid=$userid  ";
                    $resultcount = $db->query($sqlcount);
                      
                    // Display data on web page
                    while($countrow = mysqli_fetch_array($resultcount)) {
                      echo $countrow['count(*)'];
                    }


                    ?>
                    
                  </span>
                  </li>
                </ul>
              </div>
            </div>

            
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">First Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['firstname'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Last Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['lastname'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['email'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['phonenumber'] ?>
                    </div>
                  </div>
                  <hr>
          
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['address'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn btn-primary  " target="__blank" href="editprofile.php">Edit Profile</a>
                      <a class="btn btn btn-primary  " target="__blank" href="changepassword.php">Change Password</a>
                    </div>
                  </div>
                </div>
              </div>

           


            </div>
          </div>

        </div>
        <div class="row gutters-sm">
                <div class="col-sm-4 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="text-center mb-3">My Registered Pets</h6>

                      <?php

$userid = $users['id'];
$sql = "SELECT petid, petname, petimage, date FROM registerpet WHERE userid=$userid ORDER BY id DESC";
$result2 = $db->query($sql);
if ($result2->num_rows > 0) {
  // Output data of each row
  while($row = $result2->fetch_assoc()) {
?>


                      <div class="list-group-item" style="background-color: #f9f9f9;">
  <div class="row">
    <div class="col-md-3 d-flex align-items-center">
      <img src="<?php echo $row['petimage'] ?>" class="mr-3" alt="Image" style="width: 60px; height: 60px; object-fit: cover;">
    </div>
    <div class="col-md-9">
      <div class="d-flex align-items-center">
        <div>
          <p class="mb-1" style="color: #333; font-weight: bold;"><?php echo $row['petname'] ?></p>
          <small style="color: #777;">Date Registered: <?php echo $row['date'] ?></small>
        </div>
      </div>
      <div class="d-flex mt-2">
      <a href="registeredinfo.php?id=<?php echo $row['petid'] ?>"><button class="btn btn-primary btn-sm mr-2">View</button></a>
        <a href="deleteaction/deleteregister.php?id=<?php echo $row['petid'] ?>" class="btn btn-danger ml-2 mr-2" onclick="return confirm('Are you sure you want to remove this?');">Remove</a>
      </div>
    </div>
  </div>
</div>

<?php 

}
}

else {
  echo '<p style="text-align: center;">0 results</p>';
}
    ?>




                    </div>
                  </div>
                </div>
                <div class="col-sm-4 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="text-center mb-3">Lost Pets Posted</h6>
                      
                      <?php

$userid = $users['id'];
$sql = "SELECT id, petname, petimage, date, expirationdate FROM reportlostpet WHERE userid=$userid ORDER BY id DESC";
$result2 = $db->query($sql);
if ($result2->num_rows > 0) {
  // output data of each row

  while($row = $result2->fetch_assoc()) {
    $currentDate = date("Y-m-d");
    $expirationDate = $row['expirationdate'];
    $daysLeft = (strtotime($expirationDate) - strtotime($currentDate)) / (60 * 60 * 24);

?>


                      <div class="list-group-item" style="background-color: #f9f9f9;">
  <div class="row">
    <div class="col-md-3 d-flex align-items-center">
      <img src="<?php echo $row['petimage'] ?>" class="mr-3" alt="Image" style="width: 60px; height: 60px; object-fit: cover;">
    </div>
    <div class="col-md-9">
      <div class="d-flex align-items-center">
        <div>
          <p class="mb-1" style="color: #333; font-weight: bold;"><?php echo $row['petname'] ?></p>
          <small style="color: #777;">Status: <?php  if ($daysLeft > 0) {
            echo "<span class='badge badge-pill badge-success'>Active</span> | " . $daysLeft . " days left";
        } else {
            echo "<span class='badge badge-pill badge-danger'>Expired</span>";
        } ?></small>
        </div>
      </div>
      <div class="d-flex mt-2">
      <a href="lost.php?id=<?php echo $row['id'] ?>"><button class="btn btn-primary btn-sm mr-2">View</button></a>
      <a href="deleteaction/deleteactionlost.php?id=<?php echo $row['id'] ?>" class="btn btn-danger ml-2 mr-2" onclick="return confirm('Are you sure you want to remove this?');">Remove</a>
      </div>
    </div>
  </div>
</div>

<?php 

}
}

else {
  echo '<p style="text-align: center;">0 results</p>';
}
    ?>

                    </div>
                  </div>
                </div>
                <div class="col-sm-4 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="text-center mb-3">Found Pets Posted</h6>
                      <?php
$userid = $users['id'];
$sql = "SELECT id, petname, petimage, registered, date, expirationdate FROM reportfoundpet WHERE userid=$userid ORDER BY id DESC";
$result2 = $db->query($sql);
if ($result2->num_rows > 0) {
  // output data of each row

  while($row = $result2->fetch_assoc()) {
    $currentDate = date("Y-m-d");
    $expirationDate = $row['expirationdate'];
    $daysLeft = (strtotime($expirationDate) - strtotime($currentDate)) / (60 * 60 * 24);

    $register = $row['registered']; // Assuming $row['register'] contains the register value

    if ($register == 0) {
      $registerText = "Unregistered Pet";
    } elseif ($register == 1) {
      $registerText = "Registered Pet";
    } else {
      $registerText = " ";
    }


?>


                      <div class="list-group-item" style="background-color: #f9f9f9;">
  <div class="row">
    <div class="col-md-3 d-flex align-items-center">
      <img src="<?php echo $row['petimage'] ?>" class="mr-3" alt="Image" style="width: 60px; height: 60px; object-fit: cover;">
    </div>
    <div class="col-md-9">
      <div class="d-flex align-items-center">
        <div>
          <p class="mb-1" style="color: #333; font-weight: bold;"><?php echo $registerText; ?></p>
          <small style="color: #777;">Status: <?php  if ($daysLeft > 0) {
            echo "<span class='badge badge-pill badge-success'>Active</span> | " . $daysLeft . " days left";
        } else {
            echo "<span class='badge badge-pill badge-danger'>Expired</span>";
        } ?></small>
        </div>
      </div>
      <div class="d-flex mt-2">
      <a href="found.php?id=<?php echo $row['id'] ?>"><button class="btn btn-primary btn-sm mr-2">View</button></a>
      <a href="deleteaction/deleteactionfound.php?id=<?php echo $row['id'] ?>" class="btn btn-danger ml-2 mr-2" onclick="return confirm('Are you sure you want to remove this?');">Remove</a>
      </div>
    </div>
  </div>
</div>

<?php 

}
}

else {
  echo '<p style="text-align: center;">0 results</p>';
}
    ?>
                    </div>
                  </div>
                </div>
       
              </div>

    </div>
</section>
		  
      <?php
}
      ?>


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