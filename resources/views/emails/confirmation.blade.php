<!DOCTYPE html>
<html>
<head>
    <title>Bevestig je registratie</title>
</head>
<body>
<h1>Hallo {{ $user->name }},</h1>
<p>Bedankt voor je registratie! Klik op de onderstaande link om je e-mailadres te bevestigen:</p>
<a href="{{ url('/verify-email/' . $user->verification_token) }}">Bevestig je e-mailadres</a>
</body>
</html>
