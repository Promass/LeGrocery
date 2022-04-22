<?php
session_start();
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <title> LeGrocery </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- STYLESHEET -->
    <link rel="stylesheet" type="text/css" href="aisles.css">
</head>

<body>

    <!-- NAVBAR -->
    <?php

    include('navbar.php')

    ?>
    <!-- NAVBAR -->

    <!-- JUMBOTRON -->
    <div class="big-box">
        <div class="container-fluid text-center">
            <?php

            $path = "Database/productlist.xml";

            $xmlfile = file_get_contents($path);

            $productlist = simplexml_load_string($xmlfile);

            require_once('functions.php');

            $aisleindex = isset($_GET['aisleindex']) ? $_GET['aisleindex'] : redirect();
            $aisleindex = intval($aisleindex);
            $aislename = $productlist->aisle[$aisleindex]->aislename;

            echo '<h1 class="font-weight-bold">' . $aislename . '</h1>';

            ?>
        </div>
    </div>
    <!-- JUMBOTRON -->

    <!-- SORT BY -->
    <div class="container sort-box">
        <div class="sort-box-text">
            Our Products
        </div>
    </div>

    <!-- PRODUCTS -->
    <div class="container">
        <div class="row">

            <?php

            for ($idx = 0; $idx < $productlist->aisle[$aisleindex]->product->count(); $idx++) {

                $pid = $productlist->aisle[$aisleindex]->product[$idx]->pid;
                $image  = $productlist->aisle[$aisleindex]->product[$idx]->image;
                $name  = $productlist->aisle[$aisleindex]->product[$idx]->name;
                $unit  = $productlist->aisle[$aisleindex]->product[$idx]->unit;
                $price  = $productlist->aisle[$aisleindex]->product[$idx]->price;

                echo '
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-3 mt-3">
                        <div class="card">
                            <a href="product.php?aisleindex=' . $aisleindex . '&productindex=' . $idx . '" class=nochange><img calss="card-img-top" src="Image/' . $image . '" alt="product" /></a>
                            <div class="card-body">
                                <h4 class="class-title"><a href="product.php?aidx=' . $aisleindex . '&pidx=' . $idx . '" class=nochange>' . $name . '</a></h4>
                                <p class="card-text">Price: ' . $price . '$ / ' . $unit . '</p>
                                <form action="" class="add-quantity">
                                    <div class="quantity-btn">
                                        <button type="button" class="fa fa-minus plus-minus" onclick="counter(this, \'quantity-box-' . ($idx + 1) . '\', false)"></button>
                                        <input type="number" value="1" min="1" max="10" class="quantity-box" id="quantity-box-' . ($idx + 1) . '">
                                        <button type="button" class="fa fa-plus plus-minus" onclick="counter(this, \'quantity-box-' . ($idx + 1) . '\', true)"></button>
                                    </div>
                                    <div class="quantity-cart">
                                        <a href="#" class="btn btn-primary">Add to Cart</i></a> <!-- PHP -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                ';
            }
            ?>
        </div>
    </div>

    <!-- PRODUCTS -->

    <!-- FOOTER -->
    <?php

    include('footer.php')

    ?>
    <!-- FOOTER -->

    <!-- PRODUCT QUANTITY COUNTER-->
    <script src="aislecounter.js"></script>

</body>

</html>