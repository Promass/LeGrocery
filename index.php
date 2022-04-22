<?php 
session_start();
if (isset($_GET['log_in'])) {
  $_SESSION["log_in"] = false;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title> LEGROCERY </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- STYLESHEET -->
    <link rel="stylesheet" type="text/css" href="index.css">
</head>

<body>
    <!-- NAVBAR -->
    <?php

    include('navbar.php')

    ?>
    <!-- NAVBAR -->
    
    <!-- WELCOME IMAGE -->
    <div class="container-fluid w-img">
        <img src="Image/Home/best.jpg" style="width: 100%; height: 100%; object-fit: cover; position: absolute;
        top: 0px;
        bottom: 0px;
        left: 0px;
        right: 0px; z-index: -1;" />
        <div class="welcome-text">
            <h1>LEGROCERY</h1>
            <h3>Greener Solutions!</h3>
        </div>
    </div>
    <!-- WELCOME IMAGE -->

    <!-- SPECIAL SLIDER -->
    <div id="special-id" class="container" style="margin-bottom: 15px;">
        <div style="display: flex; border-bottom:solid black; border-width: thin; margin-left: 15px;">
            <h2>Today's</h2>
            <pre> </pre>
            <h2 style="color:#009970;">Specials</h2>
        </div>
    </div>
    <div id="slides" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner ">
            <div class="carousel-item active">
                <div class="container slider-box-m">
                    <div class="slider-box-c">
                        <img class="slider-img" src="Image/Slider/slider2.png" />
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container slider-box-m">
                    <div class="slider-box-c">
                        <img class="slider-img" src="Image/Slider/slider1.png" />
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev left-rigt-control" href="#slides" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next left-rigt-control" href="#slides" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
    <!-- SPECIAL SLIDER -->

    <!-- AISLE -->
    <div id="aisle-id" class="container">
        <div style="display: flex; border-bottom:solid black; border-width: thin; margin-left: 15px;">
            <h2>Our</h2>
            <pre> </pre>
            <h2 style="color:#009970;">Aisles</h2>
        </div>
    </div>
    <div class="container" >
        <div class="row">

            <?php

            $path = "Database/productlist.xml";

            $xmlfile = file_get_contents($path);

            $productlist = simplexml_load_string($xmlfile);

            for ($idx = 0; $idx < $productlist->aisle->count(); $idx++) {

                $aislename = $productlist->aisle[$idx]->aislename;
                $aisleimage = $productlist->aisle[$idx]->aisleimage;

                echo '            
                    <div class="col-12 col-sm-12 col-md-6 col-ml-4 col-xl-4 mt-4">
                        <div class="container" style="padding: 0px;">
                            <div class="card">
                                <a href="aisle.php?aisleindex=' . $idx . '"><img class="card-img-top" src="Image/' . $aisleimage . '" alt="Card image"></a>
                                <div class="card-body">
                                    <h4 class="card-title">' . $aislename . '</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                ';
            }

            ?>

        </div>
    </div>
    <!-- AISLE -->

    <!-- BADGES -->
    <div class="container">
        <div class="row">
            <div class="badge col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <img class="badge-img" src="Image/Home/fdaapprouved.png" />
            </div>
            <div class="badge col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <img class="badge-img" src="Image/Home/bestprice.png" />
            </div>
            <div class="badge col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <img class="badge-img" src="Image/Home/gmofree.png" />
            </div>
        </div>
    </div>
    <!-- BADGES -->

    <!-- FOOTER -->
    <?php

    include('footer.php')

    ?>
    <!-- FOOTER -->

</body>

</html>
