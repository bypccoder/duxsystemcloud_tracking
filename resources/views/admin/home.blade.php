<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr"
    data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard | Dux</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ url('assets') }}/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="{{ url('assets') }}/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="{{ url('assets') }}/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ url('assets') }}/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ url('assets') }}/vendor/css/rtl/theme-default.css"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ url('assets') }}/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ url('assets') }}/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ url('assets') }}/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="{{ url('assets') }}/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ url('assets') }}/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{ url('assets') }}/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ url('assets') }}/js/config.js"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            @include('admin.partials.menu')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                @include('admin.partials.header')
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 order-1">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-6 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div
                                                    class="card-title d-flex align-items-start justify-content-between">
                                                    <div class="avatar flex-shrink-0">
                                                        <img src="{{url('assets')}}/img/icons/unicons/community.png"
                                                            alt="Credit Card" class="rounded" />
                                                    </div>
                                                </div>
                                                <span>Reprogramados</span>
                                                <h3 class="card-title text-nowrap mb-1">2300</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-6 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div
                                                    class="card-title d-flex align-items-start justify-content-between">
                                                    <div class="avatar flex-shrink-0">
                                                        <img src="{{url('assets')}}/img/icons/unicons/community.png"
                                                            alt="Credit Card" class="rounded" />
                                                    </div>
                                                </div>
                                                <span>Agendados</span>
                                                <h3 class="card-title text-nowrap mb-1">10500</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-6 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div
                                                    class="card-title d-flex align-items-start justify-content-between">
                                                    <div class="avatar flex-shrink-0">
                                                        <img src="{{url('assets')}}/img/icons/unicons/community.png"
                                                            alt="Credit Card" class="rounded" />
                                                    </div>
                                                </div>
                                                <span>Rechazados</span>
                                                <h3 class="card-title text-nowrap mb-1">15300</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    @include('admin.partials.footer')
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="{{ url('assets') }}/libs/jquery/jquery.js"></script>
    <script src="{{ url('assets') }}/libs/popper/popper.js"></script>
    <script src="{{ url('assets') }}/js/bootstrap.js"></script>
    <script src="{{ url('assets') }}/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{ url('assets') }}/libs/hammer/hammer.js"></script>
    <script src="{{ url('assets') }}/libs/i18n/i18n.js"></script>
    <script src="{{ url('assets') }}/libs/typeahead-js/typeahead.js"></script>
    <script src="{{ url('assets') }}/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ url('assets') }}/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="{{ url('assets') }}/js/main.js"></script>

    <!-- Page JS -->
    <script src="{{ url('assets') }}/js/dashboards-analytics.js"></script>
</body>

</html>
