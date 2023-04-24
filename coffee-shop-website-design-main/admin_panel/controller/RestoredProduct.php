
<?php
#1. Start session
session_start();
include_once '../config/dbconnect.php';

$id= $_POST['ID'];

$edit ="update product set Deleted = 0 where ID = $id";
$rsedit = mysqli_query($conn, $edit);
if(!$rsedit)
{
    echo mysqli_error($conn);
    header("Location: ../index.php?Restored=error");
   }
else
{
    header("Location: ../index.php?Restored=success");
   }

?>
