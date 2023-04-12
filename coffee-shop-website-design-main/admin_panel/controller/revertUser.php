<?php

    include_once "../config/dbconnect.php";
   
    $u_id=$_POST['record'];

    $query="UPDATE User SET Deleted = 0 WHERE ID='$u_id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"User reverted";
    }
    else{
        echo"Not able to revert";
    }
    
?>