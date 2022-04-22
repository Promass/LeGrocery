<?php
session_start();

if (isset($_SESSION["usernameonnavbar"]) && $_SESSION["usernameonnavbar"] == 'admin'){}
else {
    header("location: ../index.php");
}
    include("CheckUser.php");
    include("EditUserProfileHead.html");
    include("EditUserDataList.php");
?>

<body>

<?php
    include("BackStoreNavBar.php");
?>

<br/>

<div class="container">
    <div class="jumbotron text-center title">
        <h1 class="h1"><span style="color: #ffed00">E</span>dit User Profile</h1>
    </div>
</div>

<div class="jumbotron text-center" style="background-color: #ffe8a1; padding: 2%;">

    <form method="post" action="EditUserDataList.php">

    <div class="form-group row">
        <div class="col-sm-2"></div>
        <label class="col-sm-1 col-form-label text-left">User ID</label>
        <div class="col-sm-6">
            <input type="text" id="user-id" name="userId" class="form-control" value='<?php if(isset($_GET["id"])){echo $_GET["id"];} else {echo checkID();} ?>' placeholder="User ID" readonly>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-2"></div>
        <label class="col-sm-1 col-form-label text-left">First Name</label>
        <div class="col-sm-6">
            <input type="text" id="user-first-name" name="userFirstName" class="form-control" placeholder="First Name" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-2"></div>
        <label class="col-sm-1 col-form-label text-left">Last Name</label>
        <div class="col-sm-6">
            <input type="text" id="user-last-name" name="userLastName" class="form-control"  placeholder="Last Name" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-2"></div>
        <label class="col-sm-1 col-form-label text-left">Email</label>
        <div class="col-sm-6">
            <input type="email" id="user-email" name="userEmail" class="form-control"  placeholder="Email" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-2"></div>
        <label class="col-sm-1 col-form-label text-left">Phone Number</label>
        <div class="col-sm-6">
            <input type="text" id="user-phone-number" name="userPhoneNumber" class="form-control"  placeholder="Phone Number">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-2"></div>
        <label class="col-sm-1 col-form-label text-left">Date Of Birth</label>
        <div class="col-sm-6">
            <input type="date" id="user-dob" name="userDob" class="form-control" required />
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-2"></div>
        <label class="col-sm-1 col-form-label text-left">Gender</label>
        <div class="col-sm-6">
            <select id="user-gender" name="userGender" class="form-control">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="not-specified">Not Specified</option>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-2"></div>
        <label class="col-sm-1 col-form-label text-left">Password</label>
        <div class="col-sm-6">
            <input type="password" id="user-password" name="userPassword" class="form-control"  placeholder="Password" <?php if ($_GET["action"] != "add") { echo 'readonly';} else { echo 'required'; } ?>>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-2"></div>
        <label class="col-sm-1 col-form-label text-left">Address</label>
        <div class="col-sm-6">
            <textarea id="user-address" name="userAddress" rows = "4" style="width: 100%"></textarea>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm" style="display: flex; justify-content: center; align-items: center; height: 50px;">
            <button type="submit" class="btn btn-primary" name="submit">Save</button>
            <p>&nbsp&nbsp&nbsp</p>
            <button type="reset" class="btn btn-primary" name="submit">Reset</button>
            <!--;window.location.href='UserList.html';-->
        </div>
    </div>

    </form>
</div>

<br/>

<?php
    if(isset($_GET["id"])){

        $xmlDoc = new DOMDocument();
        $xmlDoc -> loadHTMLFile("Database.xml", LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $user = $xmlDoc -> getElementById("U".$_GET["id"]);

        ?>

        <script type="text/javascript">
            var userProfile = new UserProfile(
                '<?php echo $user -> getElementsByTagName("id") -> item(0) -> textContent; ?>',
                '<?php echo $user -> getElementsByTagName("firstname") -> item(0) -> textContent; ?>',
                '<?php echo $user -> getElementsByTagName("lastname") -> item(0) -> textContent; ?>',
                '<?php echo $user -> getElementsByTagName("email") -> item(0) -> textContent; ?>',
                '<?php echo $user -> getElementsByTagName("phonenumber") -> item(0) -> textContent; ?>',
                '<?php echo $user -> getElementsByTagName("date") -> item(0) -> textContent; ?>',
                '<?php echo $user -> getElementsByTagName("gender") -> item(0) -> textContent; ?>',
                '<?php echo $user -> getElementsByTagName("password") -> item(0) -> textContent; ?>',
                '<?php echo $user -> getElementsByTagName("address") -> item(0) -> textContent; ?>');
            editExistingUser(userProfile);
        </script>

        <?php
    }
    include("../footer.css");
?>

<br/>
</body>
</html>