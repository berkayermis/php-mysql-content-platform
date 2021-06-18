<?php
session_start();

function durationFetch($source){
    $dur = file_get_contents("https://youtube.googleapis.com/youtube/v3/videos?part=contentDetails&id=$source&key=AIzaSyBgr57WJ8YlgtH4jVFpMsJNVTr2iR8b3cE");

    $duration = json_decode($dur, true);
    foreach ($duration['items'] as $vidTime) {
        $vTime= $vidTime['contentDetails']['duration'];
    }
    $vrb ='';
    for($i=2; $i<strlen($vTime); $i++){
        if($vTime[$i] == 'M'){
            $vrb .= ' mn.';
            $i = strlen($vTime);
        }
        else if($vTime[$i] == 'H'){
            $vrb .= ' hr. ';
        }
        else{
            $vrb .= $vTime[$i];
        }
    }
    return $vrb;
    }
?>

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
           <a href="index.html">
            <img src="../images/42.png" height="50px" width="170px" alt="site logo main" style="margin: auto;"></img>
        </a> 
        </header>
        <section id="login-form-section">
            <!--Login form start-->

                <div class="loginContainer d-flex direction-column">
                    <h2 class="formtitle">
                    Content Panel
                    </h2>
                    <form action="dashboard.php" id="loginForm" class="d-flex direction-column" method="post" name="loginForm">
                        <input type="text" name="contentName" id="contentName" class="contentName" placeholder="Content Name" required/>
                        <p id="errorContent">Please enter a valid content name</p>
                        <input type="number" name="contentAge" id="contentAge" class="contentAge" placeholder="Content Age Limit" min='1' required/>
                        <input type="number" name="contentDate" id="contentDate" class="contentDate" placeholder="Release Year"  required/>
                        <input type="text" name="contentSource" id="contentSource" class="contentSource" placeholder="Content Source" />
                        <input type="text" name="contentDesc" id="contentDesc" class="contentDesc" placeholder="Content Description" />
                        <span style="margin-top:15px; font-size:15px;">Season Information</span>
                        <input style="margin-top:10px;" type="radio" id="seasonal" name="radio" <?php if (isset($radio) && $radio=="seasonal") echo "checked";?> value="seasonal">
                        <label style="margin-top:-20px; margin-left:25px" for="Seasonal">Seasonal</label><br>
                        <input style="margin-top:-10px;" type="radio" id="notSeasonal" name="radio" <?php if (isset($radio) && $radio=="no seasonal") echo "checked";?> value="notSeasonal">
                        <label style="margin-top:-20px; margin-left:25px" for="Not seasonal">Not seasonal</label><br>

                        <span style="margin-top:15px; font-size:15px;">Content Type</span>
                        <input style="margin-top:10px;" type="radio" id="Movie" name="contentType" <?php if (isset($radio) && $radio=="movie") echo "checked";?> value="movie">
                        <label style="margin-top:-20px; margin-left:25px" for="Movie">Movie</label><br>
                        <input style="margin-top:-10px;" type="radio" id="Serie" name="contentType" <?php if (isset($radio) && $radio=="serie") echo "checked";?> value="serie">
                        <label style="margin-top:-20px; margin-left:25px" for="Serie">Serie</label><br>
                        <input style="margin-top:-10px;" type="radio" id="Documentary" name="contentType" <?php if (isset($radio) && $radio=="documentary") echo "checked";?> value="documentary">
                        <label style="margin-top:-20px; margin-left:25px" for="Documentary">Documentary</label><br>

                        <button type="submit" name="create" class="button submitButton" id="signInButton">
                            Create
                        </button>
                    </form>
                </div>

            <!--Login form End-->
        </section>


        <section id="login-form-section" style="margin-top:10px;">
            <!--Login form start-->

                <div class="loginContainer d-flex direction-column">
                    <h2 class="formtitle">
                    Episode Management
                    </h2>
                    <form action="dashboard.php" id="loginForm" class="d-flex direction-column" method="post" name="episodeForm">
                        <select style="height:50px; background: #333; border:none; color: white;" name="contentList">
                           <?php
                                   require_once('../config.php');

                                   // Create connection
                                   $conn = mysqli_connect($server, $username, $password,$database);
                                   
                                   // Check connection
                                   if (!$conn) {
                                     die("Connection failed: " . mysqli_connect_error());
                                   }

                                   $sql = 'SELECT * FROM content';
                                   $result = mysqli_query($conn,$sql);
                                   if(mysqli_num_rows($result)>0){
                                       while($row = mysqli_fetch_assoc($result)){
                                           echo '<option value="'.$row['id'].'">' . $row['content_name'] . "</option>";
                                       }
                                       echo '</select>';
                                   }
                                   ?>
                        <input type="text" name="episodeName" id="episodeName" class="episodeName" placeholder="Episode Name"  required/>
                        <input type="number" name="seasonNo" id="seasonNo" class="seasonNo" placeholder="Season No" min='1' required/>
                        <input type="number" name="episodeNo" id="episodeNo" class="episodeNo" placeholder="Episode No" min='1' required/>
                        <input type="text" name="episodeDesc" id="episodeDesc" class="episodeDesc" placeholder="Episode Description"  required/>
                        <input type="text" name="episodeSource" id="episodeSource" class="episodeSource" placeholder="Episode Source"  required/>
                        <button type='submit' name='add' class='button submitButton' id='signInButton'>
                            Add
                        </button>
                    </form>
                    <?php
                        require_once('../config.php');

                        // Create connection
                        $conn = mysqli_connect($server, $username, $password,$database);
                        
                        // Check connection
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        if(isset($_POST['add'])){
                            $contentOption = $_POST['contentList'];
                            $episodeName = $_POST['episodeName'];
                            $episodeNo = $_POST['episodeNo'];
                            $episodeDescription = $_POST['episodeDesc'];
                            $episodeSource = $_POST['episodeSource'];
                            $episodeOfSeason = $_POST['seasonNo'];
                            $search_sql = 'SELECT * FROM seasonal_content WHERE season_no = "'.$_POST['seasonNo'].'"';
                            $res = mysqli_query($conn,$search_sql);
                            if(mysqli_num_rows($res)<1){
                                $sql = 'INSERT INTO seasonal_content (content_id,season_no) VALUES (?,?)';
                                $statement = mysqli_prepare($conn,$sql);
                                mysqli_stmt_bind_param($statement,'ii',$contentOption,$episodeOfSeason);
                                mysqli_stmt_execute($statement);
                                print(mysqli_stmt_error($statement) . "\n");
                                mysqli_stmt_close($statement);
                            }
                        
                            $sql2 = 'SELECT content.id AS cid,seasonal_content.content_id AS sccid, seasonal_content.id AS scid FROM content,seasonal_content WHERE content.id=seasonal_content.content_id AND content.id="'.$_POST['contentList'].'"';
                            $result = mysqli_query($conn,$sql2);
                            if(mysqli_num_rows($result)>0){
                                while($row2 = mysqli_fetch_assoc($result)){
                                    $seasonalID = $row2['scid'];
                                }

                                $episodeDuration = durationFetch($episodeSource);
                                $query = "INSERT INTO episode (content_id,season_id,episode_name,episode_duration,episode_no,episode_desc,source) VALUES (?,?,?,?,?,?,?)";
                                $statement = mysqli_prepare($conn,$query);
                                mysqli_stmt_bind_param($statement,'iississ',$contentOption,$seasonalID,$episodeName,$episodeDuration,$episodeNo,$episodeDescription,$episodeSource);
                                mysqli_stmt_execute($statement);
                                print(mysqli_stmt_error($statement) . "\n");
                                mysqli_stmt_close($statement);
                            }
                        }
                    ?>
                </div>

            <!--Login form End-->
        </section>
    </main>

    <script>
        //function to validate email address on input text change and enable submit button if it's true
        document.getElementById('errorContent').style.display = "none";
        function validateEmail() {
            let email = document.getElementById('contentName').value;
            let re = /\S+@\S+\.\S+/;
            let result = re.test(email);
            if (result) {
                document.getElementById('errorContent').style.display = "none";
                document.getElementById('signInButton').disabled = false;
               // document.getElementById("email-form").submit();
            }
            else {
                document.getElementById('errorContent').style.display = "block";
                document.getElementById('signInButton').disabled = true;
            }
        }
    </script>

    <?php
    require_once('../config.php');

    // Create connection
    $conn = mysqli_connect($server, $username, $password,$database);
    
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

        if(isset($_POST['create'])){
            $contentName = $_POST['contentName'];
            $contentAge = $_POST['contentAge'];
            $contentDate = $_POST['contentDate'];
            $contentSource = $_POST['contentSource'];
            $contentDesc = $_POST['contentDesc'];
            $seasonInfo = test_input($_POST['radio']);
            $contentType = test_input($_POST['contentType']);

            if($seasonInfo == 'notSeasonal'){
                if($contentType == 'movie' || $contentType == 'documentary'){
                    $query = "INSERT INTO content (content_name,age_limit,content_date,source,content_desc) VALUES (?,?,?,?,?)";
                    $statement = mysqli_prepare($conn,$query);
                    mysqli_stmt_bind_param($statement,'siiss',$contentName,$contentAge,$contentDate,$contentSource,$contentDesc);
                    mysqli_stmt_execute($statement);
                    print(mysqli_stmt_error($statement) . "\n");
                    mysqli_stmt_close($statement);

                    $sql_search = 'SELECT * FROM content';
                    $result = mysqli_query($conn,$sql_search);
                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_assoc($result)){
                            if($row['content_name'] == $contentName && $row['source'] == $contentSource){
                                $_SESSION['content_id'] = $row['id'];
                                $_SESSION['content_duration'] = durationFetch($contentSource);
                            }
                        }
                    }

                    $sql = "INSERT INTO no_season_content (content_id,duration) VALUES (?,?)";
                    $statement = mysqli_prepare($conn,$sql);
                    mysqli_stmt_bind_param($statement,'is',$_SESSION['content_id'],$_SESSION['content_duration']);
                    mysqli_stmt_execute($statement);
                    print(mysqli_stmt_error($statement) . "\n");
                    mysqli_stmt_close($statement);

                    if($contentType == 'movie'){
                        $sql_search = 'SELECT no_season_content.id AS nsid, no_season_content.content_id,content.id FROM no_season_content,content';
                        $result = mysqli_query($conn,$sql_search);
                        if(mysqli_num_rows($result)>0){
                            while($row = mysqli_fetch_assoc($result)){
                                if($row['content_id'] == $row['id']){
                                    $_SESSION['no_season_id'] = $row['nsid'];
                                }
                            }
                        }

                        $sql2 = "INSERT INTO movie (content_id,no_season_id) VALUES (?,?)";
                        $statement = mysqli_prepare($conn,$sql2);
                        mysqli_stmt_bind_param($statement,'ii',$_SESSION['content_id'],$_SESSION['no_season_id']);
                        mysqli_stmt_execute($statement);
                        print(mysqli_stmt_error($statement) . "\n");
                        mysqli_stmt_close($statement);
                    }

                    else if($contentType == 'documentary'){
                        $sql_search3 = 'SELECT no_season_content.id AS nsid, no_season_content.content_id,content.id FROM no_season_content,content WHERE content_id=content.id AND no_season_content.content_id= "'.$_SESSION['content_id'].'"';
                        $result3 = mysqli_query($conn,$sql_search3);
                        if(mysqli_num_rows($result3)>0){
                            while($row = mysqli_fetch_assoc($result3)){
                                if($row['content_id'] == $row['id']){
                                    $_SESSION['no_session_id'] = $row['nsid'];
                                }
                            }
                        }
                        $null = NULL;
                        $sql3 = "INSERT INTO documentary (content_id,season_id,episode_id,no_season_id) VALUES (?,?,?,?)";
                        $statement = mysqli_prepare($conn,$sql3);
                        mysqli_stmt_bind_param($statement,'iiii',$_SESSION['content_id'],$null,$null,$_SESSION['no_session_id']);
                        mysqli_stmt_execute($statement);
                        print(mysqli_stmt_error($statement) . "\n");
                        mysqli_stmt_close($statement);
                    }
                }
                else{
                    $message = "No seasonal content cannot be a serie.";
                    echo "<script type='text/javascript'>alert('$message');</script>"; 
                }
            }
            else if($seasonInfo == 'seasonal'){
                if($contentType == 'movie'){
                    $message = "Seasonal content cannot be a movie.";
                    echo "<script type='text/javascript'>alert('$message');</script>"; 
                }
                else if($contentType == 'serie'){
                    $query = "INSERT INTO content (content_name,age_limit,content_date,source) VALUES (?,?,?,?)";
                    $statement = mysqli_prepare($conn,$query);
                    mysqli_stmt_bind_param($statement,'siis',$contentName,$contentAge,$contentDate,$contentSource);
                    mysqli_stmt_execute($statement);
                    print(mysqli_stmt_error($statement) . "\n");
                    mysqli_stmt_close($statement);

                    $sql_search = 'SELECT * FROM content';
                    $result = mysqli_query($conn,$sql_search);
                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_assoc($result)){
                            if($row['content_name'] == $contentName && $row['source'] == $contentSource){
                                $_SESSION['content_id'] = $row['id'];
                            }
                        }
                    }
                    $seasonNo = 1;
                    $sql = "INSERT INTO seasonal_content (content_id,season_no) VALUES (?,?)";
                    $statement = mysqli_prepare($conn,$sql);
                    mysqli_stmt_bind_param($statement,'ii',$_SESSION['content_id'],$seasonNo);
                    mysqli_stmt_execute($statement);
                    print(mysqli_stmt_error($statement) . "\n");
                    mysqli_stmt_close($statement);

                    $sql_search = 'SELECT seasonal_content.id AS nsid, seasonal_content.content_id,content.id FROM seasonal_content,content WHERE content_id=content.id AND seasonal_content.content_id= "'.$_SESSION['content_id'].'"';
                    $result = mysqli_query($conn,$sql_search);
                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_assoc($result)){
                            if($row['content_id'] == $row['id']){
                                $_SESSION['seasonal_id'] = $row['nsid'];
                            }
                        }
                    }
                    $null = NULL;
                    $sql2 = "INSERT INTO serie (content_id,season_id,episode_id) VALUES (?,?,?)";
                    $statement = mysqli_prepare($conn,$sql2);
                    mysqli_stmt_bind_param($statement,'iii',$_SESSION['content_id'],$_SESSION['seasonal_id'],$null);
                    mysqli_stmt_execute($statement);
                    print(mysqli_stmt_error($statement) . "\n");
                    mysqli_stmt_close($statement);
                }

                // #########################################################################

                else if($contentType == 'documentary'){
                    $query = "INSERT INTO content (content_name,age_limit,content_date,source) VALUES (?,?,?,?)";
                    $statement = mysqli_prepare($conn,$query);
                    mysqli_stmt_bind_param($statement,'siis',$contentName,$contentAge,$contentDate,$contentSource);
                    mysqli_stmt_execute($statement);
                    print(mysqli_stmt_error($statement) . "\n");
                    mysqli_stmt_close($statement);

                    $sql_search = 'SELECT * FROM content';
                    $result = mysqli_query($conn,$sql_search);
                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_assoc($result)){
                            if($row['content_name'] == $contentName && $row['source'] == $contentSource){
                                $_SESSION['content_id'] = $row['id'];
                            }
                        }
                    }
                    $seasonNo = 1;
                    $sql = "INSERT INTO seasonal_content (content_id,season_no) VALUES (?,?)";
                    $statement = mysqli_prepare($conn,$sql);
                    mysqli_stmt_bind_param($statement,'ii',$_SESSION['content_id'],$seasonNo);
                    mysqli_stmt_execute($statement);
                    print(mysqli_stmt_error($statement) . "\n");
                    mysqli_stmt_close($statement);

                    $sql_search = 'SELECT seasonal_content.id AS nsid, seasonal_content.content_id,content.id FROM seasonal_content,content WHERE content_id=content.id AND seasonal_content.content_id= "'.$_SESSION['content_id'].'"';
                    $result = mysqli_query($conn,$sql_search);
                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_assoc($result)){
                            if($row['content_id'] == $row['id']){
                                $_SESSION['seasonal_id'] = $row['nsid'];
                            }
                        }
                    }
                    $null = NULL;
                    $sql2 = "INSERT INTO documentary (content_id,season_id,episode_id,no_season_id) VALUES (?,?,?,?)";
                    $statement = mysqli_prepare($conn,$sql2);
                    mysqli_stmt_bind_param($statement,'iiii',$_SESSION['content_id'],$_SESSION['seasonal_id'],$null,$null);
                    mysqli_stmt_execute($statement);
                    print(mysqli_stmt_error($statement) . "\n");
                    mysqli_stmt_close($statement);
                }
            }

        }

        // if(isset())

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }
    ?>


</body>
</html>