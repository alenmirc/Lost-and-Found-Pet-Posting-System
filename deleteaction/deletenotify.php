<?php
include("../config.php");
$deleteid = $_GET['id'];

$sql = "SELECT id, ownerid FROM notifylost WHERE id='$deleteid'";
$result = $db->query($sql);

while($row = $result->fetch_assoc()) {



if(!isset($_SESSION['users'])){
    $_SESSION['loginfirst'] = "Please login first to continue.";
    header("Location: login.php");
  }


else {
  
  $users = $_SESSION['users'];
  echo "<a style='color:white;'>Welcome  {$users['firstname']}!   </a>";
  echo "<A href='profile.php' name='profile'><button type='button' class='btn btn-info ml-3'>View Profile</button></a>";
  echo "<A href='logout.php' name='logout'><button type='button' class='btn btn-light ml-1'>Log Out</button></a>";
}

if ($row['id'] === $deleteid && $row['userid'] !== $users['ownerid']) {
    header('Location: ../notification.php');
    exit(); 
}
else {
    $sql="DELETE FROM notifylost WHERE id='$deleteid'";
    $db->query($sql);
    $_SESSION['Success'] = "Successfully deleted.";
    header("location: ../notification.php");
    
}



}

?>
<br><br><br><br>
