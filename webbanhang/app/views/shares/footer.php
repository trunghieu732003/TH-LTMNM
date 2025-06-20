<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trung Híu Store</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;1,400&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --accent-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --dark-gradient: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            --footer-gradient: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            
            --text-primary: #2d3748;
            --text-secondary: #718096;
            --text-light: #e2e8f0;
            --text-muted: #a0aec0;
            
            --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            line-height: 1.6;
            color: var(--text-primary);
        }

        .wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex-grow: 1;
        }

        /* Modern Footer Styles */
        .modern-footer {
            background: var(--footer-gradient);
            position: relative;
            overflow: hidden;
            margin-top: auto;
        }

        .modern-footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="white" opacity="0.05"><polygon points="0,0 1000,0 1000,100 0,20"></polygon></svg>');
            background-size: cover;
            pointer-events: none;
        }

        .footer-content {
            position: relative;
            z-index: 2;
            padding: 60px 0 30px;
        }

        .footer-brand {
            margin-bottom: 30px;
        }

        .footer-brand-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .footer-brand-icon {
            background: var(--primary-gradient);
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            box-shadow: var(--shadow-lg);
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-5px); }
        }

        .footer-brand-text {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 600;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.025em;
        }

        .footer-brand-subtitle {
            color: var(--text-muted);
            font-size: 0.9rem;
            font-weight: 400;
            margin-top: 5px;
        }

        .footer-description {
            color: var(--text-light);
            font-size: 0.95rem;
            line-height: 1.7;
            margin-bottom: 25px;
            opacity: 0.9;
        }

        .footer-section-title {
            color: white;
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 25px;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 30px;
            height: 3px;
            background: var(--accent-gradient);
            border-radius: 2px;
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 12px;
        }

        .footer-links a {
            color: var(--text-light);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 400;
            transition: all 0.3s ease;
            position: relative;
            padding-left: 0;
        }

        .footer-links a::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            width: 0;
            height: 2px;
            background: var(--accent-gradient);
            transition: width 0.3s ease;
            transform: translateY(-50%);
        }

        .footer-links a:hover {
            color: white;
            text-decoration: none;
            padding-left: 20px;
            transform: translateX(5px);
        }

        .footer-links a:hover::before {
            width: 15px;
        }

        .contact-info {
            list-style: none;
            padding: 0;
        }

        .contact-info li {
            color: var(--text-light);
            font-size: 0.9rem;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
        }

        .contact-info li:hover {
            color: white;
            transform: translateX(5px);
        }

        .contact-info i {
            width: 20px;
            margin-right: 12px;
            color: var(--accent-gradient);
            background: var(--accent-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Social Icons */
        .social-icons {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-icon {
            width: 45px;
            height: 45px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.1rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .social-icon::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: var(--primary-gradient);
            transition: all 0.3s ease;
            border-radius: 12px;
        }

        .social-icon:hover::before {
            transform: scale(1.1);
            box-shadow: var(--shadow-lg);
        }

        .social-icon i {
            position: relative;
            z-index: 2;
        }

        .social-icon:hover {
            transform: translateY(-3px);
            text-decoration: none;
            color: white;
        }

        .social-icon.facebook::before { background: linear-gradient(135deg, #3b5998 0%, #8b9dc3 100%); }
        .social-icon.twitter::before { background: linear-gradient(135deg, #1da1f2 0%, #0d95e8 100%); }
        .social-icon.instagram::before { background: linear-gradient(135deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%); }
        .social-icon.youtube::before { background: linear-gradient(135deg, #ff0000 0%, #cc0000 100%); }

        /* Footer Bottom */
        .footer-bottom {
            background: rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding: 25px 0;
            margin-top: 40px;
        }

        .footer-bottom-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .copyright {
            color: var(--text-light);
            font-size: 0.9rem;
            margin: 0;
        }

        .made-with-love {
            color: var(--text-light);
            font-size: 0.9rem;
            margin: 0;
            display: flex;
            align-items: center;
        }

        .heart-icon {
            color: #ff6b6b;
            margin: 0 5px;
            animation: heartbeat 2s ease-in-out infinite;
        }

        @keyframes heartbeat {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        /* Newsletter Section */
        .newsletter-section {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .newsletter-title {
            color: white;
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .newsletter-description {
            color: var(--text-light);
            font-size: 0.9rem;
            margin-bottom: 20px;
        }

        .newsletter-form {
            display: flex;
            gap: 10px;
        }

        .newsletter-input {
            flex: 1;
            padding: 12px 16px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 50px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            font-size: 0.9rem;
            backdrop-filter: blur(10px);
        }

        .newsletter-input::placeholder {
            color: var(--text-muted);
        }

        .newsletter-input:focus {
            outline: none;
            border-color: rgba(255, 255, 255, 0.5);
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.1);
        }

        .newsletter-btn {
            padding: 12px 24px;
            background: var(--accent-gradient);
            color: white;
            border: none;
            border-radius: 50px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .newsletter-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .footer-content {
                padding: 40px 0 20px;
            }
            
            .footer-brand-text {
                font-size: 1.5rem;
            }
            
            .footer-bottom-content {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }
            
            .newsletter-form {
                flex-direction: column;
            }
            
            .social-icons {
                justify-content: center;
            }
        }

        /* Demo content styling */
        .demo-content {
            padding: 100px 0;
            text-align: center;
            background: white;
            margin: 20px;
            border-radius: 15px;
            box-shadow: var(--shadow-lg);
        }

        .demo-content h1 {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <main>
            <!-- Demo content -->
            <div class="demo-content">
                <h1>Trung Híu Store</h1>
                <p class="lead">Nội dung chính của trang web sẽ được hiển thị ở đây</p>
                <p>Footer hiện đại với thiết kế gradient và glass effect</p>
            </div>
        </main>

        <footer class="modern-footer">
            <div class="footer-content">
                <div class="container">
                    <div class="row">
                        <!-- Brand & Newsletter Section -->
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="footer-brand">
                                <div class="footer-brand-container">
                                    <div class="footer-brand-icon">
                                        <i class="fas fa-book-open"></i>
                                    </div>
                                    <div>
                                        <div class="footer-brand-text">Trung Híu Store</div>
                                        <div class="footer-brand-subtitle">Premium Bookstore</div>
                                    </div>
                                </div>
                                <p class="footer-description">
                                    Chuyên cung cấp sách và tài liệu chất lượng cao với giá cả hợp lý. 
                                    Đồng hành cùng tri thức, kiến tạo tương lai.
                                </p>
                                <div class="social-icons">
                                    <a href="#" class="social-icon facebook">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="#" class="social-icon twitter">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="#" class="social-icon instagram">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                    <a href="#" class="social-icon youtube">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Links -->
                        <div class="col-lg-2 col-md-6 mb-4">
                            <h5 class="footer-section-title">Liên kết</h5>
                            <ul class="footer-links">
                                <li><a href="/">Trang chủ</a></li>
                                <li><a href="/products">Sản phẩm</a></li>
                                <li><a href="/about">Giới thiệu</a></li>
                                <li><a href="/blog">Blog</a></li>
                                <li><a href="/contact">Liên hệ</a></li>
                            </ul>
                        </div>

                        <!-- Support Links -->
                        <div class="col-lg-2 col-md-6 mb-4">
                            <h5 class="footer-section-title">Hỗ trợ</h5>
                            <ul class="footer-links">
                                <li><a href="/help">Trung tâm trợ giúp</a></li>
                                <li><a href="/privacy">Chính sách bảo mật</a></li>
                                <li><a href="/terms">Điều khoản sử dụng</a></li>
                                <li><a href="/shipping">Chính sách giao hàng</a></li>
                                <li><a href="/returns">Đổi trả hàng</a></li>
                            </ul>
                        </div>

                        <!-- Contact Info & Newsletter -->
                        <div class="col-lg-4 col-md-6 mb-4">
                            <h5 class="footer-section-title">Liên hệ</h5>
                            <ul class="contact-info">
                                <li>
                                    <i class="fas fa-map-marker-alt"></i>
                                    123 Đường ABC, Quận 1, TP.HCM
                                </li>
                                <li>
                                    <i class="fas fa-phone"></i>
                                    (028) 3456-7890
                                </li>
                                <li>
                                    <i class="fas fa-envelope"></i>
                                    trunghiustore@gmail.com
                                </li>
                                <li>
                                    <i class="fas fa-clock"></i>
                                    T2-CN: 8:00 - 22:00
                                </li>
                            </ul>

                            <!-- Newsletter Signup -->
                            <div class="newsletter-section">
                                <h6 class="newsletter-title">Đăng ký nhận tin</h6>
                                <p class="newsletter-description">
                                    Nhận thông báo về sản phẩm mới và ưu đãi đặc biệt
                                </p>
                                <form class="newsletter-form">
                                    <input type="email" class="newsletter-input" placeholder="Nhập email của bạn">
                                    <button type="submit" class="newsletter-btn">
                                        <i class="fas fa-paper-plane"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div class="container">
                    <div class="footer-bottom-content">
                        <p class="copyright">
                            © 2024 Trung Híu Store. All rights reserved.
                        </p>
                        <p class="made-with-love">
                            Made with <i class="fas fa-heart heart-icon"></i> by Trung Híu Team
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Newsletter form handling
        document.querySelector('.newsletter-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const email = this.querySelector('.newsletter-input').value;
            if (email) {
                // Simulate subscription
                const btn = this.querySelector('.newsletter-btn');
                const originalHTML = btn.innerHTML;
                btn.innerHTML = '<i class="fas fa-check"></i>';
                btn.style.background = '#4CAF50';
                setTimeout(() => {
                    btn.innerHTML = originalHTML;
                    btn.style.background = '';
                    this.querySelector('.newsletter-input').value = '';
                }, 2000);
            }
        });

        // Smooth scroll for footer links
        document.querySelectorAll('.footer-links a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
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

        // Social media click tracking (demo)
        document.querySelectorAll('.social-icon').forEach(icon => {
            icon.addEventListener('click', function(e) {
                e.preventDefault();
                console.log('Social media clicked:', this.className);
            });
        });
    </script>
</body>
</html>