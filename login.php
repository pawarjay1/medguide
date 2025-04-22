
<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM users WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'Admin'){

         $_SESSION['name'] = $row['name'];

         $_SESSION['uname'] = $row['user_type'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['name'] = $row['name'];

         $_SESSION['uname'] = $row['user_type'];
        //  header('location:perant_page.php');
        header('location:user_page.php');
      }
      else{
        $_SESSION['name'] = $row['name'];
        $_SESSION['uname'] = $row['user_type'];
        header('location:pharm_page.php');
      }
      
      
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/login_page.css">
</head>
<body>
    <div class="container">
        <div class="login">
            <form method="POST" action=""><br><br><br>
            <?php
                if(isset($error)){
                    foreach($error as $error){
                         echo '<span>'.$error.'</span>';
                    };
                };
                ?>
                <h1>Login</h1>
                <hr>
                <label>Email</label>
                <input type="text" name="email" placeholder="abc@exampl.com">
                <label>Password</label>
                <input type="password" name="password" placeholder="enter your password!">
                <center><input type="submit" value="login now" class="btn" name="submit"></center>
                <p>don't have an account?<a href="register.php">register now</a></p>
                <br><br><br><br><br>
            </form>
        </div>        
        <div class="pic">
            <img src="./assets/img/registration_page_banner.jpg">
        </div>
    </div>

</body>
</html>




