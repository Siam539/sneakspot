<?php
session_start();
require_once "header.php";
require_once "DB.php";

$favorites = [];
if (!empty($_SESSION['favorites'])) {
    $ids = implode(',', array_map('intval', $_SESSION['favorites']));
    $sql = "SELECT * FROM sneaker WHERE id IN ($ids)";
    $req = $pdo->prepare($sql);
    $req->execute();
    $favorites = $req->fetchAll();
}
?>

<div class="container pt-100 pb-70">

    <div class="section-title text-center mb-50">
        <h2>Mes Favoris <i class="fa fa-heart"></i></h2>
    </div>
    <div class="row">
        <?php if (empty($favorites)) : ?>
            <p class="text-center">Vous n'avez aucun favori.</p>
        <?php else : ?>
            <?php foreach ($favorites as $data) :
                $percent = ($data['price'] * $data['percent_show']) / 100;
                $newprice = $data['price'] - $percent;
            ?>
                <div class="col-md-3 col-sm-6 col-xs-12 mb-30">
                    <a href="single-product.php?sneaker=<?php echo $data["id"] ?>">
                        <div class="single-shop">
                            <div class="shop-img">
                                <img src="<?php echo $data["image"] ?>" alt="" />
                                <div class="price-up-down">
                                    <span class="sale-new">-<?php echo $data['percent_show'] ?>%</span>
                                </div>
                            </div>
                            <div class="shop-text-all">
                                <div class="title-color fix">
                                    <div class="shop-title f-left">
                                        <h3><?php echo $data["model"] ?></h3>
                                    </div>
                                    <span class="price f-right">
                                        <s><?php echo $data["price"] ?> CHF</s>
                                        <span class="new"><?php echo $newprice; ?> CHF</span>
                                    </span>
                                </div>
                                <a href="call.php"><button class="wishlist-button"><i class="pe-7s-cart"></i></button></a>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
<?php require_once "footer.php"; ?>