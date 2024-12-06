<div class="sidebar-wrapper">
    <div class="sidebar" id="sidebar">
        <div class="Dashlogo">
            <a href="{{ route('marketplace') }}">

                <img src="{{ asset('assets/images/BP-Logo.png') }}" alt="">
            </a>
        </div>
        <ul>
            <div class="First_sec">
                <li class="{{ request()->routeIs('admin.*') ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}"><i
                            class="fa-sharp fa-light fa-grid-horizontal"></i><span>Dashboard</span></a>
                </li>
                <li class="{{ request()->routeIS('products.*') ? 'active' : '' }}"><a href="{{ route('products.index') }}"><i class="fa-light fa-chart-simple"></i><span>Product
                            Pages</span></a>
                </li>
                <li class="{{ request()->routeIs('user_manage.*') ? 'active' : '' }}"><a href="{{ route('user_manage.index') }}"><i
                            class="fa-light fa-file-lines"></i><span>User Management</span></a>
                </li>
                <li class="{{ request()->routeIs('ad.*') ? 'active' : '' }}"><a href="{{ route('ad.index') }}"><i class="fa-sharp fa-light fa-arrow-up-to-arc"></i><span>Ads
                            Upload</span></a>
                </li>
                <li class="{{ request()->routeIs('category.*') ? 'active' : '' }}"><a href="{{ route('category.index') }}"><i
                            class="fa-sharp fa-light fa-briefcase"></i><span>Categories
                            Update</span></a>
                </li>
                <li class="{{ request()->routeIs('featured.*') ? 'active' : '' }}">
                    <a href="{{ route('featured.index') }}"><i class="fa-light fa-wallet"></i><span>Our
                            Featured</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('auction_products.*') ? 'active' : '' }}">
                    <a href="{{ route('auction_products.index') }}"><i class="fa-light fa-wallet"></i><span>
                            Auction Products
                        </span>
                    </a>
                </li>
            </div>
        </ul>
        <div class="usersss">
            <ul>
                <h5>Insights</h5>
                <li><a href="#"><i class="fa-light fa-bell"></i></a><span>Notifications</span></li>
                <div class="profile">

                    <a href="{{ route('edit_profile.index') }}">
                        <img src="{{ asset('assets/img/account.png') }} " alt="profile pic">
                    </a>

                    <span><a href="#"><i class="fa-light fa-right-from-bracket"></i></a></span>
                </div>
            </ul>
        </div>
    </div>
</div>
