<?php
require_once "header.php"
?>

<?php

require_once "DB.php";
$sql = "SELECT * FROM sneaker";
$req = $pdo->prepare($sql);
$req->execute();
$sneaker = $req->fetchAll();

?>
<!-- header end -->
<!-- mobile-menu-area start -->

<!-- mobile-menu-area end -->
<!-- slider start -->
<section class="hero-slider-container">
    <div class="hero-slider owl-carousel">
        <div class="hero-slider-item hero-slider-item-1">
            <div class="hero-slider-contents">

                <!--  <div class="container">
                                    <h1 class="title1">Amazing Collections</h1>
                                    <p class="title2">New Arrivals 2018</p>
                                    <a href="#" class="button-hover">SHOP NOW</a>
                                </div> -->
            </div>
        </div>

        <div class="hero-slider-item hero-slider-item-2">
            <div class="hero-slider-contents">

            </div>
        </div>

        <div class="hero-slider-item hero-slider-item-4">
            <div class="hero-slider-contents">

            </div>
        </div>

        <div class="hero-slider-item hero-slider-item-3">
            <div class="hero-slider-contents">

            </div>
        </div>


    </div>



    <a href="#" class="hero-slider-nav prev"><i class="fa fa-angle-left"></i></a>
    <a href="#" class="hero-slider-nav next"><i class="fa fa-angle-right"></i></a>
</section>
<!-- slider end -->
<!-- banner style 2 start -->
<div class="banner-style-2 pt-100">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="banner-style-2-img mb-res">
                    <img src="brands/dior.jpg" alt="">
                    <div class="banner-style-2-dec">



                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="banner-style-2-img mb-res">
                    <img src="brands/jordan.jpg" alt="">
                    <div class="banner-style-2-dec">



                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="banner-style-2-img mb-res">
                    <img src="brands/nike.jpg" alt="">
                    <div class="banner-style-2-dec">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- banner style 2 end -->
<!-- shop area start -->

<!-- shop area start -->
<div class="portfolio-area pt-100 pb-70">
    <div class="container">
        <div class="section-title text-center mb-50">
            <h2>Nouvautés <i class="fa fa-shopping-cart"></i></h2>
        </div>
        <div class="row portfolio-style-2">
            <div class="grid">

                <?php
                foreach ($sneaker as $data) :
                    $percent = ($data['price'] * $data['percent_show']) / 100;
                    $newprice = $data['price'] - $percent;


                ?>

                    <a href="single-product.php?sneaker=<?php echo $data["id"] ?>">

                        <div class="col-md-3 col-sm-6 col-xs-12 mb-30">
                            <div class="single-shop">
                                <div class="shop-img">
                                    <img src="uploads/<?php echo $data["image"] ?>" alt="" />
                                    <div class="shop-quick-view">
                                        <!--<a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
<i class="pe-7s-look"></i>
                                </a> -->
                                    </div>
                                    <div class="price-up-down">
                                        <span class="sale-new"> -<?php echo $data['percent_show'] ?>%<span class="sale-new"> </span>
                                    </div>

                                </div>
                                <div class="shop-text-all">
                                    <div class="title-color fix">
                                        <div class="shop-title f-left">
                                            <h3><?php echo $data["model"] ?></h3>
                                        </div>
                                        <span class="price f-right">
                                            <s><?php echo $data["price"] ?> CHF</s>
                                            <span class="new"> <?php echo $newprice; ?> CHF</span>


                                        </span>

                                    </div>
                                    <a href="call.php"><button class="wishlist-button"><i class="pe-7s-cart"></i></button></a>
                                    <form method="POST" action="add_to_favorites.php">
                                        <input type="hidden" name="favorite_id" value="<?php echo $data['id']; ?>">
                                        <button class="wishlist-button" type="submit">❤</button>



                                    </form>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php
                endforeach
                ?>

            </div>
        </div>
    </div>
</div>
<?php
require_once "footer.php"
?>