<!-- ============= Admin_profile  ===== -->

<?php

include 'config.php';
session_start();
$user_id = $_SESSION['name'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update profile</title>
   <!-- admin_page -->
   <link rel="stylesheet" type="text/css" href="./css/dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   <!-- custom css file link  -->
   <link rel="stylesheet" href="./css/update_profile.css">

   <!-- tracking files  -->
   <link rel="stylesheet" href="./css/X-demo.css">
   <script src="4b-admin.js"></script>

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
                    <span class="link_name">Dashboard</span>
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
                <a href="admin_notification.php" class="active">
                    <i class='bx bxs-bell-ring'></i>
                    <span class="link_name">Notification</span>
                </a>

            </li>
            <!-- <li>
                <a href="#">
                    <i class='bx bx-folder'></i>
                    <span class="link_name">File Manager</span>
                </a>

            </li>
            <li>
                <a href="#">
                    <i class='bx bx-cog'></i>
                    <span class="link_name">Setting</span>
                </a>

            </li> -->

            <li>
                <a href="admin_student.php">
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
        <div id="wrapper"></div>
    </div>
</body>
</html>