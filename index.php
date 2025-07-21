<?php
require_once 'includes/config.php';
?>

<!doctype html>
<html lang="en">

<head>
  <title><?=$title?> | Login</title>
  
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
  <meta name="color-scheme" content="light dark" />
  <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
  <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
  <meta name="title" content="<?=$title?> | Login Page" />
  <meta name="author" content="ColorlibHQ" />
  <meta name="supported-color-schemes" content="light dark" />

  <!-- internal css -->
  <link rel="preload" href="<?= base_url('assets/css/adminlte.css') ?>" as="style" />
  <link rel="stylesheet" href="<?= base_url('assets/css/adminlte.css') ?>" />

  <!-- cdn css -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" media="print" onload="this.media='all'" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />

  <!-- sweetalert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="login-page bg-body-secondary">

  <!-- display message -->
  <?php require_once 'includes/message.php' ?>

  <div class="login-box">
    <div class="login-logo">
      <a href="<?= base_url('') ?>">PHP STARTER KIT</a>
    </div>

    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="<?= base_url('function/func.auth.php') ?>" method="post">
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email"/>
            <div class="input-group-text">
              <span class="bi bi-envelope"></span>
            </div>
          </div>

          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password"/>
            <div class="input-group-text">
              <span class="bi bi-lock-fill"></span>
            </div>
          </div>

          <button type="submit" name="sign-in" class="btn btn-primary w-100">Sign-In</button>
        </form>
      </div>
    </div>

    <p class="text-center my-3">&copy; Developed By Kalryuz Dev</p>
  </div>

  <!-- js -->
  <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"></script>
  <script src="<?= base_url('assets/js/adminlte.js') ?>"></script>
  
</body>
</html>