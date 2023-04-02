<?php
    session_start();
    /* Including the file DBConnect.php. */
    include_once 'DBConnect.php';

    /* Check form is submitted*/
    if(isset($_POST['btnSend'])):
        
        #5. Read data from input element
        $userName = $_POST['txtUserName'];
        $email = $_POST['txtEmail'];
        $phone = $_POST['txtPhone'];
        $address = $_POST['txtAddress'];
        $pass = $_POST['txtPassword'];

        $query = 
        "insert into User (UserName, Email, PhoneNumber, Address, Password, RoleID, CreateDate) values ('{$userName}', '{$email}', '{$phone}', '{$address}', '{$pass}', '2', NOW())";
        $rs = mysqli_query($conn, $query);
        if(!$rs):
            die("Nothing to insert!");            
        endif;
        header("location:register.php?success");
    endif; //End check submit
    #Close connection
    mysqli_close($conn);
?>