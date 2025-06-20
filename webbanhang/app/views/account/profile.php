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
    <title>Hồ sơ cá nhân</title>
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
                        <h3 class="mb-0">Thông tin tài khoản</h3>
                    </div>
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <?php if (!empty($account->avatar)): ?>
                                <img src="/<?php echo htmlspecialchars($account->avatar); ?>" alt="Avatar" class="rounded-circle" style="width:120px;height:120px;object-fit:cover;">
                            <?php else: ?>
                                <img src="https://via.placeholder.com/120?text=Avatar" alt="Avatar" class="rounded-circle">
                            <?php endif; ?>
                        </div>
                        <table class="table table-borderless">
                            <tr>
                                <th>Tên đăng nhập:</th>
                                <td><?php echo htmlspecialchars($account->username); ?></td>
                            </tr>
                            <tr>
                                <th>Họ và tên:</th>
                                <td><?php echo htmlspecialchars($account->fullname); ?></td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td><?php echo htmlspecialchars($account->email); ?></td>
                            </tr>
                            <tr>
                                <th>Số điện thoại:</th>
                                <td><?php echo htmlspecialchars($account->phone); ?></td>
                            </tr>
                            <tr>
                                <th>Vai trò:</th>
                                <td><?php echo htmlspecialchars($account->role); ?></td>
                            </tr>
                        </table>
                        <div class="text-center mt-4">
                            <a href="/webbanhang/account/editProfile" class="btn btn-primary mr-2">
                                <i class="fas fa-edit"></i> Chỉnh sửa thông tin
                            </a>
                            <a href="/webbanhang/product" class="btn btn-secondary mr-2">
                                <i class="fas fa-arrow-left"></i> Quay lại
                            </a>
                            <a href="/webbanhang/account/logout" class="btn btn-danger">
                                <i class="fas fa-sign-out-alt"></i> Đăng xuất
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>