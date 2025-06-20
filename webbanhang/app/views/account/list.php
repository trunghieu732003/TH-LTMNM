<?php include 'app/views/shares/header.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header('Location: /webbanhang/account/login');
    exit();
} ?>

<div class="container py-5">
    <!-- Tiêu đề và nút thêm mới -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="display-5 font-weight-bold text-primary">Quản lý người dùng</h1>
        <a href="/webbanhang/account/register" class="btn btn-success">
            <i class="fas fa-user-plus"></i> Thêm người dùng
        </a>
    </div>

    <!-- Thông báo -->
    <?php if (isset($_SESSION['success_message'])): ?>
        <div class="alert alert-success alert-dismissible fade show">
            <?php echo $_SESSION['success_message']; ?>
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
        <?php unset($_SESSION['success_message']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['error_message'])): ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <?php echo $_SESSION['error_message']; ?>
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
        <?php unset($_SESSION['error_message']); ?>
    <?php endif; ?>

    <!-- Bảng danh sách người dùng -->
    <?php if (!empty($users)): ?>
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th width="5%">#</th>
                                <th width="15%">Ảnh đại diện</th>
                                <th width="15%">Tên đăng nhập</th>
                                <th width="20%">Họ tên</th>
                                <th width="10%">Vai trò</th>
                                <th width="15%">Ngày tạo</th>
                                <th width="20%">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $index => $user): ?>
                                <tr>
                                    <td><?php echo $index + 1; ?></td>
                                    <td>
                                        <?php if (!empty($user->avatar)): ?>
                                            <img src="/webbanhang/<?php echo $user->avatar; ?>" 
                                                 alt="Avatar" class="rounded-circle" 
                                                 style="width: 50px; height: 50px; object-fit: cover;">
                                        <?php else: ?>
                                            <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center" 
                                                 style="width: 50px; height: 50px;">
                                                <i class="fas fa-user text-white"></i>
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo htmlspecialchars($user->username); ?></td>
                                    <td><?php echo htmlspecialchars($user->fullname); ?></td>
                                    <td>
                                        <span class="badge badge-<?php echo $user->role === 'admin' ? 'danger' : 'primary'; ?> p-2">
                                            <?php echo $user->role === 'admin' ? 'Quản trị viên' : 'Người dùng'; ?>
                                        </span>
                                    </td>
                                    <td><?php echo date('d/m/Y', strtotime($user->created_at)); ?></td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="/webbanhang/account/view/<?php echo $user->id; ?>" 
                                               class="btn btn-info" title="Xem chi tiết"
                                               data-toggle="tooltip">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="/webbanhang/account/editUser/<?php echo $user->id; ?>" 
                                               class="btn btn-warning" title="Chỉnh sửa"
                                               data-toggle="tooltip">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <?php if ($user->role !== 'admin'): ?>
                                                <button type="button" 
                                                        class="btn btn-danger btn-delete" 
                                                        title="Xóa"
                                                        data-toggle="tooltip"
                                                        data-id="<?php echo $user->id; ?>">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Phân trang -->
        <nav class="mt-4">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Trước</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Sau</a>
                </li>
            </ul>
        </nav>
    <?php else: ?>
        <div class="alert alert-info text-center py-4">
            <i class="fas fa-info-circle fa-2x mb-3"></i>
            <h4>Chưa có người dùng nào trong hệ thống</h4>
            <p class="mb-0">Hãy thêm người dùng mới bằng cách nhấn vào nút "Thêm người dùng"</p>
        </div>
    <?php endif; ?>
</div>

<!-- Modal xác nhận xóa -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Xác nhận xóa</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Bạn có chắc chắn muốn xóa người dùng này? Thao tác này không thể hoàn tác.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                <a id="confirmDelete" href="#" class="btn btn-danger">Xóa</a>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    // Kích hoạt tooltip
    $('[data-toggle="tooltip"]').tooltip();
    
    // Xử lý sự kiện xóa
    $('.btn-delete').click(function(){
        var userId = $(this).data('id');
        var deleteUrl = '/webbanhang/account/delete/' + userId;
        $('#confirmDelete').attr('href', deleteUrl);
        $('#deleteModal').modal('show');
    });
});
</script>

<?php include 'app/views/shares/footer.php'; ?>