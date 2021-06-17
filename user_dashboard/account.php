<?php
session_start();
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Series-Movies Suggestion System</title>
    <meta name="description" content="Series-Movies Suggestion System" />
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css"
        integrity="sha256-t2kyTgkh+fZJYRET5l9Sjrrl4UDain5jxdbqe8ejO8A=" crossorigin="anonymous" />

    <!--for global styling-->
    <link rel="stylesheet" href="../assets/css/global.css">
    <!-- for footer and header-->
    <link rel="stylesheet" href="../assets/css/browse.css">
    <!--custom styling-->
    <link rel="stylesheet" href="../assets/css/userprofile.css">

</head>

<body>
    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->


    <!-- dashboard/browse page block start | home page after login | -->

    <main id="mainContainer" class="p-b-40">

        <header class="d-flex space-between flex-center flex-middle">
            <div class="nav-links d-flex flex-center flex-middle">
                <a href="/"> <img src="../images/42.png" height="50px" width="170px" alt="site logo main"></img> </a>
                <a href="browse.php" class="nav-item home">Home</a>
                <a href="series.php" class="nav-item">Series</a>
                <a href="movies.php" class="nav-item">Movies</a>
                <a href="documentaries.php" class="nav-item latest">Documentaries</a>
                <a href="mylist.php" class="nav-item">Wish List</a>
            </div>
            <div class="righticons d-flex flex-end flex-middle">
            <!-- <a href="../search.html">
                <img src="../../images/icons/search.svg" alt="search icon">
            </a>
            <div class="dropdown notification">
                <img src="../../images/icons/notification.svg" alt="notificatio icon">
                <div class="dropdown-content">
                    <a href="#" class="profile-item d-flex flex-middle">
                        <img src="../../images/icons/user2.png" alt="user profile icon" class="user-icon">
                        <span>You have new notification from <span>User 123</span></span>
                    </a>
                    <a href="#" class="profile-item d-flex flex-middle">
                        <img src="../../images/icons/user1.png" alt="user profile icon" class="user-icon">
                        <span>You have new notification from <span>User 123</span></span>
                    </a>
                    <a href="#" class="profile-item d-flex flex-middle">
                        <img src="../../images/icons/user4.png" alt="user profile icon" class="user-icon">
                        <span>You have new notification from <span>User 123</span></span>
                    </a>
                    <a href="#" class="profile-item d-flex flex-middle">
                        <img src="../../images/icons/user3.png" alt="user profile icon" class="user-icon">
                        <span>You have new notification from <span>User 123</span></span>
                    </a>
                </div>
            </div> -->
                
                <div class="dropdown">
                    <img src="../images/icons/user-image-green.png" alt="user profile icon" class="user-icon"> <span
                        class="profile-arrow"></span>

                    <div class="dropdown-content">
                        <div class="profile-links">
                            <a href="account.php" class="profile-item d-flex flex-middle">
                                <img src="../images/icons/user1.png" alt="user profile icon" class="user-icon">
                                <span>
                                    <?php 
                                    echo $_SESSION['user'];  
                                    ?>
                                </span>
                            </a>
                        </div>
                        <div class="line"></div>
                        <div class="links d-flex direction-column">
                            <a href="account.php">Account</a>
                            <a href="../index.php">Sign Out of Redaflix</a>
                        </div>

                    </div>
                </div>

            </div>
        </header>



        <!--profile section-->
        <section class="userprofile" id="userprofilecontainer">
            <div>
                <h2 class="heading f-s-40">
                    Account
                </h2>
            </div>
            <div class="line"></div>
            <div class="membership d-flex flex-no-wrap space-between">
                <div class="left">
                    <h4 class="headline">
                        MEMBERSHIP & BILLING
                    </h4>
                    <button href="deleteaccount.php?id=$dsdskd" class="button">Cancel Membership</button>
                </div>
                <div class="right">
                    <div class="d-flex space-between">
                        <div class="email">
                            <strong>fatihfurkanak2@gmail.com</strong>
                        </div>
                        <div class="link">
                            <a href="#" class="link-item">
                                Change account email
                            </a>
                        </div>
                    </div>

                    <div class="d-flex space-between">
                        <div class="password">
                            Password: *********
                        </div>
                        <div class="link">
                            <a href="#" class="link-item">
                                Change password
                            </a>
                        </div>
                    </div>

                    <div class="d-flex space-between">
                        <div class="email">
                            Phone: +90 555 380 0909
                        </div>
                        <div class="link">
                            <a href="#" class="link-item">
                                Change phone number
                            </a>
                        </div>
                    </div>
                    <div class="line"></div>

                    <div class="carddetail d-flex space-between flex-middle">
                        <div class="card">
                            <h4><span class="icon-visa">VISA</span> •••• •••• •••• 5350</h4>
                        </div>
                        <div class="link">
                            <a href="#" class="link-item">
                                Update payment info
                            </a>
                            <a href="#" class="link-item">
                                Biling details
                            </a>
                        </div>
                    </div>
                    <div class="line"></div>

                </div>  
            </div>

        </section>

        <!--footer section and footer fixed menu mobile-->

        <footer class="mainfooter d-flex direction-column space-between" id="footer">
            <div class="container footer-container flex-start">
                <div class="widgets d-flex space-between">
                    <div class="first-widget">
                        <ul>
                            <li class="list-item">Audio and Subtitles</li>
                            <li class="list-item">Media Center</li>
                            <li class="list-item">Privacy</li>
                            <li class="list-item">Contact us</li>
                        </ul>
                    </div>
                    <div class="second-widget">
                        <ul>
                            <li class="list-item">Help Center</li>
                            <li class="list-item">Cookie</li>
                            <li class="list-item">Jobs</li>
                        </ul>
                    </div>
                    <div class="third-widget">
                        <ul>
                            <li class="list-item">Audio Description</li>
                            <li class="list-item">Investor Relations</li>
                            <li class="list-item">Legal Notice</li>
                        </ul>
                    </div>
                    <div class="forth-widget">
                        <ul>
                            <li class="list-item">Gift Card</li>
                            <li class="list-item">Term Of Use</li>
                            <li class="list-item">Corporate Information</li>
                        </ul>
                    </div>
                </div>
                
            </div>


        </footer>
        </div>
    </main>

    <div class="footer-navigation d-flex space-between">
        <a href="browse.php" class="nav-item active">
            <i class="fa fa-home" aria-hidden="true"></i> </br>
            <span>Home</span>
        </a>
        <a href="search.php" class="nav-item">
            <i class="fa fa-search" aria-hidden="true"></i></br>
            Search
        </a>
        <a href="latest.php" class="nav-item">
            <i class="fa fa-film" aria-hidden="true"></i></br>
            Latest
        </a>
        <a href="account.php" class="nav-item">
            <i class="fa fa-user" aria-hidden="true"></i></br>
            Account
        </a>
    </div>


</body>

</html>