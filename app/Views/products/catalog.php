<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/ecommerce/public/css/catalog-style.css">
    <link rel="stylesheet" href="/ecommerce/public/css/navbar-style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">


</head>
<body>
    <header>
        <?php include(APPPATH . 'Views/shared/navbar.php'); ?>
    </header>

    <div class="wrapper">
    
        <main>
            <div id="catalog">
                <h1>Our <br> Catalog</h1>
                <p>A curated list of <br> trending products.</p><a href="#">EXPLORE</a></div>
            <div id="products">
                <div class="card">
                    <div class="backdrop"></div>
                    <div class="fav"><i class="material-icons">favorite</i></div><img src="https://res.cloudinary.com/prvnbist/image/upload/v1521472820/tshirt_thread.png" alt="Product Image" />
                    <div class="desc"><span>Dev T-Shirt</span><span>$25</span>
                        <div class="cart"><i class="material-icons">shopping_cart</i></div>
                    </div>
                </div>
                <div class="card">
                    <div class="backdrop"></div>
                    <div class="fav"><i class="material-icons">favorite</i></div><img src="https://res.cloudinary.com/prvnbist/image/upload/v1521472820/nike_thread.png" alt="Product Image" />
                    <div class="desc"><span>Nike Prime</span><span>$88</span>
                        <div class="cart"><i class="material-icons">shopping_cart</i></div>
                    </div>
                </div>
                <div class="card">
                    <div class="backdrop"></div>
                    <div class="fav"><i class="material-icons">favorite</i></div><img src="https://res.cloudinary.com/prvnbist/image/upload/v1521472820/jacket_thread.png" alt="Product Image" />
                    <div class="desc"><span>jacket</span><span>$110</span>
                        <div class="cart"><i class="material-icons">shopping_cart</i></div>
                    </div>
                </div>
            </div>
        </main>
        
    </div>
</body>
</html>