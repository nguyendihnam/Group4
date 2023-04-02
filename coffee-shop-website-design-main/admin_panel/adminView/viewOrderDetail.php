<div class="container">
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Size</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Total</th>
        </tr>
    </thead>
    <?php
        include_once "../config/dbconnect.php";
        $ID= $_GET['orderID'];
        //echo $ID;
        $sql="select 
        pr.Name,
        ordD.size,
        ordD.Qty,
        case when ordD.Size = 'S' then pr.S
             when ordD.Size = 'M' then pr.M
             when ordD.Size = 'L' then pr.L
        END Price
        from orderdetails ordD
        inner join product pr on ordD.ProductID = pr.ID
        where ordD.OrderID = '$ID'";
        $result=$conn-> query($sql);
        $count=1;
        if ($result-> num_rows > 0){
            while ($row=$result-> fetch_assoc()) {               
    ?>
              <tr>
          <td><?=$count?></td>
          <td><?=$row["Name"]?></td>
          <td><?=$row["size"]?></td>
          <td><?=$row["Qty"]?></td>
          <td><?=$row["Price"]?></td>
          <td><?=$row["Price"] * $row["Qty"]?> </td>
    <?php
             $count = $count + 1;   
            }
        }
    ?>
</table>
</div>
