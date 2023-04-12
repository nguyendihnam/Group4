<?php
    session_start();
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
<div class="menu-container">
   <?php if ($count == 0): ?>
      <p>Records not found.</p>
   <?php else: ?>
      <?php while ($fields = mysqli_fetch_array($rs)): ?>
      <div class="flex-box">
         <div class="left" >
            <div class="big-img" >
               <img src="./image/<?= $fields[8] ?>.jpg" onclick="showImg(this.src)" >
            </div>
            <div class="images" >
               <div class="small-img" >
                  <img src="./image/<?= $fields[8] ?>1.jpg" onclick="showImg(this.src)" >
               </div>
               <div class="small-img" >
                  <img src="./image/<?= $fields[8] ?>2.jpg" onclick="showImg(this.src)" >
               </div>
               <div class="small-img" >
                  <img src="./image/<?= $fields[8] ?>3.jpg" onclick="showImg(this.src)" >
               </div>
               <div class="small-img" >
                  <img src="./image/<?= $fields[8] ?>.jpg" onclick="showImg(this.src)" >
               </div>
            </div>
         </div>
         <div class="right" >
            <div class="url" >Home > Menu > <?= $fields[2] ?></div>
            <div class="pname" ><?= $fields[2] ?></div>
            <div class="ratings" >
               <i class="fas fa-star" ></i>
               <i class="fas fa-star" ></i>
               <i class="fas fa-star" ></i>
               <i class="fas fa-star" ></i>
               <i class="fas fa-star-half-alt" ></i>
            </div>
            <p class="card-description-menu"><?= (substr($fields[4], 0, 100) . ' ... ' )?></p><br>  
            <div class="size" > 
            <div class="price">Size :</div>
               <div id="S" class="psize <?= $fields[9] == 1 ? 'active' : '' ?>" value="1" onclick="changeSize(this)">S : <?= $fields[9] ?> </div>
               <div id="M" class="psize <?= $fields[10] == 1 ? 'active' : '' ?>" value="2" onclick="changeSize(this)">M : <?= $fields[10] ?> </div>
               <div id="L" class="psize <?= $fields[11] == 1 ? 'active' : '' ?>" value="3" onclick="changeSize(this)">L : <?= $fields[11] ?> </div>
            </div>
            <div class="quantity" >
               <p>Quantity :</p>
               <input id="Qty" type="number" min="1" max="10" value="1">
            </div>
            <div class="btn-box" >
               <button class="cart-btn" onclick="AddOrder(<?=$id?>)">Add To Cart</button>
               <button class="buy-btn" >Buy Now</button>
            </div>
         </div>
      </div>
      <script>
            let bigImg =document.querySelector('.big-img img');
            function showImg(pic){
               bigImg.src = pic;
            }
      </script>
      <script>
            let sizeButtons = document.querySelectorAll('.psize');

            sizeButtons.forEach(button => {
               button.addEventListener('click', function() {
                  // Xóa class active của tất cả các nút size
                  sizeButtons.forEach(btn => {
                     btn.classList.remove('active');
                  });

                  // Thêm class active vào nút size được chọn
                  this.classList.add('active');
               });
            });
      </script>
      <?php endwhile; ?>
   <?php endif; ?>
</div>
</section>

