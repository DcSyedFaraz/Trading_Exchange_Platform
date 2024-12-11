<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/sharp-duotone-solid.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/sharp-thin.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/sharp-solid.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/sharp-regular.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/sharp-light.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <title>@yield('title', 'Dashhboard')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <div class="row align-items-center">
        <div class="col-md-2">
            @include('admin.layout.sidebar')
        </div>
        <div class="col-md-10">
            <section class="main-sec">
                <div class="main-cont">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="admin">
                                <h1>Admin Portal</h1>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="sm-header">
                                <div class="notice_box1">
                                    <a href="#" class="dropdown-toggle" role="button" id="dropdownMenuLink"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-light fa-bell"></i>
                                        <span class="bubble_count">6</span>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a href="#" class="mark-read"><i class="fa-solid fa-check-double"></i> Read All</a>
                                        <ul>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        </ul>
                                        <a href="#" class="view-all">View All Notifications <i class="fa-solid fa-up-right-from-square"></i></a>
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

                                    <a href="#">
                                        <i class="fa-brands fa-facebook-messenger"></i>
                                        @if ($unread > 0)
                                            <span class="bubble_count">{{ $unread }}</span>
                                        @endif
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @yield('content')

            </section>
        </div>
    </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    var usa_states = {
        "California": ["Los Angeles", "San Francisco", "San Diego", "Sacramento"],
        "Texas": ["Houston", "Austin", "Dallas", "San Antonio"],
        "Florida": ["Miami", "Orlando", "Tampa", "Jacksonville"],
        "New York": ["New York City", "Buffalo", "Rochester", "Albany"],
        "Illinois": ["Chicago", "Springfield", "Naperville", "Peoria"]
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
