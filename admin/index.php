<?php
require_once '../includes/config.php';

/* ============= 
 * page information
 * use for page sidebar active & page name
 ============= */
$pageName = 'Manage Admin';
$page     = 'admin';
$subPage  = 'manage-admin';

// all admins
$query = "SELECT * FROM admins";
$exec  = mysqli_query($con, $query);
?>

<!-- header -->
<?php require_once '../template/header.php' ?>

<!-- sidebar -->
<?php require_once '../template/sidebar.php' ?>

<!-- display message -->
<?php require_once '../includes/message.php' ?>

<!--Main Page-->
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0"><?= $pageName ?></h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $pageName ?></li>
                    </ol>
                </div>
            </div>

        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="container col-md-12">
                    <div class="card card-primary card-outline">

                        <div class="p-3 d-flex justify-content-between align-items-center w-100">
                            <h3 class="card-title d-flex align-items-center">
                                <i class="bi bi-people me-2"></i> List of Admin
                            </h3>
                            <a href="<?= base_url('admin/create.php')?>" class="btn btn-outline-primary"><i class="bi bi-plus"></i> Create Admin</a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Admin ID</th>
                                            <th class="text-center">Image</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Created At</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($admin = mysqli_fetch_assoc($exec)) : ?>
                                        <tr>
                                            <td class="text-center">AD-<?= esc($admin['id']) ?></td>
                                            <td class="text-center">
                                                <?php if (!empty($admin['Image'])) : ?>
                                                <img src="<?= base_url('assets/img/admin/' . $admin['Image']) ?>" alt="Admin Image" class="img-fluid" width="60" height="60" style="border-radius: 10px;">
                                                <?php else : ?>
                                                <img src="<?= base_url('assets/img/no_image.png') ?>" alt="Admin Image" class="img-fluid" width="60" height="60" style="border-radius: 10px;">
                                                <?php endif; ?>
                                            </td>
                                            <td><?= esc($admin['FullName']) ?></td>
                                            <td><?= esc($admin['Email']) ?></td>
                                            <td><?= date('d-m-Y h:i', strtotime($admin['CreatedAt'])) ?></td>
                                            <td class="text-center">
                                                <a 
                                                href="<?= base_url('admin/edit.php?id=' . encode( $admin['id'])) ?>" 
                                                class="btn btn-sm btn-info"
                                                data-bs-toggle="tooltip" 
                                                data-bs-title="Edit">
                                                    <i class="bi bi-pen text-white"></i>
                                                </a>
                                                <button
                                                type="button"
                                                class="btn btn-sm btn-danger" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#modalDelete" 
                                                data-id="<?= $admin['id'] ?>">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- modal delete > AJAX -->
                <div class="modal fade" id="modalDelete" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Delete Admin</h5>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" id="delete_id">
                                <p>Are you sure to delete admin <b> AD-<span id="delete_code">0</span></b>?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- footer -->
<?php require_once '../template/footer.php' ?>

<!-- js -->
<script src="<?= base_url('assets/js/delete-modal.js') ?>"></script>
<script>
// ajax delete modal
setupDeleteModal('func.admin.php'); // based on function file

// datatables
new DataTable('#example');

// image preview
document.getElementById('image-input').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const previewContainer = document.getElementById('preview_image');

    // Clear previous preview
    previewContainer.innerHTML = '';

    if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();

        reader.onload = function(event) {
            const img = document.createElement('img');
            img.src = event.target.result;
            img.style.maxWidth  = '100%';
            img.style.maxHeight = '100%';
            img.style.objectFit = 'contain';
            previewContainer.appendChild(img);
        };

        reader.readAsDataURL(file);
    }
});
</script>

<!-- tooltip -->
<script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');

    tooltipTriggerList.forEach((tooltipTriggerEl) => {
    new bootstrap.Tooltip(tooltipTriggerEl);
    });
</script>