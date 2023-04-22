
 <?php
#1. Start sessio

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
 
 
 $queryCategory = "SELECT * FROM category ";
 $rsCategory = mysqli_query($conn, $queryCategory);
 $countCategory = mysqli_num_rows($rsCategory);
 ?>
 
 <?php include './header.php'; ?>
<!-- <link href='https://unpkg.com/css.gg@2.0.0/icons/css/coffee.css' rel='stylesheet'> -->

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
            <div class="url" ><span style="font-size: 18px;"><a href="./index.php"> Home </a> > <a href="./menu.php" > Menu </a> > <?= $fields[2] ?></div></span>
            <div class="pname" ><?= $fields[2] ?></div>
            <p class="card-description-menu"><?= (substr($fields[4], 0, 100) . ' ... ' )?></p><br>  
            <i class="gg-coffee"></i>
            <div class="size" > 
            <div class="price">Size :</div>
               <div id="S" class="psize <?= $fields[9] == 1 ? 'active' : '' ?>" value="1" >S : <?= $fields[9] ?>$ </div>
               <div id="M" class="psize <?= $fields[10] == 1 ? 'active' : '' ?>" value="2">M : <?= $fields[10] ?>$ </div>
               <div id="L" class="psize <?= $fields[11] == 1 ? 'active' : '' ?>" value="3">L : <?= $fields[11] ?>$ </div>
            </div>
            <div class="quantity">
                   <p>Quantity :</p>
                  <button type="submit" onclick="decreaseQuantity()" class="quantitybutton" > - </button>
                  <input type="number" min="1" max="30" value="1" id="Qty" >
                  <button onclick="increaseQuantity()" class="quantitybutton"> + </button>
                </div>
      <?php
         if(isset($_SESSION['User'])){
            ?>
         
         <div class="btn-box" >
               <button class="cart-btn" onclick="AddOrder(<?=$id?>)">Add To Cart</button>
            </div>
         <?php
         }
         else{
            ?>
             <div class="btn-box" >
               <a href="Signin.php" class="Order-btn">Please Login To Add Product</a>
            </div>
         <?php  
         }
      ?>
      
               
          </div>
       </div>
       <?php
       endwhile;
     endif; ?>
 </div>
<script>
function decreaseQuantity() {
    var input = document.getElementById('Qty');
    if (input.value > 1) {
        input.value = parseInt(input.value) - 1;
    }
}

function increaseQuantity() {
    var input = document.getElementById('Qty');
    if (input.value < 30) {
        input.value = parseInt(input.value) + 1;
    }
}


function checkQuantityInput() {
    var input = document.getElementById('Qty');
    if (input.value < 1) {
        input.value = 1;
    } else if (input.value > 30) {
        input.value = 30;
    }
}

document.getElementById('Qty').addEventListener('input', checkQuantityInput);

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
            let bigImg =document.querySelector('.big-img img');
            function showImg(pic){
               bigImg.src = pic;
            }  
</script>

 </section>
 
