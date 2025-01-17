<?php
require_once "../database/PDO.php";
if($_SERVER['REQUEST_METHOD']==='POST')
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $password=$_POST['password'];
}
function valideFilds($name,$email,$address,$password)
{
    if($name===''||$email===''||$address===''||$password===''){
        return true;
    }
    return false;
}
if(!valideFilds($name,$email,$address,$password))
{
    try{
        $sql="INSERT INTO customers VALUES ('','$name','$email','$address','$password');";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        header("Location: login.php?signup=success");

    }catch(PDOException $e)
    {
        header("Location: login.php?signup=failed");
    }
}
else{
    header("Location: login.php?validation=empty");
}


?>