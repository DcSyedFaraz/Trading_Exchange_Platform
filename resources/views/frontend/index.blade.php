@extends('frontend.layout.app')
@section('content')
    <section class="bg1">
        <div class="owl-carousel owl-theme">
            <div class="item">
                <div class="item-bg">
                    <div class="container">
                        <h3 class="bg1-a">NEW CUSTOMERS. BETTER CASH FLOW.</h3>
                        <h4 class="bg1-b">"Empowering individuals and businesses to connect, exchange, and thrive
                            through a
                            fair and
                            transparent barter system, fostering a community built on trust, reciprocity, and mutual
                            benefit."*</h4>
                        <div class="btn-div">
                            <a href="{{ route('register') }}" class="get-btn">Get Started</a>
                            <a href="{{ route('about_us') }}" class="read-btn">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="item-bg1">
                    <div class="container">
                        <h3 class="bg1-a">Trade for the Future</h3>
                        <h4 class="bg1-b">"Step into a marketplace built for growth. With easy trades and auction
                            opportunities, Traders' Exchange helps your business thrive and discover new paths to success."
                        </h4>
                        <div class="btn-div">
                            <a href="{{ route('register') }}" class="get-btn">Get Started</a>
                            <a href="{{ route('about_us') }}" class="read-btn">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="item-bg2">
                    <div class="container">
                        <h3 class="bg1-a">Expand Your Reach</h3>
                        <h4 class="bg1-b">"Join a growing network where your products and services are just a trade away.
                            Connect with new customers, build relationships, and grow your business through simple
                            exchanges."</h4>
                        <div class="btn-div">
                            <a href="{{ route('register') }}" class="get-btn">Get Started</a>
                            <a href="{{ route('about_us') }}" class="read-btn">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="bg2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <h3 class="buz-text">Welcome to Traders' Exchange</h3>
                    <p class="bg2-c">At Traders' Exchange, we are more than just a marketplace—we are a club of passionate
                        traders committed to making exchanging goods and services effortless. Here, you can easily list and
                        trade your products with other users, directly engaging in seamless transactions. Our platform
                        connects you with a wide range of buyers and sellers, giving you access to a network of potential
                        new partners for both trade and auctions. Whether you’re trading everyday items or something more
                        specialized, our community helps you find what you need while offering opportunities to offload
                        excess stock or services. <br> <br>
                        Plus, with our auction section, you can put your high-demand items up for bidding, ensuring you get
                        the best value for what you’re offering. Get started today and become part of a thriving club that
                        unlocks the full potential of trading and auctioning within the Traders' Exchange ecosystem!
                    </p>
                </div>
                <div class="col-md-5">
                    <div class="form-div">
                        <h4 class="bg2-d">Get in touch</h4>
                        <h4 class="bg2-e">SEND US A MESSAGE</h4>
                        <form action="{{ asset('mail.php') }}" method="post">
                            <input class="text-input" placeholder="Name:" type="text" name="name" required />
                            <input class="text-input" placeholder="Phone:" type="text" name="phone" required />
                            <input class="text-input" placeholder="Email:" type="email" name="email" required />
                            <textarea class="text-area" placeholder="Message:" name="msg" rows="4"></textarea>
                            <input type="submit" class="submit-btn" value="Send Now" />
                        </form>
                    </div>
                </div>
            </div>
    </section>

    <section class="center-div">
        <div class="container">
            <!-- <h4 class="bg2-a">About us</h4> -->
            <h4 class="bg2-b">What is bartering?</h4>
            <p class="buz-p">Bartering is the exchange of goods or services without using money. It's a simple
                yet powerful concept that has been around for centuries. Our platform makes it easy, secure, and
                convenient to barter online.</p>
            <h4 class="bg2-b">How does it work?</h4>
            <p class="buz-p">Browse our marketplace to find what you need. Offer what you have to give.
                Negotiate a trade that works for both parties. Our platform provides the tools and support to
                make it happen.</p>
            <!-- <a href="./contact-us.html" class="get-btn">Get Started</a> -->
        </div>
    </section>

    <section class="new-section">
        <h3 class="barter3-a">Our Featured Products</h3>
        <div class="container">
            <div class="main-imgbox">
                @forelse ($products as $product)
                    <div class="imgbox">
                        @if ($product->images->isNotEmpty() && $product->images->first()->path)
                            <img src="{{ asset('storage/' . $product->images->first()->path) }}"
                                class="imbox-img product-img" />
                        @else
                            <img src="{{ asset('assets/images/no_product.svg') }}" class="imbox-img product-img" />
                        @endif
                        <a href="#" class="imgbox-b">
                            <h4>{{ $product->name }}</h4>
                        </a>
                        <p>{{ $product->description }}</p>
                        <div class="Btndiv">
                            <a href="{{ route('marketplace') }}" class="Firstbtn">View
                                Details</a>
                            {{-- <a href="{{ route('products.chat', $product->id) }}" class="Secbtn">Chat Now</a> --}}
                        </div>
                    </div>

                @empty
                    <p class="text-center">
                        no products available
                    </p>
                @endforelse
            </div>
        </div>
    </section>

    <section class="bg3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="{{ asset('assets/images/bg2.png') }}" class="bg3-img" />
                </div>
                <div class="col-md-6">
                    <h4 class="bg2-a">Welcome to the Barter Nation, the Alternative Business Solutions Center</h4>
                    <h4 class="bg3-a">Our Story</h4>
                    <p class="bg3-b">wwww.tradersexchange.org was founded on the belief that bartering does not take
                        cash to resolve business solutions and, is a powerful way to connect people and businesses,
                        fostering a community built on trust, reciprocity, and mutual benefit. Our platform aims to make
                        bartering easy, secure, and convenient.</p>
                    {{-- <div class="tick-div">
                        <img src="{{ asset('assets/images/tick.png') }}" class="tick-img" />
                        <div>
                            <h3 class="bg3-c">Business management</h3>
                            <h3 class="bg3-d">Exercitationem ullam corporis suscipit laboriosam, nisi ut aliuico
                                sequatur auis autem vel eum iure.</h3>
                        </div>
                    </div>
                    <div class="tick-div">
                        <img src="{{ asset('assets/images/tick.png') }}" class="tick-img" />
                        <div>
                            <h3 class="bg3-c">Start Ups & IT Wonders</h3>
                            <h3 class="bg3-d">Velit esse quam nihil molestiae consequatur, vel illum aui doloru fugiat
                                quo voluptas nulla.</h3>
                        </div>
                    </div>
                    <div class="tick-div">
                        <img src="{{ asset('assets/images/tick.png') }}" class="tick-img" />
                        <div>
                            <h3 class="bg3-c">Organizations & Planning</h3>
                            <h3 class="bg3-d">Earue ipsa quae ab illo inventore veritatis et quasi architector ea ae
                                vitae dicta aliae sunt.</h3>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>

    <section class="bg4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h4 class="bg4-b">Our Mission</h4>
                    <p class="bg4-c">Our mission is to empower individuals and businesses to exchange goods and services
                        without the need for cash, promoting a more sustainable and collaborative economy.</p>
                    <!-- <h4 class="bg4-a">Our vision</h4> -->
                    <h4 class="bg4-b">Our Values</h4>
                    <ul class="bg4-ul">
                        <li><b>Community:</b> We believe in building strong relationships and connections.</li>
                        <li><b>Trust: </b> We prioritize transparency, security, and reliability. </li>
                        <li><b>Innovation:</b> We strive to make bartering easy and accessible.</li>
                        <li><b>Sustainability:</b> We aim to reduce waste and promote a sharing economy.</li>
                    </ul>
                    <a href="{{ route('register') }}" class="get-btn">Get Started</a>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('assets/images/bg3.png') }}" class="bg4-img" />
                </div>
            </div>
        </div>
    </section>

@endsection
