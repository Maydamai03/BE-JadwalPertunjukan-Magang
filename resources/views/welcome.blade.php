<!DOCTYPE html>
<html>
<head>
    <title>API Jadwal Pertunjukan</title>
    <style>
        body { font-family: sans-serif; padding: 30px; background: #f9f9f9; }
        h1 { color: #333; }
        ul { list-style: none; padding: 0; }
        li { margin-bottom: 10px; }
        code { background: #eee; padding: 3px 6px; border-radius: 4px; }
    </style>
</head>
<body>
    <h1>🎭 API Jadwal Pertunjukan</h1>
    <p>Base URL: <code>https://be-jadwalpertunjukan-magang-production.up.railway.app</code></p>
    <h2>Daftar Endpoint:</h2>
    <ul>
        <li><code>POST /api/register</code> - Register user baru</li>
        <li><code>POST /api/login</code> - Login dan dapatkan token</li>
        <li><code>GET /api/users</code> - Lihat semua user (admin)</li>
        <li><code>DELETE /api/users/{id}</code> - Hapus user (admin)</li>
        <li><code>GET /api/pertunjukan</code> - List pertunjukan</li>
        <li><code>POST /api/pertunjukan</code> - Tambah pertunjukan (dengan gambar)</li>
        <li><code>PUT /api/pertunjukan/{id}</code> - Update pertunjukan</li>
        <li><code>DELETE /api/pertunjukan/{id}</code> - Hapus pertunjukan</li>
    </ul>
</body>
</html>
