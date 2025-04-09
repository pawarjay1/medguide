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
        .mainn .txx{
    color: rgba(51, 51, 51, 0.817); 
    margin-top: 40px;
    margin-left: 20px;
    font-size: 1.3rem;
    height: auto;
    width: 100%; 
    text-align: center;
}
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
                <a href="perant_page.php">
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
                <a href="#"  class="active">
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
        
            <div class="txx">
                <h3>Copy the below Clipboard and Paste it on Google Maps</h3>
                <h3>So you can check current location of School Bus</h3>
            </div>
            <?php
            $select = mysqli_query($conn, "SELECT * FROM `gps_track`") or die('query failed');
                
            while( $fetch = mysqli_fetch_assoc($select)){
            ?>
            <div class="update-profile">
                
                <div class="copyfield">
                    <span id="link"><?php echo $fetch['track_lat']; echo ","; echo $fetch['track_lng']; ?></span>
                    <span id="copy-btn">Copy</span>
                </div>

                <div class="txx">
                <p>above Clipboard latitude and longitude will change according Bus location.</p>
                </div>
            </div>
            <?php } ?>
        
    </div>

    <script>
        var copybtn = document.getElementById("copy-btn");
        var link = document.getElementById("link");

        copybtn.onclick = function () {
            navigator.clipboard.writeText(link.innerHTML);
            copybtn.innerHTML = "Copied"
            setTimeout(function (){
                copybtn.innerHTML = "Copy"
            }, 2000)
        }
    </script>
</body>

</html>