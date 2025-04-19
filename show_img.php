<?php
@include 'config.php'; 



// 2. Fetch image data
$sql = "SELECT * FROM articals where id = 20 ORDER BY id DESC LIMIT 1"; // You can also filter by id

$result = mysqli_query($conn, $sql); 

// 3. Display image
if ($row = $result->fetch_assoc()) {

    $title = $row['title']; 
    $imageData = $row['image']; // The BLOB column
    $imageType = "jpeg"; // Change if it's png, gif, etc.

    echo "<h3>Image from MySQL (inline base64)</h3>";
    echo '<img src="data:image/' . $imageType . ';base64,' . base64_encode($imageData) . '" width="300">';
    echo " title :".$title."."; 
} else {
    echo "No image found.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>image</title>
</head>
<body>
    
</body>
</html>