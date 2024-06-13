<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <script type="module" src="./assets/js/script.js" defer></script>
    <title>Az-Store</title>
</head>

<body>
    <?php
    require('./src/views/menu.php');
    require_once('./src/models/products.php');
    ?>
    <header>
        <div class="wrap">
            <div class="slogan">
                <h2>Shoe the right <span>one</span>.</h2>
                <div class="button">
                    <button>see our store</button>
                </div>

            </div>
            <div class="slogan-image">
                <img src="./assets/images/main/shoe_one.png" alt="Shoe the right one" srcset="">
            </div>
        </div>
    </header>
    <main>
        <?php require('./src/models/cart-mini.php');?>
        <section id="last-products">
            <div class="wrap">
                <h3><span>our</span> last products</h3>
                <div class="items">
                    <?php
                    displayProducts();
                    ?>
                </div>
            </div>
        </section>
    </main>
    <?php
    require('./src/views/footer.php')
    ?>
</body>

</html>