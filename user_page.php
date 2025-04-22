<?php

@include 'config.php';

session_start();
if(!isset($_SESSION['name'])){
   header('location:login.php');
}
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
                <a href="#" class="mainlink">Medicine</a>
                <a href="#">Articals</a>
                <a href="#">Medical Stores</a>
                <a href="user_profile.php" class="login"><?php echo $_SESSION['name'] ?> <i class='bx bx-user'></i> </a>
                <a href="logout.php" class="login">logout</a>
            </div>
            
        </div>

        
        <!-- LANDING PAGE -->

        <div class="landing">
            <div class="landingText" >
                <h4><span style="color:#e0501b;font-size: 4vw"> What are you looking for?</span> </h4>
                
                <!-- <div class="btn">
                    <a href="#">Learn More</a>
                </div> -->

                <div class="search-container">
                    <form method="post" >
                        <input type="text" name="str" placeholder="Search Medicine..." required>
                        <input type="submit" value="search" name="submit" class="search-container">
                    </form>
                </div>

                <div class="search-list">
                    <ul>
                        
                        <?php
                            if(isset($_POST['submit'])){
                                $str=mysqli_real_escape_string($conn,$_POST['str']);
                                $sql="select id, title, description,'articals' from articals where title 
                                like '%$str%' or description like '%$str%'";
                                $res=mysqli_query($conn,$sql);
                                if(mysqli_num_rows($res)>0){
                                    while($row=mysqli_fetch_assoc($res)){
                                        echo "<li><a href='articals.php?id=".$row['id']."&t=".$row['articals']."'>".$row['title']."</a></li>";
                                        echo "<br/>";
                                    }
                                }else{
                                    echo "No data found";
                                }
                            }
                        ?>
                        
                    </ul>
                </div>
                   
                <br>
                <!-- <h3><i class='bx bx-file'></i>Find medicine with prescription <a href="#">Upload Now</a></h3> -->

            </div>
            <div class="landingImage">
                <!-- <img src="./assets/img/bg.png" alt=""> -->
                <img src="./assets/img/medicine.jpg" alt="">
            </div>
        </div>

        <!-- ABOUT SECTION -->

        <div class="about">
            <div class="aboutText" >
                <h1>Find medicine using prescription <br> <span style="color:#2f8be0;font-size:3vw">How this works?</span> </h1>
                <img src="./assets/img/doctor-woman-400px.png" alt="">
            </div>
            <div class="aboutList">
                <ol>
                    <li> 
                        <span>01</span>
                         <p>Upload photo of your prescription</p>
                    </li>
                    <li> 
                        <span>02</span>
                         <p>Add Contact No or gmail to stay notify</p>
                    </li>
                    <li> 
                        <span>03</span>
                         <p>Then near by pharmasists checks prescription and see availability of medicine and then notify you to pickup in time slot</p>
                    </li>
                    <li> 
                        <span>04</span>
                         <p>now you can pickup medicine from near by store</p>
                    </li>
                    <div class="upload-btn">
                        <button>upload prisciption</button>
                    </div>
                </ol>
            </div>
        </div>
        

        <!-- INFO SECTION -->

        <div class="infoSection">
            <div class="infoHeader">
                <h1>Your Health, Simplified <br> <span style="color:#e0501b">Health Tools.</span> </h1>
            </div>
            <div class="infoCards">

                <div class="card one">
                    <img src="./assets/img/movie.png" class="cardoneImg" alt="">
                    <div class="cardbgone"></div>
                    <div class="cardContent">
                        <h2>BMI Calculator</h2>
                        <p>Quickly check your Body Mass Index and understand your health.</p>
                        <a href="bmi_calculator.html">
                            <div class="cardBtn">
                                <img src="./assets/img/next.png" alt="" class="cardIcon">
                            </div>
                        </a>
                    </div>
                </div>

                <div class="card two">
                    <img src="./assets/img/learn.png" class="cardtwoImg" alt="">
                    <div class="cardbgtwo"></div>
                    <div class="cardContent">
                        <h2>BMR Calculator</h2>
                        <p>Calculate your BMR to better plan your diet and workouts.</p>
                        <a href="#">
                            <div class="cardBtn">
                                <img src="./assets/img/next.png" alt="" class="cardIcon">
                            </div>
                        </a>
                    </div>
                </div>

                <div class="card three">
                    <img src="./assets/img/videocall.png" class="cardthreeImg" alt="" >
                    <div class="cardbgone"></div>
                    <div class="cardContent">
                        <h2>Ideal Weight Calculator</h2>
                        <p>Find your healthy weight range based on your height.</p>
                        <a href="#">
                            <div class="cardBtn">
                                <img src="./assets/img/next.png" alt="" class="cardIcon">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- BANNER AND FOOTER -->

        <div class="banner">
            <div class="bannerText">
                <h1>Contact</h1>
                <p> support@medguide.com</p>
                <p>Location : gandhinagar</p>
            </div>
            <div class="bannerImg">
                <h1>About MedGuide</h1>
                <p>“Your trusted companion for health tools and wellness insights.”</p>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</body>
</html>