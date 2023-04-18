
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
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="./Order.php" class="btn">
                        <i class="fa fa-cart-arrow-down"></i>
                    </a>
                </li>
                <?php 
                if(isset($_SESSION['User'])){          
                    if($_SESSION['Role'] == "User"){

                          
                ?>
                <li class="nav-item has-dropdown">
                    <a href='edit-info-user.php?id=<?=$_SESSION['UserID']?>' clas="btn">Hi <?= $_SESSION['User'] ?></a>
                    <ul class="dropdown">
                        <li class="dropdown-item">
                            <a href="edit-info-user.php?id=<?=$_SESSION['UserID']?>">Change infomation</a>
                        </li>
                        <li class="dropdown-item">
                            <a href="change-password.php?id=<?=$_SESSION['UserID']?>">Change password</a>
                        </li>
                        <li class="dropdown-item">
                            <a href='./Logout.php' clas="btn">Log out</a>
                        </li>
                    </ul>
                </li>
            </ul>
           <?php
                }
                else {
            ?>
                <li class="nav-item has-dropdown">
                    <a href='edit-info-user.php?id=<?=$_SESSION['UserID']?>' clas="btn">Hi <?= $_SESSION['User'] ?></a>
                    <ul class="dropdown">
                        <li class="dropdown-item">
                            <a href="edit-info-user.php?id=<?=$_SESSION['UserID']?>">Change infomation</a>
                        </li>
                        <li class="dropdown-item">
                            <a href="change-password.php?id=<?=$_SESSION['UserID']?>">Change password</a>
                        </li>
                        <li class="dropdown-item">
                            <a href='./Logout.php' clas="btn">Log out</a>
                        </li>
                    </ul>
                </li>
                <a href='./admin_panel/index.php' clas="btn">Admin Page</a>
            <?php
                }
            }    
                else {
            ?>
                <li class="nav-item">
                    <a href="./SignIn.php" class="btn">Login</a>
                </li>
                <li class="nav-item">
                    <a href="./register-user.php" class="btn">Register</a>
                </li>
            <?php
                }
            ?>
            
        </nav>
        
    </header>