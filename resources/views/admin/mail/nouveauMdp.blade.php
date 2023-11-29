<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réinitialisation de mot de passe</title>
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
        <h1>Réinitialisation de mot de passe</h1>
    </header>

    <div class="container">
        
        <p>Bonjour,</p>
        
        <p>Votre mot de passe a été réinitialisé avec succès. Voici votre nouveau mot de passe :</p>

        <div class="password-box">
            <strong>{{$mdp}}</strong>
        </div>

        <p style="color: red;">Assurez-vous de changer ce mot de passe une fois connecté à votre compte.</p>

        <p>Cordialement,<br>Youman</p>
    </div>
</body>
</html>
