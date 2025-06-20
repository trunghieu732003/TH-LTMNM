<?php include __DIR__ . '/../shares/header.php'; ?>
<div class="main-content">
    <div class="form-container">
        <div class="container">
            <h1>Sửa sản phẩm</h1>
            <div id="apiErrors" class="alert alert-danger" style="display: none;"></div>
            <div id="successMessage" class="alert alert-success" style="display: none;"></div>

            <form id="editProductForm" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $product->id; ?>">
                <div class="form-group">
                    <label for="name">Tên sản phẩm:</label>
                    <input type="text" id="name" name="name" class="form-control" 
                           value="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>" required>
                </div>
                <div class="form-group">
                    <label for="description">Mô tả:</label>
                    <textarea id="description" name="description" class="form-control" required><?php 
                        echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); 
                    ?></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Giá:</label>
                    <input type="number" id="price" name="price" class="form-control" step="1000" 
                           value="<?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?>" required>
                </div>
                <div class="form-group">
                    <label for="category_id">Danh mục:</label>
                    <select id="category_id" name="category_id" class="form-control" required>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category->id; ?>" 
                                <?php echo ($category->id == $product->category_id) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Ảnh sản phẩm:</label>
                    <?php if (!empty($product->image)): ?>
                        <div>
                            <img src="/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>" 
                                 alt="Ảnh sản phẩm" 
                                 style="max-width: 150px; height: auto; margin-bottom: 10px;"
                                 id="currentImage">
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" id="removeImage" name="removeImage">
                                <label class="form-check-label" for="removeImage">Xóa ảnh hiện tại</label>
                            </div>
                        </div>
                    <?php endif; ?>
                    <input type="file" id="image" name="image" class="form-control mt-2" accept="image/*">
                    <small class="text-muted">Chỉ chọn ảnh mới nếu muốn thay đổi</small>
                </div>
                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
            </form>
            <a href="/webbanhang/Product/index" class="btn btn-secondary mt-2">Quay lại danh sách sản phẩm</a>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('editProductForm');
    const errorDiv = document.getElementById('apiErrors');
    const successDiv = document.getElementById('successMessage');

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Hiển thị loading
        const submitBtn = form.querySelector('button[type="submit"]');
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Đang lưu...';

        // Tạo FormData
        const formData = new FormData(form);
        const productId = form.querySelector('input[name="id"]').value;
        
        // Gọi API
        fetch(`/webbanhang/api/products/${productId}`, {
            method: 'PUT', // hoặc 'PATCH' tùy API của bạn
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
            successDiv.style.display = 'block';
            successDiv.textContent = 'Cập nhật sản phẩm thành công!';
            
            // Cập nhật ảnh hiển thị nếu có ảnh mới
            if (data.image) {
                const currentImage = document.getElementById('currentImage');
                if (currentImage) {
                    currentImage.src = '/' + data.image;
                }
            }
            
            // Ẩn thông báo sau 3 giây
            setTimeout(() => {
                successDiv.style.display = 'none';
            }, 3000);
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
                errorHtml += `<li>${error.message || 'Có lỗi xảy ra khi cập nhật sản phẩm'}</li>`;
            }
            
            errorHtml += '</ul>';
            errorDiv.innerHTML = errorHtml;
        })
        .finally(() => {
            submitBtn.disabled = false;
            submitBtn.innerHTML = 'Lưu thay đổi';
        });
    });
});
</script>

<?php include __DIR__ . '/../shares/footer.php'; ?>