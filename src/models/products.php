<?php
$urlJson = './assets/json/products.json';


/**
 * displayProducts
 * Affiche les Items via le json
 * @return void
 */
function displayProducts()
{
    global $urlJson;

    try {
        $productsJson = file_get_contents($urlJson);
        $products = json_decode($productsJson, true);


        foreach ($products as $product) {


            echo <<<HTML
                <div class="item" id="{$product['id']}">
                    <div class="item-image">
                        <img src="{$product['image_url']}" alt="">
                    </div>
                    <div class="item-content">
                        <div class="item-info">
                            <h3>{$product['product']}</h3>
                            {$product['price']}€
                        </div>
                        <div class="button">
                            <form method="post" action="./src/controllers/add-item.php">
                                <input class="disabled" type="number" name="idItem" id="IdItem" value="{$product['id']}" >
                                <input class="disabled" type="text" name="spam" id="spam">
                                <input class="disabled" type="number" name="qt" id="qt" value="1">
                                <button type="submit">add to cart</button>
                            </form>
                        </div>
                    </div>
                </div>
                HTML;
        }
    } catch (\JsonException $exception) {
        echo $exception->getMessage(); // echoes "Syntax error" 
    }
}


/**
 * displayCartMini
 * Affiche les items dans le panier
 * @return void
 */
function displayCartMini()
{

    global $urlJson;
    $myCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : '';
    $subTotal = 0;
    $shipping = 0;
    $priceShippinItem = 5;

    try {
        $productsJson = file_get_contents($urlJson);
        $products = json_decode($productsJson, true);

        if (isset($_SESSION['cart'])) {

            foreach ($myCart as $key => $value) {

                $itemPosition = $itemPosition = array_search($key, array_column($products, 'id'));
                $subTotal += $value * $products[$itemPosition]['price'];
                $shipping += $value * $priceShippinItem;

                echo <<<HTML
                <div class="cart-item" id="{$products[$itemPosition]['id']}">
                    <div class="cart-image">
                        <img src="{$products[$itemPosition]['image_url']}">
                    </div>
                    <div class="cart-info">
                        <div class="title">{$products[$itemPosition]['product']}</div>
                        <div class="price">{$products[$itemPosition]['price']} €</div>
                    </div>
                    <div class="cart-tools">
                        <div class="close">
                            <a href="./src/controllers/delete-item.php?id={$products[$itemPosition]['id']}">
                                <img src="../../assets/images/icones/trash.svg" alt="Delete">
                             </a>
                        </div>
                        <div class="tools-content">
                        <form method="post" action="./src/controllers/add-item.php" id="fromMiniCart#{$products[$itemPosition]['id']}">
                            <input class="disabled" type="number" name="idItem" id="IdItem" value="{$products[$itemPosition]['id']}">
                            <input class="disabled" type="text" name="spam" id="spam">
                            <input class="disabled" type="number" name="qt" id="qt" value=''>
                            <div class="add">
                                <input id="less" type="button" value="-" />
                                <input id="result" type="texte" value="{$value}" maxlength="2" min='0' max='99' />
                                <input id="more" type="button" value="+" />
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                HTML;
            }
        $_SESSION['subTotal'] = $subTotal;
        $_SESSION['shippingTotal'] = $shipping;
        } else {
            echo 'aucun articles';
        }
        
    } catch (\JsonException $exception) {
        echo $exception->getMessage(); // echoes "Syntax error" 
    }
}
