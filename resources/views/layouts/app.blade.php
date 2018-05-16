<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @section('head')
        @if(empty($params['title']))
                <title>The Fittest Warrior</title>
        @else
                <title>The Fittest Warrior | {{ $params['title'] }}</title>
        @endif

        <!-- Start of Head -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Javascript Imports -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

        <!-- Application Javascript -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom_styles.css') }}" rel="stylesheet">
    @show
</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<div class="container-fluid py-3">
    @section('navigation')
        <div class="row px-3 mb-3">
            <div class="col-12 px-0 ">
                <nav class="navbar navbar-expand-md navbar-light bg-darkGray">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="brand">
                        <a class="navbar-brand " href="/"><img src="{{ asset('images/icons/brand_logo.png') }}" width="40px"></a>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0 text-center navLinks">

                            @auth
                                <li class="nav-item ml-1">
                                    <a class="nav-link" href="{{ url('account') }}">Account</a>
                                </li>
                                <li class="nav-item ml-1">
                                    <a class="nav-link" href="{{ url('dashboard') }}">Dashboard</a>
                                </li>
                            @endauth
                                <li class="nav-item ml-1">
                                    <a class="nav-link" href="/gyms">Gyms</a>
                                </li>
                            <li class="nav-item ml-1">
                                <a class="nav-link" href="https://the-fittest-warrior.myshopify.com/">Shop</a>
                            </li>
                            <li class="nav-item ml-1">
                                <a class="nav-link" href="/about">About</a>
                            </li>
                            <li class="nav-item ml-1">
                                <a class="nav-link" href="/contact">Contact</a>
                            </li>
                        </ul>
                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right" style="margin-right: 60px;">
                            <!-- Authentication Links -->
                            @guest
                                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                                <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ Auth::user()->first_name }}<span class="caret"></span></a>

                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    @show
    @yield('content')
    <footer>
        @section('footer')
            <div class="row px-3">
                <div class="col bodyPanelStyle">
                    <ul class="social">
                        <li><a href="https://www.facebook.com/The-Fittest-Warrior-259911920689076/"><i class="fa fa-facebook-f col-sm"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter col-sm"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube-play col-sm"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="row px-3">
                <div class="col bodyPanelStyle">
                    <div class="row">
                        <div class="col py-1">
                            <ul class="social">
                                <li class="fav_style"><a href="https://www.facebook.com/The-Fittest-Warrior-259911920689076/"><i class="fa fa-facebook-f col-sm"></i></a></li>
                                <li class="fav_style"><a href="#"><i class="fa fa-twitter col-sm"></i></a></li>
                                <li class="fav_style"><a href="#"><i class="fa fa-youtube-play col-sm"></i></a></li>
                                <li class="pl-5 py-2"><span>Copyright ©2018, DeMile Technologies</span></li>
                                <li class="pl-5 py-2 "><a class="terms" href="/terms">Terms</a></li>
                                <li class="pl-2 py-2 ">|</li>
                                <li class="pl-2 py-2 "><a class="terms" href="/terms">Privacy Notice</a></li>

                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        @show
    </footer>
</div><!-- close container-fluid -->
</body>
</html>
