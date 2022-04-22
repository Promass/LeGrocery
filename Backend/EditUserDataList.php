<?php
    session_start();

    if (isset($_SESSION["usernameonnavbar"]) && $_SESSION["usernameonnavbar"] == 'admin'){}
else {
    header("location: ../index.php");
}
    function loadTable() {

        $xmlDoc = new DOMDocument();
        $xmlDoc -> loadHTMLFile("../../Database.xml", LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $users = $xmlDoc -> documentElement -> getElementsByTagName("user");

        foreach ($users as $user) {
?>
            <script type="text/javascript">
                var userProfile = new UserProfile(
                    '<?php echo $user -> getElementsByTagName("id") -> item(0) -> textContent; ?>',
                    '<?php echo $user -> getElementsByTagName("firstname") -> item(0) -> textContent; ?>',
                    '<?php echo $user -> getElementsByTagName("lastname") -> item(0) -> textContent; ?>',
                    '<?php echo $user -> getElementsByTagName("email") -> item(0) -> textContent; ?>',
                    '<?php echo $user -> getElementsByTagName("phonenumber") -> item(0) -> textContent; ?>',
                    null,
                    null,
                    null,
                    '<?php echo $user -> getElementsByTagName("address") -> item(0) -> textContent; ?>');
                addRow(userProfile);
            </script>

<?php

        }

    }

    function deleteUser($id) {

        $xmlDoc = new DOMDocument();
        $xmlDoc -> validateOnParse = true;

        $xmlDoc -> loadHTMLFile("../../Database.xml", LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $xmlDoc -> preserveWhiteSpace = false;

        $userToDelete = $xmlDoc -> getElementById($id);
        $userToDelete -> parentNode -> removeChild($userToDelete);

        $xmlDoc -> saveHTMLFile("../../Database.xml");

        $_POST["delete"] = "false";
    }

    if (isset($_POST["delete"])) {
        deleteUser($_POST["id"]);
    }

    function addUser() {

        $xmlDoc = new DOMDocument();
        $xmlDoc -> validateOnParse = true;

        $xmlDoc -> loadHTMLFile("../../Database.xml", LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $xmlDoc -> preserveWhiteSpace = false;

        $usersEmail = $xmlDoc -> getElementsByTagName("email");
        foreach ($usersEmail as $userEmail) {
            if ($userEmail -> textContent == $_POST["userEmail"]) {
?>

                <script type="text/javascript">
                    alert("Email already exists!");
                    history.go(-1);
                </script>

<?php
                return;
            }
        }

        if (idExists($_POST["userId"])) {
            editExistingUser($xmlDoc);
        } else {
            addNewUser($xmlDoc);
        }

        //Format the Database.xml doc in a neat way
        $xmlDoc -> loadXML($xmlDoc -> saveHTML());
        $xmlDoc -> formatOutput = true;

        $xmlDoc -> save("../../Database.xml");

        $_POST["add"] = "false";

        header("Location: UserList.php");
    }

    function addNewUser(&$xmlDoc) {

        $userList = $xmlDoc -> getElementById("UserList");

        $newUser = $xmlDoc -> createElement("user");
        $newUser -> setAttribute("id", "U".$_POST["userId"]);

        $id = $xmlDoc -> createElement("id", $_POST["userId"]);
        $newUser -> appendChild($id);

        $firstName = $xmlDoc -> createElement("firstname", $_POST["userFirstName"]);
        $newUser -> appendChild($firstName);

        $lastName = $xmlDoc -> createElement("lastname", $_POST["userLastName"]);
        $newUser -> appendChild($lastName);

        $email = $xmlDoc -> createElement("email", $_POST["userEmail"]);
        $newUser -> appendChild($email);

        $phoneNumber = $xmlDoc -> createElement("phoneNumber", $_POST["userPhoneNumber"]);
        $newUser -> appendChild($phoneNumber);

        $dob = $xmlDoc -> createElement("date", $_POST["userDob"]);
        $newUser -> appendChild($dob);

        $gender = $xmlDoc -> createElement("gender", $_POST["userGender"]);
        $newUser -> appendChild($gender);

        $password = $xmlDoc -> createElement("password", $_POST["userPassword"]);
        $newUser -> appendChild($password);

        $address = $xmlDoc -> createElement("address", $_POST["userAddress"]);
        $newUser -> appendChild($address);

        $userList -> appendChild($newUser);
    }

    function editExistingUser(&$xmlDoc) {

        $user = $xmlDoc -> getElementById("U".$_POST["userId"]);

        $user -> getElementsByTagName("firstname") -> item(0) -> textContent = $_POST["userFirstName"];

        $user -> getElementsByTagName("lastname") -> item(0) -> textContent = $_POST["userLastName"];

        $user -> getElementsByTagName("email") -> item(0) -> textContent = $_POST["userEmail"];

        $user -> getElementsByTagName("phoneNumber") -> item(0) -> textContent = $_POST["userPhoneNumber"];

        $user -> getElementsByTagName("date") -> item(0) -> textContent = $_POST["userDob"];

        $user -> getElementsByTagName("gender") -> item(0) -> textContent = $_POST["userGender"];

        $user -> getElementsByTagName("address") -> item(0) -> textContent = $_POST["userAddress"];
    }

    if (isset($_POST["submit"])) {
        addUser();
    }

    function checkID() {

//        if (isset($_POST["edit"])) {
//            return $_POST["id"];
//        }

        $xmlDoc = new DOMDocument();
        $xmlDoc -> loadHTMLFile("../../Database.xml", LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $users = $xmlDoc -> documentElement -> getElementsByTagName("user");

        $id = 1;
        foreach ($users as $user) {
            if ($user -> getElementsByTagName("id") -> item(0) -> textContent != $id) {
                break;
            }
            $id++;
        }
        return $id;
    }

    function idExists($id) {

        $xmlDoc = new DOMDocument();
        $xmlDoc -> loadHTMLFile("../../Database.xml", LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $user = $xmlDoc -> getElementById("U".$id);

        if (is_null($user))
            return false;

        return true;
    }

?>