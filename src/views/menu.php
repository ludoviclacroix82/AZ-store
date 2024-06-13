<?php 

$nbrItem = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
?>

<nav>
    <div class="logo">
        <h2>AZ[strore]</h2>
    </div>
    <div class="links">
        <a href="">Home</a>
        <a href="">About</a>
        <a href="">Products</a>
        <a href="">My cart</a>
        <a href="">Contact</a>
    </div>
    <div class="tools">
        <div class="tools-cart">
            <?php 
                if($nbrItem >0 )
                    echo '<div class="item-number">'.$nbrItem.'</div>'                
            ?>            
                <img src="./assets/images/icones/shopping-cart.svg" alt="Shopping Cart" id="openCart">
        </div>
        <div class="tools-login">
            <a href="./login">Login</a>
        </div>
    </div>
</nav>