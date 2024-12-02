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
                        <tbody id="cart-items">
                            <?php foreach ($listCart as $item) { ?>
                            <tr data-id="<?= $item['id'] ?>">
                                <td class="shoping__cart__item">
                                    <img width="100px" src="admin/upload/AnhNhanBan/product/<?= $item['image'] ?>" alt="">
                                    <h5><?= $item['name'] ?></h5>
                                </td>
                                <td class="shoping__cart__price" data-price="<?= $item['price'] ?>">
                                    <?= number_format($item['price']) ?> VND
                                </td>
                                <td class="shoping__cart__quantity">
                                    <div class="quantity">
                                        <input type="number" min="1" value="<?= $item['quantity'] ?>" class="quantity-input">
                                    </div>
                                </td>
                                <td class="shoping__cart__total" data-total="<?= $item['price'] * $item['quantity'] ?>">
                                    <?= number_format($item['price'] * $item['quantity']) ?> VND
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
                    <a href="#" class="primary-btn cart-btn cart-btn-right" id="update-cart-btn"><span class="icon_loading"></span> Update Cart</a>
                </div>
            </div>
            <div class="col-lg-6"></div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                        <li>Giá trị đơn <span id="cart-subtotal"><?= number_format($tongTien) ?> VND</span></li>
                        <li>Phí ship <span>20.000 VND</span></li>
                        <li>Tổng tiền <span id="cart-total"><?= number_format($tongTien + 20000) ?> VND</span></li>
                    </ul>
                    <a href="?url=cart&act=checkout" class="primary-btn">Thanh toán</a>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const quantityInputs = document.querySelectorAll('.quantity-input');
    
    quantityInputs.forEach(input => {
        input.addEventListener('input', function () {
            const quantity = parseInt(input.value);
            const row = input.closest('tr');
            const price = parseFloat(row.querySelector('.shoping__cart__price').getAttribute('data-price'));
            const totalCell = row.querySelector('.shoping__cart__total');
            
            // Tính toán lại tổng tiền của sản phẩm
            const newTotal = price * quantity;
            totalCell.textContent = newTotal.toLocaleString('vi-VN') + ' VND'; // Hiển thị với dấu phẩy
            totalCell.setAttribute('data-total', newTotal);

            // Cập nhật lại giá trị giỏ hàng tổng
            updateCartTotal();

            // Gửi yêu cầu cập nhật số lượng lên server
            const itemId = row.getAttribute('data-id');
            updateCartItem(itemId, quantity);
        });
    });

    function updateCartTotal() {
        let subtotal = 0;
        const totalItems = document.querySelectorAll('.shoping__cart__total');
        totalItems.forEach(item => {
            subtotal += parseFloat(item.getAttribute('data-total'));
        });

        const shippingFee = 20000;
        const total = subtotal + shippingFee;

        // Cập nhật lại giá trị tổng với dấu phẩy cho VND
        document.getElementById('cart-subtotal').textContent = subtotal.toLocaleString('vi-VN') + ' VND'; // Dùng dấu phẩy
        document.getElementById('cart-total').textContent = total.toLocaleString('vi-VN') + ' VND'; // Dùng dấu phẩy
    }

    function updateCartItem(id, quantity) {
        fetch(`?url=cart&act=updateCart&id=${id}&quantity=${quantity}`, {
            method: 'GET'
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log('Giỏ hàng đã được cập nhật.');
            }
        })
        .catch(error => console.error('Error:', error));
    }
});

</script>
<style>
    .quantity-input {
    border: none;            /* Loại bỏ viền */
    outline: none;           /* Loại bỏ outline khi focus */
    box-shadow: none;        /* Loại bỏ bóng (shadow) */
    padding: 5px;            /* Thêm khoảng cách bên trong nếu cần */
    font-size: 18px;         /* Tăng kích thước chữ */
    font-weight: bold;       /* Làm chữ đậm */
    width: 30%;             /* Điều chỉnh chiều rộng của input nếu cần */
    text-align: center;      /* Căn giữa nếu muốn */
}

</style>