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
        <title>Dashboard</title>
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
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Total Users</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <p>   <?php 
                    $sql = "SELECT count(*) FROM users ";
                    $result = $db->query($sql);
                      
                    // Display data on web page
                    while($row = mysqli_fetch_array($result)) {
                        echo $row['count(*)'];
                    }


                    ?></p>   
                                    <a class="small text-white stretched-link" href="users.php"></a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Total Admin</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <p><?php 
                    $sql = "SELECT count(*) FROM admin ";
                    $result = $db->query($sql);
                      
                    // Display data on web page
                    while($row = mysqli_fetch_array($result)) {
                        echo $row['count(*)'];
                    }


                    ?></p>
                                        <a class="small text-white stretched-link" href="admins.php"></a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Total Registered Pets</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <p><?php 
                    $sql = "SELECT count(*) FROM registerpet ";
                    $result = $db->query($sql);
                      
                    // Display data on web page
                    while($row = mysqli_fetch_array($result)) {
                        echo $row['count(*)'];
                    }


                    ?></p>
                    <a class="small text-white stretched-link" href="registered.php"></a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Total Lost Pets</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <p><?php 
                    $sql = "SELECT count(*) FROM reportlostpet ";
                    $result = $db->query($sql);
                      
                    // Display data on web page
                    while($row = mysqli_fetch_array($result)) {
                        echo $row['count(*)'];
                    }


                    ?></p>
                                        <a class="small text-white stretched-link" href="lostpets.php"></a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Total Found Pets</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <p><?php 
                    $sql = "SELECT count(*) FROM reportfoundpet ";
                    $result = $db->query($sql);
                      
                    // Display data on web page
                    while($row = mysqli_fetch_array($result)) {
                        echo $row['count(*)'];
                    }


                    ?></p>
                                        <a class="small text-white stretched-link" href="foundpets.php"></a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Pending Posts</div>         
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <p><?php 
                   $sql = "SELECT 
                   (SELECT COUNT(*) FROM reportlostpet WHERE approved = 0) AS lost_count,
                   (SELECT COUNT(*) FROM reportfoundpet WHERE approved = 0) AS found_count";
       
       $result = $db->query($sql);
       
       if ($result) {
         $row = $result->fetch_assoc();
         $lostCount = $row['lost_count'];
         $foundCount = $row['found_count'];
         $totalcount = $lostCount + $foundCount;
       
         echo  $totalcount ;
       } else {
         echo "Error in query execution";
       }

                    ?></p>
                                        <a class="small text-white stretched-link" href="pending.php"></a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
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
