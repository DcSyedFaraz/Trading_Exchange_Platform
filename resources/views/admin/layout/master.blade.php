<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/sharp-duotone-solid.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/sharp-thin.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/sharp-solid.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/sharp-regular.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/sharp-light.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <title>User Management</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <div class="row align-items-center">
        <div class="col-md-2">
            @include('admin.layout.sidebar')
        </div>
        <div class="col-md-10">
            <section class="main-sec">
                <div class="main-cont">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="admin">
                                <h1>Admin Portal</h1>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="sm-header">
                                <div class="notice_box">
                                    <a href="#">
                                        <i class="fa-light fa-bell"></i>
                                        <span class="bubble_count">6</span>
                                    </a>
                                </div>
                                <div class="notice_box">
                                    <a href="#">
                                        <i class="fa-brands fa-facebook-messenger"></i>
                                        <span class="bubble_count">6</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @yield('content')

            </section>
        </div>
    </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('toggleBtn');
    const indicator = document.getElementById('indicator');
    const menuItems = document.querySelectorAll('.sidebar ul li');

    // Toggle sidebar open/close
    toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('open');
        // Adjust button icon based on sidebar state
        if (sidebar.classList.contains('open')) {
            toggleBtn.innerHTML = '<i class="fa-solid fa-bars"></i>';
        } else {
            toggleBtn.innerHTML = '<i class="fa-solid fa-bars"></i>';
        }
    });

    // Move the indicator line on hover
    menuItems.forEach((item, index) => {
        item.addEventListener('mouseover', () => {
            const itemHeight = item.offsetHeight;
            const offsetTop = item.offsetTop; // Match the height of the current item
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    // toastr.info("{{ auth()->user()->id }}");

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

</html>
