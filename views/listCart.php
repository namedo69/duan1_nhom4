<!--<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-lg-12 text-center">-->
<!--                <div class="breadcrumb__text">-->
<!--                    <h2>Shopping Cart</h2>-->
<!--                    <div class="breadcrumb__option">-->
<!--                        <a href="./index.html">Home</a>-->
<!--                        <span>Shopping Cart</span>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                        <tr>
                            <th class="shoping__product">Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($listCart as $item) { ?>
                        <tr>
                            <td class="shoping__cart__item">
                                <img width="100px" src="admin/upload/AnhNhanBan/product/<?= $item['image'] ?>" alt="">
                                <h5><?= $item['name'] ?></h5>
                            </td>
                            <td class="shoping__cart__price">
                                $<?= number_format($item['price']) ?>
                            </td>
                            <td class="shoping__cart__quantity">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" value="<?= $item['quantity'] ?>">
                                    </div>
                                </div>
                            </td>
                            <td class="shoping__cart__total">
                                $<?= number_format($item['price'] * $item['quantity']) ?>
                            </td>
                            <td class="shoping__cart__item__close">
                                <a href="?url=cart&act=removeCart&id=<?= $item['id'] ?>"><span class="icon_close"></span></a>
                            </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="http://localhost/duan1_nhom4/index.php?url=product&act=listAll" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                    <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                        Upadate Cart</a>
                </div>
            </div>
            <div class="col-lg-6">

            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                        <li>Giá tri đơn<span><?= number_format($tongTien) ?>VND</span></li>
                        <li>Phi ship<span>20.000VND</span></li>
                        <li>Tong tien<span><?= number_format($tongTien + 20000) ?>VND</span></li>
                    </ul>
                    <a href="?url=cart&act=checkout" class="primary-btn">Thanh toán</a>
                </div>
            </div>
        </div>
    </div>
</section>
