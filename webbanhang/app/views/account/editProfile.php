<?php
require_once 'app/helpers/SessionHelper.php';

// Kiểm tra đăng nhập trước khi hiển thị trang
if (!SessionHelper::isLoggedIn()) {
    header('Location: /webbanhang/account/login');
    exit;
}

// Lấy thông tin tài khoản từ controller
$account = isset($account) ? $account : null;
if (!$account) {
    // Nếu không có thông tin tài khoản, chuyển hướng về trang chủ
    header('Location: /webbanhang/product');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa hồ sơ</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
</head>
<body>
    <?php include_once 'app/views/shares/header.php'; ?>
    
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white text-center">
                        <h3 class="mb-0">Chỉnh sửa thông tin tài khoản</h3>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($_SESSION['errors'])): ?>
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    <?php foreach ($_SESSION['errors'] as $error): ?>
                                        <li><?php echo htmlspecialchars($error); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <?php unset($_SESSION['errors']); ?>
                        <?php endif; ?>

                        <?php if (isset($_SESSION['error_message'])): ?>
                            <div class="alert alert-danger"><?php echo htmlspecialchars($_SESSION['error_message']); ?></div>
                            <?php unset($_SESSION['error_message']); ?>
                        <?php endif; ?>

                        <form action="/webbanhang/account/updateProfile" method="POST" enctype="multipart/form-data">
                            <div class="text-center mb-4">
                                <?php if (!empty($account->avatar)): ?>
                                    <img src="/<?php echo htmlspecialchars($account->avatar); ?>" 
                                         id="avatar-preview" 
                                         class="rounded-circle img-thumbnail" 
                                         style="width:120px;height:120px;object-fit:cover;">
                                <?php else: ?>
                                    <div id="avatar-preview" 
                                         class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center mx-auto" 
                                         style="width: 120px; height: 120px;">
                                        <i class="fas fa-user fa-3x"></i>
                                    </div>
                                <?php endif; ?>
                                <input type="hidden" name="existing_avatar" value="<?php echo htmlspecialchars($account->avatar ?? ''); ?>">
                                <div class="custom-file mt-3" style="max-width: 200px; margin: 0 auto;">
                                    <input type="file" class="custom-file-input" id="avatar" name="avatar" accept="image/*">
                                    <label class="custom-file-label" for="avatar">Chọn ảnh đại diện</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Tên đăng nhập</label>
                                <input type="text" class="form-control" value="<?php echo htmlspecialchars($account->username); ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label for="fullname">Họ và tên</label>
                                <input type="text" id="fullname" name="fullname" class="form-control" 
                                       value="<?php echo htmlspecialchars($account->fullname ?? ''); ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control" 
                                       value="<?php echo htmlspecialchars($account->email ?? ''); ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="phone">Số điện thoại</label>
                                <input type="tel" id="phone" name="phone" class="form-control" 
                                       value="<?php echo htmlspecialchars($account->phone ?? ''); ?>" required>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary mr-2">
                                    <i class="fas fa-save"></i> Lưu thay đổi
                                </button>
                                <a href="/webbanhang/account/profile" class="btn btn-secondary mr-2">
                                    <i class="fas fa-arrow-left"></i> Quay lại
                                </a>
                                <a href="/webbanhang/account/logout" class="btn btn-danger">
                                    <i class="fas fa-sign-out-alt"></i> Đăng xuất
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Hiển thị tên file khi chọn ảnh
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
            
            // Xem trước ảnh
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                    $('#avatar-preview').attr('src', e.target.result);
                    $('#avatar-preview').show();
                    $('#avatar-preview').removeClass('bg-secondary').find('i').remove();
                }
                
                reader.readAsDataURL(this.files[0]);
            }
        });
    </script>
</body>
</html>