<?php
     #1. Start session
     session_start();
     #2. Connect to database
     include_once 'DBconnect.php';
     #3. Execute query
    $queryCategory = "select * from category ";
    $rsCategory = mysqli_query($conn, $queryCategory);
    $count = mysqli_num_rows($rsCategory);
?>
<?php
    include'./header.php';
    include'./slider.php';  
?>

    <section class="menu" id="menu">
        <div class="menu-container">
            <nav class="menu-category">
                <h3 class="menu-header">
                    <i class="fas fa-list-ul" style="padding-right: 0.8rem;"></i>Category
                </h3>
                <ul class="menu-nav-list">
                    <li class="menu-list-item">
                        <a href="" class="menu-item">Coffee</a>
                    </li>
                </ul>
            </nav>
            <div class="card-container">
                <div class="card">
                    <a href="" class="card-thumbnail">
                        <img src="image/capuccino.jpg" alt="" class="img-thumbnail">
                    </a>
                    <div class="card-text-container">
                        <a href="" class="card-item">
                            <h2 class="card-name">Cappuchino</h2>
                        </a>
                        <p class="card-price">8.99$</p>
                        <p class="card-description">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorum, maxime dolores sunt ad culpa laborum voluptatem fuga accusamus omnis? Suscipit rerum cupiditate distinctio sapiente ad fugit labore, ipsum tenetur dignissimos!</p>
                        <a href="" class="card-btn btn">Add to cart</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
        include'./footer.php';
   ?>
</body>
</html>