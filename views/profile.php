<div class="profile">
    <div class="container mt-5">
        <div class="row">
            <!-- container_profile -->
            <div class="col-md-4">
                <div class="card" style="width: 100%;">
                    <img src="<?php 
if ($clientInfor['image'] == 'avatarDefault.jpg') {
    // Nếu image là avatarDefault.jpg
    echo 'admin/upload/AnhGoc/client/avatarDefault.jpg';
} else {
    // Nếu image không phải là avatarDefault.jpg
    echo 'admin/upload/AnhNhanBan/client/' . $clientInfor['image'];
}
?>
" class="card-img-top" alt="Hình ảnh người dùng">
                    <div class="card-body">
                        <h5 class="card-title">Thông tin </h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Họ tên: </strong><br><?= $clientInfor['name'] ?></li>
                            <li class="list-group-item"><strong>Email: </strong><br> <?= $clientInfor['email'] ?></li>
                            <li class="list-group-item"><strong>Địa chỉ:</strong><br><?= $clientInfor['address'] ?> </li>
                            <li class="list-group-item"><strong>Ngày sinh:</strong><br><?= $clientInfor['birthday'] ?> </li>
                            <li class="list-group-item"><strong>Số điện thoại:</strong><br><?= $clientInfor['number'] ?></li>
                        </ul>
                        <a href="index.php?url=profile&act=edit&id=<?= $clientInfor['client_id'] ?>" class="btn btn-primary mt-3">Cập nhật thông tin</a>
                    </div>
                </div>
            </div>

            <!-- container_bill -->
            <div class="col-md-8">
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>Lịch sử mua hàng</h3>
                            </div>
                        </div>
                    </div>
                    <section class="section">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th class="col-1">ID</th>
                                            <th class="col-3">Cần thanh toán (VNĐ)</th>
                                            <th class="col-2">Ngày mua</th>
                                            <th class="col-2">Hình thức</th>
                                            <th class="col-2">Trạng thái</th>
                                            <th class="col-1">Action</th>
                                        </tr>
                                    </thead> 
                                    <tbody>
                                        <?php
                                        foreach ($getBillByClientId as $key => $value) {
                                        ?>
                                            <tr>
                                                <td><?= $value['id'] ?></td>
                                                <td><?= $value['total'] ?></td>
                                                <td><?= $value['created_at'] ?></td>
                                                <td>
                                                    <?php
                                                    if ($value['pay'] == 0) {
                                                        echo '<span style="color: blue; font-weight: bold;">Chuyển khoản</span>';
                                                    } else {
                                                        echo '<span style="color: orangered; font-weight: bold;">Tiền mặt</span>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <?php
                                                        if ($value['status'] == 0) {
                                                            echo '<span style="color: red; font-weight: bold;">Chưa thanh toán</span>';               
                                                        } elseif ($value['status'] == 1) {
                                                            echo '<span style="color: green; font-weight: bold;">Đã thanh toán</span>';
                                                        } elseif ($value['status'] == 2) {
                                                            echo '<span style="color: gray; font-weight: bold;">Đã hủy</span>';
                                                        }
                                                        ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a class="btn btn-primary" href="index.php?url=profile&act=billdetail&id=<?= $value['id'] ?>">Chi tiết</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div> <!-- end .row -->
    </div>
</div>
