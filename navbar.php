<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title> LEGROCERY </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <!-- ICON -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- STYLESHEET -->
    <link rel="stylesheet" type="text/css" href="navbar.css">
</head>
<body>
    <!-- NAVBAR -->
    <div class="header-box">
        <nav class="navbar navbar-expand-md">
            <!-- Brand -->
            <a href="index.php" class="logo"><img src="Image/Logo/newlogo.png" height="70" alt="logo" /></a>
            <div class="button-box">
                <!-- Toggler/collapsibe Small Search Button -->
                <button class="navbar-toggler search-icon" type="button" id="small-search-btn"
                    onclick="smallsearchclick()">
                    <span class="fa fa-search" id="small-search-btn-c"></span>
                </button>
                <!-- Toggler/collapsibe Menu Button -->
                <button class="navbar-toggler bar-icon" type="button" data-toggle="collapse"
                    data-target="#collapsibleNavbar" id="menu-bar">
                    <span class="fa fa-bars" id="menu-bar-c"></span>
                </button>
            </div>
            <!-- Navbar text links -->
            <div class="collapse navbar-collapse menu-box menu-toggle-box" id="collapsibleNavbar">
                <div class="navbar-mbox">
                    <ul class="navbar-nav" id="listUser">
                        <li class="nav-item mbox-item">
                            <a class="nav-link" href="index.php">HOME</a>
                        </li>
                        <li class="nav-item mbox-item">
                            <a class="nav-link" href="index.php#special-id">SPECIAL</a>
                        </li>
                        <li class="nav-item mbox-item">
                            <a class="nav-link" href="index.php#aisle-id">AISLE</a>
                        </li>
                        <li class="nav-item mbox-item">
                            <a class="nav-link" href="#footer-id">CONTACT</a>
                        </li>
                        <li class="nav-item mbox-item" style="<?php if(!empty($_SESSION)) {echo "display:block;";} else{echo "display:none;";}?>">
                            <a class="nav-link" href="">Welcome, <?php echo $_SESSION["usernameonnavbar"]; ?>!</a>
                        </li>
                        <li class="nav-item mbox-item nodisplay">
                            <a class="nav-link nodisplay" href="shopping_cart.php">CART</a>
                        </li>
                        <li class="nav-item mbox-item nodisplay" style="<?php if(!empty($_SESSION)) {echo "display:block;";} else{echo "display:none;";}?>">
                            <a class="nav-link nodisplay" href="logout.php">LOG-OUT</a>
                        </li>
                        <li class="nav-item mbox-item nodisplay" style="<?php if(!empty($_SESSION)) {echo "display:none;";} else{echo "display:block;";}?>">
                            <a class="nav-link nodisplay" href="login.php">LOGIN</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
            <!-- Navbar icon links -->
            <div class="collapse navbar-collapse  icon-box" id="collapsibleNavbar">
                <div class="navbar-rbox">
                    <ul class="navbar-nav">
                        <li class="nav-item" style="<?php if(!empty($_SESSION)) {echo "display:none;";} else{echo "display:flex;";}?>; align-items:center;">
                            <a class="nav-link navbar-icon" href="login.php">
                                <div id="login-btn" class="icon-btn" style="font-family: Verdana, sans-serif; font-size:20px;">LOGIN</div>
                            </a>
                        </li>
                        <li class="nav-item" style="<?php if(!empty($_SESSION)) {echo "display:flex;";} else{echo "display:none;";}?>; align-items:center;">
                            <a class="nav-link navbar-icon" href="logout.php">
                                <div id="logout-btn" class="icon-btn" style="font-family: Verdana, sans-serif; font-size:20px;">LOG-OUT</div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navbar-icon" id="big-search-btn" onclick="bigsearchclick()">
                                <div class="fa fa-search icon-btn" id="big-search-btn-c"></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navbar-icon" href="shopping_cart.php">
                                <div id="cart-btn" class="fa fa-shopping-cart icon-btn"></div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class=nav-spacer></div>
    <div id="big-search-bar">
        <form action="#" method="" id="big-search-form">
            <input type="text" placeholder="Search a product...">
            <button type="submit">
                <div class="fa fa-search search-bar-icon-btn"></div>
            </button>
        </form>
    </div>
    <div id="small-search-bar">
        <form action="#" method="" id="small-search-form">
            <input type="text" placeholder="Search a product...">
            <button type="submit">
                <div class="fa fa-search search-bar-icon-btn"></div>
            </button>
        </form>
    </div>
    <!-- NAVBAR -->
    <!-- BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- JS -->
    <script src="navbar.js"></script>
</body>
</html>
 <?php 
    if(isset($_POST['logoutnav'])){
        unset($_SESSION);
        setcookie('PHPSESSID', '', -3600, '/cv');
        session_destroy();
        header('Location: login.php');
        }
?> 
