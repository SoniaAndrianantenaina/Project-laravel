<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Congirmation congé</title>
</head>
<body>
    <p>Bonjour,</p>
    <p>
        Votre demande de congé du {{ \Carbon\Carbon::parse($date_debut)->locale('fr_FR')->isoFormat('D MMMM Y') }} au
        {{ \Carbon\Carbon::parse($date_fin)->locale('fr_FR')->isoFormat('D MMMM Y') }} a bien été confirmée
    </p>
</body>
</html>
