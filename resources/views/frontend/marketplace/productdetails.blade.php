@extends('frontend.marketplace.layout.app')
@section('content')
    <section class="product-detail">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="product-image">
                        <div class="owl-carousel product-carousel owl-theme">
                            @foreach ($product->images as $image)
                                <div class="item">
                                    <a href="{{ asset('storage/' . $image->path) }}"  data-thumb-src="{{ asset('storage/' . $image->path) }}"
                                        data-fancybox="gallery" data-fancybox="product-images"
                                        data-caption="{{ $image->caption }}">
                                        <img src="{{ asset('storage/' . $image->path) }}" class="product-img img-fluid"
                                            alt="Product Image">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product-info">
                        <h2 class="product-name">{{ $product->name }}</h2>
                        <p class="product-desc">{{ $product->description }}</p>
                        <div class="product-price">
                            <p class="price">Price: {{ $product->price }}</p>
                        </div>
                        @if ($product->auction)
                            <div class="product-auction">
                                <h4>Bid Now!</h4>
                                <form>
                                    <div class="form-group">
                                        <label for="bid-amount">Enter your bid amount:</label>
                                        <input type="number" id="bid-amount" class="form-control" required>
                                    </div>
                                    <button class="btn btn-primary my-2">Place Bid</button>
                                </form>
                            </div>
                        @endif
                        <div class="product-actions my-2">
                            <button class="btn btn-secondary">Add to Cart</button>
                            @if (!$product->auction)
                                <button class="btn btn-primary">Buy Now</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="related-products">
        <div class="container">
            <h2 class="related-products-title">Related Products</h2>
            <div class="owl-carousel product-carousel owl-theme">
                <div class="item">
                    <img src="{{ asset('assets/images/market/p2.png') }}" class="related-product-img" />
                    <h4 class="related-product-name">Product 2</h4>
                    <p class="related-product-price">$59.00</p>
                </div>
                <div class="item">
                    <img src="{{ asset('assets/images/market/p3.png') }}" class="related-product-img" />
                    <h4 class="related-product-name">Product 3</h4>
                    <p class="related-product-price">$69.00</p>
                </div>
                <div class="item">
                    <img src="{{ asset('assets/images/market/p1.png') }}" class="related-product-img" />
                    <h4 class="related-product-name">Product 4</h4>
                    <p class="related-product-price">$79.00</p>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('[data-fancybox="product-images"]').fancybox({
                loop: true,
                thumbs: {
                    autoStart: true
                },
                buttons: [
                    "zoom",
                    "slideShow",
                    "fullScreen",
                    "thumbs",
                    "close"
                ]
            });
        });
    </script>
@endsection
