<?php
require_once 'includes/config.php';

/* ============= 
 * page information
 * use for page sidebar active & page name
 ============= */
$pageName = 'Dashboard';
$page     = 'dashboard';

// total info
$q_totalAdmin       = "SELECT COUNT(*) AS total FROM admins";
$result_totalAdmin  = mysqli_query($con, $q_totalAdmin);
$totalAdmin         = mysqli_fetch_assoc($result_totalAdmin)['total'];

// log info
$q_logs      = "SELECT * FROM logs ORDER BY id DESC LIMIT 10";
$result_logs = mysqli_query($con, $q_logs);
?>

<!-- header -->
<?php require_once 'template/header.php' ?>

<!-- sidebar -->
<?php require_once 'template/sidebar.php' ?>

<!-- display message -->
<?php require_once 'includes/message.php' ?>

<!--Main Page-->
<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">

      <div class="row">
        <div class="col-sm-6"><h3 class="mb-0"><?= $pageName ?></h3></div>
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

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon text-bg-primary shadow-sm">
              <i class="bi bi-people"></i>
            </span>
            <div class="info-box-content">
              <span class="info-box-text">Total Admin</span>
              <span class="info-box-number">
                <?= $totalAdmin ?? '' ?>
              </span>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon text-bg-danger shadow-sm">
              <i class="bi bi-hand-thumbs-up-fill"></i>
            </span>
            <div class="info-box-content">
              <span class="info-box-text">Likes</span>
              <span class="info-box-number">41,410</span>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon text-bg-success shadow-sm">
              <i class="bi bi-cart-fill"></i>
            </span>
            <div class="info-box-content">
              <span class="info-box-text">Sales</span>
              <span class="info-box-number">760</span>
            </div>
          </div>
        </div>
        
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon text-bg-warning shadow-sm">
              <i class="bi bi-people-fill"></i>
            </span>
            <div class="info-box-content">
              <span class="info-box-text">New Members</span>
              <span class="info-box-number">2,000</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Logs System -->
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="p-3 d-flex justify-content-between align-items-center">
              <h3 class="card-title"><i class="bi bi-key me-2"></i> Latest Logs</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-primary btn-sm">View All </button>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="example" class="table">
                  <thead>
                    <tr>
                      <th>IP Address</th>
                      <th>Name</th>
                      <th class="text-center">Status</th>
                      <th class="text-center">Date Logs</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while ($log = mysqli_fetch_assoc($result_logs)) : ?>
                    <tr>
                      <td><?= esc($log['IP']) ?></td>
                      <td><?= esc($log['Name']) ?></td>
                      <td class="text-center">
                        <span 
                        class="badge text-bg-<?= $log['Status'] === 'success' ? 'success' : 'danger' ?>">
                          <?= esc($log['Status']) ?>
                        </span>
                      </td>
                      <td class="text-center"><?= date('d-m-Y h:i', strtotime($log['CreatedAt'])) ?></td>
                    </tr>
                    <?php endwhile; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</main>

<!-- footer -->
<?php require_once 'template/footer.php' ?>

<script>
  // datatables
  new DataTable('#example');
</script>

      
