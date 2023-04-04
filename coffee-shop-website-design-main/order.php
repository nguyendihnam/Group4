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

    $queryUser = "select
    pd.Name,
    ordD.Size,
    ordD.Qty,
    case when ordD.Size = 'S' then pd.S
    when ordD.Size = 'M' then pd.M
    when ordD.Size = 'L' then pd.L
    End Price
    from orders ord 
    inner join orderdetails ordD on ord.ID = ordD.OrderID
    inner join product pd on ordD.ProductID = pd.ID
    where ord.UserID = '$ID'";
    $rsOrder = mysqli_query($conn, $queryUser);
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
   
    <form method="post" action="contact_process.php" id="form" onsubmit="return validateInputs()">
    <div class="container">
		<div class="customer-info">
			<h2 class ="Order-Title">Customer information</h2>
			<p class="Order-Text"><strong>UserName:</strong> <?=$result[0]?></p>
			<p class="Order-Text"><strong>Address:</strong><?=$result[1]?></p>
			<p class="Order-Text"><strong>PhoneNumber:</strong><?=$result[2]?></p>
			<p class="Order-Text"><strong>Email:</strong>  <?=$result[3]?></p>
            <p class="Order-Text"><strong>Note:</strong> 
            <input type="text"class="box" name="txtName" id="name" autocomplete="off">
                <div class="error"></div></p>
            <a href='./Logout.php' class="Order-btn">Edit User's Information</a>
            <a href='./Logout.php' class="Order-btn">Send Order</a>
		</div>
		<div class="order-list">
			<h2 class= "Order-Title">Order List</h2>
			<table>
				<thead>
					<tr>
						<th class="Order-Text-Table"  colspan="4">Product Name</th>
                        <th class="Order-Text-Table">Size</th>
						<th class="Order-Text-Table">Quantity</th>
						<th class="Order-Text-Table">Price</th>
					</tr>
				</thead>
				<tbody>
                <?php
                if($countOrder == 0):
                    echo'Record not found';
                else:
                    $sum = 0;
                    while($field = mysqli_fetch_array($rsOrder)){
                        $sum += $field[2] * $field[3];
                     
            ?>
					<tr>
						<td class="Order-Text-Table" colspan="4"><?=$field[0]?></td>
						<td class="Order-Text-Table"><?=$field[1]?></td>
						<td class="Order-Text-Table"><?=$field[2]?></td>
                        <td class="Order-Text-Table"><?=$field[3]?> VNĐ</td>
					</tr>
                    <?php
                    }
                endif;
					?>
				</tbody>
			</table>
           
			<p class="Order-Text"><strong class="Order-Text">Total Price:</strong><?=$sum?> VNĐ</p>
		</div>
       
	</div>
        </form>
       
</section>

    <?php
        include'./footer.php';
   ?>
</body>
</html>

