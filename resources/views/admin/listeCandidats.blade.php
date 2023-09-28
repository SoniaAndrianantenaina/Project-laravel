<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" href="{{ asset('assets/images/logo/logo.jpg') }}" />
    <title>Header</title>
</head>


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
                            <li class="@if (Request::is('accueil-admin')) current @endif">
                                <a href=" {{ route('accueil-admin') }} " class="text-decoration">
                                    Accueil
                                </a>
                            </li>
                            <li class="@if (Request::is('liste-departements')) current @endif">
                                <a href="{{ route('liste-departements') }}" class="text-decoration">
                                    Départements
                                </a>
                            </li>
                            <li class="@if (Request::is('liste-employes', 'profil-employe', 'off-boarding')) current @endif">
                                <a href="{{ route('liste-employes') }} " class="text-decoration">
                                    Employés
                                </a>
                            </li>
                            <li class="@if (Request::is('liste-candidats', 'ajout-candidat', 'ajout-collaborateur')) current @endif">
                                <a href="{{ route('liste-candidats') }}" class="text-decoration">
                                    Candidatures
                                </a>
                            </li>

                            <li class="@if (Request::is('liste-annonces')) current @endif">
                                <a href="{{ route('liste-annonces') }}" class="text-decoration">
                                    Annonces
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

            </div>
        </div>
    </div>
</header>

<body>

    <main class="liste-candidats">
        <section class="contenu">
            <div class="bg-color-grey">
                <div class="bg-color-blue">
                    <div class="bg-color-blue__block">
                        <div class="filtre">
                            <div class="filtre__select">
                                <label class="filter-label">
                                    <span class="filter-span">Année :</span>
                                    <select class="select white" id="">
                                        <option value="">2023</option>
                                        <option value="">2022</option>
                                    </select>
                                </label>
                            </div>

                            <div class="filtre__select">
                                <label class="filter-label">
                                    <span class="filter-span">Genre :</span>
                                    <select class="select white" name="" id="">
                                        <option value="">Homme</option>
                                        <option value="">Femme</option>
                                    </select>
                                </label>
                            </div>

                            <div class="filtre__select">
                                <label class="filter-label">
                                    <span class="filter-span">Statut :</span>
                                    <select class="select white" name="" id="">
                                        <option value="">Confirmé</option>
                                        <option value="">Refusé</option>
                                    </select>
                                </label>
                            </div>
                        </div>

                        <div class="boutons modify-top">
                            <div class="btn bleu-foncé">
                                <a href="" class="btn__middle-btn">EFFACER</a>
                            </div>

                            <div class="btn bleu-clair">
                                <a href="" class="btn__middle-btn">FILTRER</a>
                            </div>
                        </div>

                    </div>
                </div>
        </section>
    </main>
</body>

</html>
