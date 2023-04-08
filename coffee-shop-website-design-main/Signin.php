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
   <?php
    include './header.php';
   ?>
    <!-- Contact -->
    <section class="book" id="book">
        <h1 class="heading">Sign In</h1>
        <?php
        if (isset($_GET['fail'])):
            echo '<div class="input-control alert-failed"><h1>Wrong User Name or Password</h1></div>';
        endif;
        ?>

        <form method="post" action="Sign_in_process.php" id="form" onsubmit="return validateInputs()">
            <div class="input-control">
                <h2>User Name</h2>
                <input type="text" placeholder="Name" class="box" name="UserName" id="UserName" >
                <div class="error"></div>
            </div>
            
            <div class="input-control">
                <h2>Password</h2>
                <input type="password" placeholder="Password" class="box" name="Password" id="Password">
                <div class="error"></div>
            </div>
            
            <input name="btnSend" type="submit" value="Sign In" class="btn">
        </form>
    </section>
    <!-- FOOTER -->
    <?php
    include 'footer.php';
    ?>
    <!-- Check valid -->
    <script type=text/javascript>
        const form = document.getElementById("form");
        const UserName = document.getElementById("UseName");                   
        const Password = document.getElementById("Password");
     
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

        const validateInputs = () => {
            const UserNameValue = UserName.value.trim();
            const PassValue = Password.value.trim();
         
            var valid = true;

            if(UserNameValue == '') {
                setError(UserName, 'UserName is required');
                valid = false;
            } else {
                setSuccess(UserName);
            }

            if(PassValue == '') {
                setError(Password, 'Email is required');
                valid = false;
            } else {
                setSuccess(Password);
            }           
            return valid;
        };
    </script>
</body>

</html>