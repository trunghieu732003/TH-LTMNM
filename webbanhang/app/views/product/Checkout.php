<?php include 'app/views/shares/header.php'; ?>
<div class="main-content">
    <div class="form-container">
        <div class="container">
<h1>Thanh toán</h1>
<form method="POST" action="/webbanhang/Product/processCheckout">
    <div class="form-group">
        <label for="name">Họ tên:</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="phone">Số điện thoại:</label>
        <input type="text" id="phone" name="phone" class="form-control" required>
    </div>
    <div class="form-group"> 
        <label for="address">Địa chỉ:</label>
        <textarea id="address" name="address" class="form-control"
            required></textarea>
    </div>
    <div class="form-group">
        <label for="payment_method">Phương thức thanh toán:</label>
        <select id="payment_method" name="payment_method" class="form-control" required>
            <option value="cash">Thanh toán khi nhận hàng</option>
            <option value="online">Thanh toán trực tuyến</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Thanh toán</button>
</form>
<a href="/webbanhang/Product/cart" class="btn btn-secondary mt-2">Quay lại giỏ hàng</a>
        </div>
    </div>
</div>
</div>
<?php include 'app/views/shares/footer.php'; ?>