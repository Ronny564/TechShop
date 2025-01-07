<?php
require_once "../../database/PDO.php";
if($_SERVER['REQUEST_METHOD']==='POST')
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $password=$_POST['password'];
    echo $name;
    echo $email;
}
try{
    $sql="INSERT INTO admins VALUES ('','$name','$email','$address','$password');";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    header("Location: index.php?signup=success");

}catch(PDOException $e)
{
    header("Location: index.php?signup=failed");
}
?>