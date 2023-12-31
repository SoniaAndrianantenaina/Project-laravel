<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" href="{{ asset('assets/images/logo/logo.png') }}" />
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
    <title>Header</title>
</head>
<body>
<header id="sectHeader" class="sectHeader sectHeader--sticky">
        <div class="menu-header">
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
                                <li class="@if(Request::is('accueil-admin')) current @endif">
                                    <a href=" {{ route('accueil-admin') }} " class="text-decoration">
                                        Accueil
                                    </a>
                                </li>
                                <li class="@if(Request::is('liste-departements','ajout-departement')) current @endif">
                                    <a href="{{ route('liste-departements') }}" class="text-decoration">
                                        Départements
                                    </a>
                                </li>
                                <li class="@if(Request::is('liste-employes','profil-employe','off-boarding','demande-employe-conge')) current @endif">
                                    <a href="" class="text-decoration">
                                        Employés
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="{{ route('liste-employes') }} " class="text-decoration">Liste</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('demande-employe-conge') }} " class="text-decoration">Demandes congés</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="@if(Request::is('liste-candidats','ajout-candidat','ajout-collaborateur')) current @endif">
                                    <a href="{{ route('liste-candidats') }}" class="text-decoration">
                                        Candidatures
                                    </a>
                                </li>

                                <li class="@if(Request::is('liste-annonces','ajout-annonce')) current @endif">
                                    <a href="{{ route('liste-annonces') }}" class="text-decoration">
                                        Annonces
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('profil-admin') }}" class="text-decoration">
                                        <img src="{{ asset('assets/images/collaborateur/profil.jpg') }}" alt="">
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
