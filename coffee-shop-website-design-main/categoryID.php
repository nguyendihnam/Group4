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
            <div>
            <?php
            // Loop through products and display
            if ($countProduct == 0):
                echo 'Records not found';
            else:
                while ($fields = mysqli_fetch_array($rsProduct)):
            ?>
                <div class="card">
                    <a href="./image/<?= $fields[8] ?>.jpg" class="card-thumbnail">
                        <img src="image/<?= $fields[3] ?>.jpg" alt="<?= $fields[2] ?>" class="img-thumbnail">
                    </a>
                    <div class="card-text-container">
                        <a href="./ProductDetails.php?id=<?= $fields[1] ?>" class="card-item">
                            <h2 class="card-name"><?= $fields[2] ?></h2>
                        </a>
                        <p class="card-price"><?= $fields[9] ?>$ ~ <?= $fields[11] ?>$</p>
                        <a href="./ProductDetails.php?id=<?= $fields[1] ?>" class="card-btn btn">View</a>
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