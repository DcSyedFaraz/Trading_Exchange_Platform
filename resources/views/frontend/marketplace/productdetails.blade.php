@extends('frontend.marketplace.layout.app')

@section('content')
    <section class="single-main">
        <div class="container">
            <div class="row align-items-center">
                <!-- Product Images Carousel -->
                <div class="col-md-6">
                    <div class="product-image">
                        <div class="owl-carousel product-images-carousel owl-theme">
                            @foreach ($product->images as $image)
                                <div class="item">
                                    <a href="{{ asset('storage/' . $image->path) }}"
                                        data-thumb-src="{{ asset('storage/' . $image->path) }}" data-fancybox="gallery"
                                        data-fancybox="product-images" data-caption="{{ $image->caption }}">
                                        <img src="{{ asset('storage/' . $image->path) }}" class="product-img "
                                            alt="Product Image">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Product Details -->
                <div class="col-md-6">
                    <h3 class="product-title">{{ $product->name }}</h3>
                    <p class="product-desc">{{ $product->description }}</p>
                    <a href="#" class="chat-btn">Chat Now</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Products Section -->
    <section class="related-products">
        <div class="container">
            <h2 class="related-products-title">Related Products</h2>

            @if ($relatedProducts->count() > 0)
                <div class="owl-carousel related-products-carousel owl-theme">
                    @foreach ($relatedProducts as $relatedProduct)
                        <div class="item">
                            <a href="{{ route('marketplace.details', $relatedProduct->id) }}">
                                <img src="{{ asset('storage/' . ($relatedProduct->images->first()->path ?? 'assets/images/no_product.svg')) }}"
                                    class="product-img" alt="{{ $relatedProduct->name }}" />
                            </a>
                            <div class="mx-4 my-2">

                                <h4 class="related-product-name">{{ $relatedProduct->name }}</h4>
                                <p class="related-product-price">{{ $relatedProduct->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p>No related products found.</p>
            @endif
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // Initialize Product Images Carousel with 1 item
            $('.product-images-carousel').owlCarousel({
                items: 1,
                loop: true,
                nav: true,
                dots: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
            });

            // Initialize Related Products Carousel with responsive settings
            $('.related-products-carousel').owlCarousel({
                items: 4, // Default number of items
                loop: true,
                nav: true,
                dots: true,
                margin: 20,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    900: {
                        items: 3
                    },
                    1200: {
                        items: 4
                    }
                }
            });

            // Initialize Fancybox for Product Images
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
