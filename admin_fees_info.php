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
    <title>Admin Fees Info</title>

    <style>
    table,th,td {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 10px; 
        text-align: center;
    }
    th {
        background-color: #8581fc;
    }
    .paid{
        width: 55%;
        padding:5px 10px;
        color:white;
        text-decoration: none;
        display: block;
        text-align: center;
        cursor: pointer;
        font-size: 14px;
        background-color: green;
        border-radius: 5px;
        display: block;
        margin: auto;
    }
    .pending{
        width: 45%;
        padding:5px 10px;
        color:white;
        text-decoration: none;
        display: block;
        text-align: center;
        cursor: pointer;
        font-size: 14px;
        background-color: red;
        border-radius: 5px;
        display: block;
        margin: auto;
        
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
                <a href="admin_student.php">
                    <i class='bx bx-plus'></i>
                    <span class="link_name">Student</span>
                </a>

            </li>

            <li>
                <a href="admin_fees_info.php" class="active">
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

             <table style="width:100%">
                <tr>
                    <th>Enrollment no</th>
                    <th>Student Name</th>
                    <th>Bus Route</th>
                    <th>Status</th>
                </tr>

                <?php
                    $sql = "SELECT eno,name,bus_route,status,id FROM student";
                    $result = mysqli_query($conn, $sql);
                    
                    if (mysqli_num_rows($result) > 0) {
                      // output data of each row
                      while($row = mysqli_fetch_assoc($result)) {
                        
                            echo "<tr><td>".$row['eno']."</td>";
                            echo "<td>".$row['name']."</td>";
                            echo "<td>".$row['bus_route']."</td>";

                            echo "<td>";

                            if($row['status']==1){
                                echo '<p><a href="active.php?id='.$row['id'].'&status=0" class="paid">Paid</a></p>';
                            }else{
                                echo '<p><a href="active.php?id='.$row['id'].'&status=1" class="pending">Pending</a></p>';
                            }

                            echo "</td>";
                      }
                    } else {
                      echo "0 results";
                    }
                ?>

                
            </table>
    </div>

</body>

</html>