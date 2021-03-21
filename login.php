<?php

require_once("./config.php");

$error = "";

    if(isset($_POST['login'])){
        
        $email = strip_tags(htmlspecialchars($_POST['email']));
        $password = strip_tags(htmlspecialchars($_POST['password']));

        $sql = "SELECT * FROM users WHERE email=:em";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":em", $email);
            
        $stmt->execute();

        $query = $stmt->fetch(PDO::FETCH_ASSOC);

        $pw = password_verify($password, $query['password']);

        if($pw){
            header("Location: dashboard.php");
        } else{
            $error = "Wrong email and password combination";
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

                    <?php echo "<span class='errorMessage'>$error</span>";?>
                    <input type="email" name="email" placeholder="Email" >

                    <input type="password" name="password" placeholder="Password" >

                    <input type="submit" name="login" value="LOGIN">

                </form>

                <a href="register.php" class="signInMessage">Don't have account? Sign up here!</a>

            </div>

        </div>

</body>
</html>