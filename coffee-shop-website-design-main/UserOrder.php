<?php
session_start();
include 'DBConnect.php';
if(!isset($_SESSION['User'])){
    header("location:Signin.php");
}
else{
    $ID = $_SESSION["UserID"];

    $query = "
    SELECT 
    ord.ID,
    ord.Note,
    SUM( case when ordD.Size = 'S' then pd.S * ordD.Qty
        when ordD.Size = 'M' then pd.M * ordD.Qty
        when ordD.Size = 'L' then pd.L * ordD.Qty
        END ) as TotalPrice
    FROM 
    orders ord 
    inner join orderdetails ordD on ord.ID = ordD.OrderID
    inner join product pd on ordD.ProductID = pd.ID
    where ord.UserID = '$ID' and ord.Status != 0 
    GROUP BY ord.ID,ord.Note
    ";
    $rsOrder = mysqli_query($conn, $query);
    $countOrder = mysqli_num_rows($rsOrder);
}
?>
<?php
    include'./header.php';
    // include'./slider.php';  

?>
    <h1 class="Order-Main">User's Order</h1>
   <section class="section-Order" id="Order">
    <!-- Order -->
   
   
    <div class="container">
		<div class="order-list">
			<h2 class= "Order-Title">Order History</h2>
			<table>
				<thead>
					<tr>
						<th class="Order-Text-Table">Order ID</th>
                        <th colspan ="4" class="Order-Text-Table">Note</th>
						<th class="Order-Text-Table">Total Price</th>
						<th class="Order-Text-Table">Action</th>
					</tr>
				</thead>
				<tbody>
                <?php
                if($countOrder == 0):
                    echo'Record not found';
                else:
                    while($field = mysqli_fetch_array($rsOrder)){
                     
            ?>
					<tr>
						<td class="Order-Text-Table"><?=$field[0]?></td>
						<td colspan ="4" class="Order-Text-Table"><?=$field[1]?></td>
						<td class="Order-Text-Table"><?=$field[2]?> VNĐ</td>
                        <td><button class="btn" id="btnDetail" onclick="GetDetailOrder(<?=$field[0]?>)">View</button></td>
					</tr>
                    <?php
                    }
                endif;
					?>
				</tbody>
			</table>
		</div>
        <div class="customer-info">
            <div id="OrderDetail"></div>
        </div>
  </div> 
</section>

    <?php
        include'./footer.php';
   ?>
</body>

<script type="text/javascript" src="./js/script.js"></script>   

</html>




