    <?php include_once 'header.php'?>
    <!-- Contact -->
    <section class="book" id="book">
        <h1 class="heading">Contact <span>send us message</span></h1>
        <?php
        if (isset($_GET['success'])):
            echo '<div class="alert alert-success">We will contact to you shortly</div>';
        endif;
        ?>

        <form method="post" action="contact_process.php" id="form" onsubmit="return validContact()">
            <div class="input-control">
                <input type="text" placeholder="Name" class="box" name="txtName" id="name" autocomplete="off">
                <div class="error"></div>
            </div>
            
            <div class="input-control">
                <input type="text" placeholder="Email" class="box" name="txtEmail" id="email" autocomplete="off">
                <div class="error"></div>
            </div>
            
            <div class="input-control">
                <input type="text" placeholder="Phone Number" class="box" name="txtPhone" id="phone" autocomplete="off">
                <div class="error"></div>
            </div>

            <div class="input-control">
                <input type="text" placeholder="Subject" class="box" name="txtSubject" id="subject" autocomplete="off">
                <div class="error"></div>
            </div>

            <div class="input-control">
                <textarea placeholder="Message" class="box" id="mess" name="txtMess" cols="30" rows="8"></textarea>
                <div class="error"></div>
            </div>
            <br>

            <input name="btnSend" type="submit" value="send message" class="btn">
        </form>
    </section>
    <!-- FOOTER -->
    <?php include_once 'footer.php'?>
    <!-- Check valid -->
</body>

</html>