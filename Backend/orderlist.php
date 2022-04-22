<?php
session_start();

if (isset($_SESSION["usernameonnavbar"]) && $_SESSION["usernameonnavbar"] == 'admin'){}
else {
    header("location: ../index.php");
}

$_SESSION['action'] = "";
$_SESSION['orderindex'] = "";
$_SESSION['orderid'] = "";
$_SESSION['date'] = "";
$_SESSION['firstname'] = "";
$_SESSION['lastname'] = "";
$_SESSION['item'] = "";
$_SESSION['total'] = "";
$_SESSION['aidxstring'] = "";
$_SESSION['pidxstring'] = "";
$_SESSION['qidxstring'] = "";

$path = "../Database/orderlist.xml";

$xmlfile = file_get_contents($path);

$orderlist = simplexml_load_string($xmlfile);

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    if (isset($_GET['orderindex'])) {

        $orderlist->order[intval($_GET['orderindex'])]->fullfilment = 1;
        file_put_contents($path, $orderlist->asXML());
        unset($_GET['orderindex']);
    }
    unset($_GET['action']);
    header("location: orderlist.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title> LEGROCERY </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- STYLESHEET -->
    <link rel="stylesheet" type="text/css" href="orderlist.css">
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
                    <span>ORDER LIST</span>
                </div>
                <div class="header-box-c">
                    <a href="orderedit.php?action=add"><button id="add-order-btn-s" class="fa fa-plus add-btn" title="Create Order"></button></a>
                    <a href="orderedit.php?action=add"><button id="add-order-btn-l" class="add-btn" title="Create Order">Create Order</button></a>
                </div>
            </div>
            <!-- OBLIGATORY CONTENT -->

            <!-- CONTENT -->

            <div class="container" style="padding: 0px;">
                <div class="content-box">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th class="col-1">ORDER</th>
                                    <th class="col-2">DATE</th>
                                    <th class="col-5">CUSTOMER</th>
                                    <th class="col-2">ITEM(S)</th>
                                    <th class="col-1">TOTAL</th>
                                    <th class="col-1"></th>
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                <?php

                                for ($idx = 0; $idx < $orderlist->order->count(); $idx++) {

                                    if ($orderlist->order[$idx]->fullfilment == 0) {
                                        $oid = $orderlist->order[$idx]->oid;
                                        $date = $orderlist->order[$idx]->date->yy . '-' . $orderlist->order[$idx]->date->mm . '-' . $orderlist->order[$idx]->date->dd;
                                        $firstname = $orderlist->order[$idx]->name->firstname;
                                        $lastname = $orderlist->order[$idx]->name->lastname;
                                        $item = $orderlist->order[$idx]->item;
                                        $total = $orderlist->order[$idx]->total;

                                        echo '

                                            <tr>
                                                <td>' . $oid . '</td>
                                                <td>' . $date . '</td>
                                                <td>' . $firstname . ' ' . $lastname . '</td>
                                                <td>' . $item . '</td>
                                                <td>' . strval(number_format(((floatval($total) * 1.15)), 2, '.', '')). '$</td>
                                                <td class="table-icon">
                                                    <a href="orderedit.php?action=edit&orderindex=' . $idx . '&orderid='.$oid.'&date='.$date.'&firstname='.$firstname.'&lastname='.$lastname.'&item='.$item.'&total='.$total.'">
                                                    <button id="edit-btn"><i class="fa fa-edit" title="Edit"></i></button></a>
                                                    <a href="orderlist.php?action=delete&orderindex=' . $idx . '"><button id="delete-btn"><i class="fa fa-trash" title="Delete"></i></button></a>
                                                </td>
                                            </tr>

                                        ';
                                    }
                                }

                                ?>
                            </tbody>
                        </table>
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