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
    <title>Az-Store : checkout </title>
</head>

<body>
    <?php
    require('../views/menu.php');
    require('../models/products.php');
    ?>
    <main id='main-cart'>
        <?php require('../models/cart-mini.php'); ?>
        <section id="checkout">
            <aside>
                <div class="items">
                    <h3>order summary</h3>
                    <div class="header">
                        <div class="row product">item</div>
                        <div class="row name-porduct">product name</div>
                        <div class="row price">price</div>
                        <div class="row quantity">quantity</div>
                        <div class="row total">total</div>
                    </div>

                    <?php //var_dump(displayRecapCart());
                    $product = displayRecapCart();
                    $subtotal = 0;
                    $shipping = 5;
                    $chippingTotal = 0;
                    $totalValue = 0;
                    foreach ($product as $item) :
                        $totalItem =  $item['value'] * $item['price'];
                        $totalValue += $item['value'];
                        $subtotal += $totalItem;
                        $chippingTotal = $totalValue * $shipping;
                    ?>
                        <div class="list" id="<?php echo $item['id']; ?>">
                            <div class="row product">
                                <img src="<?php echo $item['image_url']; ?>" alt="<?php echo $item['product']; ?>">
                            </div>
                            <div class="row name-porduct"><?php echo $item['product']; ?></div>
                            <div class="row price"><?php echo $item['price']; ?> €</div>
                            <div class="row quantity "> x <?php echo $item['value']; ?></div>
                            <div class="row total"><?php echo $totalItem; ?> €</div>
                        </div>
                    <?php endforeach; ?>
                    <div class="rising">
                        <div class="row "></div>
                        <div class="row "></div>
                        <div class="row "></div>
                        <div class="row title">Subtotal</div>
                        <div class="row "><?php echo $subtotal; ?> €</div>
                    </div>
                    <div class="rising">
                        <div class="row "></div>
                        <div class="row "></div>
                        <div class="row "></div>
                        <div class="row title">Shipping</div>
                        <div class="row "><?php echo $chippingTotal; ?> €</div>
                    </div>
                    <div class="rising">
                        <div class="row "></div>
                        <div class="row "></div>
                        <div class="row "></div>
                        <div class="row title">Shipping</div>
                        <div class="row "><?php echo $chippingTotal + $subtotal; ?> €</div>
                    </div>
                </div>
            </aside>
            <div class="from">

            </div>
        </section>
    </main>
    <?php
    require('../views/footer.php')
    ?>
</body>

</html>