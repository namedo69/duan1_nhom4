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
                    <!-- Form chỉnh sửa sản phẩm -->
                    <form action="index.php?action=editsanpham" method="post" onsubmit="handlePlaceholderValues(this)" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="sanpham_name" class="form-label">Tên sản phẩm</label>
                            <input type="text" 
                                   placeholder="<?= $sanphamInfo['name'] ?>" 
                                   class="form-control" 
                                   name="name" 
                                   id="sanpham_name">
                                  
                        </div>
                        <div class="mb-3">
                            <label for="sanpham_price" class="form-label">Giá sản phẩm</label>
                            <input type="text" 
                                   placeholder="<?= $sanphamInfo['price'] ?>" 
                                   class="form-control" 
                                   name="price" 
                                   id="sanpham_price">
                                  
                        </div>
                        <div class="mb-3">
                            <label for="sanpham_description" class="form-label">Mô tả sản phẩm</label>
                            <input type="text" 
                                   placeholder="<?= $sanphamInfo['description'] ?>" 
                                   class="form-control" 
                                   name="description" 
                                   id="sanpham_description">
                        </div>
                        <div class="mb-3">
                            <label for="sanpham_image" class="form-label">Ảnh sản phẩm</label>
                            <div>
                                <img src="<?= $base_url . 'upload/AnhNhanBan/product/' . $sanphamInfo['image'] ?>" width="150px" alt="<?= $sanphamInfo['name'] ?>" style="max-width: 150px;">
                            </div>
                            <input type="file" 
                                   class="form-control" 
                                   name="image" 
                                   id="sanpham_image">
                        </div>
                        <div class="mb-3">
                            <label for="danhmuc" class="form-label">Tên danh mục</label>
                            <select required class="form-select" name="category_id" aria-label="Default select example">
                                <?php
                                foreach ($listDanhMuc as $item) {
                                    $selected = $item['category_id'] == $sanphamInfo['category_id'] ? 'selected' : '';
                                    ?>
                                    <option value="<?= $item['category_id'] ?>" <?= $selected ?>><?= $item['name'] ?></option>
                                <?php } ?>
                            </select>
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

    <!-- JavaScript xử lý -->
    <script>
        function handlePlaceholderValues(form) {
            const inputs = form.querySelectorAll('input[type="text"]');
            inputs.forEach(input => {
                if (!input.value.trim()) {
                    input.value = input.placeholder; // Gán giá trị placeholder nếu trống
                }
            });
        }
    </script>
</div>
