@extends('frontend.layout.app')
@section('content')
    <section class="faqbg1">
        <div class="faq-item-bg">
            <div class="container">
                <h3 class="bg1-a">Faqs</h3>
                <!--<h4 class="bg1-b">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum et gravida neque.
                    Donec vestibulum urna vel neque condimentum sagittis. Cras auctor sit amet lacus eget pretium.
                    Praesent id sapien nec nulla posuere vehicula ac a quam.</h4>-->
            </div>
        </div>
    </section>

    <section class="faqbg2">
        <div class="container">
            <h3 class="faq-a">FAQS</h3>
            <!--<p class="faq-b">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum et gravida neque. Donec
                vestibulum urna vel neque condimentum sagittis. Cras auctor sit amet.</p>
            <p class="faq-b">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum et gravida neque. Donec
                vestibulum urna vel neque condimentum sagittis. Cras auctor sit amet lacus eget pretium. Praesent id
                sapien nec nulla posuere vehicula ac a quam. Donec scelerisque et libero at sagittis. Mauris sed
                eleifend dui, non pulvinar dolor. Nulla lectus ex, tempus nec ullamcorper ac, tristique ac neque.</p>-->
        </div>
        <div class="container">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Q: Do I need to sign up to use the platform?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            A: Yes, you need to sign up to access the full features of our platform, including bartering,
                            auctions, and searching products by category.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Q: Are there different packages available?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            A: Yes, we offer multiple packages to suit your needs. Each package comes with unique benefits
                            and features. You can explore the details on the "Packages" page.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Q: What is the auction section, and how does it work?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            A: The auction section allows users to bid on items or services listed by others. Simply browse
                            the auctions, place your bids, and try to win the items you want.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Q: How can I find products or services?
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            A: You can explore products by categories listed on the side menu or use the search bar for
                            specific items or services.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            Q: Where can I read the refund policy?
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            A: You can find all the details about refunds on the dedicated "Refund Policy" page. Please
                            review it for terms and conditions.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            Q: How do I get started?
                        </button>
                    </h2>
                    <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            A: Sign up for an account, choose a package, and start exploring the platform. You can barter,
                            bid in auctions, and connect with other users seamlessly.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                            Q: What if I face any issues or have questions?
                        </button>
                    </h2>
                    <div id="collapseSeven" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            A: If you encounter any issues or have questions, you can email us directly at
                            info@tradersexchange.org or visit the "Contact Us" page to reach our support team.
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

@endsection
