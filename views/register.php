<form method="post" class="w-25 m-auto mt-5">
    <h3 class="text-center font-semibold">Đăng ký</h3>

    <!-- Thông báo lỗi -->
    <?php if (isset($_SESSION['error'])) { ?>
        <div class="alert alert-danger" role="alert">
            <?= $_SESSION['error']; ?>
        </div>
    <?php unset($_SESSION['error']); } ?>

    <!-- Thông báo thành công -->
    <?php if (isset($_SESSION['success'])) { ?>
        <div class="alert alert-success" role="alert">
            <?= $_SESSION['success']; ?>
        </div>
    <?php unset($_SESSION['success']); } ?>

    <div class="mb-3">
        <label for="name" class="form-label">Họ tên</label>
        <input type="text" class="form-control" name="name" required>
    </div>
    <div class="mb-3">
        <label for="username" class="form-label">Tên đăng nhập</label>
        <input type="text" class="form-control" name="username" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mật khẩu</label>
        <input type="password" class="form-control" name="password" required>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary">Xác nhận</button>
    </div>
    <div class="row mt-3">
        <div class="col-md-5 text-start">
            Đã có tài khoản
        </div>
        <div class="col-md-7 text-end">
            <a class="text-decoration-none font-semibold" href="?url=user&act=login">Đăng nhập</a>
        </div>
    </div>
</form>
