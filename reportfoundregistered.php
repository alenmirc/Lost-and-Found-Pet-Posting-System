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
	        	<li class="nav-item active"><a href="foundpets.php" class="nav-link">Found Pets</a></li>
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
    if (isset($_SESSION['notfound'])) {
  $notfound = $_SESSION['notfound'];
  // Unset the success message to clear it after displaying
  unset($_SESSION['notfound']);
}
?>
<?php if (isset($notfound)) : ?>
  <div class="alert alert-danger"><?php echo $notfound; ?></div>
<?php endif; ?>

    <section class="ftco-section bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="wrapper">
          <div class="row no-gutters">
            <div class="col-md-7">
              <div class="contact-wrap w-100 p-md-5 p-4">
                <h3 class="mb-4">Report Found Pet</h3>
                <form method="POST" action="confirmreportfound.php" enctype="multipart/form-data">
                  <div class="row">
                  <div class="col-md-12">
                    <P class="mt-3">Kindly scan the qr code and put some important details</P>
</div>
                    
                    <div class="col-md-12">
                      <div class="form-group">
       
                        <label class="label" for="ownersname">Pet ID</label>
                        <input type="text" class="form-control"name="petid" placeholder="Pet ID" required>
                      </div>
                    </div>
                    <div class="col-md-12">
                    <div class="form-group">
                        <label class="label" for="ownersname">Place Found</label>
                        <input type="text" class="form-control"name="placefound" placeholder="Place Found" required>
                      </div>
                    </div>
                  
                    <div class="col-md-12">
                    <P class="mt-3">Contact Information</P>
</div>
<div class="col-md-12">
  <div class="form-group">
    <label for="choice">Did you surrender the pet to authorities?</label>
    <select class="form-control" name="surrender" id="surrender" required>
      <option value="">Select an option</option>
      <option value="1">Yes</option>
      <option value="0">No</option>
    </select>
  </div>
</div>
<div class="col-md-6">
  <div class="form-group" id="noinput1" style="display: none;">
    <label class="label" for="ownersname">Preferred Name:</label>
    <input type="text" class="form-control"  name="foundername" id="ownersname" placeholder="Owner's Name">
  </div>
</div>
<div class="col-md-6">
  <div class="form-group" id="noinput2" style="display: none;">
    <label class="label" for="contactnumber">Contact Number</label>
    <input type="text" class="form-control"  name="foundercontact" id="contactnumber" placeholder="Contact Number">
  </div>
</div>
<div class="col-md-12">
  <div class="form-group" id="noinput3" style="display: none;">
    <label class="label" for="email">Email (optional)</label>
    <input type="text" class="form-control" name="founderemail" id="email" placeholder="Email">
  </div>
</div>
<div class="col-md-6">
  <div class="form-group" id="yesinput1" style="display: none;">
    <label class="label" for="ownersname">Authority/Agency/Facility Name</label>
    <input type="text" class="form-control"   name="authorityname" id="ownersname" placeholder="Owner's Name">
  </div>
</div>
<div class="col-md-6">
  <div class="form-group" id="yesinput2" style="display: none;">
    <label class="label" for="contactnumber">Authority Contact Number</label>
    <input type="text" class="form-control"  name="authoritycontact" id="contactnumber" placeholder="Contact Number">
  </div>
</div>
<div class="col-md-12">
  <div class="form-group"  id="yesinput3" style="display: none;">
    <label class="label" for="address">Address</label>
    <input type="text" class="form-control" name="authorityaddress"  id="address" placeholder="Address">
  </div>
</div>


                    <div class="col-md-12">
                      <div class="form-group">
                      <div class="form-check">
         
        </div><br>
                        <input type="submit" name="next" value="Next" class="btn btn-primary">
                        
                        <div class="submitting"></div>
                      </div>
                    </div>
                  </div>
                </form>
                <a href="reportfoundpet.php"><button type='submit' class='btn btn-info'>Go Back</button></a>
              </div>
            </div>
            <div class="col-md-5 d-flex align-items-stretch">
              <div class="info-wrap w-100 p-5 img" style="background-image: url(images/img3.jpg);">
              </div>
            </div>
          </div>
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


  
<script>
  $(document).ready(function() {
    $('#surrender').change(function() {
      var selectedOption = $(this).val();
      if (selectedOption === '1') {
        $('#yesinput1').show();
        $('#yesinput2').show();
        $('#yesinput3').show();
        $('#noinput1').hide();
        $('#noinput1 input').val('');
        $('#noinput2').hide();
        $('#noinput2 input').val('');
        $('#noinput3').hide();
        $('#noinput3 input').val('');
      } else if (selectedOption === '0') {
        $('#yesinput1').hide();
        $('#yesinput2').hide();
        $('#yesinput3').hide();
        $('#noinput1').show();
        $('#noinput1 input').val('<?php echo $users['firstname']; ?> <?php echo $users['lastname']; ?>');
        $('#noinput2').show();
        $('#noinput2 input').val('<?php echo $users['phonenumber']; ?>');
        $('#noinput3').show();
        $('#noinput3 input').val('<?php echo $users['email']; ?>');
      } else {
        $('#yesinput1').hide();
        $('#yesinput2').hide();
        $('#yesinput3').hide();
        $('#noinput1').hide();
        $('#noinput2').hide();
        $('#noinput3').hide();
      }
    });
  });
</script>
    
  </body>
</html>