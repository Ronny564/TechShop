<?php
require_once "PDO.php";
require_once"data.php";

function seedProducts($pdo,$products)
{
    foreach($products as $product)
    {
        $id= $product["id"];
        $name= $product["name"];
        $stock=$product["stock"];
        $price= $product["price"];
        $color =$product["color"];
        $category=$product["category"];
        $brand=$product["brand"];
        $specification=$product["spec"];
        $img_url=$product["img_url"];
        $query= "INSERT IGNORE INTO products VALUES
        (
            '$id','$name','$stock','$price','$color','$category','$brand','$specification','$img_url' 
        )";
        try{
            $pdo->query($query);
            
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    echo "product data successfully added";
}


// function seedCustomers($pdo,$users)
// {
//     foreach($users as $user)
//     {
//         $id= $user["id"];
//         $name= $user["name"];
//         $email= $user["email"];
//         $password=$user["password"];
//         $query= "INSERT IGNORE INTO users VALUES
//         (
//             '$id','$name','$email','$password' 
//         )";
//         try{
//             $pdo->query($query);
//         }catch(Exception $e){
//             echo $e->getMessage();
//         }
//     }
// }

    
// seedCustomers($pdo, $users);



function seedAdmin($pdo,$admins)
{
    foreach($admins as $admin)
    {
        $id=$admin["id"];
        $name=$admin["name"];
        $email=$admin["email"];
        $password=$admin["password"];
        $img_url=$admin["img_url"];
        $query="INSERT IGNORE INTO admin VALUES
        ('$id','$name','$email','$password','$img_url')";
         try{
            $pdo->query($query);
            
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    echo "admin data successfully added";
}
seedAdmin($pdo,$admins);
seedProducts($pdo,$products);