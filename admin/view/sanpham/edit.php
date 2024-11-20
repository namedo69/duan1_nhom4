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
                    <h3>Sửa danh mục</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sửa danh mục</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <form action="index.php?action=editsanpham" method="post">
                        <div class="mb-3">
                            <label for="sanpham" class="form-label">Tên sản phẩm</label>
                            <input type="text" placeholder="<?= $sanphamInfo['name'] ?>" class="form-control" name="name" id="sanpham">
                        </div>
                        <div class="mb-3">
                            <label for="sanpham" class="form-label">Giá sản phẩm</label>
                            <input type="text" placeholder="<?= $sanphamInfo['price'] ?>" class="form-control" name="price" id="sanpham">
                        </div>
                        <div class="mb-3">
                            <label for="sanpham" class="form-label">Mô tả sản phẩm</label>
                            <input type="text" placeholder="<?= $sanphamInfo['description'] ?>" class="form-control" name="description" id="sanpham">
                        </div>
                        <div class="mb-3">
                            <label for="sanpham" class="form-label">Ảnh sản phẩm</label>
                            <td><img src="<?= $sanphamInfo['image'] ?>" alt="<?= $sanphamInfo['name'] ?>"></td>
                            <input type="file" class="form-control" name="image" id="sanpham">
                        </div>
                        <div class="mb-3">
                            <label for="sanpham" class="form-label">Mã danh mục</label>
                            <input type="text" placeholder="<?= $sanphamInfo['category_id'] ?>" class="form-control" name="category_id" id="sanpham">
                        </div>
                        <input type="hidden" value="<?= $sanphamInfo['product_id'] ?>" name="id">
                        <button type="submit" name="edit" class="btn btn-primary">Sửa</button>
                    </form> 
                </div>
            </div>

        </section>
    </div>
    <?php
    include_once("./view/layouts/footer.php");
    ?>