<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/fav.png') }}">
    <title>Sign Up</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>

    <div class="form-container">
        <div class="container">
            <div class="div-logo">
                <a href="{{ route('home') }}"><img src="{{ asset('assets/images/footer-logo.png') }}" /></a>
            </div>
            <div class="content">
                <h2>SIGN UP TO ACCOUNT</h2>
                <p>Enter Your Email & Password to Login</p>
            </div>
            <form action="{{ route('register') }}" class="my-4" method="POST" enctype="multipart/form-data">
                @if ($errors->any())
                    {{-- <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $errors->first() }}</strong>
                    </div> --}}
                    {{-- <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong></strong>
                </div> --}}
                @endif
                @csrf
                <div class="form-row">
                    <input type="text" name="name" placeholder="First Name" required>
                    <input type="text" name="email" placeholder="Enter Your Email" required>
                </div>

                <div class="form-row">
                    <input type="text" name="address" placeholder="Address">
                    <input type="text" name="country" placeholder="Country" required>
                </div>

                <div class="form-row">
                    <input type="text" name="city" placeholder="City" required>
                    <input type="text" name="province" placeholder="State" required>
                </div>

                <div class="form-row form-btn">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <span class="toggle-password" onclick="togglePassword()">👁</span>
                </div>
                <div class="form-row form-btn">
                    <input type="password" id="confirm-password" name="password_confirmation"
                        placeholder="Confirm Password Password" required>
                    <span class="toggle-password" onclick="togglePassword()">👁</span>
                </div>
                <div class="form-row anchor">
                    <p>Fill out the <a href="https://www.irs.gov/forms-pubs/about-form-1099-b" target="_blank">1099-B form</a>, then download it and attach it below.</p>
                </div>
                <div class="form-row form-btn">
                    <input type="file" name="file[]" class="form-input" multiple>
                </div>

                <div class="extra-options">
                    <label>
                        <input type="radio" name="terms"> By clicking this, you agree to the <a href="{{route('auction.terms')}}" target="_blank"> Terms and Conditions </a>
                        and the <a href="{{route('privacy_policy')}}" target="_blank">Refund Policy. </a>
                    </label>
                </div>

                <button type="submit" class="signup-btn">Sign Up</button>
                <div class="text">
                    <p>Already Have an Account? <a href="{{ route('login') }}"> Login Here </a></p>
                </div>
            </form>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            const fields = ["password", "confirm-password"];

            fields.forEach(fieldId => {
                const field = document.getElementById(fieldId);
                if (field) {
                    const isPassword = field.type === "password";
                    field.type = isPassword ? "text" : "password";
                }
            });
        }
    </script>
    <script>
        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif
        @if (session('error'))
            toastr.error("{{ session('error') }}")
        @endif
        @if (session('info'))
            toastr.info("{{ session('info') }}")
        @endif
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}")
            @endforeach
        @endif
    </script>
</body>

</html>
