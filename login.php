<?php require 'config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Laundry Crafty</title>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body { background:#f4f4f4; }
        .login-box {
            max-width: 360px;
            margin: 60px auto;
            text-align: center;
        }
        .logo-circle {
            width:90px;height:90px;border-radius:50%;
            border:3px solid #4f7cff;
            display:flex;align-items:center;justify-content:center;
            margin:0 auto 10px;
        }
    </style>
</head>
<body>
<div class="login-box">
    <div class="logo-circle">
        ⚡
    </div>
    <h3>Laundry Crafty</h3>

    <?php if (!empty($_SESSION['error'])): ?>
        <div class="alert alert-danger py-1 mt-2">
            <?= $_SESSION['error']; unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>

    <form action="login_proses.php" method="post" class="mt-3 text-start">
        <div class="mb-2">
            <input type="text" name="username" class="form-control"
                   placeholder="Username" required>
        </div>
        <div class="mb-2">
            <input type="password" name="password" class="form-control"
                   placeholder="Password" required>
        </div>
        <div class="form-check mb-2">
            <input type="checkbox" class="form-check-input" id="remember">
            <label class="form-check-label" for="remember">Remember Me</label>
        </div>
        <button class="btn btn-primary w-100">Login</button>
    </form>
</div>
</body>
</html>
