<?php
session_start();
if (isset($_SESSION["usernameonnavbar"]) && $_SESSION["usernameonnavbar"] == 'admin'){}
else {
    header("location: ../index.php");
}
?>

<!doctype html>
<html lang="en">

<head>

  <title> LEGROCERY </title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- BOOTSTRAP -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <!-- ICON -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- STYLESHEET -->
  <link rel="stylesheet" type="text/css" href="sidebar.css">
 
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
  <div id="sidebar">
    <div class="logo-box">
      <a href="#"><img id="big-logo" src="../Image/Logo/altlogo.png" alt="LOGO"
          style="width:150px; margin: auto;" /></a>
    </div>
    <div class="link-box">
      <a href="#"><i class="fa fa-home" style="width:50px; padding-left: 7px;"></i>HOME</a>
      <a href="ProductList.html"><i class="fa fa-cubes" style="width:50px; padding-left: 5px;"></i>PRODUCTS</a>
      <a href="orderlist.html"><i class="fa fa-truck" style="width:50px; padding-left: 5px;"></i>ORDERS</a>
      <a href="userlist.html"><i class="fa fa-users" style="width:50px; padding-left: 5px;"></i>USERS</a>
      <hr style="border-color:white; width:90%; white-space: nowrap;">
      <a href="../index.html"><i class="fa fa-globe" style="width:50px; padding-left: 5px;"></i>STORE</a>
    </div>
    <div class="user-box">
      <button id="sign-out-btn">SIGN OUT</button>
    </div>
  </div>

  <div id="wrapper">
    <div class="container-fluid">
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

      <!-- CONTENT -->

      <!-- <h1>Hello, world!</h1> -->
      <div class="container" style="background-color: white;">
        
        <table class="table table-bordered">
          <thead>
         
    <?php
        if($result->num_rows > 0 ){
            while($row = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td> Rs. " . $row['price'] . "</td>";
                echo "<td>" . $row['description'] . "</td>";
                echo "<td>";
                echo "<div class='btn-group'>";
                echo "<a class='btn btn-secondary' href='./update.php?id=" .$row['id'] ."'> Update </a>";
                echo "<a class='btn btn-danger' href='./delete.php?id=" .$row['id'] ."'> Delete</a>";
                echo "</div>";
                echo "</td>";
                echo "</tr>";
            }
        }
    ?>
          </tbody>
        </table>
      </div>

      <!-- CONTENT -->

    </div>
  </div>
  <!-- SIDEBAR -->

  <!-- BOOTSTRAP -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

  <!-- SIDEBAR JS -->
  <script src="sidebar.js"></script>
</body>

</html>