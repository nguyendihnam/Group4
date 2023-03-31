<?php
    include'./header.php';
    include'./slider.php';  
?>
<?php
     #1. Start session
     session_start();
     #2. Connect to database
     include_once 'DBconnect.php';
     #3. Execute query
?>
  <Form>
        <div class="menu">
            <div class="card-container" class="display_flex">
                <div class="card">
                    <a href="./image/" class="card-thumbnail">
                        <img src="./image/" alt="" class="img-thumbnail">
                    </a>
                    <div class="card-text-container">
                       <a class="card-item">
                            <h2 class="card-name"></h2>
                        </a>
                            <p class="card-price">$</p>
                            <p class="card-description"></p>
                        <a href="./shoppingcart.php" class="card-btn btn">Add to cart</a>
                    </div>
                </div>
            </div>
        </div>
  </Form>

   <?php
        include'./footer.php';
   ?>
</body>

</html>