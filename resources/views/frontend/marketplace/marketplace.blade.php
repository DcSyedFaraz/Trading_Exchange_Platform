@extends('frontend.marketplace.layout.app')
@section('content')
    <section class="barter-1">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a href="#" class="market-c">Marketplace</a>
                    <!-- <div class="market-div">
                                                                            <a href="#" class="market-a">New Arrivals</a>
                                                                            <a href="#" class="market-a">Top 100 Best Seller <span class="maspan">Hot</span></a>
                                                                            <a href="#">Led</a>
                                                                            <a href="#">Electronic</a>
                                                                            <a href="#">vehicle</a>
                                                                            <a href="#">E Bike</a>
                                                                            <a href="#">Sport</a>
                                                                            <a href="#">Bed</a>
                                                                            <a href="#">E Car</a>
                                                                            <a href="#" class="market-a">All categlories</a>
                                                                        </div> -->
                    <div class="market-div">
                        <ul class="mdn-accordion indigo-accordion-theme">
                            <li class="sub-level">
                                <input class="accordion-toggle" type="checkbox" name="group-1" id="group-1">
                                <label class="accordion-title" for="group-1"> AUTOMOBILES </label>
                                <ul>
                                    <li><a href="#">Cars</a></li>
                                    <li><a href="#">Trucks</a></li>
                                    <li><a href="#">RVs</a></li>
                                    <li><a href="#">ATVs and MCs</a></li>
                                </ul>
                            </li><!-- end accordion panel -->

                            <li class="sub-level">
                                <input class="accordion-toggle" type="checkbox" name="group-2" id="group-2">
                                <label class="accordion-title" for="group-2"> BOATS </label>
                                <ul>
                                    <li><a href="#"> Sailboats</a></li>
                                    <li><a href="#"> Speedboats</a></li>
                                    <li><a href="#"> Yachts Other Watercrafts</a></li>
                                </ul>
                            </li><!-- end accordion panel -->

                            <li class="sub-level">
                                <input class="accordion-toggle" type="checkbox" name="group-3" id="group-3">
                                <label class="accordion-title" for="group-3"> BUSINESS AND INDUSTRIAL </label>
                                <ul>
                                    <li><a href="#"> Machinery</a></li>
                                    <li><a href="#"> Manufacturing</a></li>
                                    <li><a href="#"> R&D</a></li>
                                    <li><a href="#"> Medical</a></li>
                                </ul>
                            </li><!-- end accordion panel -->

                            <li class="sub-level">
                                <input class="accordion-toggle" type="checkbox" name="group-4" id="group-4">
                                <label class="accordion-title" for="group-4"> COLLECTIBLES </label>
                                <ul>
                                    <li><a href="#"> Art</a></li>
                                    <li><a href="#"> Baseball Cards</a></li>
                                    <li><a href="#"> Coins</a></li>
                                </ul>
                            </li>
                            <!-- end accordion panel -->
                            <li class="sub-level">
                                <input class="accordion-toggle" type="checkbox" name="group-5" id="group-5">
                                <label class="accordion-title" for="group-5"> EPHEMERRA </label>
                                <ul>
                                    <li><a href="#"> Historical Documents</a></li>
                                    <li><a href="#"> Autographs</a></li>
                                    <li><a href="#"> Maps</a></li>
                                </ul>
                            </li>
                            <!-- end accordion panel -->
                            <li class="sub-level">
                                <input class="accordion-toggle" type="checkbox" name="group-6" id="group-6">
                                <label class="accordion-title" for="group-6"> FIREARMS </label>
                                <ul>
                                    <li><a href="#"> Antique / Relic</a></li>
                                    <li><a href="#"> Sporting</a></li>

                                </ul>
                            </li>
                            <!-- end accordion panel -->
                            <li class="sub-level">
                                <a class="linked" href="#" name="group-7" id="group-7">JEWELLRY and WATCHES</a>
                            </li>
                            <!-- end accordion panel -->
                            <li class="sub-level">
                                <a class="linked" href="#" name="group-8" id="group-8">GOODS & SERVICES</a>
                            </li>
                            <!-- end accordion panel -->
                            <li class="sub-level">
                                <a class="linked" href="#" name="group-9" id="group-9">MILITARIA</a>
                            </li>
                            <!-- end accordion panel -->
                            <li class="sub-level">
                                <input class="accordion-toggle" type="checkbox" name="group-10" id="group-10">
                                <label class="accordion-title" for="group-10"> NUMISMATICS </label>
                                <ul>
                                    <li><a href="#"> Rare Coins</a></li>
                                    <li><a href="#"> Bullion</a></li>
                                    <li><a href="#"> Paper Currency</a></li>
                                </ul>
                            </li>
                            <!-- end accordion panel -->
                            <li class="sub-level">
                                <input class="accordion-toggle" type="checkbox" name="group-11" id="group-11">
                                <label class="accordion-title" for="group-11"> PHILITATELICS </label>
                                <ul>
                                    <li><a href="#"> Rare Stamps</a></li>
                                </ul>
                            </li>
                            <!-- end accordion panel -->
                            <li class="sub-level">
                                <input class="accordion-toggle" type="checkbox" name="group-12" id="group-12">
                                <label class="accordion-title" for="group-12"> REAL ESTATE </label>
                                <ul>
                                    <li><a href="#"> Land</a></li>
                                    <li><a href="#"> SFH</a></li>
                                    <li><a href="#"> Condos</a></li>
                                    <li><a href="#"> Vacation Homes</a></li>
                                    <li><a href="#"> Commercial</a></li>
                                </ul>
                            </li>
                            <!-- end accordion panel -->
                            <li class="sub-level">
                                <input class="accordion-toggle" type="checkbox" name="group-13" id="group-13">
                                <label class="accordion-title" for="group-13"> UNIQUE/ ODD/ INVALUBLES </label>
                                <ul>
                                    <li><a href="#"> Anything Under the Sun. Priceless</a></li>
                                </ul>
                            </li>
                            <!-- end accordion panel -->
                            <li class="sub-level">
                                <a class="linked" href="#" name="group-14" id="group-14">SPORTING
                                    COLLECTIBLES</a>
                            </li>

                        </ul>
                        <!-- mdn-accordion -->
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="owl-carousel barter-bg1 owl-theme">
                        <div class="item">
                            <h4 class="barter1-a">Power to the pro</h4>
                            <h4 class="barter1-b">Feel special this summer with 15% off*</h4>
                            <div class="Btndiv">
                                <a href="#" class="Firstbtn">View Details</a>
                                <a href="#" class="Secbtn">Chat Now</a>
                            </div>
                        </div>
                        <div class="item">
                            <h4 class="barter1-a">Power to the pro</h4>
                            <h4 class="barter1-b">Feel special this summer with 15% off*</h4>
                            <div class="Btndiv">
                                <a href="#" class="Firstbtn">View Details</a>
                                <a href="#" class="Secbtn">Chat Now</a>
                            </div>
                        </div>
                        <div class="item">
                            <h4 class="barter1-a">Power to the pro</h4>
                            <h4 class="barter1-b">Feel special this summer with 15% off*</h4>
                            <div class="Btndiv">
                                <a href="#" class="Firstbtn">View Details</a>
                                <a href="#" class="Secbtn">Chat Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <img src="{{ asset('assets/images/market/main-2.png') }}" class="main2-img" />
                </div>
            </div>
        </div>
    </section>

    <section class="barter-2">
        <div class="container">
            <h3 class="barter2-a">All Products</h3>
            <ul class="nav nav-tabs" role="tablist">
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
                    <a class="nav-link" data-bs-toggle="tab" href="#Gift">Gift Cards<span
                            class="sale">Sale</span></a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="Flash" class="container tab-pane active"><br>
                    <div class="owl-carousel product-carousel owl-theme">
                        <div class="item">
                            <a href="#">
                                <img src="{{ asset('assets/images/market/p1.png') }}" class="p1-img" />
                                <a href="#" class="h4ofcarousel">
                                    <h4>Model J11</h4>
                                </a>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <div class="Btndiv">
                                    <a href="#" class="Firstbtn">View Details</a>
                                    <a href="#" class="Secbtn">Chat Now</a>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="{{ asset('assets/images/market/p2.png') }}" class="p1-img" />
                                <a href="#" class="h4ofcarousel">
                                    <h4>Model J11</h4>
                                </a>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <div class="Btndiv">
                                    <a href="#" class="Firstbtn">View Details</a>
                                    <a href="#" class="Secbtn">Chat Now</a>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="{{ asset('assets/images/market/p3.png') }}" class="p1-img" />
                                <a href="#" class="h4ofcarousel">
                                    <h4>Model J11</h4>
                                </a>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <div class="Btndiv">
                                    <a href="#" class="Firstbtn">View Details</a>
                                    <a href="#" class="Secbtn">Chat Now</a>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="{{ asset('assets/images/market/p1.png') }}" class="p1-img" />
                                <a href="#" class="h4ofcarousel">
                                    <h4>Model J11</h4>
                                </a>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <div class="Btndiv">
                                    <a href="#" class="Firstbtn">View Details</a>
                                    <a href="#" class="Secbtn">Chat Now</a>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="{{ asset('assets/images/market/p2.png') }}" class="p1-img" />
                                <a href="#" class="h4ofcarousel">
                                    <h4>Model J11</h4>
                                </a>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <div class="Btndiv">
                                    <a href="#" class="Firstbtn">View Details</a>
                                    <a href="#" class="Secbtn">Chat Now</a>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="{{ asset('assets/images/market/p3.png') }}" class="p1-img" />
                                <a href="#" class="h4ofcarousel">
                                    <h4>Model J11</h4>
                                </a>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <div class="Btndiv">
                                    <a href="#" class="Firstbtn">View Details</a>
                                    <a href="#" class="Secbtn">Chat Now</a>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div id="Tech" class="container tab-pane"><br>
                    <div class="owl-carousel product-carousel owl-theme">
                        <div class="item">
                            <a href="#">
                                <img src="{{ asset('assets/images/market/p1.png') }}" class="p1-img" />
                                <a href="#" class="h4ofcarousel">
                                    <h4>Model J11</h4>
                                </a>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <div class="Btndiv">
                                    <a href="#" class="Firstbtn">View Details</a>
                                    <a href="#" class="Secbtn">Chat Now</a>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="{{ asset('assets/images/market/p2.png') }}" class="p1-img" />
                                <a href="#" class="h4ofcarousel">
                                    <h4>Model J11</h4>
                                </a>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <div class="Btndiv">
                                    <a href="#" class="Firstbtn">View Details</a>
                                    <a href="#" class="Secbtn">Chat Now</a>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="{{ asset('assets/images/market/p3.png') }}" class="p1-img" />
                                <a href="#" class="h4ofcarousel">
                                    <h4>Model J11</h4>
                                </a>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <div class="Btndiv">
                                    <a href="#" class="Firstbtn">View Details</a>
                                    <a href="#" class="Secbtn">Chat Now</a>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="{{ asset('assets/images/market/p1.png') }}" class="p1-img" />
                                <a href="#" class="h4ofcarousel">
                                    <h4>Model J11</h4>
                                </a>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <div class="Btndiv">
                                    <a href="#" class="Firstbtn">View Details</a>
                                    <a href="#" class="Secbtn">Chat Now</a>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="{{ asset('assets/images/market/p2.png') }}" class="p1-img" />
                                <a href="#" class="h4ofcarousel">
                                    <h4>Model J11</h4>
                                </a>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <div class="Btndiv">
                                    <a href="#" class="Firstbtn">View Details</a>
                                    <a href="#" class="Secbtn">Chat Now</a>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="{{ asset('assets/images/market/p3.png') }}" class="p1-img" />
                                <a href="#" class="h4ofcarousel">
                                    <h4>Model J11</h4>
                                </a>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <div class="Btndiv">
                                    <a href="#" class="Firstbtn">View Details</a>
                                    <a href="#" class="Secbtn">Chat Now</a>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div id="Trending" class="container tab-pane"><br>
                    <div class="owl-carousel product-carousel owl-theme">
                        <div class="item">
                            <a href="#">
                                <img src="{{ asset('assets/images/market/p1.png') }}" class="p1-img" />
                                <a href="#" class="h4ofcarousel">
                                    <h4>Model J11</h4>
                                </a>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <div class="Btndiv">
                                    <a href="#" class="Firstbtn">View Details</a>
                                    <a href="#" class="Secbtn">Chat Now</a>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="{{ asset('assets/images/market/p2.png') }}" class="p1-img" />
                                <a href="#" class="h4ofcarousel">
                                    <h4>Model J11</h4>
                                </a>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <div class="Btndiv">
                                    <a href="#" class="Firstbtn">View Details</a>
                                    <a href="#" class="Secbtn">Chat Now</a>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="{{ asset('assets/images/market/p3.png') }}" class="p1-img" />
                                <a href="#" class="h4ofcarousel">
                                    <h4>Model J11</h4>
                                </a>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <div class="Btndiv">
                                    <a href="#" class="Firstbtn">View Details</a>
                                    <a href="#" class="Secbtn">Chat Now</a>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="{{ asset('assets/images/market/p1.png') }}" class="p1-img" />
                                <a href="#" class="h4ofcarousel">
                                    <h4>Model J11</h4>
                                </a>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <div class="Btndiv">
                                    <a href="#" class="Firstbtn">View Details</a>
                                    <a href="#" class="Secbtn">Chat Now</a>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="{{ asset('assets/images/market/p2.png') }}" class="p1-img" />
                                <a href="#" class="h4ofcarousel">
                                    <h4>Model J11</h4>
                                </a>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <div class="Btndiv">
                                    <a href="#" class="Firstbtn">View Details</a>
                                    <a href="#" class="Secbtn">Chat Now</a>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="{{ asset('assets/images/market/p3.png') }}" class="p1-img" />
                                <a href="#" class="h4ofcarousel">
                                    <h4>Model J11</h4>
                                </a>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <div class="Btndiv">
                                    <a href="#" class="Firstbtn">View Details</a>
                                    <a href="#" class="Secbtn">Chat Now</a>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div id="Gift" class="container tab-pane"><br>
                    <div class="owl-carousel product-carousel owl-theme">
                        <div class="item">
                            <a href="#">
                                <img src="{{ asset('assets/images/market/p1.png') }}" class="p1-img" />
                                <a href="#" class="h4ofcarousel">
                                    <h4>Model J11</h4>
                                </a>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <div class="Btndiv">
                                    <a href="#" class="Firstbtn">View Details</a>
                                    <a href="#" class="Secbtn">Chat Now</a>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="{{ asset('assets/images/market/p2.png') }}" class="p1-img" />
                                <a href="#" class="h4ofcarousel">
                                    <h4>Model J11</h4>
                                </a>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <div class="Btndiv">
                                    <a href="#" class="Firstbtn">View Details</a>
                                    <a href="#" class="Secbtn">Chat Now</a>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="{{ asset('assets/images/market/p3.png') }}" class="p1-img" />
                                <a href="#" class="h4ofcarousel">
                                    <h4>Model J11</h4>
                                </a>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <div class="Btndiv">
                                    <a href="#" class="Firstbtn">View Details</a>
                                    <a href="#" class="Secbtn">Chat Now</a>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="{{ asset('assets/images/market/p1.png') }}" class="p1-img" />
                                <a href="#" class="h4ofcarousel">
                                    <h4>Model J11</h4>
                                </a>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <div class="Btndiv">
                                    <a href="#" class="Firstbtn">View Details</a>
                                    <a href="#" class="Secbtn">Chat Now</a>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="{{ asset('assets/images/market/p2.png') }}" class="p1-img" />
                                <a href="#" class="h4ofcarousel">
                                    <h4>Model J11</h4>
                                </a>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <div class="Btndiv">
                                    <a href="#" class="Firstbtn">View Details</a>
                                    <a href="#" class="Secbtn">Chat Now</a>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="{{ asset('assets/images/market/p3.png') }}" class="p1-img" />
                                <a href="#" class="h4ofcarousel">
                                    <h4>Model J11</h4>
                                </a>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <div class="Btndiv">
                                    <a href="#" class="Firstbtn">View Details</a>
                                    <a href="#" class="Secbtn">Chat Now</a>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="barter-3">
        <div class="container">
            <h3 class="barter3-a">Our Feature Products</h3>
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
                    <div id="menu1" class="container tab-pane"><br>
                        <div class="main-imgbox">
                            <div class="imgbox">
                                <img src="{{ asset('assets/images/market/f1.png') }}" class="imbox-img" />
                                <a href="#" class="imgbox-b">
                                    <h4>Model J11</h4>
                                </a>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <div class="Btndiv">
                                    <a href="#" class="Firstbtn">View Details</a>
                                    <a href="#" class="Secbtn">Chat Now</a>
                                </div>
                            </div>
                            <div class="imgbox">
                                <img src="{{ asset('assets/images/market/f2.png') }}" class="imbox-img" />

                                <a href="#" class="imgbox-b">
                                    <h4>Model J11</h4>
                                </a>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <div class="Btndiv">
                                    <a href="#" class="Firstbtn">View Details</a>
                                    <a href="#" class="Secbtn">Chat Now</a>
                                </div>
                            </div>
                            <div class="imgbox">
                                <img src="{{ asset('assets/images/market/f3.png') }}" class="imbox-img" />

                                <a href="#" class="imgbox-b">
                                    <h4>Model J11</h4>
                                </a>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <div class="Btndiv">
                                    <a href="#" class="Firstbtn">View Details</a>
                                    <a href="#" class="Secbtn">Chat Now</a>
                                </div>
                            </div>
                            <div class="imgbox">
                                <img src="{{ asset('assets/images/market/f4.png') }}" class="imbox-img" />

                                <a href="#" class="imgbox-b">
                                    <h4>Model J11</h4>
                                </a>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <div class="Btndiv">
                                    <a href="#" class="Firstbtn">View Details</a>
                                    <a href="#" class="Secbtn">Chat Now</a>
                                </div>
                            </div>
                            <div class="imgbox">
                                <img src="{{ asset('assets/images/market/f5.png') }}" class="imbox-img" />

                                <a href="#" class="imgbox-b">
                                    <h4>Model J11</h4>
                                </a>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <div class="Btndiv">
                                    <a href="#" class="Firstbtn">View Details</a>
                                    <a href="#" class="Secbtn">Chat Now</a>
                                </div>
                            </div>
                            <div class="imgbox">
                                <img src="{{ asset('assets/images/market/f6.png') }}" class="imbox-img" />

                                <a href="#" class="imgbox-b">
                                    <h4>Model J11</h4>
                                </a>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <div class="Btndiv">
                                    <a href="#" class="Firstbtn">View Details</a>
                                    <a href="#" class="Secbtn">Chat Now</a>
                                </div>
                            </div>
                            <div class="imgbox">
                                <img src="{{ asset('assets/images/market/f7.png') }}" class="imbox-img" />

                                <a href="#" class="imgbox-b">
                                    <h4>Model J11</h4>
                                </a>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <div class="Btndiv">
                                    <a href="#" class="Firstbtn">View Details</a>
                                    <a href="#" class="Secbtn">Chat Now</a>
                                </div>
                            </div>
                            <div class="imgbox">
                                <img src="{{ asset('assets/images/market/f8.png') }}" class="imbox-img" />

                                <a href="#" class="imgbox-b">
                                    <h4>Model J11</h4>
                                </a>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <div class="Btndiv">
                                    <a href="#" class="Firstbtn">View Details</a>
                                    <a href="#" class="Secbtn">Chat Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu2" class="container tab-pane"><br>
                        <div class="main-imgbox">
                            <div class="imgbox">
                                <img src="{{ asset('assets/images/market/f1.png') }}" class="imbox-img" />
                                <a href="#" class="imgbox-b">
                                    <h4>Model J11</h4>
                                </a>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <div class="Btndiv">
                                    <a href="#" class="Firstbtn">View Details</a>
                                    <a href="#" class="Secbtn">Chat Now</a>
                                </div>
                            </div>
                            <div class="imgbox">
                                <img src="{{ asset('assets/images/market/f2.png') }}" class="imbox-img" />

                                <a href="#" class="imgbox-b">
                                    <h4>Model J11</h4>
                                </a>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <div class="Btndiv">
                                    <a href="#" class="Firstbtn">View Details</a>
                                    <a href="#" class="Secbtn">Chat Now</a>
                                </div>
                            </div>
                            <div class="imgbox">
                                <img src="{{ asset('assets/images/market/f3.png') }}" class="imbox-img" />

                                <a href="#" class="imgbox-b">
                                    <h4>Model J11</h4>
                                </a>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <div class="Btndiv">
                                    <a href="#" class="Firstbtn">View Details</a>
                                    <a href="#" class="Secbtn">Chat Now</a>
                                </div>
                            </div>
                            <div class="imgbox">
                                <img src="{{ asset('assets/images/market/f4.png') }}" class="imbox-img" />

                                <a href="#" class="imgbox-b">
                                    <h4>Model J11</h4>
                                </a>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <div class="Btndiv">
                                    <a href="#" class="Firstbtn">View Details</a>
                                    <a href="#" class="Secbtn">Chat Now</a>
                                </div>
                            </div>
                            <div class="imgbox">
                                <img src="{{ asset('assets/images/market/f5.png') }}" class="imbox-img" />

                                <a href="#" class="imgbox-b">
                                    <h4>Model J11</h4>
                                </a>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <div class="Btndiv">
                                    <a href="#" class="Firstbtn">View Details</a>
                                    <a href="#" class="Secbtn">Chat Now</a>
                                </div>
                            </div>
                            <div class="imgbox">
                                <img src="{{ asset('assets/images/market/f6.png') }}" class="imbox-img" />

                                <a href="#" class="imgbox-b">
                                    <h4>Model J11</h4>
                                </a>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <div class="Btndiv">
                                    <a href="#" class="Firstbtn">View Details</a>
                                    <a href="#" class="Secbtn">Chat Now</a>
                                </div>
                            </div>
                            <div class="imgbox">
                                <img src="{{ asset('assets/images/market/f7.png') }}" class="imbox-img" />

                                <a href="#" class="imgbox-b">
                                    <h4>Model J11</h4>
                                </a>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <div class="Btndiv">
                                    <a href="#" class="Firstbtn">View Details</a>
                                    <a href="#" class="Secbtn">Chat Now</a>
                                </div>
                            </div>
                            <div class="imgbox">
                                <img src="{{ asset('assets/images/market/f8.png') }}" class="imbox-img" />

                                <a href="#" class="imgbox-b">
                                    <h4>Model J11</h4>
                                </a>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <div class="Btndiv">
                                    <a href="#" class="Firstbtn">View Details</a>
                                    <a href="#" class="Secbtn">Chat Now</a>
                                </div>
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
