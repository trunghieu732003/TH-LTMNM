<?php include 'app/views/shares/header.php'; ?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h3 class="mb-0">Đăng ký tài khoản</h3>
                </div>
                <div class="card-body">
                    <?php
                    // Hiển thị lỗi tổng hợp
                    if (!empty($errors)) {
                        echo '<div class="alert alert-danger"><ul class="mb-0">';
                        foreach ($errors as $err) {
                            echo '<li>' . htmlspecialchars($err, ENT_QUOTES, 'UTF-8') . '</li>';
                        }
                        echo '</ul></div>';
                    }
                    ?>
                    <form class="user" action="/webbanhang/account/save" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="username">Tên đăng nhập</label>
                            <input type="text" class="form-control" id="username" name="username"
                                value="<?php echo htmlspecialchars($old['username'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                                placeholder="Nhập tên đăng nhập">
                        </div>
                        <div class="form-group">
                            <label for="fullname">Họ và tên</label>
                            <input type="text" class="form-control" id="fullname" name="fullname"
                                value="<?php echo htmlspecialchars($old['fullname'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                                placeholder="Nhập họ và tên">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="<?php echo htmlspecialchars($old['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                                placeholder="Nhập email">
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                value="<?php echo htmlspecialchars($old['phone'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                                placeholder="Nhập số điện thoại">
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Nhập mật khẩu">
                        </div>
                        <div class="form-group">
                            <label for="confirmpassword">Xác nhận mật khẩu</label>
                            <input type="password" class="form-control" id="confirmpassword" name="confirmpassword"
                                placeholder="Nhập lại mật khẩu">
                        </div>
                        <div class="form-group">
                            <label for="avatar">Ảnh đại diện (tùy chọn)</label>
                            <input type="file" class="form-control-file" id="avatar" name="avatar" accept="image/*">
                        </div>
                        <div class="form-group text-center mt-4">
                            <button class="btn btn-primary btn-block" type="submit">Đăng ký</button>
                        </div>
                        <div class="text-center">
                            <a href="/webbanhang/account/login">Đã có tài khoản? Đăng nhập</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'app/views/shares/footer.php'; ?>