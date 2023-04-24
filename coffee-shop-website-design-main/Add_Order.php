<?php
    session_start();
    /* Including the file DBConnect.php. */
    include_once 'DBConnect.php';
    $ProductID = $_POST['ProductID'];
    $Size = $_POST['Size'];
    $Qty = $_POST['Qty'];
    $UserID = $_SESSION['UserID'];
    $queryCheckOrder = "select * from Orders where UserID = $UserID and Status  = 0";
    $rsCheckOrder = mysqli_query($conn, $queryCheckOrder);
    if($rsCheckOrder)
    {
        $fieldCheckOrder= mysqli_num_rows($rsCheckOrder);
        if($fieldCheckOrder > 0)
        {
            // Check Product Size is exist?
            $array = mysqli_fetch_array($rsCheckOrder);
            $querySelectOrderDetail = "select Qty from orderdetails where OrderID = $array[0] and ProductID = $ProductID and Size =  '$Size' ";
            $rsSelectOrderDetail = mysqli_query($conn, $querySelectOrderDetail);
            $fieldSelectOrderDetailr= mysqli_num_rows($rsSelectOrderDetail);
             //End Check
            if($fieldSelectOrderDetailr > 0)
            {
                $arrayQty = mysqli_fetch_array($rsSelectOrderDetail);
                $TotalQty = $Qty + $arrayQty[0];
                $queryUpdateOrderDetail= "Update orderdetails set Qty = $TotalQty where OrderID = $array[0] and ProductID = $ProductID and Size =  '$Size'  ";
                $rsUpdateOrderDetail = mysqli_query($conn, $queryUpdateOrderDetail);
                echo '1';
            }
            else{
                $queryInserOrderDetail = "INSERT INTO orderdetails(OrderID,ProductID,Size,Qty) VALUES((select ID from Orders where UserID = $UserID and Status = 0),$ProductID,'$Size',$Qty)";
                $rsInserOrderDetail = mysqli_query($conn, $queryInserOrderDetail);
                echo '1';
            }
           
        }
        else{
            $queryInserOrder = "INSERT INTO orders(UserID,Status) VALUES ($UserID,0)";
            $rsInserOrder = mysqli_query($conn, $queryInserOrder);
            if($queryInserOrder){
                $queryInserOrderDetail = "INSERT INTO orderdetails(OrderID,ProductID,Size,Qty) VALUES((select ID from Orders where UserID = $UserID and Status = 0),$ProductID,'$Size',$Qty)";
                $rsInserOrderDetail = mysqli_query($conn, $queryInserOrderDetail);
                echo '1';
            }
        }
       
    }
    echo '0';
   
?>