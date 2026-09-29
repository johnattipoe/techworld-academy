<?php
session_start();
require_once(__DIR__ . '/../includes/auth/auth.php');
// Learner overview from database
require_once(__DIR__ . '/../includes/db/db.php');
$pdo = get_db();
$userId = (int)$_SESSION['user_id'];

$courseQuery = $pdo->prepare("SELECT c.id,c.title,c.description,c.category,c.level,e.progress,e.status AS enrollment_status,COALESCE(u.full_name,u.username,'TechWorld Academy') AS instructor,
 (SELECT COUNT(*) FROM course_modules cm JOIN course_lessons cl ON cl.module_id=cm.id WHERE cm.course_id=c.id AND cm.is_active=1 AND cl.is_active=1) AS total_lessons,
 (SELECT COUNT(*) FROM course_modules cm JOIN course_lessons cl ON cl.module_id=cm.id JOIN lesson_progress lp ON lp.lesson_id=cl.id AND lp.user_id=e.user_id AND lp.status='completed' WHERE cm.course_id=c.id AND cm.is_active=1 AND cl.is_active=1) AS completed_lessons,
 (SELECT cl.title FROM course_modules cm JOIN course_lessons cl ON cl.module_id=cm.id LEFT JOIN lesson_progress lp ON lp.lesson_id=cl.id AND lp.user_id=e.user_id AND lp.status='completed' WHERE cm.course_id=c.id AND cm.is_active=1 AND cl.is_active=1 AND lp.id IS NULL ORDER BY cm.order_number,cl.order_number,cl.id LIMIT 1) AS next_lesson
 FROM enrollments e JOIN courses c ON c.id=e.course_id LEFT JOIN users u ON u.id=c.instructor_id WHERE e.user_id=? AND e.status IN ('active','completed') ORDER BY e.updated_at DESC");
$courseQuery->execute([$userId]);
$enrolled_courses = $courseQuery->fetchAll(PDO::FETCH_ASSOC);
foreach ($enrolled_courses as &$course) {
    $course['progress'] = (float)($course['progress'] ?? 0);
    $course['total_lessons'] = (int)($course['total_lessons'] ?? 0);
    $course['completed_lessons'] = (int)($course['completed_lessons'] ?? 0);
    $course['color'] = 'primary';
    $course['next_lesson'] = $course['next_lesson'] ?: 'All available lessons completed';
}
unset($course);

$progressQuery = $pdo->prepare("SELECT COALESCE(SUM(lp.time_spent),0) AS seconds_studied,COUNT(DISTINCT CASE WHEN lp.updated_at >= DATE_SUB(CURDATE(),INTERVAL 6 DAY) THEN DATE(lp.updated_at) END) AS active_days FROM lesson_progress lp WHERE lp.user_id=?");
$progressQuery->execute([$userId]);
$learningTime = $progressQuery->fetch(PDO::FETCH_ASSOC) ?: [];
$certificateQuery = $pdo->prepare('SELECT COUNT(*) FROM certificates WHERE user_id=?');
$certificateQuery->execute([$userId]);
$assignmentQuery = $pdo->prepare("SELECT COUNT(*) FROM assignments a JOIN enrollments e ON e.course_id=a.course_id AND e.user_id=? AND e.status='active' WHERE a.due_date>=CURDATE() AND NOT EXISTS(SELECT 1 FROM assignment_submissions s WHERE s.assignment_id=a.id AND s.user_id=e.user_id)");
$assignmentQuery->execute([$userId]);
$scoreQuery = $pdo->prepare("SELECT AVG(points_earned) FROM assignment_submissions WHERE user_id=? AND status='graded'");
$scoreQuery->execute([$userId]);
$completedCourses = count(array_filter($enrolled_courses, static fn($course) => $course['enrollment_status'] === 'completed' || $course['progress'] >= 100));
$user_stats = [
 'total_courses'=>count($enrolled_courses), 'completed_courses'=>$completedCourses,
 'in_progress'=>max(0,count($enrolled_courses)-$completedCourses), 'certificates'=>(int)$certificateQuery->fetchColumn(),
 'study_hours'=>round(((int)($learningTime['seconds_studied']??0))/3600,1), 'current_streak'=>(int)($learningTime['active_days']??0),
 'assignments_pending'=>(int)$assignmentQuery->fetchColumn(), 'average_score'=>round((float)($scoreQuery->fetchColumn()??0),1)
];

$overallProgress = $user_stats['total_courses'] > 0 ? (int)round(($user_stats['completed_courses'] / $user_stats['total_courses']) * 100) : 0;
$activityQuery = $pdo->prepare("SELECT * FROM (
 SELECT _utf8mb4'lesson_completed' COLLATE utf8mb4_unicode_ci AS type,CONVERT(CONCAT(_utf8mb4'Completed: ',cl.title) USING utf8mb4) COLLATE utf8mb4_unicode_ci AS title,CONVERT(c.title USING utf8mb4) COLLATE utf8mb4_unicode_ci AS course,lp.updated_at AS occurred_at,_utf8mb4'check-circle-fill' COLLATE utf8mb4_unicode_ci AS icon,_utf8mb4'success' COLLATE utf8mb4_unicode_ci AS color FROM lesson_progress lp JOIN course_lessons cl ON cl.id=lp.lesson_id JOIN course_modules cm ON cm.id=cl.module_id JOIN courses c ON c.id=cm.course_id WHERE lp.user_id=? AND lp.status='completed'
 UNION ALL
 SELECT _utf8mb4'assignment_submitted' COLLATE utf8mb4_unicode_ci AS type,CONVERT(CONCAT(_utf8mb4'Submitted: ',a.title) USING utf8mb4) COLLATE utf8mb4_unicode_ci AS title,CONVERT(c.title USING utf8mb4) COLLATE utf8mb4_unicode_ci AS course,s.submitted_at AS occurred_at,_utf8mb4'file-earmark-check' COLLATE utf8mb4_unicode_ci AS icon,_utf8mb4'primary' COLLATE utf8mb4_unicode_ci AS color FROM assignment_submissions s JOIN assignments a ON a.id=s.assignment_id JOIN courses c ON c.id=a.course_id WHERE s.user_id=?
) activity ORDER BY occurred_at DESC LIMIT 5");
$activityQuery->execute([$userId,$userId]);
$recent_activities = array_map(static function($row){$row['time']=date('M j, Y',strtotime($row['occurred_at']));return $row;},$activityQuery->fetchAll(PDO::FETCH_ASSOC));

$deadlineQuery = $pdo->prepare("SELECT a.title,c.title AS course,a.due_date,DATEDIFF(a.due_date,CURDATE()) AS days_left,'assignment' AS type FROM assignments a JOIN courses c ON c.id=a.course_id JOIN enrollments e ON e.course_id=c.id AND e.user_id=? AND e.status='active' WHERE a.due_date>=CURDATE() AND NOT EXISTS(SELECT 1 FROM assignment_submissions s WHERE s.assignment_id=a.id AND s.user_id=e.user_id) ORDER BY a.due_date LIMIT 5");
$deadlineQuery->execute([$userId]);
$upcoming_deadlines = $deadlineQuery->fetchAll(PDO::FETCH_ASSOC);
$recommendationQuery = $pdo->prepare("SELECT c.id,c.title,c.description,c.level,(SELECT COUNT(*) FROM enrollments e WHERE e.course_id=c.id) AS students,(SELECT COALESCE(AVG(r.rating),0) FROM course_reviews r WHERE r.course_id=c.id) AS rating FROM courses c WHERE c.is_active=1 AND c.is_published=1 AND NOT EXISTS(SELECT 1 FROM enrollments e WHERE e.course_id=c.id AND e.user_id=?) ORDER BY students DESC,c.created_at DESC LIMIT 3");
$recommendationQuery->execute([$userId]);
$recommended_courses = $recommendationQuery->fetchAll(PDO::FETCH_ASSOC);
$badgeQuery = $pdo->prepare('SELECT b.name FROM user_badges ub JOIN badges b ON b.id=ub.badge_id WHERE ub.user_id=? ORDER BY ub.awarded_at DESC LIMIT 4');
$badgeQuery->execute([$userId]);
$achievements = array_map(static fn($badge)=>['name'=>$badge['name'],'icon'=>'award-fill','color'=>'warning','earned'=>true],$badgeQuery->fetchAll(PDO::FETCH_ASSOC));$current_page = basename($_SERVER['PHP_SELF']);

function isActive(string $page, string $current): string {
  return $page === $current ? 'active' : '';
}


include(__DIR__ . '/../includes/header/header.php');
include(__DIR__ . '/../includes/sidebar/sidebar.php');
include(__DIR__ . '/../includes/navbar/navbar.php');

?>
<!-- Dashboard Section -->
<div class="container py-4">
  <!-- Welcome Header -->
  <div class="welcome-section text-center" data-aos="fade-down">
    <h2 class="fw-bold text-primary mb-2">Welcome back, <?php echo htmlspecialchars($_SESSION['username']); ?></h2>
    <p class="lead text-muted mb-0">You're making great progress. Keep up the excellent work!</p>
  </div>

  <!-- Statistics Overview -->
  <div class="row mb-4">
    <div class="col-lg-3 col-md-6 mb-3" data-aos="fade-up" data-aos-delay="100">
      <div class="card shadow-sm border-0 h-100 stat-card">
        <div class="card-body text-center">
          <i class="bi bi-book-fill display-4 text-primary mb-2"></i>
          <h3 class="fw-bold mb-0 counter" data-target="<?php echo $user_stats['total_courses']; ?>">0</h3>
          <p class="text-muted small mb-0">Active Courses</p>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-3" data-aos="fade-up" data-aos-delay="200">
      <div class="card shadow-sm border-0 h-100 stat-card">
        <div class="card-body text-center">
          <i class="bi bi-check-circle-fill display-4 text-success mb-2"></i>
          <h3 class="fw-bold mb-0 counter" data-target="<?php echo $user_stats['completed_courses']; ?>">0</h3>
          <p class="text-muted small mb-0">Completed</p>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-3" data-aos="fade-up" data-aos-delay="300">
      <div class="card shadow-sm border-0 h-100 stat-card">
        <div class="card-body text-center">
          <i class="bi bi-clock-fill display-4 text-warning mb-2"></i>
          <h3 class="fw-bold mb-0"><span class="counter" data-target="<?php echo $user_stats['study_hours']; ?>">0</span>h</h3>
          <p class="text-muted small mb-0">Study Time</p>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-3" data-aos="fade-up" data-aos-delay="400">
      <div class="card shadow-sm border-0 h-100 stat-card">
        <div class="card-body text-center">
          <i class="bi bi-fire display-4 text-danger mb-2"></i>
          <h3 class="fw-bold mb-0 counter" data-target="<?php echo $user_stats['current_streak']; ?>">0</h3>
          <p class="text-muted small mb-0">Day Streak</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Quick Actions -->
  <div class="row text-center mb-4">
    <div class="col-md-3 col-sm-6 mb-3" data-aos="zoom-in" data-aos-delay="100">
      <a href="#" class="text-decoration-none">
        <div class="card shadow-sm border-0 h-100 hover-shadow">
          <div class="card-body">
            <i class="bi bi-grid-3x3-gap-fill fs-1 text-primary mb-3 float-animation"></i>
            <h6 class="fw-bold">Browse Courses</h6>
            <p class="text-muted small mb-0">Explore new courses</p>
          </div>
        </div>
      </a>
    </div>

    <div class="col-md-3 col-sm-6 mb-3" data-aos="zoom-in" data-aos-delay="200">
      <a href="#" class="text-decoration-none">
        <div class="card shadow-sm border-0 h-100 hover-shadow">
          <div class="card-body">
            <i class="bi bi-folder-fill fs-1 text-success mb-3 float-animation"></i>
            <h6 class="fw-bold">My Resources</h6>
            <p class="text-muted small mb-0">Study materials</p>
          </div>
        </div>
      </a>
    </div>

    <div class="col-md-3 col-sm-6 mb-3" data-aos="zoom-in" data-aos-delay="300">
      <a href="#" class="text-decoration-none">
        <div class="card shadow-sm border-0 h-100 hover-shadow">
          <div class="card-body">
            <i class="bi bi-award-fill fs-1 text-warning mb-3 float-animation"></i>
            <h6 class="fw-bold">Certificates</h6>
            <p class="text-muted small mb-0">View achievements</p>
          </div>
        </div>
      </a>
    </div>

    <div class="col-md-3 col-sm-6 mb-3" data-aos="zoom-in" data-aos-delay="400">
      <a href="#" class="text-decoration-none">
        <div class="card shadow-sm border-0 h-100 hover-shadow">
          <div class="card-body">
            <i class="bi bi-person-circle fs-1 text-info mb-3 float-animation"></i>
            <h6 class="fw-bold">My Profile</h6>
            <p class="text-muted small mb-0">Manage account</p>
          </div>
        </div>
      </a>
    </div>
  </div>

  <!-- Main Content Row -->
  <div class="row">
    <!-- Left Column: Courses and Deadlines -->
    <div class="col-lg-8">
      <!-- Continue Learning Section -->
      <div class="mb-4" id="courses">
        <div class="d-flex justify-content-between align-items-center mb-3" data-aos="fade-right">
          <h4 class="fw-bold text-white mb-0"><i class="bi bi-play-circle-fill"></i> Continue Learning</h4>
          <a href="#" class="btn btn-sm btn-light">View All <i class="bi bi-arrow-right"></i></a>
        </div>

        <div class="row">
          <?php foreach($enrolled_courses as $index => $course): ?>
            <div class="col-md-6 mb-3" data-aos="fade-up" data-aos-delay="<?php echo ($index + 1) * 100; ?>">
              <div class="card shadow-sm border-0 h-100 course-card">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-start mb-2">
                    <h5 class="fw-bold mb-0"><?php echo htmlspecialchars($course['title']); ?></h5>
                    <span class="badge bg-<?php echo $course['color']; ?>"><?php echo $course['progress']; ?>%</span>
                  </div>

                  <p class="text-muted small mb-2"><?php echo htmlspecialchars($course['description']); ?></p>

                  <div class="mb-3">
                    <div class="progress" style="height: 8px;">
                      <div class="progress-bar bg-<?php echo $course['color']; ?>" style="width: 0%;" data-progress="<?php echo $course['progress']; ?>"></div>
                    </div>
                    <p class="text-muted small mt-1 mb-0">
                      <?php echo $course['completed_lessons']; ?> / <?php echo $course['total_lessons']; ?> lessons
                    </p>
                  </div>

                  <div class="mb-3 small">
                    <p class="mb-1 text-muted">
                      <i class="bi bi-person"></i> <?php echo htmlspecialchars($course['instructor']); ?>
                    </p>
                    <p class="mb-0 fw-semibold text-primary">
                      <i class="bi bi-play-circle"></i> Next: <?php echo htmlspecialchars($course['next_lesson']); ?>
                    </p>
                  </div>

                  <a href="/lms-dashboard/course-player/course-player.php?course_id=<?php echo (int)$course['id']; ?>" class="btn btn-outline-primary btn-sm w-100">
                    <i class="bi bi-arrow-right-circle"></i> Continue
                  </a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Upcoming Deadlines -->
      <div class="card shadow-sm border-0 mb-4" data-aos="fade-up">
        <div class="card-body">
          <h5 class="fw-bold mb-3 text-primary">
            <i class="bi bi-calendar-event"></i> Upcoming Deadlines
          </h5>

          <?php if(count($upcoming_deadlines) > 0): ?>
            <?php foreach($upcoming_deadlines as $deadline): ?>
              <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom activity-item <?php echo $deadline['days_left'] <= 3 ? 'deadline-urgent' : ''; ?>">
                <div class="flex-grow-1">
                  <h6 class="fw-semibold mb-1"><?php echo htmlspecialchars($deadline['title']); ?></h6>
                  <p class="small text-muted mb-0">
                    <span class="badge bg-light text-dark"><?php echo htmlspecialchars($deadline['course']); ?></span>
                    <span class="ms-2">
                      <i class="bi bi-calendar"></i> Due: <?php echo date('M d, Y', strtotime($deadline['due_date'])); ?>
                    </span>
                  </p>
                </div>
                <div class="text-end">
                  <span class="badge <?php echo $deadline['days_left'] <= 3 ? 'bg-danger' : 'bg-warning'; ?>">
                    <?php echo $deadline['days_left']; ?> days left
                  </span>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <p class="text-muted text-center mb-0">No upcoming deadlines. Great job staying on top of your work!</p>
          <?php endif; ?>
        </div>
      </div>

      <!-- Achievements Section -->
      <div class="card shadow-sm border-0 mb-4" data-aos="fade-up">
        <div class="card-body">
          <h5 class="fw-bold mb-3 text-primary">
            <i class="bi bi-trophy-fill"></i> Your Achievements
          </h5>
          <div class="row text-center">
            <?php foreach($achievements as $achievement): ?>
              <div class="col-3">
                <div class="achievement-badge <?php echo $achievement['earned'] ? 'earned' : 'not-earned'; ?>" 
                     data-bs-toggle="tooltip" 
                     title="<?php echo $achievement['name']; ?>">
                  <i class="bi bi-<?php echo $achievement['icon']; ?> fs-1 text-<?php echo $achievement['color']; ?>"></i>
                  <p class="small mb-0 mt-1"><?php echo $achievement['name']; ?></p>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <!-- Recommended Courses -->
      <div class="mb-4" data-aos="fade-up">
        <h4 class="fw-bold text-white mb-3"><i class="bi bi-stars"></i> Recommended for You</h4>
        <div class="row">
          <?php foreach($recommended_courses as $index => $rec_course): ?>
            <div class="col-md-4 mb-3" data-aos="flip-left" data-aos-delay="<?php echo ($index + 1) * 100; ?>">
              <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                  <span class="badge bg-secondary mb-2"><?php echo htmlspecialchars($rec_course['level']); ?></span>
                  <h6 class="fw-bold mb-2"><?php echo htmlspecialchars($rec_course['title']); ?></h6>
                  <p class="small text-muted mb-3"><?php echo htmlspecialchars($rec_course['description']); ?></p>
                  
                  <div class="d-flex justify-content-between small text-muted mb-3">
                    <span><i class="bi bi-people"></i> <?php echo $rec_course['students']; ?></span>
                    <span><i class="bi bi-star-fill text-warning"></i> <?php echo $rec_course['rating']; ?></span>
                  </div>

                  <a href="/lms-dashboard/course-player/course-player.php?course_id=<?php echo (int)$rec_course['id']; ?>" class="btn btn-sm btn-outline-primary w-100">View Course</a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <!-- Right Column: Activity and Progress -->
    <div class="col-lg-4">
      <!-- Learning Summary -->
      <div class="card shadow-sm border-0 mb-4" data-aos="fade-left">
        <div class="card-body">
          <h5 class="fw-bold mb-3 text-primary">
            <i class="bi bi-graph-up-arrow"></i> Learning Summary
          </h5>
          
          <div class="mb-3">
            <div class="d-flex justify-content-between mb-1">
              <span class="small">Overall Progress</span>
              <span class="small fw-bold"><?php echo $overallProgress; ?>%</span>
            </div>
            <div class="progress" style="height: 10px;">
              <div class="progress-bar bg-success" style="width: 0%;" data-progress="<?php echo $overallProgress; ?>"></div>
            </div>
          </div>

          <div class="border-top pt-3">
            <div class="d-flex justify-content-between mb-2">
              <span class="small text-muted">Certificates Earned:</span>
              <span class="fw-bold"><?php echo $user_stats['certificates']; ?></span>
            </div>
            <div class="d-flex justify-content-between mb-2">
              <span class="small text-muted">Pending Assignments:</span>
              <span class="fw-bold"><?php echo $user_stats['assignments_pending']; ?></span>
            </div>
            <div class="d-flex justify-content-between mb-2">
              <span class="small text-muted">Average Score:</span>
              <span class="fw-bold text-success"><?php echo $user_stats['average_score']; ?>%</span>
            </div>
            <div class="d-flex justify-content-between">
              <span class="small text-muted">Active Days (Last 7):</span>
              <span class="fw-bold text-danger"><?php echo $user_stats['current_streak']; ?> days</span>
            </div>
          </div>

          <div class="d-grid mt-3">
            <a href="/lms-dashboard/My Learning/Progress/enrolled-courses/enrolled-courses.php" class="btn btn-primary btn-sm">
              <i class="bi bi-graph-up"></i> View Detailed Progress
            </a>
          </div>
        </div>
      </div>

      <!-- Recent Activity -->
      <div class="card shadow-sm border-0 mb-4" data-aos="fade-left" data-aos-delay="100">
        <div class="card-body">
          <h5 class="fw-bold mb-3 text-primary">
            <i class="bi bi-clock-history"></i> Recent Activity
          </h5>

          <?php foreach($recent_activities as $activity): ?>
            <div class="d-flex mb-3 pb-3 border-bottom activity-item">
              <div class="me-3">
                <i class="bi bi-<?php echo $activity['icon']; ?> fs-5 text-<?php echo $activity['color']; ?>"></i>
              </div>
              <div class="flex-grow-1">
                <p class="mb-1 small fw-semibold"><?php echo htmlspecialchars($activity['title']); ?></p>
                <p class="mb-0 small text-muted">
                  <?php echo htmlspecialchars($activity['course']); ?> ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¢ÃƒÆ’Ã‚Â¢ÃƒÂ¢Ã¢â€šÂ¬Ã…Â¡Ãƒâ€šÃ‚Â¬ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â¢ <?php echo $activity['time']; ?>
                </p>
              </div>
            </div>
          <?php endforeach; ?>

          <a href="/lms-dashboard/My Learning/Activities/recently-viewed/recently-viewed.php" class="btn btn-sm btn-outline-primary w-100">View All Activity</a>
        </div>
      </div>

      <!-- Study Tip -->
      <div class="card shadow-sm border-0 tip-card" data-aos="fade-left" data-aos-delay="200">
        <div class="card-body">
          <h6 class="fw-bold mb-3">
            <i class="bi bi-lightbulb-fill text-warning"></i> Study Tip of the Day
          </h6>
          <p class="small mb-0">
            Take regular breaks every 25-30 minutes to improve focus and retention. Your brain needs time to process and consolidate new information!
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<?php

 include(__DIR__ . '/..\includes\footer\footer.php'); 
 ?>




