<div id="main">
   

    <div class="container col-3">
       <div class="row">
       <div class="page-title col-4">
            <div class="row">
                <div class="col-12">
                    <h3>Chi tiết hóa đơn</h3>
                </div>
            </div>
            <div class="card-body col-12">
                    
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
                </div>
        </div>
   
            <div class="col-8 mt-5">
                <div>
                
                        <table class="table">

                        <thead>
                                <tr>
                                    <th class="col-1">ID</th>
                                    <th class="col-3">Tên</th>
                                    <th class="col-2">Số lượng</th>
                                    <th class="col-3">Ảnh sản phẩm</th>
                                    <th class="col-2">Giá</th>
                                    <th class="col-1">Tổng</th>
                                </tr>
                            </thead>
                            <tbody> 
                                <?php foreach ($hoaDonInfo as $item) { ?>
                                    <tr>
                                        <td><?= $item['product_id'] ?></td>
                                        <td><?= $item['name'] ?></td>
                                        <td><?= $item['quantity'] ?></td>
                                        <td><img src="<?='http://localhost/duan1_nhom4/admin/upload/AnhNhanBan/product/' . $item['image'] ?>" width="150px" alt="<?= $item['name'] ?>"></td>
                                        <td><?= number_format($item['price']) ?> VNĐ</td>
                                        <td><?= number_format($item['price'] * $item['quantity']) ?> VNĐ</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                </div>
            </div>
       </div>
       <a href="http://localhost/duan1_nhom4/index.php?url=profile&act=detail" class="btn btn-primary mt-3">Trở lại trang thông tin</a>
    </div>