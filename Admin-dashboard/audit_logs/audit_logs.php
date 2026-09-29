<?php
require_once(__DIR__ . '/../../utils/logger/logger.php');
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    log_action('unknown', 'audit_logs_access', 'unauthorized');
    header('Location: /authenication/login/login.php');
    exit();
}
log_action($_SESSION['username'], 'audit_logs_access', 'success');
$pageTitle = 'Audit logs';
include(__DIR__ . '/../includes/header/header.php');
include(__DIR__ . '/../includes/navbar/navbar.php');
include(__DIR__ . '/../includes/sidebar/sidebar.php');
?>
<main class="main-content flex-fill">
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="card p-4 shadow">
          <h2 class="mb-4">Audit Logs</h2>
          <p class="text-muted">Recent actions recorded by the system. 
            <a href="../docs/audit_logs_guide.md" class="text-decoration-none">View documentation</a>
          </p>
          <div class="alert alert-info small">
            <strong>API Access:</strong> To programmatically fetch logs, use the JSON endpoint with your API key:
            <code>GET /api/audit_logs.php?api_key=YOUR_KEY</code>
          </div>
          <div class="mb-3 d-flex gap-2 align-items-center">
            <?php
              // Build download link with current filters
              $downloadQs = [];
              foreach (['user','action','date_from','date_to','page','per_page'] as $k) {
                if (!empty($_GET[$k])) $downloadQs[$k] = $_GET[$k];
              }
              $downloadUrl = '../api/audit_logs.php' . (count($downloadQs) ? ('?' . http_build_query($downloadQs)) : '');
            ?>
            <a class="btn btn-sm btn-outline-primary" href="<?= $downloadUrl ?>">Download JSON</a>
            <form class="d-flex" method="GET" action="">
              <input type="text" name="user" class="form-control form-control-sm" placeholder="User" value="<?= htmlspecialchars($_GET['user'] ?? '') ?>">
              <input type="text" name="action" class="form-control form-control-sm" placeholder="Action" value="<?= htmlspecialchars($_GET['action'] ?? '') ?>">
              <input type="date" name="date_from" class="form-control form-control-sm" value="<?= htmlspecialchars($_GET['date_from'] ?? '') ?>">
              <input type="date" name="date_to" class="form-control form-control-sm" value="<?= htmlspecialchars($_GET['date_to'] ?? '') ?>">
              <select name="per_page" class="form-select form-select-sm ms-2" style="width:80px;">
                <?php $pp = intval($_GET['per_page'] ?? 25); foreach ([10,25,50,100] as $opt): ?>
                  <option value="<?= $opt ?>" <?= $pp === $opt ? 'selected' : '' ?>><?= $opt ?></option>
                <?php endforeach; ?>
              </select>
              <button class="btn btn-sm btn-primary ms-2" type="submit">Filter</button>
              <a class="btn btn-sm btn-outline-secondary ms-2" href="audit_logs.php">Clear</a>
            </form>
          </div>
          <div style="max-height:400px; overflow:auto;">
            <ul class="list-group">
            <?php
              $logFile = __DIR__ . '/../../logs/audit.log';
              $lines = [];
              if (file_exists($logFile)) {
                $lines = array_reverse(file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES));
              }
              // Apply filters
              $userFilter = $_GET['user'] ?? '';
              $actionFilter = $_GET['action'] ?? '';
              $dateFrom = $_GET['date_from'] ?? '';
              $dateTo = $_GET['date_to'] ?? '';
              $filtered = [];
              foreach ($lines as $line) {
                // Expected format: YYYY-MM-DD HH:MM:SS | user | action | details
                $parts = explode(' | ', $line);
                $date = $parts[0] ?? '';
                $user = $parts[1] ?? '';
                $action = $parts[2] ?? '';
                $include = true;
                if ($userFilter && stripos($user, $userFilter) === false) $include = false;
                if ($actionFilter && stripos($action, $actionFilter) === false) $include = false;
                if ($dateFrom && $date < $dateFrom) $include = false;
                if ($dateTo && $date > $dateTo) $include = false;
                if ($include) $filtered[] = $line;
              }
              // Pagination
              $page = max(1, intval($_GET['page'] ?? 1));
              $perPage = max(10, intval($_GET['per_page'] ?? 25));
              $total = count($filtered);
              $start = ($page - 1) * $perPage;
              $paged = array_slice($filtered, $start, $perPage);
              if (count($paged) === 0) {
                echo '<li class="list-group-item">No audit logs match your filters.</li>';
              } else {
                foreach ($paged as $line) {
                  echo '<li class="list-group-item">' . htmlspecialchars($line) . '</li>';
                }
              }
            ?>
            </ul>
          </div>
          <!-- Pagination controls -->
          <nav aria-label="Audit pagination" class="mt-3">
            <ul class="pagination justify-content-end">
              <?php
                $totalPages = max(1, ceil($total / $perPage));
                $baseUrl = strtok($_SERVER['REQUEST_URI'], '?');
                parse_str($_SERVER['QUERY_STRING'] ?? '', $qs);
                for ($p = 1; $p <= $totalPages; $p++) {
                  $qs['page'] = $p;
                  $link = $baseUrl . '?' . http_build_query($qs);
                  $active = $p === $page ? ' active' : '';
                  echo "<li class='page-item$active'><a class='page-link' href='$link'>$p</a></li>";
                }
              ?>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</main>
<?php include(__DIR__ . '/../includes/footer/footer.php'); ?>
