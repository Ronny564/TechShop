<?php
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    unset($_SESSION['wish'][$id]);
}

header("Location: wish.php");
exit;
?>
