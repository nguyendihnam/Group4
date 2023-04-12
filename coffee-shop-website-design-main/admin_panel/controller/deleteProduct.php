
<?php
#1. Start session
session_start();
include_once '../config/dbconnect.php';

$id= $_POST['ID'];

$query ="update product set Deleted = 1 where ID = $id";
$rs = mysqli_query($conn, $query);
if(!$rs)
{
    echo mysqli_error($conn);
    header("Location: ../index.php?deleted=error");
   }
else
{
    header("Location: ../index.php?deleted=success");
   }

?>