<?php session_start();

    $firstName = $lastName = $username = $email = $email2 = "";
    $errorMessage = "";

    if(isset($_POST['submit'])){
        
        $firstName = strip_tags($_POST['firstName']);
        $lastName = strip_tags($_POST['lastName']);
        $username = strip_tags($_POST['username']);
        $email = strip_tags($_POST['email']);
        $email2 = strip_tags($_POST['email2']);
        $password = strip_tags($_POST['password']);
        $password2 = strip_tags($_POST['password2']);


        $_SESSION['firstName'] = $firstName;
        $_SESSION['lastName'] = $lastName;
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['email2'] = $email2;
        $_SESSION['password'] = $password;
        

        if(empty($firstName)){
            $errorMessage = "Please put an input here";
        }
        if(empty($lastName)){
            $errorMessage = "Please put an input here";
        }
        if(empty($username)){
            $errorMessage = "Please put an input here";
        }
        if(empty($email)){
            $errorMessage = "Please put an input here";
        }
        if(empty($email2)){
            $errorMessage = "Please put an input here";
        }
        if(empty($password)){
            $errorMessage = "Please put an input here";
        }
        if(empty($password2)){
            $errorMessage = "Please put an input here";
        }

        if(empty($errorMessage)){
            header("Location: login.php");
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Register ::</title>
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

                <?php echo "<span class='errorMessage'>$errorMessage</span>";?>
                <input type="text" name="firstName" placeholder="First Name">

                <?php echo "<span class='errorMessage'>$errorMessage</span>";?>
                <input type="text" name="lastName" placeholder="Last Name" >
                
                <?php echo "<span class='errorMessage'>$errorMessage</span>";?>
                <input type="text" name="username" placeholder="Username" >

                <?php echo "<span class='errorMessage'>$errorMessage</span>";?>
                <input type="email" name="email" placeholder="Email" >

                <?php echo "<span class='errorMessage'>$errorMessage</span>";?>
                <input type="email" name="email2" placeholder="Confirm Email" >

                <?php echo "<span class='errorMessage'>$errorMessage</span>";?>
                <input type="password" name="password" placeholder="Password" >

                <?php echo "<span class='errorMessage'>$errorMessage</span>";?>
                <input type="password" name="password2" placeholder="Confirm Password" >

                <input type="submit" name="submit" value="SUBMIT">

            </form>

            <a href="login.php" class="signInMessage">Already have account? Sign in here!</a>

        </div>

    </div>
</body>
</html>