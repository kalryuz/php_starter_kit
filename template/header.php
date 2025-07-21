<?php
$admin_id = $_SESSION['admin_id'] ?? null;

// admin info
$q = "SELECT * FROM admins WHERE id = '$admin_id' LIMIT 1";
$e = mysqli_query($con, $q);
$admin = mysqli_fetch_assoc($e);

if (mysqli_num_rows($e) == 0) {
    redirect('./');
}

// check image
if (!empty($admin['Image'])) {
    $imagePath = base_url('assets/img/admin/' . $admin['Image']);
} else {
    $imagePath = base_url('assets/img/no_image.png');
}

?>
<!doctype html>
<html lang="en">

<head>
    <title><?= $title . ' | ' . $pageName ?></title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
    <meta name="title" content="<?= $title . ' | ' . $pageName ?>" />
    <meta name="author" content="ColorlibHQ" />
    <meta name="supported-color-schemes" content="light dark" />

    <!-- internal css -->
    <link rel="preload" href="<?= base_url('assets/css/adminlte.css') ?>" as="style" />
    <link rel="stylesheet" href="<?= base_url('assets/css/adminlte.css') ?>" />

    <!-- cdn css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" media="print" onload="this.media='all'" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"/>

    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.css" />
</head>

<body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
    <div class="app-wrapper">
        <nav class="app-header navbar navbar-expand bg-body">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                            <i class="bi bi-list"></i>
                        </a>
                    </li>
                    <li class="nav-item d-none d-md-block"><a href="#" class="nav-link"><?= $title ?></a></li>
                </ul>
                <ul class="navbar-nav ms-auto">

                    <!-- fullscreen toggle -->
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                            <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                            <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
                        </a>
                    </li>

                    <!-- user information -->
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img
                                src="<?= $imagePath ?>"
                                class="user-image rounded-circle shadow"
                                alt="User Image" />
                            <span class="d-none d-md-inline"><?= strtr($admin['FullName'], 0, 20) ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                            <li class="user-header text-bg-primary">
                                <img
                                    src="<?= $imagePath ?>"
                                    class="rounded-circle shadow"
                                    alt="User Image" />
                                <p>
                                    <?= strtr($admin['FullName'], 0, 20) ?>
                                    <small>Created At: <?= date('d-m-Y', strtotime($admin['CreatedAt'])) ?></small>
                                </p>
                            </li>
                            <li class="user-footer">
                                <!-- this modal at template/footer.php -->
                                <button type="button" data-bs-toggle="modal" data-bs-target="#modalSignOut" class="btn btn-outline-danger btn-flat float-end">Sign out</button>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>