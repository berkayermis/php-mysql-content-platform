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


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css"
        integrity="sha256-t2kyTgkh+fZJYRET5l9Sjrrl4UDain5jxdbqe8ejO8A=" crossorigin="anonymous" />

    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="stylesheet" href="../assets/css/browse.css">
    <link rel="stylesheet" href="../assets/css/single.css">

    <!--html 5 video player-->
    <link rel="stylesheet" href="https://cdn.plyr.io/3.6.2/plyr.css" />
    <script src="https://cdn.plyr.io/3.6.2/plyr.polyfilled.js"></script>

</head>

<body>
    <main id="mainContainer" class="p-b-40">

        <header class="d-flex space-between flex-center flex-middle">
            <div class="nav-links d-flex flex-center flex-middle">
                <a href="/"> <img src="../images/42.png" height="50px" width="170px" alt="site logo main"></img></a>
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
                                <a href="#" class="profile-item d-flex flex-middle">
                                    <img src="../images/icons/user1.png" alt="user profile icon" class="user-icon">
                                    <span><?php echo $_SESSION['user']; ?></span>
                                </a>
                            </div>
                            <div class="line"></div>
                            <div class="links d-flex direction-column">
                                <a href="home.php">Account</a>
                                <a href="#">Help Center</a>
                                <a href="/">Sign Out of Redaflix</a>
                            </div>
    
                        </div>
                    </div>
                </div>
                
            </div>
        </header>

        <!-- hero section video-->
        <div class="videocontainer">
                <iframe  width="100%" height="450" 
                  src="https://www.youtube.com/embed/il_t1WVLNxk/?controls=1">
                </iframe>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                // This is the bare minimum JavaScript. You can opt to pass no arguments to setup.
                const player = new Plyr('#player');

                // Expose
                window.player = player;

                // Bind event listener
                function on(selector, type, callback) {
                    document.querySelector(selector).addEventListener(type, callback, false);
                }
            });
        </script>


        <section class="movieinformation container">
            <div class="movielogo">
                <img src="../images/movies/murder mystery logo.webp" alt="">
            </div>
            <div class="movierelease">
                <span class="year">
                    2019
                </span>
                <span class="rating">
                    PG-13
                </span>
                <span class="timeduration">
                    3h 7m
                </span>
            </div>
            <div class="description">
                A New York cop and his wife go on a European vacation to reinvigorate the spark in their marriage. A
                chance encounter leads to them being framed for the murder of an elderly billionaire.
            </div>
            <div class="castinformation">
                <p><span class="name">Director:</span> Kyle Newacheck</p>
                <p><span class="name">Screenplay:</span> James Vanderbilt</p>
                <p><span class="name">Producers:</span> Adam Sandler, James Vanderbilt, Allen Covert, James D. Stern,
                    Tripp Vinson, A.J. Dix</p>
                <p><span class="name">Awards:</span> People's Choice Award for Favorite Comedic Movie</p>
            </div>
            <div class="actions d-flex flex-start flex-middle">
                <a href="#" class="link-item">
                    <i class="fa fa-plus"></i></br>
                    Wish List
                </a>
            </div>
        </section>




        <!--Hollywood Action movies-->
        <section id="similar" class="container p-t-40">
            <h4 class="romantic-heading">
                More LIke This
            </h4>
            <div class="romantic-container d-flex flex-start flex-middle">
                <a href="#">
                    <img src="../images/movies/horrible-bosses-middle-poster.webp" alt=""
                        class="mylist-img p-r-10 p-t-10 image-size item"></a>
                <a href="#">
                    <img src="../images/movies/kabir-singh-poster.webp" alt=""
                        class="mylist-img p-r-10 p-t-10 image-size item"></a>
                <a href="#">
                    <img src="../images/movies/extraction-poster.jpg" alt=""
                        class="mylist-img p-r-10 p-t-10 image-size item"></a>
                <a href="#">
                    <img src="../images/tv-show/poster/never-have-ever-short poster.jpg" alt=""
                        class="mylist-img p-r-10 p-t-10 image-size item"></a>
                <a href="#">
                    <img src="../images/movies/we-are-the-milers-poster-little.webp" alt=""
                        class="mylist-img p-r-10 p-t-10 image-size item"></a>



            </div>
        </section>

        </div>


        <!--footer section and footer fixed menu mobile-->

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