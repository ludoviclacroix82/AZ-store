<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Az-Store</title>
</head>

<body>
    <?php
    require('./menu.php')
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
        <section id="last-products">
            <div class="wrap">
                <h3><span>our</span> last products</h3>
                <div class="items">
                    <?php
                    try {
                        $productsJson = file_get_contents('./assets/json/products.json');
                        $products = json_decode($productsJson, true);

                        foreach ($products as $product) {
                    ?>
                            <div class="item" id="<?php echo $product['id'];  ?>">
                                <div class="item-image">
                                    <img src="<?php echo $product['image_url'];  ?>" alt="">
                                </div>
                                <div class="item-content">
                                    <div class="item-info">
                                        <h3><?php echo $product['product'];  ?></h3>
                                        <?php echo $product['price'];  ?>€
                                    </div>
                                    <div class="button">
                                        <button>add to card</button>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    } catch (\JsonException $exception) {
                        echo $exception->getMessage(); // echoes "Syntax error" 
                    }
                    ?>
                </div>
            </div>
        </section>
    </main>
    <?php
    require('./footer.php')
    ?>
</body>

</html>