@extends('frontend.layout.app')
@section('content')
    <section class="aboutbg1">
        <div class="about-item-bg">
            <div class="container">
                <h3 class="bg1-a">About Us</h3>
                <h4 class="bg1-b">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum et gravida neque.
                    Donec vestibulum urna vel neque condimentum sagittis. Cras auctor sit amet lacus eget pretium.
                    Praesent id sapien nec nulla posuere vehicula ac a quam.</h4>
            </div>
        </div>
    </section>

    <section class="bg2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <!-- <h4 class="bg2-a">About us</h4> -->
                    <h4 class="bg2-b">What is bartering?</h4>
                    <p class="bg2-c">Bartering is the exchange of goods or services without using money. It's a simple
                        yet powerful concept that has been around for centuries. Our platform makes it easy, secure, and
                        convenient to barter online.</p>
                    <h4 class="bg2-b">How does it work?</h4>
                    <p class="bg2-c">Browse our marketplace to find what you need. Offer what you have to give.
                        Negotiate a trade that works for both parties. Our platform provides the tools and support to
                        make it happen.</p>
                    <a href="#" class="get-btn">Get Started</a>
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
                    <div class="tick-div">
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
                    </div>
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
            <p class="bg6-c">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum et gravida neque. Donec
                vestibulum urna vel neque condimentum sagittis. Cras auctor sit amet lacus eget pretium. Praesent id
                sapien nec nulla.</p>
            <form>
                <input class="bg6-input" type="email" placeholder="Enter your email address:" required />
                <input type="submit" class="bg6-submit" value="Subscribe" />
            </form>
        </div>
    </section>
@endsection
