<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4>Chi tiet hoa don</h4>
            <form action="?url=cart&act=addCheckout" method="post">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="checkout__input">
                                    <p>Ho ten<span>*</span></p>
                                    <input type="text" name="name" required>
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Dia chi<span>*</span></p>
                            <input type="text" name="address" placeholder="" class="checkout__input__add" required>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Phone<span>*</span></p>
                                    <input name="phone" type="text" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input name="email" type="email" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Hoa don</h4>
                            <div class="checkout__order__products">San pham<span>Tong tien</span></div>
                            <ul>
                                <?php foreach ($listCart as $item) { ?>
                                <li><?= $item['name'] ?><span><?= number_format($item['price'] * $item['quantity']) ?></span></li>
                                <?php } ?>
                            </ul>
                            <div class="checkout__order__subtotal">Phi ship <span>20,000VND</span></div>
                            <div class="checkout__order__total">Total <span><?= number_format($tongTien + 20000) ?>VND</span></div>
                            <div class="checkout__input__checkbox">
                                <label for="tienmat"> Tiền mặt </label>
                                <input type="radio" checked name="pay" value="0" id="tienmat">
                                <label for="online"> Thanh toán online </label>
                                <input type="radio" name="pay" value="1" id="online">
                            </div>
                            <button type="submit" name="thanhtoan" class="site-btn">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
