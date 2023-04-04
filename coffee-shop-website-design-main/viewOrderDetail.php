<div class="container">
<table class="table table-striped">
    <thead>
        <tr>
            <th class="Order-Text">#</th>
            <th class="Order-Text">Name</th>
            <th class="Order-Text">Size</th>
            <th class="Order-Text">Quantity</th>
            <th class="Order-Text">Unit Price</th>
            <th class="Order-Text">Total</th>
        </tr>
    </thead>
    <?php
   
        include_once 'DBConnect.php';
         $ID= $_POST['orderID'];
       
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
          <td class="Order-Text-Table"><?=$count?></td>
          <td class="Order-Text-Table"><?=$row["Name"]?></td>
          <td class="Order-Text-Table"><?=$row["size"]?></td>
          <td class="Order-Text-Table"><?=$row["Qty"]?></td>
          <td class="Order-Text-Table"><?=$row["Price"]?></td>
          <td class="Order-Text-Table"><?=$row["Price"] * $row["Qty"]?> </td>
    <?php
             $count = $count + 1;   
            }
        }
    ?>
</table>
</div>
