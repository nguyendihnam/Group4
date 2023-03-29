<?php
    #1. Database information
    $server = "localhost"; //3306 (default) - 3308
    $account = "root";
    $password = "";
    $database = "CoffeeShopDB";
    #2. Database connection string
    $conn = mysqli_connect($server, $account, $password, $database);
    
    
    #3. Test
//    if($conn == null):
//        die("Connections Fails");
//    else:
//        echo 'Congratulations';
//    endif;
?>