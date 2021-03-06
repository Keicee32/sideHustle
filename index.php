<?php session_start();
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css" />
    <title>Welcome ::</title>
</head>
<body>
    <header>
        <img src="./img/logo.png" alt="Site Logo">
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <section class="main">
        <div class="container">
            <h1> Hello <?php echo $_SESSION['firstName'];?> , what would you like to do today? </h1>
        </div>                                              
    </section>

</body>
</html>