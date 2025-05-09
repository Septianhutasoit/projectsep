<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Baru dari Form Kontak</title>
</head>
<body>
    <h2>Pesan Baru dari {{ $data['name'] }}</h2>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Pesan:</strong></p>
    <p>{{ $data['message'] }}</p>
    <hr>
    <p>Terima kasih.</p>
</body>
</html>
