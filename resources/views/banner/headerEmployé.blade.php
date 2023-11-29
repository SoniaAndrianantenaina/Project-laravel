<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" href="{{ asset('assets/images/logo/logo.png') }}" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/query.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
    <title>@yield('title')</title>
    
</head>

<body>
<header id="sectHeader" class="sectHeader sectHeader--sticky">
        <div class="container">
            <div class="headerIntern">
                <div class="cntlogo">
                    <a href="index.html">
                        <img class="img-fluid" src="../../assets/images/logo/logo.png" alt="Logo">
                    </a>
                </div>
                <div class="boxNavIntern">
                    <div class="btnBox">
                        <div id="btnnav">
                            <div class="btninter">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <nav id="navigation">
                        <div class="cntNavBox">
                            <ul class="cntNav">
                                <li class="@if(Request::is('accueil-employé')) current @endif">
                                    <a href="{{ route('accueil-employé') }}" class="text-decoration">
                                        Accueil
                                    </a>
                                </li>
                                <li class="@if(Request::is('liste-collaborateurs')) current @endif">
                                    <a href="{{ route('liste-collaborateurs') }}" class="text-decoration">
                                        Collaborateurs
                                    </a>
                                </li>
                                <li class="@if(Request::is('solde-conge','liste-demande-conge','demander-congé')) current @endif">
                                    <a href="{{ route('solde-conge') }}" class="text-decoration">
                                        Congés
                                    </a>
                                </li>
                                <li class="@if(Request::is('annonces-du-jour-employé','annonces-à-venir-employé')) current @endif">
                                    <a href="{{ route('annonces-du-jour-employé') }}" class="text-decoration">
                                        Annonces
                                    </a>
                                </li>
                                <li class="@if(Request::is('mon-profil')) current @endif">
                                    <a href="{{ route('mon-profil') }}">
                                        <img class="header-profil" src="{{ asset('assets/images/icon/profil.png') }}" alt="">
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="{{ route('mon-profil') }} " class="text-decoration">Profil</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('logout-employe') }} " class="text-decoration">Déconnexion</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

</body>

</html>
