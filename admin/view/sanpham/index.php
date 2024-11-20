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
                    <h3>Danh sách sản phẩm</h3>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
            <a class="btn btn-primary" href="index.php?action=addsanpham">Thêm sản phẩm</a>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th class="col-2">ID</th>
                                <th class="col-2">Tên</th>
                                <th class="col-2">Giá</th>
                                <th class="col-2">Mô tả</th>
                                <th class="col-2">Ảnh sản phẩm</th>
                                <th class="col-2">Số lượt xem</th>
                                <th class="col-2">Id danh mục</th>
                                <th class="col-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($listSanPham as $key => $value) {
                                ?>
                                <tr>
                                    <td><?= $value['product_id'] ?></td>
                                    <td><?= $value['name'] ?></td>
                                    <td><?= $value['price'] ?></td>
                                    <td class="col-12"><?= $value['description'] ?></td>
                                    <td><img src="<?= $value['image'] ?>" alt="<?= $value['name'] ?>"></td>
                                    <td><?= $value['view'] ?></td>
                                    <td><?= $value['category_id'] ?></td>
                                    <td>
                                        <div class="d-flex">
                                            <a class="btn btn-secondary" href="index.php?action=editsanpham&id=<?=$value['product_id']?>">Sửa</a>
                                            <?php
                                            if ($value['status'] == 1) {
                                                ?>
                                                <a class="btn btn-danger" href="index.php?action=deletesanpham&id=<?=$value['product_id']?>&status=0">Ẩn</a>
                                                <?php
                                            } else {
                                                ?>
                                                <a class="btn btn-danger" href="index.php?action=deletesanpham&id=<?=$value['product_id']?>&status=1">Hiện</a>
                                                <?php
                                            }
                                            ?>
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