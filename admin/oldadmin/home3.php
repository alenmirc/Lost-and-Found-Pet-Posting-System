<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
            <li><a href="home.php" class="active">Dashboard</a></li>
            <li><a href="users.php">Users</a></li>
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
    <h1>Dashboard</h1><br>
            <div class="row">
                <div class="col-md-4">
                    <div class="card-summary">
                        <h2>Total Users</h2>
                        <p>   <?php 
                    $sql = "SELECT count(*) FROM users ";
                    $result = $db->query($sql);
                      
                    // Display data on web page
                    while($row = mysqli_fetch_array($result)) {
                        echo $row['count(*)'];
                    }


                    ?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-summary">
                        <h2>Total Admins</h2>
                        <p><?php 
                    $sql = "SELECT count(*) FROM admin ";
                    $result = $db->query($sql);
                      
                    // Display data on web page
                    while($row = mysqli_fetch_array($result)) {
                        echo $row['count(*)'];
                    }


                    ?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-summary">
                        <h2>Total Registered Pets</h2>
                        <p><?php 
                    $sql = "SELECT count(*) FROM registerpet ";
                    $result = $db->query($sql);
                      
                    // Display data on web page
                    while($row = mysqli_fetch_array($result)) {
                        echo $row['count(*)'];
                    }


                    ?></p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card-summary">
                        <h2>Total Lost Pets</h2>
                        <p><?php 
                    $sql = "SELECT count(*) FROM reportlostpet ";
                    $result = $db->query($sql);
                      
                    // Display data on web page
                    while($row = mysqli_fetch_array($result)) {
                        echo $row['count(*)'];
                    }


                    ?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-summary">
                        <h2>Total Found Pets</h2>
                        <p><?php 
                    $sql = "SELECT count(*) FROM reportfoundpet ";
                    $result = $db->query($sql);
                      
                    // Display data on web page
                    while($row = mysqli_fetch_array($result)) {
                        echo $row['count(*)'];
                    }


                    ?></p>
                    </div>
                </div>
            </div>

     
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>
