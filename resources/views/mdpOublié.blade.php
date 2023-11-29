<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Mot de passe oublié</title>
    <style>
        body {
            background-color: #f0f0f0;
            /* Couleur de fond */
        }

        .forgot-password-container {
            background-color: #3498db;
            /* Couleur de fond du conteneur */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 100px auto;
            max-width: 400px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="forgot-password-container text-center text-white">
            <h2 class="mb-4">Mot de passe oublié</h2>
            <form action="{{ route('nouveau-mdp') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Entrez votre adresse e-mail"
                        required>
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </div>

    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Succès',
                text: '{{ session('success') }}',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '{{ route('connexion') }}';
                }
            });
        @elseif (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Erreur',
                text: '{{ session('error') }}'
            });
        @endif
    </script>
</body>

</html>
