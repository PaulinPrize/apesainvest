<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head >
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}"></script>
    <script src="{{ asset('public/js/Xhttp_ActiveX.js') }}"></script>
    <script src="{{ asset('public/js/toastr.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

  
    <!-- Styles -->
    <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">  
    <link href="{{ asset('public/css/toastr.min.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('public/vendor/adminlte/vendor/font-awesome/css/font-awesome.min.css') }}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel fixed-top ma-navbar">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="font-weight:bold">
                    Apesa Invest
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Qui sommes nous ?</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Guides
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">
                                    Guide de l'entrepreneur
                                </a>
                                <a class="dropdown-item" href="#">
                                    Guide de l'investisseur
                                </a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Projets
                            </a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Inscription') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
        <footer id="footer" class="footer " style="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <p class="titrePiedDePage">APESA INVEST</p>
                        <p>Apesa Invest est une plateforme de financement participatif qui met en relation des porteurs de projets et des investisseurs.</p>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <p class="titrePiedDePage">A propos de nous</p>
                        <ul>
                            <li class="listeAPuce"><a href="" class="liensPiedDePage">Qui sommes-nous?</a></li>
                            <li class="listeAPuce"><a href="" class="liensPiedDePage">Guide de l'entrepeneur</a></li>
                            <li class="listeAPuce"><a href="" class="liensPiedDePage">Guide de l'investisseur</a></li>
                            <li class="listeAPuce"><a href="" class="liensPiedDePage">Nous contacter</a></li>
                        </ul> 
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <p class="titrePiedDePage">Mentions légales</p>
                        <ul>
                            <li class="listeAPuce"><a href="" class="liensPiedDePage">Conditions générales</a></li>
                            <li class="listeAPuce"><a href="" class="liensPiedDePage">Données personnelles</a></li>
                            <li class="listeAPuce"><a href="" class="liensPiedDePage">Cookies</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <p class="titrePiedDePage">Assistance</p>
                        <ul>
                            <li class="listeAPuce"><a href="" class="liensPiedDePage">Support</a></li>
                            <li class="listeAPuce"><a href="" class="liensPiedDePage"></a></li>
                            <li class="listeAPuce"><a href="" class="liensPiedDePage"></a></li>
                            <li class="listeAPuce"><a href="" class="liensPiedDePage"></a></li>
                        </ul> 
                    </div>
                </div>
                <hr></hr>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        Copyright © 2017-2019 Apesa Fund. Tous droits réservés. <a href="">Design by Paulin Priso & Advisor</a><br/>
                        <a href="#" class="liensPiedDePage"><i class="social fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#" class="liensPiedDePage"><i class="social fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#" class="liensPiedDePage"><i class="social fa fa-linkedin" aria-hidden="true"></i></a>
                        <a href="#" class="liensPiedDePage"><i class="social fa fa-instagram" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
