<footer>
    <div class="logo">
    </div>
    <div class="links">
        <a href="/">Home</a>
        <a href="/">About</a>
        <a href="/">Products</a>
        <a href="../src/public/mycart.php">My cart</a>
        <a href="/">Contact</a>
    </div>
    <div class="social">
    </div>
    <?php if ($_SESSION['addItem'] === 'true') : ?>
        <div class="alert alert-success alert-item" id="successAlert">Your product has been successfully added to the cart!</div>
        <?php
        unset($_SESSION['addItem']);
        ?>
        <script>
            // Supprimer la modal après  4secondes
            setTimeout(function() {
                const alertElement = document.querySelector('#successAlert')
                if (alertElement) {
                    alertElement.style.display = 'none'
                }
            }, 4000);
        </script>
    <?php endif; ?>
    <?php if ($_SESSION['DeleteItem'] === 'true') : ?>
        <div class="alert alert-danger alert-item" id="deleteAlert">Your product has been successfully deleted to the cart!</div>
        <?php
        unset($_SESSION['DeleteItem']);
        ?>
        <script>
            // Supprimer la modal après  4secondes
            setTimeout(function() {
                const alertElement = document.querySelector('#deleteAlert')
                if (alertElement) {
                    alertElement.style.display = 'none'
                }
            }, 4000);
        </script>
    <?php endif; ?>
</footer>