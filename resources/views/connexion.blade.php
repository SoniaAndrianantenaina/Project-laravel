<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" href="{{ asset('assets/images/logo/logo.jpg') }}" />
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
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
                    <a href="#" onclick="showAdmin()" class="btn-white">Admin</a>
                </div>

                <div>
                    <a href="#" onclick="showEmploye()" class="btn-white">Employé</a>
                </div>

            </div>

            <div id="user-type" class="main-section section-two">
                <form action="{{ route('login-admin') }}" method="POST">
                    @csrf
                    <div class="adjust-position">
                        <div>
                            <input type="text" name="identifiant" class="btn-white lg" placeholder="Identifiant">
                        </div>

                        <div>
                            <input type="password" name="mdp" class="btn-white lg" placeholder="Mot de passe">
                        </div>

                        <div>
                            <button type="submit" class="button-submit">VALIDER</button>
                        </div>
                    </div>
                </form>

                @if (session('error'))
                    <div class="alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
            </div>

        </div>
    </main>

</html>
