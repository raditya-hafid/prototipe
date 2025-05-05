<?php
// controller/KomentarController.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['user'];
    $komentar = $_POST['komentar'];

    $data = "[" . date("Y-m-d H:i") . "] " . $user . ": " . $komentar . "\n";

    file_put_contents("../storage/komentar.txt", $data, FILE_APPEND);

    // Kembali ke form
    header("Location: ../views/komentar_form.php");
    exit;
}

?>