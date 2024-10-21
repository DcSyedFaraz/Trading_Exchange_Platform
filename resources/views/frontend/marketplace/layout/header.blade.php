<header class="barter-header">
    <div class="header-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="inner-2">
                        <div>
                            <a href="#" class="app-txt">
                                <p class="apptext">Setting</p>|
                            </a>
                        </div>
                        <div>
                            <a href="#" class="app-txt">
                                <p class="apptext">Help</p>|
                            </a>
                        </div>
                        <div>
                            <a href="#" class="app-txt">
                                <i class="fa-solid fa-globe"></i>
                                <p class="apptext">English</p>|
                            </a>
                        </div>
                        <div class="dropdown inner-drop">
                            <button onclick="myFunction()" class="dropbtn">USD</button>
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
                    <a href="{{ route('marketplace') }}">

                        <img src="{{ asset('assets/images/BP-Logo.png') }}" class="logo-market" />
                    </a>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="hidden" name="search_param" value="shirt" id="search_param">
                        <input type="text" class="form-control" name="x" placeholder="i’m shoping for...">
                        <select id="searchType" name="searchType">
                            <option class="option" value="1">All Categories</option>
                            <option class="option" value="2">AUTOMOBILES</option>
                            <option class="option" value="3">BOATS</option>
                            <option class="option" value="4">BUSINESS AND INDUSTRIAL</option>
                            <option class="option" value="5">COLLECTIBLES</option>
                            <option class="option" value="6">EPHEMERRA</option>
                            <option class="option" value="7">FIREARMS</option>
                            <option class="option" value="8">JEWELLRY and WATCHES</option>
                            <option class="option" value="9">GOODS & SERVICES</option>
                            <option class="option" value="10">MILITARIA</option>
                            <option class="option" value="11">NUMISMATICS</option>
                            <option class="option" value="12">PHILITATELICS</option>
                            <option class="option" value="13">REAL ESTATE</option>
                            <option class="option" value="13">UNIQUE/ ODD/ INVALUBLES</option>
                            <option class="option" value="13">SPORTING COLLECTIBLES</option>
                        </select>
                        <span class="input-group-btn">
                            <button class="btn btn-default1" type="button"><i
                                    class="fa fa-magnifying-glass"></i></button>
                        </span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="icons-div">
                        <a href="{{ route('login') }}"><i class="fa-regular fa-user"></i></a>
                        @auth
                            <a href="#"><i class="fa-regular fa-heart"></i></a>
                            <a href="{{ route('chat.index') }}"><i class="fa-regular fa-comments"></i></a>
                        @endauth
                        <a href="#" class="aucbtn">Auction</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (Route::currentRouteName() == 'marketplace')
        <div class="header-inner2">
            <h4 class="inner2-a">Most searched :</h4>
            <a href="" class="inner2-b">Electronics</a>
            <a href="" class="inner2-b">Smart Led</a>
            <a href="" class="inner2-b">Mobile</a>
            <a href="" class="inner2-b">Car</a>
        </div>
    @endif

</header>
