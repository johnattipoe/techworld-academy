<?php
// course_analytics.php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header('Location: /authenication/login/login.php');
    exit();
}

require_once(__DIR__ . '/../../../Database/db/db.php');
$pdo = get_db();
if (!$pdo) {
    die('Database connection failed');
}

try {
    // Basic analytics from courses
    $analytics_stmt = $pdo->query("SELECT
        COUNT(*) AS total_courses,
        SUM(CASE WHEN status LIKE '%active%' THEN 1 ELSE 0 END) AS active_courses,
        SUM(CASE WHEN status LIKE '%Paused%' THEN 1 ELSE 0 END) AS paused_courses,
        SUM(CASE WHEN status LIKE '%Archived%' THEN 1 ELSE 0 END) AS archived_courses
        FROM courses");
    $analytics = $analytics_stmt->fetch(PDO::FETCH_ASSOC);

    // Total enrolled, average and max enrollment per course (from enrollments table)
    $total_enrolled_stmt = $pdo->query("SELECT COUNT(*) AS total_enrolled FROM enrollments");
    $total_enrolled = $total_enrolled_stmt->fetch(PDO::FETCH_ASSOC)['total_enrolled'] ?? 0;

    $avg_stmt = $pdo->query("SELECT AVG(cnt) AS avg_enrollment FROM (SELECT COUNT(*) AS cnt FROM enrollments GROUP BY course_id) AS t");
    $avg_enrollment = $avg_stmt->fetch(PDO::FETCH_ASSOC)['avg_enrollment'] ?? 0;

    $max_stmt = $pdo->query("SELECT MAX(cnt) AS max_enrollment FROM (SELECT COUNT(*) AS cnt FROM enrollments GROUP BY course_id) AS t");
    $max_enrollment = $max_stmt->fetch(PDO::FETCH_ASSOC)['max_enrollment'] ?? 0;

    // Top courses by enrollment
    $top_courses_stmt = $pdo->query("SELECT c.id, c.title, COALESCE(u.full_name, u.username, 'Unknown') AS instructor, 
        (SELECT COUNT(*) FROM enrollments e WHERE e.course_id = c.id) AS enrolled_count, c.status
        FROM courses c
        LEFT JOIN users u ON u.id = c.instructor_id
        ORDER BY enrolled_count DESC
        LIMIT 5");
    $top_courses = $top_courses_stmt->fetchAll(PDO::FETCH_ASSOC);

    // Recent courses
    $recent_stmt = $pdo->query("SELECT c.id, c.title, COALESCE(u.full_name, u.username, 'Unknown') AS instructor, c.status, c.created_at, 
        (SELECT COUNT(*) FROM enrollments e WHERE e.course_id = c.id) AS enrolled_count
        FROM courses c
        LEFT JOIN users u ON u.id = c.instructor_id
        ORDER BY c.created_at DESC
        LIMIT 5");
    $recent_courses = $recent_stmt->fetchAll(PDO::FETCH_ASSOC);

    // Monthly enrollment (by enrollment created_at)
    $monthly_stmt = $pdo->query("SELECT DATE_FORMAT(created_at, '%Y-%m') AS month, COUNT(*) AS count FROM enrollments GROUP BY month ORDER BY month DESC LIMIT 12");
    $monthly_result = $monthly_stmt->fetchAll(PDO::FETCH_ASSOC);

    // Status distribution
    $status_stmt = $pdo->query("SELECT status, COUNT(*) AS count FROM courses GROUP BY status");
    $status_result = $status_stmt->fetchAll(PDO::FETCH_ASSOC);

    // Instructor statistics (courses and total enrolled)
    $instructor_stmt = $pdo->query("SELECT COALESCE(u.full_name, u.username, 'Unknown') AS instructor, COUNT(DISTINCT c.id) AS course_count, COUNT(e.id) AS total_enrolled
        FROM courses c
        LEFT JOIN users u ON u.id = c.instructor_id
        LEFT JOIN enrollments e ON e.course_id = c.id
        GROUP BY u.id
        ORDER BY total_enrolled DESC
        LIMIT 8");
    $instructor_result = $instructor_stmt->fetchAll(PDO::FETCH_ASSOC);
    // Map some analytics values into $analytics for template compatibility
    $analytics['total_enrolled'] = $total_enrolled;
    $analytics['avg_enrollment'] = $avg_enrollment;
    $analytics['max_enrollment'] = $max_enrollment;
    $analytics['total_capacity'] = 0;
} catch (Exception $e) {
    // In case of query errors, show a minimal friendly message
    $analytics = ['total_courses' => 0, 'active_courses' => 0, 'paused_courses' => 0, 'archived_courses' => 0];
    $total_enrolled = 0;
    $avg_enrollment = 0;
    $max_enrollment = 0;
    $top_courses = [];
    $recent_courses = [];
    $monthly_result = [];
    $status_result = [];
    $instructor_result = [];
}

$pageTitle = 'Course analytics';

include(__DIR__ . '/../../includes/header/header.php');
include(__DIR__ . '/../../includes/navbar/navbar.php');
include(__DIR__ . '/../../includes/sidebar/sidebar.php');
?>

<main class="main-content flex-fill">
    <div class="container-fluid p-4">
        <h2>Course Analytics Dashboard</h2>

        <!-- Key Metrics -->
        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <div class="card p-4 shadow-sm">
                    <h6 class="text-muted mb-2">Total Courses</h6>
                    <h3 class="mb-2"><?php echo htmlspecialchars($analytics['total_courses']); ?></h3>
                    <p class="text-muted small">All courses in the system</p>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card p-4 shadow-sm">
                    <h6 class="text-muted mb-2">Active Courses</h6>
                    <h3 class="mb-2" style="color: #198754;"><?php echo htmlspecialchars($analytics['active_courses']); ?></h3>
                    <p class="text-muted small">Currently running</p>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card p-4 shadow-sm">
                    <h6 class="text-muted mb-2">Total Enrolled</h6>
                    <h3 class="mb-2" style="color: #0d6efd;"><?php echo htmlspecialchars($analytics['total_enrolled']); ?></h3>
                    <p class="text-muted small">Students across all courses</p>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card p-4 shadow-sm">
                    <h6 class="text-muted mb-2">Total Capacity</h6>
                    <h3 class="mb-2" style="color: #ffc107;"><?php echo htmlspecialchars($analytics['total_capacity']); ?></h3>
                    <p class="text-muted small">Maximum students allowed</p>
                </div>
            </div>
        </div>

        <!-- Secondary Metrics -->
        <div class="row mb-4">
            <div class="col-md-4 mb-3">
                <div class="card p-4 shadow-sm">
                    <h6 class="text-muted mb-2">Average Enrollment</h6>
                    <h3><?php echo htmlspecialchars(round($analytics['avg_enrollment'], 1)); ?></h3>
                    <p class="text-muted small">Per course average</p>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card p-4 shadow-sm">
                    <h6 class="text-muted mb-2">Paused Courses</h6>
                    <h3 style="color: #ffc107;"><?php echo htmlspecialchars($analytics['paused_courses']); ?></h3>
                    <p class="text-muted small">Temporarily stopped</p>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card p-4 shadow-sm">
                    <h6 class="text-muted mb-2">Highest Enrollment</h6>
                    <h3><?php echo htmlspecialchars($analytics['max_enrollment']); ?></h3>
                    <p class="text-muted small">Single course record</p>
                </div>
            </div>
        </div>

        <!-- Top Courses Table -->
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h5 class="mb-3">Top 5 Courses by Enrollment</h5>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Course Name</th>
                            <th>Instructor</th>
                            <th>Enrolled</th>
                            <th>Capacity</th>
                            <th>Utilization %</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($top_courses)) {
                            foreach ($top_courses as $row) {
                                $utilization = (isset($row['capacity']) && $row['capacity'] > 0) ? round(($row['enrolled_count'] / $row['capacity']) * 100) : 0;
                                $status_color = (stripos($row['status'] ?? '', 'active') !== false) ? 'success' : 'warning';
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['title'] ?? $row['name'] ?? '') . "</td>";
                                echo "<td>" . htmlspecialchars($row['instructor'] ?? '') . "</td>";
                                echo "<td>" . htmlspecialchars($row['enrolled_count'] ?? 0) . "</td>";
                                echo "<td>" . htmlspecialchars($row['capacity'] ?? 'N/A') . "</td>";
                                echo "<td><div style='background-color: #e9ecef; border-radius: 5px; padding: 5px;'><span style='font-weight: bold;'>" . $utilization . "%</span></div></td>";
                                echo "<td><span class='badge bg-" . $status_color . "'>" . htmlspecialchars($row['status'] ?? '') . "</span></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center'>No courses found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Instructor Statistics -->
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="mb-3">Instructor Statistics</h5>
                        <table class="table table-sm table-hover">
                            <thead>
                                <tr>
                                    <th>Instructor</th>
                                    <th>Courses</th>
                                    <th>Total Enrolled</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($instructor_result)) {
                                    foreach ($instructor_result as $row) {
                                        echo "<tr>";
                                        echo "<td>" . htmlspecialchars($row['instructor']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['course_count']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['total_enrolled']) . "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='3' class='text-center'>No data available</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Course Status Distribution -->
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="mb-3">Course Status Distribution</h5>
                        <table class="table table-sm table-hover">
                            <thead>
                                <tr>
                                    <th>Status</th>
                                    <th>Count</th>
                                    <th>Percentage</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total = 0;
                                $status_data = [];
                                if (!empty($status_result)) {
                                    foreach ($status_result as $row) {
                                        $total += $row['count'];
                                        $status_data[] = $row;
                                    }
                                    foreach ($status_data as $row) {
                                        $percentage = ($total > 0) ? round(($row['count'] / $total) * 100) : 0;
                                        $color = (stripos($row['status'], 'active') !== false) ? '#198754' : ((stripos($row['status'], 'paused') !== false) ? '#ffc107' : '#6c757d');
                                        echo "<tr>";
                                        echo "<td><span style='display: inline-block; width: 12px; height: 12px; background-color: " . $color . "; border-radius: 50%; margin-right: 8px;'></span>" . htmlspecialchars($row['status']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['count']) . "</td>";
                                        echo "<td>" . $percentage . "%</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='3' class='text-center'>No data available</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Courses -->
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="mb-3">Recently Added Courses</h5>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Course Name</th>
                            <th>Instructor</th>
                            <th>Status</th>
                            <th>Enrolled</th>
                            <th>Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($recent_courses)) {
                            foreach ($recent_courses as $row) {
                                $status_color = (stripos($row['status'] ?? '', 'active') !== false) ? 'success' : 'warning';
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['title'] ?? $row['name'] ?? '') . "</td>";
                                echo "<td>" . htmlspecialchars($row['instructor'] ?? '') . "</td>";
                                echo "<td><span class='badge bg-" . $status_color . "'>" . htmlspecialchars($row['status'] ?? '') . "</span></td>";
                                echo "<td>" . htmlspecialchars($row['enrolled_count'] ?? 0) . "</td>";
                                echo "<td>" . date('M d, Y H:i', strtotime($row['created_at'] ?? 'now')) . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5' class='text-center'>No courses found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php 
include(__DIR__ . '/../../includes/footer/footer.php');
?>