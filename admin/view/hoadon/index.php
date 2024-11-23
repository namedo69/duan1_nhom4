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
                                <th class="col-2">ID</th>
                                <th>client_id</th>
                                <th>total</th>
                                <th>created_at</th>
                                <th>updated_at</th>
                                <th>status</th>
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
                                            if ($value['status'] == 1) {
                                                ?>
                                                <a style="background :red" class="btn btn-danger" href="index.php?action=trangthaihoadon&id=<?=$value['id']?>&status=0">Chưa thanh toán</a>
                                                <?php
                                            } else {
                                                ?>
                                                <a style="background :green" class="btn btn-danger" href="index.php?action=trangthaihoadon&id=<?=$value['id']?>&status=1">Đã thanh toán</a>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                        <a class="btn btn-secondary" href="index.php?action=cthoadon&id=<?=$value['id']?>">Chi tiết</a>
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