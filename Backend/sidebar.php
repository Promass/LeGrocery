<!DOCTYPE html>
<html lang="en">

<head>
    <title> LEGROCERY </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <!-- ICON -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- STYLESHEET -->
    <link rel="stylesheet" type="text/css" href="sidebar.css">
</head>

<body onload="toggle()">
    <!-- SIDEBAR -->
    <div id="sidebar">
        <div class="logo-box">
            <a href="home.php"><img id="big-logo" src="../Image/Logo/altlogo.png" alt="LOGO" style="width:150px; margin: auto;" /></a>
        </div>
        <div class="link-box">
            <a href="home.php"><i class="fa fa-home" style="width:50px; padding-left: 7px;"></i>HOME</a>
            <a href="productlist.php"><i class="fa fa-cubes" style="width:50px; padding-left: 5px;"></i>PRODUCTS</a>
            <a href="orderlist.php"><i class="fa fa-truck" style="width:50px; padding-left: 5px;"></i>ORDERS</a>
            <a href="userlist.php"><i class="fa fa-users" style="width:50px; padding-left: 5px;"></i>USERS</a>
            <hr style="border-color:white; width:90%; white-space: nowrap;">
            <a href="../index.php"><i class="fa fa-globe" style="width:50px; padding-left: 5px;"></i>STORE</a>
        </div>
        <div class="user-box">
            <a href="../logout.php"><button id="sign-out-btn" title="Log-out"><?php echo $_SESSION["usernameonnavbar"]?></button></a>
        </div>
    </div>
    <!-- SIDEBAR -->

    <!-- BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SIDEBAR JS -->
    <script src="sidebar.js"></script>
</body>

</html>