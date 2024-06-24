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
	        	<li class="nav-item"><a href="lostpets.php" class="nav-link">Lost Pets</a></li>
	        	<li class="nav-item"><a href="foundpets.php" class="nav-link">Found Pets</a></li>
	        	<li class="nav-item"><a href="registerpet.php" class="nav-link">Register Pet</a></li>
	          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
			  </ul>
	          <form class="form-inline my-2 my-lg-0">

      <?php


if (isset($_POST['next'])) {


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

if (isset($_POST['confirmlost'])) {

  



  $petname = $_POST['petname'];
  $userid = $users['id'];
  $registered = $_POST['registered'];;
  $pet = $_POST['pet'];
  $fur = $_POST['fur'];
  $breed = $_POST['breed'];
  $lastfound = $_POST['lastfound'];
  $contactname = $_POST['contactname'];
  $contactnumber = $_POST['contactnumber'];
  $contactemail = $_POST['contactemail'];
  $datetoday = date("Y-m-d H:i:s");
  $expirationdate = date('Y-m-d H:i:s', strtotime($datetoday . ' +2 months'));

  // Perform the database insertion
  $petimage = $_FILES["petimage"];
  $target_dir2 = "uploads/lostpets/";
  $target_file2 = $target_dir2 . uniqid() . date("Y-m-d-H-i-s") . $petimage["name"];
  $uploadOk2 = 1;
  $imageFileType2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));
  $check2 = getimagesize($petimage["tmp_name"]);

  if (file_exists($target_file2)) {
    echo "<div class='alert alert-danger'>
        <strong>Sorry!</strong> File already exists. Please try again!
      </div>";
    $uploadOk2 = 0;
  } else if ($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg" && $imageFileType2 != "gif") {
    echo "<div class='alert alert-danger'>
        <strong>Sorry!</strong> Only JPG, JPEG, PNG & GIF files are allowed. Please try again!
      </div>";
    $uploadOk2 = 0;
  } else if ($uploadOk2 == 1) {
    move_uploaded_file($petimage["tmp_name"], $target_file2);

    $sql = "INSERT into reportlostpet VALUES ('','$registered','$userid','$petname','$pet','$fur','$breed','$target_file2','$lastfound','$contactname','$contactnumber','$contactemail','','$datetoday','$expirationdate')";
    $db->query($sql);
    echo  "<div class='alert alert-success'>Success! Your post is under approval. It will be posted once approved.</div>";
  }
}

    ?>



<?php
  
if (isset($_POST['confirmfound'])) {

$userid = $users['id'];
$petid = $_POST['petid'];
$petname = $_POST['petname'];
$pet = $_POST['pet'];
$fur = $_POST['fur'];
$breed = $_POST['breed'];
$placefound = $_POST['placefound'];
$foundername = $_POST['foundername'];
$foundercontact = $_POST['foundercontact'];
$founderemail = $_POST['founderemail'];
$surrender = $_POST['surrender'];
$authorityname = $_POST['authorityname'];
$authoritycontact = $_POST['authoritycontact'];
$authorityaddress = $_POST['authorityaddress'];
$registered = $_POST['registered'];
$datetoday = date("Y-m-d");
$expirationdate = date('Y-m-d H:i:s', strtotime($datetoday . ' +2 months'));


$target_dir2 = "uploads/foundpets/";
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
  
           $sql="INSERT into reportfoundpet VALUES ('','$registered','$userid','$petid','$petname','$pet','$fur','$breed','$target_file2','$placefound','$foundername','$foundercontact','$founderemail','$surrender','$authorityname','$authoritycontact','$authorityaddress','','$datetoday','$expirationdate')";
           $db->query($sql);
           echo  "<div class='alert alert-success'>Success! Your post is under approval. It will be posted once approved.</div>";
  
      }
  
      
    }
 


?>

<section class="ftco-section bg-light ftco-faqs">
    	<div class="container">
    				<div class="heading-section mb-5 mt-5 mt-lg-0">
	            <h2 class="mb-3 text-center">Frequently Asks Questions</h2>
    				</div>
    				<div id="accordion" class="myaccordion w-100" aria-multiselectable="true">
						  <div class="card">
						    <div class="card-header p-0" id="headingOne">
						      <h2 class="mb-0">
						        <button href="#collapseOne" class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne">
						        	<p class="mb-0">How does the LFPRS work?</p>
						          <i class="fa" aria-hidden="true"></i>
						        </button>
						      </h2>
						    </div>
						    <div class="collapse show" id="collapseOne" role="tabpanel" aria-labelledby="headingOne">
						      <div class="card-body py-3 px-0">
						      	<ol>
						      		<p>Our system is designed to help reunite lost pets with their owners. Users can browse through listings of lost and found pets, post information about their lost pets, and contact each other for potential reunions.</p>
						      	</ol>
						      </div>
						    </div>
						  </div>

						  <div class="card">
						    <div class="card-header p-0" id="headingTwo" role="tab">
						      <h2 class="mb-0">
						        <button href="#collapseTwo" class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="false" aria-controls="collapseTwo">
						        	<p class="mb-0">How can I report a lost pet?</p>
						          <i class="fa" aria-hidden="true"></i>
						        </button>
						      </h2>
						    </div>
						    <div class="collapse" id="collapseTwo" role="tabpanel" aria-labelledby="headingTwo">
						      <div class="card-body py-3 px-0">
						      	<ol>
						      		<p>To report a lost pet, click on the "Post Lost Pet" or "Report Lost Pet" button in the Lost Pets section. Fill in the required details about your pet, provide a clear photo, and submit the listing. This will help others recognize and identify your pet if they come across it.</p>
						      	</ol>
						      </div>
						    </div>
						  </div>

						  <div class="card">
						    <div class="card-header p-0" id="headingThree" role="tab">
						      <h2 class="mb-0">
						        <button href="#collapseThree" class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="false" aria-controls="collapseThree">
						        	<p class="mb-0">What should I do if I find a lost pet?</p>
						          <i class="fa" aria-hidden="true"></i>
						        </button>
						      </h2>
						    </div>
						    <div class="collapse" id="collapseThree" role="tabpanel" aria-labelledby="headingTwo">
						      <div class="card-body py-3 px-0">
						      	<ol>
						      		<p>If you find a lost pet, you can browse through the listings on our website to see if it matches any existing lost pet listings. If not, you can create a found pet listing, providing details about the pet, uploading a photo, and providing your contact information. This increases the chances of reuniting the pet with its owner.</p>
						      	</ol>
						      </div>
						    </div>
						  </div>

						  <div class="card">
						    <div class="card-header p-0" id="headingThree" role="tab">
						      <h2 class="mb-0">
						        <button href="#collapsefive" class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="false" aria-controls="collapseThree">
						        	<p class="mb-0">How can I contact the owner of a found pet?</p>
						          <i class="fa" aria-hidden="true"></i>
						        </button>
						      </h2>
						    </div>
						    <div class="collapse" id="collapsefive" role="tabpanel" aria-labelledby="headingTwo">
						      <div class="card-body py-3 px-0">
						      	<ol>
						      		<p>If you come across a found pet listing that matches a lost pet, you can use the contact information provided by the owner to reach out to them directly. Notify them about the potential match and arrange a meeting to verify the pet's identity.</p>
						      	</ol>
						      </div>
						    </div>
						  </div>

						  <div class="card">
						    <div class="card-header p-0" id="headingFour" role="tab">
						      <h2 class="mb-0">
						        <button href="#collapseFour" class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="false" aria-controls="collapseFour">
						        	<p class="mb-0">Is there any cost involved in using the Lost and Found Pet Rescue System?</p>
						          <i class="fa" aria-hidden="true"></i>
						        </button>
						      </h2>
						    </div>
						    <div class="collapse" id="collapseFour" role="tabpanel" aria-labelledby="headingTwo">
						      <div class="card-body py-3 px-0">
						     <ol> 	
							  <p>Our system is free to use. We aim to provide a platform that connects pet owners, finders, and animal lovers, and facilitates the reunion of lost pets with their owners, without any charges.</p>
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


    
  </body>
</html>

