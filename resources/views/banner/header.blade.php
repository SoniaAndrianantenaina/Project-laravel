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
                                <li class="current">
                                    <a href="#" class="text-decoration">
                                        Accueil
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-decoration">
                                        Départements
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('liste-employes') }} " class="text-decoration">
                                        Employés
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('liste-candidats') }}" class="text-decoration">
                                        Candidatures
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('liste-annonces') }} " class="text-decoration">
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

</body>

</html>
