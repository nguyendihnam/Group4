<?php
    session_start();
    /* Including the file DBConnect.php. */
    include_once 'DBConnect.php';

        #5. Read data from input element
        $UserName = $_POST['UserName'];
        $Password = $_POST['Password'];

        $query = "select 
        ur.ID,
        ur.UserName,
        r.Name
        from user ur
        inner join role r on ur.RoleID = r.ID
        where ur.UserName = '$UserName' and ur.Password = '$Password' and Deleted = 0";
        $rs = mysqli_query($conn, $query);
        if(!$rs){
            die(mysqli_error($rs));
        }
        $count = mysqli_num_rows($rs);
        if($count > 0){
            $field = mysqli_fetch_array($rs);
            $_SESSION['UserID'] =  $field[0];
            $_SESSION['User'] = $field[1];
            $_SESSION['Role'] = $field[2];
            echo 1;
        }
        else
        echo 0;
       
    #Close connection
    mysqli_close($conn);
?>