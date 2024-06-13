<?php

$subtotal = isset($_SESSION['subTotal']) ? ($_SESSION['subTotal']) : 0;
$shipping = isset($_SESSION['shippingTotal'] ) ? ($_SESSION['shippingTotal']) : 0;
$total = floatval($subtotal) + floatval($shipping);



?>
<div class="cart-mini">
    <div class="cart-header">
        <div class="header-title">My cart</div>
        <div class="header-close">
            <img src="../../assets/images/icones/arrow-right.svg" alt="Close" id="closeMiniCart">
        </div>
    </div>
    <div class="cart-content">
        <?php echo displayCartMini(); ?>
    </div>
    <div class="rising">
        <div class="subtotal">
            <h4>Subtotal</h4>
            <span><?php echo $subtotal; ?> €</span>
        </div>
        <div class="shipping">
            <h4>shipping</h4>
            <span><?php echo $shipping; ?> €</span>
        </div>
        <div class="total">
            <h4>totla</h4>
            <span><?php echo $total; ?> €</span>
        </div>
    </div>
    <div class="button">
        <a href="">
            <button>go to cart</button>
        </a>
    </div>
</div>