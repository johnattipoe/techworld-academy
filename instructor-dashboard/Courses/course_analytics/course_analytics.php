<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'instructor') {
    header('Location: /authenication/login/login.php');
    exit();
}

require_once(__DIR__ . '/../../Database/db/db.php');
$pdo = get_db();
if (!$pdo) {
    die('Database connection failed');
}

$instructor_id = $_SESSION['user_id'] ?? 0;

$total_courses = 0;
$total_students = 0;
$total_assignments = 0;
$average_progress = 0;
$course_performance = [];

if ($instructor_id) {
    $stats = $pdo->prepare('SELECT COUNT(*) AS total_courses FROM courses WHERE instructor_id = ?');
    $stats->execute([$instructor_id]);
    $total_courses = (int)($stats->fetch(PDO::FETCH_ASSOC)['total_courses'] ?? 0);

    $stats = $pdo->prepare('SELECT COUNT(DISTINCT ce.user_id) AS total_students FROM enrollments ce JOIN courses c ON c.id = ce.course_id WHERE c.instructor_id = ?');
    $stats->execute([$instructor_id]);
    $total_students = (int)($stats->fetch(PDO::FETCH_ASSOC)['total_students'] ?? 0);

    $stats = $pdo->prepare('SELECT COUNT(*) AS total_assignments FROM assignments a JOIN courses c ON c.id = a.course_id WHERE c.instructor_id = ?');
    $stats->execute([$instructor_id]);
    $total_assignments = (int)($stats->fetch(PDO::FETCH_ASSOC)['total_assignments'] ?? 0);

    $stats = $pdo->prepare('SELECT AVG(ce.progress) AS average_progress FROM enrollments ce JOIN courses c ON c.id = ce.course_id WHERE c.instructor_id = ?');
    $stats->execute([$instructor_id]);
    $average_progress = round((float)($stats->fetch(PDO::FETCH_ASSOC)['average_progress'] ?? 0), 1);

    $stmt = $pdo->prepare('SELECT c.title, COUNT(ce.user_id) AS learners, ROUND(AVG(ce.progress), 1) AS progress FROM courses c LEFT JOIN enrollments ce ON ce.course_id = c.id WHERE c.instructor_id = ? GROUP BY c.id ORDER BY learners DESC, c.title ASC LIMIT 5');
    $stmt->execute([$instructor_id]);
    $course_performance = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

include(__DIR__ . '/../../includes/header/header.php');
include(__DIR__ . '/../../includes/navbar/navbar.php');
include(__DIR__ . '/../../includes/sidebar/sidebar.php');
?>
<main class="main-content flex-fill">
    <div class="container-fluid p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="mb-1">Course Analytics</h2>
                <p class="text-muted mb-0">Monitor learner activity and course performance.</p>
            </div>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="text-muted small">Total Courses</div>
                        <div class="display-6 fw-bold"><?php echo $total_courses; ?></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="text-muted small">Learners</div>
                        <div class="display-6 fw-bold"><?php echo $total_students; ?></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="text-muted small">Assignments</div>
                        <div class="display-6 fw-bold"><?php echo $total_assignments; ?></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="text-muted small">Avg. Progress</div>
                        <div class="display-6 fw-bold"><?php echo $average_progress; ?>%</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="mb-3">Course engagement</h5>
                        <canvas id="analyticsChart" height="100"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="mb-3">Top courses</h5>
                        <div class="list-group list-group-flush">
                            <?php if (empty($course_performance)): ?>
                                <div class="text-muted">No course activity yet.</div>
                            <?php else: ?>
                                <?php foreach ($course_performance as $course): ?>
                                    <div class="list-group-item px-0">
                                        <div class="d-flex justify-content-between">
                                            <span><?php echo htmlspecialchars($course['title']); ?></span>
                                            <span class="fw-semibold"><?php echo (int)($course['learners'] ?? 0); ?></span>
                                        </div>
                                        <div class="progress mt-2" style="height: 8px;">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo min(100, max(0, (float)($course['progress'] ?? 0))); ?>%"></div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const labels = <?php echo json_encode(array_map(fn($row) => $row['title'], $course_performance)); ?>;
const data = <?php echo json_encode(array_map(fn($row) => (float)($row['progress'] ?? 0), $course_performance)); ?>;

new Chart(document.getElementById('analyticsChart'), {
    type: 'bar',
    data: {
        labels: labels.length ? labels : [window.twDashTranslate('No data')],
        datasets: [{
            label: window.twDashTranslate('Average progress (%)'),
            data: data.length ? data : [0],
            backgroundColor: '#0d6efd',
            borderRadius: 6
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                max: 100
            }
        }
    }
});
</script>

<?php include(__DIR__ . '/../../includes/footer/footer.php'); ?>
