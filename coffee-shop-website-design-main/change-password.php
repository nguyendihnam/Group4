<?php
    session_start();

    if(!isset($_SESSION['UserID'])):
        header("Location: Signin.php");
    endif;

    include_once 'DBConnect.php';
    $db = $conn;
    $passErr = "";
    if(!isset($_GET['id'])):
        header("location: index.php");
    endif;
    $id = $_GET['id'];

    if (isset($_POST['btnUpdate'])) {
        $passOld = $_POST['txtPass'];
        $passNew = $_POST['txtPassNew'];

        $query = "SELECT Password FROM User WHERE Password ='{$passOld}' AND ID='{$id}'";
        $rs_p = mysqli_query($conn, $query);
        $fields = mysqli_fetch_array($rs_p);
        
        if ($fields > 0) {
            $query_p = "UPDATE User SET Password = '{$passNew}' WHERE ID = '{$id}'";
            $rs = mysqli_query($conn, $query_p);
            if (!$rs) {
                error_clear_last();
                die("Nothing to update!");
            }
            header('location: index.php?success');
        } else {
            $passErr = "Current Password is false";
        }
    }
?>
    <?php include_once 'header.php'?>
    <!-- Contact -->
    <section class="book" id="book">
        <h1 class="heading">Update <span>Change your password</span></h1>
        <?php
        if (isset($_GET['success'])):
            echo '<div class="alert alert-success">Change password successfully</div>';
        endif;
        ?>

        <form method="post" id="form">
            <div class="input-control">
                <p class="input-name">Current password: </p>
                <input type="password" class="box" name="txtPass" id="pass"autocomplete="off">
                <div class="error"><?=$passErr?></div>
            </div>
            
            <div class="input-control">
                <p class="input-name">New password: </p>
                <input type="password" class="box" name="txtPassNew" id="passNew" autocomplete="off">
                <div class="error"></div>
            </div>

            <div class="input-control">
                <p class="input-name">Confirm password: </p>
                <input type="password" class="box" name="txtPass2" id="pass2" autocomplete="off">
                <div class="error"></div>
            </div>
            <br>

            <input readonly name="btnUpdate" style="text-align: center;" value="Update" class="btn update" onclick="showConfirmDialog()">
        </form>
    </section>
    <!-- FOOTER -->
        <?php include_once 'footer.php'?>
    <!-- Check valid -->
</body>

</html>