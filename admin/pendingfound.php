<?php
        include("../config.php");
        
        if(!isset($_SESSION['admin'])){
            header("Location: index.php");
          }
          
          else{
            $admin = $_SESSION['admin'];
            $welcome = $admin['user'];
          }
        ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Pending Foound Posts</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <style>
.fixed-image {
    width: 100%;
    height: 300px; /* Adjust the height as desired */
    object-fit: cover;
}
        </style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">LFPRS</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
              
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="home.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                       
                            <div class="sb-sidenav-menu-heading">Tools</div>
                            <a class="nav-link" href="pending.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Pending Post
                            </a>
                            <a class="nav-link" href="users.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Users
                            </a>
                            <a class="nav-link" href="admins.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Admin
                            </a>
                            <a class="nav-link" href="registered.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Registered Pets
                            </a>
                            <a class="nav-link" href="lostpets.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Lost Pets
                            </a>
                            <a class="nav-link" href="foundpets.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Found Pets
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
   <?php echo $welcome; ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>

                
                    <div class="container-fluid px-4">
                        
                            <h2 class='text-center mb-5 mt-5'>Pending Found Pets Post </h2>
                       
                        <?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['approve1'])) {
        $id = $_POST['id'];
        $updateSql = "UPDATE reportfoundpet SET approved = 1 WHERE id = $id";
        $db->query($updateSql);
        echo "<div class='alert alert-success'  role='alert'>
  Post approved!
</div>";
    } elseif (isset($_POST['delete1'])) {
        $id = $_POST['id'];
        $deleteSql = "DELETE FROM reportfoundpet WHERE id = $id";
        $db->query($deleteSql);
        echo "<div class='alert alert-success'  role='alert'>
        Post Deleted!
      </div>";
    }
}
?>

<?php


$sql = "SELECT r.id, r.registered, r.petname, r.petid, r.pet, r.fur, r.breed, r.petimage, r.placefound, r.date, r.expirationdate, r.userid, r.surrender, r.foundername, r.foundercontact, r.founderemail, r.authorityname, r.authoritycontact, r.authorityaddress, u.firstname, u.lastname 
        FROM reportfoundpet r 
        INNER JOIN users u ON r.userid = u.id 
        ORDER BY r.date DESC";

$result = $db->query($sql);
?>

<div class="container ">
    <div class="row justify-content-center">
        <?php while ($row = $result->fetch_assoc()) : ?>
            <div class="col-md-3 mb-4">
                <div class="card">
                <img src="../<?php echo $row['petimage']; ?>" class="card-img-top col-md-2 fixed-image" alt="Pet Image">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['pet']; ?></h5>
                        <p class="card-text"><strong>Posted by:</strong> <?php echo $row['firstname'] . ' ' . $row['lastname']; ?></p>
                        <p class="card-text"><strong>Registered:</strong> <?php echo $row['registered']; ?></p>
                        <p class="card-text"><strong>Pet Name:</strong> <?php echo $row['petname']; ?></p>
                        <p class="card-text"><strong>Pet ID:</strong> <?php echo $row['petid']; ?></p>
                        <p class="card-text"><strong>Fur:</strong> <?php echo $row['fur']; ?></p>
                        <p class="card-text"><strong>Breed:</strong> <?php echo $row['breed']; ?></p>
                        <p class="card-text"><strong>Place Found:</strong> <?php echo $row['placefound']; ?></p>
                        <p class="card-text"><strong>Date Posted:</strong> <?php echo $row['date']; ?></p>
                        <p class="card-text"><strong>Founder Name:</strong> <?php echo $row['foundername']; ?></p>
                        <p class="card-text"><strong>Founder Number:</strong> <?php echo $row['foundercontact']; ?></p>
                        <p class="card-text"><strong>Founder Email:</strong> <?php echo $row['founderemail']; ?></p>
                        <p class="card-text"><strong>Authority Name:</strong> <?php echo $row['authorityname']; ?></p>
                        <p class="card-text"><strong>Authority Number:</strong> <?php echo $row['authoritycontact']; ?></p>
                        <p class="card-text"><strong>Authotity Address:</strong> <?php echo $row['authorityaddress']; ?></p>
                        <div class="btn-group" role="group">
                            <form action="#" method="post" class="mr-2" onsubmit="return confirm('Are you sure you want to approve this?');">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button type="submit" name="approve1" class="btn btn-success">Approve</button>
                            </form>
                            <form action="#" method="post" onsubmit="return confirm('Are you sure you want to remove this?');">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button type="submit" name="delete1" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>      

                       
                       
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; LFPRS 2023</div>
                           
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
