<?php

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $users = json_decode(file_get_contents("users.json"), true);
        if($email == "admin@admin.com" && $password == "admin"){
            session_start();
            $_SESSION['usernameonnavbar'] = "admin";
            header("Location: Backend/home.php");
            exit();
        }
        else{
            $email = $_POST['email'];
            $password = $_POST['password'];
            $users = json_decode(file_get_contents("users.json"), true);
            foreach ($users['users'] as $customer => $customerObject) {
                if ($customerObject['password'] == $password && $customerObject['email'] == $email){
                    session_start();
                
                    $_SESSION["usernameonnavbar"] = strval($customerObject['firstname']);
                    
                    $_SESSION["log_in"] = true;
                    $_SESSION['admin_is_logged'] = "notAdmin";

                    header('Location: index.php');
                    exit();
                
                }
                elseif ($customerObject['email'] != $email) {
                    echo '<script type="text/javascript">
                    document.getElementById("res").innerHTML = "There is no account registered with such email";
                    </script>';
                    
                }
                else{
                    echo '<script type="text/javascript">
                    document.getElementById("res").innerHTML = "You entered a wrong passowrd. Please try again.";
                    </script>';
                    
                }
            }
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Page</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <div class="image">
        <a href="index.php"><img src="Image/Logo/newlogo.png" width="200px" height="auto"></a>
    </div>

<div class=".container mod">
        <div class="col-md-4 offset-md-4">
            <div class="login-form">
                <form class="mt-3 border p-4 bg-light Larger shadow" method="post" action="login.php">
                    <h4 class="mb-4 font-monospace">Log into Your Account</h4>
                    <div class="row">
                        <div class="mb-3 col-md-12">
                        <div class="mb-3 col-md-12">
                            <label>Email</label>
                            <input type="Email" name="email" class="form-control" placeholder="Enter your email">
                        </div>
                        <div class="mb-3 col-md-12">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter Password">
                            <div><p class="text-end mt-2 text-secondary" type="submit"><a href="#">Forgot password?</a></p></div>
                            <p id="res" style="color: darkred;"></p>
                        </div>                      
                        <div class="col-md-12">
                           <button class="btn btn-success d-grid gap-2 col-3 mx-auto login" name="submit">Login</button>
                        </div>
                    </div>
                    <button class="btn btn-secondary badge rounded-pill pull-right" type="reset" value="Reset">Reset</button>
                </form>
                <p class="text-center mt-3 text-secondary">If you do not have an account, Please <a href="signup.php">Sign up</a></p>
                <span>
                
                </span>
            </div>
        </div>
</div>

        <footer>
            <p class="copyright">LeGrocery © 2022</p>
        </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 
</body>
</html>






