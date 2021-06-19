<?php
session_start();
?>

<!DOCTYPE html>
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Series-Movies Suggestion System</title>
    <meta name="description" content="Series-Movies Suggestion System" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/lib/owl.carousel.css" />
    <script src="../assets/lib/jquery 3.5.0.js"></script>
    <script src="../assets/lib/owl.carousel.js"></script>
    <script src="../assets/js/main-script.js"></script>


    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="stylesheet" href="../assets/css/browse.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" integrity="sha256-t2kyTgkh+fZJYRET5l9Sjrrl4UDain5jxdbqe8ejO8A=" crossorigin="anonymous" />
    <script>

    </script>
</head>

<body>

    <main id="mainContainer" class="p-b-40">
        <div>
            <header class="d-flex space-between flex-center flex-middle">
                <div class="nav-links d-flex flex-center flex-middle">
                    <a href="browse.php"><img src="../images/42.png" height="50px" width="170px" alt="site logo main"></img> </a>
                    <a href="browse.php" class="nav-item home">Home</a>
                    <a href="series.php" class="nav-item">Series</a>
                    <a href="movies.php" class="nav-item">Movies</a>
                    <a href="documentaries.php" class="nav-item latest">Documentaries</a>
                    <a href="mylist.php" class="nav-item">Wish List</a>
                </div>
                <div class="righticons d-flex flex-end flex-middle">
                    <!-- <a href="search.html"><img src="../images/icons/search.svg" alt="search icon"></a>
                    <div class="dropdown notification">
                        <img src="../images/icons/notification.svg" alt="notificatio icon">
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
                                    <span><?php echo $_SESSION['user'];  ?></span>
                                </a>
                            </div>
                            <div class="line"></div>
                            <div class="links d-flex direction-column">
                                <a href="account.php">Account</a>
                                <a href="../index.php">Sign Out of Forty-Two</a>
                            </div>
    
                        </div>
                    </div>
                    
                </div>
            </header>


            <!--paretn div with black bg after main hero section-->
            <div class="black-background" style="margin: 0;">


                <!--new tv show-->
                <section id="newtvshow" class="container p-t-40" style="padding-top: 120px;">
                    <h4 class="romantic-heading">
                        Series 
                    </h4>
                    <div class="romantic-container d-flex flex-start flex-middle flex-no-wrap owl-carousel">
                    <?php
                        require_once('../config.php');

                        // Create connection
                        $conn = mysqli_connect($server, $username, $password,$database);
                        
                        // Check connection
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        $sql = 'SELECT *,content.id AS cid FROM content,serie WHERE content.id=serie.content_id';
                        $result = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($result)>0){
                            while($row = mysqli_fetch_assoc($result)){
                                $x = $row['source'];
                                echo '<div class="video">' .
                                '<div class="mylist-img p-r-10 p-t-10 video-item">' . 
                                '<img src="https://img.youtube.com/vi/'.$row['source'].'/0.jpg">'. 
                                '</div>' . 
                                '<div class="video-description d-flex flex-end direction-column">' . 
                                    '<div>' . 
                                        '<button style="background-color:red; border:none;
                                        text-align: center; padding:10px;">' . 
                                        '<a href="single.php?id='.$row['cid'].'&name='.$row['content_name'].'" style="color:white;">' . "<strong>Play</strong>" . '</a>' . 
                                        '</button>' . 
                                    '</div>' . 
                                    '<div>' . 
                                    '<h4 class="heading f-w-8 text-shadow">' . 
                                    $row['content_name'] . 
                                    '</h4>' . 
                                    '</div>' . 
                                '</div>' . 
                            "</div>";
                            }
                        }
                    ?>

                    </div>
                </section>

            </div>
        </div>

        <footer class="mainfooter d-flex direction-column space-between" id=" footer">
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
        <a href="browse.html" class="nav-item active">
            <i class="fa fa-home" aria-hidden="true"></i> </br>
            <span>Home</span>
        </a>
        <a href="search.html" class="nav-item">
            <i class="fa fa-search" aria-hidden="true"></i></br>
            Search
        </a>
        <a href="latest.html" class="nav-item">
            <i class="fa fa-film" aria-hidden="true"></i></br>
            Latest
        </a>
        <a href="account.html" class="nav-item">
            <i class="fa fa-user" aria-hidden="true"></i></br>
            Account
        </a>
    </div>
</body>

</html>