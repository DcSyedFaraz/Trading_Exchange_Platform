<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Confirmed</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .confirmation-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
            animation: slideUp 0.6s ease-out;
        }

        .confirmation-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 35px 70px rgba(0, 0, 0, 0.2);
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .success-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #00d4aa, #00a085);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            animation: checkmarkPop 0.8s ease-out 0.3s both;
            position: relative;
            overflow: hidden;
        }

        .success-icon::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            animation: shimmer 2s infinite;
        }

        @keyframes checkmarkPop {
            0% {
                transform: scale(0);
                opacity: 0;
            }

            50% {
                transform: scale(1.2);
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        @keyframes shimmer {
            0% {
                left: -100%;
            }

            100% {
                left: 100%;
            }
        }

        .success-icon i {
            color: white;
            font-size: 2.5rem;
            z-index: 2;
        }

        .title {
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 700;
            font-size: 2.2rem;
            margin-bottom: 1rem;
            animation: fadeInUp 0.6s ease-out 0.5s both;
        }

        .subtitle {
            color: #6c757d;
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 2rem;
            animation: fadeInUp 0.6s ease-out 0.7s both;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .action-buttons {
            animation: fadeInUp 0.6s ease-out 0.9s both;
        }

        .btn-custom {
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-primary-custom {
            background: linear-gradient(135deg, #667eea, #764ba2);
            border: none;
            color: white;
        }

        .btn-primary-custom:hover {
            background: linear-gradient(135deg, #5a6fd8, #6a4190);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
            color: white;
        }

        .btn-outline-custom {
            border: 2px solid #667eea;
            color: #667eea;
            background: transparent;
        }

        .btn-outline-custom:hover {
            background: #667eea;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        .floating-particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            overflow: hidden;
        }

        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.6);
            border-radius: 50%;
            animation: float 6s infinite linear;
        }

        .particle:nth-child(1) {
            width: 6px;
            height: 6px;
            left: 10%;
            animation-delay: 0s;
        }

        .particle:nth-child(2) {
            width: 4px;
            height: 4px;
            left: 20%;
            animation-delay: 1s;
        }

        .particle:nth-child(3) {
            width: 8px;
            height: 8px;
            left: 30%;
            animation-delay: 2s;
        }

        .particle:nth-child(4) {
            width: 5px;
            height: 5px;
            left: 40%;
            animation-delay: 3s;
        }

        .particle:nth-child(5) {
            width: 7px;
            height: 7px;
            left: 50%;
            animation-delay: 4s;
        }

        .particle:nth-child(6) {
            width: 4px;
            height: 4px;
            left: 60%;
            animation-delay: 5s;
        }

        .particle:nth-child(7) {
            width: 6px;
            height: 6px;
            left: 70%;
            animation-delay: 6s;
        }

        .particle:nth-child(8) {
            width: 5px;
            height: 5px;
            left: 80%;
            animation-delay: 7s;
        }

        .particle:nth-child(9) {
            width: 8px;
            height: 8px;
            left: 90%;
            animation-delay: 8s;
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
                transform: translateY(-100px) rotate(360deg);
                opacity: 0;
            }
        }

        .feature-list {
            text-align: left;
            margin: 2rem 0;
        }

        .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            padding: 0.5rem;
            border-radius: 10px;
            transition: all 0.3s ease;
            animation: fadeInLeft 0.6s ease-out both;
        }

        .feature-item:nth-child(1) {
            animation-delay: 1s;
        }

        .feature-item:nth-child(2) {
            animation-delay: 1.2s;
        }

        .feature-item:nth-child(3) {
            animation-delay: 1.4s;
        }

        .feature-item:hover {
            background: rgba(102, 126, 234, 0.1);
            transform: translateX(5px);
        }

        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .feature-icon {
            width: 35px;
            height: 35px;
            background: linear-gradient(135deg, #00d4aa, #00a085);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            color: white;
            font-size: 0.9rem;
        }

        @media (max-width: 576px) {
            .title {
                font-size: 1.8rem;
            }

            .success-icon {
                width: 70px;
                height: 70px;
            }

            .success-icon i {
                font-size: 2rem;
            }
        }
    </style>
</head>

<body>
    <div class="floating-particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-lg-5 col-md-7 col-sm-9">
                <div class="card confirmation-card border-0 p-4">
                    <div class="card-body text-center">
                        <div class="success-icon">
                            <i class="fas fa-check"></i>
                        </div>

                        <h1 class="title">Newsletter Subscription Confirmed!</h1>

                        <p class="subtitle">
                            Thank you for joining our community! You're now subscribed to receive our latest updates,
                            insights, and exclusive content straight to your inbox.
                        </p>

                        <div class="feature-list">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fas fa-newspaper"></i>
                                </div>
                                <span class="text-muted">Weekly newsletter updates</span>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fas fa-lightbulb"></i>
                                </div>
                                <span class="text-muted">Exclusive insights & tips</span>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fas fa-bell"></i>
                                </div>
                                <span class="text-muted">Early access to announcements</span>
                            </div>
                        </div>

                        <div class="action-buttons d-grid gap-3">
                            <button class="btn btn-primary-custom btn-custom"
                                onclick="window.location.href='{{ route('home') }}'">
                                <i class="fas fa-home me-2"></i>
                                Return to Homepage
                            </button>
                            <button class="btn btn-outline-custom btn-custom" onclick="window.location.href='#'">
                                <i class="fas fa-share-alt me-2"></i>
                                Share with Friends
                            </button>
                        </div>

                        <div class="mt-4">
                            <small class="text-muted">
                                <i class="fas fa-envelope me-1"></i>
                                You can unsubscribe at any time by clicking the link in our emails
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add click effects to buttons
        document.querySelectorAll('.btn-custom').forEach(button => {
            button.addEventListener('click', function(e) {
                let ripple = document.createElement('span');
                let rect = this.getBoundingClientRect();
                let size = Math.max(rect.width, rect.height);
                let x = e.clientX - rect.left - size / 2;
                let y = e.clientY - rect.top - size / 2;

                ripple.style.cssText = `
                    width: ${size}px;
                    height: ${size}px;
                    left: ${x}px;
                    top: ${y}px;
                    position: absolute;
                    border-radius: 50%;
                    background: rgba(255,255,255,0.3);
                    transform: scale(0);
                    animation: ripple 0.6s linear;
                    pointer-events: none;
                `;

                this.appendChild(ripple);

                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });

        // Add ripple animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);

        // Add hover sound effect simulation (visual feedback)
        document.querySelectorAll('.btn-custom, .feature-item').forEach(element => {
            element.addEventListener('mouseenter', function() {
                this.style.transform = this.classList.contains('btn-custom') ? 'translateY(-2px)' :
                    'translateX(5px)';
            });

            element.addEventListener('mouseleave', function() {
                this.style.transform = '';
            });
        });
    </script>
</body>

</html>
