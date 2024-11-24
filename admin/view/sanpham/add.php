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
                    <h3>Thêm sản phẩm</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Thêm sản phẩm</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <form action="index.php?action=addsanpham" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="tenSanPham" class="form-label">Tên sản phẩm</label>
                            <input type="text" class="form-control" name="name" id="tenSanPham">
                        </div>

                        <div class="mb-3">
                            <label for="giaSanPham" class="form-label">Giá sản phẩm</label>
                            <input type="number" class="form-control" name="price" id="giaSanPham">
                        </div>

                        <div class="mb-3">
                            <label for="moTaSanPham" class="form-label">Mô tả sản phẩm</label>
                            <input type="text" class="form-control" name="description" id="moTaSanPham">
                        </div>

                        <div class="mb-3">
                            <label for="anhSanPham" class="form-label">Ảnh sản phẩm</label>
                            <input type="file" class="form-control" name="image" id="anhSanPham">
                        </div>

                        <div class="mb-3">
                            <label for="danhmuc" class="form-label">Tên danh mục</label>
                            <select required class="form-select" name="category_id" id="danhmuc" aria-label="Default select example">
                                <?php
                                foreach ($listDanhMuc as $item) {
                                    ?>
                                    <option value="<?= $item['category_id'] ?>"><?= $item['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <button type="submit" name="add" class="btn btn-primary">Thêm</button>
                    </form> 
                </div>
            </div>
        </section>
    </div>
    <?php
    include_once("./view/layouts/footer.php");
    ?>

    <!-- JavaScript để validate form -->
    <script>
    document.querySelector("form").addEventListener("submit", function (e) {
        // Lấy giá trị các input
        const name = document.querySelector("input[name='name']").value.trim();
        const price = document.querySelector("input[name='price']").value.trim();
        const description = document.querySelector("input[name='description']").value.trim();
        const image = document.querySelector("input[name='image']").value.trim();

        let errorMessage = '';

        // Validate tên sản phẩm (không được rỗng)
        if (name === '') {
            errorMessage += "- Tên sản phẩm không được để trống.\n";
        }

        // Validate giá sản phẩm (phải là số dương)
        if (price === '' || isNaN(price) || Number(price) <= 0) {
            errorMessage += "- Giá sản phẩm phải là một số dương.\n";
        }

        // Validate mô tả sản phẩm (không được rỗng)
        if (description === '') {
            errorMessage += "- Mô tả sản phẩm không được để trống.\n";
        }

        // Validate file ảnh sản phẩm (không được để trống)
        if (image === '') {
            errorMessage += "- Vui lòng chọn ảnh sản phẩm.\n";
        }

        // Nếu có lỗi, chặn form gửi đi và hiển thị thông báo
        if (errorMessage) {
            e.preventDefault();
            alert("Vui lòng thực hiện các yêu cầu sau:\n" + errorMessage);
        }
    });
</script>

</div>
