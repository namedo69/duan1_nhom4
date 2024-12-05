<section class="product spad">
    <div class="container">
        <div class="row">
            <!-- Sidebar Section -->
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <!-- Department Filter -->
                    <div class="sidebar__item">
                        <h4>Danh mục</h4>
                        <ul>
                            <?php foreach ($listCategory as $item){ ?>
                                <li><a href="?url=category&act=detail&id=<?= $item['category_id'] ?>"><?= $item['name'] ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>

                    <!-- Price Range Filter -->
                    <div class="sidebar__item">
                        <h4>Giá</h4>
                        <div class="price-range-wrap">
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                 data-min="10" data-max="540">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount" placeholder="Từ">
                                    <input type="text" id="maxamount" placeholder="Đến">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Color Filter -->
                    <div class="sidebar__item sidebar__item__color--option">
                        <h4>Màu sắc</h4>
                        <div class="sidebar__item__color sidebar__item__color--white">
                            <label for="white">
                                Trắng
                                <input type="radio" id="white">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--gray">
                            <label for="gray">
                                Xám
                                <input type="radio" id="gray">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--red">
                            <label for="red">
                                Đỏ
                                <input type="radio" id="red">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--black">
                            <label for="black">
                                Đen
                                <input type="radio" id="black">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--blue">
                            <label for="blue">
                                Xanh dương
                                <input type="radio" id="blue">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--green">
                            <label for="green">
                                Xanh lá
                                <input type="radio" id="green">
                            </label>
                        </div>
                    </div>

                    <!-- Size Filter -->
                    <div class="sidebar__item">
                        <h4>Size phổ biến</h4>
                        <div class="sidebar__item__size">
                            <label for="large">
                                Lớn
                                <input type="radio" id="large">
                            </label>
                        </div>
                        <div class="sidebar__item__size">
                            <label for="medium">
                                Trung bình
                                <input type="radio" id="medium">
                            </label>
                        </div>
                        <div class="sidebar__item__size">
                            <label for="small">
                                Nhỏ
                                <input type="radio" id="small">
                            </label>
                        </div>
                        <div class="sidebar__item__size">
                            <label for="tiny">
                                Rất nhỏ
                                <input type="radio" id="tiny">
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Results Section -->
            <div class="col-lg-9 col-md-7">
                <h3 class="font-weight-bolder">Kết quả tìm kiếm với "<?= $_GET['keyword'] ?>": </h3>
                <div class="filter__item">
                    <div class="row">
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($result as $item){ ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
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
                                    <h6><a href="?url=product&act=detail&id=<?= $item['product_id'] ?>"><?= $item['name'] ?></a></h6>
                                    <h5><?= number_format($item['price'], 0, '.', ',') ?> VND</h5>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <!-- Pagination -->
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
