<?php

require_once "../database/PDO.php";

if($_SERVER['REQUEST_METHOD']==="POST")
{   
    $id=$_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address=$_POST['address'];
    $password=$_POST['password'];

    function valideFilds($name,$email,$address,$password):bool{
        if($name==='')
        {
            // echo'Name is empty';
            return true;
        }
        if($email=== '')
        {
            // echo 'stock is empty';
            return true;
        }
        if($address=== '')
        {
            // echo 'price is empty';
            return true;
        }
        if($password=== '')
        {
            // echo 'price is empty';
            return true;
        }
        return false;
    }
    if(!valideFilds($name,$email,$address,$password,))
    {
        try{
            $sql = "UPDATE customers SET
             name=:name,
             email=:email, 
             address=:address, 
             password=:password
             WHERE CusId=:id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":address", $address);
            $stmt->bindParam(":password", $password);
            $stmt->bindParam(":id", $id);

            $stmt->execute();
            header("Location: customerupdate.php?status=success&img_url=$img_url&id=$id");
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    else{
        header("Location: customerupdate.php?validation=empty");
    }

}
