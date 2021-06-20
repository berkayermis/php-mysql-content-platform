<?php

require_once('../config.php');
$conn = mysqli_connect($server, $username, $password,$database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$contentID = $_GET['id'];
$userID = $_GET['user'];

if($_GET['key']==1){
$sql = "INSERT INTO wishlist (user_id,content_id) VALUES (?,?)";
$statement = mysqli_prepare($conn,$sql);
mysqli_stmt_bind_param($statement,'ii',$userID,$contentID);
mysqli_stmt_execute($statement);
print(mysqli_stmt_error($statement) . "\n");
mysqli_stmt_close($statement);
header('Location: mylist.php');
exit;

}
else{
    $sql = "DELETE FROM wishlist WHERE content_id='$contentID' AND user_id='$userID'";

    if (mysqli_query($conn, $sql)) {
      } else {
        echo "Error deleting record: " . mysqli_error($conn);
      }
    header('Location: mylist.php');
    exit;

}

mysqli_close($conn);