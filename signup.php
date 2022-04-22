<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign Up</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="signup.css">
</head>
<body>

    <div class="image">
        <a href="index.php"><img src="Image/Logo/newlogo.png" width="250px" height="auto"></a>
    </div>

<div class=".container mod">
        <div class="col-md-6 offset-md-3">
            <div class="signup-form">
                <form class="mt-6 border p-4 bg-light shadow" method="post" action="">
                    <h4 class="mb-4 font-monospace">Create Your Account</h4>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label>First Name</label>
                            <input id="fn" type="text" name="firstname" class="form-control" placeholder="Enter first name">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label>Last Name</label>
                            <input id="ln" type="text" name="lastname" class="form-control" placeholder="Enter last name">
                        </div>

                        <div class="mb-3 col-md-12">
                            <label>Email</label>
                            <input id="em" type="Email" name="email" class="form-control" placeholder="Enter your email">
                        </div>

                        <div class="mb-3 col-md-12">
                            <label>Password</label>
                            <input id="ps" type="password" name="password" class="form-control" placeholder="Enter Password">
                        </div>
                      
                        <div class="d-grid gap-2 col-6 mx-auto">
                           <button class="btn btn-success d-grid gap-2 col-3 mx-auto signup" type="submit">Sign up</button>
                        </div>
                        <p id="invalid"></p>
                         <span>
                             <button class="btn btn-secondary badge rounded-pill pull-right" type="reset" value="Reset">Reset</button>
                         </span> 
                    </div>
                   
                </form>
                <p class="text-center mt-3 text-secondary">If you have an account, Please <a href="login.html">Login</a></p>
            </div>
        </div>
</div>

        <footer>
            <p class="copyright">LeGrocery © 2022</p>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
<?php



     
if((isset($_POST["firstname"])&&empty($_POST["firstname"]))||isset($_POST["firstname"])=="First name field should not be empty!"){
     echo '<script type="text/javascript">
             document.getElementById("fn").value = "First name field should not be empty!";
             document.getElementById("fn").style.color = "red";
             </script>';
        }


if((isset($_POST["lastname"])&&empty($_POST["lastname"]))||isset($_POST["lastname"])=="Last name field should not be empty!"){
     echo '<script type="text/javascript">
             document.getElementById("ln").value = "Last name field should not be empty!";
             document.getElementById("ln").style.color = "red";
             </script>';
}  

if((isset($_POST["email"])&&empty($_POST["email"]))||isset($_POST["email"])=="empty@empty.com"){
     echo '<script type="text/javascript">
             document.getElementById("em").value = "empty@empty.com";
             document.getElementById("em").style.color = "red";
             </script>';
}

if((isset($_POST["password"])&&empty($_POST["password"]))||isset($_POST["password"])=="Password field should not be empty!"){
      echo '<script type="text/javascript">
            document.getElementById("ps").type = "password";
             document.getElementById("ps").value = "Password field should not be empty!";
             document.getElementById("ps").style.color = "red";
             </script>';
    }


  


 if(isset($_POST["firstname"])&&isset($_POST["lastname"])&&isset($_POST["email"])&&isset($_POST["password"])&&

(!empty($_POST["firstname"])&&!empty($_POST["lastname"])&&!empty($_POST["email"])&&!empty($_POST["password"])

 &&  (($_POST["firstname"])!="First name field should not be empty!")&&
     (($_POST["lastname"])!="Last name field should not be empty!")&&
     (($_POST["email"])!="empty@empty.com")&&
     (($_POST["password"])!="Password field should not be empty!")))  { 

    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];




        $current_data = file_get_contents('users.json');
        $array_data = json_decode($current_data, true);

        foreach ($array_data['users'] as $costumer => $costumerObject) {

            if (strcasecmp($costumerObject['email'], $email) == 0) {
             echo '<script type="text/javascript">
                alert("Already exists account");
                </script>';
                $found = true;

                break;
            }

        }

        if(!$found){
            $array_data['users'][] = $_POST;
            file_put_contents('users.json', json_encode($array_data));
            $_SESSION["costumer"] = $_POST;
            $_SESSION["log_in"] = true;
            header("Location: login.php");
            exit();

    }
    
 }




    


   
    

?>
<!-- 
  // Check if costumer already exists in costumer JSON file.
    // $users = json_decode(file_get_contents("users.json"), true);
    // foreach ($users['users'] as $costumer => $costumerObject) {
    //     if (strcasecmp($costumerObject["email"], $email) == 0) {
    //         echo "<script type="text/javascript">
    //         document.getElementById("invalid").innerHTML = "An account with such email already exists";
    //         </script>";
    //         $accountExists = TRUE;
    //         break;
    //     }
    // } -->

<!--     // $extra = [
            
        //      'firstname'         =>     $_POST['firstname'],
        //      'lastname'          =>     $_POST["lastname"],
        //      'email'             =>     $_POST["email"],
        //      'password'          =>     $_POST["password"],
         

        // ];
        // $array_data[] = $extra; // prevent losing intial data.
        // $final_data = json_encode($extra);
        // file_put_contents('users.json', $final_data,FILE_APPEND);
        // header("Location: login.php");
 -->
