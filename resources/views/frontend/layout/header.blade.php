<header class="header">
    <nav class="navbar navbar-dark navbar-expand-lg">
        <div class="container d-block">
            <div class="row align-items-center">
                <div class="col-md-2 col-6">
                    <a class="navbar-brand" href="/"><img src="{{ asset('assets/images/BP-Logo.png') }}"
                            alt="logo" class="logo"></a>
                </div>
                <div class="col-md-8 d-none d-md-block">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about_us') }}">About Us</a>
                        </li>
                        <!--<li class="nav-item">-->
                        <!--    <div class="dropdown">-->
                        <!--        <button class="btn btn-primary dropdown-toggle">Services</button>-->
                        <!--        <span class="caret"></span></button>-->
                        <!--        <ul class="dropdown-menu">-->
                        <!--            <li><a href="#">Commercial office cleaning </a></li>-->
                        <!--            <li><a href="#">Industrial office cleaning</a></li>-->
                        <!--            <li><a href="#">Stripping and waxing VCT flooring</a></li>-->
                        <!--            <li><a href="#">Carpet cleanings</a></li>-->
                        <!--        </ul>-->
                        <!--    </div>-->
                        <!--</li>-->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('faqs') }}">FAQs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact_us') }}">Contact us</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-2 d-none d-md-flex gap-3">
                    <a href="{{ route('login') }}" class="login-btn"><i class="fa-regular fa-user"></i><span>Login</span></a>
                    <a href="{{ route('marketplace') }}" class="market-btn">Barter Nation
                    </a>
                </div>
                <div class="col-6 d-md-none d-block">
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#navbarOffcanvas" aria-controls="navbarOffcanvas" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="offcanvas offcanvas-end bg-secondary secondary-1" id="navbarOffcanvas" tabindex="-1"
                        aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header">
                            <button type="button" class="btn-close btn-close-white text-reset"
                                data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('about_us') }}">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('faqs') }}">FAQs</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('contact_us') }}">Contact us</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="login-btn"><i class="fa-regular fa-user"></i><span>Login</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('marketplace') }}" class="market-btn">Barter Nation</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>