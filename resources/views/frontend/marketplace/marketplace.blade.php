@extends('frontend.marketplace.layout.app')
@section('content')
    <section class="barter-1">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('frontend.layout.categories')

                </div>
                <div class="col-md-6">
                    <div class="owl-carousel barter-bg1 owl-theme">
                        @foreach ($ads as $ad)
                            <div class="item" style="background-image: url('{{ asset('storage/' . $ad->image) }}');">
                                <h4 class="barter1-b">{{ $ad->title }}</h4>
                                <div class="Btndiv">
                                    <a href="{{ route('ad.show', $ad->id) }}" class="Firstbtn">View Details</a>
                                    {{-- <a href="#" class="Secbtn">Chat Now</a> --}}
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>

                <div class="col-md-3">
                    @if ($firstAd && $firstAd->image)
                        <img src="{{ asset('storage/' . $firstAd->image) }}" class="main2-img" />
                    @else
                        <p>not found</p>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section class="barter-2">
        <div class="container">
            <h3 class="barter2-a">All Products</h3>
            {{-- <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#Flash"><i class="fa-light fa-gem"></i> Flash
                        Deals</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#Tech">Tech Discovery<span
                            class="new">New</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#Trending">Trending Styles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#Gift">Gift Cards<span class="sale">Sale</span></a>
                </li>
            </ul> --}}
            <div class="tab-content">
                <div id="Flash" class="container tab-pane active"><br>
                    <div class="owl-carousel product-carousel owl-theme">
                        @forelse ($products as $product)
                            <div class="item ">
                                <!-- Product Image -->
                                @if ($product->images->isNotEmpty() && $product->images->first()->path)
                                    <img src="{{ asset('storage/' . $product->images->first()->path) }}" class="p1-img"
                                        alt="{{ $product->name }}" />
                                @else
                                    <img src="{{ asset('assets/images/no_product.svg') }}" class="p1-img"
                                        alt="No Product Image" />
                                @endif

                                <!-- Product Name -->
                                <h4 class="h4ofcarousel text-center">
                                    <a href="{{ route('marketplace.details', $product->id) }}">{{ $product->name }}</a>
                                </h4>

                                <!-- Product Description -->
                                <p class="text-center">
                                    {{ \Illuminate\Support\Str::limit($product->description, 100, '...') }}</p>

                                <!-- Action Buttons -->
                                <div class="Btndiv text-center">
                                    <a href="{{ route('marketplace.details', $product->id) }}" class="Firstbtn">View
                                        Details</a>
                                    <a href="{{ route('products.chat', $product->id) }}" class="Secbtn">Chat Now</a>
                                </div>
                            </div>
                        @empty
                            <div class="item">
                                <p class="text-center">No products available</p>
                            </div>
                        @endforelse
                    </div>
                </div>
                <div id="Tech" class="container tab-pane"><br>
                    <div class="owl-carousel product-carousel owl-theme">
                        @forelse ($products as $product)
                            <div class="item">
                                <!-- Product Image -->
                                @if ($product->images->isNotEmpty() && $product->images->first()->path)
                                    <img src="{{ asset('storage/' . $product->images->first()->path) }}" class="p1-img"
                                        alt="{{ $product->name }}" />
                                @else
                                    <img src="{{ asset('assets/images/no_product.svg') }}" class="p1-img"
                                        alt="No Product Image" />
                                @endif

                                <!-- Product Name -->
                                <h4 class="h4ofcarousel">
                                    <a href="{{ route('marketplace.details', $product->id) }}">{{ $product->name }}</a>
                                </h4>

                                <!-- Product Description -->
                                <p>{{ \Illuminate\Support\Str::limit($product->description, 100, '...') }}</p>

                                <!-- Action Buttons -->
                                <div class="Btndiv">
                                    <a href="{{ route('marketplace.details', $product->id) }}" class="Firstbtn">View
                                        Details</a>
                                    <a href="{{ route('products.chat', $product->id) }}" class="Secbtn">Chat Now</a>
                                </div>
                            </div>
                        @empty
                            <div class="item">
                                <p class="text-center">No products available</p>
                            </div>
                        @endforelse
                    </div>
                </div>
                <div id="Trending" class="container tab-pane"><br>
                    <div class="owl-carousel product-carousel owl-theme">
                        @forelse ($products as $product)
                            <div class="item">
                                <!-- Product Image -->
                                @if ($product->images->isNotEmpty() && $product->images->first()->path)
                                    <img src="{{ asset('storage/' . $product->images->first()->path) }}" class="p1-img"
                                        alt="{{ $product->name }}" />
                                @else
                                    <img src="{{ asset('assets/images/no_product.svg') }}" class="p1-img"
                                        alt="No Product Image" />
                                @endif

                                <!-- Product Name -->
                                <h4 class="h4ofcarousel">
                                    <a href="{{ route('marketplace.details', $product->id) }}">{{ $product->name }}</a>
                                </h4>

                                <!-- Product Description -->
                                <p>{{ \Illuminate\Support\Str::limit($product->description, 100, '...') }}</p>

                                <!-- Action Buttons -->
                                <div class="Btndiv">
                                    <a href="{{ route('marketplace.details', $product->id) }}" class="Firstbtn">View
                                        Details</a>
                                    <a href="{{ route('products.chat', $product->id) }}" class="Secbtn">Chat Now</a>
                                </div>
                            </div>
                        @empty
                            <div class="item">
                                <p class="text-center">No products available</p>
                            </div>
                        @endforelse
                    </div>
                </div>
                <div id="Gift" class="container tab-pane"><br>
                    <div class="owl-carousel product-carousel owl-theme">
                        @forelse ($products as $product)
                            <div class="item">
                                <!-- Product Image -->
                                @if ($product->images->isNotEmpty() && $product->images->first()->path)
                                    <img src="{{ asset('storage/' . $product->images->first()->path) }}" class="p1-img"
                                        alt="{{ $product->name }}" />
                                @else
                                    <img src="{{ asset('assets/images/no_product.svg') }}" class="p1-img"
                                        alt="No Product Image" />
                                @endif

                                <!-- Product Name -->
                                <h4 class="h4ofcarousel">
                                    <a href="{{ route('marketplace.details', $product->id) }}">{{ $product->name }}</a>
                                </h4>

                                <!-- Product Description -->
                                <p>{{ \Illuminate\Support\Str::limit($product->description, 100, '...') }}</p>

                                <!-- Action Buttons -->
                                <div class="Btndiv">
                                    <a href="{{ route('marketplace.details', $product->id) }}" class="Firstbtn">View
                                        Details</a>
                                    <a href="{{ route('products.chat', $product->id) }}" class="Secbtn">Chat Now</a>
                                </div>
                            </div>
                        @empty
                            <div class="item">
                                <p class="text-center">No products available</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="barter-3">
        <div class="container">
            <h3 class="barter3-a">Our Featured Products</h3>
            <div class="container mt-3">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#home">Featured</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#menu1">Top rated</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#menu2">Most Sale</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="home" class="container tab-pane active"><br>
                        <div class="main-imgbox">
                            @forelse ($products->where('feature',1) as $product)
                                <div class="imgbox">
                                    @if ($product->images->isNotEmpty() && $product->images->first()->path)
                                        <img src="{{ asset('storage/' . $product->images->first()->path) }}"
                                            class="imbox-img product-img" />
                                    @else
                                        <img src="{{ asset('assets/images/no_product.svg') }}"
                                            class="imbox-img product-img" />
                                    @endif
                                    <a href="#" class="imgbox-b">
                                        <h4>{{ $product->name }}</h4>
                                    </a>
                                    <p>{{ $product->description }}</p>
                                    <div class="Btndiv">
                                        <a href="{{ route('marketplace.details', $product->id) }}" class="Firstbtn">View
                                            Details</a>
                                        <a href="{{ route('products.chat', $product->id) }}" class="Secbtn">Chat Now</a>
                                    </div>
                                </div>

                            @empty
                                <p class="text-center">
                                    no products available
                                </p>
                            @endforelse
                        </div>
                    </div>
                    <div id="menu1" class="container tab-pane"><br>
                        <div class="main-imgbox">
                            @forelse ($products as $product)
                                <div class="imgbox">
                                    @if ($product->images->isNotEmpty() && $product->images->first()->path)
                                        <img src="{{ asset('storage/' . $product->images->first()->path) }}"
                                            class="imbox-img product-img" />
                                    @else
                                        <img src="{{ asset('assets/images/no_product.svg') }}"
                                            class="imbox-img product-img" />
                                    @endif
                                    <a href="#" class="imgbox-b">
                                        <h4>{{ $product->name }}</h4>
                                    </a>
                                    <p>{{ $product->description }}</p>
                                    <div class="Btndiv">
                                        <a href="{{ route('marketplace.details', $product->id) }}" class="Firstbtn">View
                                            Details</a>
                                        <a href="{{ route('products.chat', $product->id) }}" class="Secbtn">Chat Now</a>
                                    </div>
                                </div>

                            @empty
                                <p class="text-center">
                                    no products available
                                </p>
                            @endforelse
                        </div>
                    </div>
                    <div id="menu2" class="container tab-pane"><br>
                        <div class="main-imgbox">
                            @forelse ($products as $product)
                                <div class="imgbox">
                                    @if ($product->images->isNotEmpty() && $product->images->first()->path)
                                        <img src="{{ asset('storage/' . $product->images->first()->path) }}"
                                            class="imbox-img product-img" />
                                    @else
                                        <img src="{{ asset('assets/images/no_product.svg') }}"
                                            class="imbox-img product-img" />
                                    @endif
                                    <a href="#" class="imgbox-b">
                                        <h4>{{ $product->name }}</h4>
                                    </a>
                                    <p>{{ $product->description }}</p>
                                    <div class="Btndiv">
                                        <a href="{{ route('marketplace.details', $product->id) }}" class="Firstbtn">View
                                            Details</a>
                                        <a href="{{ route('products.chat', $product->id) }}" class="Secbtn">Chat Now</a>
                                    </div>
                                </div>

                            @empty
                                <p class="text-center">
                                    no products available
                                </p>
                            @endforelse
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
