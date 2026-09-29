<?php 
session_start();
require_once(__DIR__ . '/../../../../Database/db/db.php');

if(!isset($_SESSION['username'])){
  $_SESSION['username'] = "Student";
}

if(!isset($_SESSION['user_id'])){
  header("Location: ../../../authenication/login.php");
  exit();
}

$conn = get_db();
$user_id = $_SESSION['user_id'];

// Fetch user's enrolled learning paths
try {
    $stmt = $conn->prepare("
        SELECT 
            lp.id as path_id,
            lp.title,
            lp.description,
            lp.difficulty,
            lp.estimated_time,
            ulp.enrolled_at,
            ulp.status as enrollment_status,
            COUNT(DISTINCT lpc.id) as total_courses,
            COUNT(DISTINCT CASE WHEN e.progress = 100 THEN lpc.id END) as completed_courses
        FROM user_learning_paths ulp
        INNER JOIN learning_paths lp ON ulp.path_id = lp.id
        LEFT JOIN learning_path_courses lpc ON lp.id = lpc.path_id
        LEFT JOIN enrollments e ON lpc.course_id = e.course_id AND e.user_id = ulp.user_id
        WHERE ulp.user_id = :user_id
        AND lp.is_active = 1
        GROUP BY lp.id, ulp.id
        ORDER BY ulp.enrolled_at DESC
    ");
    $stmt->execute(['user_id' => $user_id]);
    $learning_paths = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Fetch courses for each path
    foreach($learning_paths as &$path) {
        $stmt = $conn->prepare("
            SELECT 
                c.id as course_id,
                c.title,
                c.description,
                lpc.order_position,
                lpc.is_required,
                e.progress,
                e.id as enrollment_id,
                CASE
                    WHEN e.progress = 100 THEN 'completed'
                    WHEN e.id IS NOT NULL THEN 'in-progress'
                    ELSE 'locked'
                END as status
            FROM learning_path_courses lpc
            INNER JOIN courses c ON lpc.course_id = c.id
            LEFT JOIN enrollments e ON c.id = e.course_id AND e.user_id = :user_id
            WHERE lpc.path_id = :path_id
            ORDER BY lpc.order_position ASC
        ");
        $stmt->execute([
            'user_id' => $user_id,
            'path_id' => $path['path_id']
        ]);
        $path['courses'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
} catch (PDOException $e) {
    error_log("Learning paths fetch error: " . $e->getMessage());
    $learning_paths = array();
}

$totalPaths = count($learning_paths);

include(__DIR__ . '/../../../includes/header/header.php');
include(__DIR__ . '/../../../includes/navbar/navbar.php');
include(__DIR__ . '/../../../includes/sidebar/sidebar.php');
?>

<div class="container-fluid py-4">
  <div class="row mb-4" data-aos="fade-down">
    <div class="col-md-8">
      <h2 class="fw-bold text-white"><i class="bi bi-signpost-2-fill"></i> My Learning Paths</h2>
      <p class="text-white-50">Follow structured paths to achieve your goals</p>
    </div>
    <div class="col-md-4 text-end">
      <span class="badge bg-primary me-2" style="font-size: 1rem;">
        <?php echo $totalPaths; ?> Active Path<?php echo $totalPaths != 1 ? 's' : ''; ?>
      </span>
      <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#browsePathsModal">
        <i class="bi bi-plus-circle"></i> Browse Learning Paths
      </button>
    </div>
  </div>

  <!-- Learning Paths -->
  <?php if($totalPaths > 0): ?>
    <?php foreach($learning_paths as $index => $path): ?>
    <div class="card mb-4 shadow-sm hover-shadow" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>">
      <div class="card-header text-white" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
        <div class="row align-items-center">
          <div class="col-md-8">
            <h4 class="mb-0"><i class="bi bi-diagram-3-fill"></i> <?php echo $path['title']; ?></h4>
            <p class="mb-0 small"><?php echo $path['description']; ?></p>
          </div>
          <div class="col-md-4 text-end">
            <span class="badge bg-light text-dark me-2"><?php echo $path['difficulty']; ?></span>
            <span class="badge bg-warning text-dark"><i class="bi bi-clock"></i> <?php echo $path['estimated_time']; ?></span>
          </div>
        </div>
      </div>
      
      <div class="card-body">
        <!-- Progress Overview -->
        <div class="row mb-4">
          <div class="col-md-6">
            <h6 class="fw-bold">Overall Progress</h6>
            <div class="progress" style="height: 25px;">
              <?php 
                $progress = round(($path['completed_courses'] / $path['total_courses']) * 100);
              ?>
              <div class="progress-bar bg-success" style="width: 0%;" data-progress="<?php echo $progress; ?>">
                <?php echo $progress; ?>%
              </div>
            </div>
            <small class="text-muted"><?php echo $path['completed_courses']; ?> of <?php echo $path['total_courses']; ?> courses completed</small>
          </div>
          <div class="col-md-6 text-end">
            <button class="btn btn-outline-primary">
              <i class="bi bi-graph-up"></i> View Analytics
            </button>
            <button class="btn btn-outline-secondary">
              <i class="bi bi-gear"></i> Settings
            </button>
          </div>
        </div>

        <!-- Course Timeline -->
        <h6 class="fw-bold mb-3">Course Roadmap</h6>
        <div class="timeline">
          <?php foreach($path['courses'] as $idx => $course): ?>
            <div class="row mb-3">
              <div class="col-md-1 text-center">
                <?php if($course['status'] == 'completed'): ?>
                  <i class="bi bi-check-circle-fill text-success" style="font-size: 2rem;"></i>
                <?php elseif($course['status'] == 'in-progress'): ?>
                  <div class="spinner-border text-primary" role="status" style="width: 2rem; height: 2rem;">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                <?php else: ?>
                  <i class="bi bi-lock-fill text-muted" style="font-size: 2rem;"></i>
                <?php endif; ?>
              </div>
                        <div class="col-md-11">
                          <div class="card">
                            <div class="card-body">
                              <div class="row align-items-center">
                                <div class="col-md-6">
                                  <h6 class="fw-bold mb-0"><?php echo htmlspecialchars($course['title']); ?></h6>
                                  <?php if($course['status'] == 'in-progress' && $course['progress']): ?>
                                    <div class="progress mt-2" style="height: 10px;">
                                      <div class="progress-bar bg-primary" style="width: <?php echo $course['progress']; ?>%"></div>
                                    </div>
                                    <small class="text-muted"><?php echo $course['progress']; ?>% complete</small>
                                  <?php endif; ?>
                                </div>
                                <div class="col-md-6 text-end">
                                  <span class="badge <?php echo $course['status'] == 'completed' ? 'bg-success' : ($course['status'] == 'in-progress' ? 'bg-primary' : 'bg-secondary'); ?> me-2">
                                    <?php echo $course['status'] == 'completed' ? 'Completed' : ($course['status'] == 'in-progress' ? 'In Progress' : 'Locked'); ?>
                                  </span>
                                  <?php if($course['status'] == 'completed'): ?>
                                    <a href="../../course-player.php?course_id=<?php echo $course['course_id']; ?>" class="btn btn-sm btn-outline-success">
                                      <i class="bi bi-eye"></i> Review
                                    </a>
                                  <?php elseif($course['status'] == 'in-progress'): ?>
                                    <a href="../../course-player.php?course_id=<?php echo $course['course_id']; ?>" class="btn btn-sm btn-primary">
                                      <i class="bi bi-play-circle"></i> Continue
                                    </a>
                                  <?php else: ?>
                                    <button class="btn btn-sm btn-secondary" disabled>
                                      <i class="bi bi-lock"></i> Locked
                                    </button>
                                  <?php endif; ?>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
  <?php else: ?>
    <div class="card text-center py-5" data-aos="fade-up">
      <div class="card-body">
        <i class="bi bi-signpost text-muted" style="font-size: 5rem;"></i>
        <h4 class="mt-3 text-muted">No Learning Paths Yet</h4>
        <p class="text-muted">Enroll in a structured learning path to achieve your career goals!</p>
        <button class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#browsePathsModal">
          <i class="bi bi-search"></i> Browse Available Paths
        </button>
      </div>
    </div>
  <?php endif; ?>

  <!-- Browse Paths Modal -->
  <div class="modal fade" id="browsePathsModal" tabindex="-1" aria-labelledby="browsePathsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="browsePathsModalLabel">
            <i class="bi bi-signpost-2 me-2"></i>Available Learning Paths
          </h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id="availablePathsList">
            <div class="text-center py-4">
              <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
              <p class="mt-2 text-muted">Loading available paths...</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
function escapePathText(value) { const node = document.createElement('span'); node.textContent = String(value ?? ''); return node.innerHTML; }

// Load available learning paths when modal opens
document.getElementById('browsePathsModal')?.addEventListener('show.bs.modal', function() {
  fetch('/lms-dashboard/My%20Learning/Activities/get_available_paths/get_available_paths.php')
    .then(response => response.json())
    .then(data => {
      const container = document.getElementById('availablePathsList');
      if(data.success && data.paths.length > 0) {
        let html = '<div class="row">';
        data.paths.forEach(path => {
          html += `
            <div class="col-md-6 mb-3">
              <div class="card h-100">
                <div class="card-body">
                  <h6 class="fw-bold">${escapePathText(path.title)}</h6>
                  <p class="small text-muted">${escapePathText(path.description)}</p>
                  <div class="mb-2">
                    <span class="badge bg-secondary">${escapePathText(path.difficulty)}</span>
                    <span class="badge bg-info ms-1">${path.total_courses} courses</span>
                    <span class="badge bg-warning text-dark ms-1">${escapePathText(path.estimated_time)}</span>
                  </div>
                  <button class="btn btn-sm btn-primary w-100 enroll-path-btn" data-path-id="${path.id}">
                    <i class="bi bi-plus-circle"></i> Enroll in Path
                  </button>
                </div>
              </div>
            </div>
          `;
        });
        html += '</div>';
        container.innerHTML = html;
        
        // Add event listeners to enroll buttons
        document.querySelectorAll('.enroll-path-btn').forEach(btn => {
          btn.addEventListener('click', function() {
            enrollInPath(this.getAttribute('data-path-id'));
          });
        });
      } else {
        container.innerHTML = '<div class="alert alert-info">No available learning paths at the moment.</div>';
      }
    })
    .catch(error => {
      console.error('Error:', error);
      document.getElementById('availablePathsList').innerHTML = '<div class="alert alert-danger">Failed to load learning paths.</div>';
    });
});

function enrollInPath(pathId) {
  if(confirm('Do you want to enroll in this learning path?')) {
    fetch('/lms-dashboard/My%20Learning/Activities/enroll_path/enroll_path.php', {
      method: 'POST',
      headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-CSRF-Token': document.querySelector('meta[name=csrf-token]').content},
      body: 'path_id=' + pathId
    })
    .then(response => response.json())
    .then(data => {
      if(data.success) {
        alert(window.twDashTranslate('Successfully enrolled in learning path!'));
        location.reload();
      } else {
        alert('Error: ' + (data.message || 'Unknown error'));
      }
    })
    .catch(error => {
      console.error('Error:', error);
      alert(window.twDashTranslate('Failed to enroll in path'));
    });
  }
}
</script>
  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
      <li class="page-item disabled">
        <a class="page-link" href="#" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
    </ul>
  </nav>
</div>

<?php include(__DIR__ . '/../../../includes/footer/footer.php'); ?>

