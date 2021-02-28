<?php
    $fullName = $email = $password = "";

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $fullName = $_POST['fullName'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // $password = password_hash($password, PASSWORD_DEFAULT);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post"">
            <label for="fullName">Full Name</label>
            <input type="text" name="fullName" id="fullName" placeholder="Enter your full name">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Enter email address">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Enter your password">
            <button>Submit</button>
        </form>
    </div>

    <div class="container">
        <h2>Your details are</h2>
        <br>
        <p>Your full name is: <?php echo $fullName;?></p>
        <p>Your email is: <?php echo $email;?></p>
        <p>Your password is: <?php echo $password;?></p>
    </div>
</body>
</html>