@extends('frontend.marketplace.layout.app')
@section('content')
<section class="barter-1 auction-main pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="main-imgbox">
                    <div class="container demo">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="form-label">State</label>
                                <div class="col-sm-12">
                                    <select name="state" id="state" class="form-control"></select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">City</label>
                                <div class="col-sm-12">
                                    <select name="city" id="city" class="form-control"></select>
                                </div>
                            </div>
                        </form>

                    </div>
                    @forelse ($products as $product)
                    <div class="imgbox auction-imgbox">
                        @if ($product->images->count() > 0)
                        <!-- Display All Uploaded Images -->
                        <img src="{{ asset('storage/' . $product->images->first()->image_path) }}"
                            class="imbox-img" alt="{{ $product->name }}">
                        @endif
                        <a href="{{ route('auction.show', $product->id) }}" class="imgbox-b">
                            <h4>{{ $product->name }}</h4>
                        </a>
                        <p>{{ \Illuminate\Support\Str::limit($product->description, 65, '...') }}</p>
                        <p>Highest Bid: ${{ number_format($product->highest_bid ?? $product->minimum_bid, 2) }}</p>
                        <div class="Btndiv">
                            <a href="{{ route('auction.show', $product->id) }}" class="Firstbtn">View
                                Details</a>

                            @auth
                            <!-- Bid Button Triggers Modal -->
                            <button type="button" class=" Secbtn1" data-bs-toggle="modal"
                                data-bs-target="#bidModal" data-product-id="{{ $product->id }}"
                                data-product-name="{{ $product->name }}"
                                data-current-bid="{{ $product->highest_bid ?? $product->minimum_bid }}">
                                Bid
                            </button>
                            @else
                            <!-- Redirect to Login if Not Authenticated -->
                            <a href="{{ route('login') }}" class="Secbtn1">Bid</a>
                            @endauth
                        </div>
                    </div>
                    @empty
                    <div class="text-center">
                        <h2>No products found</h2>
                    </div>
                    @endforelse
                    <!-- Bid Modal -->
                    <div class="modal fade" id="bidModal" tabindex="-1" aria-labelledby="bidModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <form id="bidForm" method="POST" action="">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Place Your Bid</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p id="productName" class="text-black"></p>
                                        <div class="mb-3">
                                            <label for="bid_amount" class="form-label">Your Bid ($)</label>
                                            <input type="number" step="0.01" class="form-control" id="bid_amount"
                                                name="bid_amount" required>
                                            <div id="bidHelp" class="form-text">Minimum bid: $<span
                                                    id="minBid"></span></div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Place Bid</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="barter-4">
    <div class="container">
        {{-- <div>
                <img src="{{ asset('assets/images/market/truck.png') }}" class="truck-img" />
        <h4 class="barter4-a">Worldwide Delivery</h4>
        <p class="barter4-b">With sites in 5 languages, we ship to over 200
            countries & regions.</p>
    </div> --}}
    <div>
        <img src="{{ asset('assets/images/market/credit-card.png') }}" class="truck-img" />
        <h4 class="barter4-a">Safe Payment</h4>
        <p class="barter4-b">Pay with the world’s most popular and secure
            payment methods.</p>
    </div>
    <div>
        <img src="{{ asset('assets/images/market/safety.png') }}" class="truck-img" />
        <h4 class="barter4-a">Shop with Confidence</h4>
        <p class="barter4-b">Our Buyer Protection covers your purchase
            from click to delivery.</p>
    </div>
    <div>
        <img src="{{ asset('assets/images/market/telephone.png') }}" class="truck-img" />
        <h4 class="barter4-a">24/7 Help Center</h4>
        <p class="barter4-b">Round-the-clock assistance for a smooth
            shopping experience.</p>
    </div>
    </div>
</section>
@endsection
@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var bidModal = document.getElementById('bidModal');
        var bidForm = document.getElementById('bidForm');
        var productNameElem = document.getElementById('productName');
        var minBidElem = document.getElementById('minBid');

        bidModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var productId = button.getAttribute('data-product-id');
            var productName = button.getAttribute('data-product-name');
            var currentBid = parseFloat(button.getAttribute('data-current-bid')) || 0;

            // Update modal content
            productNameElem.textContent = 'Product: ' + productName;
            minBidElem.textContent = (currentBid + 1).toFixed(
                2); // Assuming minimum next bid is currentBid + 1

            // Update the form action to the correct route
            bidForm.action = "{{ route('auction.placeBid', ':id') }}".replace(':id',
                productId);

            // Set the minimum bid amount
            var bidAmountInput = document.getElementById('bid_amount');
            bidAmountInput.min = (currentBid + 1).toFixed(2);
            bidAmountInput.placeholder = 'Minimum bid: $' + (currentBid + 1).toFixed(2);
            bidAmountInput.value = ''; // Clear previous input
        });
    });
</script>

<script>
    // USA states and corresponding cities
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


    function populateStates(stateElementId, cityElementId) {
        var stateElement = document.getElementById(stateElementId);
        stateElement.length = 0; // Clear existing options

        stateElement.options[0] = new Option("Select State", "");
        stateElement.selectedIndex = 0;

        // Populate states
        for (var state in usa_states) {
            stateElement.options[stateElement.length] = new Option(state, state);
        }

        // Add onchange event to populate cities
        stateElement.onchange = function() {
            populateCities(stateElementId, cityElementId);
        };
    }

    function populateCities(stateElementId, cityElementId) {
        var stateElement = document.getElementById(stateElementId);
        var cityElement = document.getElementById(cityElementId);

        cityElement.length = 0; // Clear existing options

        cityElement.options[0] = new Option("Select City", "");
        cityElement.selectedIndex = 0;

        var selectedState = stateElement.value;

        if (selectedState && usa_states[selectedState]) {
            var cities = usa_states[selectedState];
            for (var i = 0; i < cities.length; i++) {
                cityElement.options[cityElement.length] = new Option(cities[i], cities[i]);
            }
        }

        console.log(selectedState);
    }

    // Initialize dropdowns
    populateStates("state", "city");
</script>
@endsection