<?php

require_once "../database/PDO.php";

if($_SERVER['REQUEST_METHOD']==="POST")
{
    $id=$_POST['product_id'];
    $name = $_POST['product_name'];
    $stock= $_POST['product_stock'];   
    $price= $_POST['product_price'];
    $color=$_POST['product_color'];
    $category=$_POST['product_category'];
    $brand=$_POST['product_brand'];
    $detail=$_POST['product_details'];
    $specification=$_POST['product_specification'];


    $img_url = $_FILES['product_img']['name'];
    $target_dir = '../img/';
    $temp_img = $_FILES['product_img']['tmp_name'];

    move_uploaded_file( $temp_img, $target_dir . $img_url );

   

    function valideFilds($id,$name,$stock,$price,$color,$category,$brand,$detail):bool{
        if($id==='' ||$name===''||$stock=== ''||$price=== '' ||$color=== ''||$category=== ''||$brand=== ''||$detail=== '')
        {
            return true;
        }
        return false;
    }
    
    if(!valideFilds($id,$name,$stock,$price,$color,$category,$brand,$detail))
    {
        try{
            $sql = "INSERT INTO products VALUES('$id','$name','$stock','$price','$color','$category','$brand','$detail','$$specification','$img_url')";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            header("Location: productCreate.php?status=success&img_url=$img_url");
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    else{
        header("Location: productCreate.php?validation=empty");
    }

}
