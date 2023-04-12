<?php
#1. Start session
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

 #3. Execute query

 $queryCategory = "SELECT * FROM category ";
 $rsCategory = mysqli_query($conn, $queryCategory);
 $countCategory = mysqli_num_rows($rsCategory);

?>

<?php include './header.php'; ?>

<section class="menu" id="menu">
<div class="menu-container">
            <nav class="menu-category">
                    <h3 class="menu-header">
                        <i class="fas fa-list-ul" style="padding-right: 0.8rem;"></i>Category
                    </h3>
                <?php
                    if ($count == 0):
                        echo 'Records not founds';
                    else:
                        while ($fields = mysqli_fetch_array($rsCategory)):
                            ?>
                        <ul class="menu-nav-list">
                            <li class="menu-list-item">
                            <a href="./CategoryID.php?categoryID=<?= $fields[0] ?>" class="menu-item"><?= $fields[1] ?></a>
                            </li>
                        </ul>
                        <?php
                        endwhile;
                    endif;
                ?>
            </nav>
        <div>
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
            <br>
            <p class="card-description-menu"><?= (substr($fields[4], 0, 50) . ' ... ' )?></p><br>  
            <div class="size" > 
            <div class="price">Size :</div>
               <div class="psize <?= $fields[9] == 1 ? 'active' : '' ?>" value="1" > S : <?= $fields[9] ?> </div>
               <div class="psize <?= $fields[10] == 1 ? 'active' : '' ?>" value="2" > M : <?= $fields[10] ?> </div>
               <div class="psize <?= $fields[11] == 1 ? 'active' : '' ?>" value="3" > L : <?= $fields[11] ?> </div>
            </div>
               <div class="quantity">
                  <p>Quantity :</p>
                  <button onclick="decreaseQuantity()"> -</button>
                  <input type="number" min="1" max="10" value="1" id="quantityInput">
                  <button onclick="increaseQuantity()"> +</button>
               </div>

            <div class="btn-box" >
               <button class="cart-btn" >Add To Cart</button>
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
<script>
function decreaseQuantity() {
    var input = document.getElementById('quantityInput');
    if (input.value > 1) {
        input.value = parseInt(input.value) - 1;
    }
}

function increaseQuantity() {
    var input = document.getElementById('quantityInput');
    if (input.value < 10) {
        input.value = parseInt(input.value) + 1;
    }
}

document.getElementById('quantityInput').addEventListener('input', checkQuantity);

function checkQuantity() {
    var input = document.getElementById('quantityInput');
    if (input.value < 1) {
        input.value = 1;
    } else if (input.value > 10) {
        input.value = 10;
    }
}
</script>
</section>

