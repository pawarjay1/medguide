<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['name'])){
   header('location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/dashboard.css">

    <link rel="stylesheet" href="./css/update_profile.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>perant page</title>

    <style>
        
    </style>
</head>

<body>
    <div class="slidebar">
        <div class="logo_content">
            <div class="logo">
                <i class='bx bx-user'></i>
                <i class="fa-solid fa-user"></i>
                <div class="logo_name"><?php echo $_SESSION['uname'] ?> Panel</div>
            </div>
            
        </div>
        <ul class="nav_list">
            
            <li>
                <a href="#" class="active">
                    <i class='bx bx-home-alt'></i>
                    <span class="link_name">Home</span>
                </a>

            </li>

            <li>
                <a href="parent_gallery.php">
                    <i class='bx bx-folder'></i>
                    <span class="link_name">Gallery</span>
                </a>

            </li>

            <li>
                <a href="perant_profile.php">
                    <i class='bx bx-user'></i>
                    <span class="link_name">Profile</span>
                </a>

            </li>
            <li>
                <a href="perant_feedback.php">
                    <i class='bx bx-chat'></i>
                    <span class="link_name">Feedback</span>
                </a>

            </li>

            <li>
                <a href="parent_student_detail.php">
                    <i class='bx bx-chat'></i>
                    <span class="link_name">student info</span>
                </a>

            </li>
            
            <!-- <li>
                <a href="#">
                    <i class='bx bxs-user-rectangle'></i>
                    <span class="link_name">Friends</span>
                </a>

            </li> -->
            <!-- <li>
                <a href="#">
                    <i class='bx bx-message'></i>
                    <span class="link_name">Favourite</span>
                </a>

            </li> -->
            <!-- <li>
                <a href="#">
                    <i class='bx bxs-bell-ring'></i>
                    <span class="link_name">Notification</span>
                </a>

            </li> -->
            <li>
                <a href="perant_location.php">
                    <i class='bx bx-map'></i>
                    <span class="link_name">location</span>
                </a>

            </li>
            <!-- <li>
                <a href="#">
                    <i class='bx bx-cog'></i>
                    <span class="link_name">Setting</span>
                </a>

            </li> -->

            <li>
                <a href="logout.php">
                    <i class='bx bx-log-out'></i>
                    <span class="link_name">Log-Out</span>
                </a>

            </li>
        </ul>
    </div>
    <div class="mainn">
        <div class="tx">
            <h1>welcome <?php echo $_SESSION['name']."!<br>"; ?></h1><br><br>
            <h3>May your child journey be free from stress and bring him home safely.</h3><br><br>
            <p>This System helps you to keep track your children travelling in the school bus.</p><br>
            <p>Since GPS location of the school bus is tracked, so driver will not attempt to re-route the school anywhere else.</p>
            <a href="#" class="btn_track">track</a>
        </div>
        <div class="logo">   
            <img src="./img/bus.png" height="500px" width="auto">
        </div> 
    </div>
</body>

</html>