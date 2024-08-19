
<!-- This is the home or welcome page of our website -->
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSIT BOOK</title>

    <!-- css to make book bundle at top -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

<!-- header section starts  -->

<header class="header">

    <div class="header-1">

        <a href="#" class="logo"> <i class="fas fa-book"></i> CSIT Book Store </a>

        <form action="" class="search-form">
            <input type="search" name="" placeholder="search here..." id="search-box">
            <label for="search-box" class="fas fa-search"></label>
        </form>

        <div class="icons">
            <div id="search-btn" class="fas fa-search"></div>
        </div>

        <div class="icons" style="display: flex; justify-content: center; align-items: center;">
            <a href="pages/signin.php" style="text-decoration: none; margin: 0 10px; padding: 10px 20px; border: 2px solid #3b5998; border-radius: 30px; transition: border-color 0.3s; background-color: #3b5998; color: #fff; font-size: 16px;">
                Sign in
            </a>
            <a href="pages/signup.php" style="text-decoration: none; margin: 0 10px; padding: 10px 20px; border: 2px solid #3b5998; border-radius: 30px; transition: border-color 0.3s; background-color: #3b5998; color: #fff; font-size: 16px;">
                Sign up
            </a>   
        </div>        

    </div>

    <div class="header-2">
        <nav class="navbar">
        </nav>
    </div>

</header>

<!-- header section ends -->

<!-- bottom navbar  -->
<nav class="bottom-navbar">
    <a href="pages/signin.php" class="fas fa-home"></a>
    <a href="pages/signin.php" class="fas fa-list"></a>
    <a href="pages/signin.php" class="fas fa-tags"></a>
    <a href="pages/signin.php" class="fas fa-comments"></a>
    <a href="pages/signin.php" class="fas fa-feedback"></a>
</nav>

<!-- home section starts  -->

<hr>

<section class="home" id="home">

    <div class="row">

        <div class="content">
            <h3>25% off for-KEC BOOKS</h3>
            <p>If you’re a Bsc.CSIT student and need a books, KEC has great deals on a wide range of books. Shop for these books from top authors and available on hugely discounted prices</p>
            <a href="pages/signin.php" class="btn">shop now</a>
        </div>

        <div class="swiper books-slider">
            <div class="swiper-wrapper">

            <a href="#" class="swiper-slide"><img src="https://www.upaharbazar.com/wp-content/uploads/2023/05/B.-Sc.-CSIT-Entrance-Book.jpg" alt=""></a>
                <a href="#" class="swiper-slide"><img src="https://heritagebooks.com.np/wp-content/uploads/2022/03/Database-Management-System-CSIT-BIM-cropped.jpg" alt=""></a>
                <a href="#" class="swiper-slide"><img src="https://heritagebooks.com.np/wp-content/uploads/2022/03/Statistics-I-CSIT-219x300.jpg" alt=""></a>
                <a href="#" class="swiper-slide"><img src="https://cdn.shopify.com/s/files/1/0329/9547/5515/products/Web_Technology1.jpg?v=1583310991" alt=""></a>
            </div>
            <img src="https://raw.githubusercontent.com/KordePriyanka/Books4MU-Book-Store-Website-/main/image/stand.png" class="stand" alt="">
        </div>

    </div>

</section>

<!-- home section ense  -->

<section class="icons-container">

    <div class="icons">
        <i class="fas fa-shipping-fast"></i>
        <div class="content">
            <h3>free shipping</h3>
            <p>order over $100</p>
        </div>
    </div>

    <div class="icons">
        <i class="fas fa-lock"></i>
        <div class="content">
            <h3>secure payment</h3>
            <p>100 secure payment</p>
        </div>
    </div>

    <div class="icons">
        <i class="fas fa-redo-alt"></i>
        <div class="content">
            <h3>easy returns</h3>
            <p>10 days returns</p>
        </div>
    </div>

    <div class="icons">
        <i class="fas fa-headset"></i>
        <div class="content">
            <h3>24/7 support</h3>
            <p>call us anytime</p>
            <p>+977-9862118330</p>
        </div>
    </div>

</section>

<!-- js to make bundle at top -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script> 

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>

