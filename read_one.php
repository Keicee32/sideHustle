<?php 
require_once("./config.php");


$id = isset($_GET['id']) ? $_GET['id'] : die('Error: Record not found');

try{
    $sql = "SELECT full_name, email, phone FROM employee_table WHERE id=:id";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam('id', $id);

    $stmt->execute();

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $e){
    echo 'Connection Error: ' . $e->getMessage();
}

if(isset($_POST['create'])){
    try{    
        $fullName = strip_tags(htmlspecialchars($_POST['fullName']));
        $email = strip_tags(htmlspecialchars($_POST['email']));
        $phone = strip_tags(htmlspecialchars($_POST['phone']));


        $sql = "UPDATE employee_table SET full_name=:fn, email=:em, phone=:ph WHERE id=:id";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(":em", $email);
        $stmt->bindParam(":ph", $phone);
        $stmt->bindParam(":fn", $fullName);
        $stmt->bindParam(":id", $id);

        $stmt->execute();
    }catch(PDOException $e){
        echo "Connection Error: " . $e->getMessage();
    }

    try{
        $sql = "SELECT full_name, email, phone FROM employee_table WHERE id=:id";
    
        $stmt = $conn->prepare($sql);
    
        $stmt->bindParam('id', $id);
    
        $stmt->execute();
    
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    } catch(PDOException $e){
        echo 'Connection Error: ' . $e->getMessage();
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
                    <h2>UPDATE</h2>
                    <p> Please update employee details </p>
                    
                </div>

                <form method="POST">

                <?php foreach($rows as $row): extract($row) ?>
                    <input type="text" name="fullName" placeholder="Full Name" value="<?php echo htmlspecialchars($full_name)?>" required>

                    
                    <input type="email" name="email" placeholder="Email" value="<?php echo htmlspecialchars($email)?>" required>

                    
                    <input type="phone" name="phone" placeholder="Phone Number" value="<?php echo htmlspecialchars($phone)?>" required>
                <?php endforeach; ?>


                    <input type="submit" name="create" value="CREATE">

                </form>

                

            </div>

            <div class="column">

                <div class="header">
                    <img src="./img/logo.png" alt="Site Logo" title="Logo">
                    <h3>VIEW</h3> 
                </div>

                <table>
                <?php foreach($rows as $row): extract($row) ?>

                    <tr>
                        <td>Full Name: </td>
                        <td><?php echo htmlspecialchars($full_name, ENT_QUOTES); ?></td>
                    </tr>

                    <tr>
                        <td>Email: </td>
                        <td><?php echo htmlspecialchars($email, ENT_QUOTES); ?></td>
                    </tr>

                    <tr>
                        <td>Phone: </td>
                        <td><?php echo htmlspecialchars($phone, ENT_QUOTES); ?></td>
                    </tr>
                <?php endforeach; ?>

                <tr>
                    <td></td>
                    <td>
                        <button><a href="dashboard.php">Go Back</a></button>
                    </td>
                </tr>
            </table>

            </div>

        </div>
</body>
</html>