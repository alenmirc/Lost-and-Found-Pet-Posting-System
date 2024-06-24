
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

include("config.php");

$viewid = $_GET['id'];









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



$sql = "SELECT petname, date, registered, userid, petimage, contactname, contactnumber, contactemail FROM reportlostpet WHERE id=$viewid";
$result = $db->query($sql);
while($row = $result->fetch_assoc()) {

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
            <a href="lostpets.php" class="btn btn-primary go-back-btn mb-3">Go Back</a>
                    <div class="row gutters-sm">
                      
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <img src="<?php echo $row['petimage'] ?>" alt="Admin"  class="col-md-12">
                                        <div class="mt-3">
                                            <h4><?php echo $row['petname'] ?></h4>
                                            <p class="text-muted font-size-sm"><?php echo $registerText; ?>
                                            </p>
                                            <p class="text-muted font-size-sm">Date Posted: <?php echo $row['date'] ?>
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
                            <h4 >Contact Information</h4>
</div>
                                <div class="card-body">
                                   
                                            <h6 ><?php if ($row['registered'] == 1) {
  echo "Pet is registered, kindly scan the QR Code in pets collar to view contact details of pet owner.";
  echo '
  <br><br><hr>
  <br>
                      <p><strong>You can also leave your contact details to notify the pet owner.</p></strong>
                      <form id="formA" method="post" action="#" enctype="multipart/form-data">
                      <div class="form-group"><br>
        <label for="additionalInfo">Name:</label>
        <input type="text" class="form-control" value="' . $users["firstname"] . ' ' . $users["lastname"] . '" name="contactname" required>
      </div>
      <div class="form-group">
        <label class="label">Contact Number:</label>
        <input type="text" class="form-control" value="' . $users["phonenumber"] . '"  name="contactnumber" required>
      </div>   
      <div class="form-group">
        <label class="label">Message:</label>
        <input type="text" class="form-control" name="message" required >
      </div>
      <div class="form-group">
        <label class="label">Upload Photo of Pet (gif, jpeg, jpg)</label>
        <input type="file" class="form-control-file" name="petimage" id="photo" required>
      </div>
      <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="agreementCheckbox" required>
            <label class="form-check-label" for="agreementCheckbox">
              I hereby agree that my contact information will be disclosed to the pet owner.
            </label>
                    </div><br>
  
                    <button type="submit" name="send" class="btn btn-primary">Send</button>
      </form>';
} elseif ($row['registered'] == 0) {
  echo '
  <p><strong>Contact Name: </strong>' . $row['contactname'] . '</p>
  <p><strong>Contact Number: </strong>' . $row['contactnumber'] . '</p>
  <p><strong>Contact Email: </strong>' . $row['contactemail'] . '</p>
  ';

  echo '<br><br>';
echo '<p style="color:red;"><strong>It is advisable and required to surrender an unregistered pet to the authorities in order to avoid any potential issues.</strong></p><br>';
echo '<form id="formA" method="post" action="#" enctype="multipart/form-data">';
echo '<div class="form-group">';
echo '<label for="additionalInfo">Name of Authority/Establishment:</label>';
echo '<input type="text" class="form-control"  name="contactname" required>';
echo '</div>';
echo '<div class="form-group">';
echo '<label for="additionalInfo">Authority Contact Number:</label>';
echo '<input type="text" class="form-control"  name="contactnumber" required>';
echo '</div>';
echo '<div class="form-group">';
echo '<label for="additionalInfo">Message:</label>';
echo '<input type="text" class="form-control" name="message" required>';
echo '</div>';
echo '<div class="form-group">';
echo '<label for="photo">Upload Photo of Pet (gif, jpeg, jpg)</label>';
echo '<input type="file" class="form-control-file" name="petimage" id="photo" required>';
echo '</div>';
echo '<div class="form-check">';
echo '<input class="form-check-input" type="checkbox" value="" id="agreementCheckbox" required>';
echo '<label class="form-check-label" for="agreementCheckbox">';
echo 'I hereby agree that my contact information will be disclosed to the pet owner.';
echo '</label>';
echo '</div><br>';
echo '<button type="submit" name="send" class="btn btn-primary">Send</button>';
echo '</form>';
}
?></p></strong></h6>

<?php
    if (isset($_POST['send'])) {
    $contactname = $_POST['contactname'];
    $userid = $users['id'];
    $ownerid = $row['userid'];
$contactnumber = $_POST['contactnumber'];
$message = $_POST['message'];
$datetoday = date("Y-m-d");
    
$target_dir2 = "uploads/notifylost/";
$target_file2 = $target_dir2 . uniqid().date("Y-m-d-H-i-s").$_FILES["petimage"]["name"];
$uploadOk2 = 1;
$imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
$check2 = getimagesize($_FILES["petimage"]["tmp_name"]);
   
    if (file_exists($target_file2)) {
        echo "<div class='alert alert-danger'>
        <strong>Sorry!</strong> File already exist.. Please try again!
      </div>";
        $uploadOk2 = 0;
      }

    else if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg"
      && $imageFileType2 != "gif" ) {
        echo "<div class='alert alert-danger'>
        <strong>Sorry!</strong> Only JPG, JPEG, PNG & GIF files are allowed.. Please try again!
      </div>";
        $uploadOk2 = 0;
      }
    
      else if ($uploadOk2 == 1){
         move_uploaded_file($_FILES["petimage"]["tmp_name"], $target_file2);  

         $sql="INSERT into notifylost VALUES ('','$userid','$viewid','$ownerid','$target_file2','$contactname','$contactnumber','$message','$datetoday')";
         $db->query($sql);
         echo  "<br><div class='alert alert-success'>Thank you rescuer, Your message has been sent!</div>"; 

    }

    
  }
?>
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