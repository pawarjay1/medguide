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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/dashboard.css">

    <link rel="stylesheet" href="./css/update_profile.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Student details</title>

    <style>
* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}



.mainn{
    overflow-x: hidden;
    overflow-y: auto;
    /* display: flex; */
    display: grid;
   grid-template-columns: repeat(auto-fit, minmax(55rem, 1fr));
   /* gap:1.5rem; */
   align-items: flex-start;
   
  }




/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
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
                <a href="perant_page.php">
                    <i class='bx bx-home-alt'></i>
                    <span class="link_name">Home</span>
                </a>

            </li>

            <li>
                <a href="parent_gallery.php" class="active">
                    <i class='bx bx-folder'></i>
                    <span class="link_name">Gallery</span>
                </a>

            </li>

            <li>
                <a href="perant_profile.php">
                    <i class='bx bx-user'></i>
                    <span class="link_name">Profile</span>
                </a>

            </li>
            <li>
                <a href="perant_feedback.php">
                    <i class='bx bx-chat'></i>
                    <span class="link_name">Feedback</span>
                </a>

            </li>

            <li>
                <a href="parent_student_detail.php">
                    <i class='bx bx-chat'></i>
                    <span class="link_name">student info</span>
                </a>

            </li>
            <!-- <li>
                <a href="#">
                    <i class='bx bxs-user-rectangle'></i>
                    <span class="link_name">Friends</span>
                </a>

            </li> -->
            <!-- <li>
                <a href="#">
                    <i class='bx bx-message'></i>
                    <span class="link_name">Favourite</span>
                </a>

            </li> -->
            <!-- <li>
                <a href="#">
                    <i class='bx bxs-bell-ring'></i>
                    <span class="link_name">Notification</span>
                </a>

            </li> -->
            <li>
                <a href="perant_location.php">
                    <i class='bx bx-map'></i>
                    <span class="link_name">location</span>
                </a>

            </li>
            <!-- <li>
                <a href="#">
                    <i class='bx bx-cog'></i>
                    <span class="link_name">Setting</span>
                </a>

            </li> -->

            <li>
                <a href="logout.php">
                    <i class='bx bx-log-out'></i>
                    <span class="link_name">Log-Out</span>
                </a>

            </li>
        </ul>
    </div>
    <div class="mainn">
        <!-- <div class="update-profile">  -->
        <div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 4</div>
  <img src="./img/bus1.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 4</div>
  <img src="./img/bus2.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 4</div>
  <img src="./img/bus4.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext">4 / 4</div>
  <img src="./img/bus5.jpg" style="width:100%">
</div>



</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span>
  <span class="dot"></span>
</div>


        <!-- </div> -->
    </div>

    <script>
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>
</body>

</html>