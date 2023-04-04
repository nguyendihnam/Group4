<?php
    session_start();
    /* Including the file DBConnect.php. */
    include_once 'DBConnect.php';

    /* Check form is submitted*/
    if(isset($_POST['btnSend'])):
        
        #5. Read data from input element
        $UserName = $_POST['UserName'];
        $Password = $_POST['Password'];

        $query = "select * from user where UserName = '$UserName' and Password = '$Password' and Deleted = 0";
        $rs = mysqli_query($conn, $query);
        if(!$rs){
            die(mysqli_error($rs));
        }
        $count = mysqli_num_rows($rs);
        if($count > 0){
            $field = mysqli_fetch_array($rs);
            $_SESSION['UserID'] =  $field[0];
            $_SESSION['User'] = $UserName;
            header("location:menu.php");   
        }
        else{
            header('location:SignIn.php?fail');
        }
        
        
    endif; //End check submit
    #Close connection
    mysqli_close($conn);
?>