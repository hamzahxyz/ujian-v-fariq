<?php
// Koneksi ke database
$host = "localhost";
$username = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password
$database = "digital_marketing_hub";

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mendapatkan data layanan
$query = "SELECT * FROM layanan";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Marketing Hub</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="stayle.css">
</head>
<body>
    <!-- Header Section -->
    <header>
        <h1>Digital Marketing Hub</h1>
    </header>

    <!-- Navigation Menu -->
    <nav>
        <a href="#about">Tentang Kami</a>
        <a href="#services">Layanan</a>
        <a href="#contact">Kontak</a>
    </nav>

    <!-- Content Section -->
    <div class="container">
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="card">
    <img src="<?= htmlspecialchars($row['gambar']); ?>" alt="<?= htmlspecialchars($row['judul']); ?>">
    <h2><?= htmlspecialchars($row['judul']); ?></h2>
    <p><?= htmlspecialchars($row['deskripsi']); ?></p>
    <a  class="baca"href="detail.php?id=<?= $row['id']; ?>" style="color: white; text-decoration: none;">Baca Selengkapnya</a>
</div>

            <?php endwhile; ?>
        <?php else: ?>
            <p>Tidak ada layanan yang tersedia saat ini.</p>
        <?php endif; ?>
    </div>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2024 Digital Marketing Hub. All rights reserved.</p>
        <p>
            <a href="https://facebook.com">Facebook</a> |
            <a href="https://instagram.com">Instagram</a> |
            <a href="https://linkedin.com">LinkedIn</a>
        </p>
    </footer>
</body>
</html>

<?php
// Menutup koneksi
$conn->close();
?>
