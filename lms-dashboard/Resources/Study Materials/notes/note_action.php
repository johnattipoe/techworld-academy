<?php
declare(strict_types=1);
session_start();
require_once __DIR__ . '/../../../includes/auth/auth.php';
require_once __DIR__ . '/../../../../Database/db/db.php';
require_once __DIR__ . '/../../../../utils/security/csrf/csrf.php';

$pdo = get_db();
$userId = (int)$_SESSION['user_id'];
$action = (string)($_REQUEST['action'] ?? '');
$noteId = filter_var($_REQUEST['id'] ?? $_POST['note_id'] ?? null, FILTER_VALIDATE_INT);
$escape = static fn($value): string => htmlspecialchars((string)($value ?? ''), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

if ($action === 'download' && $noteId) {
    $stmt=$pdo->prepare('SELECT title,content FROM study_notes WHERE id=? AND (user_id=? OR user_id IS NULL) LIMIT 1');
    $stmt->execute([$noteId,$userId]); $note=$stmt->fetch(PDO::FETCH_ASSOC);
    if (!$note) { http_response_code(404); exit('Note not found.'); }
    $filename=preg_replace('/[^A-Za-z0-9._-]+/','-',(string)$note['title']) ?: 'study-note';
    header('Content-Type: text/plain; charset=utf-8');
    header('Content-Disposition: attachment; filename="'.substr($filename,0,100).'.txt"');
    echo $note['title']."\n\n".$note['content']; exit;
}
if ($action === 'edit' && $noteId) {
    $stmt=$pdo->prepare('SELECT n.*, GROUP_CONCAT(t.tag SEPARATOR ", ") tags FROM study_notes n LEFT JOIN note_tags t ON t.note_id=n.id WHERE n.id=? AND n.user_id=? GROUP BY n.id LIMIT 1');
    $stmt->execute([$noteId,$userId]); $note=$stmt->fetch(PDO::FETCH_ASSOC);
    if (!$note) { http_response_code(404); exit('Note not found.'); }
    $pageTitle='Edit study note';
    include __DIR__.'/../../../includes/header/header.php';
    include __DIR__.'/../../../includes/navbar/navbar.php';
    include __DIR__.'/../../../includes/sidebar/sidebar.php';
    ?>
    <main class="container py-4" style="max-width:900px"><h1 class="h2 mb-4">Edit note</h1>
      <form method="post" action="?action=update" class="card border-0 shadow-sm"><div class="card-body p-4">
        <input type="hidden" name="csrf_token" value="<?= $escape(CSRF::generateToken()) ?>"><input type="hidden" name="note_id" value="<?=(int)$note['id']?>">
        <label class="form-label" for="noteTitle">Title</label><input class="form-control mb-3" id="noteTitle" name="title" maxlength="255" required value="<?=$escape($note['title'])?>">
        <label class="form-label" for="noteCourse">Course</label><input class="form-control mb-3" id="noteCourse" name="course_name" maxlength="255" value="<?=$escape($note['course_name'])?>">
        <label class="form-label" for="noteCategory">Category</label><input class="form-control mb-3" id="noteCategory" name="category" maxlength="100" value="<?=$escape($note['category'])?>">
        <label class="form-label" for="noteTags">Tags</label><input class="form-control mb-3" id="noteTags" name="tags" maxlength="600" value="<?=$escape($note['tags'])?>">
        <label class="form-label" for="noteContent">Content</label><textarea class="form-control mb-3" id="noteContent" name="content" rows="12" maxlength="60000" required><?=$escape($note['content'])?></textarea>
        <div class="form-check"><input class="form-check-input" type="checkbox" name="is_favorite" id="noteFavorite" value="1" <?=!empty($note['is_favorite'])?'checked':''?>><label class="form-check-label" for="noteFavorite">Favorite</label></div>
      </div><div class="card-footer bg-white d-flex gap-2"><button class="btn btn-primary">Save changes</button><a class="btn btn-outline-secondary" href="/lms-dashboard/Resources/Study%20Materials/notes/notes.php">Cancel</a></div></form>
    </main>
    <?php include __DIR__.'/../../../includes/footer/footer.php'; exit;
}
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !CSRF::validateToken($_POST['csrf_token'] ?? '')) {
    http_response_code($_SERVER['REQUEST_METHOD'] === 'POST' ? 403 : 405);
    exit('Invalid request or expired security token.');
}
if (!$noteId || $noteId < 1) { http_response_code(400); exit('Invalid note.'); }
try {
    if ($action === 'favorite') {
        $stmt=$pdo->prepare('UPDATE study_notes SET is_favorite=1-is_favorite WHERE id=? AND user_id=?');
        $stmt->execute([$noteId,$userId]);
    } elseif ($action === 'delete') {
        $pdo->beginTransaction();
        $stmt=$pdo->prepare('SELECT id FROM study_notes WHERE id=? AND user_id=? FOR UPDATE');
        $stmt->execute([$noteId,$userId]);
        if (!$stmt->fetchColumn()) throw new RuntimeException('Note not found.');
        $pdo->prepare('DELETE FROM note_tags WHERE note_id=?')->execute([$noteId]);
        $pdo->prepare('DELETE FROM study_notes WHERE id=? AND user_id=?')->execute([$noteId,$userId]);
        $pdo->commit();
    } elseif ($action === 'update') {
        $title=trim((string)($_POST['title']??'')); $content=trim((string)($_POST['content']??''));
        if ($title==='' || $content==='' || mb_strlen($title)>255 || mb_strlen($content)>60000) throw new InvalidArgumentException('Title and content are required.');
        $pdo->beginTransaction();
        $stmt=$pdo->prepare('UPDATE study_notes SET title=?,course_name=?,category=?,content=?,word_count=?,is_favorite=? WHERE id=? AND user_id=?');
        $stmt->execute([$title,trim((string)($_POST['course_name']??''))?:null,trim((string)($_POST['category']??''))?:null,$content,str_word_count(strip_tags($content)),isset($_POST['is_favorite'])?1:0,$noteId,$userId]);
        $check=$pdo->prepare('SELECT id FROM study_notes WHERE id=? AND user_id=?'); $check->execute([$noteId,$userId]);
        if (!$check->fetchColumn()) throw new RuntimeException('Note not found.');
        $pdo->prepare('DELETE FROM note_tags WHERE note_id=?')->execute([$noteId]);
        $tagStmt=$pdo->prepare('INSERT IGNORE INTO note_tags (note_id,tag) VALUES (?,?)');
        foreach(array_slice(array_unique(array_filter(array_map('trim',explode(',',(string)($_POST['tags']??''))))),0,12) as $tag) if($tag!=='') $tagStmt->execute([$noteId,mb_substr($tag,0,50)]);
        $pdo->commit();
    } else { http_response_code(400); exit('Unsupported note action.'); }
} catch (Throwable $e) {
    if ($pdo->inTransaction()) $pdo->rollBack();
    error_log('LMS note action failed: '.$e->getMessage());
    http_response_code(400); exit('The note action could not be completed.');
}
header('Location: /lms-dashboard/Resources/Study%20Materials/notes/notes.php?updated=1');
exit;
