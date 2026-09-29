<?php
session_start();
require_once(__DIR__ . '/../../../includes/auth/auth.php');
require_once(__DIR__ . '/..\..\..\..\Database\db\db.php');

if(!isset($_SESSION['username'])){
  $_SESSION['username'] = "Student";
}

if(!isset($_SESSION['user_id'])){
  header("Location: ../../../authenication/login.php");
  exit();
}

$conn = get_db();
$user_id = $_SESSION['user_id'];

// Fetch downloads from database
try {
    $stmt = $conn->prepare("
        SELECT * FROM resource_downloads
        ORDER BY downloads DESC, rating DESC
    ");
    $stmt->execute();
    $downloads_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Format downloads
    $downloads = array();
    foreach($downloads_data as $dl) {
        $downloads[] = array(
            'id' => $dl['id'],
            'title' => $dl['title'],
            'type' => $dl['resource_type'],
            'format' => $dl['file_format'],
            'size' => $dl['file_size'],
            'downloads' => $dl['downloads'],
            'uploaded' => $dl['uploaded_date'],
            'category' => $dl['category'],
            'description' => $dl['description'],
            'file' => $dl['file_path'],
            'rating' => $dl['rating'],
            'pages' => $dl['pages']
        );
    }
    
} catch (PDOException $e) {
    error_log("Downloads fetch error: " . $e->getMessage());
    $downloads = array();
}

include(__DIR__ . '/..\..\..\includes\header\header.php');
include(__DIR__ . '/..\..\..\includes\navbar\navbar.php');
include(__DIR__ . '/..\..\..\includes\sidebar\sidebar.php');
?>
<div class="container-fluid py-4">
  <!-- Page Header -->
  <div class="row mb-4" data-aos="fade-down">
    <div class="col-md-8">
      <h2 class="fw-bold text-white"><i class="bi bi-download"></i> Downloads</h2>
      <p class="text-white-50">Browse and download e-books, whitepapers, and research materials</p>
    </div>
    <div class="col-md-4 text-end">
      <button class="btn btn-success btn-lg">
        <i class="bi bi-file-zip"></i> Download All (ZIP)
      </button>
    </div>
  </div>
  <!-- Statistics -->
  <div class="row mb-4">
    <div class="col-md-3" data-aos="zoom-in" data-aos-delay="100">
      <div class="card bg-primary text-white stat-card">
        <div class="card-body text-center">
          <i class="bi bi-file-earmark-arrow-down-fill" style="font-size: 2.5rem;"></i>
          <h3 class="fw-bold mt-2 counter" data-target="<?php echo count($downloads); ?>">0</h3>
          <p class="mb-0">Available Downloads</p>
        </div>
      </div>
    </div>
    <div class="col-md-3" data-aos="zoom-in" data-aos-delay="200">
      <div class="card bg-success text-white stat-card">
        <div class="card-body text-center">
          <i class="bi bi-cloud-download-fill" style="font-size: 2.5rem;"></i>
          <h3 class="fw-bold mt-2 counter" data-target="<?php echo array_sum(array_column($downloads, 'downloads')); ?>">0</h3>
          <p class="mb-0">Total Downloads</p>
        </div>
      </div>
    </div>
    <div class="col-md-3" data-aos="zoom-in" data-aos-delay="300">
      <div class="card bg-warning text-white stat-card">
        <div class="card-body text-center">
          <i class="bi bi-book-fill" style="font-size: 2.5rem;"></i>
          <h3 class="fw-bold mt-2 counter" data-target="<?php echo count(array_filter($downloads, function($d){ return $d['type'] == 'E-Book'; })); ?>">0</h3>
          <p class="mb-0">E-Books</p>
        </div>
      </div>
    </div>
    <div class="col-md-3" data-aos="zoom-in" data-aos-delay="400">
      <div class="card bg-info text-white stat-card">
        <div class="card-body text-center">
          <i class="bi bi-file-text-fill" style="font-size: 2.5rem;"></i>
          <h3 class="fw-bold mt-2 counter" data-target="<?php echo count(array_filter($downloads, function($d){ return $d['type'] == 'Whitepaper'; })); ?>">0</h3>
          <p class="mb-0">Whitepapers</p>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <!-- Filters -->
    <div class="col-lg-3 mb-4">
      <div class="card shadow-sm" data-aos="fade-right">
        <div class="card-header bg-primary text-white">
          <h5 class="mb-0"><i class="bi bi-funnel-fill"></i> Filters</h5>
        </div>
        <div class="card-body">
          <!-- Search -->
          <div class="mb-3">
            <input type="text" class="form-control" placeholder="Search downloads...">
          </div>
          <!-- Type -->
          <div class="mb-3">
            <label class="fw-bold mb-2">Type</label>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="ebook">
              <label class="form-check-label" for="ebook">E-Books</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="whitepaper">
              <label class="form-check-label" for="whitepaper">Whitepapers</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="research">
              <label class="form-check-label" for="research">Research Papers</label>
            </div>
          </div>

          <!-- Category -->
          <div class="mb-3">
            <label class="fw-bold mb-2">Category</label>
            <select class="form-select">
              <option>All Categories</option>
              <option>Programming</option>
              <option>Web Development</option>
              <option>Data Science</option>
              <option>AI & ML</option>
            </select>
          </div>

          <!-- Sort -->
          <div class="mb-3">
            <label class="fw-bold mb-2">Sort By</label>
            <select class="form-select">
              <option>Most Downloaded</option>
              <option>Newest First</option>
              <option>Highest Rated</option>
              <option>Title (A-Z)</option>
            </select>
          </div>

          <button class="btn btn-outline-danger w-100">Clear Filters</button>
        </div>
      </div>

      <!-- Popular Downloads -->
      <div class="card shadow-sm mt-4" data-aos="fade-right" data-aos-delay="100">
        <div class="card-header bg-success text-white">
          <h6 class="mb-0"><i class="bi bi-trophy-fill"></i> Most Downloaded</h6>
        </div>
        <div class="list-group list-group-flush">
          <a href="#" class="list-group-item list-group-item-action">
            <i class="bi bi-download me-2"></i> JavaScript Reference
            <span class="badge bg-primary float-end">5.1K</span>
          </a>
          <a href="#" class="list-group-item list-group-item-action">
            <i class="bi bi-download me-2"></i> Web Dev Guide
            <span class="badge bg-primary float-end">4.2K</span>
          </a>
          <a href="#" class="list-group-item list-group-item-action">
            <i class="bi bi-download me-2"></i> Data Science
            <span class="badge bg-primary float-end">3.9K</span>
          </a>
        </div>
      </div>
    </div>

    <!-- Downloads Grid -->
    <div class="col-lg-9">
      <div class="d-flex justify-content-between align-items-center mb-3" data-aos="fade-left">
        <span class="text-white">Showing <strong><?php echo count($downloads); ?></strong> downloads</span>
        <div class="btn-group">
          <button class="btn btn-sm btn-outline-light active"><i class="bi bi-grid-3x3-gap"></i></button>
          <button class="btn btn-sm btn-outline-light"><i class="bi bi-list"></i></button>
        </div>
      </div>

      <div class="row">
        <?php foreach($downloads as $index => $download): ?>
          <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="<?php echo ($index % 3) * 100; ?>">
            <div class="card h-100 shadow-sm hover-shadow">
              <!-- Download Icon -->
              <div class="card-body text-center pt-4">
                <i class="bi bi-file-earmark-pdf-fill text-danger" style="font-size: 4rem;"></i>
                <span class="position-absolute top-0 end-0 m-3 badge bg-primary"><?php echo $download['type']; ?></span>
              </div>

              <div class="card-body pt-0">
                <span class="badge bg-secondary mb-2"><?php echo $download['category']; ?></span>
                <h5 class="card-title fw-bold"><?php echo $download['title']; ?></h5>
                <p class="small text-muted mb-3"><?php echo $download['description']; ?></p>

                <!-- Download Details -->
                <div class="small mb-3">
                  <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted"><i class="bi bi-file-earmark"></i> Format:</span>
                    <strong><?php echo $download['format']; ?></strong>
                  </div>
                  <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted"><i class="bi bi-hdd"></i> Size:</span>
                    <strong><?php echo $download['size']; ?></strong>
                  </div>
                  <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted"><i class="bi bi-file-text"></i> Pages:</span>
                    <strong><?php echo $download['pages']; ?></strong>
                  </div>
                  <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted"><i class="bi bi-download"></i> Downloads:</span>
                    <strong><?php echo number_format($download['downloads']); ?></strong>
                  </div>
                </div>

                <!-- Rating -->
                <div class="d-flex align-items-center mb-3">
                  <span class="text-warning me-2">
                    <?php for($i=0; $i<5; $i++): ?>
                      <i class="bi bi-star-fill"></i>
                    <?php endfor; ?>
                  </span>
                  <strong><?php echo $download['rating']; ?></strong>
                </div>

                <div class="d-grid gap-2">
                  <a href="#" class="btn btn-success btn-sm">
                    <i class="bi bi-download"></i> Download Now
                  </a>
                  <button class="btn btn-outline-primary btn-sm">
                    <i class="bi bi-eye"></i> Preview
                  </button>
                </div>
              </div>

              <div class="card-footer bg-light small text-muted">
                <i class="bi bi-calendar"></i> Added: <?php echo date('M d, Y', strtotime($download['uploaded'])); ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- Pagination -->
      <div class="row mt-4">
        <div class="col-12">
          <nav>
            <ul class="pagination justify-content-center">
              <li class="page-item disabled">
                <a class="page-link" href="#"><i class="bi bi-chevron-left"></i></a>
              </li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#"><i class="bi bi-chevron-right"></i></a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include(__DIR__ . '/..\..\..\includes\footer\footer.php'); ?>
