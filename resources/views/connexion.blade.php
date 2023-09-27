<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" href="{{ asset('assets/images/logo/logo.jpg') }}" />
    <title>Login</title>
</head>

<body>
    <main>
        <div class="block-login">

            <div class="main-section section-one">

                <div class="main-section section-one__title">
                    <h2>Se connecter</h2>
                </div>

                <div>
                    <a href="#" class="btn-white">Admin</a>
                </div>

                <div>
                    <a href="#" class="btn-white">Employé</a>
                </div>

            </div>

            <div class="main-section section-two">

                <div class="adjust-position">
                    <div>
                        <input type="text" class="btn-white lg" placeholder="Identifiant">
                    </div>

                    <div>
                        <input type="text" class="btn-white lg" placeholder="Mot de passe">
                    </div>

                    <div>
                        <a href="{{ route('accueil-admin') }}" class="btn-white lg">VALIDER</a>
                    </div>
                </div>

            </div>

        </div>
    </main>

</html>
