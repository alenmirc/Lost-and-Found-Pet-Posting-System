<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <!-- Custom Styles -->
    <style>
        /* Custom dark theme styles */
        body {
            background-color: #1a1a1a;
            color: #fff;
        }

        .login-form {
            margin-top: 100px;
        }

        .login-form h2 {
            color: #fff;
            margin-bottom: 30px;
        }

        .form-control {
            background-color: #333;
            color: #fff;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>

<body>

<?php
include("../config.php");
  
if (isset($_POST['submit'])) {

$username = $_POST['username'];
$password = $_POST['password'];

$sql="SELECT * FROM admin where user= '$username' AND password = '$password' ";
$query = $db->query($sql);

if($query->num_rows == 0){
  echo "<div class='alert alert-danger'>
   Wrong username and password!
</div>"; 

}else {
    $data = $query->fetch_assoc();
    $_SESSION['admin'] = $data;
    header("location:home.php");
}
}
?>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <form class="login-form" action="#" method="post">
                    <h2 class="text-center">Admin Login</h2>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>
