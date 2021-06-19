<?php
session_start();
?>

<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Update User Settings</title>
    <meta name="description" content="Series-Movies Suggestion System" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="stylesheet" href="../assets/css/landing-pages.css">
</head>

<body>
    <style>
        body::before{
            background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.2) 60%, rgba(0, 0, 0, 0.9) 100%),url('../images/admin.jpg');
        }
    </style>

    <main style="padding: 0px 10px;">
        <header class="d-flex space-between middle-align">
           <a href="browse.php">
            <img src="../images/42.png" height="50px" width="170px" alt="site logo main" style="margin: auto;"></img>
        </a> 
        </header>
        <section id="update-mail-section">
            <!--Update E-Mail form start-->

                <div class="loginContainer d-flex direction-column">
                    <h2 class="formtitle">Change E-Mail</h2>
                    <form action="user.php" id="loginForm" class="d-flex direction-column" method="post" name="loginForm">
                        <input type="email" name="newEmail" id="newEmail" class="newEmail" placeholder="New E-Mail Adress" required/>
                        <!-- <input type="email" name="newEmail" id="newEmail" class="newEmail" placeholder="Confirm New E-Mail Adress" required/> -->
                        <button type="submit" name="updateMail" class="button submitButton" id="updateMailButton">Update</button>
                    </form>
                </div>

            <!--Update E-Mail form End-->
        </section>

        <?php
                        require_once('../config.php');

                        // Create connection
                        $conn = mysqli_connect($server, $username, $password,$database);
                        
                        // Check connection
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        if(isset($_POST['updateMail'])){
                            // $_SESSION['email'] = $row['email'];
                            $newMail = $_POST['newEmail'];

                            $update_sql = 'UPDATE user SET email = "'. $newMail . '" WHERE email = "'.$_SESSION['email'].'" ';
                            if (mysqli_query($conn, $update_sql)) {
                                echo "Record updated successfully";
                                $_SESSION['email'] = $newMail;
                                header("Location: account.php");
                              } else {
                                echo "Error updating record: " . mysqli_error($conn);
                              }

                        }    

            
                    ?>


        <br>

        <section id="change-password-section">
            <!--Update Password form start-->

                <div class="loginContainer d-flex direction-column">
                    <h2 class="formtitle">Change Password</h2>
                    <form action="user.php" id="loginForm" class="d-flex direction-column" method="post" name="loginForm">
                        <input type="password" name="newPassword" id="newPassword" class="newPassword" placeholder="New Password" required/>
                        <!-- <input type="password" name="newPassword" id="newPassword" class="newPassword" placeholder="Confirm New Password" required/> -->
                        <button type="submit" name="updatePassword" class="button submitButton" id="updatePassword">Update</button>
                    </form>
                </div>

            <!--Update Password form End-->

            <?php
                        require_once('../config.php');

                        // Create connection
                        $conn = mysqli_connect($server, $username, $password,$database);
                        
                        // Check connection
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        if(isset($_POST['updatePassword'])){
                            // $_SESSION['email'] = $row['email'];
                            $newPW = $_POST['newPassword'];

                            $update_sql = 'UPDATE user SET user_pass = "'. $newPW . '" WHERE email = "'.$_SESSION['email'].'"';
                            


                            if (mysqli_query($conn, $update_sql)) {
                                echo "Record updated successfully";
                                header("Location: account.php");
                              } else {
                                echo "Error updating record: " . mysqli_error($conn);
                              }

                        }    

            
                    ?>


        </section>

        <br>

        <section id="change-phone-section">
            <!--Update Phone Number form start-->

                <div class="loginContainer d-flex direction-column">
                    <h2 class="formtitle">Change Number</h2>
                    <form action="user.php" id="loginForm" class="d-flex direction-column" method="post" name="loginForm">
                        <input type="tel" name="newPhone" id="newPhone" class="newPhone" placeholder="New Phone Number" required/>
                        <!-- <input type="tel" name="newPhone" id="newPhone" class="newPhone" placeholder="Confirm New Phone Number" required/>  -->
                        <button type="submit" name="updateNumber" class="button submitButton" id="signInButton">Update</button>
                    </form>
                </div>

            <!--Update Phone Number form start-->
        </section>

        <?php
                        require_once('../config.php');

                        // Create connection
                        $conn = mysqli_connect($server, $username, $password,$database);
                        
                        // Check connection
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        if(isset($_POST['updateNumber'])){
                            // $_SESSION['email'] = $row['email'];
                            $newPhone = $_POST['newPhone'];

                            $update_sql = 'UPDATE user SET phone = "'. $newPhone . '" WHERE email = "'.$_SESSION['email'].'"';
                            


                            if (mysqli_query($conn, $update_sql)) {
                                echo "Record updated successfully";
                                $_SESSION['phone'] = $newPhone;
                                header("Location: account.php");
                              } else {
                                echo "Error updating record: " . mysqli_error($conn);
                              }

                        }    

            
                    ?>
                   
            
    </main>

</body>
</html>