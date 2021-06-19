<?php
session_start();
?>

<?php

require_once('../config.php');

// Create connection
$conn = mysqli_connect($server, $username, $password,$database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

    $update_sql = 'UPDATE user SET is_active = false WHERE email = "'.$_SESSION['email'].'" ';
    if (mysqli_query($conn, $update_sql)) {
        echo "Record updated successfully";
        $_SESSION['email'] = "";
        $_SESSION['phone'] = "";

        header("Location: ../index.php");
      } else {
        echo "Error updating record: " . mysqli_error($conn);
      }

?>