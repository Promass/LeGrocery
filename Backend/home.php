<?php
session_start();

if (isset($_SESSION["usernameonnavbar"]) && $_SESSION["usernameonnavbar"] == 'admin'){}
else {
    header("location: ../index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title> LEGROCERY </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- STYLESHEET -->
    <link rel="stylesheet" type="text/css" href="home.css">
</head>

<body>
    <!-- SIDEBAR -->
    <?php

    include('sidebar.php');

    ?>
    <!-- SIDEBAR -->

    <!-- OBLIGATORY CONTENT -->
    <div id="wrapper">
        <div class="container">
            <div class="header-box">
                <div class="header-box-c">
                    <button id="menu-btn" class="fa fa-bars" onclick="toggle()"></button>
                    <span>HOME</span>
                </div>
            </div>
            <!-- OBLIGATORY CONTENT -->

            <!-- CONTENT -->
            <div class="container" style="margin-bottom:100px; padding: 0px;">
                <div class="welcome-box-m">
                    <div class="welcome-box">
                        <h1 class="welcome-text">Welcome</h1>
                        <h1 class="welcome-text" id="username"><?php echo $_SESSION["usernameonnavbar"]?></h1>
                    </div>
                </div>
                <div class="container select-box-m">
                    <div class="row">
                        <div class="container-m col-12 col-sm-12 col-md-6 col-ml-4 col-xl-4">
                            <div class="card">
                                <a href="productlist.php"><i class="card-img-top fa fa-cubes"></i></a>
                                <div class="card-body">
                                    <h4 class="card-title">Product List</h4>
                                </div>
                            </div>
                        </div>
                        <div class="container-m col-12 col-sm-12 col-md-6 col-ml-4 col-xl-4">
                            <div class="card">
                                <a href="userlist.php"><i class="card-img-top fa fa-users"></i></a>
                                <div class="card-body">
                                    <h4 class="card-title">User List</h4>
                                </div>
                            </div>
                        </div>
                        <div class="container-m col-12 col-sm-12 col-md-12 col-ml-4 col-xl-4">
                            <div class="card">
                                <a href="orderlist.php"><i class="card-img-top fa fa-truck"></i></a>
                                <div class="card-body">
                                    <h4 class="card-title">Order List</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- CONTENT -->

            <!-- OBLIGATORY CONTENT -->
        </div>
    </div>
    <!-- OBLIGATORY CONTENT -->

</body>

</html>