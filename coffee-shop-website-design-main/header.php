
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee</title>

    <!-- Font Awesome CDN Link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- J Query -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <!-- Custom CSS File Link  -->
    <link rel="stylesheet" href="css/style.css">
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="./js/script.js"></script>   
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <!-- HEADER -->
    <header class="header">
        <div id="menu-btn" class="fas fa-bars"></div>

        <a href="./index.php" class="logo">coffee & cake <i class="fas fa-mug-hot"></i></a>

        <nav class="navbar">
            <a href="index.php">home</a>
            <a href="menu.php">menu</a>
            <a href="contact.php">contact</a>
            <a href="about-us.php">about</a>
            <a href="UserOrder.php" >order</a>
        </nav>

        <nav class="navbar">
            <a href="./Order.php" class="btn">
                <i class="fa fa-cart-arrow-down"></i>
            </a>
            <?php 
                if(isset($_SESSION['User'])){          
                    if($_SESSION['Role'] == "User"){

                          
            ?>
           <a href='edit-info-user.php?id=<?=$_SESSION['UserID']?>' clas="btn">Xin chào <?= $_SESSION['User'] ?></a>
            <a href='./Logout.php' clas="btn">Log out</a>
            <?php
            }
            else {
                ?>
           <a href='edit-info-user.php?id=<?=$_SESSION['UserID']?>' clas="btn">Xin chào <?= $_SESSION['User'] ?></a>
           <a href='./admin_panel/index.php' clas="btn">Admin Page</a>
            <a href='./Logout.php' clas="btn">Log out</a>
            <?php
            }
        } 
        else {
            ?>
             <a href="./SignIn.php" class="btn">Login</a>
        <a href="./admin_panel/index.php" class="btn">Register</a>
        <?php
        }
        ?>
            
        </nav>
        
    </header>