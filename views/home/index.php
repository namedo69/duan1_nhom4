
    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Best Product</h2>
                    </div>
                </div>
                <div class="categories__slider owl-carousel">
                     <?php foreach ($getMostComment as $item){ ?>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="admin/upload/AnhNhanBan/product/<?= $item['image'] ?>" alt=""">
                            <h5><a href="?url=product&act=detail&id=<?= $item['product_id'] ?>" class="latest-product__item"> <h6><?= $item['name'] ?></h6></a></h5>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                <?php foreach ($getNewProduct as $item) { ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="admin/upload/AnhNhanBan/product/<?= $item['image'] ?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="?url=cart&act=addToCart&id=<?= $item['product_id'] ?>"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="?url=product&act=detail&id=<?= $item['product_id'] ?>"><?= $item['name'] ?></a></h6>
                            <h5><?= $item['price'] ?> Vnđ</h5>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <?php foreach ($getLatestProduct as $item) { ?>
                                <a href="?url=product&act=detail&id=<?= $item['product_id'] ?>" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="admin/upload/AnhNhanBan/product/<?= $item['image'] ?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?= $item['name'] ?></h6>
                                        <span><?= $item['price'] ?> Vnđ</span>
                                    </div>
                                </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Views Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <?php foreach ($getProductByView as $item){ ?>
                                <a href="?url=product&act=detail&id=<?= $item['product_id'] ?>" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="admin/upload/AnhNhanBan/product/<?= $item['image'] ?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?= $item['name'] ?></h6>
                                        <span><?= $item['price'] ?> Vnđ</span>
                                    </div>
                                </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Review Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <?php foreach ($getMostComment as $item){ ?>
                                <a href="?url=product&act=detail&id=<?= $item['product_id'] ?>" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="admin/upload/AnhNhanBan/product/<?= $item['image'] ?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?= $item['name'] ?></h6>
                                        <span><?= $item['price'] ?> Vnđ</span>
                                    </div>
                                </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->

   

