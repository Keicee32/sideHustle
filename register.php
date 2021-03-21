<?php
require_once("./config.php");

$error = "";

    if(isset($_POST['submit'])){
        
        $fullName = strip_tags(htmlspecialchars($_POST['fullName']));
        $email = strip_tags(htmlspecialchars($_POST['email']));
        $phone = strip_tags(htmlspecialchars($_POST['phone']));
        $password = strip_tags(htmlspecialchars($_POST['password']));

        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users SET full_name=:fn, email=:em, phone=:ph, password=:pw";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(":em", $email);
        $stmt->bindParam(":ph", $phone);
        $stmt->bindParam(":fn", $fullName);
        $stmt->bindParam(":pw", $password);

        if($stmt->execute()){
            header("Location: dashboard.php");
        }else{
            $error = "There are errors on the form";
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
    <title>Registration ::</title>
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
                    <input type="text" name="fullName" placeholder="Full Name" required>

                    
                    <input type="email" name="email" placeholder="Email" required>

                    
                    <input type="phone" name="phone" placeholder="Phone Number" required>

                    
                    <input type="password" name="password" placeholder="Password" required>


                    <input type="submit" name="submit" value="SUBMIT">

                </form>

                <a href="login.php" class="signInMessage">Already have account? Sign in here!</a>

            </div>

        </div>
</body>
</html>