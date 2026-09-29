<?php
$currentPath = rawurldecode(parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH) ?: '');
$navGroups = [
  'Learning' => [
    ['Courses', 'fa-book-open', '/Admin-dashboard/Courses/all_courses/all_courses.php'],
    ['Add a course', 'fa-circle-plus', '/Admin-dashboard/Courses/add_course/add_course.php'],
    ['Course analytics', 'fa-chart-line', '/Admin-dashboard/Courses/course_analytics/course_analytics.php'],
    ['Students', 'fa-user-graduate', '/Admin-dashboard/Students/all_students/all_students.php'],
    ['Enroll a student', 'fa-user-plus', '/Admin-dashboard/Students/enroll_student/enroll_student.php'],
    ['Progress reports', 'fa-chart-simple', '/Admin-dashboard/Students/progress_reports/progress_reports.php'],
    ['Instructors', 'fa-chalkboard-user', '/Admin-dashboard/Instructors/all_instructors/all_instructors.php'],
    ['Instructor schedule', 'fa-calendar-days', '/Admin-dashboard/Instructors/schedule/schedule.php'],
  ],
  'Insights' => [
    ['Analytics', 'fa-chart-pie', '/Admin-dashboard/analytics/analytics.php'],
    ['Enrollment reports', 'fa-file-lines', '/Admin-dashboard/Reports/enrollment_reports/enrollment_reports.php'],
    ['Financial reports', 'fa-coins', '/Admin-dashboard/Reports/financial_reports/financial_reports.php'],
    ['Performance metrics', 'fa-gauge-high', '/Admin-dashboard/Reports/performance_metrics/performance_metrics.php'],
  ],
  'Communication' => [
    ['Inbox', 'fa-inbox', '/Admin-dashboard/Messaging/inbox/inbox.php'],
    ['Send a message', 'fa-paper-plane', '/Admin-dashboard/Messaging/send_message/send_message.php'],
    ['Announcements', 'fa-bullhorn', '/Admin-dashboard/Messaging/announcements/announcements.php'],
  ],
  'Administration' => [
    ['User management', 'fa-users-gear', '/Admin-dashboard/user_management/user_management.php'],
    ['Audit logs', 'fa-clock-rotate-left', '/Admin-dashboard/audit_logs/audit_logs.php'],
    ['Server status', 'fa-server', '/Admin-dashboard/System Tools/server_status/server_status.php'],
    ['Maintenance preview', 'fa-screwdriver-wrench', '/Admin-dashboard/System Tools/maintenance_mode/maintenance_mode.php'],
    ['Database backup', 'fa-database', '/Admin-dashboard/System Tools/database_backup/database_backup.php'],
    ['Settings', 'fa-gear', '/Admin-dashboard/Settings/settings.php'],
    ['Admin profile', 'fa-user', '/Admin-dashboard/profile/profile.php'],
    ['Security activity', 'fa-shield-halved', '/Admin-dashboard/Settings/security/security.php'],
    ['Appearance', 'fa-palette', '/Admin-dashboard/Settings/theme/theme.php'],
  ],
];
?>
<aside class="admin-sidebar" id="adminSidebar" aria-label="Admin navigation">
  <a class="brand-lockup" href="/Admin-dashboard/Admin_dashboard/Admin_dashboard.php"><span class="brand-mark"><i class="fa-solid fa-graduation-cap"></i></span><span class="brand-name">TechWorld<span>ACADEMY ADMIN</span></span><span class="brand-badge">TW</span></a>
  <div class="sidebar-scroll"><div class="workspace-label">WORKSPACE</div>
    <a class="sidebar-link <?= str_contains($currentPath, '/Admin_dashboard/') ? 'is-active' : '' ?>" href="/Admin-dashboard/Admin_dashboard/Admin_dashboard.php"<?= str_contains($currentPath, '/Admin_dashboard/') ? ' aria-current="page"' : '' ?>><i class="fa-solid fa-grid-2"></i><span>Overview</span></a>
    <?php foreach ($navGroups as $groupName => $items): $groupActive = false; foreach ($items as $navItem) { if ($currentPath === $navItem[2]) { $groupActive = true; break; } } $groupId = 'navGroup' . preg_replace('/[^a-z0-9]/i', '', $groupName); ?>
      <section class="sidebar-group"><button class="sidebar-group-toggle" type="button" data-sidebar-group-toggle aria-controls="<?= $groupId ?>" aria-expanded="<?= $groupActive ? 'true' : 'false' ?>"><span><?= htmlspecialchars($groupName, ENT_QUOTES, 'UTF-8') ?></span><i class="fa-solid fa-chevron-down" aria-hidden="true"></i></button>
      <div class="sidebar-group-links" id="<?= $groupId ?>"<?= $groupActive ? '' : ' hidden' ?>>
        <?php foreach ($items as [$label, $icon, $href]): $active = $currentPath === $href; ?>
          <a class="sidebar-link <?= $active ? 'is-active' : '' ?>" href="<?= htmlspecialchars($href, ENT_QUOTES, 'UTF-8') ?>"<?= $active ? ' aria-current="page"' : '' ?>><i class="fa-solid <?= $icon ?>"></i><span><?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8') ?></span></a>
        <?php endforeach; ?>
      </div></section>
    <?php endforeach; ?>
  </div>
  <div class="sidebar-bottom"><div class="sidebar-help"><span class="help-icon"><i class="fa-regular fa-life-ring"></i></span><div><strong>Need a hand?</strong><a href="/contact/contact.php">Visit help center <i class="fa-solid fa-arrow-up-right-from-square"></i></a></div></div><a class="sidebar-signout" href="/authenication/logout/logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i><span>Sign out</span></a><div class="sidebar-footnote"><?= date('Y') ?> TechWorld Academy</div></div>
</aside>


