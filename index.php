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
    require('./src/views/menu.php');
    require('./src/models/products.php');
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
                <img src="/assets/images/main/shoe_one.png" alt="Shoe the right one" srcset="">
            </div>
        </div>
    </header>
    <main>
        <?php require('./src/models/cart-mini.php'); ?>
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
        <section id="best-quality">
            <div class="wrap">
                <div class="image">
                    <img src="./assets/images/main/shoe_two.png" alt="best-quality">
                </div>
                <div class="title">
                    <p>we provide you</p>
                    <p>the <span>best</span> quality</p>
                </div>
                <div class="info">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Eius nam quibusdam eligendi natus laborum. 
                    </p>
                </div>
            </div>
        </section>
        <section id="testimonials">
        <div class="cards">
                <article class="card">
                    <div class="card-user">
                        <img src="/assets/images/client/image-emily.jpg" alt="Emily R.">
                    </div>
                    <div class="card-name">Emily from xyz</div>
                    <div class="card-content">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel unde earum illum optio velit dignissimos quaerat reiciendis vero enim animi beatae, porro a saepe inventore amet ullam nulla quia incidunt.
                    </div>
                </article>
                <article class="card">
                    <div class="card-user">
                        <img src="/assets/images/client/image-thomas.jpg" alt="Thomas S">
                    </div>
                    <div class="card-name">Thomas from coporate</div>
                    <div class="card-content">
                       Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel unde earum illum optio velit dignissimos quaerat reiciendis vero enim animi beatae, porro a saepe inventore amet ullam nulla quia incidunt.
                    </div>                    
                </article>
                <article class="card">
                    <div class="card-user">
                        <img src="/assets/images/client//image-jennie.jpg" alt="Jennie F.">
                    </div>
                    <div class="card-name"> Jennie from nike</div>
                    <div class="card-content">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel unde earum illum optio velit dignissimos quaerat reiciendis vero enim animi beatae, porro a saepe inventore amet ullam nulla quia incidunt.
                    </article>
            </div>
        </section>
    </main>
    <?php
    require('./src/views/footer.php')
    ?>
</body>

</html>