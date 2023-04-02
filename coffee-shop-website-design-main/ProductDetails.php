<?php
include_once 'DBconnect.php';

# Get code
if(!isset($_GET['id'])):
   header("location:menu.php");
endif;
$id = $_GET['id'];

#4. Execute query
$query = "SELECT * FROM product WHERE ID='{$id}'";
$rs = mysqli_query($conn, $query);
$count = mysqli_num_rows($rs);

?>

<?php include './header.php'; ?>

<section class="menu" id="menu">
   <?php if ($count == 0): ?>
      <p>Records not found.</p>
   <?php else: ?>
      <?php while ($fields = mysqli_fetch_array($rs)): ?>
         <div class="product-details">
            <div class="product-image" >
               <img src="image/<?= $fields[8] ?>" alt="<?= $fields[3] ?>" class="img-thumbnail-menu" style="width: 90rem;">
            </div>
            <div class="product-info">
               <h2 class="card-name"><?= ucwords($fields[2]) ?></h2>
               
               <form action="order.php" method="post">
                  <input type="hidden" name="product_id" value="<?= $id ?>">
                  <div class="form-group">
                     <label for="product-quantity">Số lượng:</label>
                     <input type="number" name="product-quantity" id="product-quantity" class="form-control" value="1" min="1" max="10">
                  </div>
                  <div class="form-group">
                     <button type="submit" class="btn btn-primary" style="height: 4.6rem; width: 57.0rem;">Thêm vào giỏ hàng</button>
                  </div>
               </form>
            </div>
         </div>
      <?php endwhile; ?>
   <?php endif; ?>
</section>
<?php include './footer.php'; ?>
