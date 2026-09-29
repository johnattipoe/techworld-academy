<?php
require_once(__DIR__ . '/../system files/db.php');

$pdo = get_db();
if (!$pdo) { echo "No DB connection\n"; exit(1); }

// Insert sample users
$users = [
    ['username'=>'admin','email'=>'admin@example.com','role'=>'admin','password'=>'adminpass'],
    ['username'=>'alice','email'=>'alice@example.com','role'=>'instructor','password'=>'alicepass'],
    ['username'=>'bob','email'=>'bob@example.com','role'=>'student','password'=>'bobpass'],
];

$stmt = $pdo->prepare('INSERT IGNORE INTO users (username,email,password_hash,role) VALUES (?, ?, ?, ?)');
foreach ($users as $u) {
    $hash = password_hash($u['password'], PASSWORD_DEFAULT);
    try { $stmt->execute([$u['username'],$u['email'],$hash,$u['role']]); } catch (Exception $e) {}
}

// Courses
$courses = [ ['title'=>'Intro to Programming','description'=>'Learn programming basics','instructor'=>2], ['title'=>'Web Design Basics','description'=>'HTML/CSS fundamentals','instructor'=>2] ];
$stmt = $pdo->prepare('INSERT IGNORE INTO courses (title,description,instructor_id) VALUES (?, ?, ?)');
foreach ($courses as $c) { try { $stmt->execute([$c['title'],$c['description'],$c['instructor']]); } catch (Exception $e) {} }

// Enrollments
$stmt = $pdo->prepare('INSERT INTO enrollments (user_id,course_id,instructor_id) VALUES (?, ?, ?)');
try { $stmt->execute([3,1,2]); $stmt->execute([3,2,2]); } catch (Exception $e) {}

// Activity
$stmt = $pdo->prepare('INSERT INTO activity (user_id, action) VALUES (?, ?)');
try { $stmt->execute([3,'Enrolled in course 1']); $stmt->execute([2,'Created course 1']); } catch (Exception $e) {}

echo "Seed complete.\n";
