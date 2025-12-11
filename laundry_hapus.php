<?php
require 'config.php';
require 'cek_login.php';

$id = (int)($_GET['id'] ?? 0);

if ($id) {
    mysqli_query($koneksi, "DELETE FROM laundry WHERE id=$id");
}

header("Location: " . ($_GET['from'] ?? 'laundry_masuk.php'));
exit;
