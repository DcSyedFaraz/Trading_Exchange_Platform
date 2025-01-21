@extends('frontend.layout.app')
@section('content')
    <section class="barter-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2><b> Refund Policy</b></h2>
                    <br>
                    <p>Welcome to tradersexchange.org! We aim to provide a straightforward and efficient experience for
                        all users. Please read this Refund Policy to understand the terms governing fees, memberships,
                        and transactions.</p>
                    <h4> Membership Fees</h4>
                    <p>Membership fees are non-refundable. Once a membership payment has been processed, no refunds will
                        be issued under any circumstances.</p>
                    <br>
                    <h4> Auction Fees</h4>
                    <ul class="ak-ol" data-indent-level="1">
                        <li>
                            <p>• Completion Fee: A 5% fee is charged to each party for every auction successfully
                                completed. This fee is non-refundable.</p>
                        </li>
                        <li>
                            <p>• Listing Fee: A $50 fee is charged for listing auctions on the platform. This fee is
                                also non-refundable.</p>
                        </li>
                    </ul>
                    <br>
                    <h4>Transaction Finality</h4>
                    <p>All transactions conducted through the platform, including auctions and barters, are final.
                        Sellers and buyers are encouraged to carefully review all listings, terms, and conditions before
                        proceeding.</p>
                    <br>
                    <h4>Dispute Resolution</h4>
                    <p>In case of disputes between users, our platform offers a dispute resolution process. While we may
                        mediate disputes, refunds for transactions or fees cannot be guaranteed.</p>
                    <br>
                    <h4>Exceptions</h4>
                    <p>Refunds may be issued only in the following scenarios:</p>
                    <ul class="ak-ol" data-indent-level="1">
                        <li>
                            <p>• Duplicate payments made in error.</p>
                        </li>
                        <li>
                            <p>• Fraudulent transactions reported and verified.</p>
                        </li>
                    </ul>
                    <br>
                    <h4> How to Request a Refund</h4>
                    <p>To request a refund in qualifying scenarios:</p>
                    <ul class="ak-ol" data-indent-level="1">
                        <li>
                            <p>1. Contact our support team at info@tradersexchange.org</p>
                        </li>
                        <li>
                            <p>2. Provide your membership or transaction details, and a detailed explanation of your
                                request.</p>
                        </li>
                        <li>
                            <p>3. Allow up to 14 business days for our team to review and respond.</p>
                        </li>
                    </ul>
                    <br>
                    <h4>Contact Us</h4>
                    <p>If you have questions about this Refund Policy, please contact us:</p>
                    <ul class="ak-ol" data-indent-level="1">
                        <li>
                            <p>• Email: <a href="mailto:info@tradersexchange.org">info@tradersexchange.org</a></p>
                        </li>
                    </ul>
                    <p>By using our platform, you agree to the terms of this Refund Policy.</p>
                    <br>
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
