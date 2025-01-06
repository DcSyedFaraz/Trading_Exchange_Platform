<header class="barter-header">
    <div class="header-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="inner-2">
                        <div>
                            <a href="{{ route('marketplace.plans') }}" class="app-txt">
                                <p class="apptext">Plans</p>|
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
                    <form action="{{ route('products.search') }}" method="GET">
                        <div class="input-group">
                            <!-- Hidden input if needed -->
                            <input type="hidden" name="search_param" value="{{ $searchParam ?? '' }}"
                                id="search_param">

                            <!-- Search Text Input -->
                            <input type="text" class="form-control" name="x" placeholder="I’m shopping for..."
                                value="{{ request('x') }}">

                            <!-- Category Select -->
                            <select id="searchType" name="searchType" class="form-control" required>
                                <option value="all"
                                    {{ request('searchType') == 'all' || !request('searchType') ? 'selected' : '' }}>
                                    All Categories</option>

                                @foreach ($categories as $cat)
                                    @if ($cat->children->count() > 0)
                                        <optgroup label="{{ strtoupper($cat->name) }}">
                                            @foreach ($cat->children as $child)
                                                <option value="{{ $child->id }}"
                                                    {{ request('searchType') == $child->id ? 'selected' : '' }}>
                                                    {{ $child->name }}
                                                </option>
                                            @endforeach
                                        </optgroup>
                                    @else
                                        <option value="{{ $cat->id }}"
                                            {{ request('searchType') == $cat->id ? 'selected' : '' }}>
                                            {{ $cat->name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>

                            <!-- Submit Button -->
                            <span class="input-group-btn">
                                <button class="btn btn-default1" type="submit">
                                    <i class="fa fa-magnifying-glass"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="col-md-3">
                    <div class="icons-div">
                        <a href="{{ route('login') }}"><i class="fa-regular fa-user"></i></a>
                        @auth
                            {{-- <a href="#"><i class="fa-regular fa-heart"></i></a> --}}
                            <a href="{{ route('chat.index') }}"><i class="fa-regular fa-comments"></i></a>
                        @endauth
                        <a href="{{ route('auction.index') }}" class="aucbtn">Auction</a>
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
