@extends('frontend.marketplace.layout.app')
@section('content')
    <section class="auction-products-main">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="owl-carousel product-detail owl-theme">
                        @foreach ($product->images as $image)
                            <div class="item">

                                <a href="{{ asset('storage/' . $image->image_path) }}" data-fancybox="gallery" data-caption="">
                                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $product->name }}"
                                        class="product-img" />
                                </a>
                            </div>
                        @endforeach
                        {{-- <div class="item">
                            <a href="{{ asset('assets/images/market/f1.png') }}" data-fancybox="gallery" data-caption="">
                                <img src="{{ asset('assets/images/market/f1.png') }}" class="product-img" />
                            </a>
                        </div>
                        <div class="item">
                            <a href="{{ asset('assets/images/market/f1.png') }}" data-fancybox="gallery" data-caption="">
                                <img src="{{ asset('assets/images/market/f1.png') }}" class="product-img" />
                            </a>
                        </div> --}}
                    </div>
                </div>
                <div class="col-md-6">
                    <h3 class="auction-title-h3">{{ $product->name }}</h3>
                    <p class="auction-desc-p">{!! $product->description !!}</p>

                    <div class="bid-div">
                        <div class="hb">
                            <h5>Highest Bid</h5>
                            <p>${{ number_format($product->highestBid ? $product->highestBid->amount : $product->minimum_bid, 2) }}
                            </p>
                        </div>
                        <div class="mb">
                            <h5>Minimum Bid</h5>
                            <p>${{ number_format($product->minimum_bid, 2) }}</p>
                        </div>
                    </div>

                    <div class="timings">
                        <div class="date">
                            <h3>{{ $product->auction_end_time->format('d M Y') }}</h3>
                        </div>
                        <div class="time-pm">
                            <h3>{{ $product->auction_end_time->format('h:i A') }}</h3>
                        </div>
                    </div>
                    <p class="auction-closed">Auction Closed</p>

                    <p class="auction-closed">Login To Send Bid</p>
                    @if ($product->is_closed)
                    @elseif (!Auth::user())
                    @else
                        <div class="s-prod-form">
                            <p>Place your bid</p>
                            <form action="{{ route('auction.placeBid', $product->id) }}" method="POST">
                                @csrf
                                <input type="text" name="bid_amount" placeholder="Enter your bid" required
                                    class="prod-pge-field">
                                <input type="submit" value="Place Bid" class="bidbtn">
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        $('.product-detail').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: false,
            autoplay: true,
            autoplayTimeout: 3000,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });
        $('[data-fancybox="product-images"]').fancybox({
            loop: true,
            thumbs: {
                autoStart: true,
            },
            buttons: [
                "zoom",
                "slideShow",
                "fullScreen",
                "thumbs",
                "close"
            ]
        });
    </script>
@endsection
