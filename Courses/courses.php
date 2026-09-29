<?php 
session_start();

require_once(__DIR__ . '/../Database/db/db.php');
$pdo = get_db();
$courseSearch = trim((string)($_GET['search'] ?? ''));
$courseCategory = trim((string)($_GET['category'] ?? ''));
$courseRows = [];
$courseCategories = [];
$coursePageError = '';
try {
    $courseCategories = $pdo->query("SELECT DISTINCT category FROM courses WHERE is_active = 1 AND is_published = 1 AND category IS NOT NULL AND category <> '' ORDER BY category")->fetchAll(PDO::FETCH_COLUMN);
    $sql = "SELECT c.id,c.title,c.description,c.category,c.level,c.duration,c.price,u.full_name AS instructor
            FROM courses c LEFT JOIN users u ON u.id = c.instructor_id
            WHERE c.is_active = 1 AND c.is_published = 1";
    $params = [];
    if ($courseSearch !== '') {
        $sql .= " AND (c.title LIKE ? OR c.description LIKE ? OR c.category LIKE ?)";
        $term = '%' . $courseSearch . '%';
        array_push($params, $term, $term, $term);
    }
    if ($courseCategory !== '') {
        $sql .= " AND c.category = ?";
        $params[] = $courseCategory;
    }
    $sql .= " ORDER BY c.created_at DESC, c.title ASC";
    $courseStmt = $pdo->prepare($sql);
    $courseStmt->execute($params);
    $courseRows = $courseStmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log('Public course catalogue query failed: ' . $e->getMessage());
    $coursePageError = 'The course catalogue is temporarily unavailable.';
}

include(__DIR__ . '/../includes/lang/lang.php');
include(__DIR__ . '/../includes/header/header.php');
include(__DIR__ . '/../includes/navbar/navbar.php');
include(__DIR__ . '/../includes/sidebar/sidebar.php');
?>

<!-- Course catalogue hero -->
<section class="py-5 text-white" style="background:linear-gradient(135deg,#0f766e,#22c55e)">
  <div class="container text-center"><span class="badge bg-white text-success mb-3">TECHWORLD ACADEMY</span><h1 class="fw-bold">Explore our courses</h1><p class="lead mb-0">Find practical programs for your next step.</p></div>
</section>

<section class="py-5 bg-light">
  <div class="container">
    <form method="get" class="card border-0 shadow-sm p-3 p-md-4 mb-4">
      <div class="row g-3 align-items-end">
        <div class="col-md-6"><label class="form-label" for="courseSearch">Search courses</label><input class="form-control" id="courseSearch" name="search" type="search" value="<?= htmlspecialchars($courseSearch, ENT_QUOTES, 'UTF-8') ?>" placeholder="Title, topic, or description"></div>
        <div class="col-md-4"><label class="form-label" for="courseCategory">Category</label><select class="form-select" id="courseCategory" name="category"><option value="">All categories</option><?php foreach($courseCategories as $category): ?><option value="<?= htmlspecialchars($category, ENT_QUOTES, 'UTF-8') ?>" <?= $courseCategory === $category ? 'selected' : '' ?>><?= htmlspecialchars($category, ENT_QUOTES, 'UTF-8') ?></option><?php endforeach; ?></select></div>
        <div class="col-md-2 d-flex gap-2"><button class="btn btn-success flex-grow-1" type="submit">Search</button><a class="btn btn-outline-secondary" href="/Courses/courses.php" aria-label="Clear filters"><i class="bi bi-x-lg"></i></a></div>
      </div>
    </form>
    <?php if ($coursePageError): ?><div class="alert alert-warning" role="status"><?= htmlspecialchars($coursePageError, ENT_QUOTES, 'UTF-8') ?></div><?php endif; ?>
    <div class="d-flex justify-content-between align-items-center mb-3"><h2 class="h4 mb-0">Available programs</h2><span class="text-muted"><?= number_format(count($courseRows)) ?> course<?= count($courseRows) === 1 ? '' : 's' ?></span></div>
    <div class="row g-4">
      <?php if (!$courseRows && !$coursePageError): ?><div class="col-12"><div class="card border-0 p-5 text-center"><i class="bi bi-journal-x display-5 text-muted"></i><h3 class="h5 mt-3">No courses match these filters</h3><p class="text-muted mb-0">Try another search or choose a different category.</p></div></div><?php endif; ?>
      <?php foreach ($courseRows as $course): ?>
        <div class="col-md-6 col-lg-4"><article class="card h-100 border-0 shadow-sm">
          <div class="card-body p-4 d-flex flex-column">
            <div class="d-flex justify-content-between gap-2 mb-3"><span class="badge text-bg-success"><?= htmlspecialchars($course['category'] ?: 'General', ENT_QUOTES, 'UTF-8') ?></span><span class="small text-muted"><?= htmlspecialchars($course['level'] ?: 'All levels', ENT_QUOTES, 'UTF-8') ?></span></div>
            <h3 class="h5 card-title"><?= htmlspecialchars($course['title'], ENT_QUOTES, 'UTF-8') ?></h3>
            <p class="text-muted flex-grow-1"><?= htmlspecialchars($course['description'] ?: 'Course details will be available soon.', ENT_QUOTES, 'UTF-8') ?></p>
            <ul class="list-unstyled small text-muted mb-3"><li><i class="bi bi-clock me-2"></i><?= htmlspecialchars($course['duration'] ?: 'Flexible', ENT_QUOTES, 'UTF-8') ?></li><li class="mt-1"><i class="bi bi-person me-2"></i><?= htmlspecialchars($course['instructor'] ?: 'TechWorld Academy', ENT_QUOTES, 'UTF-8') ?></li></ul>
            <div class="d-flex justify-content-between align-items-center border-top pt-3"><strong class="text-success">GHS <?= number_format((float)$course['price'], 2) ?></strong><a class="btn btn-success btn-sm" href="/enroll/enroll.php?course_id=<?= (int)$course['id'] ?>">View and enroll</a></div>
          </div>
        </article></div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="py-5 text-center text-white" style="background: linear-gradient(135deg, #2575fc 0%, #6a11cb 100%);">
  <div class="container">
    <h2 class="fw-bold mb-3">Ready to Join TecWorld Academy?</h2>
    <p class="lead mb-4">Apply today and take the first step toward your dream career.</p>
    <a href="/Admissions/General/admissions/admissions.php" class="btn btn-warning btn-lg px-5 shadow">Apply Now</a>
  </div>
</section>

<?php 
include(__DIR__ . '/../includes/footer/footer.php');
?>
