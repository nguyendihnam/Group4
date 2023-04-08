<?php
      include_once 'DBConnect.php';
      $Qty = $_POST['Qty'];
      $ID = $_POST['ID'];
      $query = "delete from orderdetails where ID = $ID ";
      $rs = mysqli_query($conn, $query);

?>