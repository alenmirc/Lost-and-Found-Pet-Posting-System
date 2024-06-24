<?php
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Report Lost Pet</title>
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
  ::-webkit-file-upload-button {
            background-color: green;
            color:white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
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


if (isset($_POST['next'])) {

  $_SESSION['fillup'] = true;

$petselect = $_POST['petselect'];
$contactname = $_POST['contactname'];
$contactemail = $_POST['contactemail'];
$contactnumber = $_POST['contactnumber'];
$lastfound = $_POST['lastfound'];

}



if(!isset($_SESSION['users'])){
  $_SESSION['loginfirst'] = "Please login first to continue.";
  header("Location: login.php");
}
else{
  if(!isset($_SESSION['fillup'])) {
    header("Location: reportlostpet.php");
  }

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
            <div class="col-md-7">
              <div class="contact-wrap w-100 p-md-5 p-4">
                <h3 class="mb-4">Register a Pet</h3>
                <form method="POST" action="reportsuccess.php" enctype="multipart/form-data">
                  <div class="row">
                  <div class="col-md-12">
                    <P class="mt-3"><strong>Please review the details carefully before submitting, as they cannot be edited later.</strong></P>
</div>
<?php
$sql = "SELECT id, pet, petid, breed, fur, petname, petimage, date FROM registerpet WHERE id=$petselect";
$result = $db->query($sql);
while($row = $result->fetch_assoc()) {


?>

 <div class="col-md-12">
 <label class="label">Pet Name: </strong><?php echo $row['petname'] ?></label>
        <br>
</div>
<div class="col-md-12">
        <label class="label">Pet: </strong><?php echo $row['pet'] ?></label>
        <br>
</div> <div class="col-md-12">
<label class="label">Breed: </strong><?php echo $row['breed'] ?></label>
        <br>
</div> <div class="col-md-12">
<label class="label">Fur: </strong><?php echo $row['fur'] ?></label>
</div> <div class="col-md-12">
<label class="label">Last Seen: </strong><?php echo $lastfound;?></label>
        <br>
        <br><br>
        
</div> <div class="col-md-12">
<label class="label">Preferred Name: </strong><?php echo $contactname;?></label>
        <br>
</div> <div class="col-md-12">
<label class="label">Contact Number: </strong><?php echo $contactnumber;?></label>
        <br>
</div> <div class="col-md-12">
<label class="label">Email: </strong><?php echo $contactemail;?></label>
        <br>
</div> 
<br><br><br>
<div class="col-md-12">
                      <div class="form-group">
                        <strong><label class="label" for="photo">Please Upload any latest Photo of pet</label>  </strong>
                        <input type="file" class="form-control-file" name="petimage" id="photo" required>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                      <div class="form-check"><br>
          <input class="form-check-input" type="checkbox" value="" id="agreementCheckbox" required>
         <label class="form-check-label" for="agreementCheckbox">
         I hereby agree that my contact information will be disclosed to LFPRS Users.
          </label>
        </div><br>
       
        <input type='hidden' name='petname' value='<?php echo $row['petname']?>'>
          <input type='hidden' name='pet' value='<?php echo $row['pet']?>'>
          <input type='hidden' name='fur' value='<?php echo $row['fur']?>'>
          <input type='hidden' name='breed' value='<?php echo $row['breed']?>'>
          <input type='hidden' name='contactname' value='<?php echo $contactname;?>'>
          <input type='hidden' name='lastfound' value='<?php echo $lastfound;?>'>
          <input type='hidden' name='contactnumber' value='<?php echo $contactnumber;?>'>
          <input type='hidden' name='contactemail' value='<?php echo $contactemail;?>'>
          <input type='hidden' name='registered' value='1'>
                        <input type="submit" name="confirmlost" value="Confirm" class="btn btn-primary">
                   
                  
                        <div class="submitting"></div>
                      </div>
                    </div>
                  </div>
                </form>

                <a href="reportlostpet.php"><button type='submit' name='cancel' class='btn btn-danger'>Cancel</button></a>
              </div>
            </div>
            <div class="col-md-5 d-flex align-items-stretch">
              <div class="info-wrap w-100 p-5 img" style="background-image: url(images/img2.jpg);">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php }
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

<?php

unset($_SESSION['fillup']);

?>