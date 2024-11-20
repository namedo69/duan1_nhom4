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
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th style="width: 200px;" class="col-2">ID</th>
                                <th>Tên</th>
                                <th>Giá</th>
                                <th class="col-12">Mô tả</th>
                                <th>Ảnh sản phẩm</th>
                                <th>Số lượt xem</th>
                                <th>Id danh mục</th>
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
                                    <td><img src="../asset/image/<?= $value['image'] ?>" alt="<?= $value['name'] ?>" style="width: 100px; height: auto;"></td>
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
                <a class="btn btn-primary" href="index.php?action=addsanpham">Thêm sản phẩm</a>
            </div>

        </section>
    </div>

    <?php
    include_once("./view/layouts/footer.php");
    ?>