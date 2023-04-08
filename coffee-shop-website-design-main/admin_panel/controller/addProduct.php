<?php
include_once "../config/dbconnect.php";

if (isset($_POST['addproduct'])) 
{
    // Lấy dữ liệu từ form
    $name = $_POST['name'];
    $categoryID = $_POST['category_id'];
    $thumbnail = $_POST['thumbnail'];
    $description = $_POST['description'];
    $createdDate = date('Y-m-d H:i:s');
    $updatedDate = date('Y-m-d H:i:s');
    $delete = 0; // Mặc định là chưa xóa
    $image = $_POST['image'];
    $s = $_POST['s'];
    $m = $_POST['m'];
    $l = $_POST['l'];
    // Thêm dữ liệu vào cơ sở dữ liệu
    $insert = mysqli_query($conn,"INSERT INTO product (product_Name,product_CategoryID, product_Thumbnail, product_Description, product_CreatedDate, product_UpdatedDate, product_Deleted, product_Image, product_S, product_M, product_L) VALUES ('$name, $categoryID, $thumbnail, $description,$createdDate ,$updatedDate , $delete, $image, $s, $m, $l')");
    
    if ($insert) {
        header("Location: ../index.php?size=success");
        exit;
    } else {
        header("Location: ../index.php?size=error");
        exit;
    }
}else{
    header("Location: ../index.php?size=success");
}
?>
