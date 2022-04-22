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
    <title> LeGrocery </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <span style="white-space: nowrap;">PRODUCT LIST</span>
                </div>
                <div class="header-box-c">
                    <a href="productedit.php"><button id="add-order-btn-s" class="fa fa-plus add-btn" title="Add Product"></button></a>
                    <a href="productedit.php"><button id="add-order-btn-l" class="add-btn" title="Add Product">Add Product</button></a>
                </div>
            </div>
            <!-- OBLIGATORY CONTENT -->

            <!-- CONTENT -->
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 description-box">
                        <div class="description-cbox">
                            <h1 style="margin:auto;">Product List</h1>
                            <br>
                            <div>
                                <select name="products" id="products" style="height: 5%; width:100%; font-size: 10px;">
                                    <option value="" disabled selected>Select your option</option>
                                    <option value="steak">Ribeye Steak</option>
                                    <option value="Bacon">Bacon</option>
                                    <option value="Salmon">Salmon</option>
                                    <option value="Porkchop">Porkchop</option>
                                    <option value="Chicken">Chicken</option>
                                    <option value="cocacola">Cocacola</option>
                                    <option value="drpepper">Dr Pepper</option>
                                    <option value="Fanta">Fanta</option>
                                    <option value="mtndew">Mtndew</option>
                                    <option value="Sprite">Sprite</option>
                                    <option value="Rice">rice</option>
                                </select>
                            </div>
                            </form>
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