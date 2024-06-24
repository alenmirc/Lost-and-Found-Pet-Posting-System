<?php
include("config.php");

if (isset($_GET['code'])) {
    $verificationCode = $_GET['code'];
    
    $sql = "SELECT * FROM users WHERE verification_code = '$verificationCode'";
$query = $db->query($sql);

if ($query->num_rows > 0) {
  // Verification code matches, update the user's account as verified
  $data = $query->fetch_assoc();
  $userId = $data['id'];
  $updateSql = "UPDATE users SET is_verified = 1 WHERE id = $userId";
  $db->query($updateSql);

  // Set a success message in the session
  $_SESSION['verify'] = "Your account has been successfully verified!";
  header("Location: login.php");
} else {
  // Verification code does not match
  $_SESSION['verify'] = "Invalid verification code!";
  header("Location: login.php");
}

exit();
}
?>
