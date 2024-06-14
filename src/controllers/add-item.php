<?php
session_start();
//var_dump($_POST);
$url = $_SERVER['HTTP_REFERER']; // url page precedent
$captcha = isset($_POST['spam']) ? htmlspecialchars(trim($_POST['spam'])) : '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && $captcha === '') {

    $idItem = isset($_POST['idItem']) ? htmlspecialchars(trim($_POST['idItem'])) : '';
    $qt = isset($_POST['qt']) ? htmlspecialchars(trim($_POST['qt'])) : '';
    $quantity = $qt;


    if (isset($_SESSION['cart']) && isset($_SESSION['cart'][$idItem])) {
        
        $_SESSION['cart'][$idItem] += intval($qt);
        $quantity  = $_SESSION['cart'][$idItem];

    } else {

        $_SESSION['cart'][$idItem] =  intval($qt);
    }

   if ($quantity <= 0  && isset($_SESSION['cart'][$idItem])){
         header("Location: ../../src/controllers/delete-item.php?id={$idItem}");
         exit();
    }
           
    
    echo $quantity;
    header("Location: {$url}");
    $_SESSION['addItem'] = 'true';

    //print_r($_SESSION['cart']);
    exit();
} else {
    header("Location: {$url}");
    $_SESSION['addItem'] = 'false';
    exit();
}
