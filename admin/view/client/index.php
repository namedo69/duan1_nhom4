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
                    <h3>Danh sách người dùng</h3>
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
                                <th class="col-3">Tên người dùng</th>
                                <th class="col-2">Mật khẩu</th>
                                <th class="col-2">Họ và tên</th>
                                <th class="col-2">Email</th>
                                <th class="col-2">Ảnh đại diện</th>
                                <th class="col-2">Vai trò</th>
                                <th class="col-2">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($listClient as $key => $value) {
                                ?>
                                <tr>
                                    <td><?= $value['client_id'] ?></td>
                                    <td><?= $value['username'] ?></td>
                                    <td><?= $value['password'] ?></td>
                                    <td><?= $value['name'] ?></td>
                                    <td><?= $value['email'] ?></td>
                                    <td><img src="<?php 
if ($value['image'] == 'avatarDefault.jpg') {
    // Nếu image là avatarDefault.jpg
    echo 'upload/AnhGoc/client/avatarDefault.jpg';
} else {
    // Nếu image không phải là avatarDefault.jpg
    echo 'upload/AnhNhanBan/client/' . $value['image'];
}
?>" width="150px" alt="<?= $value['name'] ?>"></td>
                                    <td><?= $value['role'] == 0 ? 'Admin' : 'User'; ?></td>

                                    <td>
                                        <div class="d-flex gap-2">
                                            <a class="btn btn-primary" href="index.php?action=editclient&id=<?=$value['client_id']?>">Sửa</a>
                                            <?php
                                            if ($value['status'] == 1) {
                                                ?>
                                                <a class="btn btn-danger" href="index.php?action=deleteclient&id=<?=$value['client_id']?>&status=0">Ban</a>
                                                <?php
                                            } else {
                                                ?>
                                                <a class="btn btn-success" href="index.php?action=deleteclient&id=<?=$value['client_id']?>&status=1">UnBan</a>
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
