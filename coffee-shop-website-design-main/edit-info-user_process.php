<?php
    #1. Start session
    session_start();

    #2. Check session
    // if(!isset($_SESSION['sesAdmin'])):
    //     header("Location: Login.php");
    // endif;
    #3. Connect to database
    include_once 'DBConnect.php';
    // $id = $_GET['id'];
    
    // #5. Execute query  (for old data reading by ID code)
    // $query = "SELECT * FROM User WHERE ID = '{$id}'";
    // $rs = mysqli_query($conn, $query);
    // $fields = mysqli_fetch_array($rs);
    
    #6. Check form is submitted
        #7. Read new data from Input elements
        $id = $_POST['txtID'];
        $email = $_POST['txtEmail'];
        $phone = $_POST['txtPhone'];
        $address = $_POST['txtAddress'];

        $query_e = "SELECT Email FROM User WHERE Email ='{$email}' AND ID !='{$id}'";
        $rs_e = mysqli_query($conn, $query_e);
        $fields_e = mysqli_fetch_array($rs_e);

        if ($fields_e > 0) {
            $emailErr = "Email already taken";
            echo 0;
        } else {
            $query = "update User set Email = '{$email}', PhoneNumber = '{$phone}', Address = '{$address}', UpdateDate = now() where ID = '{$id}'";
            $rs = mysqli_query($conn, $query);
            if (!$rs) {
                error_clear_last();
                die("Nothing to update!");
            }
            echo 1;
        } 
    #9. Close connection
    mysqli_close($conn);
?>