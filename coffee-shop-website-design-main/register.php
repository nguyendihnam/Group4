<!DOCTYPE html>
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
        <h1 class="heading">Register <span>become a customer</span></h1>
        <?php
        if (isset($_GET['success'])):
            echo '<div class="alert alert-success">Register Success</div>';
        endif;
        ?>

        <form method="post" action="register_process.php" id="form" onsubmit="return validateInputs()">
            <div class="input-control">
                <input type="text" placeholder="User Name" class="box" name="txtUserName" id="userName" autocomplete="off">
                <div class="error"></div>
            </div>
            
            <div class="input-control">
                <input type="text" placeholder="Email" class="box" name="txtEmail" id="email" autocomplete="off">
                <div class="error"></div>
            </div>
            
            <div class="input-control">
                <input type="text" placeholder="Phone Number" class="box" name="txtPhone" id="phone" autocomplete="off">
                <div class="error"></div>
            </div>

            <div class="input-control">
                <input type="text" placeholder="Address" class="box" name="txtAddress" id="address" autocomplete="off">
                <div class="error"></div>
            </div>

            <div class="input-control">
                <input type="password" placeholder="Password" class="box" name="txtPassword" id="pass" autocomplete="off">
                <div class="error"></div>
            </div>

            <div class="input-control">
                <input type="password" placeholder="Confirm Password" class="box" name="txtPassword" id="pass2" autocomplete="off">
                <div class="error"></div>
            </div>
            <br>

            <input name="btnSend" type="submit" value="send message" class="btn">
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
        const pass = document.getElementById("pass");
        const pass2 = document.getElementById("pass2");

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
            const passValue = pass.value.trim();
            const pass2Value = pass2.value.trim();
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
                setError(phone, 'Phone number max is least 13 digits.');
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

            if(passValue == '') {
                setError(pass, 'Password is required');
                valid = false;
            } else if (passValue.length > 32 || passValue.length < 8) {
                setError(pass, 'Password only have max 32 characters and min 8 characters');
                valid = false;
            } else {
                setSuccess(pass);
            }

            if(pass2Value == '') {
                setError(pass2, 'Please confirm your password');
                valid = false;
            } else if (pass2Value !== passValue){
                setError(pass2, "Password doesn't match");
                valid = false;
            } else {
                setSuccess(pass2);
            }

            return valid;
        };
    </script>
</body>

</html>