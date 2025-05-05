<?php
// Mulai sesi untuk menyimpan riwayat transaksi yyy
session_start();

if (!isset($_SESSION['transactions'])) {
    $_SESSION['transactions'] = [];
}

// Daftar kupon valid
$validCoupons = [
    'JARINGANSALAWASE' => 20,
    'WEBCOURSE' => 20
];

// Variabel dasar 
$subtotal = 0;
$discount = 0;
$discountAmount = 0;
$total = 0;
$discountMessage = '';
$selectedItems = [];

// DAFTAR course
$courses = ['mtk', 'ipa', 'ips'];
$price = 150000;

// Kalau tombol clear_history diklik
if (isset($_POST['clear_history'])) {
    $_SESSION['transactions'] = [];
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Hitung subtotal berdasarkan mata pelajaran yang dipilih
    foreach ($courses as $course) {
        if (isset($_POST[$course])) {
            $selectedItems[] = strtoupper($course);
            $subtotal += $price;
        }
    }

    // Validasi kupon jika ada
    if (!empty($_POST['couponCode'])) {
        $couponCode = strtoupper($_POST['couponCode']);
        if (isset($validCoupons[$couponCode])) {
            $discount = $validCoupons[$couponCode];
            $discountAmount = ($subtotal * $discount) / 100;
            $discountMessage = "Selamat! Anda mendapatkan diskon {$discount}%";
        } else {
            $discountMessage = 'Kode kupon tidak valid';
        }
    }

    $total = $subtotal - $discountAmount;
    
    if(isset($_POST['bayar'])){
        // Cek jika semua data sudah lengkap (pilihan mata pelajaran dan metode pembayaran)
        if (isset($_POST['payment']) && !empty($selectedItems) && $_POST['bayar'] == 'bayar') {
            // Simpan transaksi
            $transaction = [
                'date' => date('Y-m-d H:i:s'),
                'items' => $selectedItems,
                'payment_method' => $_POST['payment'],
                'discount' => $discount,
                'discount_amount' => $discountAmount,
                'total' => $total
            ];
    
            array_unshift($_SESSION['transactions'], $transaction);
            // Redirect untuk mencegah pengulangan transaksi setelah refresh
        } elseif ($_POST['bayar'] == 'bayar') {
            $paymentError = "Silakan pilih mata pelajaran dan metode pembayaran.";
        }
    }
}
?>