<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/style.css">
    <script type="module" src="/assets/js/script.js" defer></script>
    <title>Az-Store : My Cart</title>
</head>

<body>
    <?php
    require('../views/menu.php');
    require('../models/products.php');
    ?>
    <main id='main-cart' >
        <?php require('../models/cart-mini.php'); ?>
        <section id="cart">
        <div class="items">
            <div class="header">
                <div class="header-row product">item</div>
                <div class="header-row name-porduct">product name</div>
                <div class="header-row price">price</div>
                <div class="header-row quanity">quantity</div>
                <div class="header-row delete"></div>
                <div class="header-row total">total</div>
            </div>
            <div class="list">
                <div class="header-row product">item</div>
                <div class="header-row name-porduct">product name</div>
                <div class="header-row price">price</div>
                <div class="header-row quanity">quantity</div>
                <div class="header-row delete"></div>
                <div class="header-row total">total</div>
            </div>
        </div>
        <aside>

        </aside>
    </section>
    </main>
    <?php
    require('../views/footer.php')
    ?>
</body>

</html>