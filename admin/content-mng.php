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
    </main>
  

  
   <!--Login form start-->

   <div class="loginContainer d-flex direction-column">
                    <h2 class="formtitle">
                    Content Management
                    </h2>
                    <form action="content-mng.php" id="loginForm" class="d-flex direction-column" method="post" name="episodeForm">
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
                        <input type="text" name="content_tag" id="content_tag" class="content_tag" placeholder="Content Tag"/>
                        <input type="text" name="content_actor" id="content_actor" class="content_actor" placeholder="Content Actor"/>
                        <input type="text" name="content_language" id="content_language" class="content_language" placeholder="Content Language"/>
            
                        <button type='submit' name='add' class='button submitButton' id='signInButton'>
                            Add
                        </button>
                    </form>
                    </div>
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
                            $tag = $_POST['content_tag'];
                            $actor = $_POST['content_actor'];
                            $language = $_POST['content_language'];
                
                            if(!empty($tag)){
                                $sql = 'INSERT INTO content_tag (content_id,tag_name) VALUES (?,?)';
                                $statement = mysqli_prepare($conn,$sql);
                                mysqli_stmt_bind_param($statement,'is',$contentOption,$tag);
                                mysqli_stmt_execute($statement);
                                print(mysqli_stmt_error($statement) . "\n");
                                mysqli_stmt_close($statement);
                            }
                            if(!empty($actor)){
                                $sql = 'INSERT INTO content_actor (content_id,actor_name) VALUES (?,?)';
                                $statement = mysqli_prepare($conn,$sql);
                                mysqli_stmt_bind_param($statement,'is',$contentOption,$actor);
                                mysqli_stmt_execute($statement);
                                print(mysqli_stmt_error($statement) . "\n");
                                mysqli_stmt_close($statement);
                            }
                            
                            if(!empty($language)){
                                $sql = 'INSERT INTO content_language (content_id,content_language) VALUES (?,?)';
                                $statement = mysqli_prepare($conn,$sql);
                                mysqli_stmt_bind_param($statement,'is',$contentOption,$language);
                                mysqli_stmt_execute($statement);
                                print(mysqli_stmt_error($statement) . "\n");
                                mysqli_stmt_close($statement);
                            }
                        }
                    ?>
</body>
</html>