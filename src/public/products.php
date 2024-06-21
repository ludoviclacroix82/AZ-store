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
    <title>Az-Store</title>
</head>

<body>
    <?php
    require('../views/menu.php');
    require('../models/products.php');
    ?>
    <main>
        <?php require('../models/cart-mini.php'); ?>
        <section id="products">
            <div class="wrap">
                <h3><span>our</span> products</h3>
                <div class="items">
                    <?php
                    displayProducts('null');
                    ?>
                </div>
            </div>
        </section>
    </main>
    <?php
    require('../views/footer.php')
    ?>
</body>

</html>