<?php
require_once "../database/PDO.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address']; 

    function valideFilds($name, $email, $address): bool {
        if ($name === '') {
            // echo 'Name is empty';
            return true;
        }
        if ($email === '') {
            // echo 'Email is empty';
            return true;
        }
        if ($address === '') {
            // echo 'Address is empty';
            return true;
        }
        return false;
    }

    if (!valideFilds($name, $email, $address)) {
        try {
            $sql = "UPDATE customers SET
                    name = :name,
                    email = :email,
                    address = :address
                    WHERE CusId = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":address", $address);
            $stmt->bindParam(":id", $id);

            $stmt->execute();
            header("Location: customerupdate.php?status=success&id=$id");
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    } else {
        header("Location: customerupdate.php?validation=empty");
    }
}
?>