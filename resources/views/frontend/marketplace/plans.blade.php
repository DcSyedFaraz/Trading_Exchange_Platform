@extends('frontend.marketplace.layout.app')
@section('content')
    <section class="mem-plans">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-3">
                    <div class="one">
                        <h4>LIFETIME</h4>
                    </div>
                    <div class="two">
                        <h3 class="blue-heading-plan">$400.00 <span>/ Annual</span></h3>
                        {{-- <p>Lorem ipsum dolor sit amet elit. Vivamus ullamcorper et lacus nongsg</p>
                        <ul>
                            <li>. Lorem ipsum dolor sit amet elit.</li>
                            <li>. Lorem ipsum dolor sit amet elit.</li>
                            <li>. Lorem ipsum dolor sit amet elit.</li>
                            <li>. Lorem ipsum dolor sit amet elit.</li>
                            <li>. Lorem ipsum dolor sit amet elit.</li>
                            <li>. Lorem ipsum dolor sit amet elit.</li>
                            <li>. Lorem ipsum dolor sit amet elit.</li>
                        </ul> --}}
                    </div>
                    @auth
                        <div class="three">
                            <button type="button" data-bs-toggle="modal" data-plan="lifetime" data-bs-target="#subscriptionModal"
                                class="gsbtn">
                                Get Started
                            </button>
                        </div>
                    @endauth
                    @guest
                        <div class="three">
                            <a href="{{ route('login') }}" class="gsbtn">Login</a>

                        </div>

                    @endguest

                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="one">
                        <h4>ANNUAL MEMBERSHIP</h4>
                    </div>
                    <div class="two">
                        <h3 class="blue-heading-plan">$275.00 <span>/ Annual</span></h3>
                        {{-- <p>Lorem ipsum dolor sit amet elit. Vivamus ullamcorper et lacus nongsg</p>
                        <ul>
                            <li>. Lorem ipsum dolor sit amet elit.</li>
                            <li>. Lorem ipsum dolor sit amet elit.</li>
                            <li>. Lorem ipsum dolor sit amet elit.</li>
                            <li>. Lorem ipsum dolor sit amet elit.</li>
                            <li>. Lorem ipsum dolor sit amet elit.</li>
                            <li>. Lorem ipsum dolor sit amet elit.</li>
                            <li>. Lorem ipsum dolor sit amet elit.</li>
                        </ul> --}}
                    </div>
                    @auth
                        <div class="three">
                            <button type="button" data-bs-toggle="modal" data-plan="annual" data-bs-target="#subscriptionModal"
                                class="gsbtn">
                                Get Started
                            </button>
                        </div>
                    @endauth
                    @guest
                        <div class="three">
                            <a href="{{ route('login') }}" class="gsbtn">Login</a>

                        </div>

                    @endguest
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="one">
                        <h4>90-DAY MEMBERSHIPS</h4>
                    </div>
                    <div class="two">
                        <h3 class="blue-heading-plan">$75.00 <span>/ 90-day</span></h3>
                        {{-- <p>Lorem ipsum dolor sit amet elit. Vivamus ullamcorper et lacus nongsg</p>
                        <ul>
                            <li>. Lorem ipsum dolor sit amet elit.</li>
                            <li>. Lorem ipsum dolor sit amet elit.</li>
                            <li>. Lorem ipsum dolor sit amet elit.</li>
                            <li>. Lorem ipsum dolor sit amet elit.</li>
                            <li>. Lorem ipsum dolor sit amet elit.</li>
                            <li>. Lorem ipsum dolor sit amet elit.</li>
                            <li>. Lorem ipsum dolor sit amet elit.</li>
                        </ul> --}}
                    </div>
                    @auth
                        <div class="three">
                            <button type="button" data-bs-toggle="modal" data-plan="90-day" data-bs-target="#subscriptionModal"
                                class="gsbtn">
                                Get Started
                            </button>
                        </div>
                    @endauth
                    @guest
                        <div class="three">
                            <a href="{{ route('login') }}" class="gsbtn">Login</a>

                        </div>

                    @endguest
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="one">
                        <h4>MONTHLY MEMBERSHIP</h4>
                    </div>
                    <div class="two">
                        <h3 class="blue-heading-plan">$29.00 <span>/ Monthly</span></h3>
                        {{-- <p>Lorem ipsu1 --}}
                    </div>
                    @auth
                        <div class="three">
                            <button type="button" data-bs-toggle="modal" data-plan="monthly"
                                data-bs-target="#subscriptionModal" class="gsbtn">
                                Get Started
                            </button>
                        </div>
                    @endauth
                    @guest
                        <div class="three">
                            <a href="{{ route('login') }}" class="gsbtn">Login</a>

                        </div>

                    @endguest
                </div>
                @auth
                    <div class="modal fade" id="subscriptionModal" tabindex="-1" aria-labelledby="subscriptionModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Subscription</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="payment-form" action="{{ route('plans.success') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="plan_id" id="plan_id" value="">
                                        <section class="subs-main">
                                            <div class="container">
                                                <div class="row justify-content-center">
                                                    <div class="col-md-12">
                                                        <div class="row my-3">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label for="card-holder-name">Name</label>
                                                                    <input type="text" name="name" id="card-holder-name"
                                                                        class="form-control" placeholder="Name on the card">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row my-3">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label for="card-element">Card
                                                                        details</label>
                                                                    <div id="card-element"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="card-button"
                                        data-secret="{{ $intent->client_secret }}">Purchase</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </section>


    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe('{{ env('STRIPE_KEY') }}');
        const elements = stripe.elements();
        const cardElement = elements.create('card', {
            hidePostalCode: true
        });
        cardElement.mount('#card-element');

        const form = document.getElementById('payment-form');
        const cardBtn = document.getElementById('card-button');
        const cardHolderName = document.getElementById('card-holder-name');
        const planIdInput = document.getElementById('plan_id');

        // Listen for the modal to be shown
        const subscriptionModal = document.getElementById('subscriptionModal');
        subscriptionModal.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            const button = event.relatedTarget;
            // Extract info from data-plan attribute
            const plan = button.getAttribute('data-plan');
            // Update the hidden input with the selected plan
            planIdInput.value = plan;

            // Optionally, update the modal title or other UI elements based on the plan
            const modalTitle = subscriptionModal.querySelector('.modal-title');
            modalTitle.textContent = `Subscribe to ${capitalizeFirstLetter(plan)} Plan`;
        });

        function capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            cardBtn.disabled = true;

            const {
                setupIntent,
                error
            } = await stripe.confirmCardSetup(cardBtn.dataset.secret, {
                payment_method: {
                    card: cardElement,
                    billing_details: {
                        name: cardHolderName.value,
                    },
                },
            });
            if (error) {
                // Handle error here
                console.error(error);
                cardBtn.disabled = false;
            } else {
                let token = document.createElement('input');
                token.setAttribute('type', 'hidden');
                token.setAttribute('name', 'token');
                token.setAttribute('value', setupIntent.payment_method);
                form.appendChild(token);
                form.submit();
            }
        });
    </script>
@endsection
