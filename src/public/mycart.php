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
    <main id='main-cart'>
        <?php require('../models/cart-mini.php'); ?>
        <section id="cart">
            <div class="items">
                <h2>Order Summary</h2>
                <div class="header">
                    <div class="row product">item</div>
                    <div class="row name-porduct">product name</div>
                    <div class="row price">price</div>
                    <div class="row quantity">quantity</div>
                    <div class="row delete"></div>
                    <div class="row total">total</div>
                </div>
                <?php echo displayCart(); ?>
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