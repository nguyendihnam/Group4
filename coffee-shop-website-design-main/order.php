<?php
session_start();
include 'DBConnect.php';
if(!isset($_SESSION['User'])){
    header("location:Signin.php");
}
else{
    $ID = $_SESSION["UserID"];

    $queryUser = "select UserName,Address,PhoneNumber,Email from user where ID = '$ID'";
    $rs = mysqli_query($conn, $queryUser);
    if(!$rs){
        die(mysqli_error($rs));
    }
    else{
        $result = mysqli_fetch_array($rs); 
    }

    $queryOrder = "select
    pd.Name,
    ordD.Size,
    ordD.Qty,
    case when ordD.Size = 'S' then pd.S
    when ordD.Size = 'M' then pd.M
    when ordD.Size = 'L' then pd.L
    End Price,
    ordD.ID
    from orders ord 
    inner join orderdetails ordD on ord.ID = ordD.OrderID
    inner join product pd on ordD.ProductID = pd.ID
    where ord.UserID = '$ID' and Status = 0";
    $rsOrder = mysqli_query($conn, $queryOrder);
    $countOrder = mysqli_num_rows($rsOrder);
}
?>
<?php
    include'./header.php';
    // include'./slider.php';  

?>
    <h1 class="Order-Main">Order Information</h1>
   <section class="section-Order" id="Order">
    <!-- Order -->
   
    <div class="container">
		<div class="customer-info">
			<h2 class ="Order-Title">Customer information</h2>
			<p class="Order-Text"><strong>UserName:</strong> <?=$result[0]?></p>
			<p class="Order-Text"><strong>Address:</strong><?=$result[1]?></p>
			<p class="Order-Text"><strong>PhoneNumber:</strong><?=$result[2]?></p>
			<p class="Order-Text"><strong>Email:</strong>  <?=$result[3]?></p>
            <p class="Order-Text"><strong>Note:</strong> 
            <input type="text"class="box" name="txtNote" id="txtNote" autocomplete="off">
                <div class="error"></div></p>
            <a href='edit-address.php?id=<?=$_SESSION['UserID']?>' class="Order-btn">Edit User's Information</a>
            <button class="Order-btn" onclick=SendOrder()>Send Order</button>
		</div>
		<div class="order-list">
            <?php
                if($countOrder == 0):
                
                else:
                
            ?>
			<h2 class= "Order-Title">Order List</h2>
			<table>
				<thead>
					<tr>
						<th class="Order-Text-Table"  colspan="5">Product Name</th>
                        <th class="Order-Text-Table">Size</th>
						<th class="Order-Text-Table">Quantity</th>
						<th class="Order-Text-Table">Price</th>
					</tr>
				</thead>
				<tbody>
                <?php
              
                    $sum = 0;
                    $count = 0;
                    while($field = mysqli_fetch_array($rsOrder)){
                        $sum += $field[2] * $field[3];
                       
                     
            ?>
					<tr>
						<td class="Order-Text-Table" colspan="5"><?=$field[0]?></td>
						<td class="Order-Text-Table"><?=$field[1]?></td>
                        <td><button onclick="document.getElementById('myNumber_<?=$count?>').stepDown()">-</button>
                        <span><input type="number" id="myNumber_<?=$count?>" class="Order-Qty" value="<?=$field[2]?>" min="1"  onchange="CheckNumber(<?=$count?>)" step="1" max="30"></span>
                        <button onclick="document.getElementById('myNumber_<?=$count?>').stepUp()">+</button> </td>
						<!-- <td class="Order-Text-Table"><?=$field[2]?></td> -->
                        <td class="Order-Text-Table"><?=$field[3]?> VNĐ</td>
                        <td></td>
                        <td><input type="button" id="EditQty" class="Order-btn" value ="Update" onclick="UpdateQuantity(<?=$count?>,<?=$field[4]?>)"></td>
                        <td><input type="button" id="DeleteOrder" class="Order-btn" value ="Delete" onclick="DeleteOrder(<?=$field[4]?>)"></td>
					</tr>
                    <?php
                    $count += 1;
                    }
                endif;

					?>
				</tbody>
			</table>
            <?php
                if($countOrder > 0):
                    ?>
                <p class="Order-Text-Price"><strong class="Order-Text">Total Price:</strong><?=$sum?> VNĐ</p>
                <?php
                   endif;

                    ?>
          
			
		</div>
       
	</div>
       
</section>

    <?php
        include'./footer.php';
   ?>
</body>
</html>

