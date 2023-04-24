<?php

    include_once "../config/dbconnect.php";
   
    $order_id= $_POST['ID'];
    $query = "UPDATE orders SET Status = 2 where ID='$order_id' ";
    $rs = mysqli_query($conn, $query);

?>