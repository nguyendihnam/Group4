<!DOCTYPE html>
<?php
    #1. Start session
    session_start();

    #2. Check session
    // if(!isset($_SESSION['sesAdmin'])):
    //     header("Location: Login.php");
    // endif;
    #3. Connect to database
    include_once 'DBConnect.php';
    
    #4. Get Item Code from Read
    if(!isset($_GET['id'])):
        header("location: index.php");
    endif;
    $id = $_GET['id'];
    
    #5. Execute query  (for old data reading by Item code)
    $query = "select * from User where ID = '{$id}'";
    $rs = mysqli_query($conn, $query);
    $fields = mysqli_fetch_array($rs);
    
    #6. Check form is submitted
    if(isset($_POST['btnUpdate'])):
        #7. Read new data from Input elements
        $userName = $_POST['txtUserName'];
        $email = $_POST['txtEmail'];
        $phone = $_POST['txtPhone'];
        $address = $_POST['txtAddress'];
        
        #8. Excute query (for update new data)
        $query = "update User set Email = '{$email}', PhoneNumber = '{$phone}', Address = '{$address}', UpdateDate = now() where ID = '{$id}'";
        $rs = mysqli_query($conn, $query);
        if(!$rs):
            error_clear_last();
            die("Nothing to update!");            
        endif;
        header("location:index.php");
    endif;
    #9. Close connection
    mysqli_close($conn);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee</title>
    <!-- Font Awesome CDN Link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Custom CSS File Link  -->
    <link rel="stylesheet" href="css/style.css">


</head>

<body>
    <!-- HEADER -->
   <?php
   include 'header.php';
   ?>
    <!-- Contact -->
    <section class="book" id="book">
        <h1 class="heading">Update <span>Change your infomation</span></h1>
        <?php
        if (isset($_GET['success'])):
            echo '<div class="alert alert-success">Register Success</div>';
        endif;
        ?>

        <form method="post" id="form" onsubmit="return validateInputs()">
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

            <input name="btnUpdate" type="submit" value="Update" class="btn" onclick="return confirm('Are you sure to update User <?= $fields[1]?> ?')">
        </form>
    </section>
    <!-- FOOTER -->
    <?php
   include 'footer.php';
   ?>
    <!-- Check valid -->
    <script type=text/javascript>
        const form = document.getElementById("form");
        const userName = document.getElementById("userName");                   
        const email = document.getElementById("email");
        const phone = document.getElementById("phone");
        const address = document.getElementById("address");

        // form.addEventListener('submit', e => {
        //     // e.preventDefault();

        //     return validateInputs();
        // });

        const setError = (element, message) => {
            const inputControl = element.parentElement;
            const errorDisplay = inputControl.querySelector('.error');

            errorDisplay.innerText = message;
            inputControl.classList.add('error');
            inputControl.classList.remove('success')
        }

        const setSuccess = element => {
            const inputControl = element.parentElement;
            const errorDisplay = inputControl.querySelector('.error');

            errorDisplay.innerText = '';
            inputControl.classList.add('success');
            inputControl.classList.remove('error');
        };

        const isValidEmail = email => {
            const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }

        const isValidNumber = number => {
            const re = /^[0-9]+$/;
            var a = re.test(number);
            return a;
        }

        const validateInputs = () => {
            const usernameValue = userName.value.trim();
            const emailValue = email.value.trim();
            const phoneValue = phone.value.trim();
            const addressValue = address.value.trim();
            var valid = true;

            if(usernameValue == '') {
                setError(userName, 'User name is required');
                valid = false;
            } else if (usernameValue.length > 25) {
                setError(userName, 'User name only have below 25 characters');
                valid = false;
            } 
            else {
                setSuccess(userName);
            }

            if(emailValue == '') {
                setError(email, 'Email is required');
                valid = false;
            } else if (!isValidEmail(emailValue)) {
                setError(email, 'Provide a valid email address');
                valid = false;
            } else {
                setSuccess(email);
            }

            if(phoneValue == '') {
                setError(phone, 'Phone is required');
                valid = false;
            } else if (phoneValue.length > 13) {
                setError(phone, 'Phone number max is 13 digits.');
                valid = false;
            } else if (!isValidNumber(phoneValue)) {
                setError(phone, 'Invalid number');
                valid = false;
            } else {
                setSuccess(phone);
            }

            if(addressValue == '') {
                setError(address, 'Address is required');
                valid = false;
            } else {
                setSuccess(address);
            }

            return valid;
        };
    </script>
</body>

</html>