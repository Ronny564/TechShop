<?php
require_once "PDO.php";
require_once "data.php";

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
        $detail = str_replace("'", "\'", $product['detail']);
        $specification = str_replace("'", "\'", $product['specification']);
        $img_url=$product["img_url"];
        $query= "INSERT IGNORE INTO products VALUES
        (
            '$id','$name','$stock','$price','$color','$category','$brand','$detail','$specification','$img_url' 
        )";
        try{
            $pdo->query($query);
            
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    echo "product data successfully added<br>";
}


function seedCustomers($pdo,$customers)
{
    foreach($customers as $customer)
    {
        $id= $customer["id"];
        $name= $customer["name"];
        $email= $customer["email"];
        $address=$customer["address"];
        $password=$customer["password"];
        $query= "INSERT IGNORE INTO customers VALUES
        (
            '$id','$name','$email','$address','$password'
        )";
        try{
            $pdo->query($query);
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    echo "customer data successfully added<br> ";
}
function seedAdmin($pdo,$admins)
{
    foreach($admins as $admin)
    {
        $id=$admin["id"];
        $name=$admin["name"];
        $email=$admin["email"];
        $address=$admin["address"];
        $password=$admin["password"];
        $query="INSERT IGNORE INTO admins VALUES
        ('$id','$name','$email','$address','$password')";
         try{
            $pdo->query($query);
            
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    echo "admin data successfully added<br>";
}
function seedSale($pdo, $sales)
{
    foreach ($sales as $sale) {
        $SaleId = $sale["SaleId"];
        $CusId = $sale["CusId"];
        $order_date = $sale["order_date"];
        
        $query = "INSERT IGNORE INTO sale (SaleId, CusId, order_date) 
                  VALUES ('$SaleId', '$CusId', '$order_date')";
        
        try {
            $pdo->query($query);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    echo "Sale data successfully added<br>";
}

function seedSaleDetail($pdo, $saleDetails)
{
    foreach ($saleDetails as $saleDetail) {
        $SaleDetail_ID = $saleDetail["SaleDetail_ID"];
        $saleID = $saleDetail["saleID"];
        $CusID = $saleDetail["CusID"];
        $ProductID = $saleDetail["ProductID"];
        $Quantity = $saleDetail["Quantity"];
        $Total_Amount = $saleDetail["Total_Amount"];
        $Payment_Method = $saleDetail["Payment_Method"];
        
        $query = "INSERT IGNORE INTO saledetail (SaleDetail_ID, saleID, CusID, ProductID, Quantity, Total_Amount, Payment_Method) 
                  VALUES ('$SaleDetail_ID', '$saleID', '$CusID', '$ProductID', '$Quantity', '$Total_Amount', '$Payment_Method')";
        
        try {
            $pdo->query($query);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    echo "Sale Detail data successfully added<br>";
}

seedSale($pdo,$sales);
seedSaleDetail($pdo,$saleDetails);
seedCustomers($pdo, $customers);
seedAdmin($pdo,$admins);
seedProducts($pdo,$products);