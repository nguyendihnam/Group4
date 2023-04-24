<?php
#1. Start session
session_start();
include_once "../config/dbconnect.php";

    // Lấy dữ liệu từ form
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
    

    // Thêm dữ liệu vào cơ sở dữ liệu
    $update = mysqli_query($conn,"INSERT INTO product 
    (Name,categoryID, thumbnail, description, 
    createdDate, UpdatedDate, Deleted, image, s, m, l) 
    VALUES ('$name', '$categoryID', '$thumbnail', '$description',
     '$createdDate' ,'$updatedDate' , '$delete', '$image', '$s',
      '$m', '$l')");
    if(!$update)
         {
             echo mysqli_error($conn);
             header("Location: ../index.php");
            }
         else
         {
             header("Location:../index.php");
            }

?>

