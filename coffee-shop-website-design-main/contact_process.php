<?php
    session_start();
    /* Including the file DBConnect.php. */
    include_once 'DBConnect.php';

    $name = $_POST['txtName'];
    $email = $_POST['txtEmail'];
    $phone = $_POST['txtPhone'];
    $subject = $_POST['txtSubject'];
    $message = $_POST['txtMess'];

    $query = "insert into Contact (Name, Email, PhoneNumber, SubjectName, Message) values ('{$name}', '{$email}', '{$phone}', '{$subject}', '{$message}')";
    $rs = mysqli_query($conn, $query);
    if(!$rs):
        die("Nothing to insert!");            
    endif;
    echo 1;
    #Close connection
    mysqli_close($conn);
?>