<header class="barter-header">
    <div class="header-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="inner-1">
                        <div>
                            <a href="#">
                                <i class="fa-solid fa-location-dot"></i>
                                <h4 class="inner1-a">Store Location</h4>
                            </a>
                        </div>
                        <div>
                            <a href="#">
                                <i class="fa-solid fa-box"></i>
                                <h4 class="inner1-a">Track Your Order</h4>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="inner-2">
                        <div>
                            <a href="#" class="app-txt">
                                <p class="apptext">Buyer Protection</p>
                            </a>
                        </div>
                        <div>
                            <a href="#" class="app-txt">
                                <p class="apptext">Help</p>
                            </a>
                        </div>
                        <div>
                            <a href="#" class="app-txt">
                                <i class="fa-solid fa-mobile"></i>
                                <p class="apptext">Save big on our app!</p>
                            </a>
                        </div>
                        <div class="dropdown inner-drop">
                            <button onclick="myFunction()" class="dropbtn">USD </button>
                            <div id="myDropdown" class="dropdown-content">
                                <a href="">USD</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-inner1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <img src="{{ asset('assets/images/BP-Logo.png') }}" class="logo-market" />
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="hidden" name="search_param" value="shirt" id="search_param">
                        <input type="text" class="form-control" name="x" placeholder="i’m shoping for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default1" type="button"><i
                                    class="fa fa-magnifying-glass"></i></button>
                        </span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="icons-div">
                        @if (Auth::check())
                            @if (Auth::user()->hasRole('admin'))
                                <a href="{{ route('admin.dashboard') }}">
                                    <!-- User is logged in and has admin role -->
                                    <i class="fa-solid fa-user-shield"></i> <!-- Admin icon -->
                                </a>
                            @else
                                <a href="{{ route('user.dashboard') }}">
                                    <!-- User is either not logged in or does not have admin role -->
                                    <i class="fa-regular fa-user"></i> <!-- Regular user icon -->
                                </a>
                            @endif
                        @else
                            <a href="{{ route('login') }}">
                                <!-- User is either not logged in or does not have admin role -->
                                <i class="fa-regular fa-user"></i> <!-- Regular user icon -->
                            </a>

                        @endif

                        <a href="#"><i class="fa-regular fa-heart"></i></a>
                        <div class="notice_box">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <span class="bubble_count">10</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-inner2">
        <h4 class="inner2-a">Most searched :</h4>
        <a href="" class="inner2-b">Electronics</a>
        <a href="" class="inner2-b">Smart Led</a>
        <a href="" class="inner2-b">Mobile</a>
        <a href="" class="inner2-b">Car</a>
    </div>
</header>
