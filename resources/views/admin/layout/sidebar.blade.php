<div class="sidebar-wrapper">
    <div class="sidebar" id="sidebar">
        <div class="Dashlogo">
            <a href="{{ route('marketplace') }}">

                <img src="{{ asset('assets/images/BP-Logo.png') }}" alt="">
            </a>
        </div>
        <ul>
            <div class="First_sec">
                <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}"><a href="{{ route('dashboard') }}"><i
                            class="fa-sharp fa-light fa-grid-horizontal"></i><span>Dashboard</span></a>
                </li>
                @if (auth()->user()->hasRole('admin'))
                    <li class="{{ request()->routeIs('users.*') ? 'active' : '' }}"><a
                            href="{{ route('users.index') }}"><i class="fa-light fa-file-lines"></i><span>User
                                Management</span></a>
                    </li>
                    <li class="{{ request()->routeIs('admin.subscribe') ? 'active' : '' }}"><a
                            href="{{ route('admin.subscribe') }}"><i
                                class="fa-light fa-file-lines"></i><span>Subscription
                                Management</span></a>
                    </li>
                    <li class="{{ request()->routeIs('featured.*') ? 'active' : '' }}">
                        <a href="{{ route('featured.index') }}"><i class="fa-light fa-wallet"></i><span>Our
                                Featured</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('ad.*') ? 'active' : '' }}"><a href="{{ route('ad.index') }}"><i
                                class="fa-sharp fa-light fa-arrow-up-to-arc"></i><span>Ads
                                Upload</span></a>
                    </li>
                    <li class="{{ request()->routeIs('categories.*') ? 'active' : '' }}"><a
                            href="{{ route('categories.index') }}"><i
                                class="fa-sharp fa-light fa-briefcase"></i><span>Categories
                                Update</span></a>
                    </li>
                @endif
                <li class="{{ request()->routeIS('products.*') ? 'active' : '' }}"><a
                        href="{{ route('products.index') }}"><i class="fa-light fa-chart-simple"></i><span>Barter
                            Listing</span></a>
                </li>
                <li class="{{ request()->routeIs('auction_products.*') ? 'active' : '' }}">
                    <a href="{{ route('auction_products.index') }}"><i class="fa-light fa-wallet"></i><span>
                            Auction Products
                        </span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('campaign.*') ? 'active' : '' }}">
                    <a href="{{ route('campaign.index') }}"><i class="fa-light fa-wallet"></i><span>
                            Campaigns
                        </span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('campaign.analytics') ? 'menuitem-active' : '' }}">
                    <a href='{{ route('campaign.analytics') }}'>
                        <i class="fa-light fa-wallet"></i>
                        <span> Mail Analytics </span>
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

                    <span>
                        <a href="#" id="logout-link">
                            <i class="fa-light fa-right-from-bracket"></i>
                            <h4>Logout</h4>
                        </a>
                    </span>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                    <script>
                        document.getElementById('logout-link').addEventListener('click', function(e) {
                            e.preventDefault(); // Prevent default anchor behavior
                            document.getElementById('logout-form').submit(); // Submit the hidden form
                        });
                    </script>

                </div>
            </ul>
        </div>
    </div>
    <div class="content-menu">
        <div class="top-navbar">
            <i class="fa-solid fa-bars" id="menu-icon"></i>
        </div>
    </div>
</div>
