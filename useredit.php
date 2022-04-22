<!DOCTYPE html>
<html>

<head>
    <title> LEGROCERY </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <!-- SIDEBAR -->
    <?php

    include('sidebar.php');

    $users = simplexml_load_file('files/user.xml');
    if (isset($_POST['submitsave'])){
        foreach($users->user as $user){
            if($user['id']=='U'.$_POST['id'])
            {
                $user->firstname=$_POST['firstname'];
                $user->lastname=$_POST['lastname'];
                $user->email=$_POST['email'];
                $user->phonenumber=$_POST['phonenumber'];
                $user->address=$_POST['address'];
                $user->password=$_POST['password'];
                break;
            }
      }
        file_put_contents('files/user.xml', $users->asXML());
        header ('location: userlist.php');
    } 
        
    
   foreach($users->user as $user){
       if($user['id']==$_GET['id']){
           $id=$user->id;
           $firstname=$user->firstname;
           $lastname=$user->lastname;
           $email=$user->email;
           $phonenumber=$user->phonenumber;
           $address=$user->address;
           $password=$user->password;
           break;   
       }
   }

   ?>
 <form method="post">
    <table class="table table-bordered">
        <tr>
        <td>ID</td>
        <td><input type ="text" name="id" class="form-control" value="<?php echo $id; ?>"readonly="yes"> </td>
        </tr>
        <tr>
        <td>First Name </td>
        <td><input type ="text" name="firstname" class="form-control" value="<?php echo $firstname; ?>"> </td>
        </tr>
        <tr>
        <td>Last Name </td>
        <td><input type ="text" name="lastname" class="form-control" value="<?php echo $lastname; ?>"> </td>
        </tr>
       
        
        <tr>
        <td>Email</td>
        <td> <input  type ="text" name="email"  class="form-control" value="<?php echo $email; ?>"> </td>
        </tr>
        <tr>
        <td>Phone Number</td>
        <td><input type ="text" name="phonenumber"class="form-control" value="<?php echo $phonenumber; ?>"> </td>
        </tr>
        <tr>
        <td>Address</td>
        <td><input type ="text" name="address" class="form-control"value="<?php echo $address; ?>"> </td>
        </tr>
        <tr>
        <td>Password</td>
        <td><input type ="text" name="password" class="form-control"value="<?php echo $password; ?>"> </td>
        </tr>
        <tr>
        <td> &nbsp; </td>
        <td><input    class='btn btn-secondary'class="form-control" type ="submit" name="submitsave" value="save"></td>
        </tr>
</form>

    <!-- SIDEBAR -->

    <!-- OBLIGATORY CONTENT -->
    <div id="wrapper">
        <div class="container">
            <div class="header-box">
                <div class="header-box-c">
                    <button id="menu-btn" class="fa fa-bars" onclick="toggle()"></button>
                    <span>USER EDIT</span>
                </div>
                <!-- <div class="header-box-c">
                    <button id="add-order-btn-s" class="fa fa-save add-btn" title="Save"></button>
                    <button id="add-order-btn-l" class="add-btn" title="Save">Save</button>
                </div>
            </div> -->
            <!-- OBLIGATORY CONTENT -->

            <!-- CONTENT -->
<!-- 
                <div class="container rounded bg-white mt-5">
                    <div class="row">
                        <div class="col-md-4 border-right">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src="../Image/profile.jpg" width="90"><span class="font-weight-bold">John Doe</span><span class="text-black-50">john_doe12@bbb.com</span><span>United States</span></div>
                        </div>
                        <div class="col-md-8">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mb-1"></i>
                                        <h6>Edit Profile</h6>
                                    </div>
                                    <h6 class="text-right"></h6>
                                </div>
                                <div class="row mt-2"> 
                                    <div class="col-md-6"><input type="text" class="form-control" value="<?php echo $id; ?>"readonly="yes"> </div>
                                    <div class="col-md-6"><input type="text" class="form-control" value="<?php echo $firstname; ?>"></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6"><input type="text" class="form-control" value="<?php echo $lastname?>"></div>
                                    <div class="col-md-6"><input type="text" class="form-control" value="Phone number"></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6"><input type="text" class="form-control" value="123 rue Boyer "></div>
                                    <div class="col-md-6"><input type="text" class="form-control" value="US"></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6"><input type="text" class="form-control" value="Royal Bank"></div>
                                    <div class="col-md-6"><input type="text" class="form-control" value="1987 1346 77655"></div>
                                </div> 
                                <div class="mt-5 text-right"><input class="btn btn-primary profile-button" type="submit" name="submitsave" value="Save Profile"> 
                                        </input></div>
                            </div>
                        </div>
                    </div>
                </div>
                 -->
            <!-- CONTENT -->

            <!-- OBLIGATORY CONTENT -->
        </div>
    </div>
    <!-- OBLIGATORY CONTENT -->
</body>

</html>