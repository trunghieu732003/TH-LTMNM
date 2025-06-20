<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm - Ultra Modern</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="/webbanhang/public/css/modern-product-styles.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'SF Pro Display', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Animated Background */
        .bg-particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 15s infinite linear;
            backdrop-filter: blur(1px);
        }

        @keyframes float {
            0% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100vh) rotate(360deg);
                opacity: 0;
            }
        }

        /* Enhanced Banner Section */
        .banner-section {
            position: relative;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.9) 0%, rgba(118, 75, 162, 0.9) 100%);
            padding: 120px 0 80px;
            overflow: hidden;
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .banner-particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .banner-particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: rgba(255, 255, 255, 0.6);
            border-radius: 50%;
            animation: bannerFloat 20s infinite linear;
        }

        .banner-particle:nth-child(1) { left: 10%; animation-delay: 0s; }
        .banner-particle:nth-child(2) { left: 20%; animation-delay: 2s; }
        .banner-particle:nth-child(3) { left: 30%; animation-delay: 4s; }
        .banner-particle:nth-child(4) { left: 50%; animation-delay: 6s; }
        .banner-particle:nth-child(5) { left: 70%; animation-delay: 8s; }
        .banner-particle:nth-child(6) { left: 80%; animation-delay: 10s; }
        .banner-particle:nth-child(7) { left: 90%; animation-delay: 12s; }

        @keyframes bannerFloat {
            0%, 100% {
                transform: translateY(0px) translateX(0px);
            }
            25% {
                transform: translateY(-20px) translateX(10px);
            }
            50% {
                transform: translateY(-40px) translateX(-10px);
            }
            75% {
                transform: translateY(-20px) translateX(5px);
            }
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
            position: relative;
            z-index: 2;
        }

        .banner-content {
            text-align: center;
            color: white;
        }

        .banner-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(20px);
            padding: 12px 24px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 30px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .banner-title {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 800;
            margin-bottom: 20px;
            background: linear-gradient(135deg, #fff 0%, #f0f0f0 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            line-height: 1.2;
        }

        .banner-subtitle {
            font-size: 1.2rem;
            margin-bottom: 40px;
            opacity: 0.9;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.6;
        }

        .cta-group {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            justify-content: center;
            align-items: center;
        }

        .banner-cta {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 16px 32px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 50px;
            color: white;
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .banner-cta:before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .banner-cta:hover:before {
            left: 100%;
        }

        .banner-cta:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            background: rgba(255, 255, 255, 0.25);
        }

        .banner-cta.secondary {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.15);
        }

        /* Main Content */
        .main-content {
            padding: 80px 0;
            position: relative;
            z-index: 2;
        }

        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-title {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            color: white;
            margin-bottom: 15px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .section-subtitle {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.8);
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Search and Filter Controls */
        .search-filter-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 24px;
            padding: 30px;
            margin-bottom: 40px;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            align-items: center;
            justify-content: space-between;
        }

        .search-bar {
            flex: 1;
            min-width: 280px;
            position: relative;
        }

        .search-bar input {
            width: 100%;
            padding: 16px 20px 16px 50px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 50px;
            color: white;
            font-size: 16px;
            font-weight: 500;
            transition: all 0.3s ease;
            outline: none;
        }

        .search-bar input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .search-bar input:focus {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.4);
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.1);
            transform: scale(1.02);
        }

        .search-bar i {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.7);
            font-size: 18px;
        }

        .sort-filter {
            display: flex;
            gap: 15px;
            align-items: center;
            flex-wrap: wrap;
        }

        .sort-filter select, .price-filter input {
            padding: 14px 20px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 50px;
            color: white;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            outline: none;
            min-width: 140px;
        }

        .sort-filter select:focus, .price-filter input:focus {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.4);
            transform: scale(1.02);
        }

        .sort-filter option {
            background: #2a2a2a;
            color: white;
        }

        .price-filter {
            display: flex;
            gap: 10px;
            align-items: center;
            flex-wrap: wrap;
        }

        .price-filter label {
            color: rgba(255, 255, 255, 0.9);
            font-weight: 600;
            font-size: 14px;
        }

        .price-filter input {
            width: 120px;
        }

        .price-filter input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        /* Products Grid */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            margin-bottom: 50px;
        }

        .product-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 24px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            opacity: 0;
            transform: translateY(30px);
        }

        .product-card.fade-in {
            opacity: 1;
            transform: translateY(0);
            animation: fadeInUp 0.6s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            border-color: rgba(255, 255, 255, 0.3);
        }

        .product-image-container {
            position: relative;
            height: 250px;
            overflow: hidden;
            background: linear-gradient(45deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
        }

        .product-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .product-card:hover .product-image {
            transform: scale(1.1);
        }

        .product-content {
            padding: 25px;
            color: white;
        }

        .product-title {
            margin-bottom: 12px;
        }

        .product-title a {
            color: white;
            text-decoration: none;
            font-size: 1.3rem;
            font-weight: 700;
            line-height: 1.3;
            transition: color 0.3s ease;
        }

        .product-title a:hover {
            color: rgba(255, 255, 255, 0.8);
        }

        .product-description {
            color: rgba(255, 255, 255, 0.8);
            font-size: 14px;
            line-height: 1.5;
            margin-bottom: 15px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .product-price {
            font-size: 1.4rem;
            font-weight: 800;
            color: #FFD700;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .product-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 10px 16px;
            border: none;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .btn-info {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-warning {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
        }

        .btn-danger {
            background: linear-gradient(135deg, #ff416c 0%, #ff4b2b 100%);
            color: white;
        }

        .btn-cart {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            color: white;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: white;
            grid-column: 1 / -1;
        }

        .empty-icon {
            font-size: 4rem;
            color: rgba(255, 255, 255, 0.5);
            margin-bottom: 20px;
        }

        .empty-title {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .empty-text {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.7);
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 15px;
            margin-top: 50px;
        }

        .pagination button {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 14px 24px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 50px;
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .pagination button:hover:not(:disabled) {
            background: rgba(255, 255, 255, 0.25);
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .pagination button:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .pagination span {
            color: white;
            font-weight: 600;
            padding: 14px 24px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border-radius: 50px;
            border: 1px solid rgba(255, 255, 255, 0.15);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .banner-section {
                padding: 80px 0 60px;
            }

            .main-content {
                padding: 60px 0;
            }

            .search-filter-container {
                flex-direction: column;
                align-items: stretch;
            }

            .search-bar {
                min-width: auto;
            }

            .sort-filter {
                justify-content: center;
            }

            .products-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .product-actions {
                flex-direction: column;
            }

            .pagination {
                flex-wrap: wrap;
                gap: 10px;
            }

            .pagination button, .pagination span {
                font-size: 14px;
                padding: 12px 20px;
            }
        }

        /* Loading animation */
        .loaded {
            animation: pageLoad 0.8s ease-out;
        }

        @keyframes pageLoad {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Ripple effect */
        @keyframes ripple {
            to {
                transform: scale(3);
                opacity: 0;
            }
        }
    </style>
</head>
<body>
    <?php include 'app/views/shares/header.php'; ?>

    <!-- Animated background particles -->
    <div class="bg-particles">
        <div class="particle" style="left: 10%; animation-delay: 0s; width: 5px; height: 5px;"></div>
        <div class="particle" style="left: 25%; animation-delay: 2s; width: 7px; height: 7px;"></div>
        <div class="particle" style="left: 40%; animation-delay: 4s; width: 4px; height: 4px;"></div>
        <div class="particle" style="left: 55%; animation-delay: 6s; width: 6px; height: 6px;"></div>
        <div class="particle" style="left: 70%; animation-delay: 8s; width: 5px; height: 5px;"></div>
        <div class="particle" style="left: 85%; animation-delay: 10s; width: 8px; height: 8px;"></div>
    </div>

    <!-- Enhanced Banner Section -->
    <div class="banner-section">
        <div class="banner-particles">
            <div class="banner-particle"></div>
            <div class="banner-particle"></div>
            <div class="banner-particle"></div>
            <div class="banner-particle"></div>
            <div class="banner-particle"></div>
            <div class="banner-particle"></div>
            <div class="banner-particle"></div>
        </div>
        <div class="container">
            <div class="banner-content">
                <div class="banner-badge">
                    <i class="fas fa-star"></i>
                    Bộ sưu tập độc quyền 2025
                </div>
                <h1 class="banner-title">Khám Phá Xu Hướng Tương Lai</h1>
                <p class="banner-subtitle">
                    Đột phá với những sản phẩm tiên phong, được thiết kế để định hình phong cách hiện đại.
                </p>
                <div class="cta-group">
                    <?php if (SessionHelper::isAdmin()): ?> 
                    <a href="/webbanhang/Product/add" class="banner-cta">
                        <i class="fas fa-plus"></i>
                        Thêm sản phẩm mới
                    </a>
                    <a href="/webbanhang/Category/add" class="banner-cta">
                        <i class="fas fa-plus"></i>
                        Thêm danh mục mới
                    </a>
                    <a href="/webbanhang/account/list" class="banner-cta">
                        <i class="fas fa-users"></i>
                        Quản lý người dùng
                    </a>
                    <?php endif; ?>
                    <a href="#products" class="banner-cta secondary">
                        <i class="fas fa-arrow-down"></i>
                        Xem sản phẩm
                    </a>
                    <?php if (isset($user) && $user['role'] === 'user'): ?>
                        <a href="/webbanhang/Product/cart" class="banner-cta secondary">
                            <i class="fas fa-shopping-cart"></i>
                            Giỏ hàng
                        </a>
                    <?php endif; ?>
                    <?php if(!SessionHelper::isLoggedIn()): ?>
                    <a href="/webbanhang/account/login" class="banner-cta secondary" data-page="login">
                        <i class="fas fa-sign-in-alt nav-icon"></i>
                        Đăng nhập
                    </a>
                    <a href="/webbanhang/account/register" class="banner-cta secondary" data-page="register">
                        <i class="fas fa-user-plus nav-icon"></i>
                        Đăng ký
                    </a>
                    <?php endif; ?>
                    <?php if (SessionHelper::isLoggedIn()): ?>
                    <a href="/webbanhang/account/logout" class="banner-cta secondary">
                        <i class="fas fa-sign-out-alt"></i>
                        Đăng xuất
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content" id="products">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Sản phẩm nổi bật</h2>
                <p class="section-subtitle">
                    Khám phá bộ sưu tập được yêu thích nhất từ cộng đồng của chúng tôi
                </p>
            </div>
            
            <!-- Search, Sort, and Filter Controls -->
            <div class="search-filter-container">
                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <input type="text" id="searchInput" placeholder="Tìm kiếm sản phẩm..." />
                </div>
                <div class="sort-filter">
                    <select id="sortSelect">
                        <option value="name-asc">Sắp xếp: Tên (A-Z)</option>
                        <option value="name-desc">Sắp xếp: Tên (Z-A)</option>
                        <option value="price-asc">Sắp xếp: Giá (Thấp - Cao)</option>
                        <option value="price-desc">Sắp xếp: Giá (Cao - Thấp)</option>
                    </select>
                    <select id="filterSelect">
                        <option value="all">Tất cả sản phẩm</option>
                        <!-- Các danh mục sẽ được thêm động từ API -->
                    </select>
                    <div class="price-filter">
                        <label for="minPrice">Giá từ:</label>
                        <input type="number" id="minPrice" placeholder="0" min="0" step="10000">
                        <label for="maxPrice">Đến:</label>
                        <input type="number" id="maxPrice" placeholder="∞" min="0" step="10000">
                    </div>
                </div>
            </div>
            
            <div class="products-grid" id="productsGrid">
                <!-- Danh sách sản phẩm sẽ được tải từ API và hiển thị tại đây -->
            </div>
            
            <!-- Pagination -->
            <div class="pagination" id="pagination">
                <button id="prevPage"><i class="fas fa-chevron-left"></i> Trước</button>
                <span id="pageInfo"></span>
                <button id="nextPage">Sau <i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
    </div>

    <?php include 'app/views/shares/footer.php'; ?>

    <!-- Interactive JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Kiểm tra đăng nhập
            const token = localStorage.getItem('jwtToken');
            if (!token) {
                alert('Vui lòng đăng nhập');
                location.href = '/webbanhang/account/login';
                return;
            }

            // Khởi tạo các phần tử DOM
            const searchInput = document.getElementById('searchInput');
            const sortSelect = document.getElementById('sortSelect');
            const filterSelect = document.getElementById('filterSelect');
            const minPrice = document.getElementById('minPrice');
            const maxPrice = document.getElementById('maxPrice');
            const productsGrid = document.getElementById('productsGrid');
            const prevPage = document.getElementById('prevPage');
            const nextPage = document.getElementById('nextPage');
            const pageInfo = document.getElementById('pageInfo');
            const itemsPerPage = 6;
            let currentPage = 1;
            let allProducts = [];

            // Tải danh sách sản phẩm từ API
            function fetchProducts() {
                fetch('/webbanhang/api/product', {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + token
                    }
                })
                .then(response => response.json())
                .then(data => {
                    allProducts = data;
                    // Điền danh mục vào filterSelect
                    const categories = new Set(data.map(product => product.category_name));
                    filterSelect.innerHTML = '<option value="all">Tất cả sản phẩm</option>';
                    categories.forEach(category => {
                        const option = document.createElement('option');
                        option.value = category;
                        option.textContent = category.charAt(0).toUpperCase() + category.slice(1);
                        filterSelect.appendChild(option);
                    });
                    updateProducts();
                })
                .catch(error => {
                    console.error('Lỗi khi tải sản phẩm:', error);
                    productsGrid.innerHTML = `
                        <div class="empty-state">
                            <div class="empty-icon">
                                <i class="fas fa-box-open"></i>
                            </div>
                            <h3 class="empty-title">Lỗi tải sản phẩm</h3>
                            <p class="empty-text">Vui lòng thử lại sau!</p>
                        </div>
                    `;
                });
            }

            // Xóa sản phẩm
            function deleteProduct(id) {
                if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')) {
                    fetch(`/webbanhang/api/product/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'Authorization': 'Bearer ' + token
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.message === 'Product deleted successfully') {
                            allProducts = allProducts.filter(product => product.id !== id);
                            updateProducts();
                        } else {
                            alert('Xóa sản phẩm thất bại');
                        }
                    })
                    .catch(error => {
                        console.error('Lỗi khi xóa sản phẩm:', error);
                        alert('Xóa sản phẩm thất bại');
                    });
                }
            }

            // Cập nhật danh sách sản phẩm
            function updateProducts() {
                const searchTerm = searchInput.value.toLowerCase();
                const sortValue = sortSelect.value;
                const filterValue = filterSelect.value;
                const minPriceValue = parseFloat(minPrice.value) || 0;
                const maxPriceValue = parseFloat(maxPrice.value) || Infinity;

                // Lọc sản phẩm
                let filteredProducts = allProducts.filter(product => {
                    const name = product.name.toLowerCase();
                    const category = product.category_name;
                    const price = parseFloat(product.price);
                    const matchesSearch = name.includes(searchTerm);
                    const matchesFilter = filterValue === 'all' || category === filterValue;
                    const matchesPrice = price >= minPriceValue && price <= maxPriceValue;
                    return matchesSearch && matchesFilter && matchesPrice;
                });

                // Sắp xếp sản phẩm
                filteredProducts.sort((a, b) => {
                    const nameA = a.name.toLowerCase();
                    const nameB = b.name.toLowerCase();
                    const priceA = parseFloat(a.price);
                    const priceB = parseFloat(b.price);
                    
                    if (sortValue === 'name-asc') return nameA.localeCompare(nameB);
                    if (sortValue === 'name-desc') return nameB.localeCompare(nameA);
                    if (sortValue === 'price-asc') return priceA - priceB;
                    if (sortValue === 'price-desc') return priceB - priceA;
                    return 0;
                });

                // Phân trang
                const totalItems = filteredProducts.length;
                const totalPages = Math.ceil(totalItems / itemsPerPage);
                currentPage = Math.min(currentPage, Math.max(1, totalPages));
                
                const startIndex = (currentPage - 1) * itemsPerPage;
                const endIndex = startIndex + itemsPerPage;
                const paginatedProducts = filteredProducts.slice(startIndex, endIndex);

                // Cập nhật grid sản phẩm
                productsGrid.innerHTML = '';
                if (paginatedProducts.length === 0) {
                    productsGrid.innerHTML = `
                        <div class="empty-state">
                            <div class="empty-icon">
                                <i class="fas fa-box-open"></i>
                            </div>
                            <h3 class="empty-title">Không tìm thấy sản phẩm</h3>
                            <p class="empty-text">Hãy thử thay đổi tiêu chí tìm kiếm hoặc lọc!</p>
                        </div>
                    `;
                } else {
                    paginatedProducts.forEach(product => {
                        const productCard = document.createElement('div');
                        productCard.className = 'product-card';
                        productCard.setAttribute('data-name', product.name);
                        productCard.setAttribute('data-price', product.price);
                        productCard.setAttribute('data-category', product.category_name);
                        productCard.innerHTML = `
                            <div class="product-image-container">
                                ${product.image ? 
                                    `<img src="/webbanhang/${product.image}" class="product-image" alt="${product.name}">` :
                                    `<img src="https://via.placeholder.com/400x300?text=No+Image" class="product-image" alt="Không có hình ảnh">`
                                }
                            </div>
                            <div class="product-content">
                                <h5 class="product-title">
                                    <a href="/webbanhang/Product/show/${product.id}">
                                        ${product.name}
                                    </a>
                                </h5>
                                <p class="product-description">${product.description}</p>
                                <p class="product-price">
                                    <i class="fas fa-tags"></i>
                                    ${new Intl.NumberFormat('vi-VN').format(product.price)}₫
                                </p>
                                <div class="product-actions">
                                    <a href="/webbanhang/Product/detail/${product.id}" class="btn btn-info">
                                        <i class="fas fa-eye"></i> Xem
                                    </a>
                                    <a href="/webbanhang/Product/edit/${product.id}" class="btn btn-warning">
                                        <i class="fas fa-edit"></i> Sửa
                                    </a>
                                    <button class="btn btn-danger" onclick="deleteProduct(${product.id})">
                                        <i class="fas fa-trash"></i> Xóa
                                    </button>
                                    <a href="/webbanhang/Product/addToCart/${product.id}" class="btn btn-cart">
                                        <i class="fas fa-cart-plus"></i> Thêm vào giỏ
                                    </a>
                                </div>
                            </div>
                        `;
                        productsGrid.appendChild(productCard);
                    });
                }

                // Cập nhật phân trang
                pageInfo.textContent = `Trang ${currentPage} / ${totalPages || 1}`;
                prevPage.disabled = currentPage === 1;
                nextPage.disabled = currentPage === totalPages || totalPages === 0;

                // Thêm hiệu ứng giao diện
                const cards = document.querySelectorAll('.product-card');
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('fade-in');
                            observer.unobserve(entry.target);
                        }
                    });
                }, {
                    threshold: 0.2,
                    rootMargin: '100px'
                });

                cards.forEach(card => observer.observe(card));

                // Hiệu ứng hover cho thẻ
                cards.forEach(card => {
                    card.addEventListener('mousemove', function(e) {
                        const rect = this.getBoundingClientRect();
                        const x = e.clientX - rect.left - rect.width / 2;
                        const y = e.clientY - rect.top - rect.height / 2;
                        const rotateX = y / 20;
                        const rotateY = -x / 20;
                        this.style.transform = `translateY(-12px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
                        this.style.zIndex = '20';
                    });

                    card.addEventListener('mouseleave', function() {
                        this.style.transform = '';
                        this.style.zIndex = '';
                    });
                });
            }

            // Hiệu ứng ripple cho các nút
            const buttons = document.querySelectorAll('.btn:not(.btn-danger), .banner-cta');
            buttons.forEach(button => {
                button.addEventListener('click', function(e) {
                    const ripple = document.createElement('span');
                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    const x = e.clientX - rect.left - size / 2;
                    const y = e.clientY - rect.top - size / 2;

                    ripple.style.cssText = `
                        position: absolute;
                        width: ${size}px;
                        height: ${size}px;
                        left: ${x}px;
                        top: ${y}px;
                        background: rgba(255, 255, 255, 0.3);
                        border-radius: 50%;
                        transform: scale(0);
                        animation: ripple 0.5s linear;
                        pointer-events: none;
                    `;

                    this.appendChild(ripple);
                    setTimeout(() => ripple.remove(), 500);
                });
            });

            // Smooth scroll cho các liên kết anchor
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Tạo particle động
            function createParticle() {
                const particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.width = Math.random() * 5 + 3 + 'px';
                particle.style.height = particle.style.width;
                particle.style.animationDelay = Math.random() * 15 + 's';
                document.querySelector('.bg-particles').appendChild(particle);
                setTimeout(() => particle.remove(), 15000);
            }

            setInterval(createParticle, 2000);

            // Hiệu ứng tải trang
            setTimeout(() => document.body.classList.add('loaded'), 100);

            // Thêm sự kiện cho tìm kiếm, sắp xếp, lọc và phân trang
            searchInput.addEventListener('input', () => { currentPage = 1; updateProducts(); });
            sortSelect.addEventListener('change', () => { currentPage = 1; updateProducts(); });
            filterSelect.addEventListener('change', () => { currentPage = 1; updateProducts(); });
            minPrice.addEventListener('input', () => { currentPage = 1; updateProducts(); });
            maxPrice.addEventListener('input', () => { currentPage = 1; updateProducts(); });
            prevPage.addEventListener('click', () => {
                if (currentPage > 1) {
                    currentPage--;
                    updateProducts();
                }
            });
            nextPage.addEventListener('click', () => {
                const totalItems = allProducts.filter(product => {
                    const name = product.name.toLowerCase();
                    const category = product.category_name;
                    const price = parseFloat(product.price);
                    const matchesSearch = name.includes(searchInput.value.toLowerCase());
                    const matchesFilter = filterSelect.value === 'all' || category === filterSelect.value;
                    const matchesPrice = price >= (parseFloat(minPrice.value) || 0) && price <= (parseFloat(maxPrice.value) || Infinity);
                    return matchesSearch && matchesFilter && matchesPrice;
                }).length;
                const totalPages = Math.ceil(totalItems / itemsPerPage);
                if (currentPage < totalPages) {
                    currentPage++;
                    updateProducts();
                }
            });

            // Thêm CSS cho hiệu ứng ripple
            const style = document.createElement('style');
            style.textContent = `
                @keyframes ripple {
                    to {
                        transform: scale(3);
                        opacity: 0;
                    }
                }
                .loaded .fade-in {
                    animation-play-state: running;
                }
            `;
            document.head.appendChild(style);

            // Gọi hàm tải sản phẩm khi trang được tải
            fetchProducts();

            // Định nghĩa hàm deleteProduct để sử dụng trong HTML động
            window.deleteProduct = deleteProduct;
        });
    </script>
</body>
</html>