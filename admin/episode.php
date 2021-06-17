<?php

require_once('../config.php');

// Create connection
$conn = mysqli_connect($server, $username, $password,$database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

    if(isset($_POST['create'])){

        
    }