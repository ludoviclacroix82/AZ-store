<footer>
    <div class="links">
        <a href="/">Home</a>
        <a href="/">About</a>
        <a href="/src/public/products.php">Products</a>
        <a href="../src/public/mycart.php">My cart</a>
        <a href="/">Contact</a>
    </div>
    <?php if (!empty($_SESSION['addItem']) === true) : ?>
        <div class="alert alert-success alert-item" id="successAlert">Your product has been successfully added to the cart!</div>
        <?php
        unset($_SESSION['addItem']);
        ?>
    <?php endif; ?>
    <?php if (!empty($_SESSION['DeleteItem']) == true) : ?>
        <div class="alert alert-danger alert-item" id="deleteAlert">Your product has been successfully deleted to the cart!</div>
        <?php
        unset($_SESSION['DeleteItem']);
        ?>
    <?php endif; ?>
</footer>