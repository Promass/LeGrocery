<?php

session_start();

if (isset($_SESSION["usernameonnavbar"]) && $_SESSION["usernameonnavbar"] == 'admin'){}
else {
    header("location: ../index.php");
}

if (isset($_GET['action'])) {
    $users = simplexml_load_file('files/user.xml');
    $id - $_Get['id'];
    $index = 0;
    $i = 0;
    foreach ($users->user as $user) {
        if ($user['id'] == $id) {
            $index = $i;
            break;
        }
        $i++;
    }
    unset($users->user[$index]);
    file_put_contents('files/user.xml', $users->asXML());
}
$users = simplexml_load_file('files/user.xml');
?>

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
            </div>
            <!-- OBLIGATORY CONTENT -->

            <!-- CONTENT -->
            <div class="container" style="background-color: white;">

                <table class="table table-bordered">

                    <thead>
                        <?php
                        //load xml file
                        $users = simplexml_load_file('files/user.xml');

                        ?>
                        <!-- <a href="add.php"> Add new user </a> -->
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>Password</th>
                        </tr>
                        <?php foreach ($users->user as $user) { ?>
                            <tr>
                                <td><?php echo $user['id']; ?></td>
                                <td><?php echo $user->firstname; ?></td>
                                <td><?php echo $user->lastname; ?></td>
                                <td><?php echo $user->email; ?></td>
                                <td><?php echo $user->phonenumber; ?></td>
                                <td><?php echo $user->address; ?></td>
                                <td><?php echo $user->password; ?></td>
                                <td>
                                    <a class='btn btn-secondary' href="useredit.php?id=<?php echo $user['id']; ?> ">Edit</a>
                                    <a class='btn btn-danger' href='./delete.php?id=$user_id' onClick='confirmDelete();'>Delete</a>
                                </td>
                                </td>

                            </tr>
                        <?php
                        }
                        ?>
                        <a class='btn btn-secondary' href="add.php"> Add new user </a>
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