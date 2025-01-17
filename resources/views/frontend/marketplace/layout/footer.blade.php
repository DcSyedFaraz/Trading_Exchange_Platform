<footer class="barter-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <a href="/"><img src="{{ asset('assets/images/BP-Logo.png') }}" class="barterf-logo" /></a>
                <ul class="bar-footer-ul">
                    <a href="">
                        <li><i class="fa-solid fa-location-dot"></i> 350 Vestal Street Beaumont, TX. 77703</li>
                    </a>
                    <a href="mailto:wolappen@yahoo.com">
                        <li><i class="fa-regular fa-envelope"></i> wolappen@yahoo.com </li>
                    </a>
                </ul>
                <h4 class="barf-a">Follow us</h4>
                <div class="social-div" bis_skin_checked="1">
                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                </div>
            </div>
            <div class="col-md-3">
                <h4 class="barf-b">Quick menu</h4>
                <ul class="bar-footer-ul-a">
                    <a href="/">
                        <li>Home</li>
                    </a>
                    <a href="{{ route('about_us') }}">
                        <li>About Us</li>
                    </a>
                    <a
                        href="{{ route(str_contains(Route::currentRouteName(), 'auction') ? 'auction.terms' : 'marketplace.terms') }}">
                        <li>Terms & Conditions</li>
                    </a>

                </ul>
            </div>
            <div class="col-md-3">
                <h4 class="barf-b">Customer Service</h4>
                <ul class="bar-footer-ul-a">
                    <a href="{{ route('faqs') }}">
                        <li>FAQs</li>
                    </a>
                    <a href="{{ route('contact_us') }}">
                        <li>Contact Us</li>
                    </a>
                </ul>
            </div>
            <div class="col-md-3">
                <h4 class="barf-b">Subscription</h4>
                <p class="barf-c">Register now to get updates on promotions
                    and coupons.</p>
                <form>
                    <input type="email" class="barf-input" placeholder="Enter your emaill adress" required />
                    <input type="submit" class="barf-btn" value="Subscribe" />
                </form>
            </div>
        </div>
    </div>
    <div class="bartf-copy-div">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="barf-copy">Copyright © 2024 Michael Durham, All Rights Reserved.</p>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('assets/images/market/multi-img.png') }}" class="multi-img" />
                </div>
            </div>
        </div>
    </div>
</footer>
