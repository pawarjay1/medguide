<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['name'])){
   header('location:login.php');
}

?>

<?php

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile_no = $_POST['mobile_no'];
    $feedback = $_POST['feedback'];

    $insert = "INSERT INTO message(name,email,mobile_no,feedback) values('$name','$email','$mobile_no','$feedback')";  

    $result = mysqli_query($conn, $insert);
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
                <a href="perant_page.php" >
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
                <a href="perant_feedback.php" class="active">
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
    <div class="main">
        <div class="update-profile">
            
        

            <form action="" method="post" enctype="multipart/form-data">
            <h1>Write Feedback</h1>     
      <div class="flex">
         <div class="inputBox">
            <span>name :</span>
            <input type="text" name="name" placeholder="enter your name "  class="box_feed" value="">
            <span>email :</span>
            <input type="email" name="email" placeholder="enter your email" class="box_feed" value="">
            <span>mobile no :</span>
            <input type="text" name="mobile_no" placeholder="enter your mobile no"  class="box_feed" value="">
            <span>feedback :</span> 
            <textarea name="feedback" cols="30" rows="8" class="box_feed" placeholder="write feedback here"></textarea>
         </div>
         
      </div>
      <input type="submit" value="Send Feedback" name="submit" class="btn">
      
   </form>
        </div>
    </div>
</body>
