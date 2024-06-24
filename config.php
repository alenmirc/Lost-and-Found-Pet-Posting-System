<?php

$faviconCode = '<link rel="icon" type="image/x-icon" href="images/favicon.ico">';

echo $faviconCode;

session_start();


$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "lfprs";

$db = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die("connection error");
?>