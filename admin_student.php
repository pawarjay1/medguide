<?php

@include 'config.php';

session_start();
$user_id = $_SESSION['name'];

if (!isset($_SESSION['name'])) {
    header('location:login.php');
}

?>

<?php
@include 'config.php'; 

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $user_type = $_POST['user_type'];

    $image = $_POST['image']; 

    $select = " SELECT * FROM users WHERE email='$email' && password='$pass' "; 

    $result = mysqli_query($conn, $select); 

    if(mysqli_num_rows($result) > 0){
        $error[] = 'user is already exist!';
    }                                                                     
    else{
        if($pass != $cpass){
            $error[] = 'password is not matched!'; 
        }
        else{
            $insert = "INSERT INTO users(name,email,password,user_type,image) values('$name','$email','$pass','$user_type','$image')"; 
            mysqli_query($conn,$insert);
            header('location:login.php'); 
            
        }
    }
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
                    <span class="link_name">Articals</span>
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

                        <span>Title :</span>
                        <input type="text" name="title" class="box" placeholder="title of artical" value="">

                        <span>Product Price :</span>
                        <input type="text" name="price" class="box" placeholder="enter price" value="">

                        <span>Product Image :</span>
                        <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box">

                        
                    </div>
                    <div class="inputBox">
                        
                        <span>Side Effects</span>
                        <input type="email" name="side_effects"  class="box" placeholder="enter side effects of medicine">
                        
                        <span>Uses</span>
                        <input type="email" name="uses"  class="box" placeholder="enter uses of this medicine">



                        <span>Description :</span>
                        <textarea name="description" id="" cols="30" rows="5" placeholder="enter basic description..." class="box"></textarea>
                    </div>
                </div>
                <input type="submit" value="Publish Artical" name="Upload_Student" class="btn">

            </form>

        </div>

    </div>

</body>

</html>