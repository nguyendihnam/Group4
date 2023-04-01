<?php
   include_once 'DBconnect.php';

   # Get code
   if(isset($_GET['id'])):
      header("location:menu.php");
   endif;
   $id = $_GET['id'];
   #4. Excute query
   $query = "SELECT * FROM product WHERE ID='{$id}'";
   $rs = mysqli_query($conn, $query);
   $count = mysqli_num_rows($rs);
   $fields = mysqli_fetch_array($rs);
   
?>
<?php
    include'./header.php';
    include'./slider.php';  
?>

  <form action="order.php" method="post">
  <?php
            if ($count == 0):
                echo 'Records not founds';
            else:
                while ($fields = mysqli_fetch_array($rs)):
                    ?>
  <div>
    <img src="./image/<?= $fields[0] ?>" alt="Product Image">
  </div>
  <div>
    <h2><?= $fields[0] ?></h2>
    <p>Price: $100</p>
    <p>
      <label>Size:</label>
      <select name="size">
        <option value="S">S</option>
        <option value="M">M</option>
        <option value="L">L</option>
      </select>
    </p>
    <p>
      <label>Quantity:</label>
      <input type="number" name="quantity" min="1" max="10">
    </p>
    <button type="submit" name="order">Order Now</button>
  </div>
  <?php
  endwhile;
endif;
  ?>
</form>


   <?php
        include'./footer.php';
   ?>
</body>

</html>