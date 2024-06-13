<?php
session_start();
var_dump($_POST);
$captcha = isset($_POST['spam']) ? htmlspecialchars(trim($_POST['spam'])) : '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && $captcha === '') {

    $idItem = isset($_POST['idItem']) ? htmlspecialchars(trim($_POST['idItem'])) : '';
    $qt = isset($_POST['qt']) ? htmlspecialchars(trim($_POST['qt'])) : '';

    //echo $idItem . '//' . $qt;


    if (isset($_SESSION['cart']) && isset( $_SESSION['cart'][$idItem])) {
        $_SESSION['cart'][$idItem] += intval($qt);
    } else {

        $_SESSION['cart'][$idItem] =  intval($qt);
    }
    echo 'quantite:'.intval($qt);
    header("Location: ../../index.php");
    $_SESSION['addItem'] = 'true';
    
    print_r($_SESSION['cart']);
    exit();
} else {
    header("Location: ../../index.php");
    $_SESSION['addItem'] = 'false';
    exit();
}


