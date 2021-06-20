<?php
session_start();
?>

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
                <img src="images/42.png" height="50px" width="170px" alt="site logo main"></img>
            </a> 
            <button class="button"><a href="login.php"> Sign In</a></button>
        </header>
        <section id="login-form-section">
            <!--Login form start-->

                <div class="loginContainer d-flex direction-column">
                    <h2 class="formtitle">
                        Register Account
                    </h2>
                    <form action="register.php" id="loginForm" class="d-flex direction-column" method="post" name="loginForm">
                        <input type="text" name="email" id="email" class="email" placeholder="E-Mail Address" onchange="validateEmail()" required/>
                        <p id="errorEmail">Please enter a valid e-mail address.</p>
                        <input type="text" name="name" id="name" class="name" placeholder="Full Name" required/>
                        <input type="number" name="phone" id="phone" class="phone" placeholder="Phone Number" required/> 
                        <input type="password" name="password" id="password" placeholder="Password" required/>
                        <p id="errorPassword">Your password must contain between 4 and 60 characters.</p>
                        <h2 class="formtitle">
                        Payment Informations
                    </h2>
                        <input type="text" name="cardNo" id="cardNo" class="cardNo" placeholder="Credit Card Number" required/>
                        <input type="text" name="cardDate" id="cardDate" class="cardDate" placeholder="mm/yyyy" required/>
                        <input type="text" name="cardCVV" id="cardCVV" class="cardCVV" placeholder="CVV" required/>
                        <input type="text" name="cardHN" id="cardHN" placeholder="Card Holder Name" required/>

                        <button type="submit" name="submit" class="button submitButton" id="signInButton">
                            Register
                        </button>
                        <p class="signUpText para">
                            Have an account? <span class="signUp"><a href="login.php">Sign In</a></span>
                        </p>
                    </form>
                </div>
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
</body>

<?php 
        require_once('config.php');

        // Create connection
        $conn = mysqli_connect($server, $username, $password, $database);
        
        // Check connection
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }

        if(isset($_POST['submit'])){
            $email_addr = $_POST['email'];
            $user = $_POST['name'];
            $pass = $_POST['password'];
            $phoneNo = $_POST['phone'];
            
            $cardNo = $_POST['cardNo'];
            $cardDate = $_POST['cardDate'];
            $cardCVV = $_POST['cardCVV'];
            $cardHN = $_POST['cardHN'];

            $active = 1;
            $query = "INSERT INTO user (email,username,user_pass,phone,is_active) VALUES (?,?,?,?,?)";
            $statement = mysqli_prepare($conn,$query);
            mysqli_stmt_bind_param($statement,'sssii',$email_addr,$user,$pass,$phoneNo,$active);
            mysqli_stmt_execute($statement);
            print(mysqli_stmt_error($statement) . "\n");
            mysqli_stmt_close($statement);

            $search = "SELECT * FROM user WHERE email='$email_addr' AND user_pass='$pass'";
            $result = mysqli_query($conn,$search);
            if(mysqli_num_rows($result)>0){
                $row = mysqli_fetch_assoc($result);
                $query_card = "INSERT INTO credit_card (card_no,cvv,card_date,card_holder_name,current_user_id) VALUES (?,?,?,?,?)";
                $statement = mysqli_prepare($conn,$query_card);
                mysqli_stmt_bind_param($statement,'iiisi',$cardNo,$cardCVV,$cardDate,$cardHN,$row['id']);
                mysqli_stmt_execute($statement);
                print(mysqli_stmt_error($statement) . "\n");
                mysqli_stmt_close($statement);

        }
        mysqli_close($conn);

    }
        ?>

</html>