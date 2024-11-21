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
                    <form action="index.php?action=editclient" method="post">
                        <div class="mb-3">
                            <label for="client" class="form-label">Username</label>
                            <input type="text" placeholder="<?= $clientInfo['username'] ?>" class="form-control" name="username" id="client">
                        </div>
                        <div class="mb-3">
                            <label for="client" class="form-label">Password</label>
                            <input type="text" placeholder="<?= $clientInfo['password'] ?>" class="form-control" name="password" id="client">
                        </div>
                        <div class="mb-3">
                            <label for="client" class="form-label">Name</label>
                            <input type="text" placeholder="<?= $clientInfo['name'] ?>" class="form-control" name="name" id="client">
                        </div>

                        <div class="mb-3">
                            <label for="client" class="form-label">Email</label>
                            <input type="text" placeholder="<?= $clientInfo['email'] ?>" class="form-control" name="email" id="client">
                        </div>

                        <div class="mb-3">
                            <label for="client" class="form-label">Avata</label>
                            <td><img src="<?= $clientInfo['image'] ?>" alt="<?= $clientInfo['name'] ?>"></td>
                            <input type="file" class="form-control" name="image" id="client">
                        </div>
                        <div class="mb-3">
                            <label for="client" class="form-label">Role</label>
                            <input type="text" placeholder="<?= $clientInfo['role'] ?>" class="form-control" name="role" id="client">
                        </div>
                        <input type="hidden" value="<?= $clientInfo['client_id'] ?>" name="id">
                        <button type="submit" name="edit" class="btn btn-primary">Sửa</button>
                    </form> 
                </div>
            </div>

        </section>
    </div>
    <?php
    include_once("./view/layouts/footer.php");
    ?>