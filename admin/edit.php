<?php
require_once '../includes/config.php';

/* ============= 
 * page information
 * use for page sidebar active & page name
 ============= */
$pageName = 'Edit Admin';
$page     = 'admin';
$subPage  = 'manage-admin';

// admin info
$id    = decode($_GET['id'] ?? '');
$id    = mysqli_real_escape_string($con, $id); //secure from SQL injection

$query = "SELECT id, FullName, Image, Email FROM admins WHERE id = '$id'";
$exec  = mysqli_query($con, $query);
$data  = mysqli_fetch_assoc($exec);

// if id not exist
if (mysqli_num_rows($exec) < 1) {
    redirect('admin/');
}
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
                                <i class="bi bi-people me-2"></i> <?= $pageName ?>
                            </h3>
                            <a href="<?= base_url('admin/')?>" class="btn btn-outline-primary">Manage Admin</a>
                        </div>

                        <form action="<?= base_url('function/func.admin.php') ?>" method="post" class="card-body" enctype="multipart/form-data">
                            <div class="row">
                                <!-- image upload -->
                                <div class="col-md-4 col-md-4">
                                    <div class="container col-lg-11">
                                        <div class="d-flex justify-content-center">
                                            <div class="border mb-3" style="width: 300px; height: 200px; border-radius:10px; overflow: hidden;">
                                                <div id="preview_image" style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
                                                    <?php if (!empty($data['Image'])) : ?>
                                                    <img src="<?= base_url('assets/img/admin/' . $data['Image']) ?>" class="img-fluid">
                                                    <?php else : ?>
                                                    <img src="<?= base_url('assets/img/no_image.png') ?>" class="img-fluid">
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <label for="" class="form-label">Image</label>
                                        <input type="file" name="image" class="form-control mb-2" id="image-input" accept="image/png, image/jpeg, image/jpg">
                                        <small class="text-danger">Noted: Empty this input if no update</small> <br>
                                        <small class="text-danger">Format: .png / .jpeg / .jpg</small>
                                    </div>
                                </div>

                                <!-- information -->
                                <div class="col-md-8">
                                    <input type="hidden" name="id" value="<?= esc($_GET['id']) ?>">
                                    <div class="form-group mb-3">
                                        <label for="" class="form-label">Full Name <span class="text-danger">*</span></label>
                                        <input type="text" name="fullName" class="form-control" value="<?= esc($data['FullName'] ?? '') ?>" placeholder="Enter full name" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="" class="form-label">Email <span class="text-danger">*</span></label>
                                        <input type="email" name="email" class="form-control" value="<?= esc($data['Email'] ?? '') ?>" placeholder="Enter email" required>
                                    </div>

                                    <div class="row">
                                        <div class="form-group mb-3 col-md-6">
                                            <label for="" class="form-label">Password <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" placeholder="Cannot Updated" disabled>
                                        </div>
                                        <div class="form-group mb-3 col-md-6">
                                            <label for="" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" placeholder="Cannot Updated" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-end mt-3">
                                <button class="btn btn-outline-secondary me-2">Reset</button>
                                <button type="submit" name="edit-admin" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- footer -->
<?php require_once '../template/footer.php' ?>

<!-- image preview -->
<script>
document.getElementById('image-input').addEventListener('change', function (e) {
    const file = e.target.files[0];
    const previewContainer = document.getElementById('preview_image');

    // Clear previous preview
    previewContainer.innerHTML = '';

    if (file && file.type.startsWith('image/')) {
    const reader = new FileReader();

    reader.onload = function (event) {
        const img = document.createElement('img');
        img.src = event.target.result;
        img.style.maxWidth = '100%';
        img.style.maxHeight = '100%';
        img.style.objectFit = 'contain';
        previewContainer.appendChild(img);
    };

    reader.readAsDataURL(file);
    }
});
</script>