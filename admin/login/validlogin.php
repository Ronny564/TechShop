<?php
require_once __DIR__ . "/../../database/PDO.php";

if($_SERVER['REQUEST_METHOD']==='POST')
{
    $email=$_POST['email'];
    $password=$_POST['password'];
}
function login($pdo,$email,$password)
{
    $sql = "SELECT * FROM admins WHERE email=:email AND password=:password";
    try{
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":email",$email);
        $stmt->bindParam(":password",$password);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if($result){
            return $result;
        }
        return [];
    
    }
    catch(PDOException $e){
        echo "". $e->getMessage();
        return [];
    }
}
$result = login($pdo,$email, $password);
session_start();
if($result){
    header("Location: ../");
    $_SESSION['user'] = $result;
}
else{
    header("Location: /TechShop/admin/login?login=failed");
}
?>