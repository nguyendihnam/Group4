<?php
    session_start();
    /* Including the file DBConnect.php. */
    include_once 'DBConnect.php';
        $userID = $_SESSION['UserID'];
        $Note = $_POST['Note'];
        $query = "select ID from orders where UserID = '$userID' and Status = 0";
        $rs = mysqli_query($conn, $query);
        if($rs)
        {
            $count = mysqli_num_rows($rs);
            if($count > 0)
            {
                $fields = mysqli_fetch_array($rs);
                $queryUpdateStatusOrder = "update orders set Status = 1,Note = '$Note',OrderDate = now() where ID = '$fields[0]'";
                $rs = mysqli_query($conn, $queryUpdateStatusOrder);
                echo '1';
              
            }
            else{
                echo '0';
            }
    
           

        }

   
?>