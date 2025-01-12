<?php

require_once "../database/PDO.php";

if($_SERVER['REQUEST_METHOD']==="POST")
{
    $id=$_POST['id'];
    $name = $_POST['product_name'];
    $stock= $_POST['product_stock'];   
    $price= $_POST['product_price'];
    $color=$_POST['product_color'];
    $category=$_POST['product_category'];
    $brand=$_POST['product_brand'];
    $detail=$_POST['product_details'];

    echo $name;
    echo$stock;
    echo $price;
    echo$color;
    echo $category;
    echo$brand;
    echo $detail;

    $img_url = $_FILES['product_img']['name'];
    $target_dir = '../img/';
    $temp_img = $_FILES['product_img']['tmp_name'];
       // Only move the uploaded file and set img_url if a new file is uploaded
       if (!empty($img_url)) {
        move_uploaded_file($temp_img, $target_dir . $img_url);
    } else {
        // Retain the existing image URL if no new file is uploaded
        $stmt = $pdo->prepare("SELECT img_url FROM products WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $img_url = $stmt->fetchColumn();
    }

    // move_uploaded_file( $temp_img, $target_dir . $img_url );



   

    function valideFilds($name,$stock,$price,$color,$category,$brand,$detail):bool{
        if($name==='')
        {
            // echo'Name is empty';
            return true;
        }
        if($stock=== '')
        {
            // echo 'stock is empty';
            return true;
        }
        if($price=== '')
        {
            // echo 'price is empty';
            return true;
        }
        if($color=== '')
        {
            // echo 'price is empty';
            return true;
        }
        if($category=== '')
        {
            // echo 'price is empty';
            return true;
        }
        if($brand=== '')
        {
            // echo 'price is empty';
            return true;
        }
        if($detail=== '')
        {
            // echo 'price is empty';
            return true;
        }
        return false;
    }
    if(!valideFilds($name,$stock,$price,$color,$category,$brand,$detail))
    {
        try{
            $sql = "UPDATE products SET
             name=:name,
             stock=:stock, 
             price=:price, 
             color=:color,
             category=:category,
             brand=:brand,
             details=:details, 
             img_url=:img_url WHERE id=:id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":stock", $stock);
            $stmt->bindParam(":price", $price);
            $stmt->bindParam(":color", $color);
            $stmt->bindParam(":category", $category);
            $stmt->bindParam(":brand", $brand);
            $stmt->bindParam(":details", $detail);
            $stmt->bindParam(":img_url", $img_url);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            header("Location: productUpdate.php?status=success&img_url=$img_url&id=$id");
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    else{
        header("Location: ProductUpdate.php?validation=empty");
    }
    

}
