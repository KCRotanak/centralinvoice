<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{ asset('assets/images/logoweb.png') }}" type="image/jpg" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" href="{{ asset('assets/images/logoweb.png') }}" type="image/jpg" />
    {{-- box icon --}}
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    {{-- cdnjs for anime --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"
        integrity="sha512-doJrC/ocU8VGVRx3O9981+2aYUn3fuWVWvqLi1U+tA2MWVzsw+NVKq1PrENF03M+TYBP92PnYUlXFH1ZW0FpLw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    
    {{-- css --}}
    <link href="{{ asset('css/layouts/layout.css') }}" rel="stylesheet">
    <link href="{{ asset('css/front/auth.css') }}" rel="stylesheet">

    {{-- bootstrap script --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
    {{-- animate script --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>

<body style="background-image: url('/assets/images/homeinvoice.png')">
    <nav class="navbar navbar-expand-md">
        <div class="container-fluid">

            <a href="/"><img src="{{ asset('assets/images/logoweb.png') }}" alt=""></a>

            <button class="navbar-toggler" type="button" style="background-color: white" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="auth_nav navbar-nav ms-auto me-0 mb-2">
                    @guest 
                        @if (Route::has('register'))
                            <li class="nav-item active">
                                <a class="register_nav nav-link text-decoration-none" href="{{ route('register') }}">Register</a>
                            </li>
                        @endif
                        @if (Route::has('login'))
                            <li class="nav-item pe-1">
                                <a class="login_nav nav-link text-decoration-none" href="{{ route('login') }}">Login</a>
                            </li>
                        @endif
                        @else
                    @endguest
                </ul>
            </div>
        </div>
    </nav>


    <section>
        <div class="page-wrapper" style="margin-top: 50px">
            <div class="page-content-wrapper">
                
                @yield('content')
            </div>
        </div>
    </section>


</body>

</html>
