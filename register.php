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
    <title>register Form</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/login_page.css">
</head>
<body>
    <div class="container">
        <div class="login">
            <form method="POST" action="">
                <?php
                if(isset($error)){
                    foreach($error as $error){
                         echo '<span>'.$error.'</span>';
                    };
                };
                ?>
                <h1>register</h1>
                <hr>
                <label>Name</label>
                <input type="text" name="name" placeholder="Your name">
                <label>Email</label>
                <input type="text" name="email" placeholder="abc@exampl.com">
                <label>Password</label>
                <input type="password" name="password" placeholder="enter your password!">
                <label>confirm Password</label>
                <input type="password" name="cpassword" placeholder="confirm your password!">
                <select name="user_type" class="sel_op" hidden>
                    <option> Perant</option>
                    <option> Admin </option>
                    <option> Driver </option>
                </select>
               <label> Choose Your Pic </label>
            <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box">
                <input type="submit" value="register now" class="btn" name="submit">
                <p>already have an account?<a href="login.php">login now</a></p>
            </form>
        </div>
        <div class="pic">
            <img src="./assets/img/registration_page_banner.jpg">
        </div>
    </div>
</body>
</html> 