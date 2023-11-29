<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('assets/images/logo/logo.png') }}" />
    <title>Profil de l'Administrateur</title>
    <!-- Inclure Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>

</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <!-- Menu de navigation latéral -->
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active">Profil</a>

                    <a href="{{ route('logout-admin') }}" class="list-group-item list-group-item-action" onclick="deconnexion(event);">Déconnexion</a>
                </div>
            </div>
            <div class="col-md-9">
                <!-- Contenu du profil -->
                <div class="text-center">
                    <img src="{{ asset('assets/images/icon/profil.png') }}" alt="Photo de profil" class="rounded-circle" style="width:150px;">
                </div>
                <h1 class="mt-3">Profil de l'Administrateur</h1>
                <hr>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Informations personnelles</h5>
                        <p class="card-text">Identifiant : {{$admin->identifiant}}</p>
                        <p class="card-text">Email : {{ $admin->email }}</p>
                        <p class="card-text">Rôle : Administrateur</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Inclure Bootstrap JS (jQuery requis) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
