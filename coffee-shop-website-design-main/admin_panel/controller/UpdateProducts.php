<!DOCTYPE html>
<?php
#1. Start session
session_start();
include_once "../config/dbconnect.php";
#4. Get Item Code from Read
if (!isset($_GET['ID'])):
    header("location:./adminView/viewProduct.php");
endif;
$id = $_GET['ID'];

#5. Execute query  (for old data reading by Item code)
$query = "select * from product where ID = '{$id}'";
$rs = mysqli_query($conn, $query);
$fields = mysqli_fetch_array($rs);
#6. Check form is submitted
if (isset($_POST['btnUpdate'])){
#7. Read new data from Input elements
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
#8. Excute query (for update new data)
$query ="update product set Name = '$name',categoryID = '$categoryID',thumbnail = '$thumbnail',description = '$description',
createdDate = '$createdDate',UpdatedDate = '$updatedDate',deleted = '$delete',image = '$image',s = '$s',m = '$m',l = '$l'
 where ID = '$id'";
$rs = mysqli_query($conn, $query);
if(!$rs):
  error_clear_last();
  echo'Nothing to update';
  endif;
  
  header("location: ../index.php" );
}
mysqli_close($conn);
?>