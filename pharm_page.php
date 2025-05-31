<?php

@include 'config.php';

session_start();

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
    <link rel="stylesheet" type="text/css" href="./assets/css/dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>driver panel</title>

    <!-- track files  -->
    <link rel="stylesheet" href="./css/X-demo.css">
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
                    <i class='bx bx-grid-alt'></i>
                    <span class="link_name">Dashboard</span>
                </a>

            </li>
            <li>
                <a href="pharm_profile.php">
                    <i class='bx bx-user'></i>
                    <span class="link_name">Profile</span>
                </a>
            <li>
                <a href="logout.php">
                    <i class='bx bx-log-out'></i>
                    <span class="link_name">Log-Out</span>
                </a>

            </li>
        </ul>
    </div>
    <div class="main">
        <h1>Users Requirments</h1> 
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
        $sql = "SELECT * from users where user_type= 'user'";

        if ($result = mysqli_query($conn, $sql)) {
        
            // Return the number of rows in result set
            $rowcount = mysqli_num_rows( $result );
            
            // Display result
            // printf("%d\n", $rowcount);
            echo "<h3>".$rowcount."<h3>";
         }
        ?>
        <p id="total_account">user accounts</p>
        <a href="admin_accounts.php" class="btn">see accounts</a>
        
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