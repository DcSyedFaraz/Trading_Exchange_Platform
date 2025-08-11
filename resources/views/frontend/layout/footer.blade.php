<section class="bg6">
    <div class="container">
        <h4 class="bg6-a">Get in touch</h4>
        <h4 class="bg6-b">SUBSCRIBE TO OUR NEWSLETTER</h4>
        <p class="bg6-c">Sign up to receive updates, exclusive offers, and the latest news delivered straight to your
            inbox.</p>
        <form action="{{ route('newsletter.subscribe') }}" method="post">
            @csrf
            <input class="bg6-input" name="email" type="email" placeholder="Enter your email address:" required />
            <input type="submit" class="bg6-submit" value="Subscribe" />
        </form>
    </div>
</section>
<footer>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4">
                <a href="/"><img src="{{ asset('assets/images/footer-logo.png') }}" class="footer-logo" /></a>
                <p class="footer-a">Connect, trade, and auction your products with ease. A marketplace where goods and
                    services find new homes through direct trade and competitive bidding.
                </p>
                <div class="social-div">
                    <a href="https://www.facebook.com/people/Traders-Exchange/61572893464647/" target="_blank"><i
                            class="fa-brands fa-facebook-f"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                </div>
            </div>
            <div class="col-md-4">
                <h4 class="footer-b">Quick Links</h4>
                <div class="footer-div">
                    <ul class="footer-ul">
                        <a href="/">
                            <li>Home</li>
                        </a>
                        <a href="{{ route('about_us') }}">
                            <li>About Us</li>
                        </a>
                        <a href="{{ route('privacy_policy') }}">
                            <li>Privacy Policy</li>
                        </a>
                        <a href="{{ route('refund_policy') }}">
                            <li>Refund Policy</li>
                        </a>
                    </ul>
                    <ul class="footer-ul">
                        <a href="{{ route('faqs') }}">
                            <li>FAQs</li>
                        </a>
                        <a href="{{ route('contact_us') }}">
                            <li>Contact Us</li>
                        </a>
                        <a href="{{ route('auction.terms') }}">
                            <li>Terms & Conditions (Auction)</li>
                        </a>
                        <a href="{{ route('marketplace.terms') }}">
                            <li>Terms & Conditions (Barter)</li>
                        </a>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <h4 class="footer-b">Contact us</h4>
                <ul class="footer-ul1">
                    <li>350 Vestal Street Beaumont, TX. 77703</li>
                    <a href="mailto:info@tradersexchange.org">
                        <li>Email: info@tradersexchange.org </li>
                    </a>
                </ul>
            </div>
        </div>
    </div>
</footer>
<div class="footer-copyright">
    <p class="footer-d">Michael Durham copyright © {{ now()->year }}. All Rights Reserved.</p>
</div>
