<?php
    include_once "../config/dbconnect.php";
    
    if(isset($_POST['upload']))
    {
       
        $name = $_POST['Name'];
       
         $insert = mysqli_query($conn,"INSERT INTO category
         (Name) VALUES ('$name')");
 
         if(!$insert)
         {
             echo mysqli_error($conn);
             header("Location: ../index.php?category=error");
         }
         else
         {
             echo "Records added successfully.";
             header("Location: ../index.php?category=success");
         }
     
    }
        
?>