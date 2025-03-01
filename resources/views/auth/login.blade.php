<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/fav.png') }}">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>

<body>
    <section class="signupsec">
        <div class="form-container">
            <div class="container">
                <div class="div-logo">
                    <a href="{{ route('home') }}"><img src="{{ asset('assets/images/footer-logo.png') }}" /></a>
                </div>
                <div class="content">
                    <h2>SIGN IN</h2>
                    <p>Enter Your Email & Password to Login</p>
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                </div>
                <form action="{{ route('login') }}" method="POST">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $errors->first() }}</strong>
                        </div>
                    @endif

                    @csrf
                    <div class="form-row">
                        <input type="email" id="emailaddress" name="email" required placeholder="Email Address">
                    </div>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-row form-btn">
                        <input type="password" id="password" name="password" placeholder="Password" required>
                        <span class="toggle-password" onclick="togglePassword()">👁</span>
                    </div>
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <div class="extra-options">
                        <label>
                            <input type="radio" name="rememberMe"> Remember Me
                        </label>
                        <a href="{{ route('password.request') }}">Forgot Password?</a>
                    </div>

                    <button type="submit" class="signup-btn">Sign In</button>
                    <div class="text">
                        <p>Don't Have Account? <a href="{{ route('register') }}"> Create Account </a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>


    <script>
        function togglePassword() {
            var passwordField = document.getElementById("password");
            var type = passwordField.getAttribute("type") === "password" ? "text" : "password";
            passwordField.setAttribute("type", type);
        }
    </script>

</body>

</html>
