@extends('frontend.layout.app')
@section('content')
    <section class="aboutbg1">
        <div class="about-item-bg">
            <div class="container">
                <h3 class="bg1-a">About Us</h3>
                <!--<h4 class="bg1-b">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum et gravida neque.
                            Donec vestibulum urna vel neque condimentum sagittis. Cras auctor sit amet lacus eget pretium.
                            Praesent id sapien nec nulla posuere vehicula ac a quam.</h4>-->
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
                    <img src="{{ asset('assets/images/about/bg2.png') }}" class="about2-img" />
                </div>
            </div>
        </div>
    </section>

    <section class="bg3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="{{ asset('assets/images/about/bg3.png') }}" class="about3-img" />
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
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('assets/images/bg3.png') }}" class="bg4-img" />
                </div>
            </div>
        </div>
    </section>

    <section class="bg6">
        <div class="container">
            <h4 class="bg6-a">Get in touch</h4>
            <h4 class="bg6-b">SUBSCRIBE TO OUR NEWSLETTER</h4>
            <p class="bg6-c">Sign up to receive updates, exclusive offers, and the latest news delivered straight to your
                inbox.</p>
            <form action="{{ asset('mail.php') }}" method="post">
                <input class="bg6-input" name="email" type="email" placeholder="Enter your email address:" required />
                <input type="submit" class="bg6-submit" value="Subscribe" />
            </form>
        </div>
    </section>
@endsection
