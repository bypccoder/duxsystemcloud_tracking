<!doctype html>
<html  data-assets-path="{{ url('assets/') }}/" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Web Tracking') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ url('assets/') }}/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="{{ url('assets/') }}/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="{{ url('assets/') }}/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ url('assets/') }}/vendor/css/rtl/core.css"  />
    <link rel="stylesheet" href="{{ url('assets/') }}/vendor/css/rtl/theme-default.css" />
    <link rel="stylesheet" href="{{ url('assets/') }}/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ url('assets/') }}/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ url('assets/') }}/libs/typeahead-js/typeahead.css" />
    <!-- Vendor -->
    <link rel="stylesheet"
        href="{{ url('assets/') }}/libs/@form-validation/umd/styles/index.min.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ url('assets/') }}/vendor/css/pages/page-auth.css" />

    <!-- Helpers -->
    <script src="{{ url('assets/') }}/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ url('assets/') }}/js/config.js"></script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li> @endif
@else
<li class="nav-item
        dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::user()->name }}
    </a>

    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
    </li>
@endguest
</ul>
</div>
</div>
</nav>

<main class="py-4">
    @yield('content')
</main>
</div>


<script src="{{ url('assets/') }}/libs/jquery/jquery.js"></script>
    <script src="{{ url('assets/') }}/libs/popper/popper.js"></script>
    <script src="{{ url('assets/') }}/js/bootstrap.js"></script>
    <script src="{{ url('assets/') }}/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{ url('assets/') }}/libs/hammer/hammer.js"></script>
    <script src="{{ url('assets/') }}/libs/i18n/i18n.js"></script>
    <script src="{{ url('assets/') }}/libs/typeahead-js/typeahead.js"></script>
    <script src="{{ url('assets/') }}/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ url('assets/') }}/libs/@form-validation/umd/bundle/popular.min.js"></script>
    <script src="{{ url('assets/') }}/libs/@form-validation/umd/plugin-bootstrap5/index.min.js"></script>
    <script src="{{ url('assets/') }}/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js"></script>

    <!-- Main JS -->
    <script src="{{ url('assets/') }}/js/main.js"></script>

    <!-- Page JS -->
    <script src="{{ url('assets/') }}/js/pages-auth.js"></script>
</body>

</html>
