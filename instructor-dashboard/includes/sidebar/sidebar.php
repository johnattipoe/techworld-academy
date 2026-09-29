<?php
$currentPath = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH) ?: '';
$groups = [
 'TEACHING' => [
  ['My courses','fa-book-open','/instructor-dashboard/Courses/all_courses/all_courses.php'],
  ['Create course','fa-circle-plus','/instructor-dashboard/Courses/create_course/create_course.php'],
  ['Course analytics','fa-chart-line','/instructor-dashboard/Courses/course_analytics/course_analytics.php'],
  ['My students','fa-user-graduate','/instructor-dashboard/Students/students/students.php'],
  ['Student performance','fa-chart-simple','/instructor-dashboard/Students/performance/performance.php'],
 ],
 'ASSESSMENT' => [
  ['Create assignment','fa-file-circle-plus','/instructor-dashboard/Assignments/upload_assignment/upload_assignment.php'],
  ['Submissions','fa-inbox','/instructor-dashboard/Assignments/view_submissions/view_submissions.php'],
  ['Grade work','fa-square-check','/instructor-dashboard/Assignments/grade_assignments/grade_assignments.php'],
  ['Schedule','fa-calendar-days','/instructor-dashboard/schedule/schedule.php'],
 ],
 'COMMUNITY' => [
  ['Message students','fa-envelope','/instructor-dashboard/Students/messages/messages.php'],
  ['Discussion threads','fa-comments','/instructor-dashboard/Discussions/all_threads/all_threads.php'],
  ['Announcements','fa-bullhorn','/instructor-dashboard/Discussions/announcements/announcements.php'],
 ],
 'WORKSPACE' => [
  ['Reports','fa-chart-pie','/instructor-dashboard/reports/reports.php'],
  ['Profile & settings','fa-gear','/instructor-dashboard/Settings/settings.php'],
 ],
];
?>
<aside class="instructor-sidebar" id="instructorSidebar" aria-label="Instructor navigation"><a class="instructor-brand" href="/instructor-dashboard/instructor_dashboard/instructor_dashboard.php"><span class="brand-mark"><i class="fa-solid fa-graduation-cap"></i></span><span>TechWorld<small>INSTRUCTOR PORTAL</small></span><b>TW</b></a><div class="sidebar-scroll"><div class="sidebar-caption">YOUR WORKSPACE</div><a class="instructor-nav-link <?= str_contains($currentPath,'/instructor_dashboard/')?'active':'' ?>" href="/instructor-dashboard/instructor_dashboard/instructor_dashboard.php"><i class="fa-solid fa-grid-2"></i><span>Overview</span></a>
<?php foreach($groups as $name=>$items): $opened=false;foreach($items as $item){if($currentPath===$item[2]){$opened=true;break;}}$id='group'.preg_replace('/[^A-Z]/','',$name);?><section class="instructor-nav-group"><button type="button" class="instructor-group-toggle" data-nav-toggle aria-controls="<?=$id?>" aria-expanded="<?=$opened?'true':'false'?>"><span><?=$name?></span><i class="fa-solid fa-chevron-down"></i></button><div id="<?=$id?>" class="instructor-group-links"<?=$opened?'':' hidden'?>><?php foreach($items as [$label,$icon,$href]):$active=$currentPath===$href;?><a class="instructor-nav-link <?=$active?'active':''?>" href="<?=htmlspecialchars($href,ENT_QUOTES,'UTF-8')?>"<?=$active?' aria-current="page"':''?>><i class="fa-solid <?=$icon?>"></i><span><?=htmlspecialchars($label,ENT_QUOTES,'UTF-8')?></span></a><?php endforeach;?></div></section><?php endforeach;?></div><div class="sidebar-footer"><div class="instructor-help"><span><i class="fa-regular fa-life-ring"></i></span><div><strong>Need support?</strong><a href="/contact/contact.php">Visit help center</a></div></div><a class="signout-link" href="/authenication/logout/logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i>Sign out</a><small>© <?=date('Y')?> TechWorld Academy</small></div></aside>
