
<section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="admin/upload/AnhNhanBan/product/<?= $productDetail['image'] ?>" alt="">
                        </div>
<!--                        <div class="product__details__pic__slider owl-carousel">-->
<!--                            <img data-imgbigurl="img/product/details/product-details-2.jpg"-->
<!--                                src="../admin/upload/AnhNhanBan/product/--><?php //= $productDetail['image'] ?><!--" alt="">-->
<!--                        </div>-->
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3><?= $productDetail['name'] ?></h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>
                        <div class="product__details__price">$<?= $productDetail['price'] ?></div>
                        <p><?= $productDetail['description'] ?></p>
                        <div class="product__details__quantity">
                            <form action="?url=cart&act=addToCart" method="post">
                                <input type="hidden" name="id" value="<?= $productDetail['product_id'] ?>">
                                <div class="pro-qty">
                                    <input id="" type="number" name="quantity" value="1" min="1">
                                </div>
                                <button type="submit" class="primary-btn">Thêm vào giỏ hàng</button>
                            </form>
                        <ul>
                            <li><b>Availability</b> <span>In Stock</span></li>
                            <li><b>Lượt xem</b> <span><?= $productDetail['view'] ?></span></li>
                            <li><b>Danh mục</b> <span><?= $productDetail['category_name'] ?></span></li>
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab mb-3">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="" role="tab"
                                   aria-selected="false">Comment</a>
                            </li>
                        </ul>
                        <?php foreach ($listComment as $item) { ?>
                            <div class="row my-3 border rounded-3">
                                <div class="col-sm-3">
                                    <strong><?= $item['name'] ?></strong>
                                    <br>
                                    <?= $item['time'] ?>
                                </div>
                                <div class="col-sm-9">
                                    <p><?= $item['content'] ?></p>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if (isset($_SESSION['user'])) { ?>
                            <form action="" method="post">
                                <h6>Nhập bình luận</h6>
                                <textarea class="form-control" id="content" name="content" placeholder="Bình luận về sản phẩm"></textarea>
                                <div class="float-end mt-2 pt-1 mb-2">
                                    <button type="submit" name="comment" class="btn btn-primary btn-sm">Gửi</button>
                                </div>
                            </form>
                        <?php } else { ?>
                            <div class="text-center">
                                <a href="?url=user&act=login" class="btn btn-primary">Đăng nhập để bình luận</a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Sản phẩm liên quan</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach ($randomProduct as $item) { ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="admin/upload/AnhNhanBan/product/<?= $item['image'] ?>">
                            <ul class="product__item__pic__hover">
                                <form action="?url=cart&act=addToCart" method="post">
                                    <input type="hidden" name="id" value="<?= $item['product_id'] ?>">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="primary-btn">Thêm vào giỏ hàng</button>
                                </form>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="?url=product&act=detail&id="<?= $item['product_id'] ?><?= $item['name'] ?></a></h6>
                            <h5><?= $item['price'] ?>VND</h5>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>