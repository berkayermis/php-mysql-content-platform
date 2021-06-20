<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Panel</title>
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
           <a href="admin.php">
            <img src="../images/42.png" height="50px" width="170px" alt="site logo main" style="margin: auto;"></img>
        </a> 
        </header>
        <section id="login-form-section">
            <!--Login form start-->

                <div class="loginContainer d-flex direction-column">
                    <h2 class="formtitle">
                    Administration
                    </h2>
                    <form action="login.php" id="loginForm" class="d-flex direction-column" method="post" name="loginForm">
                        <input type="text" name="username" id="username" class="username" placeholder="Username" required/>
                        <p id="errorUsername">Please enter a valid username</p>

                        <input type="password" name="password" id="password" placeholder="Password" required/>
                        <p id="errorPassword">Your password must contain between 4 and 60 characters.</p>

                        <button type="submit" name="login" class="button submitButton" id="signInButton">
                            Sign In
                        </button>
                    </form>
                </div>

            <!--Login form End-->
        </section>
    </main>

    <script>
        //function to validate email address on input text change and enable submit button if it's true
        document.getElementById('errorUsername').style.display = "none";
        document.getElementById('errorPassword').style.display = "none";
        function validateEmail() {
            let email = document.getElementById('username').value;
            let re = /\S+@\S+\.\S+/;
            let result = re.test(email);
            if (result) {
                document.getElementById('errorUsername').style.display = "none";
                document.getElementById('signInButton').disabled = false;
               // document.getElementById("email-form").submit();
            }
            else {
                document.getElementById('errorUsername').style.display = "block";
                document.getElementById('signInButton').disabled = true;
            }
        }
    </script>

<?php
session_start();

if(isset($_POST['login'])){
	$admin_username = $_POST['username'];
	$admin_pass = $_POST['password'];
        if($admin_username == 'admin' && $admin_pass == '123456'){
            $_SESSION['admin_username'] = $admin_username;
            header('Location: dashboard.php');
            exit;
        }
        else{
            $message = "Wrong username or password";
            echo "<script type='text/javascript'>alert('$message');</script>"; 
        }
	}
?>

</body>
</html>