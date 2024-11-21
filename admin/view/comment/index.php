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
                    <h3>Danh sách bình luận</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                         <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">DataTable</li>@
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th class="col-2">Comment_id</th>
                                <th class="col-2">Product_id</th>
                                <th class="col-2">Client_id</th>
                                <th class="col-2">Content</th>
                                <th class="col-2">Time</th>
                                <th class="col-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($listComment as $key => $value) {
                                ?>
                                <tr>
                                    <td><?= $value['comment_id'] ?></td>
                                    <td><?= $value['product_id'] ?></td>
                                    <td><?= $value['client_id'] ?></td>
                                    <td><?= $value['content'] ?></td>
                                    <td><?= $value['time'] ?></td>
                                    <td>
                                        <div class="d-flex">
                                            <a class="btn btn-danger" 
                                               href="?action=deletecomment&id=<?= $value['comment_id'] ?>" 
                                               onclick="return confirm('Bạn có chắc chắn muốn xóa bình luận này không?');">
                                               Xóa
                                            </a>
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
