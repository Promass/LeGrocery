<!DOCTYPE html>
<html lang="en">

<head>
    <title> LEGROCERY </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        button {
            margin: 4px;

        }

        .addBtn {
            padding: 5px 51px;
        }
    </style>
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
                    <span>USER LIST</span>
                </div>
                <div class="header-box-c">
                    <button id="add-order-btn-s" class="fa fa-plus add-btn" title="Add User"></button>
                    <button id="add-order-btn-l" class="add-btn" title="Add User">Add User</button>
                </div>
            </div>
            <!-- OBLIGATORY CONTENT -->

            <!-- CONTENT -->
            <div class="container" style="background-color: white;">
                <h1>Users List</h1>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Functions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Monica</td>
                            <td>
                                <a href="useredit.php"><button type="button" class="btn btn-primary ">Edit</button></a>
                                <!--HREF needs to be removed when button implemented-->
                                <button type="button" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Sherine</td>
                            <td>
                                <a href="useredit.php"><button type="button" class="btn btn-primary ">Edit</button></a>
                                <!--HREF needs to be removed when button implemented-->
                                <button type="button" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>John</td>
                            <td>
                                <a href="useredit.php"><button type="button" class="btn btn-primary ">Edit</button></a>
                                <!--HREF needs to be removed when button implemented-->
                                <button type="button" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>George</td>
                            <td>
                                <a href="useredit.php"><button type="button" class="btn btn-primary ">Edit</button></a>
                                <!--HREF needs to be removed when button implemented-->
                                <button type="button" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td><input class="form-control" type="text" placeholder="Add new user"></td>
                            <td><button type="button" class="btn btn-success addBtn">Add</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- CONTENT -->

            <!-- OBLIGATORY CONTENT -->
        </div>
    </div>
    <!-- OBLIGATORY CONTENT -->
</body>

</html>