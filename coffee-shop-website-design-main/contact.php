    <?php session_start()?>
    <?php include_once 'header.php'?>
    <!-- Contact -->
    <section class="book" id="book">
        <h1 class="heading">Contact <span>send us message</span></h1>

        <form method="post" id="form">
            <p style="color: red; font-size: 1.4rem;">* All fields are required</p>
            <div class="input-control">
                <input type="text" placeholder="Name" class="box" name="txtName" id="nameFull" autocomplete="off">
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

            <input readonly name="btnSend" style="text-align: center" value="send message" class="btn" onclick="sendContact()">
        </form>
    </section>
    <!-- FOOTER -->
    <?php include_once 'footer.php'?>
    <!-- Check valid -->
</body>

</html>