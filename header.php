<?php
require 'config.php';
require 'cek_login.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laundry Crafty</title>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body { background:#f4f4f4; }
        .sidebar {
            width:220px; min-height:100vh;
            background:#336699; color:#fff;
        }
        .sidebar a { color:#fff; text-decoration:none; display:block; padding:8px 12px; }
        .sidebar a:hover { background:rgba(255,255,255,.15); }
        .topbar { background:#4f7cff; color:#fff; padding:8px 15px; }
    </style>
</head>
<body>
<div class="d-flex">
    <div class="sidebar">
        <div class="p-3 fs-5 fw-bold">Laundry Crafty</div>
        <a href="index.php">Dashboard</a>
        <a href="laundry_masuk.php">Laundry Masuk</a>
        <a href="laundry_keluar.php">Laundry Keluar</a>
        <a href="tentang.php">Tentang Laundry Crafty</a>
    </div>
    <div class="flex-grow-1">
        <div class="topbar d-flex justify-content-end">
            <div>
                👤 <?= htmlspecialchars($_SESSION['user']['username']); ?> |
                <a href="logout.php" class="text-white text-decoration-none">Logout</a>
            </div>
        </div>
        <div class="container-fluid mt-3">
        </div><!-- container -->
    </div><!-- main -->
</div><!-- d-flex -->
</body>
</html>
