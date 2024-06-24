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
        <title>Create Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
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
                       <?php
               if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Get form data
                $user = $_POST['user'];
                $password = $_POST['password'];
            
                // Create a new record in the "admin" table
                // Modify the SQL query according to your table structure
                $sql = "INSERT INTO admin (user, password) VALUES (?, ?)";
                
                $stmt = $db->prepare($sql);
                $stmt->bind_param('ss', $user, $password);
                
                if ($stmt->execute()) {
                    echo "Record created successfully.";
                } else {
                    echo "Error creating record: " . $db->error;
                }
                
                $stmt->close();
            }
            
            // Close the database connection
            $db->close();
            
            ?>
                       <div class="container">
        <h2>Create Admin</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="user" class="form-label">User:</label>
                <input type="text" class="form-control" name="user" required>
            </div>
            
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div> 
                       
                    </div>
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
