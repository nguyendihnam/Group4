    <?php include_once 'header.php'?>
    <!-- Contact -->
    <section class="book" id="book">
        <h1 class="heading">Register <span>become a customer</span></h1>
        <?php
        if (isset($_GET['success'])):
            echo '<div class="alert alert-success">Register Success</div>';
        endif;
        ?>

        <form method="post" action="register_process.php" id="form">
            <div class="input-control">
                <input type="text" placeholder="User Name" class="box" name="txtUserName" id="userName"
                    autocomplete="off">
                <div class="error">
                </div>
            </div>

            <div class="input-control">
                <input type="text" placeholder="Email" class="box" name="txtEmail" id="email" autocomplete="off">
                <div class="error">
                </div>
            </div>

            <div class="input-control">
                <input type="text" placeholder="Phone Number" class="box" name="txtPhone" id="phone" autocomplete="off">
                <div class="error"></div>
            </div>

            <div class="input-control">
                <input type="text" placeholder="Address" class="box" name="txtAddress" id="address" autocomplete="off">
                <div class="error"></div>
            </div>

            <div class="input-control">
                <input type="password" placeholder="Password" class="box" name="txtPassword" id="pass"
                    autocomplete="off">
                <div class="error"></div>
            </div>

            <div class="input-control">
                <input type="password" placeholder="Confirm Password" class="box" name="txtPassword2" id="pass2"
                    autocomplete="off">
                <div class="error"></div>
            </div>
            <br>

            <input readonly style="text-align: center;" name="btnSend" value="Register" class="btn" onclick="return Register()">
        </form>
    </section>
    <!-- FOOTER -->
   <?php include_once 'footer.php'?>
    <!-- Check valid -->
</body>

</html>