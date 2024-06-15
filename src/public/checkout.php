<?php
session_start();
ob_start();

$arrayGender = array(
    '' => 'Select your gender',
    'Mister' => 'Male',
    'Miss' => 'Female',
    'Mx' => 'Non-binary',
    'noreply' => 'Prefer not to say'
);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/style.css">
    <script type="module" src="/assets/js/script.js" defer></script>
    <script src="/assets/js/captcha.js" defer></script>
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

                    <?php
                    $product = displayRecapCart();
                    $subtotal = 0;
                    $shipping = 5;
                    $chippingTotal = 0;
                    $totalValue = 0;
                    if (isset($_SESSION['cart'])) :
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
                    <?php
                        endforeach;
                    endif;
                    ?>
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
                <?php
                $delai = 8;
                $url = './';

                $send = !empty($_SESSION['sendMail'])?$_SESSION['sendMail']:'';
                if (!empty($_SESSION['sendMail'])) {

                    if ($send  === 'send') {

                        $email = (!empty($_SESSION['email']))?$_SESSION['email']:'';
                        echo '<div class="alert alert-success" role="alert">Your order has been successfully shipped! You will soon receive an email (<b>' . $email. '</b>) with the tracking details.<br>Thank you for your purchase.</div>';
                        header("Refresh: $delai;url=../../");

                        unset($_SESSION['gender']);
                        unset($_SESSION['name']);
                        unset($_SESSION['lastName']);
                        unset($_SESSION['email']);
                        unset($_SESSION['country']);
                        unset($_SESSION['city']);
                        unset($_SESSION['zip']);
                        unset($_SESSION['adress']);
                        unset($_SESSION['sendMail']);
                        
                    }
                    if ($send  === 'noSend') {
                        echo '<div class="alert alert-danger" role="alert">Message could not be sent.</div>';
                        unset($_SESSION['sendMail']);
                    }
                    if ($send  === 'noEmpty') {
                        echo '<div class="alert alert-info" role="alert">Please fill in the mandatory fields. Thank you!</div>';
                        unset($_SESSION['sendMail']);
                    }
                }

                if (isset($_SESSION['cart'])) :
                ?>
                    <form method="post" action="/src/controllers/process_form.php" id='myForm'>
                        <div class="form-group ">
                            <div class="gender">
                                <label for="object">Select a subject:</label>
                                <select name="gender" id="gender" aria-label="Select your gender">
                                    <?php
                                    foreach ($arrayGender as $key => $value) {
                                        $disabled = ($key == '') ? 'disabled' : '';
                                        $selected = (!empty($_SESSION['gender']) && $_SESSION['gender'] == $key) ? 'selected' : (($key == '') ? 'selected' : '');
                                        echo '<option value="' . $key . '" ' . $selected . ' ' . $disabled . '>' . $value . '</option>';
                                    }
                                    ?>
                                </select>
                                <div class="error">
                                    <?php echo (!empty($_SESSION['errorGender'])) ? $_SESSION['errorGender'] : ''; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="userName">
                                <input type="text" name="name" id="name" aria-label="Your name" placeholder="Name" value="<?php echo (!empty($_SESSION['name'])) ? $_SESSION['name'] : ''; ?>">
                                <input type="text" name="lastName" id="lastName" aria-label="Your last name" placeholder="Last name" value="<?php echo (!empty($_SESSION['lastName'])) ? $_SESSION['lastName'] : ''; ?>">
                            </div>
                            <div class="error">
                                <?php echo (!empty($_SESSION['errorName']) || !empty($_SESSION['errorLastName'])) ? $_SESSION['errorName'] . '<br>' . $_SESSION['errorLastName'] : ''; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" id="email" aria-label="Your Email" placeholder="Email" value="<?php echo (!empty($_SESSION['email'])) ? $_SESSION['email'] : ''; ?>">
                            <div class="error"><?php echo (!empty($_SESSION['errorEmail'])) ? $_SESSION['errorEmail'] : ''; ?></div>
                        </div>
                        <div class="form-group adressCity">
                            <div class="city">
                                <input type="text" name="zip" id="zip" aria-label="Your zip" placeholder="zip" value="<?php echo (!empty($_SESSION['zip'])) ? $_SESSION['zip'] : ''; ?>">
                                <input type="text" name="city" id="city" aria-label="Your city" placeholder="city" value="<?php echo (!empty($_SESSION['city'])) ? $_SESSION['city'] : ''; ?>">
                            </div>
                            <div class="adress">
                                <input type="text" name="adress" id="adress" aria-label="Your adress" placeholder="adress" value="<?php echo (!empty($_SESSION['adress'])) ? $_SESSION['adress'] : ''; ?>">
                            </div>
                            <div class="adress">
                                <input type="text" name="country" id="country" aria-label="Your coutry" placeholder="coutry" value="<?php echo (!empty($_SESSION['country'])) ? $_SESSION['country'] : ''; ?>">
                            </div>
                            <div class="error">
                                <?php
                                echo (!empty($_SESSION['errorAdress']) || !empty($_SESSION['errorZip']) || !empty($_SESSION['errorCity']) || !empty($_SESSION['errorCountry'])) ? $_SESSION['errorZip'] . ' ' . $_SESSION['errorCity']  . ' ' . $_SESSION['errorAdress'] . '  ' . $_SESSION['errorCountry'] : ''; ?>
                            </div>
                            <div class="form-group">
                                <input id="website" name="website" type="text" value="" />
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                    </form>
                <?php endif ?>
            </div>
        </section>
    </main>
    <?php
    require('../views/footer.php')
    ?>
</body>

</html>