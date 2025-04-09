<?php
@include 'config.php';

$id = $_GET['id']; 
$status = $_GET['status']; 

$update = "UPDATE student SET status = $status WHERE id = $id";
mysqli_query($conn,$update); 


if (isset($update)) {
    header('location:admin_fees_info.php');
}
?>