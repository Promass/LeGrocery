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
                    <span style="white-space: nowrap;">ADD PRODUCT</span>
                </div>
                <div class="header-box-c">
                    <a href=""><button id="add-order-btn-s" class="fa fa-save add-btn" title="Save"></button></a>
                    <a href=""><button id="add-order-btn-l" class="add-btn" title="Save">Save</button></a>
                </div>
            </div>
            <!-- OBLIGATORY CONTENT -->

            <!-- CONTENT -->
            <div class="container">
                <div class="row">

                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 description-box">
                        <div class="description-cbox">
                            <h1 style="margin:auto;">Edit Products</h1>
                            <br><br>
                            <p>
                            <h4>Change existing product</h4>
                            </p>
                            <div>

                                <select name="products" id="products" style="height: 5%; width:100%;">
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
                            <br><br><br>
                            <h4>Add New Product</h4>
                            <br>
                            <div>
                                <form>
                                    <label for="newproduct">Product name:</label><br>
                                    <input type="text" name="newproduct" style="border-radius:4px;">
                                    <br><br>
                                    <form action="/action_page.php">
                                        <label for="filename">Image:</label><br>
                                        <input type="file" id="myFile" name="filename" style="border-radius:5px;">
                                    </form>
                                    <br>
                                    <label for="newdescription">Description:</label>
                                    <textarea id="newdescription" name="newdescription" rows="5" cols="50" style="border-radius:5px;"></textarea>
                                    <br>
                                    <label for="newspecification">Specification:</label>
                                    <textarea id="newspecification" name="newspecification" rows="3" cols="50" style="border-radius:5px;"></textarea>
                                    <br><br>
                                    <div>
                                        <label>Units:</label>
                                        <input type="radio" name="kg" value="Kgs">
                                        <label for="kg">Kgs</label>
                                        <input type="radio" name="grams" value="grams">
                                        <label for="kgs">500 grams</label>
                                        <input type="radio" name="lbs" value="lbs">
                                        <label for="lbs">Lbs</label>
                                    </div>

                                    <br>
                                    <label for="price">Price per unit:</label><br>
                                    <label>$</label>
                                    <input type="number" name="price" style="border-radius:4px;">
                                    <br><br>

                                    <input type="submit" name="submit" value="Submit">
                                </form>
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