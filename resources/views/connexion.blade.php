<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" href="{{ asset('assets/images/logo/logo.png') }}" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/query.js') }}"></script>
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
                    <a href="#" onclick="showForm('user-admin')" class="btn-white">Admin</a>
                </div>

                <div>
                    <a href="#" onclick="showForm('user-employee')" class="btn-white">Employé</a>
                </div>

            </div>

            <div id="user-admin" class="main-section section-two" style="display: none;">
                <form action="{{ route('login-admin') }}" method="POST" class="admin-form">
                    @csrf
                    <h2 class="main-section section-two__title">ADMIN</h2>
                    <input type="text" name="identifiant" class="btn-white lg" placeholder="Identifiant">
                    <input type="password" name="mdp" class="btn-white lg" placeholder="Mot de passe">
                    <button type="submit" class="button-submit">VALIDER</button>
                </form>
                <div id="admin-error" class="alert-danger" style="display: none;"></div>
            </div>

            <div id="user-employee" class="main-section section-two" style="display: none;">
                <form action="{{ route('login-employé') }}" method="POST" class="employee-form">
                    @csrf
                    <h2 class="main-section section-two__title">EMPLOYE</h2>
                    <input type="text" name="identifiant" class="btn-white lg" placeholder="Identifiant">
                    <input type="password" name="mdp" class="btn-white lg" placeholder="Mot de passe">
                    <button type="submit" class="button-submit">VALIDER</button>
                </form>
                <div id="employee-error" class="alert-danger" style="display: none;"></div>
            </div>
        </div>

    </main>

</html>
