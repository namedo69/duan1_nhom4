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
                    <h3>Sửa thông tin người dùng</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sửa thông tin</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <form action="index.php?action=editclient" method="post" enctype="multipart/form-data" onsubmit="handlePlaceholderValues(this)">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" placeholder="<?= $clientInfor['username'] ?>" class="form-control" name="username" id="username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" placeholder="<?= $clientInfor['password'] ?>" class="form-control" name="password" id="password">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" placeholder="<?= $clientInfor['name'] ?>" class="form-control" name="name" id="name">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" placeholder="<?= $clientInfor['email'] ?>" class="form-control" name="email" id="email">
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Avata</label>
                            <div>
                                <img src="<?= $base_url . 'upload/AnhNhanBan/client/'.$clientInfor['image'] ?>" width="150px" alt="Avatar">
                            </div>
                            <input type="file" class="form-control" name="image" id="image">
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <input type="text" placeholder="<?= $clientInfor['role'] ?>" class="form-control" name="role" id="role">
                        </div>
                        <input type="hidden" value="<?= $clientInfor['client_id'] ?>" name="id">
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
            const inputs = form.querySelectorAll('input[type="text"], input[type="password"], input[type="email"]');
            inputs.forEach(input => {
                if (!input.value.trim()) {
                    input.value = input.placeholder; // Gán giá trị placeholder nếu trống
                }
            });
        }

        document.querySelector("form").addEventListener("submit", function (e) {
        // Lấy giá trị các input
        const username = document.querySelector("input[name='username']").value.trim();
        const password = document.querySelector("input[name='password']").value.trim();
        const name = document.querySelector("input[name='name']").value.trim();

        let errorMessage = '';

        // Validate tên người dùng (không được rỗng và ít nhất 5 ký tự)
        if (username.length < 5) {
            errorMessage += "- Tên người dùng phải có ít nhất 5 ký tự.\n";
        }

        // Validate mật khẩu (phải có ít nhất 6 ký tự và phải bao gồm chữ hoa, chữ thường, số và ký tự đặc biệt)
        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*.,{}()'"~])[A-Za-z\d!@#$%^&*.,{}()'"~]{6,}$/;
        if (!passwordRegex.test(password)) {
            errorMessage += "- Mật khẩu phải có ít nhất 6 ký tự, bao gồm chữ hoa, chữ thường, số và ký tự đặc biệt.\n";
        }

        // Validate tên (không được rỗng)
        if (username.length < 5) {
            errorMessage += "- Tên phải có ít nhất 5 ký tự.\n";
        }

        // Nếu có lỗi, chặn form gửi đi và hiển thị thông báo
        if (errorMessage) {
            e.preventDefault();
            alert("Vui lòng thực hiện các yêu cầu sau:\n" + errorMessage);
        }
    });
    </script>
</div>
