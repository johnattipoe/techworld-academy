<?php
session_start(); if (($_SESSION['role']??'')!=='instructor' || empty($_SESSION['user_id'])) { header('Location: /authenication/login/login.php'); exit; }
require_once(__DIR__.'/../../includes/db/db.php'); $pdo=get_db(); $id=(int)$_SESSION['user_id'];
header('Content-Type: text/csv; charset=utf-8'); header('Content-Disposition: attachment; filename="instructor-roster.csv"');
$out=fopen('php://output','w'); fputcsv($out,['Student','Username','Email','Course','Progress']);
$q=$pdo->prepare('SELECT DISTINCT u.full_name,u.username,u.email,c.title AS course_title,e.progress FROM enrollments e JOIN courses c ON c.id=e.course_id JOIN users u ON u.id=e.user_id WHERE c.instructor_id=? AND u.role="student" ORDER BY u.username,c.title'); $q->execute([$id]);
while($row=$q->fetch(PDO::FETCH_ASSOC)){fputcsv($out,[$row['full_name']??'', $row['username']??'', $row['email']??'', $row['course_title']??'', $row['progress']??0]);} fclose($out); exit;
