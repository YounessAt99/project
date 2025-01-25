<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6;">
    <h1 style="color: #4A90E2;">Bienvenue sur notre plateforme Acheel</h1>
    <p>Bonjour {{ $username }},</p>
    <p>Vous pouvez vous connecter en utilisant le lien ci-dessous :</p>
    <p>
        <a href="{{ $loginUrl }}" style="background-color: #4A90E2; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px;">
            Se connecter
        </a>
    </p>
    <p>Si vous avez des questions, n'hésitez pas à nous contacter.</p>
    <p>Cordialement,</p>
    <p>L'équipe Asheel</p>
</body>
</html>
