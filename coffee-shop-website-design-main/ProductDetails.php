<?php
   include_once 'DBconnect.php';

   # Get code
   if(!isset($_GET['id'])):
      header("location:Product.php");
   endif;
   $id = $_GET['id'];
   #4. Execute query
  
   $query = "SELECT * FROM product WHERE ID='{$id}'";
   $rs = mysqli_query($conn, $query);
   $count = mysqli_num_rows($rs);
?>
<?php include './header.php'; ?>
<!-- <?php include './slider.php'; ?> -->

<section class="menu" id="menu">
    <?php if ($count == 0): ?>
                <p>Records not found.</p>
            <?php else: ?>
                <?php while ($fields = mysqli_fetch_array($rs)): ?>
                    <h2 class="card-name"><?= ucwords($fields[2]) ?></h2>
                        <div class="menu-container-menu">
                            <form action="menu.php" method="post">
                                <div class="card-menu">
                                    <div class="card-thumbnail">
                                        <img src="image/<?= $fields[8] ?>" alt="<?= $fields[3] ?>" class="img-thumbnail-menu">
                                    </div>
                                        <div class="card-text-container">
                                            <p class="card-description-menu"><?= (substr($fields[4], 0, 100) . ' ... ' )?></p><br>  
                                                <div class="card-price-menu">
                                                    <label for="size">Size:</label>
                                                        <select name="size" id="size">
                                                            <option value="S">S : <?= $fields[9] ?>$</option>
                                                            <option value="M">M : <?= $fields[10] ?>$</option>
                                                            <option value="L">L : <?= $fields[11] ?>$</option>
                                                        </select>
                                                </div><br>
                                                    <p><label>Quantity:</label><input type="number" name="quantity" min="1" max="10"></p><br>
                                                    <button type="submit" ><a href="./order.php" alt="Add to Cart">Order</button>
                                            </div>
                                </div>
        <?php endwhile; ?>
                <?php endif; ?>
                            </form>
                        </div>
</section>

<?php
        include'./footer.php';
   ?>