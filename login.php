<?php session_start();

    $username = $password = "";
    $errorMessage = "";

    if(isset($_POST['login'])){
        
        $username = strip_tags($_POST['username']);
        $password = strip_tags($_POST['password']);

        if($username == $_SESSION['username'] && $password == $_SESSION['password']){
            header("Location: index.php");
        }
        
        // $_SESSION['firstName'] = $firstName;
        // $_SESSION['lastName'] = $lastName;
        // $_SESSION['username'] = $username;
        // $_SESSION['email'] = $email;
        // $_SESSION['email2'] = $email2;
        // $_SESSION['password'] = $password;
        

        // if(empty($firstName)){
        //     $errorMessage = "Please put an input here";
        // }
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css" />
    <title>Login ::</title>
</head>
<body>
    <div class="signIncontainer">

        <div class="column">

            <div class="header">
                <img src="./img/logo.png" alt="Site Logo" title="Logo">
                <h2>Sign Up</h2>
                <span>to continue to Flix</span>
            </div>

            <form method="POST">

            <input type="text" name="username" placeholder="Username" required>

            <input type="password" name="password" placeholder="Password" required>

            <input type="submit" name="login" value="LOGIN">

            </form>

            <a href="register.php" class="signInMessage">Need an account? Sign up here!</a>

        </div>

    </div>
</body>
</html>