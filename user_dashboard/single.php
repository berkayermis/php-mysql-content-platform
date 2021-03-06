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
                <a href="browse.php"> <img src="../images/42.png" height="50px" width="170px" alt="site logo main"></img></a>
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
                                    <span><?php echo $_SESSION['user']; ?></span>
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
                
            </div>
        </header>

        <!-- hero section video-->
        <div class="videocontainer">
                  <?php 
                    require_once('../config.php');

                    // Create connection
                    $conn = mysqli_connect($server, $username, $password,$database);
                    
                    // Check connection
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    
                    $x = $_GET['id'];
                    $sql = "SELECT * FROM content,no_season_content WHERE content.id =$x AND no_season_content.content_id=$x";
                    $result = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result)>0){
                        $row = mysqli_fetch_assoc($result);
                        echo '<iframe  width="100%" height="400" 
                        src="https://www.youtube.com/embed/'.$row['source'].'/?controls=1"></iframe>';
                    }
                    else{
                        $sql2 = "SELECT * FROM content,seasonal_content WHERE content.id=$x AND seasonal_content.content_id=$x";
                        $result2=mysqli_query($conn,$sql2);
                        if(mysqli_num_rows($result2)>0){
                            $sql3 = "SELECT * FROM episode WHERE content_id = $x ORDER BY season_no";
                            $result3 = mysqli_query($conn,$sql3);
                            if(mysqli_num_rows($result3)>0){
                                echo "Season 1 <br>";
                                $b = 1;
                                while($row3 = mysqli_fetch_assoc($result3)){
                                    if($b != $row3['season_no']){
                                        echo '<div style="display:flex; flex-wrap:wrap;">';
                                        echo "Season ".$row3['season_no'] . "<br>";
                                        echo '</div>';
                                        $b++;
                                    }
                                    echo '<iframe style="margin-right:5px;"  width="30%" height="200" 
                                    src="https://www.youtube.com/embed/'.$row3['source'].'/?controls=1"></iframe>';
                                    }
                                }
                            else{
                                while($row2 = mysqli_fetch_assoc($result2)){
                                    echo '<iframe  width="100%" height="400"
                                    src="https://www.youtube.com/embed/'.$row2['source'].'/?controls=1"></iframe><br>';
                                }
                            }
                            }
                        }
                  ?>
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
                <!-- <img src="../images/movies/murder mystery logo.webp" alt=""> -->
                <?php echo '<h1 style="font-size:40px;">' . $_GET['name'] . '</h1>'; ?>
            </div>
            <?php
                require_once('../config.php');
                $conn = mysqli_connect($server, $username, $password,$database);
                
                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                $singleContent = $_GET['id'];
                $sql1 = 'SELECT * FROM content,seasonal_content WHERE seasonal_content.content_id = '.$singleContent.' AND content.id = '.$singleContent.'';
                $result1 = mysqli_query($conn,$sql1);
                $sql2 = 'SELECT * FROM content,no_season_content WHERE (no_season_content.content_id = '.$singleContent.' AND content.id = '.$singleContent.')';
                $result2 = mysqli_query($conn,$sql2);
                if(mysqli_num_rows($result1)>0){
                    $row = mysqli_fetch_assoc($result1);
                        echo '<div class="movierelease">' . 
                        '<span class="year">' . 
                        $row['content_date'] . '</span>' . 
                        '<span class="rating">' . 
                        "PG-" . $row['age_limit'] . 
                        '</span>' . 
                        '<span class="timeduration">' . 
                        $row['season_no'] . ' Season' . '</span>' . 
                        '</div>' . 
                        '<div class="description">' . 
                        $row['content_desc'] . '</div>';
                    }
                else if(mysqli_num_rows($result2)>0){
                    $row2 = mysqli_fetch_assoc($result2);
                    echo '<div class="movierelease">' . 
                    '<span class="year">' . 
                    $row2['content_date'] . '</span>' . 
                    '<span class="rating">' . 
                    "PG-" . $row2['age_limit'] . 
                    '</span>' . 
                    '<span class="timeduration">' . 
                    $row2['duration'] . '</span>' . 
                    '</div>' . 
                    '<div class="description">' . 
                    $row2['content_desc'] . '</div> <br>';
                }
                $sqlActor = "SELECT * FROM content_actor WHERE content_actor.content_id = '$singleContent'";
                $resultActor = mysqli_query($conn,$sqlActor);
                echo '<p> <span class="name">' . '<b>Actors:</b> </span>';
                if(mysqli_num_rows($resultActor)>0){
                    $count = 0;
                    while($rowActor = mysqli_fetch_assoc($resultActor)){
                        echo $rowActor['actor_name'];
                        $count++;
                        if($count != mysqli_num_rows($resultActor)){
                            echo ', ';
                        }
                    }
                    echo '</p>';
                }
                $sqlTag = "SELECT * FROM content_tag WHERE content_tag.content_id = '$singleContent'";
                $resultTag = mysqli_query($conn,$sqlTag);
                echo '<p> <span class="name">' . '<b>Genres:</b> </span>';
                if(mysqli_num_rows($resultTag)>0){
                    $count = 0;
                    while($rowTag = mysqli_fetch_assoc($resultTag)){
                        echo $rowTag['tag_name'];
                        $count++;
                        if($count != mysqli_num_rows($resultTag)){
                            echo ', ';
                        }
                    }
                    echo '</p>';
                }
                $sqlLanguage = "SELECT * FROM content_language WHERE content_language.content_id = '$singleContent'";
                $resultLanguage = mysqli_query($conn,$sqlLanguage);
                echo '<p> <span class="name">' . '<b>Language: </b></span>';
                if(mysqli_num_rows($resultLanguage)>0){
                    $count = 0;
                    while($rowLanguage = mysqli_fetch_assoc($resultLanguage)){
                        echo $rowLanguage['content_language'];
                        $count++;
                        if($count != mysqli_num_rows($resultLanguage)){
                            echo ', ';
                        }
                    }
                    echo '</p>';
                }

                
            ?>
             <div class="actions d-flex flex-start flex-middle">
               <?php 
               echo '<a href="wishProcess.php?id='.$_GET['id'].'&user='.$_SESSION['user_id'].'&key=1" class="link-item">'.
                     '<i class="fa fa-plus"></i></br>' . 
                     "Wish List" . 
                '</a>';
                echo '<a href="wishProcess.php?id='.$_GET['id'].'&user='.$_SESSION['user_id'].'&key=2" class="link-item">'.
                     '<i class="fa fa-minus"></i></br>' . 
                     "Wish List" . 
                '</a>';
                ?>
                </div>
        </section>

        <!--More Like This-->
        <section id="similar" class="container p-t-40">
            <h4 class="romantic-heading">
                More Like This
            </h4>
            <div style=" " class="romantic-container d-flex flex-start flex-middle">
                <?php 
                    require_once('../config.php');
                    $conn = mysqli_connect($server, $username, $password,$database);
                    
                    // Check connection
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }
                    $usr = $_SESSION['user_id'];
                    $dt = $_GET['id'];
                    $sql = "SELECT * FROM content,content_tag WHERE content.id = content_tag.content_id AND
                    tag_name IN (SELECT tag_name FROM content_tag WHERE content_id='$dt') AND content_id <> '$dt'";
                    $result = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo  '<a href="single.php?id='.$row['content_id'].'&name='.$row['content_name'].'">' . 
                            '<img src="https://img.youtube.com/vi/'.$row['source'].'/0.jpg" alt="" class="mylist-img p-r-10 p-t-10 image-size item">' . '</a>'; 
                        }
                    }
                   ?>
                <!-- <a href="#">
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
                        class="mylist-img p-r-10 p-t-10 image-size item"></a> -->



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