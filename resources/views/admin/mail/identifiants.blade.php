
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bienvenue</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            line-height: 1.6;
            color: #444;
        }
        header{
            background-color: #3498db;
            color: #fff;
            text-align: center;
            padding: 2px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            background: #fff;
        }
        .password-box {
            background-color: #f1f1f1;
            padding: 10px;
            border-radius: 5px;
            margin: 15px 0;
        }
        p {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Vos identifiants</h1>
    </header>

    <div class="container">
        
        <p>Bonjour,</p>
        
        <p>voici vos identifiants :</p>

        <p>Identifiant : {{$identifiant}}</p>
        <p>Mdp : {{$mdp}}</p>

        <p style="color: rgb(255, 225, 0);">Bienvenue dans l'entreprise !</p>

        <p>Cordialement,<br>Youman</p>
    </div>
</body>
</html>
