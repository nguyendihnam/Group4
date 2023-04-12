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
        <div class="Signin">
            <div class="input-control">
                    <h2>User Name</h2>
                    <input type="text" placeholder="Name" class="box" name="UserName" id="UserName"  >
                    <div class="error"></div>
                </div>
                
                <div class="nput-control">
                    <h2>Password</h2>
                    <input type="password" placeholder="Password" class="box" name="Password" id="Password">
                    <div class="error"></div>
                </div>
                
                <button name="btnSend" class="btn" onclick="Signin()">Sign In</button>

        </div>
           
      
    </section>
    <!-- FOOTER -->
    <?php
        include 'footer.php'
    ?>
   
</body>

</html>