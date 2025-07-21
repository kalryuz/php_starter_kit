<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="<?= base_url('./') ?>" class="brand-link">
            <img
                src="<?= base_url('assets/img/AdminLTELogo.png') ?>"
                alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow" />
            <span class="brand-text fw-light"><?= $title ?></span>
        </a>
    </div>

    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul
                class="nav sidebar-menu flex-column"
                data-lte-toggle="treeview"
                role="navigation"
                aria-label="Main navigation"
                data-accordion="false"
                id="navigation">

                <!-- main -->
                <li class="nav-header">MAIN</li>

                <!-- dashboard -->
                <li class="nav-item">
                    <a href="<?= base_url('dashboard.php') ?>" class="nav-link <?= $page == 'dashboard' ? 'active' : '' ?>">
                        <i class="nav-icon bi bi-palette"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- admin -->
                <li class="nav-item <?= $page == 'admin' ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= $page == 'admin' ? 'active' : '' ?>">
                        <i class="nav-icon bi bi-people"></i>
                        <p>
                            Admin
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/create.php') ?>" class="nav-link <?= $subPage == 'create-admin' ? 'active' : '' ?>">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Create Admin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/') ?>" class="nav-link <?= $subPage == 'manage-admin' ? 'active' : '' ?>">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Manage Admin</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- setting -->
                <li class="nav-header">SETTING</li>

                <!-- template docs -->
                <li class="nav-item">
                    <a href="https://adminlte.io/themes/v3/index.html" target="_blank" class="nav-link">
                        <i class="nav-icon bi bi-palette"></i>
                        <p>Template Docs</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!--end::Sidebar-->