@extends('frontend.layout.app')
@section('content')
    <section class="faqbg1">
        <div class="contact-item-bg">
            <div class="container">
                <h3 class="bg1-a">Contact Us</h3>
                <!--<h4 class="bg1-b">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum et gravida neque.
                        Donec vestibulum urna vel neque condimentum sagittis. Cras auctor sit amet lacus eget pretium.
                        Praesent id sapien nec nulla posuere vehicula ac a quam.</h4>-->
            </div>
        </div>
    </section>

    <section class="contactbg1">
        <div class="form-div">
            <h4 class="bg2-d">Get in touch</h4>
            <h4 class="bg2-e">SEND US A MESSAGE</h4>
            <form action="./mail.php" method="post">
                <input class="text-input" name="name" placeholder="Name:" type="text" required />
                <input class="text-input" name="phone" placeholder="Phone:" type="text" required />
                <input class="text-input" name="email" placeholder="Email:" type="email" required />
                <textarea class="text-area" name="msg" placeholder="Message:" rows="4"></textarea>
                <input type="submit" class="submit-btn" value="Send Now" />
            </form>
        </div>
    </section>

    <section class="bg6">
        <div class="container">
            <h4 class="bg6-a">Get in touch</h4>
            <h4 class="bg6-b">SUBSCRIBE TO OUR NEWSLETTER</h4>
            <p class="bg6-c">Sign up to receive updates, exclusive offers, and the latest news delivered straight to your
                inbox.</p>
            <form action="./mail.php" method="post">
                <input class="bg6-input" name="email" type="email" placeholder="Enter your email address:" required />
                <input type="submit" class="bg6-submit" value="Subscribe" />
            </form>
        </div>
    </section>
@endsection
