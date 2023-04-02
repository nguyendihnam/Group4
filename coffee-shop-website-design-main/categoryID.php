<?php
session_start();
include_once 'DBconnect.php';

// Query to get all categories
$queryCategory = "SELECT * FROM Category";
$rsCategory = mysqli_query($conn, $queryCategory);
$countCategory = mysqli_num_rows($rsCategory);

// Query to get products by CategoryID
$queryProduct = "SELECT * FROM Product WHERE Deleted = 0";
if (isset($_GET['categoryID'])) {
    $categoryID = $_GET['categoryID'];
    $queryProduct .= " AND CategoryID = $categoryID";
}
$rsProduct = mysqli_query($conn, $queryProduct);
$countProduct = mysqli_num_rows($rsProduct);

// Loop through categories and display as menu
if ($countCategory == 0):
    echo 'Records not found';
else:
?>
<?php
    include'./header.php';
?>
    <section class="menu" id="menu">
        <div class="menu-container">
            <nav class="menu-category">
                <h3 class="menu-header">
                    <i class="fas fa-list-ul" style="padding-right: 0.8rem;"></i>Category
                </h3>
                <ul class="menu-nav-list">
                <?php while ($category = mysqli_fetch_array($rsCategory)): ?>
                    <li class="menu-list-item">
                        <a href="./CategoryID.php?categoryID=<?= $category['ID'] ?>" class="menu-item"><?= $category['Name'] ?></a>
                    </li>
                <?php endwhile; ?>
                </ul>
            </nav>
            <div  class="card-container">
            <?php
            // Loop through products and display
            if ($countProduct == 0):
                echo 'Records not found';
            else:
                while ($product = mysqli_fetch_array($rsProduct)):
            ?>
                <div class="card">
                    <a href="./image/<?= $product['Image'] ?>" class="card-thumbnail">
                        <img src="image/<?= $product['Thumbnail'] ?>" alt="<?= $product['Name'] ?>" class="img-thumbnail-product">
                    </a>
                    <div class="card-text-container">
                        <a href="./ProductDetails.php?id=<?= $product['ID'] ?>" class="card-item">
                            <h2 class="card-name"><?= $product['Name'] ?></h2>
                        </a>
                        <p class="card-price"><?= $product['S'] ?>$ ~ <?= $product['L'] ?>$</p>
                        <a href="./ProductDetails.php?id=<?= $product['ID'] ?>" class="card-btn btn">Add to cart</a>
                    </div>
                </div>
            <?php
                endwhile;
            endif;
            ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php include './footer.php'; ?>