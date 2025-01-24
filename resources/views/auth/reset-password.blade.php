<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/fav.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <title>Reset Password</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <section class="signupsec">
        <div class="form-container">
            <div class="container">
                <div class="div-logo">
                    <a href="{{ route('home') }}"><img src="{{ asset('assets/images/footer-logo.png') }}" /></a>
                </div>
                <div class="content">
                    <h2>RESET PASSWORD</h2>
                    <p>Enter Your Email and New Password</p>
                </div>
                <form method="POST" action="{{ route('password.store') }}">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="form-row">
                        <input type="email" id="email" name="email" placeholder="Email Address" required
                            value="{{ old('email', $request->email) }}">
                    </div>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-row">
                        <input type="password" id="password" name="password" placeholder="New Password" required>
                        {{-- <span class="toggle-password" onclick="togglePassword('password')">👁</span> --}}
                    </div>
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-row">
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            placeholder="Confirm Password" required>
                        {{-- <span class="toggle-password" onclick="togglePassword('password_confirmation')">👁</span> --}}
                    </div>
                    @error('password_confirmation')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <button type="submit" class="signup-btn">Reset Password</button>
                </form>
            </div>
        </div>
    </section>

    <script>
        function togglePassword(fieldId) {
            var passwordField = document.getElementById(fieldId);
            var type = passwordField.getAttribute("type") === "password" ? "text" : "password";
            passwordField.setAttribute("type", type);
        }
    </script>

</body>

</html>
