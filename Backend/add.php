<?php
session_start();

if (isset($_SESSION["usernameonnavbar"]) && $_SESSION["usernameonnavbar"] == 'admin'){}
else {
    header("location: ../index.php");
}

if (isset($_POST['submitsave'])) {
  $users = simplexml_load_file('files/user.xml');
  $user = $users->addChild('user');
  $user->addAttribute('id', $_POST['id']);
  $user->addChild('firstname', $_POST['firstname']);
  $user->addChild('lastname', $_POST['lastname']);
  $user->addChild('email', $_POST['email']);
  $user->addChild('phonenumber', $_POST['phonenumber']);
  $user->addChild('address', $_POST['address']);
  $user->addChild('password', $_POST['password']);
  file_put_contents('files/user.xml', $users->asXML());
  header('location: userlist.php');
}
?>
<form method="post">
  <table class="table table-bordered">
    <tr>
      <td>ID</td>
      <td><input type="text" name="id"> </td>
    </tr>
    <tr>
      <td> First Name</td>
      <td><input type="text" name="firstname"> </td>
    </tr>
    <tr>
      <td>Last Name </td>
      <td><input type="text" name="lastname"> </td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type="text" name="email"> </td>
    </tr>
    <tr>
      <td>Phone Number</td>
      <td><input type="text" name="phonenumber"> </td>
    </tr>
    <tr>
      <td>Address</td>
      <td><input type="text" name="address"> </td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input type="text" name="password"> </td>
    </tr>
    <tr>
      <td> &nbsp; </td>
      <td><input type="submit" name="submitsave" value="save"></td>
    </tr>
</form>