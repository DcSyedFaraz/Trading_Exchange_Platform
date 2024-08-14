@extends('admin.layout.master')
@section('content')

<body data-menu-color="dark" data-sidebar="default">

    <!-- Begin page -->
    <div id="app-layout">


        <!-- Topbar Start -->
        <div class="topbar-custom">
            <div class="container-fluid">
                <div class="d-flex justify-content-between">
                    <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">
                        <li>
                            <button class="button-toggle-menu nav-link">
                                <i data-feather="menu" class="noti-icon"></i>
                            </button>
                        </li>
                        <li class="d-none d-lg-block">
                            <div class="position-relative topbar-search">
                                <input type="text" class="form-control bg-light bg-opacity-75 border-light ps-4" placeholder="Search...">
                                <i class="mdi mdi-magnify fs-16 position-absolute text-muted top-50 translate-middle-y ms-2"></i>
                            </div>
                        </li>
                    </ul>
                    <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">

                        <li class="dropdown notification-list topbar-dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i data-feather="bell" class="noti-icon"></i>
                                <span class="badge bg-danger rounded-circle noti-icon-badge">9</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-lg">

                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="m-0">
                                        <span class="float-end">
                                            <a href="#" class="text-dark">
                                                <small>Clear All</small>
                                            </a>
                                        </span>Notification
                                    </h5>
                                </div>

                                <div class="noti-scroll" data-simplebar>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item text-muted link-primary active">
                                        <div class="notify-icon">
                                            <img src="/assets/images/users/user-12.jpg" class="img-fluid rounded-circle" alt="" />
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class="notify-details">Carl Steadham</p>
                                            <small class="text-muted">5 min ago</small>
                                        </div>
                                        <p class="mb-0 user-msg">
                                            <small class="fs-14">Completed <span class="text-reset">Improve workflow in Figma</span></small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item text-muted link-primary">
                                        <div class="notify-icon">
                                            <img src="/assets/images/users/user-2.jpg" class="img-fluid rounded-circle" alt="" />
                                        </div>
                                        <div class="notify-content">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <p class="notify-details">Olivia McGuire</p>
                                                <small class="text-muted">1 min ago</small>
                                            </div>
                                            <p class="mb-1 user-msg">
                                                <small class="fs-14">Added file to <span class="text-reset text-truncate">Create dark mode for our iOS</span></small>
                                            </p>

                                            <div class="d-flex mt-2 align-items-center">
                                                <div class="notify-sub-icon">
                                                    <i class="mdi mdi-download-box text-dark"></i>
                                                </div>

                                                <div>
                                                    <p class="notify-details mb-0">dark-themes.zip</p>
                                                    <small class="text-muted">2.4 MB</small>
                                                </div>
                                            </div>

                                        </div>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item text-muted link-primary">
                                        <div class="notify-icon">
                                            <img src="/assets/images/users/user-3.jpg" class="img-fluid rounded-circle" alt="" />
                                        </div>
                                        <div class="notify-content">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <p class="notify-details">Travis Williams</p>
                                                <small class="text-muted">7 min ago</small>
                                            </div>
                                            <p class="mb-1 user-msg">
                                                <small class="fs-14">Mentioned you in the <span class="text-reset text-truncate">Rewrite text-button</span></small>
                                            </p>
                                            <p class="noti-mentioned p-2 rounded-2 mb-0 mt-2"><span class="text-primary">@Patryk</span> Please make sure that you're....</p>
                                        </div>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item text-muted link-primary">
                                        <div class="notify-icon">
                                            <img src="/assets/images/users/user-8.jpg" class="img-fluid rounded-circle" alt="" />
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class="notify-details">Violette Lasky</p>
                                            <small class="text-muted">5 min ago</small>
                                        </div>
                                        <p class="mb-0 user-msg">
                                            <small class="fs-14">Completed <span class="text-reset">Create new components</span></small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item text-muted link-primary">
                                        <div class="notify-icon">
                                            <img src="/assets/images/users/user-5.jpg" class="img-fluid rounded-circle" alt="" />
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class="notify-details">Ralph Edwards</p>
                                            <small class="text-muted">5 min ago</small>
                                        </div>
                                        <p class="mb-0 user-msg">
                                            <small class="fs-14">Completed <span class="text-reset">Improve workflow in React</span></small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item text-muted link-primary">
                                        <div class="notify-icon">
                                            <img src="/assets/images/users/user-6.jpg" class="img-fluid rounded-circle" alt="" />
                                        </div>
                                        <div class="notify-content">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <p class="notify-details">Jocab jones</p>
                                                <small class="text-muted">7 min ago</small>
                                            </div>
                                            <p class="mb-1 user-msg">
                                                <small class="fs-14">Mentioned you in the <span class="text-reset text-truncate">Rewrite text-button</span></small>
                                            </p>
                                            <p class="noti-mentioned p-2 rounded-2 mb-0 mt-2"><span class="text-reset">@Patryk</span> Please make sure that you're....</p>
                                        </div>
                                    </a>
                                </div>

                                <!-- All-->
                                <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                    View all
                                    <i class="fe-arrow-right"></i>
                                </a>

                            </div>
                        </li>

                        <li class="dropdown notification-list topbar-dropdown">
                            <a class="nav-link dropdown-toggle nav-user me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="/assets/images/users/user-11.jpg" alt="user-image" class="rounded-circle">
                                <span class="pro-user-name ms-1">
                                    Christian <i class="mdi mdi-chevron-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a class='dropdown-item notify-item' href='pages-profile.html'>
                                    <i class="mdi mdi-account-circle-outline fs-16 align-middle"></i>
                                    <span>My Account</span>
                                </a>

                                <!-- item-->
                                <a class='dropdown-item notify-item' href='auth-lock-screen.html'>
                                    <i class="mdi mdi-lock-outline fs-16 align-middle"></i>
                                    <span>Lock Screen</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <!-- item-->
                                <a class='dropdown-item notify-item' href='auth-logout.html'>
                                    <i class="mdi mdi-location-exit fs-16 align-middle"></i>
                                    <span>Logout</span>
                                </a>

                            </div>
                        </li>

                    </ul>
                </div>

            </div>

        </div>
        <!-- end Topbar -->

        

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-xxl">

                    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                        <div class="flex-grow-1">
                            <h4 class="fs-18 fw-semibold m-0">Pie Chart</h4>
                        </div>

                        <div class="text-end">
                            <ol class="breadcrumb m-0 py-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Charts</a></li>
                                <li class="breadcrumb-item active">Pie Charts</li>
                            </ol>
                        </div>
                    </div>

                    <!-- Simple Pie Charts -->
                    <div class="row">
                        <!-- Simple Pie Charts -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Simple Pie Chart</h5>
                                </div>

                                <div class="card-body">
                                    <div id="simple_pie_chart" class="apex-charts"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Simple Donut Charts -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Simple Donut Chart</h5>
                                </div>

                                <div class="card-body">
                                    <div id="simple_donut_chart" class="apex-charts"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Monochrome Pie Charts -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Monochrome Pie Chart</h5>
                                </div>

                                <div class="card-body">
                                    <div id="monochrome_pie_chart" class="apex-charts"></div>
                                </div>

                            </div>
                        </div>

                        <!-- Gradient Donut Pie Charts -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Gradient Donut Pie Chart</h5>
                                </div>

                                <div class="card-body">
                                    <div id="gradient_donut_pie_chart" class="apex-charts"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Semi Donut Pie Charts -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Semi Donut Pie Chart</h5>
                                </div>

                                <div class="card-body">
                                    <div id="semi_donut_pie_chart" class="apex-charts"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Donut with Pattern Charts -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Donut with Pattern Chart</h5>
                                </div>

                                <div class="card-body">
                                    <div id="pattern_donut_pie_chart" class="apex-charts"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div> <!-- container-fluid -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col fs-13 text-muted text-center">
                            &copy; <script>document.write(new Date().getFullYear())</script> - Made with <span class="mdi mdi-heart text-danger"></span> by <a href="#!" class="text-reset fw-semibold">Zoyothemes</a>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->
@endsection
