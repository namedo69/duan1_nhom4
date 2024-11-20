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
                    <h3>Thêm danh mục</h3>
                    <p class="text-subtitle text-muted">For user to check they list</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Thêm danh mục</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <form action="index.php?action=adddanhmuc" method="post">
                        <div class="mb-3">
                            <label for="danhmuc" class="form-label">Tên danh mục</label>
                            <input type="text" class="form-control" name="name" id="danhmuc">
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