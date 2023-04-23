<?php
        #1. Start session
    session_start();
    #2. Connect to database
    include_once 'DBconnect.php';
    #3. Execute query

    $queryCategory = "SELECT * FROM category ";
    $rsCategory = mysqli_query($conn, $queryCategory);
    $countCategory = mysqli_num_rows($rsCategory);

    $queryProduct = "SELECT * FROM product WHERE Deleted = 0 ORDER BY ID DESC LIMIT 6";
    $rsProduct = mysqli_query($conn, $queryProduct);
    $countProduct = mysqli_num_rows($rsProduct);

    if(isset($_GET['btnSearch'])):
    $search = $_GET['txtSearch'];
    $queryProduct = "SELECT * FROM product WHERE Name LIKE '%{$search}%'";
    $rsProduct = mysqli_query($conn, $queryProduct);
    $countProduct = mysqli_num_rows($rsProduct);
    endif;

    $count = mysqli_num_rows($rsCategory); // Define $count here
            ?>
    <?php
        include'./header.php';
        // include'./slider.php';  
    ?>

    <section class="menu" id="menu" >
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
            <div class="card-container" >
            <?php
                if ($count == 0):
                    echo 'Records not founds';
                else:
                    while ($fields = mysqli_fetch_array($rsProduct)):
                        ?>
                    <div class="card">
                        <a href="./image/<?= $fields[8] ?>.jpg" class="card-thumbnail">
                            <img src="image/<?= $fields[8] ?>.jpg" alt="<?= $fields[2] ?>" class="img-thumbnail">
                        </a>
                        <div class="card-text-container">
                            <a href="<?= $fields[8] ?>.jpg" class="card-item">
                                <h2 class="card-name"><?= $fields[2] ?></h2>
                            </a>
                            <p class="card-price"><?= $fields[9] ?>$ ~ <?= $fields[11] ?>$</p>
                            
                            <a href="./ProductDetails.php?id=<?= $fields[0] ?>" class="view-btn btn">View</a>
                        </div>
                    </div>
                    <?php
                    endwhile;
                endif;
            ?>
                </div>
        </div>
    
    </section>
        <?php
            include'./footer.php';
    ?>