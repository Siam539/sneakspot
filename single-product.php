<?php

if (isset($_GET["sneaker"])) {
    $id = $_GET["sneaker"];
} else {

    header("Location: index.php");
    exit;
}

//Header - Footer - DB connection 
require_once "header.php";
require_once "DB.php";

// SQL last id sneaker

$sql = "SELECT * FROM sneaker WHERE id = :id";
$statement = $pdo->prepare($sql);
$param = [':id' => $id];
$statement->execute($param);
$sneaker = $statement->fetch(PDO::FETCH_ASSOC);
$percent = ($sneaker['price'] * $sneaker['percent_show']) / 100;
$newprice = $sneaker['price'] - $percent;


$sqlimage = "SELECT * FROM product_images WHERE product_id = :id";
$req = $pdo->prepare($sqlimage);
$req->execute($param);
$productimage = $req->fetchAll();

?>

<!-- header end -->
<!-- mobile-menu-area start -->

<!-- mobile-menu-area end -->
<!-- breadcrumbs start -->
<div class="breadcrumbs-area breadcrumb-bg ptb-1">
    <div class="container">
        <div class="breadcrumbs text-center">
            <h2 class="breadcrumb-title"><?php echo $sneaker["model"] ?></h2>
            <ul>

                <li>SneakSpot</li>
            </ul>
        </div>
    </div>
</div>
<!-- breadcrumbs area end -->
<!-- single product area start -->
<div class="single-product-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="product-details-tab">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <?php foreach ($productimage as $key => $image) :
                        ?>
                            <div class="tab-pane <?php echo $key == "0" ? "active" : "" ?> " id="product<?php echo $key ?>">
                                <div class="large-img">
                                    <img src="uploads/<?php echo $image["image"] ?>" alt="" />
                                </div>
                            </div>
                        <?php
                        endforeach
                        ?>

                    </div>



                    <!-- Nav tabs -->
                    <div class="details-tab owl-carousel">
                        <?php foreach ($productimage as $key => $image) : ?>
                            <div class=""><a href="#product<?php echo $key ?>" data-toggle="tab"><img src="uploads/<?php echo $image["image"] ?>" alt="" /></a></div>
                        <?php
                        endforeach
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="single-product-content">
                    <div class="single-product-dec pb-30  for-pro-border">
                        <h2><?php echo $sneaker["model"] ?> </h2>
                        <span class="ratting">
                            <i class="fa fa-star active"></i>
                            <i class="fa fa-star active"></i>
                            <i class="fa fa-star active"></i>
                            <i class="fa fa-star active"></i>
                            <i class="fa fa-star active"></i>
                        </span>
                        <h2 class="sl30">-<?php echo $sneaker['percent_show'] ?>%</h2>
                        <br>

                        <h4><s><?php echo $sneaker['price'] ?> CHF</s></h4>

                        <h2><?php echo $newprice ?> CHF</h2>


                    </div>
                    <div class="single-cart-color for-pro-border">

                        <p>Disponibilité : <span><?php echo $sneaker["date"] ?></span> </p>
                        <p>Taille : <span><?php echo $sneaker["size"] ?></span></p>

                        <div class="single-pro-cart">
                            <a href="call.php" title="Add to Cart">
                                <i class="pe-7s-cart"></i>
                                Acheter
                            </a>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<!-- single product area end -->
<!-- single product area end -->
<div class="single-product-dec-area">
    <div class="container">



    </div>
</div>


<div class="quick-view modal fade in" id="quick-view">
    <div class="container">
        <div class="row">
            <div id="view-gallery">
                <div class="col-xs-12">
                    <div class="d-table">
                        <div class="d-tablecell">
                            <div class="modal-dialog">
                                <div class="main-view modal-content">
                                    <div class="modal-footer" data-dismiss="modal">
                                        <span>x</span>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-5">
                                            <div class="quick-image">
                                                <div class="single-quick-image tab-content text-center">
                                                    <div class="tab-pane  fade in active" id="sin-pro-1">
                                                        <img src="assets/img/shop/q1.jpg" alt="" />
                                                    </div>
                                                    <div class="tab-pane fade in" id="sin-pro-2">
                                                        <img src="assets/img/shop/q2.jpg" alt="" />
                                                    </div>
                                                    <div class="tab-pane fade in" id="sin-pro-3">
                                                        <img src="assets/img/shop/q3.jpg" alt="" />
                                                    </div>
                                                    <div class="tab-pane fade in" id="sin-pro-4">
                                                        <img src="assets/img/shop/q4.jpg" alt="" />
                                                    </div>
                                                </div>
                                                <div class="quick-thumb">
                                                    <div class="nav nav-tabs">
                                                        <ul>
                                                            <li><a data-toggle="tab" href="#sin-pro-1"> <img src="assets/img/shop/q1.jpg" alt="quick view" /> </a></li>
                                                            <li><a data-toggle="tab" href="#sin-pro-2"> <img src="assets/img/shop/q2.jpg" alt="quick view" /> </a></li>
                                                            <li><a data-toggle="tab" href="#sin-pro-3"> <img src="assets/img/shop/q3.jpg" alt="quick view" /> </a></li>
                                                            <li><a data-toggle="tab" href="#sin-pro-4"> <img src="assets/img/shop/q4.jpg" alt="quick view" /> </a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-7">
                                            <div class="quick-right">
                                                <div class="quick-right-text">
                                                    <h3><strong>PC Headphone</strong></h3>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="amount">
                                                        <h4>$65.00</h4>
                                                    </div>
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has beenin the stand ard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrames bled it make a type specimen book.</p>
                                                    <div class="row m-p-b">
                                                        <div class="col-sm-12 col-md-6">
                                                            <div class="por-dse responsive-strok clearfix">
                                                                <ul>
                                                                    <li><span>Availability</span><strong>:</strong> In stock</li>
                                                                    <li><span>Condition</span><strong>:</strong> New product</li>
                                                                    <li><span>Category</span><strong>:</strong> <a href="#">Men</a> <a href="#">Fashion</a> <a href="#">Shirt</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6">
                                                            <div class="por-dse color">
                                                                <ul>
                                                                    <li><span>color</span><strong>:</strong> <a href="#">Red</a> <a href="#">Green</a> <a href="#">Blue</a></li>
                                                                    <li><span>size</span><strong>:</strong> <a href="#">SL</a> <a href="#">SX</a> <a href="#">M</a> <a href="#">XL</a></li>
                                                                    <li><span>tag</span><strong>:</strong> <a href="#">Men</a> <a href="#">Fashion</a> <a href="#">Shirt</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="dse-btn">
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="por-dse clearfix">
                                                                    <ul>
                                                                        <li class="share-btn clearfix"><span>quantity</span>
                                                                            <input class="input-text qty" name="qty" maxlength="12" value="1" title="Qty" type="text">
                                                                        </li>
                                                                        <li class="share-btn clearfix hidden-xs"><span>share</span>
                                                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                                                            <a href="#"><i class="fa fa-google-plus"></i></a>
                                                                            <a href="#"><i class="fa fa-linkedin"></i></a>
                                                                            <a href="#"><i class="fa fa-instagram"></i></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="por-dse add-to">
                                                                    <a href="#">add to cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- quick view end -->
<?php
require_once "footer.php"
?>