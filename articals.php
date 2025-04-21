<?php
@include 'config.php';

session_start();

if(!isset($_SESSION['name'])){
   header('location:login.php');
}


?>


<?php



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MedGuide</title>
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
                <a href="user_page.php">Medicine</a>
                <a href="#" class="mainlink">Articals</a>
                <a href="#">Medical Stores</a>
                <a href="user_profile.php" class="login"><?php echo $_SESSION['name'] ?> <i class='bx bx-user'></i> </a>
                <a href="logout.php" class="login">logout</a>
            </div>
        </div>

        <div class="landing">
            <div>
                <?php
                if(isset($_GET['id']) && $_GET['id']>0 && isset($_GET['t']) && $_GET['t']!=''){
                    $id=mysqli_real_escape_string($conn,$_GET['id']);
                    $t=mysqli_real_escape_string($conn,$_GET['t']);
                    if($t=="articals"){
                        $sql="select id, title,price,side_effects, description,uses,image from articals where id='$id'";
                    }else{
                        header('location:user_page.php');
                        die();
                    }
                
                    $res=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($res)>0){
                        $row=mysqli_fetch_assoc($res);
                        $imageData = $row['image']; // The BLOB column
                        $imageType = "jpeg"; // Change if it's png, gif, etc.
                        echo "<h1>".$row['title']."</h1>";
                        echo '<img src="data:image/' . $imageType . ';base64,' . base64_encode($imageData) . '" width="300"><br><br>';
                        echo "<h3>Price : ".$row['price']."/- </h3>";
                        echo "<h3>Side Effects : ".$row['side_effects']."</h3>";
                        
                        echo "<a href='user_page.php' class='back-btn'>Back</a>";

                        
                ?>
            </div>
            <?php
            echo "<div class='description'>"; 
            echo "<h3>Description : </h3><p>".$row['description']."</p>";
            echo "<h3>Uses : </h3><p>".$row['uses']."</p>";
        echo "</div>";
    }else{
        header('location:user_page.php');
        die();
    }
}
            ?>
            
        </div>
        

        <!-- FOOTER -->

        <div class="banner">
            <div class="bannerText" data-aos="fade-right" data-aos-duration="1000">
                <h1>Contact</h1>
                <p> support@medguide.com</p>
                <p>Location : gandhinagar</p>
            </div>
            <div class="bannerImg" data-aos="fade-up" data-aos-duration="1000">
                <h1>About MedGuide</h1>
                <p>“Your trusted companion for health tools and wellness insights.”</p>
            </div>
        </div>

        
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
            AOS.init();
    </script>
</body>
</html>