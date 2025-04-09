<?php

@include 'config.php';

session_start();
$user_id = $_SESSION['name'];

if (!isset($_SESSION['name'])) {
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
    <link rel="stylesheet" type="text/css" href="./css/update_profile.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Admin panel</title>

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
                <a href="admin_page.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class="link_name" class="active">Dashboard</span>
                </a>

            </li>
            <li>
                <a href="admin_profile.php">
                    <i class='bx bx-user'></i>
                    <span class="link_name">Profile</span>
                </a>

            </li>
            <li>
                <a href="admin_message.php">
                    <i class='bx bx-chat'></i>
                    <span class="link_name">Messages</span>
                </a>

            </li>
            <li>
                <a href="admin_accounts.php">
                    <i class='bx bxs-user-rectangle'></i>
                    <span class="link_name">Accounts</span>
                </a>

            </li>
            <!-- <li>
                <a href="#">
                    <i class='bx bx-heart'></i>
                    <span class="link_name">Favourite</span>
                </a>

            </li> -->
            <li>
                <a href="admin_notification.php">
                    <i class='bx bxs-bell-ring'></i>
                    <span class="link_name">Notification</span>
                </a>

            </li>
            <!-- <li>
                <a href="#">
                    <i class='bx bx-folder'></i>
                    <span class="link_name">File Manager</span>
                </a>

            </li> -->
            <li>
                <a href="admin_student.php" class="active">
                    <i class='bx bx-plus'></i>
                    <span class="link_name">Student</span>
                </a>

            </li>

            <li>
                <a href="admin_fees_info.php">
                    <i class='bx bx-money'></i>
                    <span class="link_name">Fees info</span>
                </a>

            </li>

            <li>
                <a href="logout.php">
                    <i class='bx bx-log-out'></i>
                    <span class="link_name">Log-Out</span>
                </a>

            </li>
        </ul>
    </div>
    <div class="main">

       <div class="update-profile">    <!-- this class is used for reusability of the code  -->

           
            <form action="" method="post" enctype="multipart/form-data">
                

                <div class="flex">
                    <div class="inputBox">
                        <span>EnrollmentNo :</span>
                        <input type="text" name="eno" class="box" placeholder="enter enrollment number" value="">
                        <span>Student Name :</span>
                        <input type="text" name="name" class="box" placeholder="enter student name" value="">
                        
                        <span>Choose Degree :</span>
                        <select name="degree" class="box">
                            <option>Diploma</option>
                            <option>BE</option>
                            <option>bvoc</option>
                        </select>

                        <span>Email :</span>
                        <input type="email" name="email"  class="box" placeholder="enter student email">
                        
                    </div>
                    <div class="inputBox">
                        
                        <span>Department :</span>
                        <select name="dept" class="box">
                            <option>Computer</option>
                            <option>Mechanical</option>
                            <option>Chemical</option>
                            <option>Electrical</option>
                        </select>

                        <span>Route of the Bus :</span>
                        <select name="bus_route" class="box">
                            <option>Surat</option>
                            <option>Navsari</option>
                            <option>Bardoli</option>
                        </select>

                        <span>Address :</span>
                        <textarea name="addres" id="" cols="30" rows="5" placeholder="enter full address" class="box"></textarea>
                    </div>
                </div>
                <input type="submit" value="Upload Student" name="Upload_Student" class="btn">

            </form>

        </div>

    </div>

</body>

</html>