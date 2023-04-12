<?php
session_start();
/* Including the file DBConnect.php. */
include_once 'DBConnect.php';
$db = $conn;

$userName = $_POST['txtUserName'];
$email = $_POST['txtEmail'];
$phone = $_POST['txtPhone'];
$address = $_POST['txtAddress'];
$pass = $_POST['txtPassword'];

    //User valid
    function uniqueUser($userName)
    {
        global $db;
        $sql_u = "SELECT * FROM User WHERE UserName='{$userName}'";
        $check = mysqli_query($db, $sql_u);

        if ($check->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    function uniqueEmail($email)
    {
        global $db;
        $sql_e = "SELECT * FROM User WHERE Email='{$email}'";
        $check = mysqli_query($db, $sql_e);

        if ($check->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    $checkUser = uniqueUser($userName);
    $checkEmail = uniqueEmail($email);

    if ($checkUser) {
        echo 2;
    } else if ($checkEmail) {
        echo 3;
    } else {
        $query =
            "insert into User (UserName, Email, PhoneNumber, Address, Password, RoleID, CreateDate) values ('{$userName}', '{$email}', '{$phone}', '{$address}', '{$pass}', '2', NOW())";
        $rs = mysqli_query($db, $query);
        if (!$rs):
            die("Nothing to insert!");
        endif;
        echo 1;
    }
    // $sql_u = "SELECT * FROM User WHERE UserName='{$userName}'";
    // $res_u = mysqli_query($conn, $sql_u);        
    // if (mysqli_num_rows($res_u)) {
    //     $userErr = $userName . " is already taken";
    //     return $valid = false;
    // }
    //Email valid
    // $res_e = mysqli_query($conn, $sql_e);
    // if (mysqli_num_rows($res_e)) {
    //     $emailErr = "Email is already exist";
    //     return $valid = false;
    // }
//End check submit
#Close connection
mysqli_close($conn);
?>