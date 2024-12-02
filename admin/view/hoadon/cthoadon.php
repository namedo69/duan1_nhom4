<?php
include_once("./view/layouts/header.php");
?>
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Chi tiết hóa đơn</h3>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="index.php?action=capnhathoadon">
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên người nhận</label>
                            <input disabled value="<?= $hoaDonChiTiet['name'] ?>" type="text" class="form-control" name="ten"
                                id="name" aria-describedby="name">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Địa chỉ người nhận</label>
                            <input disabled type="text" class="form-control" name="diachi" value="<?= $hoaDonChiTiet['address'] ?>"
                                id="diachi" aria-describedby="name">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Số điện thoại</label>
                            <input disabled type="text" value="<?= $hoaDonChiTiet['phone'] ?>" class="form-control" name="sdt" id="sdt"
                                aria-describedby="name">
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Tổng tiền hàng (VNĐ)</label>
                            <input disabled value="<?= $hoaDonChiTiet['total']-20000 ?>" type="text" class="form-control" value="<?= 1 ?> VNĐ">
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Tiền ship (VNĐ)</label>
                            <input disabled value="20000 " type="text" class="form-control" value="<?= 1 ?> VNĐ">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Số tiền cần thanh toán (VNĐ)</label>
                            <input disabled value="<?= $hoaDonChiTiet['total'] ?>" type="text" class="form-control" value="<?= 1 ?> VNĐ">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Tình trạng thanh toán</label>
                            <select name="status" class="form-select" aria-label="Default select example">
                                <option <?= $hoaDonChiTiet['status'] == 0 ? 'selected' : '' ?> value="0">Chưa thanh toán</option>
                                <option <?= $hoaDonChiTiet['status'] == 1 ? 'selected' : '' ?> value="1">Đã thanh toán</option>
                                <option <?= $hoaDonChiTiet['status'] == 2 ? 'selected' : '' ?> value="2">Đã hủy</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Sản phẩm</h3>
                        </div>
                        <table class="table">

                        <thead>
                                <tr>
                                    <th class="col-2">ID</th>
                                    <th class="col-2">Tên</th>
                                    <th class="col-2">Số lượng</th>
                                    <th class="col-2">Ảnh sản phẩm</th>
                                    <th class="col-2">Giá</th>
                                    <th class="col-2">Tổng</th>
                                </tr>
                            </thead>
                            <tbody> 
                                <?php foreach ($hoaDonInfo as $item) { ?>
                                    <tr>
                                        <td><?= $item['product_id'] ?></td>
                                        <td><?= $item['name'] ?></td>
                                        <td><?= $item['quantity'] ?></td>
                                        <td><img src="<?= $base_url . 'upload/AnhNhanBan/product/' . $item['image'] ?>" width="150px" alt="<?= $item['name'] ?>"></td>
                                        <td><?= number_format($item['price']) ?> VNĐ</td>
                                        <td><?= number_format($item['price'] * $item['quantity']) ?> VNĐ</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <input type="hidden" name="id" value="<?= $hoaDonChiTiet['id'] ?>">
                        <button class="btn btn-primary" name="edit" type="submit">Cập nhật trạng thái</button>
                    </form>
                </div>
            </div>

        </section>
    </div>

    <?php
    include_once("./view/layouts/footer.php");
    ?>