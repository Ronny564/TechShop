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
        $sql="INSERT INTO admins VALUES ('','$name','$email','$address','$password');";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        header("Location: index.php?signup=success");

    }catch(PDOException $e)
    {
        header("Location: index.php?signup=failed");
    }
}
else{
    header("Location: index.php?validation=empty");
}
?>