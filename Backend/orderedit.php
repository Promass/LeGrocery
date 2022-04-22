<?php
session_start();

if (isset($_SESSION["usernameonnavbar"]) && $_SESSION["usernameonnavbar"] == 'admin'){}
else {
    header("location: ../index.php");
}

$orderpath = "../Database/orderlist.xml";
$productpath = "../Database/productlist.xml";

$orderfile = file_get_contents($orderpath);
$productfile = file_get_contents($productpath);

$orderlist = simplexml_load_string($orderfile);
$productlist = simplexml_load_string($productfile);

if (isset($_GET['orderindex']) && $_GET['orderindex'] != "") {
    $_SESSION['orderindex'] = $_GET['orderindex'];
}

if (isset($_GET['action']) && $_GET['action'] == 'edit') {
    $_SESSION['action'] = 'edit';
    $orderindex =  intval($_GET['orderindex']);
    
    $aidxstring = strval($orderlist->order[$orderindex]->itemlist->aidx);
    $pidxstring = strval($orderlist->order[$orderindex]->itemlist->pidx);
    $qidxstring = strval($orderlist->order[$orderindex]->itemlist->qidx);

    $_SESSION['aidxstring'] = $aidxstring;
    $_SESSION['pidxstring'] = $pidxstring;
    $_SESSION['qidxstring'] = $qidxstring;
}

else if (isset($_GET['action']) && $_GET['action'] == 'add') {
    $_SESSION['action'] = 'add';

    $_SESSION['orderid'] = intval($orderlist->oidcounter) + 1;
    $day = date('j');
    $day = (($day < 10) ? '0' : '') . number_format($day, 0);
    $month = date('n');
    $month = (($month < 10) ? '0' : '') . number_format($month, 0);
    $year = date('Y');
    $_SESSION['date'] = $year . '-' . $month . '-' . $day;
    $_SESSION['firstname'] = "";
    $_SESSION['lastname'] = "";
    $_SESSION['aidxstring'] = null;
    $_SESSION['pidxstring'] = null;
    $_SESSION['qidxstring'] = null;
}

if (isset($_GET['orderid']) && $_GET['orderid'] != "") {
    $_SESSION['orderid'] = $_GET['orderid'];
}

if (isset($_GET['date']) && $_GET['date'] != "") {
    $_SESSION['date'] = $_GET['date'];
}

if (isset($_GET['firstname']) && $_GET['firstname'] != "") {
    $_SESSION['firstname'] = $_GET['firstname'];
}

if (isset($_GET['lastname']) && $_GET['lastname'] != "") {
    $_SESSION['lastname'] = $_GET['lastname'];
}

if (isset($_GET['item']) && $_GET['item'] != "") {
    $_SESSION['item'] = $_GET['item'];
}

if (isset($_GET['total']) && $_GET['total'] != "") {
    $_SESSION['total'] = $_GET['total'];
}

if ($_SESSION['aidxstring'] != "") {
    $aidxarray = explode(',', $_SESSION['aidxstring']);
}
else {
    $aidxarray = array();
}

if ($_SESSION['pidxstring'] != "") {
    $pidxarray = explode(',', $_SESSION['pidxstring']);
}
else {
    $pidxarray = array();
}

if ($_SESSION['qidxstring'] != "") {
    $qidxarray = explode(',', $_SESSION['qidxstring']);
}
else {
    $qidxarray = array();
}

if (isset($_GET['action']) && $_GET['action'] == 'additem' && $_GET['productid'] != "") {
    for ($aidx = 0; $aidx < $productlist->aisle->count(); $aidx++) {
        for ($pidx = 0; $pidx < $productlist->aisle[$aidx]->product->count(); $pidx++) {
            if (intval($productlist->aisle[$aidx]->product[$pidx]->pid) == intval($_GET['productid'])) {
                if ($_SESSION['aidxstring'] == "" && $_SESSION['pidxstring'] == "" && $_SESSION['qidxstring'] == "") {
                    $_SESSION['aidxstring'] .= strval($aidx);
                    $_SESSION['pidxstring'] .= strval($pidx);
                    $_SESSION['qidxstring'] .= $_GET['quantity'];
                    priceadd($productlist, $aidx, $pidx, $_GET['quantity']);
                    itemadd($_GET['quantity']);
                } else {
                    $_SESSION['aidxstring'] .= ',' . strval($aidx);
                    $_SESSION['pidxstring'] .= ',' . strval($pidx);
                    $_SESSION['qidxstring'] .= ',' . $_GET['quantity'];
                    priceadd($productlist, $aidx, $pidx, $_GET['quantity']);
                    itemadd($_GET['quantity']);
                }
            }
        }
    }
}

else if (isset($_GET['action']) && $_GET['action'] == 'save') {
    if ($_SESSION['action'] == 'edit') {
        $orderindex =  intval($_SESSION['orderindex']);
        $orderlist->order[$orderindex]->date->yy = explode('-', $_SESSION['date'])[0];
        $orderlist->order[$orderindex]->date->mm = explode('-', $_SESSION['date'])[1];
        $orderlist->order[$orderindex]->date->dd = explode('-', $_SESSION['date'])[2];
        $orderlist->order[$orderindex]->name->firstname = $_SESSION['firstname'];
        $orderlist->order[$orderindex]->name->lastname = $_SESSION['lastname'];
        $orderlist->order[$orderindex]->item = $_SESSION['item'];
        $orderlist->order[$orderindex]->total = $_SESSION['total'];
        $orderlist->order[$orderindex]->itemlist->aidx = $_SESSION['aidxstring'];
        $orderlist->order[$orderindex]->itemlist->pidx = $_SESSION['pidxstring'];
        $orderlist->order[$orderindex]->itemlist->qidx = $_SESSION['qidxstring'];
        file_put_contents($orderpath, $orderlist->asXML());
        header("location: orderlist.php");
    }
    else if ($_SESSION['action'] == 'add') {
        $orderlist->oidcounter = (intval($orderlist->oidcounter) + 1);
        $order = $orderlist->addChild('order');

        $order->addChild('oid', $_SESSION['orderid']);
        $datechild = $order->addChild('date');
        $datechild->addChild('dd', explode('-', $_SESSION['date'])[2]);
        $datechild->addChild('mm', explode('-', $_SESSION['date'])[1]);
        $datechild->addChild('yy', explode('-', $_SESSION['date'])[0]);
        $namechild = $order->addChild('name');
        $namechild->addChild('firstname', $_SESSION['firstname']);
        $namechild->addChild('lastname', $_SESSION['lastname']);
        $order->addChild('item', $_SESSION['item']);
        $order->addChild('total', $_SESSION['total']);
        $itemlistchild = $order->addChild('itemlist');
        $itemlistchild->addChild('aidx', $_SESSION['aidxstring']);
        $itemlistchild->addChild('pidx', $_SESSION['pidxstring']);
        $itemlistchild->addChild('qidx', $_SESSION['qidxstring']);
        $order->addChild('fullfilment', '0');

        file_put_contents($orderpath, $orderlist->asXML());
        header("location: orderlist.php");
    }
}

else if (isset($_GET['action']) && $_GET['action'] == 'deleteitem') {
    $aarr = explode(',', $_SESSION['aidxstring']);
    $parr = explode(',', $_SESSION['pidxstring']);
    $qarr = explode(',', $_SESSION['qidxstring']);

    pricedel($qarr[intval($_GET['deleteindex'])], $_GET['deleteprice']);
    itemdel($qarr[intval($_GET['deleteindex'])]);

    unset($aarr[intval($_GET['deleteindex'])]);
    $_SESSION['aidxstring'] = implode(',', $aarr);

    unset($parr[intval($_GET['deleteindex'])]);
    $_SESSION['pidxstring'] = implode(',', $parr);

    unset($qarr[intval($_GET['deleteindex'])]);
    $_SESSION['qidxstring'] = implode(',', $qarr);
}

if (isset($_GET['action']) && ($_GET['action'] == 'additem' || $_GET['action'] == 'deleteitem')) {
    header("location: orderedit.php");
}

function priceadd ($list, $a, $p, $q) {
    $_SESSION['total'] = strval(number_format((floatval($_SESSION['total']) + (floatval($list->aisle[$a]->product[$p]->price) * floatval($q))), 2, '.', ''));
}

function itemadd ($n) {
    $_SESSION['item'] = strval(floatval($_SESSION['item']) + floatval($n));
}

function pricedel ($dq, $dp) {
    $_SESSION['total'] = strval(number_format((floatval($_SESSION['total']) - (floatval($dp) * floatval($dq))), 2, '.', ''));
}

function itemdel ($dqq) {
    $_SESSION['item'] = strval(floatval($_SESSION['item']) - floatval($dqq));
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title> LEGROCERY </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- STYLESHEET -->
    <link rel="stylesheet" type="text/css" href="orderedit.css">
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
                    <?php

                    echo '<span>ORDER ID: ' . $_SESSION['orderid'] . '</span>';

                    ?>
                </div>
                <div class="header-box-c">
                    <a href="orderedit.php?action=save"><button id="add-order-btn-s" class="fa fa-save add-btn" title="Save"></button></a>
                    <a href="orderedit.php?action=save"><button id="add-order-btn-l" class="add-btn" title="Save">Save</button></a>
                </div>
            </div>
            <!-- OBLIGATORY CONTENT -->

            <!-- CONTENT -->
            <form id="additemform" method="get" action="orderedit.php"></form>

            <div class="info-box">
                <div class="info-head">
                    Order Information
                </div>

                <?php

                echo '
                    <div class="info-text">
                        <div class="name-box">
                            <div>
                                <label for="fname">First name:</label>
                                <input form="additemform" type="text" id="fname" name="firstname" size="21" value="' . $_SESSION['firstname'] . '">
                            </div>
                            <div>
                                <label for="lname">Last name:</label>
                                <input form="additemform" type="text" id="lname" name="lastname" size="21" value="' . $_SESSION['lastname'] . '">
                            </div>
                        </div>
                        <label for="date">Date:</label>
                        <input form="additemform" type="date" id="date" name="date" value="' . $_SESSION['date'] . '">
                        <div class="span">Number of Item(s): '.$_SESSION['item'].'</div>
                        <div class="span">Total Price: '.strval(number_format(((floatval($_SESSION['total']) * 1.15)), 2, '.', '')).'</div>
                    </div>
                ';

                ?>

            </div>

            <div class="item-box">
                <div class="info-head">
                    Item(s)
                </div>
                <div class="item-table">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th class="col-1">PID</th>
                                    <th class="col-1"></th>
                                    <th class="col-5">NAME</th>
                                    <th class="col-3">QUANTITY</th>
                                    <th class="col-1">PRICE</th>
                                    <th class="col-1"></th>
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                <?php

                                for ($idx = 0; $idx < sizeof($aidxarray); $idx++) {
                                    $item = $productlist->aisle[intval($aidxarray[$idx])]->product[intval($pidxarray[$idx])];
                                    echo '
                                        <tr>
                                            <td style="padding: 12px 0px 12px 12px;">' . $item->pid . '</td>
                                            <td style="padding: 0px 12px 0px 0px;"><img src="../Image/' . $item->image . '" style="height: 50px; width: 50px; object-fit: contain;"></td>
                                            <td>' . $item->name . '</td>
                                            <td>' . $qidxarray[$idx] . '</td>
                                            <td>' . $item->price . '</td>
                                            <td class="table-icon" style="height:67px;">
                                                <a href="orderedit.php?action=deleteitem&deleteindex='.$idx.'&deleteprice='.$item->price.'"><button id="delete-btn"><i class="fa fa-trash" title="Delete"></i></button></a>
                                            </td>
                                        </tr>
                                    ';
                                }

                                ?>

                            </tbody>
                        </table>
                    </div>



                    <div class="add-box">
                        <div class="add-box-c" style="margin-bottom:15px; max-height:35.98px">
                            <div class="quantity-btn">
                                <button type="button" class="fa fa-minus plus-minus" onclick="counter(this, 'quantity-box', false)"></button>
                                <input form="additemform" type="hidden" name="action" value="additem">
                                <input form="additemform" name="quantity" value="1" type="number" min="1" id="quantity-box">
                                <button type="button" class="fa fa-plus plus-minus" onclick="counter(this, 'quantity-box', true)"></button>
                            </div>
                        </div>
                        <div class="add-box-c">
                            <label form="additemform" for="pid" style="margin: 0px 5px 0px 0px;">Product ID:</label>
                            <input form="additemform" type="text" id="pid" name="productid" size="5" style="padding-left: 3px; border-radius: 5px; border: none; margin: 0px 8px 0px 0px;">
                            <button form="additemform" id="pidbtn" title="Add">Add</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CONTENT -->

            <!-- OBLIGATORY CONTENT -->
        </div>
    </div>
    <!-- OBLIGATORY CONTENT -->

    <script src="../aislecounter.js"></script>
</body>

</html>