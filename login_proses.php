<?php
require 'config.php';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$q = mysqli_prepare($koneksi, "SELECT * FROM users WHERE username=?");
mysqli_stmt_bind_param($q, "s", $username);
mysqli_stmt_execute($q);
$result = mysqli_stmt_get_result($q);
$user = mysqli_fetch_assoc($result);

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user'] = [
        'id'       => $user['id'],
        'username' => $user['username'],
        'nama'     => $user['nama']
    ];
    header("Location: index.php");
} else {
    $_SESSION['error'] = "Username / Password salah";
    header("Location: login.php");
}
exit;
