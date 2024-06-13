<?php
session_start();

if(isset($_GET['id']) && isset($_SESSION['cart'])){
    $idItem = intval($_GET['id']);
    echo $idItem;
    unset($_SESSION['cart'][$idItem]);

    header("Location: ../../index.php");
    $_SESSION['DeleteItem'] = 'true';
    exit();
}

?>