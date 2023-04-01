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
        $query = "update User set UserName = '{$userName}', Email = '{$email}', PhoneNumber = '{$phone}', Address = '{$address}', UpdateDate = now() where ID = '{$id}'";
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
    <header class="header">
        <div id="menu-btn" class="fas fa-bars"></div>

        <a href="#" class="logo">coffee & cake <i class="fas fa-mug-hot"></i></a>

        <nav class="navbar">
            <a href="index.php">home</a>
            <a href="menu.php">menu</a>
            <a href="contact.php">contact</a>
            <a href="about-us.php">about</a>
        </nav>

        <nav class="navbar">
            <a href="#" class="btn">
                <i class="fa fa-cart-arrow-down"></i>
            </a>
            <a href="#" class="btn">Login</a>
            <a href="register.php" class="btn">Register</a>
        </nav>

    </header>
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
                <input type="text" placeholder="User Name" class="box" name="txtUserName" id="userName" autocomplete="off" value="<?= $fields[1] ?>">
                <div class="error"></div>
            </div>
            
            <div class="input-control">
                <input type="text" placeholder="Email" class="box" name="txtEmail" id="email" autocomplete="off" value="<?= $fields[2] ?>">
                <div class="error"></div>
            </div>
            
            <div class="input-control">
                <input type="text" placeholder="Phone Number" class="box" name="txtPhone" id="phone" autocomplete="off" value="<?= $fields[3] ?>">
                <div class="error"></div>
            </div>

            <div class="input-control">
                <input type="text" placeholder="Address" class="box" name="txtAddress" id="address" autocomplete="off" value="<?= $fields[4] ?>">
                <div class="error"></div>
            </div>
            <br>

            <input name="btnUpdate" type="submit" value="Update" class="btn" onclick="return confirm('Are you sure to update User <?= $fields[1]?> ?')">
        </form>
    </section>
    <!-- FOOTER -->
    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>our branches</h3>
                <a href="#"><i class="fas fa-arrow-right"></i> india</a>
                <a href="#"><i class="fas fa-arrow-right"></i> USA</a>
                <a href="#"><i class="fas fa-arrow-right"></i> france</a>
                <a href="#"><i class="fas fa-arrow-right"></i> africa</a>
                <a href="#"><i class="fas fa-arrow-right"></i> japan</a>
            </div>

            <div class="box">
                <h3>quick links</h3>
                <a href="#home"><i class="fas fa-arrow-right"></i> home</a>
                <a href="#about"><i class="fas fa-arrow-right"></i> about</a>
                <a href="#menu"><i class="fas fa-arrow-right"></i> menu</a>
                <a href="#review"><i class="fas fa-arrow-right"></i> review</a>
                <a href="#book"><i class="fas fa-arrow-right"></i> book</a>
            </div>

            <div class="box">
                <h3>contact info</h3>
                <a href="#"><i class="fas fa-phone"></i> +123-456-7890</a>
                <a href="#"><i class="fas fa-phone"></i> +111-222-3333</a>
                <a href="#"><i class="fas fa-envelope"></i> coffee@gmail.com</a>
                <a href="#"><i class="fas fa-envelope"></i> Perú, Lima</a>
            </div>

            <div class="box">
                <h3>contact info</h3>
                <a href="#"><i class="fab fa-facebook-f"></i> facebook</a>
                <a href="#"><i class="fab fa-twitter"></i> twitter</a>
                <a href="#"><i class="fab fa-instagram"></i> instagram</a>
                <a href="#"><i class="fab fa-linkedin"></i> linkedin</a>
            </div>
        </div>

        <div class="credit">created by <span>Group 4</span> | all rights reserved</div>
    </section>
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