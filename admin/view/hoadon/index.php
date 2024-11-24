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
                    <h3>Danh sách hóa đơn</h3>

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
                                <th class="col-1">Id user</th>
                                <th class="col-2">Cần thanh toán (VNĐ)</th>
                                <th class="col-2">Thời gian tạo</th>
                                <th class="col-2">Thời gian cập nhật</th>
                                <th class="col-1">Trạng thái</th>
                                <th class="col-1">Action</th>
                            </tr>
                        </thead> 
                        <tbody>
                            <?php
                            foreach ($listHoaDon as $key => $value) {
                            ?>
                                <tr>
                                    <td><?= $value['id'] ?></td>
                                    <td><?= $value['client_id'] ?></td>
                                    <td><?= $value['total'] ?></td>
                                    <td><?= $value['created_at'] ?></td>
                                    <td><?= $value['updated_at'] ?></td>

                                    <td>
                                        <div class="d-flex">
                                            <?php
                                            if ($value['status'] == 0) {
                                                echo '<span style="color: green; font-weight: bold;">Đã thanh toán</span>';
                                            } elseif ($value['status'] == 1) {
                                                echo '<span style="color: red; font-weight: bold;">Chưa thanh toán</span>';
                                            } elseif ($value['status'] == 2) {
                                                echo '<span style="color: gray; font-weight: bold;">Đã hủy</span>';
                                            }
                                            ?>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="d-flex">
                                            <a class="btn btn-primary" href="index.php?action=cthoadon&id=<?= $value['id'] ?>">Chi tiết</a>
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

    <?php
    include_once("./view/layouts/footer.php");
    ?>