<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pendaftaran Pengguna Baru</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">
    <div style="max-width: 600px; margin: auto; background-color: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
        <h2 style="color: #2c3e50;">Pengguna Baru Telah Mendaftar</h2>
        <p><strong>Nama:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Tanggal Lahir:</strong> {{ $user->tanggal_lahir }}</p>
        <p><strong>Daerah:</strong> {{ $user->daerah }}</p>
        <hr>
        <p style="font-size: 14px; color: #7f8c8d;">Email ini dikirim secara otomatis oleh sistem klinik.</p>
    </div>
</body>
</html>