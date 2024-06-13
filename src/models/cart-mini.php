<?php

$subtotal = isset($_SESSION['subTotal']) ? ($_SESSION['subTotal']) : 0;



?>
<div class="cart-mini">
    <div class="cart-header">
        <div class="header-title">My cart</div>
        <div class="header-close">
            <img src="../../assets/images/icones/arrow-right.svg" alt="" srcset="">
        </div>
    </div>
    <div class="cart-content">
        <?php echo displayCartMini(); ?>
    </div>
    <div class="rising">
        <div class="subtotal"><?php echo $subtotal; ?> €</div>
        <div class="shipping">30</div>
        <div class="total">280</div>
    </div>
    <div class="button">
        <a href="">
            <button>go to cart</button>
        </a>
    </div>
</div>