<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data</title>
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
            <li><a href="users.php" class="active">Users</a></li>
            <li><a href="admins.php">Admins</a></li>
            <li><a href="registered.php">Registered Pets</a></li>
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
                  

                  if (isset($_POST['delete'])) {
                    $delete_id = $_POST['delete_id'];
                    $sql = "DELETE FROM users WHERE id='$delete_id'";
                    $db->query($sql);
                    echo "Delete Success.";
                }
                
                if (isset($_POST['update'])) {
                    $update_id = $_POST['update_id'];
                    $firstname = $_POST['firstname'];
                    $lastname = $_POST['lastname'];
                    $email = $_POST['email'];
                    $phonenumber = $_POST['phonenumber'];
                    $address = $_POST['address'];
                    $is_verified = $_POST['is_verified'];
                    
                    $sql = "UPDATE users SET firstname='$firstname', lastname='$lastname', email='$email', phonenumber='$phonenumber', address='$address', is_verified='$is_verified' WHERE id='$update_id'";
                    $db->query($sql);
                    echo "Update Success.";
                }
                
                if (isset($_POST['create'])) {
                    $firstname = $_POST['create_firstname'];
                    $lastname = $_POST['create_lastname'];
                    $email = $_POST['create_email'];
                    $phonenumber = $_POST['create_phonenumber'];
                    $address = $_POST['create_address'];
                    $is_verified = $_POST['create_is_verified'];
                    
                    $sql = "INSERT INTO users (firstname, lastname, email, phonenumber, address, is_verified) VALUES ('$firstname', '$lastname', '$email', '$phonenumber', '$address', '$is_verified')";
                    $db->query($sql);
                    echo "Create Success.";
                }
                ?>
<h1>User Data  <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#createModal'>Create New</button></h1>
<br>

<!-- Create New Modal -->
<div class='modal fade' id='createModal' tabindex='-1' role='dialog' aria-labelledby='createModalLabel' aria-hidden='true'>
  <div class='modal-dialog modal-dialog-centered modal-lg' role='document'>
    <div class='modal-content bg-dark text-light'>
      <div class='modal-header'>
        <h5 class='modal-title' id='createModalLabel'>Create New User</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <form action='#' method='post'>
          <div class='form-group'>
            <label for='create_firstname'>First Name:</label>
            <input type='text' class='form-control' id='create_firstname' name='create_firstname'>
          </div>
          <div class='form-group'>
            <label for='create_lastname'>Last Name:</label>
            <input type='text' class='form-control' id='create_lastname' name='create_lastname'>
          </div>
          <div class='form-group'>
            <label for='create_email'>Email:</label>
            <input type='email' class='form-control' id='create_email' name='create_email'>
          </div>
          <div class='form-group'>
            <label for='create_phonenumber'>Phone Number:</label>
            <input type='text' class='form-control' id='create_phonenumber' name='create_phonenumber'>
          </div>
          <div class='form-group'>
            <label for='create_address'>Address:</label>
            <input type='text' class='form-control' id='create_address' name='create_address'>
          </div>
          <div class='form-group'>
            <label for='create_is_verified'>Is Verified:</label>
            <input type='text' class='form-control' id='create_is_verified' name='create_is_verified'>
          </div>
          <button type='submit' name='create' class='btn btn-primary'>Create</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- User Data Table -->
<table class='table'>
  <thead>
    <tr>
      <th>ID</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>Phone Number</th>
      <th>Address</th>
      <th>Is Verified</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT id, firstname, lastname, email, phonenumber, address, is_verified FROM users";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["firstname"] . "</td>";
            echo "<td>" . $row["lastname"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["phonenumber"] . "</td>";
            echo "<td>" . $row["address"] . "</td>";
            echo "<td>" . $row["is_verified"] . "</td>";
            echo "<td>
                <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#editModal" . $row["id"] . "'>Edit</button>
                <form action='#' method='post'>
                    <input type='hidden' name='delete_id' value='" . $row["id"] . "'>
                    <button type='submit' name='delete' class='btn btn-danger' onclick=\"return confirm('Are you sure you want to remove this?');\">Delete</button>
                </form>
            </td>";
            echo "</tr>";

            // Edit Modal for each user
            echo "<div class='modal fade' id='editModal" . $row["id"] . "' tabindex='-1' role='dialog' aria-labelledby='editModalLabel" . $row["id"] . "' aria-hidden='true'>";
            echo "<div class='modal-dialog modal-dialog-centered modal-lg' role='document'>";
            echo "<div class='modal-content bg-dark text-light'>";
            echo "<div class='modal-header'>";
            echo "<h5 class='modal-title' id='editModalLabel" . $row["id"] . "'>Edit User</h5>";
            echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
            echo "<span aria-hidden='true'>&times;</span>";
            echo "</button>";
            echo "</div>";
            echo "<div class='modal-body'>";
            echo "<form action='#' method='post'>";
            echo "<input type='hidden' name='update_id' value='" . $row["id"] . "'>";
            echo "<div class='form-group'>";
            echo "<label for='edit_firstname" . $row["id"] . "'>First Name:</label>";
            echo "<input type='text' class='form-control' id='edit_firstname" . $row["id"] . "' name='firstname' value='" . $row["firstname"] . "'>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='edit_lastname" . $row["id"] . "'>Last Name:</label>";
            echo "<input type='text' class='form-control' id='edit_lastname" . $row["id"] . "' name='lastname' value='" . $row["lastname"] . "'>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='edit_email" . $row["id"] . "'>Email:</label>";
            echo "<input type='email' class='form-control' id='edit_email" . $row["id"] . "' name='email' value='" . $row["email"] . "'>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='edit_phonenumber" . $row["id"] . "'>Phone Number:</label>";
            echo "<input type='text' class='form-control' id='edit_phonenumber" . $row["id"] . "' name='phonenumber' value='" . $row["phonenumber"] . "'>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='edit_address" . $row["id"] . "'>Address:</label>";
            echo "<input type='text' class='form-control' id='edit_address" . $row["id"] . "' name='address' value='" . $row["address"] . "'>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='edit_is_verified" . $row["id"] . "'>Is Verified:</label>";
            echo "<input type='text' class='form-control' id='edit_is_verified" . $row["id"] . "' name='is_verified' value='" . $row["is_verified"] . "'>";
            echo "</div>";
            echo "<button type='submit' name='update' class='btn btn-primary'>Update</button>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<tr><td colspan='8'>No data found</td></tr>";
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
