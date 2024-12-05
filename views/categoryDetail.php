<section class="product spad">
    <div class="container">
        <div class="row">
             <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Danh mục</h4> <!-- "Department" -> "Danh mục" -->
                            <ul>
                                <?php foreach ($listCategory as $item){if($item['status']==1){ ?>
                                <li><a href="?url=category&act=detail&id=<?= $item['category_id'] ?>"><?= $item['name'] ?></a></li>
                                <?php }} ?>
                            </ul>
                        </div>
                        <div class="sidebar__item">
                            <h4></h4>
                            <div class="price-range-wrap">
                               
                            </div>
                        </div>
                        <div class="sidebar__item sidebar__item__color--option">
                            
                            
                        </div>
                    </div>
                </div>
            <div class="col-lg-9 col-md-7">
                <h3 class="font-weight-bolder"><?= $categoryDetail['name'] ?></h3> <!-- Tên danh mục sản phẩm -->
                <div class="filter__item">
                    <div class="row">
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($listProductByCategory as $item){if($item['status']==1){ ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="admin/upload/AnhNhanBan/product/<?= $item['image'] ?>">
                                    <ul class="product__item__pic__hover">
                                        <form action="?url=cart&act=addToCart" method="post">
                                            <input type="hidden" name="id" value="<?= $item['product_id'] ?>">
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" class="primary-btn">Thêm vào giỏ hàng</button> <!-- "Add to cart" -> "Thêm vào giỏ hàng" -->
                                        </form>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="?url=product&act=detail&id=<?= $item['product_id'] ?>"><?= $item['name'] ?></a></h6>
                                    <h5>$<?= $item['price'] ?></h5>
                                </div>
                            </div>
                        </div>
                    <?php }} ?>
                </div>
                <div class="product__pagination">
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
