@extends('frontend.layout.app')
@section('content')
    <section class="barter-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2><b> Privacy Policy</b></h2>
                    <br>
                    <h6><b>Effective Date:</b> January 20, 2025</h6>
                    <p>At tradersexchange.org, we respect your privacy and are committed to protecting your personal
                        information. This policy explains how we collect, use, and safeguard your data.</p>
                    <h4> Information We Collect</h4>
                    <p>We collect personal details like your name, email, and payment information, as well as data
                        related to your account, transactions, and website usage.</p>
                    <br>
                    <h4> How We Use Your Information</h4>
                    <p>Your information is used to:</p>
                    <ul class="ak-ol" data-indent-level="1">
                        <li>
                            <p>• Manage your account and transactions.</p>
                        </li>
                        <li>
                            <p>• Process payments.</p>
                        </li>
                        <li>
                            <p>• Provide customer support and platform updates.</p>
                        </li>
                    </ul>
                    <br>
                    <h4>Sharing Information</h4>
                    <p>We do not sell or rent your information. We may share it with service providers for payment
                        processing and legal compliance if required by law.</p>
                    <br>
                    <h4> Cookies</h4>
                    <p>We use cookies to improve website functionality and user experience. You can adjust cookie
                        settings in your browser.</p>
                    <br>
                    <h4> Data Security</h4>
                    <p>We use standard security measures to protect your data but cannot guarantee absolute security.
                    </p>
                    <br>
                    <h4> Contact Us</h4>
                    <p>For questions or concerns, contact us at:</p>
                    <ul class="ak-ol" data-indent-level="1">
                        <li>
                            <p>• Email: <a href="mailto:info@tradersexchange.org">info@tradersexchange.org</a></p>
                        </li>
                    </ul>
                    <br>
                    <p>By using our platform, you agree to this Privacy Policy.</p>
                </div>
    </section>


    <section class="barter-4">
        <div class="container">
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
