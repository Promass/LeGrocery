<?php
session_start();

$path = "Database/productlist.xml";

$xmlfile = file_get_contents($path);

$productlist = simplexml_load_string($xmlfile);

require_once('functions.php');

$aisleindex = isset($_GET['aisleindex']) ? $_GET['aisleindex'] : redirect();
$aisleindex = intval($aisleindex);
$productindex = isset($_GET['productindex']) ? $_GET['productindex'] : redirect();
$productindex = intval($productindex);

$pid = $productlist->aisle[$aisleindex]->product[$productindex]->pid;
$image  = $productlist->aisle[$aisleindex]->product[$productindex]->image;
$name  = $productlist->aisle[$aisleindex]->product[$productindex]->name;
$amount  = $productlist->aisle[$aisleindex]->product[$productindex]->amount;
$unit  = $productlist->aisle[$aisleindex]->product[$productindex]->unit;
$rating  = $productlist->aisle[$aisleindex]->product[$productindex]->rating;
$price  = $productlist->aisle[$aisleindex]->product[$productindex]->price;
$description  = $productlist->aisle[$aisleindex]->product[$productindex]->description;
$star = "";


?>

<!DOCTYPE html>

<html lang="en">

<head>
    <title> LeGrocery </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- STYLESHEET -->
    <link rel="stylesheet" type="text/css" href="product.css">
</head>

<?php echo '<body onload="initprice('.$pid.')">' ?>

    <!-- NAVBAR -->
    <?php

    include('navbar.php')

    ?>
    <!-- NAVBAR -->

    <!-- OVERVIEW -->
    <div class="container sort-box">
        <div class="sort-box-text">
            Overview
        </div>
    </div>
    <!-- OVERVIEW -->

    <!-- CONTENT -->
    <div class="container" style="padding: 0px ;">
        <div class="row">

            <?php



            for ($idx = 0; $idx < $rating; $idx++) {
                $star .= "<i class=\"fa fa-star\"></i> ";
            }

            for ($idx = 0; $idx < (5 - $rating); $idx++) {
                $star .= "<i class=\"fa fa-star-o\"></i> ";
            }

            echo '
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 image-box">
                    <img class="card-img-top" src="Image/' . $image . '" style=\'height: 100%; width: 100%; object-fit: contain\' alt="product" />
                    </div>

                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 description-box">
                        <div class="description-cbox">
                            <h4 class="class-title">'.$name.'</h4>
                            <p>' . $amount . '</p>
                            <p>' . $star . '</p>
                
                            <div class="m-price-box">
                                <h3>Price:</h3>
                                <div class="c-price-box">
                                    <h3 id="price">' . $price . '</h3>
                                    <h3>$</h3>
                                </div>
                            </div>
                            <hr>
                            <form action="" class="add-quantity">
                                <div class="quantity-btn">
                                    <button type="button" class="fa fa-minus plus-minus" id="minus" onclick="counterOfMinus('.$pid.')"></button>
                                    <div class="m-quantity-box">
                                        <input type="number" value="1" min="1" max="10" id="quantity-box">
                                        <div class="c-quantity-box">
                                            ' . $unit . '(s)
                                        </div>
                                    </div>
                                    <button type="button" class="fa fa-plus plus-minus" id="plus" onclick="counterOfPlus('.$pid.')"></button>
                                </div>
                                <div class="quantity-cart">
                                    <a href="#" class="btn btn-primary" id=quantity-cart>Add to Cart</a>
                                </div>
                                <div class="reset">
                                    <button type="button" class=" btn btn-success " id="resetAll">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>

                ';

            ?>

        </div>
    </div>
    <!-- CONTENT -->

    <!-- DESCRIPTION -->
    <?php

    echo '
            <div class="container more-description" style="padding: 0px;">
                <button data-toggle="collapse" data-target="#product-description">Description</button>
                <div class="collapse toggle-box" id="product-description">
                    ' . $description . '
                </div>
            </div>
        ';

    ?>
    <!-- DESCRIPTION -->

    <!-- FOOTER -->
    <?php

    include('footer.php')

    ?>
    <!-- FOOTER -->

    <!-- PRODUCT QUANTITY COUNTER -->
    <script src="productcounter.js"></script>

</body>

</html>