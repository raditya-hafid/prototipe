<!-- views/komentar_form.php fr -->
<h2>Berikan Komentar</h2>
<form action="../controller/KomentarController.php" method="POST">
    <input type="text" name="user" placeholder="Nama Anda" required><br><br>
    <textarea name="komentar" placeholder="Tulis komentar..." required></textarea><br><br>
    <button type="submit">Kirim Komentar</button>
</form>
<hr>
<h3>Komentar Sebelumnya</h3>
<?php
$komentarFile = "../storage/komentar.txt";
if (file_exists($komentarFile)) {
    $komentarList = file($komentarFile);
    foreach ($komentarList as $k) {
        echo "<p>" . htmlspecialchars($k) . "</p><hr>";
    }
}
?>
