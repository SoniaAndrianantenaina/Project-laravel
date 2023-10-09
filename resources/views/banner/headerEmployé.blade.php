<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" href="{{ asset('assets/images/logo/logo.jpg') }}" />
    <title>Header</title>
</head>

<body>
<header id="sectHeader" class="sectHeader sectHeader--sticky">
        <div class="container">
            <div class="headerIntern">
                <div class="cntlogo">
                    <a href="index.html">
                        <img class="img-fluid" src="../../assets/images/logo/logo.jpg" alt="Logo">
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
                                <li class="@if(Request::is('accueil-employe')) current @endif">
                                    <a href="{{ route('accueil-employe') }}" class="text-decoration">
                                        Accueil
                                    </a>
                                </li>
                                <li class="@if(Request::is('liste-colaborateurs')) current @endif">
                                    <a href="{{ route('liste-collaborateurs') }}" class="text-decoration">
                                        Collaborateurs
                                    </a>
                                </li>
                                <li class="@if(Request::is('solde-conge','liste-demande-conge','demande-conge')) current @endif">
                                    <a href="{{ route('solde-conge') }}" class="text-decoration">
                                        Congés
                                    </a>
                                </li>
                                <li class="@if(Request::is('liste-annonces-employe')) current @endif">
                                    <a href="{{ route('liste-annonces-employe') }}" class="text-decoration">
                                        Annonces
                                    </a>
                                </li>
                                <li class="@if(Request::is('mon-profil')) current @endif">
                                    <a href="{{ route('mon-profil') }}" class="text-decoration">
                                        Mon profil
                                    </a>
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
