<?php
include_once "../config/dbconnect.php";

#6. Check form is submitted
if (isset($_POST['btnUpdate'])){
$id = $_POST['ID'];
    $name = $_POST['Name'];
    $categoryID = $_POST['categoryID'];
    $thumbnail = $_POST['thumbnail'];
    $description = $_POST['description'];
    $createdDate = date('createdDate');
    $updatedDate = date('UpdatedDate');
    $delete = 0; // Mặc định là chưa xóa
    $image = $_POST['image'];
    $s = $_POST['s'];
    $m = $_POST['m'];
    $l = $_POST['l'];

if (isset($_FILES['newImage'])) {
    $location = "../images/";
    $img = $_FILES['newImage']['Name'];
    $tmp = $_FILES['newImage']['Name'];
    $dir = '../images/';
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'webp');
    $image = rand(1000, 1000000) . "." . $ext;
    $final_image = $location . $image;
    if (in_array($ext, $valid_extensions)) {
        $path = $location . $image;
        move_uploaded_file($tmp, $dir . $image);
    }
} else {
    $final_image = $_POST['existingImage'];
}

$update = mysqli_query($conn,"UPDATE product SET 
     Name = '$name',categoryID = '$categoryID',thumbnail = '$thumbnail',description = '$description',
createdDate = '$createdDate',UpdatedDate = '$updatedDate',deleted = '$delete',image = '$image',s = '$s',m = '$m',l = '$l'
 where ID = '$id'");

if($update)
{
    echo "true";
}
// else
// {
//     echo mysqli_error($conn);
// }
}
?>
