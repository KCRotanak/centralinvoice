<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Central Invoice</title>
    <link rel="icon" href="{{ asset('assets/images/logoweb.png') }}" type="image/jpg" />
    {{-- box icon --}}
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    {{-- cdnjs for anime --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"
        integrity="sha512-doJrC/ocU8VGVRx3O9981+2aYUn3fuWVWvqLi1U+tA2MWVzsw+NVKq1PrENF03M+TYBP92PnYUlXFH1ZW0FpLw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> {{-- css --}}
    <link href="{{ asset('css/layouts/layout.css') }}" rel="stylesheet">
    <link href="{{ asset('css/front/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/front/contact.css') }}" rel="stylesheet">


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

    <style>
        input[type=number] {
            -moz-appearance: textfield !important;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>

    
</head>

<body>
    <nav class="navbar navbar-expand-md">
        <div class="container-fluid">

            <a href="/"><img src="{{ asset('assets/images/logoweb.png') }}" alt=""></a>

            <button class="navbar-toggler" type="button" style="background-color: white" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @php
                    $currentRoute = request()
                        ->route()
                        ->getName();
                @endphp
                <ul class="menu_nav navbar-nav me-auto ms-auto mb-2 mb-lg-0 ">

                    <li class="nav-item pe-5">
                        <a class="home_nav nav-link {{ $currentRoute === 'home' ? 'active' : '' }} six"
                            aria-current="page" href="{{ asset('/') }}">Home</a>
                    </li>
                    <li class="nav-item pe-5">
                        <a class="contact_nav nav-link {{ $currentRoute === 'contactus.create' ? 'active' : '' }} one"
                            aria-current="page" href="{{ asset('/contact') }}">Contact Us</a>
                    </li>
                </ul>
                <ul class="auth_nav navbar-nav mb-2">
                    @guest
                        @if (Route::has('register'))
                            <li class="nav-item active">
                                <a class="register_nav nav-link text-decoration-none"
                                    href="{{ route('register') }}">Register</a>
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
    <div class="page-wrapper">
        <div class="loader">
            <div class="loader-content">
                <img src="{{ asset('assets/images/loading.gif') }}" alt="Loader" class="loader-loader"
                    style="margin-top:300px">
            </div>
        </div>

        @yield('content')
    </div>
    <footer>
        <div class="pt-3 pb-2 ps-5 pe-5 mt-4">
            <div class="row text-center">
                <div class="col-3 menulink">
                    <p class="mt-lg-0 mt-sm-3 fs-5 fw-semibold">Menu Links</p>
                    <ul class="m-0 p-0">
                        <li><a href="{{ '/' }}">Home</a></li>
                        <li><a href="{{ '/contact' }}">Contact Us</a></li>
                        <li><a href="{{ '/admin/home' }}">Admin</a></li>
                    </ul>
                </div>
                <div class="col-5 about_company">
                    <div class="row">
                        <h2 style="font-size: 20px">CENTRAL INVOICE</h2>
                        <p class="mb-0 text-white-50" style="font-size: 14px">A website where you can verify
                            invoice from the right merchant, download invoice.</p>
                    </div>
                    <div class="row mt-4">
                        <p class="m-0 text-white-50" style="font-size: 14px">Copyright @2023. Alright reserved.</p>
                        <div class="m-0 px-3 footer_link">
                            <a href="">Privacy Policy</a>
                            <a href="">Term of Conditions</a>
                            <a href="">Cookie Preferences</a>
                        </div>
                    </div>

                </div>
                <div class="col-4 location">
                    <h4 class="mt-lg-0 mt-sm-4" style="font-size: 20px">Contact</h4>
                    <p class="mb-0" style="font-size: 14px"><i class='bx bx-map'></i>#123, St 123, Toulkok, Phnom
                        Penh</p>
                    <p class="mb-0" style="font-size: 14px"><i class='bx bxs-phone-call'></i>(+855) 11-575-065</p>
                    <a href="https://www.facebook.com/kong.rotanak.7/"><i class='bx bxl-facebook-square'
                            style='color:#fff; font-size:30px'></i></a>
                    <a href="{{ 'https://web.telegram.org/a/#496531877' }}"><i class='bx bxl-telegram'
                            style='color:#fff; font-size:30px'></i></a>
                    <a
                        href="https://mail.google.com/mail/u/0/#inbox?compose=GTvVlcSMVlCTvxqTrbzWjQtKtvKwCZVHlfMBhgPbbSmcsXDhrgxZsVgsPpxmCfldhpRQQjQNkkJNz"><i
                            class='bx bx-envelope' style='color:#fff; font-size:30px'></i></a>
                </div>
            </div>
        </div>
    </footer>

    {{-- loader --}}
    <script>
        window.onload = function() {
            setTimeout(function() {
                var loader = document.getElementsByClassName("loader")[0];
                loader.className = "loader fadeout";
                setTimeout(function() {
                    loader.style.display = "none"
                }, 500)
            }, 500)
        }
    </script>
    {{-- nav bar --}}
    <script>
        $(document).ready(function() {

            $(".one").click(function() {
                $(this).addClass("active").siblings().removeClass("active");
            });
        });
    </script>
</body>

</html>
