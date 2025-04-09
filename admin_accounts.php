<?php

@include 'config.php';

session_start();
$user_id = $_SESSION['name'];

if(!isset($_SESSION['name'])){
   header('location:login.php');
}

if(isset($_GET['delete'])){

    $delete_id = $_GET['delete'];
    $delete_users = mysqli_query($conn,"DELETE FROM `users` WHERE id = '".$delete_id."'");
    // $delete_users->execute([$delete_id]);
    // $delete_id = $fetch[$delete_id];
    header('location:admin_accounts.php');
 
 }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./assets/css/dashboard.css">
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
                <a href="admin_accounts.php" class="active">
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
        
        <?php
            $select = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
                
            while( $fetch = mysqli_fetch_assoc($select)){
        ?>
            <div class="account_box">
                <?php 
                if($fetch['image'] == ''){
                    echo '<img src="img/default-avatar.png">';
                }else{
                    echo '<img src="uploaded_img/'.$fetch['image'].'">';
                }?>
                    <br>  
                    <h3>user id :<?php echo $fetch['id']; ?></h3> 
                    <h3>username:<?php echo $fetch['name']; ?></h3>  
                    <h3>email:<?php echo $fetch['email']; ?></h3> 
                    <h3>user type:<?php echo $fetch['user_type']; ?></h3>  
                    <a href="admin_accounts.php?delete=<?= $fetch['id']; ?>" onclick="return confirm('delete this user?');">delete</a>
            </div>
        <?php } ?>
    </div>
</body>

</html>


