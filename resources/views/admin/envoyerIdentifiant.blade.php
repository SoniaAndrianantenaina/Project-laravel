<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" href="{{ asset('assets/images/logo/logo.jpg') }}" />
    <title>Envoyer Identifiant</title>
</head>

<body>

    <main class="envoyer-identifiant">
        <div class="block-login">
            <div class="main-section section-one bleu-clair">

                <div class="main-section section-one__title bottom">
                    <h2>IDENTIFIANTS</h2>
                </div>

                <div class="main-section identifiant">
                    <div>
                        <p>
                            Nom : <input type="text" class="btn-white lg-bigger">
                        </p>
                    </div>

                    <div>
                        <p>
                            Mot De Passe : <input type="text" class="btn-white lg-bigger">
                        </p>
                    </div>
                </div>

                <div class="boutons">
                    <div class="btn bleu-foncé">
                        <a href="{{ route('ajout-collaborateur') }}" class="btn__middle-btn">ANNULER</a>
                    </div>

                    <div class="btn bleu-clair">
                        <a href="{{ route('liste-candidats') }}" class="btn__middle-btn">ENVOYER</a>
                    </div>
                </div>

            </div>
        </div>

    </main>
</body>

</html>
