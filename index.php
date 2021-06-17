<!DOCTYPE html>
<html class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Series-Movies Suggestion System</title>
    <meta name="description" content="Series-Movies Suggestion System" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
            <img src="images/42.png" height="50px" width="170px" alt="site logo main"></img>
            <button class="button"><a href="login.php"> Sign In</a></button>
        </header>
        <section id="landing-hero-section" class=" d-flex direction-column flex-center middle-align">

            <h1>Unlimited movies,<br> TV series, and more.</h1>
            <h2>Watch anywhere. Cancel anytime.</h2>

            <!-- landing page form start -->
            <form class="email-form d-flex" id="email-form" method="POST" action="register.php">

                <div class="email-form-lockup d-flex">
                    <button class="button submit" type="submit" id="submitbutton" tabindex="0">
                        <span class="hero-cta-btn-txt">TRY FOR 29 ₺ </span>
                        <!-- right arrow icon-->
                        <span>
                            <svg version="1.1" id="right-icon" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 477.175 477.175"
                                style="enable-background:new 0 0 477.175 477.175;" xml:space="preserve">
                                <g>
                                    <path
                                        d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5
		                                c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z"
                                        fill="white" />

                                </g>
                            </svg>
                        </span>
                    </button>


                </div>
                
            </form>
            <!--form container end-->
        </section>
    </main>

    <script>
        //function to validate email address on input text change and enable submit button if it's true
        function validateEmail() {
            let email = document.getElementById('id_email').value;
            let re = /\S+@\S+\.\S+/;
            let result = re.test(email);
            if (result) {
                document.getElementById('email-error').style.display = "none";
                document.getElementById('submitbutton').disabled = false;
               // document.getElementById("email-form").submit();
            }
            else {
                document.getElementById('email-error').style.display = "block";
                document.getElementById('submitbutton').disabled = true;
            }
        }
    </script>
</body>

</html>