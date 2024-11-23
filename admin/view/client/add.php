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
                    <p class="text-subtitle text-muted">For user to check they list</p>
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
                    <form action="index.php?action=addclient" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="client" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="client">
                        </div>

                        <div class="mb-3">
                            <label for="client" class="form-label">Password</label>
                            <input type="text" class="form-control" name="password" id="client">
                            <small class="text-muted">Mật khẩu phải có ít nhất 8 ký tự, bao gồm chữ hoa, chữ thường, số và ký tự đặc biệt (như @, #, $, v.v.).</small>
                        </div>

                        <div class="mb-3">
                            <label for="client" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="client">
                        </div>

                        <div class="mb-3">
                            <label for="client" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="client">
                        </div>
                        

                        <div class="mb-3">
                            <label for="client" class="form-label">Avata</label>
                            <input type="file" class="form-control" name="image" id="client">
                        </div>

                        <div class="mb-3">
                            <label for="client" class="form-label">Role</label>
                            <input type="text" class="form-control" name="role" id="client">
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

<script>
    document.querySelector("form").addEventListener("submit", function (e) {
        // Lấy giá trị các input
        const username = document.querySelector("input[name='username']").value.trim();
        const password = document.querySelector("input[name='password']").value.trim();
        const name = document.querySelector("input[name='name']").value.trim();
        const email = document.querySelector("input[name='email']").value.trim();
        const role = document.querySelector("input[name='role']").value.trim();

        let errorMessage = '';

        // Validate tên người dùng (không được rỗng và ít nhất 5 ký tự)
        if (username === '' || username.length < 5) {
            errorMessage += "- Tên người dùng phải có ít nhất 5 ký tự.\n";
        }

        // Validate mật khẩu (phải có ít nhất 6 ký tự và phải bao gồm chữ hoa, chữ thường, số và ký tự đặc biệt)
        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*.,{}()'"~])[A-Za-z\d!@#$%^&*.,{}()'"~]{6,}$/;
        if (password === '' || !passwordRegex.test(password)) {
            errorMessage += "- Mật khẩu phải có ít nhất 6 ký tự, bao gồm chữ hoa, chữ thường, số và ký tự đặc biệt.\n";
        }

        // Validate tên (không được rỗng)
        if (name === '') {
            errorMessage += "- Tên không được để trống.\n";
        }

        // Validate email (định dạng hợp lệ)
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email === '' || !emailRegex.test(email)) {
            errorMessage += "- Email phải đúng định dạng. username@example.com \n";
        }

        // Validate vai trò (không được rỗng)
        if (role === '') {
            errorMessage += "- Vai trò không được để trống.\n";
        }

        // Nếu có lỗi, chặn form gửi đi và hiển thị thông báo
        if (errorMessage) {
            e.preventDefault();
            alert("Vui lòng thực hiện các yêu cầu sau:\n" + errorMessage);
        }
    });
</script>
