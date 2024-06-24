<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Found Pets</title>
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
            <li><a href="registered.php">Registered Pets</a></li>
            <li><a href="lostpets.php" >Lost Pets</a></li>
            <li><a href="foundpets.php"  class="active">Found Pets</a></li>
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
                  
       // Function to escape user inputs
function escape($value)
{
    global $db;
    return mysqli_real_escape_string($db, trim($value));
}

// Add New Found Pet
if (isset($_POST['add'])) {
    $registered = escape($_POST['registered']);
    $userid = escape($_POST['userid']);
    $petid = escape($_POST['petid']);
    $petname = escape($_POST['petname']);
    $pet = escape($_POST['pet']);
    $fur = escape($_POST['fur']);
    $spot = escape($_POST['spot']);
    $breed = escape($_POST['breed']);
    $petimage = $_FILES['petimage']['name'];
    $petimage_tmp = $_FILES['petimage']['tmp_name'];
    $placefound = escape($_POST['placefound']);
    $foundername = escape($_POST['foundername']);
    $foundercontact = escape($_POST['foundercontact']);
    $founderemail = escape($_POST['founderemail']);
    $surrender = escape($_POST['surrender']);
    $authorityname = escape($_POST['authorityname']);
    $authoritycontact = escape($_POST['authoritycontact']);
    $authorityaddress = escape($_POST['authorityaddress']);
    $approved = escape($_POST['approved']);
    $date = escape($_POST['date']);

    move_uploaded_file($petimage_tmp, "../uploads/foundpets/" . $petimage);

    $sql = "INSERT INTO reportfoundpet (registered, userid, petid, petname, pet, fur, spot, breed, petimage, placefound, foundername, foundercontact, founderemail, surrender, authorityname, authoritycontact, authorityaddress, approved, date)
            VALUES ('$registered', '$userid', '$petid', '$petname', '$pet', '$fur', '$spot', '$breed', '$petimage', '$placefound', '$foundername', '$foundercontact', '$founderemail', '$surrender', '$authorityname', '$authoritycontact', '$authorityaddress', '$approved', '$date')";
    $db->query($sql);
    echo "Add Success.";
}

// Update Found Pet
if (isset($_POST['update'])) {
    $update_id = escape($_POST['update_id']);
    $petname = escape($_POST['petname']);
    $pet = escape($_POST['pet']);
    $fur = escape($_POST['fur']);
    $spot = escape($_POST['spot']);
    $breed = escape($_POST['breed']);
    $placefound = escape($_POST['placefound']);
    $foundername = escape($_POST['foundername']);
    $foundercontact = escape($_POST['foundercontact']);
    $founderemail = escape($_POST['founderemail']);
    $surrender = escape($_POST['surrender']);
    $authorityname = escape($_POST['authorityname']);
    $authoritycontact = escape($_POST['authoritycontact']);
    $authorityaddress = escape($_POST['authorityaddress']);
    $approved = escape($_POST['approved']);
    $date = escape($_POST['date']);

    $sql = "UPDATE reportfoundpet SET petname='$petname', pet='$pet', fur='$fur', spot='$spot', breed='$breed', placefound='$placefound', foundername='$foundername', foundercontact='$foundercontact', founderemail='$founderemail', surrender='$surrender', authorityname='$authorityname', authoritycontact='$authoritycontact', authorityaddress='$authorityaddress', approved='$approved', date='$date' WHERE id='$update_id'";
    $db->query($sql);
    echo "Update Success.";
}

// Delete Found Pet
if (isset($_POST['delete'])) {
    $delete_id = escape($_POST['delete_id']);

    $sql = "DELETE FROM reportfoundpet WHERE id='$delete_id'";
    $db->query($sql);
    echo "Delete Success.";
}
?>



<h1>Found Pets  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add New</button></h1>
<br>
<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-dark text-light">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Add New Found Pet</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="add_registered">Registered:</label>
            <input type="number" class="form-control" id="add_registered" name="registered" required>
          </div>
          <div class="form-group">
            <label for="add_userid">Posted By (userid):</label>
            <input type="number" class="form-control" id="add_userid" name="userid" required>
          </div>
          <div class="form-group">
            <label for="add_petid">Pet ID:</label>
            <input type="text" class="form-control" id="add_petid" name="petid" required>
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
            <label for="add_fur">Fur:</label>
            <input type="text" class="form-control" id="add_fur" name="fur" required>
          </div>
          <div class="form-group">
            <label for="add_spot">Spot:</label>
            <input type="text" class="form-control" id="add_spot" name="spot" required>
          </div>
          <div class="form-group">
            <label for="add_breed">Breed:</label>
            <input type="text" class="form-control" id="add_breed" name="breed" required>
          </div>
          <div class="form-group">
            <label for="add_petimage">Pet Image:</label>
            <input type="file" class="form-control-file" id="add_petimage" name="petimage" required>
          </div>
          <div class="form-group">
            <label for="add_placefound">Place Found:</label>
            <input type="text" class="form-control" id="add_placefound" name="placefound" required>
          </div>
          <div class="form-group">
            <label for="add_foundername">Founder Name:</label>
            <input type="text" class="form-control" id="add_foundername" name="foundername" required>
          </div>
          <div class="form-group">
            <label for="add_foundercontact">Founder Contact:</label>
            <input type="text" class="form-control" id="add_foundercontact" name="foundercontact" required>
          </div>
          <div class="form-group">
            <label for="add_founderemail">Founder Email:</label>
            <input type="email" class="form-control" id="add_founderemail" name="founderemail" required>
          </div>
          <div class="form-group">
            <label for="add_surrender">Surrender:</label>
            <input type="text" class="form-control" id="add_surrender" name="surrender" required>
          </div>
          <div class="form-group">
            <label for="add_authorityname">Authority Name:</label>
            <input type="text" class="form-control" id="add_authorityname" name="authorityname" required>
          </div>
          <div class="form-group">
            <label for="add_authoritycontact">Authority Contact:</label>
            <input type="text" class="form-control" id="add_authoritycontact" name="authoritycontact" required>
          </div>
          <div class="form-group">
            <label for="add_authorityaddress">Authority Address:</label>
            <input type="text" class="form-control" id="add_authorityaddress" name="authorityaddress" required>
          </div>
          <div class="form-group">
            <label for="add_approved">Approved:</label>
            <input type="text" class="form-control" id="add_approved" name="approved" required>
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
      <th>Registered</th>
      <th>Posted By (userid)</th>
      <th>Pet ID</th>
      <th>Pet Name</th>
      <th>Pet</th>
      <th>Fur</th>
      <th>Breed</th>
      <th>Petimg</th>
      <th>Place Found</th>
      <th>Founder Name</th>
      <th>Founder Contact</th>
      <th>Founder Email</th>
      <th>Surrender</th>
      <th>Authority Name</th>
      <th>Authority Contact</th>
      <th>Authority Address</th>
      <th>Approved</th>
      <th>Date</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT id, registered, userid, petid, petname, pet, breed, fur, petimage, placefound, foundername, foundercontact, founderemail , surrender, authorityname, authoritycontact, authorityaddress, approved, date FROM reportfoundpet";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["registered"] . "</td>";
            echo "<td>" . $row["userid"] . "</td>";
            echo "<td>" . $row["petid"] . "</td>";
            echo "<td>" . $row["petname"] . "</td>";
            echo "<td>" . $row["pet"] . "</td>";
            echo "<td>" . $row["fur"] . "</td>";
            echo "<td>" . $row["breed"] . "</td>";
            echo "<td><img class='card-img-top border border-dark z-depth-2' style='width: 3rem; height:3rem; object-fit: cover;' src='../" . $row['petimage'] . "' alt='View'><br>" . $row["petimage"] . "</td>";
            echo "<td>" . $row["placefound"] . "</td>";
            echo "<td>" . $row["foundername"] . "</td>";
            echo "<td>" . $row["foundercontact"] . "</td>";
            echo "<td>" . $row["founderemail"] . "</td>";
            echo "<td>" . $row["surrender"] . "</td>";
            echo "<td>" . $row["authorityname"] . "</td>";
            echo "<td>" . $row["authoritycontact"] . "</td>";
            echo "<td>" . $row["authorityaddress"] . "</td>";
            echo "<td>" . $row["approved"] . "</td>";
              echo "<td>" . $row["date"] . "</td>";

            echo "<td>
                <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#editModal" . $row["id"] . "'>Edit</button>
                <form action='#' method='post'>
                    <input type='hidden' name='delete_id' value='" . $row["id"] . "'>
                    <button type='submit' name='delete' class='btn btn-danger' onclick=\"return confirm('Are you sure you want to remove this?');\">Delete</button>
                </form>
            </td>";
            echo "</tr>";


                     // Edit Modal
                     echo "
                     <div class='modal fade' id='editModal" . $row["id"] . "' tabindex='-1' role='dialog' aria-labelledby='editModalLabel" . $row["id"] . "' aria-hidden='true'>
                         <div class='modal-dialog modal-dialog-centered' role='document'>
                             <div class='modal-content bg-dark text-light'>
                                 <div class='modal-header'>
                                     <h5 class='modal-title' id='editModalLabel" . $row["id"] . "'>Edit Lost Pet</h5>
                                     <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                         <span aria-hidden='true'>&times;</span>
                                     </button>
                                 </div>
                                 <div class='modal-body'>
                                     <form action='#' method='post'>
                                         <input type='hidden' name='update_id' value='" . $row["id"] . "'>
                                         <div class='form-group'>
                                             <label for='edit_petname" . $row["id"] . "'>Pet Name:</label>
                                             <input type='text' class='form-control' id='edit_petname" . $row["id"] . "' name='petname' value='" . $row["petname"] . "'>
                                         </div>
                                         <div class='form-group'>
                                             <label for='edit_pet" . $row["id"] . "'>Pet:</label>
                                             <input type='text' class='form-control' id='edit_pet" . $row["id"] . "' name='pet' value='" . $row["pet"] . "'>
                                         </div>
                                         <div class='form-group'>
                                             <label for='edit_fur" . $row["id"] . "'>Fur:</label>
                                             <input type='text' class='form-control' id='edit_fur" . $row["id"] . "' name='fur' value='" . $row["fur"] . "'>
                                         </div>
                                        
                                         <div class='form-group'>
                                             <label for='edit_breed" . $row["id"] . "'>Breed:</label>
                                             <input type='text' class='form-control' id='edit_breed" . $row["id"] . "' name='breed' value='" . $row["breed"] . "'>
                                         </div>
                                         <div class='form-group'>
                                             <label for='edit_petimage" . $row["id"] . "'>Pet Image:</label>
                                             <input type='file' class='form-control-file' id='edit_petimage" . $row["id"] . "' name='petimage'>
                                         </div>
                                         <div class='form-group'>
                                             <label for='edit_placefound" . $row["id"] . "'>Place Found:</label>
                                             <input type='text' class='form-control' id='edit_placefound" . $row["id"] . "' name='placefound' value='" . $row["placefound"] . "'>
                                         </div>
                                         <div class='form-group'>
                                             <label for='edit_foundername" . $row["id"] . "'>Founder Name:</label>
                                             <input type='text' class='form-control' id='edit_foundername" . $row["id"] . "' name='foundername' value='" . $row["foundername"] . "'>
                                         </div>
                                         <div class='form-group'>
                                             <label for='edit_foundercontact" . $row["id"] . "'>Founder Contact:</label>
                                             <input type='text' class='form-control' id='edit_foundercontact" . $row["id"] . "' name='foundercontact' value='" . $row["foundercontact"] . "'>
                                         </div>
                                         <div class='form-group'>
                                             <label for='edit_founderemail" . $row["id"] . "'>Founder Email:</label>
                                             <input type='email' class='form-control' id='edit_founderemail" . $row["id"] . "' name='founderemail' value='" . $row["founderemail"] . "'>
                                         </div>
                                         <div class='form-group'>
                                             <label for='edit_surrender" . $row["id"] . "'>Surrender:</label>
                                             <input type='text' class='form-control' id='edit_surrender" . $row["id"] . "' name='surrender' value='" . $row["surrender"] . "'>
                                         </div>
                                         <div class='form-group'>
                                             <label for='edit_authorityname" . $row["id"] . "'>Authority Name:</label>
                                             <input type='text' class='form-control' id='edit_authorityname" . $row["id"] . "' name='authorityname' value='" . $row["authorityname"] . "'>
                                         </div>
                                         <div class='form-group'>
                                             <label for='edit_authoritycontact" . $row["id"] . "'>Authority Contact:</label>
                                             <input type='text' class='form-control' id='edit_authoritycontact" . $row["id"] . "' name='authoritycontact' value='" . $row["authoritycontact"] . "'>
                                         </div>
                                         <div class='form-group'>
                                             <label for='edit_authorityaddress" . $row["id"] . "'>Authority Address:</label>
                                             <input type='text' class='form-control' id='edit_authorityaddress" . $row["id"] . "' name='authorityaddress' value='" . $row["authorityaddress"] . "'>
                                         </div>
                                         <div class='form-group'>
                                             <label for='edit_approved" . $row["id"] . "'>Approved:</label>
                                             <input type='text' class='form-control' id='edit_approved" . $row["id"] . "' name='approved' value='" . $row["approved"] . "'>
                                         </div>
                                         <div class='form-group'>
                                             <label for='edit_date" . $row["id"] . "'>Date:</label>
                                             <input type='date' class='form-control' id='edit_date" . $row["id"] . "' name='date' value='" . $row["date"] . "'>
                                         </div>
                                         <button type='submit' name='update' class='btn btn-primary'>Save Changes</button>
                                     </form>
                                 </div>
                             </div>
                         </div>
                     </div>";
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
