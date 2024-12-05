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
                        <div class="imgbox auction-imgbox">
                            <img src="{{ asset('assets/images/market/f1.png') }}" class="imbox-img" />
                            <a href="#" class="imgbox-b">
                                <h4>Model J11</h4>
                            </a>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                            <p>$1,215.00</p>
                            <div class="Btndiv">
                                <a href="{{ route('auction.show', 1) }}" class="Firstbtn">View Details</a>
                                <a href="#" class="Secbtn1">Bid</a>
                            </div>
                        </div>
                        <div class="imgbox auction-imgbox">
                            <img src="{{ asset('assets/images/market/f2.png') }}" class="imbox-img" />

                            <a href="#" class="imgbox-b">
                                <h4>Model J11</h4>
                            </a>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                            <p>$1,215.00</p>
                            <div class="Btndiv">
                                <a href="{{ route('auction.show', 1) }}" class="Firstbtn">View Details</a>
                                <a href="#" class="Secbtn1">Bid</a>
                            </div>
                        </div>
                        <div class="imgbox auction-imgbox">
                            <img src="{{ asset('assets/images/market/f3.png') }}" class="imbox-img" />

                            <a href="#" class="imgbox-b">
                                <h4>Model J11</h4>
                            </a>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                            <p>$1,215.00</p>
                            <div class="Btndiv">
                                <a href="{{ route('auction.show', 1) }}" class="Firstbtn">View Details</a>
                                <a href="#" class="Secbtn1">Bid</a>
                            </div>
                        </div>
                        <div class="imgbox auction-imgbox">
                            <img src="{{ asset('assets/images/market/f1.png') }}" class="imbox-img" />
                            <a href="#" class="imgbox-b">
                                <h4>Model J11</h4>
                            </a>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                            <p>$1,215.00</p>
                            <div class="Btndiv">
                                <a href="{{ route('auction.show', 1) }}" class="Firstbtn">View Details</a>
                                <a href="#" class="Secbtn1">Bid</a>
                            </div>
                        </div>
                        <div class="imgbox auction-imgbox">
                            <img src="{{ asset('assets/images/market/f2.png') }}" class="imbox-img" />

                            <a href="#" class="imgbox-b">
                                <h4>Model J11</h4>
                            </a>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                            <p>$1,215.00</p>
                            <div class="Btndiv">
                                <a href="{{ route('auction.show', 1) }}" class="Firstbtn">View Details</a>
                                <a href="#" class="Secbtn1">Bid</a>
                            </div>
                        </div>
                        <div class="imgbox auction-imgbox">
                            <img src="{{ asset('assets/images/market/f3.png') }}" class="imbox-img" />

                            <a href="#" class="imgbox-b">
                                <h4>Model J11</h4>
                            </a>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                            <p>$1,215.00</p>
                            <div class="Btndiv">
                                <a href="{{ route('auction.show', 1) }}" class="Firstbtn">View Details</a>
                                <a href="#" class="Secbtn1">Bid</a>
                            </div>
                        </div>
                        <div class="imgbox auction-imgbox">
                            <img src="{{ asset('assets/images/market/f4.png') }}" class="imbox-img" />

                            <a href="#" class="imgbox-b">
                                <h4>Model J11</h4>
                            </a>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                            <p>$1,215.00</p>
                            <div class="Btndiv">
                                <a href="{{ route('auction.show', 1) }}" class="Firstbtn">View Details</a>
                                <a href="#" class="Secbtn1">Bid</a>
                            </div>
                        </div>
                        <div class="imgbox auction-imgbox">
                            <img src="{{ asset('assets/images/market/f5.png') }}" class="imbox-img" />

                            <a href="#" class="imgbox-b">
                                <h4>Model J11</h4>
                            </a>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                            <p>$1,215.00</p>
                            <div class="Btndiv">
                                <a href="{{ route('auction.show', 1) }}" class="Firstbtn">View Details</a>
                                <a href="#" class="Secbtn1">Bid</a>
                            </div>
                        </div>
                        <div class="imgbox auction-imgbox">
                            <img src="{{ asset('assets/images/market/f6.png') }}" class="imbox-img" />

                            <a href="#" class="imgbox-b">
                                <h4>Model J11</h4>
                            </a>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                            <p>$1,215.00</p>
                            <div class="Btndiv">
                                <a href="{{ route('auction.show', 1) }}" class="Firstbtn">View Details</a>
                                <a href="#" class="Secbtn1">Bid</a>
                            </div>
                        </div>
                        <div class="imgbox auction-imgbox">
                            <img src="{{ asset('assets/images/market/f1.png') }}" class="imbox-img" />
                            <a href="#" class="imgbox-b">
                                <h4>Model J11</h4>
                            </a>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                            <p>$1,215.00</p>
                            <div class="Btndiv">
                                <a href="{{ route('auction.show', 1) }}" class="Firstbtn">View Details</a>
                                <a href="#" class="Secbtn1">Bid</a>
                            </div>
                        </div>
                        <div class="imgbox auction-imgbox">
                            <img src="{{ asset('assets/images/market/f2.png') }}" class="imbox-img" />

                            <a href="#" class="imgbox-b">
                                <h4>Model J11</h4>
                            </a>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                            <p>$1,215.00</p>
                            <div class="Btndiv">
                                <a href="{{ route('auction.show', 1) }}" class="Firstbtn">View Details</a>
                                <a href="#" class="Secbtn1">Bid</a>
                            </div>
                        </div>
                        <div class="imgbox auction-imgbox">
                            <img src="{{ asset('assets/images/market/f1.png') }}" class="imbox-img" />
                            <a href="#" class="imgbox-b">
                                <h4>Model J11</h4>
                            </a>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                            <p>$1,215.00</p>
                            <div class="Btndiv">
                                <a href="{{ route('auction.show', 1) }}" class="Firstbtn">View Details</a>
                                <a href="#" class="Secbtn1">Bid</a>
                            </div>
                        </div>
                        <div class="imgbox auction-imgbox">
                            <img src="{{ asset('assets/images/market/f2.png') }}" class="imbox-img" />

                            <a href="#" class="imgbox-b">
                                <h4>Model J11</h4>
                            </a>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                            <p>$1,215.00</p>
                            <div class="Btndiv">
                                <a href="{{ route('auction.show', 1) }}" class="Firstbtn">View Details</a>
                                <a href="#" class="Secbtn1">Bid</a>
                            </div>
                        </div>
                        <div class="imgbox auction-imgbox">
                            <img src="{{ asset('assets/images/market/f3.png') }}" class="imbox-img" />

                            <a href="#" class="imgbox-b">
                                <h4>Model J11</h4>
                            </a>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                            <p>$1,215.00</p>
                            <div class="Btndiv">
                                <a href="{{ route('auction.show', 1) }}" class="Firstbtn">View Details</a>
                                <a href="#" class="Secbtn1">Bid</a>
                            </div>
                        </div>
                        <div class="imgbox auction-imgbox">
                            <img src="{{ asset('assets/images/market/f4.png') }}" class="imbox-img" />

                            <a href="#" class="imgbox-b">
                                <h4>Model J11</h4>
                            </a>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                            <p>$1,215.00</p>
                            <div class="Btndiv">
                                <a href="{{ route('auction.show', 1) }}" class="Firstbtn">View Details</a>
                                <a href="#" class="Secbtn1">Bid</a>
                            </div>
                        </div>
                        <div class="imgbox auction-imgbox">
                            <img src="{{ asset('assets/images/market/f5.png') }}" class="imbox-img" />

                            <a href="#" class="imgbox-b">
                                <h4>Model J11</h4>
                            </a>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                            <p>$1,215.00</p>
                            <div class="Btndiv">
                                <a href="{{ route('auction.show', 1) }}" class="Firstbtn">View Details</a>
                                <a href="#" class="Secbtn1">Bid</a>
                            </div>
                        </div>
                        <div class="imgbox auction-imgbox">
                            <img src="{{ asset('assets/images/market/f6.png') }}" class="imbox-img" />

                            <a href="#" class="imgbox-b">
                                <h4>Model J11</h4>
                            </a>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                            <p>$1,215.00</p>
                            <div class="Btndiv">
                                <a href="{{ route('auction.show', 1) }}" class="Firstbtn">View Details</a>
                                <a href="#" class="Secbtn1">Bid</a>
                            </div>
                        </div>
                        <div class="imgbox auction-imgbox">
                            <img src="{{ asset('assets/images/market/f7.png') }}" class="imbox-img" />

                            <a href="#" class="imgbox-b">
                                <h4>Model J11</h4>
                            </a>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                            <p>$1,215.00</p>
                            <div class="Btndiv">
                                <a href="{{ route('auction.show', 1) }}" class="Firstbtn">View Details</a>
                                <a href="#" class="Secbtn1">Bid</a>
                            </div>
                        </div>
                        <div class="imgbox auction-imgbox">
                            <img src="{{ asset('assets/images/market/f8.png') }}" class="imbox-img" />

                            <a href="#" class="imgbox-b">
                                <h4>Model J11</h4>
                            </a>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                            <p>$1,215.00</p>
                            <div class="Btndiv">
                                <a href="{{ route('auction.show', 1) }}" class="Firstbtn">View Details</a>
                                <a href="#" class="Secbtn1">Bid</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="barter-4">
        <div class="container">
            <div>
                <img src="{{ asset('assets/images/market/truck.png') }}" class="truck-img" />
                <h4 class="barter4-a">Worldwide Delivery</h4>
                <p class="barter4-b">With sites in 5 languages, we ship to over 200
                    countries & regions.</p>
            </div>
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
        // USA states and corresponding cities
        var usa_states = {
            "California": ["Los Angeles", "San Francisco", "San Diego", "Sacramento"],
            "Texas": ["Houston", "Austin", "Dallas", "San Antonio"],
            "Florida": ["Miami", "Orlando", "Tampa", "Jacksonville"],
            "New York": ["New York City", "Buffalo", "Rochester", "Albany"],
            "Illinois": ["Chicago", "Springfield", "Naperville", "Peoria"]
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
        }

        // Initialize dropdowns
        populateStates("state", "city");
    </script>
@endsection
