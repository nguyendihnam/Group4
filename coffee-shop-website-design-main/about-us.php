<?php
    session_start();
    include'./header.php';
    // include'./slider.php';  
?>
    <!-- ABOUT -->
    <section class="about" id="about">
        <h1 class="heading">about us <span>why choose us</span></h1>

        <div class="row">
            <div class="image">
                <img src="image/about-img.png" alt="">
            </div>

            <div class="content">
                <h3 class="title">what's make our coffee special!</h3>
                <p>
                Our coffee is special for three reasons: quality, convenience, and service. We source only the finest beans and roast them to perfection. With branches conveniently located, you can enjoy our coffee wherever you go. Plus, we offer free delivery to bring our delicious coffee right to your doorstep.</p>
                <div class="icons-container">
                    <div class="icons">
                        <img src="image/about-icon-1.png" alt="">
                        <h3>quality coffee</h3>
                    </div>
                    <div class="icons">
                        <img src="image/about-icon-2.png" alt="">
                        <h3>our branches</h3>
                    </div>
                    <div class="icons">
                        <img src="image/about-icon-3.png" alt="">
                        <h3>free delivery</h3>
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