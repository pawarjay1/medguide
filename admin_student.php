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
    $title = $_POST['title'];
    $price = $_POST['price'];
    
    $side_effects = $_POST['side_effects'];
    $uses = $_POST['uses'];
    $description = $_POST['description'];

    // $image = $_POST['image']; 

    $imageName = $_FILES["image"]["name"];
    $imageData = file_get_contents($_FILES["image"]["tmp_name"]);
    $imageData = $conn->real_escape_string($imageData);



    $select = " SELECT * FROM articals WHERE title='$title' "; 

    $result = mysqli_query($conn, $select); 

    if(mysqli_num_rows($result) > 0){
        $error[] = 'this product artical is already publish!';
    } 
    else{
            $insert = "INSERT INTO articals(title,price,side_effects,uses,description,image) values('$title','$price','$side_effects','$uses','$description','$imageData')"; 
            mysqli_query($conn,$insert);
            header('location:admin_student.php'); 
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
                <?php
                if(isset($error)){
                    foreach($error as $error){
                         echo '<span>'.$error.'</span>';
                    };
                };
                ?>
                    <div class="inputBox">

                        <span>Title :</span>
                        <input type="text" name="title" class="box" placeholder="title of artical" value="">

                        <span>Product Price :</span>
                        <input type="text" name="price" class="box" placeholder="enter price" value="">

                        <span>Side Effects</span>
                        <input type="text" name="side_effects"  class="box" placeholder="enter side effects of medicine">
                        
                    </div>
                    <div class="inputBox">
                        
                        
                        
                        <span>Uses</span>
                        <input type="text" name="uses"  class="box" placeholder="enter uses of this medicine">

                        <span>Description :</span>
                        <textarea name="description" id="" cols="30" rows="5" placeholder="enter basic description..." class="box"></textarea>

                        <span>Product Image :</span>
                        <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box">
                    </div>
                </div>
                <input type="submit" value="Publish Artical" name="submit" class="btn">
            </form>

           
        </div>
    </div>
</body>

</html>