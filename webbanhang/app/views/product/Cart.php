<?php include 'app/views/shares/header.php'; ?>

<div class="container py-5">
    <h1 class="mb-4">Giỏ hàng</h1>

    <?php if (!empty($cart)): ?>
    <div class="row">
        <?php foreach ($cart as $id => $item): ?>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card product-card h-100 shadow-sm">
                <div class="card-img-top product-image-container">
                    <?php if (!empty($item['image'])): ?>
                        <img src="/<?php echo htmlspecialchars($item['image'], ENT_QUOTES, 'UTF-8'); ?>" 
                            class="product-image"
                            alt="<?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?>">
                    <?php else: ?>
                        <img src="https://via.placeholder.com/300x200?text=No+Image" 
                            class="product-image"
                            alt="No image">
                    <?php endif; ?>
                </div>

                <div class="card-body d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h3 class="card-title font-weight-bold mb-0">
                            <?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?>
                        </h3>
                        <span class="badge badge-pill badge-info">ID: <?php echo htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?></span>
                    </div>

                    <?php if (!empty($item['category_name'])): ?>
                    <p class="text-muted mb-2">
                        <i class="fas fa-tag mr-1"></i>
                        <?php echo htmlspecialchars($item['category_name'], ENT_QUOTES, 'UTF-8'); ?>
                    </p>
                    <?php endif; ?>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="text-danger font-weight-bold mb-0">
                            <?php echo number_format($item['price'], 0, ',', '.'); ?> VND
                        </h5>
                        <div class="quantity-controls d-flex align-items-center">
                            <a href="/webbanhang/Product/decreaseQuantity/<?php echo htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>" 
                               class="btn btn-sm btn-outline-warning mr-2" title="Giảm số lượng">
                               <i class="fas fa-minus"></i>
                            </a>
                            <span class="font-weight-bold"><?php echo htmlspecialchars($item['quantity'], ENT_QUOTES, 'UTF-8'); ?></span>
                            <a href="/webbanhang/Product/increaseQuantity/<?php echo htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>" 
                               class="btn btn-sm btn-outline-success ml-2" title="Tăng số lượng">
                               <i class="fas fa-plus"></i>
                            </a>
                        </div>
                    </div>

                    <div class="product-actions mt-auto">
                        <a href="/webbanhang/Product/removeFromCart/<?php echo htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>"
                           class="btn btn-sm btn-outline-danger btn-block"
                           onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?');"
                           title="Xóa khỏi giỏ hàng">
                           <i class="fas fa-trash-alt"></i> Xóa
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Tổng tiền -->
    <div class="text-right mt-4">
        <h4 class="font-weight-bold">Tổng tiền: 
            <?php 
            $total = 0;
            foreach ($cart as $item) {
                $total += $item['price'] * $item['quantity'];
            }
            echo number_format($total, 0, ',', '.'); 
            ?> VND
        </h4>
    </div>

    <a href="/webbanhang/Product" class="btn btn-secondary mt-3 mr-2">Tiếp tục mua sắm</a>
    <a href="/webbanhang/Product/checkout" class="btn btn-primary mt-3">Thanh Toán</a>

    <?php else: ?>
    <div class="alert alert-info text-center py-5">
        <i class="fas fa-shopping-cart fa-3x mb-3 text-info"></i>
        <h3 class="alert-heading">Giỏ hàng của bạn đang trống.</h3>
        <p>Hãy thêm sản phẩm vào giỏ hàng để tiếp tục mua sắm.</p>
        <a href="/webbanhang/Product" class="btn btn-info mt-2">
            <i class="fas fa-shopping-bag mr-1"></i> Mua sắm ngay
        </a>
    </div>
    <?php endif; ?>
</div>

<style>
    /* Dùng CSS giống y hệt file list sản phẩm */
    .product-card {
        transition: all 0.3s ease;
        border-radius: 10px;
        overflow: hidden;
        border: none;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.15);
    }

    .product-image-container {
        height: 200px;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f8f9fa;
    }

    .product-image {
        width: 100%;
        height: 100%;
        object-fit: contain;
        transition: transform 0.3s ease;
    }

    .product-card:hover .product-image {
        transform: scale(1.05);
    }

    .quantity-controls .btn {
        width: 32px;
        height: 32px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        padding: 0;
    }

    .quantity-controls span {
        font-size: 1rem;
        margin: 0 10px;
    }

    .product-actions .btn {
        width: 100%;
        margin-top: 10px;
    }
</style>

<?php include 'app/views/shares/footer.php'; ?>
