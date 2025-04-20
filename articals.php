<?php
@include 'config.php';

if(isset($_GET['id']) && $_GET['id']>0 && isset($_GET['t']) && $_GET['t']!=''){
    $id=mysqli_real_escape_string($conn,$_GET['id']);
    $t=mysqli_real_escape_string($conn,$_GET['t']);
    if($t=="articals"){
        $sql="select id, title, description,image from articals where id='$id'";
    }else{
        header('location:user_page.php');
        die();
    }

    $res=mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)>0){
        $row=mysqli_fetch_assoc($res);
        $imageData = $row['image']; // The BLOB column
        $imageType = "jpeg"; // Change if it's png, gif, etc.
        echo "<h2>".$row['title']."</h2>";
        echo '<img src="data:image/' . $imageType . ';base64,' . base64_encode($imageData) . '" width="300"><br><br>';
        echo "<p>".$row['description']."</p>";
        echo "<a href='user_page.php'>Back</a>";
    }else{
        header('location:user_page.php');
        die();
    }
}
?>