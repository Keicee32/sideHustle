<?php
require_once("./config.php");

try{

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record not found');

$sql = "DELETE FROM employee_table WHERE id=:id";

$stmt = $conn->prepare($sql);

$stmt->bindParam(':id', $id);

if($stmt->execute()){
    header('Location: dashboard.php');
    // header('Location: dashboard.php?action=deleted');
} else{
    echo "Something went wrong";
}

} catch(PDOException $ex){
die("Connection error: " . $ex->getMessage());
}
?>