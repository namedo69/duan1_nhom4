<?php


// Xử lý form khi người dùng submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Kiểm tra dữ liệu nhập
    $errors = [];

    // Validate tên
    if (empty($name)) {
        $errors[] = "Họ tên không được để trống.";
    }

    // Validate email
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email không hợp lệ.";
    }

    // Validate mật khẩu
    if (strlen($password) < 8 || 
        !preg_match('/[A-Z]/', $password) || 
        !preg_match('/[a-z]/', $password) || 
        !preg_match('/[0-9]/', $password) || 
        !preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password)) {
        $errors[] = "Mật khẩu phải dài ít nhất 8 ký tự, bao gồm chữ hoa, chữ thường, số và ký tự đặc biệt.";
    }

    if (empty($errors)) {
        // Xử lý logic đăng ký (giả định thành công)
        $script = "<script> 
    alert('Đăng kí tài khoản thành công!');
    window.location = 'index.php?url=user&act=login';
    </script>";
    echo $script; // Refresh lại trang để tránh form resubmission
        exit;
    } else {
        $_SESSION['error'] = implode('<br>', $errors);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
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

    <script>
        document.querySelector("form").addEventListener("submit", function (e) {
            const password = document.querySelector("input[name='password']").value.trim();
            let errorMessage = '';

            // Validate mật khẩu trên client
            const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*(),.?":{}|<>]).{8,}$/;
            if (!passwordRegex.test(password)) {
                errorMessage += "- Mật khẩu phải dài ít nhất 8 ký tự, bao gồm chữ hoa, chữ thường, số và ký tự đặc biệt.\n";
            }

            // Nếu có lỗi, chặn submit
            if (errorMessage) {
                e.preventDefault();
                alert("Vui lòng thực hiện các yêu cầu sau:\n" + errorMessage);
            }
        });
    </script>
</body>
</html>
