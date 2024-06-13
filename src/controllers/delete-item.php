<?php
session_start();
$url = $_SERVER['HTTP_REFERER']; // url page precedent
if(isset($_GET['id']) && isset($_SESSION['cart'])){
    $idItem = intval($_GET['id']);
    echo $idItem;
    unset($_SESSION['cart'][$idItem]);

    header("Location: {$url}");
    $_SESSION['DeleteItem'] = 'true';
    exit();
}

?>