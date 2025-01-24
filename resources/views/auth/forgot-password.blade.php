<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/fav.png') }}">
    <title>Forgot password</title>
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
                    <h2>Forgot password</h2>
                    <p>Forgot your password? No problem. Just let us know your email address and we will email you a
                        password reset link that will allow you to choose a new one.</p>
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                </div>
                <form action="{{ route('password.email') }}" method="POST">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
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



                    <button type="submit" class="signup-btn">Email Password Reset Link</button>
                    <div class="text">
                        <p>Go back to <a href="{{ route('login') }}"> Login </a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>



</body>

</html>
