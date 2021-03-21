<?php
require_once("./config.php");

// $action = isset($_GET['action']) ? $_GET['action'] : "";
//     if($action == 'deleted'){
//         echo "Record has been deleted successfully";
//     }


if(isset($_POST['create'])){
        
    $fullName = strip_tags(htmlspecialchars($_POST['fullName']));
    $email = strip_tags(htmlspecialchars($_POST['email']));
    $phone = strip_tags(htmlspecialchars($_POST['phone']));


    $sql = "INSERT INTO employee_table SET full_name=:fn, email=:em, phone=:ph";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(":em", $email);
    $stmt->bindParam(":ph", $phone);
    $stmt->bindParam(":fn", $fullName);

    $stmt->execute();
 
}

    $sql2 = "SELECT id, full_name, phone, email, created FROM employee_table";
    $stmt2 = $conn->query($sql2);
    $stmt2->execute();

    $rowCount = $stmt2->fetchAll(PDO::FETCH_ASSOC);

    // $name = $rowCount['full_name'];

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
                    <h2>WELCOME</h2>
                    <p> Please add details of new employee </p>
                    
                </div>

                <form method="POST">

                    
                    <input type="text" name="fullName" placeholder="Full Name" required>

                    
                    <input type="email" name="email" placeholder="Email" required>

                    
                    <input type="phone" name="phone" placeholder="Phone Number" required>


                    <input type="submit" name="create" value="CREATE">

                </form>

                

            </div>

            <div class="column">

                <div class="header">
                    <img src="./img/logo.png" alt="Site Logo" title="Logo">
                    <h3>VIEW</h3> 
                </div>


                    <?php foreach($rowCount as $rowCounts): extract($rowCounts) ?>
                        <p>Name: <?php echo htmlspecialchars($full_name);?></p> 
                        <button><a href='read_one.php?id=<?php echo $id;?>'>Read</a></button>
                        <button><a href="delete.php?id=<?php echo $id;?>">Delete</a></button>
                    
                    <?php endforeach;?>

                 

            </div>

        </div>


    <!-- This deletes the selected item -->
    <!-- onclick='delete_user(<?php echo htmlspecialchars($id);?>);'
    <script type='text/javascript'>
        function delete_user(id){
            var answer = confirm("Are you sure?");
            if(answer){
                window.location = 'delete.php?id=' + id;
            }
        }
    </script> -->


</body>
</html>