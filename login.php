<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Series-Movies Suggestion System</title>
    <meta name="description" content="Series-Movies Suggestion System" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/landing-pages.css">
</head>

<body>
    <style>
        body::before{
            background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.2) 60%, rgba(0, 0, 0, 0.9) 100%),url('images/login-background.jpg');
        }
    </style>

    <main style="padding: 0px 10px;">
        <header class="d-flex space-between middle-align">
           <a href="index.php">
            <img src="images/42.png" height="50px" width="170px" alt="site logo main" style="margin: auto;"></img>
        </a> 
        </header>
        <section id="login-form-section">
            <!--Login form start-->

                <div class="loginContainer d-flex direction-column">
                    <h2 class="formtitle">
                        Sign In
                    </h2>
                    <form action="login.php" id="loginForm" class="d-flex direction-column" method="post" name="loginForm">
                        <input type="email" name="email" id="email" class="email" placeholder="Email" onchange="validateEmail()" required/>
                        <p id="errorEmail">Please enter a valid email address</p>

                        <input type="password" name="password" id="password" placeholder="Password" required/>
                        <p id="errorPassword">Your password must contain between 4 and 60 characters.</p>

                        <button type="submit" name="login" class="button submitButton" id="signInButton">
                            Sign In
                        </button>
                        <p class="signUpText para">
                            New to Redaflix? <span class="signUp"><a href="register.php">Sign up Now</a></span>
                        </p>
                    </form>
                </div>

            <!--Login form End-->
        </section>
    </main>

    <script>
        //function to validate email address on input text change and enable submit button if it's true
        document.getElementById('errorEmail').style.display = "none";
        document.getElementById('errorPassword').style.display = "none";
        function validateEmail() {
            let email = document.getElementById('email').value;
            let re = /\S+@\S+\.\S+/;
            let result = re.test(email);
            if (result) {
                document.getElementById('errorEmail').style.display = "none";
                document.getElementById('signInButton').disabled = false;
               // document.getElementById("email-form").submit();
            }
            else {
                document.getElementById('errorEmail').style.display = "block";
                document.getElementById('signInButton').disabled = true;
            }
        }
    </script>

<?php
session_start();

require_once('config.php');

// Create connection
$conn = mysqli_connect($server, $username, $password,$database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['login'])){
	$user_email = $_POST['email'];
	$user_pass = $_POST['password'];
	$sql = "SELECT * FROM user";
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_assoc($result)){
			if($row['email'] == $user_email && $row['user_pass'] == $user_pass){
				$_SESSION['email'] = $row['email'];
				$_SESSION['user'] = $row['username'];
				$_SESSION['user_pass'] = $row['user_pass'];
				$_SESSION['phone'] = $row['phone'];
                $_SESSION['user_id'] = $row['id'];
				header('Location: user_dashboard/browse.php');
				exit;
			}
            else{
                $message = "Wrong email or password";
                echo "<script type='text/javascript'>alert('$message');</script>"; 
            }
		}
	}
}

$sql = 'SELECT * FROM content';
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        $_SESSION['hero'] = $row['source'];
        $_SESSION['hero_name'] = $row['content_name'];
        $_SESSION['hero_id'] = $row['id'];
        $_SESSION['hero_desc'] = $row['content_desc'];
    }
}

?>

</body>
</html>