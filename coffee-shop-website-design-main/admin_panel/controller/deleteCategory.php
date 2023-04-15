<?php

    include_once "../config/dbconnect.php";
    
    $id=$_POST['ID'];
    $query="DELETE FROM Category where ID ='$id'";
    $data=mysqli_query($conn,$query);

    if($data){
        echo"Category Item Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>