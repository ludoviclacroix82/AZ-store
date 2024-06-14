<?php
?>
<div class="cart-mini">
    <div class="cart-header">
        <div class="header-title">My cart</div>
        <div class="header-close">
            <img src="/assets/images/icones/arrow-right.svg" alt="Close" id="closeMiniCart">
        </div>
    </div>
    <div class="cart-content">
        <?php echo displayCartMini(); ?>
    </div>
    <?php echo  displayRising(); ?>
    <div class="button">
        <a href="../src/public/mycart.php">
            <button>go to cart</button>
        </a>
    </div>
</div>