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
    <style>
    a.tst:hover{
        background-color:red;
        transition:0.3s;
    }
    </style>
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
    </main>
  

  
   <!--Login form start-->

   <div class="loginContainer d-flex direction-column">
                    <h2 style="margin:0 auto;" class="formtitle">
                    Admin Panel
                    </h2>
                    <div style="margin:0 auto;">
                    <a class="tst" style="border:1px solid white; padding:10px;" href="dashboard.php">Dashboard</a>
                    </div>
                    <br>
                    <div style="margin:0 auto;">
                    <a class="tst" style="border:1px solid white; padding:10px;" href="content-mng.php">Content Management</a>
                    </div>
                    </div>
                   
</body>
</html>