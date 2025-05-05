<?php
// Ambil data dari form
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$password = $_POST['password'];
$confirm = $_POST['password_confirmation'];

// Validasi sederhana
$errors = [];

// if (empty($name) || empty($email) || empty($password) || empty($confirm)) {
//     $errors[] = "Semua field harus diisi.";
// }

// if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//     $errors[] = "Format email tidak valid.";
// }

if ($password !== $confirm) {
    $errors[] = "Konfirmasi password tidak cocok.";
}

if (strlen($password) < 8) {
    $errors[] = "Password minimal 8 karakter.";
}

// Tampilkan hasil
if (!empty($errors)) {
    echo "<h3 style='color:red;'>Terjadi kesalahan:</h3><ul>";
    foreach ($errors as $e) {
        echo "<li>$e</li>";
    }
    echo "</ul>";
} else {
    echo "<h3 style='color:green;'>Data berhasil divalidasi </h3>";
    echo "<ul>";
    echo "<li>Nama: " . htmlspecialchars($name) . "</li>";
    echo "<li>Email: " . htmlspecialchars($email) . "</li>";
    echo "<li>Password: " . htmlspecialchars($password) . "</li>"; // Ditampilkan asli
    echo "</ul>";
}
?>