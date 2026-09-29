<?php
declare(strict_types=1);
session_start();
if (($_SESSION['role'] ?? '') !== 'admin') {
    header('Location: /authenication/login/login.php', true, 303);
    exit;
}
header('Location: /Admin-dashboard/Courses/all_courses/all_courses.php', true, 303);
exit;
