<?php
    #1. Start session
    session_start();

    #2. Check session
    if(!isset($_SESSION['UserID'])):
        header("Location: Signin.php");
    endif;
    #3. Connect to database
    include_once 'DBConnect.php';
   
    #4. Get Item Code from Read
    if(!isset($_GET['id'])):
        header("location: index.php");
    endif;
    $id = $_GET['id'];
    
    #5. Execute query  (for old data reading by ID code)
    $query = "SELECT * FROM User WHERE ID = '{$id}'";
    $rs = mysqli_query($conn, $query);
    $fields = mysqli_fetch_array($rs);
?>

    <?php include_once 'header.php'?>
    <!-- Contact -->
    <section class="book" id="book">
        <h1 class="heading">Update <span>Change your infomation</span></h1>

        <form method="post" id="form">
            <div class="input-control" hidden>
                <input type="text" placeholder="Email" class="box" name="txtID" id="ID" value="<?= $fields[0] ?>">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <p class="input-name">Email: </p>
                <input type="text" placeholder="Email" class="box" name="txtEmail" id="email" autocomplete="off" value="<?= $fields[2] ?>">
                <div class="error"></div>
            </div>
            
            <div class="input-control">
                <p class="input-name">Phone Number: </p>
                <input type="text" placeholder="Phone Number" class="box" name="txtPhone" id="phone" autocomplete="off" value="<?= $fields[3] ?>">
                <div class="error"></div>
            </div>

            <div class="input-control">
                <p class="input-name">Address: </p>
                <input type="text" placeholder="Address" class="box" name="txtAddress" id="address" autocomplete="off" value="<?= $fields[4] ?>">
                <div class="error"></div>
            </div>
            <br>

            <input readonly style="text-align: center;" name="btnUpdate" value="Update" id="btn-update" class="btn" onclick="return editInfo()">
        </form>
    </section>
    <!-- FOOTER -->
    <?php include_once 'footer.php'?>
    <!-- Check valid -->
    <!-- <script type="text/javascript" src="js/script.js"></script> -->
</body>

</html>