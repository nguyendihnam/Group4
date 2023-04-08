<?php
      include_once 'DBConnect.php';
      $Qty = $_POST['Qty'];
      $ID = $_POST['ID'];
      $query = "Update orderdetails set Qty = $Qty where ID = $ID ";
      $rs = mysqli_query($conn, $query);

?>