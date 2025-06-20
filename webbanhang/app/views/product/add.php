<?php include __DIR__ . '/../shares/header.php'; ?>
<div class="main-content">
    <div class="form-container">
        <div class="container">
            
<h1>Thêm sản phẩm mới</h1>
<div id="apiErrors" class="alert alert-danger" style="display: none;"></div>

<form id="addProductForm" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Tên sản phẩm:</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="description">Mô tả:</label>
        <textarea id="description" name="description" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label for="price">Giá:</label>
        <input type="number" id="price" name="price" class="form-control" step="1000" required>
    </div>
    <div class="form-group">
        <label for="category_id">Danh mục:</label>
        <select id="category_id" name="category_id" class="form-control" required>
            <?php foreach ($categories as $category): ?>
                <option value="<?php echo $category->id; ?>"><?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="image">Ảnh sản phẩm:</label>
        <input type="file" id="image" name="image" class="form-control" accept="image/*">
    </div>
    <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
</form>

<a href="/webbanhang/Product/index" class="btn btn-secondary mt-2">Quay lại danh sách sản phẩm</a>

        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('addProductForm');
    const errorDiv = document.getElementById('apiErrors');

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Hiển thị loading
        const submitBtn = form.querySelector('button[type="submit"]');
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Đang xử lý...';

        // Tạo FormData
        const formData = new FormData(form);
        
        // Gọi API
        fetch('/webbanhang/api/products', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                return response.json().then(err => { throw err; });
            }
            return response.json();
        })
        .then(data => {
            console.log('Success:', data);
            // Hiển thị thông báo thành công
            errorDiv.style.display = 'none';
            alert('Thêm sản phẩm thành công!');
            window.location.href = '/webbanhang/Product/index';
        })
        .catch(error => {
            console.error('Error:', error);
            // Hiển thị lỗi
            errorDiv.style.display = 'block';
            let errorHtml = '<ul>';
            
            if (error.errors) {
                // Lỗi validation từ API
                for (const key in error.errors) {
                    errorHtml += `<li>${error.errors[key]}</li>`;
                }
            } else {
                // Lỗi khác
                errorHtml += `<li>${error.message || 'Có lỗi xảy ra khi thêm sản phẩm'}</li>`;
            }
            
            errorHtml += '</ul>';
            errorDiv.innerHTML = errorHtml;
        })
        .finally(() => {
            submitBtn.disabled = false;
            submitBtn.innerHTML = 'Thêm sản phẩm';
        });
    });
});
</script>

<?php include __DIR__ . '/../shares/footer.php'; ?>