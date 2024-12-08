<?php
// Koneksi ke database
$host = "localhost";
$username = "root";
$password = "";
$database = "digital_marketing_hub";

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mendapatkan semua data layanan
$query = "SELECT * FROM layanan";
$result = $conn->query($query);

// Jika data tidak ditemukan
if ($result->num_rows == 0) {
    die("Tidak ada layanan yang tersedia.");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Layanan - Digital Marketing Hub</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #1a7be9;
            color: white;
        }
        header {
            background-color: #040e94;
            padding: 20px;
            text-align: center;
        }
        header h1 {
            font-family: 'Poppins', sans-serif;
            font-size: 2.5em;
            margin: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #2b2b2b;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        }
        .service {
            margin-bottom: 50px;
        }
        .service img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .service h1 {
            font-family: 'Poppins', sans-serif;
            font-size: 2em;
            margin-bottom: 15px;
        }
        .service p {
            line-height: 1.8;
        }
        a {
            color: #00C853;
            text-decoration: none;
        }
        footer {
            background-color: #333;
            text-align: center;
            padding: 20px 0;
            color: white;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header>
        <h1>Detail Layanan</h1>
    </header>

    <!-- Content Section -->
    <div class="container">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="service">
                <img src="<?= htmlspecialchars($row['gambar']); ?>" alt="<?= htmlspecialchars($row['judul']); ?>">
                <h1><?= htmlspecialchars($row['judul']); ?></h1>
                <p><strong>Deskripsi:</strong> <?= htmlspecialchars($row['deskripsi']); ?></p>
                <p><?= nl2br(htmlspecialchars($row['konten'])); ?></p>
            </div>
        <?php endwhile; ?>
    </div>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2024 Digital Marketing Hub. All rights reserved.</p>
        <p>
            <a href="index.php">Kembali ke Halaman Utama</a>
        </p>
    </footer>
</body>
</html>

<?php
// Menutup koneksi
$conn->close();
?>
