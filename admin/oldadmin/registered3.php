<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Pets</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <!-- Custom Styles -->
    <style>
        /* Custom styles for the sidebar and content */
        body {
            background-color: #000;
            color: #fff;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 250px;
            background-color: #343a40;
            text-align: center;
            
        }

        .sidebar a.active {
    background-color: #333;
 
}

        .sidebar-logo {
            margin-bottom: 20px;
        }

        .sidebar ul {
            list-style: none;
            padding-left: 0;
            margin-bottom: 20px;
        }

        .sidebar li {
            margin-bottom: 10px;
        }

        .sidebar a {
            display: block;
            padding: 10px;
            color: #fff;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .sidebar a:hover {
            background-color: #444;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }

        .card-summary {
    background-color: #343a40;
    color: #fff;
    padding: 20px;
    margin-bottom: 20px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
    position: relative;
}

.card-summary::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 10px;
    background-color: #007bff; /* Replace with your desired color */
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
}

        .card-summary h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .card-summary p {
            font-size: 18px;
            margin-bottom: 0;
        }
    </style>
</head>

<body>
<div class="sidebar">
        <div class="sidebar-logo">
        <br><br><h3>LFPRS</h3><br>
        </div>
        <ul>
            <li><a href="home.php" >Dashboard</a></li>
            <li><a href="users.php" >Users</a></li>
            <li><a href="admins.php">Admins</a></li>
            <li><a href="registered.php" class="active">Registered Pets</a></li>
            <li><a href="lostpets.php">Lost Pets</a></li>
            <li><a href="foundpets.php">Found Pets</a></li>
        </ul>
        <?php
        include("../config.php");
        
        if(!isset($_SESSION['admin'])){
            header("Location: index.php");
          }
          
          else{
            $admin = $_SESSION['admin'];
            echo "<a style='color:white;'>Welcome  {$admin['user']}!   </a>";
            echo "<A href='logout.php' name='logout'><button type='button' class='btn btn-light ml-1'>Log Out</button></a>";
          }
        ?>
       
    </div>

    <div class="content">


        <div class="container">

        <br><br>

           
<?php
                  
                  if (isset($_POST['add'])) {
                    // Retrieve form data
                    $petid = $_POST['petid'];
                    $userid = $_POST['userid'];
                    $petname = $_POST['petname'];
                    $pet = $_POST['pet'];
                    $breed = $_POST['breed'];
                    $fur = $_POST['fur'];
                    $ownersname = $_POST['ownersname'];
                    $contactnumber = $_POST['contactnumber'];
                    $address = $_POST['address'];
                    $email = $_POST['email'];
                    $notes = $_POST['notes'];
                    $date = $_POST['date'];
                
                    // File upload for pet image
                    $petimage = $_FILES['petimage']['name'];
                    $targetDir = "../uploads/registeredpets/"; // Specify the directory where you want to save the pet images
                    $targetFilePath = $targetDir . $petimage;
                    move_uploaded_file($_FILES["petimage"]["tmp_name"], $targetFilePath);
                
                    // File upload for QR code
                    $qr = $_FILES['qr']['name'];
                    $targetDirQR = "../uploads/qrgenerated/"; // Specify the directory where you want to save the QR codes
                    $targetFilePathQR = $targetDirQR . $qr;
                    move_uploaded_file($_FILES["qr"]["tmp_name"], $targetFilePathQR);
                
                    // Insert new pet record into the database
                    $sql = "INSERT INTO registerpet (petid, userid, petname, pet, breed, fur, petimage, ownersname, contactnumber, address, email, notes, qr, date) VALUES ('$petid', '$userid', '$petname', '$pet', '$breed', '$fur', '$targetFilePath', '$ownersname', '$contactnumber', '$address', '$email', '$notes', '$targetFilePathQR', '$date')";
                    $db->query($sql);
                
                    // Refresh the page after adding the record
                    header("Location: ".$_SERVER['PHP_SELF']);
                    exit();
                }
                
                // Edit pet record
                if (isset($_POST['update'])) {
                    // Retrieve form data
                    $update_id = $_POST['update_id'];
                    $petid = $_POST['petid'];
                    $userid = $_POST['userid'];
                    $petname = $_POST['petname'];
                    $pet = $_POST['pet'];
                    $breed = $_POST['breed'];
                    $fur = $_POST['fur'];
                    $ownersname = $_POST['ownersname'];
                    $contactnumber = $_POST['contactnumber'];
                    $address = $_POST['address'];
                    $email = $_POST['email'];
                    $notes = $_POST['notes'];
                    $date = $_POST['date'];
                
                    // Check if new pet image is uploaded
                    if ($_FILES['petimage']['name']) {
                        $petimage = $_FILES['petimage']['name'];
                        $targetDir = "../uploads/";
                        $targetFilePath = $targetDir . $petimage;
                        move_uploaded_file($_FILES["petimage"]["tmp_name"], $targetFilePath);
                    } else {
                        // Keep the existing pet image if no new image is uploaded
                        $sql = "SELECT petimage FROM registerpet WHERE id = '$update_id'";
                        $result = $db->query($sql);
                        $row = $result->fetch_assoc();
                        $petimage = $row['petimage'];
                    }
                
                    // Check if new QR code is uploaded
                    if ($_FILES['qr']['name']) {
                        $qr = $_FILES['qr']['name'];
                        $targetDirQR = "../uploads/";
                        $targetFilePathQR = $targetDirQR . $qr;
                        move_uploaded_file($_FILES["qr"]["tmp_name"], $targetFilePathQR);
                    } else {
                        // Keep the existing QR code if no new code is uploaded
                        $sql = "SELECT qr FROM registerpet WHERE id = '$update_id'";
                        $result = $db->query($sql);
                        $row = $result->fetch_assoc();
                        $qr = $row['qr'];
                    }
                
                    // Update the pet record in the database
                    $sql = "UPDATE registerpet SET petid = '$petid', userid = '$userid', petname = '$petname', pet = '$pet', breed = '$breed', fur = '$fur', petimage = '$petimage', ownersname = '$ownersname', contactnumber = '$contactnumber', address = '$address', email = '$email', notes = '$notes', qr = '$qr', date = '$date' WHERE id = '$update_id'";
                    $db->query($sql);
                
                    // Refresh the page after updating the record
                    header("Location: ".$_SERVER['PHP_SELF']);
                    exit();
                }
                
                // Delete pet record
                if (isset($_POST['delete'])) {
                    $delete_id = $_POST['delete_id'];
                
                    // Delete the pet record from the database
                    $sql = "DELETE FROM registerpet WHERE id = '$delete_id'";
                    $db->query($sql);
                
                    // Refresh the page after deleting the record
                    header("Location: ".$_SERVER['PHP_SELF']);
                    exit();
                }
                ?>
<h1>Registered Pets  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add New</button></h1>
<br>

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-dark text-light">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Add New Pet</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="add_petid">Pet ID:</label>
            <input type="text" class="form-control" id="add_petid" name="petid" required>
          </div>
          <div class="form-group">
            <label for="add_userid">Posted By (userid):</label>
            <input type="number" class="form-control" id="add_userid" name="userid" required>
          </div>
          <div class="form-group">
            <label for="add_petname">Pet Name:</label>
            <input type="text" class="form-control" id="add_petname" name="petname" required>
          </div>
          <div class="form-group">
            <label for="add_pet">Pet:</label>
            <input type="text" class="form-control" id="add_pet" name="pet" required>
          </div>
          <div class="form-group">
            <label for="add_breed">Breed:</label>
            <input type="text" class="form-control" id="add_breed" name="breed" required>
          </div>
          <div class="form-group">
            <label for="add_fur">Fur:</label>
            <input type="text" class="form-control" id="add_fur" name="fur" required>
          </div>
          <div class="form-group">
            <label for="add_petimage">Pet Image:</label>
            <input type="file" class="form-control-file" id="add_petimage" name="petimage" required>
          </div>
          <div class="form-group">
            <label for="add_ownersname">Owners Name:</label>
            <input type="text" class="form-control" id="add_ownersname" name="ownersname" required>
          </div>
          <div class="form-group">
            <label for="add_contactnumber">Contact Number:</label>
            <input type="text" class="form-control" id="add_contactnumber" name="contactnumber" required>
          </div>
          <div class="form-group">
            <label for="add_address">Address:</label>
            <input type="text" class="form-control" id="add_address" name="address" required>
          </div>
          <div class="form-group">
            <label for="add_email">Email:</label>
            <input type="email" class="form-control" id="add_email" name="email" required>
          </div>
          <div class="form-group">
            <label for="add_notes">Notes:</label>
            <input type="text" class="form-control" id="add_notes" name="notes" required>
          </div>
          <div class="form-group">
            <label for="add_qr">QR Code:</label>
            <input type="file" class="form-control-file" id="add_qr" name="qr" required>
          </div>
          <div class="form-group">
            <label for="add_date">Date:</label>
            <input type="date" class="form-control" id="add_date" name="date" required>
          </div>
          <button type="submit" name="add" class="btn btn-primary">Add</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Registered Data Table -->
<table class='table'>
  <thead>
    <tr>
      <th>ID</th>
      <th>Pet ID</th>
      <th>Posted By (userid)</th>
      <th>Pet Name</th>
      <th>Pet</th>
      <th>Breed</th>
      <th>Fur</th>
      <th>Petimg</th>
      <th>Owners Name</th>
      <th>Contact Number</th>
      <th>Address</th>
      <th>Email</th>
      <th>Notes</th>
      <th>QR</th>
      <th>Date</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT id, petid, userid, petname, pet, breed, fur, petimage, ownersname, contactnumber, address, email, notes, qr, date FROM registerpet";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["petid"] . "</td>";
            echo "<td>" . $row["userid"] . "</td>";
            echo "<td>" . $row["petname"] . "</td>";
            echo "<td>" . $row["pet"] . "</td>";
            echo "<td>" . $row["breed"] . "</td>";
            echo "<td>" . $row["fur"] . "</td>";
            echo "<td><img class='card-img-top border border-dark z-depth-2' style='width: 3rem; height:3rem; object-fit: cover;' src='../" . $row['petimage'] . "' alt='View'><br>" . $row["petimage"] . "</td>";
            echo "<td>" . $row["ownersname"] . "</td>";
            echo "<td>" . $row["contactnumber"] . "</td>";
            echo "<td>" . $row["address"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["notes"] . "</td>";
            echo "<td><img class='card-img-top border border-dark z-depth-2' style='width: 3rem; height:3rem; object-fit: cover;' src='../" . $row['qr'] . "' alt='View'><br>" . $row["qr"] . "</td>";
            echo "<td>" . $row["date"] . "</td>";

            echo "<td>
                <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#editModal" . $row["id"] . "'>Edit</button>
                <form action='#' method='post'>
                    <input type='hidden' name='delete_id' value='" . $row["id"] . "'>
                    <button type='submit' name='delete' class='btn btn-danger' onclick=\"return confirm('Are you sure you want to remove this?');\">Delete</button>
                </form>
            </td>";
            echo "</tr>";


            // Edit Modal for each registered pet
            echo "<div class='modal fade' id='editModal" . $row["id"] . "' tabindex='-1' role='dialog' aria-labelledby='editModalLabel" . $row["id"] . "' aria-hidden='true'>";
            echo "<div class='modal-dialog modal-dialog-centered' role='document'>";
            echo "<div class='modal-content bg-dark text-light'>";
            echo "<div class='modal-header'>";
            echo "<h5 class='modal-title' id='editModalLabel" . $row["id"] . "'>Edit Registered Pet</h5>";
            echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
            echo "<span aria-hidden='true'>&times;</span>";
            echo "</button>";
            echo "</div>";
            echo "<div class='modal-body'>";
            echo "<form action='#' method='post' enctype='multipart/form-data'>";
            echo "<input type='hidden' name='update_id' value='" . $row["id"] . "'>";
            echo "<div class='form-group'>";
            echo "<label for='edit_petid" . $row["id"] . "'>Pet ID:</label>";
            echo "<input type='text' class='form-control' id='edit_petid" . $row["id"] . "' name='petid' value='" . $row["petid"] . "'>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='edit_userid" . $row["id"] . "'>Posted By (userid):</label>";
            echo "<input type='text' class='form-control' id='edit_userid" . $row["id"] . "' name='userid' value='" . $row["userid"] . "'>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='edit_petname" . $row["id"] . "'>Pet Name:</label>";
            echo "<input type='text' class='form-control' id='edit_petname" . $row["id"] . "' name='petname' value='" . $row["petname"] . "'>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='edit_pet" . $row["id"] . "'>Pet:</label>";
            echo "<input type='text' class='form-control' id='edit_pet" . $row["id"] . "' name='pet' value='" . $row["pet"] . "'>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='edit_breed" . $row["id"] . "'>Breed:</label>";
            echo "<input type='text' class='form-control' id='edit_breed" . $row["id"] . "' name='breed' value='" . $row["breed"] . "'>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='edit_fur" . $row["id"] . "'>Fur:</label>";
            echo "<input type='text' class='form-control' id='edit_fur" . $row["id"] . "' name='fur' value='" . $row["fur"] . "'>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='edit_petimage" . $row["id"] . "'>Pet Image:</label>";
            echo "<input type='file' class='form-control-file' id='edit_petimage" . $row["id"] . "' name='petimage'>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='edit_ownersname" . $row["id"] . "'>Owners Name:</label>";
            echo "<input type='text' class='form-control' id='edit_ownersname" . $row["id"] . "' name='ownersname' value='" . $row["ownersname"] . "'>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='edit_contactnumber" . $row["id"] . "'>Contact Number:</label>";
            echo "<input type='text' class='form-control' id='edit_contactnumber" . $row["id"] . "' name='contactnumber' value='" . $row["contactnumber"] . "'>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='edit_address" . $row["id"] . "'>Address:</label>";
            echo "<input type='text' class='form-control' id='edit_address" . $row["id"] . "' name='address' value='" . $row["address"] . "'>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='edit_email" . $row["id"] . "'>Email:</label>";
            echo "<input type='email' class='form-control' id='edit_email" . $row["id"] . "' name='email' value='" . $row["email"] . "'>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='edit_notes" . $row["id"] . "'>Notes:</label>";
            echo "<input type='text' class='form-control' id='edit_notes" . $row["id"] . "' name='notes' value='" . $row["notes"] . "'>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='edit_qr" . $row["id"] . "'>QR Code:</label>";
            echo "<input type='file' class='form-control-file' id='edit_qr" . $row["id"] . "' name='qr'>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='edit_date" . $row["id"] . "'>Date:</label>";
            echo "<input type='date' class='form-control' id='edit_date" . $row["id"] . "' name='date' value='" . $row["date"] . "'>";
            echo "</div>";
            echo "<button type='submit' name='update' class='btn btn-primary'>Update</button>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<tr><td colspan='16'>No data found</td></tr>";
    }
    ?>
  </tbody>
</table>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>
