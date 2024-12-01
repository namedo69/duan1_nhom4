<form method="post" class="w-25 m-auto">
    <h3 class="text-center font-semibold">Đăng nhập</h3>
    <?php if (isset($_SESSION['error'])) { ?>
        <div class="alert alert-danger" role="alert">
            <?= $_SESSION['error']; ?>
        </div>
    <?php } unset($_SESSION['error']) ?>
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" name="username" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" required>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary">Xác nhận</button>
    </div>
    <div class="row mt-3">
        <div class="col-md-5 text-start">
            Chưa có tài khoản?
        </div>
        <div class="col-md-7 text-right">
            <a class="dangki" href="?url=user&act=register">Đăng kí</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-5 text-start">
            Quản trị viên?
        </div>
        <div class="col-md-7 text-right">
        <a class="admin" href="http://localhost/duan1_nhom4/admin/">Quản lí</a>
        </div>
    </div>
</form>

