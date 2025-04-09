<?php

@include 'config.php';

session_start();
$user_id = $_SESSION['name'];

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
    <link rel="stylesheet" type="text/css" href="./assets/css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/update_profile.css">
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
                <a href="admin_page.php" class="active">
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
        <div class="bx">
        <?php
        $sql = "SELECT * from users";

        if ($result = mysqli_query($conn, $sql)) {
        
            // Return the number of rows in result set
            $rowcount = mysqli_num_rows( $result );
            
            // Display result
            // printf("%d\n", $rowcount);
            echo "<h3>".$rowcount."<h3>";
         }
        ?>
        <p id="total_account">total accounts</p>
        <a href="admin_accounts.php" class="btn">see accounts</a>
        
        </div>

        <div class="bx">
        <?php
        $sql = "SELECT * from users where user_type = 'Admin'";

        if ($result = mysqli_query($conn, $sql)) {
        
            // Return the number of rows in result set
            $rowcount = mysqli_num_rows( $result );
            
            // Display result
            // printf("%d\n", $rowcount);
            echo "<h3>".$rowcount."<h3>";
         }
        ?>
        <p id="total_account">admin accounts</p>
        <a href="admin_accounts.php" class="btn">see accounts</a>
        
        </div>

        <div class="bx">
        <?php
        $sql = "SELECT * from users where user_type= 'Perant'";

        if ($result = mysqli_query($conn, $sql)) {
        
            // Return the number of rows in result set
            $rowcount = mysqli_num_rows( $result );
            
            // Display result
            // printf("%d\n", $rowcount);
            echo "<h3>".$rowcount."<h3>";
         }
        ?>
        <p id="total_account">perant accounts</p>
        <a href="admin_accounts.php" class="btn">see accounts</a>
        
        </div>

        <div class="bx">
        <?php
        $sql = "SELECT * from users where user_type= 'Driver'";

        if ($result = mysqli_query($conn, $sql)) {
        
            // Return the number of rows in result set
            $rowcount = mysqli_num_rows( $result );
            
            // Display result
            // printf("%d\n", $rowcount);
            echo "<h3>".$rowcount."<h3>";
         }
        ?>
        <p id="total_account">driver accounts</p>
        <a href="admin_accounts.php" class="btn" >see accounts</a>
        
        </div>
        
        <div class="bx">
        <?php
        $sql = "SELECT * from message";

        if ($result = mysqli_query($conn, $sql)) {
        
            // Return the number of rows in result set
            $rowcount = mysqli_num_rows( $result );
            
            // Display result
            // printf("%d\n", $rowcount);
            echo "<h3>".$rowcount."<h3>";
         }
        ?>
        <p id="total_account">total messages </p>
        <a href="admin_message.php" class="btn">see messages</a>
        
        </div>
        
    </div>

</body>

</html>


