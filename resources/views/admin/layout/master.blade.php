<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/fav.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/sharp-duotone-solid.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/sharp-thin.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/sharp-solid.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/sharp-regular.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/sharp-light.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.15.3/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.15.3/dist/sweetalert2.min.css">

    <title>@yield('title', 'Dashhboard')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <section class="dashi">
        <div class="dashi-firstcol">
            @include('admin.layout.sidebar')
        </div>
        <section class="main-sec">
                    <div class="main-cont">
                        <div class="row align-items-center">
                            <div class="col-md-6 col-6">
                                <div class="admin">
                                    <!-- <h1>
                                        @if (auth()->user()->hasRole('admin'))
                                            Admin
                                        @else
                                            User
                                        @endif Portal
                                    </h1> -->
                                    <h1>Trader's Exchange</h1>
                                </div>
                            </div>
                            <div class="col-md-6 col-6">
                                <div class="sm-header">
                                    <!-- resources/views/partials/notifications.blade.php -->

                                    <div class="notice_box1">
                                        <a href="#" class="dropdown-toggle" role="button" id="dropdownMenuLink"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-light fa-bell"></i>
                                            @if (auth()->user()->unreadNotifications->count() > 0)
                                                <span
                                                    class="bubble_count">{{ auth()->user()->unreadNotifications->count() }}</span>
                                            @endif
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <!-- Mark All as Read -->
                                            <form action="{{ route('notifications.markAllRead') }}" method="POST"
                                                class="d-flex justify-content-end px-3 py-2">
                                                @csrf
                                                <button type="submit" class="btn btn-link mark-read p-0"
                                                    title="Mark all as read" data-bs-toggle="tooltip"
                                                    @if (auth()->user()->unreadNotifications->count() == 0) disabled @endif>
                                                    <i class="fa-solid fa-check-double"></i> Read All
                                                </button>
                                            </form>

                                            <!-- Notifications List -->
                                            <ul class="list-unstyled mb-0">
                                                @forelse (auth()->user()->unreadNotifications as $notification)
                                                    <li>
                                                        <a class="dropdown-item d-flex justify-content-between align-items-center"
                                                            href="{{ $notification->data['url'] ?? '#' }}">
                                                            <span>{{ $notification->data['message'] ?? 'No message available' }}</span>
                                                            @if (is_null($notification->read_at))
                                                                <span class="badge bg-primary ms-2 rounded-pill">New</span>
                                                            @endif
                                                        </a>
                                                    </li>
                                                @empty
                                                    <li class="dropdown-item text-center">No notifications available.</li>
                                                @endforelse
                                            </ul>

                                            <!-- View All Notifications -->
                                            {{-- <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item view-all">
                                                View All Notifications <i class="fa-solid fa-up-right-from-square"></i>
                                            </a> --}}
                                        </div>
                                    </div>

                                    <div class="notice_box">
                                        @php
                                            $authid = auth()->id();
                                            $unread = App\Models\Message::whereHas('chat', function ($query) use ($authid) {
                                                $query->where('user_one_id', $authid)->orWhere('user_two_id', $authid);
                                            })
                                                ->where('sender_id', '!=', $authid)
                                                ->whereNull('read_at')
                                                ->count();
                                        @endphp

                                        <a href="{{ route('chat.index') }}">
                                            <i class="fa-brands fa-facebook-messenger"></i>
                                            @if ($unread > 0)
                                                <span class="bubble_count">{{ $unread }}</span>
                                            @endif
                                            Messages
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @yield('content')

        </section>
    </section>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>
<script>
    var usa_states = {
        "Alabama": ["Birmingham", "Montgomery", "Mobile", "Huntsville"],
        "Alaska": ["Anchorage", "Fairbanks", "Juneau"],
        "Arizona": ["Phoenix", "Tucson", "Mesa", "Chandler"],
        "Arkansas": ["Little Rock", "Fort Smith", "Fayetteville", "Springdale"],
        "California": ["Los Angeles", "San Francisco", "San Diego", "Sacramento"],
        "Colorado": ["Denver", "Colorado Springs", "Aurora", "Fort Collins"],
        "Connecticut": ["Bridgeport", "New Haven", "Stamford", "Hartford"],
        "Delaware": ["Wilmington", "Dover", "Newark"],
        "Florida": ["Miami", "Orlando", "Tampa", "Jacksonville"],
        "Georgia": ["Atlanta", "Augusta", "Columbus", "Savannah"],
        "Hawaii": ["Honolulu", "Hilo", "Kailua", "Kapolei"],
        "Idaho": ["Boise", "Meridian", "Nampa", "Idaho Falls"],
        "Illinois": ["Chicago", "Springfield", "Naperville", "Peoria"],
        "Indiana": ["Indianapolis", "Fort Wayne", "Evansville", "South Bend"],
        "Iowa": ["Des Moines", "Cedar Rapids", "Davenport", "Sioux City"],
        "Kansas": ["Wichita", "Overland Park", "Kansas City", "Topeka"],
        "Kentucky": ["Louisville", "Lexington", "Bowling Green", "Owensboro"],
        "Louisiana": ["New Orleans", "Baton Rouge", "Shreveport", "Lafayette"],
        "Maine": ["Portland", "Lewiston", "Bangor", "South Portland"],
        "Maryland": ["Baltimore", "Frederick", "Rockville", "Gaithersburg"],
        "Massachusetts": ["Boston", "Worcester", "Springfield", "Lowell"],
        "Michigan": ["Detroit", "Grand Rapids", "Warren", "Sterling Heights"],
        "Minnesota": ["Minneapolis", "Saint Paul", "Rochester", "Duluth"],
        "Mississippi": ["Jackson", "Gulfport", "Southaven", "Hattiesburg"],
        "Missouri": ["Kansas City", "St. Louis", "Springfield", "Columbia"],
        "Montana": ["Billings", "Missoula", "Great Falls", "Bozeman"],
        "Nebraska": ["Omaha", "Lincoln", "Bellevue", "Grand Island"],
        "Nevada": ["Las Vegas", "Reno", "Henderson", "Carson City"],
        "New Hampshire": ["Manchester", "Nashua", "Concord", "Dover"],
        "New Jersey": ["Newark", "Jersey City", "Paterson", "Elizabeth"],
        "New Mexico": ["Albuquerque", "Las Cruces", "Rio Rancho", "Santa Fe"],
        "New York": ["New York City", "Buffalo", "Rochester", "Albany"],
        "North Carolina": ["Charlotte", "Raleigh", "Greensboro", "Durham"],
        "North Dakota": ["Fargo", "Bismarck", "Grand Forks", "Minot"],
        "Ohio": ["Columbus", "Cleveland", "Cincinnati", "Toledo"],
        "Oklahoma": ["Oklahoma City", "Tulsa", "Norman", "Broken Arrow"],
        "Oregon": ["Portland", "Eugene", "Salem", "Gresham"],
        "Pennsylvania": ["Philadelphia", "Pittsburgh", "Allentown", "Erie"],
        "Rhode Island": ["Providence", "Cranston", "Warwick", "Pawtucket"],
        "South Carolina": ["Columbia", "Charleston", "North Charleston", "Greenville"],
        "South Dakota": ["Sioux Falls", "Rapid City", "Aberdeen", "Brookings"],
        "Tennessee": ["Nashville", "Memphis", "Knoxville", "Chattanooga"],
        "Texas": ["Houston", "Austin", "Dallas", "San Antonio"],
        "Utah": ["Salt Lake City", "West Valley City", "Provo", "West Jordan"],
        "Vermont": ["Burlington", "South Burlington", "Rutland", "Barre"],
        "Virginia": ["Virginia Beach", "Norfolk", "Chesapeake", "Richmond"],
        "Washington": ["Seattle", "Spokane", "Tacoma", "Vancouver"],
        "West Virginia": ["Charleston", "Huntington", "Morgantown", "Parkersburg"],
        "Wisconsin": ["Milwaukee", "Madison", "Green Bay", "Kenosha"],
        "Wyoming": ["Cheyenne", "Casper", "Laramie", "Gillette"]
    };

    /**
     * Populates the state dropdown with options
     * @param {string} stateElementId - The id of the state dropdown element
     * @param {string} cityElementId - The id of the city dropdown element
     * @param {string} selectedState - The pre-selected state (optional)
     * @param {string} selectedCity - The pre-selected city (optional)
     */
    function populateStates(stateElementId, cityElementId, selectedState = '', selectedCity = '') {
        var stateElement = document.getElementById(stateElementId);
        var cityElement = document.getElementById(cityElementId);

        if (stateElement && cityElement) {
            stateElement.innerHTML = '';
            cityElement.innerHTML = '';


            stateElement.options[0] = new Option("Select State", "");


            for (var state in usa_states) {
                var option = new Option(state, state);
                if (state === selectedState) {
                    option.selected = true;
                }
                stateElement.appendChild(option);
            }


            if (selectedState) {
                populateCities(stateElementId, cityElementId, selectedState, selectedCity);
            }


            stateElement.onchange = function() {
                var newState = stateElement.value;
                populateCities(stateElementId, cityElementId, newState);
            };
        }
    }

    /**
     * Populates the city dropdown based on the selected state
     * @param {string} stateElementId - The id of the state dropdown element
     * @param {string} cityElementId - The id of the city dropdown element
     * @param {string} selectedState - The selected state
     * @param {string} selectedCity - The pre-selected city (optional)
     */
    function populateCities(stateElementId, cityElementId, selectedState, selectedCity = '') {
        var stateElement = document.getElementById(stateElementId);
        var cityElement = document.getElementById(cityElementId);


        cityElement.innerHTML = '';


        cityElement.options[0] = new Option("Select City", "");

        var cities = usa_states[selectedState];
        if (cities) {

            for (var i = 0; i < cities.length; i++) {
                var option = new Option(cities[i], cities[i]);
                if (cities[i] === selectedCity) {
                    option.selected = true;
                }
                cityElement.appendChild(option);
            }
        }
    }


    document.addEventListener("DOMContentLoaded", function() {
        var selectedState = "{{ old('state', $auctionProduct->state ?? '') }}";
        var selectedCity = "{{ old('province', $auctionProduct->province ?? '') }}";
        populateStates("state", "province", selectedState, selectedCity);
    });
</script>

<script>
    let menu = document.querySelector('#menu-icon');
    let sidenavbar = document.querySelector('#sidebar');
    let content = document.querySelector('.content-menu');
    let mainsec =document.querySelector('.main-sec');
    let dash =document.querySelector('.dashi');

    menu.onclick = () => {
        sidenavbar.classList.toggle('active');
        content.classList.toggle('active');
        mainsec.classList.toggle('active');
        dash.classList.toggle('active');
    }
</script>

<script>
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('toggleBtn');
    const indicator = document.getElementById('indicator');
    const menuItems = document.querySelectorAll('.sidebar ul li');

    if (toggleBtn) {

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('open');

            if (sidebar.classList.contains('open')) {
                toggleBtn.innerHTML = '<i class="fa-solid fa-bars"></i>';
            } else {
                toggleBtn.innerHTML = '<i class="fa-solid fa-bars"></i>';
            }
        });
    }


    menuItems.forEach((item, index) => {
        item.addEventListener('mouseover', () => {
            const itemHeight = item.offsetHeight;
            const offsetTop = item.offsetTop;
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    @if (session('success'))
        toastr.success("{{ session('success') }}");
    @endif
    @if (session('error'))
        toastr.error("{{ session('error') }}")
    @endif
    @if (session('info'))
        toastr.info("{{ session('info') }}")
    @endif
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}")
        @endforeach
    @endif
</script>

@yield('scripts')

</html>
