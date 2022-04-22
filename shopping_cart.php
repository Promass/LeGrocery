<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Shopping Cart</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- STYLESHEET -->
    <link rel="stylesheet" href="shopping_cart.css">
</head>

<body>
    <!-- NAVBAR -->
    <?php

    include('navbar.php')

    ?>
    <!-- NAVBAR -->

    <!-- shopping cart-->

    <!-- TEST -->

    <div class="cart">
        <h1>Shopping Cart</h1>
        <div class="row">
            <div class="table-responsive-md col-md-9">
                <table class="table">
                    <thead class="thread-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Item</th>
                            <th scope="col">Description</th>
                            <th scope="col">Quantity</th>
                            <th class="unit-prices" scope="col">Price/Unit</th>
                            <th scope="col">Price</th>
                            <th scope="col"></th>
                        </tr>
                        </thread>

                        <!--Item 1 -->
                    <tbody>
                        <tr>
                            <th class="align-middle" scope="row">1</th>
                            <td class="align-middle"><img src="Image/Bakery/baguetteImage.jpg" alt="baguette" class="cart-images"></td>
                            <td class="align-middle">Baguette Loaf</td>
                            <td class="align-middle">
                                <form action="" class="add-quantity">
                                    <div class="quantity-btn">

                                        <button type="button" class="fa fa-minus plus-minus" onclick="counter(this, 'quantity-box-1', false)"></button>
                                        <input type="number" value="1" min="1" max="10" id="quantity-box-1">
                                        <button type="button" class="fa fa-plus plus-minus" onclick="counter(this, 'quantity-box-1', true)"></button>




                                    </div>
                                </form>
                            </td>
                            <td class="align-middle unit-prices" id="price-1">3.99</td>
                            <td class="align-middle" id="cart-item-price1">3.99</td>
                            <!-- <td class="align-middle"><button type="button" class="btn-close"
                                    aria-label="Close">X</button></td> -->
                        </tr>
                    </tbody>

                    <!--Item 2 -->
                    <tbody>
                        <tr>
                            <th class="align-middle" scope="row">2</th>
                            <td class="align-middle"><img src="Image/Bakery/croissantImage.jpg" alt="croissant" class="cart-images"></td>
                            <td class="align-middle">Croissant</td>
                            <td class="align-middle">
                                <form action="" class="add-quantity">
                                    <div class="quantity-btn">

                                        <button type="button" class="fa fa-minus plus-minus" onclick="counter(this, 'quantity-box-2', false)"></button>
                                        <input type="number" value="1" min="1" max="10" id="quantity-box-2">
                                        <button type="button" class="fa fa-plus plus-minus" onclick="counter(this, 'quantity-box-2', true)"></button>

                                    </div>
                                </form>
                            </td>
                            <td class="align-middle unit-prices" id="price-2">4.99</td>
                            <td class="align-middle" id="cart-item-price2">4.99</td>
                            <!--<td class="align-middle"><button type="button" class="btn-close"
                                    aria-label="Close">X</button></td> -->
                        </tr>
                    </tbody>

                    <!--Item 3 -->
                    <tbody>
                        <tr>
                            <th class="align-middle " scope="row">3</th>
                            <td class="align-middle"><img src="Image/Bakery/chocoCroissantImage.png" alt="Chocolate Croissant" class="cart-images"></td>
                            <td class="align-middle">Chocolate Croissant</td>
                            <td class="align-middle">
                                <form action="" class="add-quantity">
                                    <div class="quantity-btn">
                                        <button type="button" class="fa fa-minus plus-minus" onclick="counter(this, 'quantity-box-3', false)"></button>
                                        <input type="number" value="1" min="1" max="10" id="quantity-box-3">
                                        <button type="button" class="fa fa-plus plus-minus" onclick="counter(this, 'quantity-box-3', true)"></button>
                                    </div>
                                </form>
                            </td>
                            <td class="align-middle unit-prices" id="price-3">4.99</td>
                            <td class="align-middle" id="cart-item-price3">4.99</td>
                            <!-- <td class="align-middle"><button type="button" class="btn-close"
                                    aria-label="Close">X</button></td> -->
                        </tr>
                    </tbody>

                </table>
            </div>
            <div class="table-responsive col-md-3">
                <table class="table-dark cart-total">
                    <tbody>
                        <tr>
                            <th class="align-middle" scope="row"></th>
                            <th class="align-middle" scope="row"></th>
                            <th class="align-middle" scope="row"></th>
                            <th class="align-middle" scope="row">Total Items:</th>
                            <th class="align-middle" scope="row"></th>
                            <th class="align-middle" scope="row" id="cart-total-items">3</th>
                        </tr>
                    </tbody>

                    <tbody>
                        <tr>
                            <th class="align-middle" scope="row"></th>
                            <th class="align-middle" scope="row"></th>
                            <th class="align-middle" scope="row"></th>
                            <th class="align-middle" scope="row">Subtotal:</th>
                            <th class="align-middle" scope="row"></th>
                            <th class="align-middle subtotal" scope="row" id="cart-subtotal">13.97</th>
                        </tr>
                    </tbody>

                    <tbody>
                        <tr>
                            <th class="align-middle" scope="row"></th>
                            <th class="align-middle" scope="row"></th>
                            <th class="align-middle" scope="row"></th>
                            <th class="align-middle" scope="row">GST:</th>
                            <th class="align-middle" scope="row"></th>
                            <th class="align-middle tax" scope="row" id="cart-gst">0.70</th>
                        </tr>
                    </tbody>

                    <tbody>
                        <tr>
                            <th class="align-middle" scope="row"></th>
                            <th class="align-middle" scope="row"></th>
                            <th class="align-middle" scope="row"></th>
                            <th class="align-middle" scope="row">QST:</th>
                            <th class="align-middle" scope="row"></th>
                            <th class="align-middle tax" scope="row" id="cart-qst">1.40</th>
                        </tr>
                    </tbody>

                    <tbody>
                        <tr>
                            <th class="align-middle" scope="row"></th>
                            <th class="align-middle" scope="row"></th>
                            <th class="align-middle" scope="row"></th>
                            <th class="align-middle" scope="row">Total:</th>
                            <th class="align-middle" scope="row"></th>
                            <th class="align-middle total" scope="row" id="cart-total">16.07</th>
                        </tr>
                    </tbody>

                    <tbody>
                        <tr>
                            <th class="align-middle" scope="row"></th>
                            <th class="align-middle" scope="row"></th>
                            <th class="align-middle" scope="row"></th>
                            <th class="align-middle" scope="row"></th>
                            <th class="align-middle" scope="row"></th>
                            <td class="align-middle"><button type="button" class="btn-checkout" onclick="checkout()" aria-label="Checkout">Checkout</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <?php

    include('footer.php')

    ?>
    <!-- FOOTER -->

    <!-- CART JS-->
    <script src="cart.js"></script>
</body>

</html>