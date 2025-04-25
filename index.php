<?php
    include 'layout/header.php';
    include 'lib/ClientHome.php';

    $homePage = new ClientHome();
?>

<main class="mt-2">
    <div class="slider">
        <div id="carouselExampleRide" class="carousel slide slider" data-bs-ride="true">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="d-flex align-items-center justify-content-around">
                        <img src="asset/img/pic1.webp" class="d-block w-60 slide-img" alt="...">
                        <div class="slide-img right-containeer">
                            <h1>BDT:120</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate voluptatibus,
                                error eligendi aspernatur esse illo itaque magnam odit maiores enim. Lorem ipsum
                                dolor sit amet consectetur adipisicing elit. Incidunt, earum molestiae odit fugiat
                                in optio!
                            </p>
                            <h3>Stock: Available</h3>
                            <a href="" target="_blank">
                                <button class="order-button">Order Now</button>
                            </a>
                            <br /><br />
                            <span>Add to card:</span>
                            <a href="" target="_blank">
                                <i class="fa-sharp fa-solid fa-cart-plus fa-2xl" style="color: #74C0FC;"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-flex align-items-center justify-content-around">
                        <img src="asset/img/pic2.webp" class="d-block w-60 slide-img" alt="...">
                        <div class="slide-img right-containeer">
                            <h1>BDT:120</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate voluptatibus,
                                error eligendi aspernatur esse illo itaque magnam odit maiores enim. Lorem ipsum
                                dolor sit amet consectetur adipisicing elit. Incidunt, earum molestiae odit fugiat
                                in optio!
                            </p>
                            <h3>Stock: Available</h3>
                            <a href="" target="_blank">
                                <button class="order-button">Order Now</button>
                            </a>
                            <br /><br />
                            <span>Add to card:</span>
                            <a href="" target="_blank">
                                <i class="fa-sharp fa-solid fa-cart-plus fa-2xl" style="color: #74C0FC;"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-flex align-items-center justify-content-around">
                        <img src="asset/img/pic3.jpg" class="d-block w-60 slide-img" alt="...">
                        <div class="slide-img right-containeer">
                            <h1>BDT:120</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate voluptatibus,
                                error eligendi aspernatur esse illo itaque magnam odit maiores enim. Lorem ipsum
                                dolor sit amet consectetur adipisicing elit. Incidunt, earum molestiae odit fugiat
                                in optio!
                            </p>
                            <h3>Stock: Available</h3>
                            <a href="" target="_blank">
                                <button class="order-button">Order Now</button>
                            </a>
                            <br /><br />
                            <span>Add to card:</span>

                            <a href="" target="_blank">

                                <i class="fa-sharp fa-solid fa-cart-plus fa-2xl" style="color: #74C0FC;"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-flex align-items-center justify-content-around">
                        <img src="asset/img/pic4.webp" class="d-block w-60 slide-img" alt="...">
                        <div class="slide-img right-containeer">
                            <h1>BDT:120</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate voluptatibus,
                                error eligendi aspernatur esse illo itaque magnam odit maiores enim. Lorem ipsum
                                dolor sit amet consectetur adipisicing elit. Incidunt, earum molestiae odit fugiat
                                in optio!
                            </p>
                            <h3>Stock: Available</h3>
                            <a href="" target="_blank">
                                <button class="order-button">Order Now</button>
                            </a>
                            <br /><br />
                            <span>Add to card:</span>
                            <a href="" target="_blank">
                                <i class="fa-sharp fa-solid fa-cart-plus fa-2xl" style="color: #74C0FC;"></i>
                            </a>


                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</main>
<content>

    <!--featured category Start-->

    <div class="category">
        <h2 class="title">Category</h2>
        <div class="card-wrapper">
            <?php
                $getCategories = $homePage->latestCategory();
                if($getCategories) {
                    while($categoryRow = $getCategories->fetch_assoc()){
            ?>

            <div class="card">
                <div class="overly">
                    <a href="product.php?category_id=<?php echo $categoryRow['id']?>"><?= $categoryRow['name'] ?></a>
                </div>
                <img src="<?= BASE_URL . '/swadeshi-ecommerce/uploads/' . $categoryRow['image']; ?>"
                    alt="<?= $categoryRow['name'] ?>">
            </div>
            <?php }} ?>

        </div>
    </div>

    <!--featured category ends-->


    <!--featured product start-->
    <div class="small-container">
        <h2 class="title">Featured Product</h2>
        <div class="row">
            <?php
                $fetuareProduct = $homePage->getFeaturedProducts();
                if($fetuareProduct) {
                    while($product = $fetuareProduct->fetch_assoc()){
            ?>
            <div class="col-4">
                <img src="<?= BASE_URL . '/swadeshi-ecommerce/uploads/' . $product['image']; ?>"
                    alt="<?= $product['product_name'] ?>">
                <a href="product_details.php?product_id=<?php echo $product['id']?>">
                    <h4><?= $product['product_name'] ?></h4>
                </a>
                <div class="rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <p>৳ <?= $product['price'] ?></p>
            </div>
            <?php }} ?>

        </div>
        <!--Featured product ends -->


        <!--Latest Product-->

        <h2 class="title">Latest Product</h2>
        <div class="row">

            <?php
                $latestProduct = $homePage->getFeaturedProducts();
                if($latestProduct) {
                    while($product = $latestProduct->fetch_assoc()){
            ?>

            <div class="col-4">
                <img src="<?= BASE_URL . '/swadeshi-ecommerce/uploads/' . $product['image']; ?>"
                    alt="<?= $product['product_name'] ?>">

                <a href="product_details.php?product_id=<?php echo $product['id']?>">
                    <h4><?= $product['product_name'] ?></h4>
                </a>

                <div class="rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <p>৳ <?= $product['price'] ?></p>
            </div>

            <?php }} ?>
        </div>

    </div>
    <!--Latest product ends-->

</content>
<?php
include 'layout/footer.php';
?>