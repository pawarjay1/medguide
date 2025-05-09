<?php

include 'config.php';
session_start();
$user_id = $_SESSION['name'];

if(!isset($_SESSION['name'])){
    header('location:login.php');
}

if (isset($_POST['update_profile'])) {



    $old_pass = $_POST['old_pass'];
    $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
    $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
    $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));

    if (!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)) {
        if ($update_pass != $old_pass) {
            $message[] = 'old password not matched!';
        } elseif ($new_pass != $confirm_pass) {
            $message[] = 'confirm password not matched!';
        } else {
            mysqli_query($conn, "UPDATE `users` SET password = '$confirm_pass' WHERE name = '$user_id'") or die('query failed');
            $message[] = 'password updated successfully!';
        }
    }
    $update_image = $_FILES['update_image']['name'];
    $update_image_size = $_FILES['update_image']['size'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_folder = 'uploaded_img/' . $update_image;

    if (!empty($update_image)) {
        if ($update_image_size > 2000000) {
            $message[] = 'image is too large';
        } else {
            $image_update_query = mysqli_query($conn, "UPDATE `users` SET image = '$update_image' WHERE name = '$user_id'") or die('query failed');
            if ($image_update_query) {
                move_uploaded_file($update_image_tmp_name, $update_image_folder);
            }
            $message[] = 'image updated succssfully!';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MedGuide</title>
    <link rel="stylesheet" href="./assets/css/update_profile.css">
    <link rel="stylesheet" href="./assets/css/styles.css">

    
    
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
    <div class="wrapper">
        <div class="nav">
            <div class="logo">
                <h4>MedGuide.</h4>
            </div>
            <div class="links">
                <a href="user_page.php" class="mainlink">Medicine</a>
                <a href="#">Articals</a>
                <a href="#">Medical Stores</a>
                <a href="#" class="login"><?php echo $_SESSION['name'] ?> <i class='bx bx-user'></i> </a>
                <a href="logout.php" class="login">logout</a>
            </div>

        </div>


        
            <div class="main-profile">
                <div class="update-profile">

                    <?php
                    $select = mysqli_query($conn, "SELECT * FROM `users` WHERE name = '$user_id'") or die('query failed');
                    if (mysqli_num_rows($select) > 0) {
                        $fetch = mysqli_fetch_assoc($select);
                    }
                    ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <?php
                        if ($fetch['image'] == '') {
                            echo '<img src="img/default-avatar.png">';
                        } else {
                            echo '<img src="uploaded_img/' . $fetch['image'] . '">';
                        }
                        if (isset($message)) {
                            foreach ($message as $message) {
                                echo '<div class="message">' . $message . '</div>';
                            }
                        }
                        ?>

                        <div class="flex">
                            <div class="inputBox">
                                <span>username :</span>
                                <input type="text" name="update_name" class="box" value="<?php echo $fetch['name']; ?>">
                                <span>your email :</span>
                                <input type="email" name="update_email" class="box" value="<?php echo $fetch['email']; ?>">
                                <span>update your pic :</span>
                                <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
                            </div>
                            <div class="inputBox">
                                <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
                                <span>old password :</span>
                                <input type="password" name="update_pass" placeholder="enter previous password" class="box">
                                <span>new password :</span>
                                <input type="password" name="new_pass" placeholder="enter new password" class="box">
                                <span>confirm password :</span>
                                <input type="password" name="confirm_pass" placeholder="confirm new password" class="box">
                            </div>
                        </div>
                        <input type="submit" value="update profile" name="update_profile" class="btn">

                    </form>

                </div>
            </div>
       



        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</body>

</html>