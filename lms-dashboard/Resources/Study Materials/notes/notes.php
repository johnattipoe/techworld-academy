<?php
session_start();
require_once(__DIR__ . '/../../../includes/auth/auth.php');
require_once(__DIR__ . '/../../../../Database/db/db.php');

if(!isset($_SESSION['username'])){
  $_SESSION['username'] = "Student";
}

if(!isset($_SESSION['user_id'])){
  header("Location: ../../../authenication/login.php");
  exit();
}

$conn = get_db();
$user_id = (int)$_SESSION['user_id'];
require_once(__DIR__ . '/../../../../utils/security/csrf/csrf.php');
$noteCsrfToken = CSRF::generateToken();
$noteSaveError = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $csrf = $_POST['csrf_token'] ?? '';
    if (!is_string($csrf) || !CSRF::validateToken($csrf)) {
        $noteSaveError = 'Your session token expired. Reload this page and try again.';
    } elseif (($_POST['action'] ?? '') === 'create') {
        $title = trim((string)($_POST['title'] ?? ''));
        $course = trim((string)($_POST['course_name'] ?? ''));
        $category = trim((string)($_POST['category'] ?? ''));
        $content = trim((string)($_POST['content'] ?? ''));
        $favorite = isset($_POST['is_favorite']) ? 1 : 0;
        if ($title === '' || $content === '') {
            $noteSaveError = 'A title and note content are required.';
        } else {
            try {
                $conn->beginTransaction();
                $save = $conn->prepare('INSERT INTO study_notes (title, course_name, category, content, note_date, word_count, is_favorite, user_id) VALUES (?, ?, ?, ?, CURRENT_DATE, ?, ?, ?)');
                $save->execute([$title, $course ?: null, $category ?: null, $content, str_word_count(strip_tags($content)), $favorite, $user_id]);
                $noteId = (int)$conn->lastInsertId();
                $tags = array_unique(array_filter(array_map('trim', explode(',', (string)($_POST['tags'] ?? '')))));
                $tagSave = $conn->prepare('INSERT IGNORE INTO note_tags (note_id, tag) VALUES (?, ?)');
                foreach (array_slice($tags, 0, 12) as $tag) {
                    $tagSave->execute([$noteId, substr($tag, 0, 50)]);
                }
                $conn->commit();
                header('Location: notes.php?saved=1');
                exit;
            } catch (PDOException $e) {
                if ($conn->inTransaction()) $conn->rollBack();
                error_log('Study note create failed: ' . $e->getMessage());
                $noteSaveError = 'The note could not be saved right now.';
            }
        }
    }
}

// Fetch notes from database
try {
    $stmt = $conn->prepare("
        SELECT 
            n.*,
            GROUP_CONCAT(nt.tag SEPARATOR ', ') as tags_list
        FROM study_notes n
        LEFT JOIN note_tags nt ON n.id = nt.note_id
        WHERE n.user_id = :user_id OR n.user_id IS NULL
        GROUP BY n.id
        ORDER BY n.note_date DESC
    ");
    $stmt->execute(['user_id' => (int)$user_id]);
    $notes_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Format notes
    $notes = array();
    foreach($notes_data as $note) {
        $tags = !empty($note['tags_list']) ? explode(', ', $note['tags_list']) : array();
        
        $notes[] = array(
            'id' => $note['id'],
            'title' => $note['title'],
            'course' => $note['course_name'],
            'date' => $note['note_date'],
            'content' => $note['content'],
            'category' => $note['category'],
            'tags' => $tags,
            'words' => $note['word_count'],
            'favorite' => (bool)$note['is_favorite'],
            'owner_id' => (int)($note['user_id'] ?? 0)
        );
    }
    
} catch (PDOException $e) {
    error_log("Notes fetch error: " . $e->getMessage());
    $notes = array();
}

include(__DIR__ . '/../../../includes/header/header.php');
include(__DIR__ . '/../../../includes/navbar/navbar.php');
include(__DIR__ . '/../../../includes/sidebar/sidebar.php');
?>

<div class="container-fluid py-4">
  <!-- Page Header -->
  <div class="row mb-4" data-aos="fade-down">
    <div class="col-md-8">
      <h2 class="fw-bold text-white"><i class="bi bi-journal-text"></i> My Notes</h2>
      <p class="text-white-50">Your personal study notes and course materials</p>
    </div>
    <div class="col-md-4 text-end">
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newNoteModal">
        <i class="bi bi-plus-circle"></i> New Note
      </button>
    </div>
  </div>

  <!-- Statistics -->
  <div class="row mb-4">
    <div class="col-md-3" data-aos="zoom-in" data-aos-delay="100">
      <div class="card bg-primary text-white stat-card">
        <div class="card-body text-center">
          <i class="bi bi-journal-bookmark-fill" style="font-size: 2.5rem;"></i>
          <h3 class="fw-bold mt-2 counter" data-target="<?php echo count($notes); ?>">0</h3>
          <p class="mb-0">Total Notes</p>
        </div>
      </div>
    </div>
    <div class="col-md-3" data-aos="zoom-in" data-aos-delay="200">
      <div class="card bg-success text-white stat-card">
        <div class="card-body text-center">
          <i class="bi bi-heart-fill" style="font-size: 2.5rem;"></i>
          <h3 class="fw-bold mt-2 counter" data-target="<?php echo count(array_filter($notes, function($n){ return $n['favorite']; })); ?>">0</h3>
          <p class="mb-0">Favorites</p>
        </div>
      </div>
    </div>
    <div class="col-md-3" data-aos="zoom-in" data-aos-delay="300">
      <div class="card bg-warning text-white stat-card">
        <div class="card-body text-center">
          <i class="bi bi-folder-fill" style="font-size: 2.5rem;"></i>
          <h3 class="fw-bold mt-2 counter" data-target="<?php echo count(array_unique(array_column($notes, 'category'))); ?>">0</h3>
          <p class="mb-0">Categories</p>
        </div>
      </div>
    </div>
    <div class="col-md-3" data-aos="zoom-in" data-aos-delay="400">
      <div class="card bg-info text-white stat-card">
        <div class="card-body text-center">
          <i class="bi bi-file-text-fill" style="font-size: 2.5rem;"></i>
          <h3 class="fw-bold mt-2 counter" data-target="<?php echo array_sum(array_column($notes, 'words')); ?>">0</h3>
          <p class="mb-0">Total Words</p>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <!-- Filters -->
    <div class="col-lg-3 mb-4">
      <div class="card shadow-sm" data-aos="fade-right">
        <div class="card-header bg-primary text-white">
          <h5 class="mb-0"><i class="bi bi-funnel-fill"></i> Filters</h5>
        </div>
        <div class="card-body">
          <!-- Search -->
          <div class="mb-3">
            <input type="text" class="form-control" placeholder="Search notes...">
          </div>

          <!-- Category -->
          <div class="mb-3">
            <label class="fw-bold mb-2">Category</label>
            <select class="form-select">
              <option>All Categories</option>
              <option>Programming</option>
              <option>Web Development</option>
              <option>Data Science</option>
              <option>AI & ML</option>
            </select>
          </div>

          <!-- Filter Options -->
          <div class="mb-3">
            <label class="fw-bold mb-2">Show</label>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="favorites">
              <label class="form-check-label" for="favorites">Favorites Only</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="recent">
              <label class="form-check-label" for="recent">Recent Notes</label>
            </div>
          </div>

          <!-- Sort -->
          <div class="mb-3">
            <label class="fw-bold mb-2">Sort By</label>
            <select class="form-select">
              <option>Newest First</option>
              <option>Oldest First</option>
              <option>Title (A-Z)</option>
              <option>Most Words</option>
            </select>
          </div>

          <button class="btn btn-outline-danger w-100">Clear Filters</button>
        </div>
      </div>

      <!-- Quick Stats -->
      <div class="card shadow-sm mt-4" data-aos="fade-right" data-aos-delay="100">
        <div class="card-header bg-success text-white">
          <h6 class="mb-0"><i class="bi bi-bar-chart-fill"></i> Quick Stats</h6>
        </div>
        <div class="card-body">
          <div class="d-flex justify-content-between mb-2">
            <span class="small">This Week:</span>
            <strong><?php echo count(array_filter($notes, fn($n) => !empty($n['date']) && date('o-W', strtotime($n['date'])) === date('o-W'))); ?> notes</strong>
          </div>
          <div class="d-flex justify-content-between mb-2">
            <span class="small">This Month:</span>
            <strong><?php echo count(array_filter($notes, fn($n) => !empty($n['date']) && date('Y-m', strtotime($n['date'])) === date('Y-m'))); ?> notes</strong>
          </div>
          <div class="d-flex justify-content-between">
            <span class="small">Total Words:</span>
            <strong><?php echo number_format(array_sum(array_column($notes, 'words'))); ?></strong>
          </div>
        </div>
      </div>
    </div>

    <!-- Notes Grid -->
    <div class="col-lg-9">
      <div class="d-flex justify-content-between align-items-center mb-3" data-aos="fade-left">
        <span class="text-white">Showing <strong><?php echo count($notes); ?></strong> notes</span>
        <div class="btn-group">
          <button class="btn btn-sm btn-outline-light active"><i class="bi bi-grid-3x3-gap"></i></button>
          <button class="btn btn-sm btn-outline-light"><i class="bi bi-list"></i></button>
        </div>
      </div>

      <div class="row">
        <?php if (!$notes): ?><div class="col-12"><div class="alert alert-light">No notes are available yet. Create one to get started.</div></div><?php endif; ?>
        <?php foreach($notes as $index => $note): ?>
          <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="<?php echo ($index % 3) * 100; ?>">
            <div class="card h-100 shadow-sm hover-shadow">
              <div class="card-body">
                <!-- Header -->
                <div class="d-flex justify-content-between align-items-start mb-2">
                  <span class="badge bg-secondary"><?php echo htmlspecialchars((string)($note['category'] ?? 'General'), ENT_QUOTES, 'UTF-8'); ?></span>
                  <?php if ((int)$note['owner_id'] === $user_id): ?><form method="post" action="note_action.php" class="m-0"><input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($noteCsrfToken, ENT_QUOTES, 'UTF-8'); ?>"><input type="hidden" name="action" value="favorite"><input type="hidden" name="note_id" value="<?php echo (int)$note['id']; ?>"><button class="btn btn-sm btn-link p-0" aria-label="Toggle favorite"><i class="bi bi-heart<?php echo $note['favorite'] ? '-fill text-danger' : ''; ?>"></i></button></form><?php elseif ($note['favorite']): ?><i class="bi bi-heart-fill text-danger"></i><?php endif; ?>
                </div>

                <h5 class="card-title fw-bold"><?php echo htmlspecialchars((string)$note['title'], ENT_QUOTES, 'UTF-8'); ?></h5>
                <p class="text-muted small mb-2">
                  <i class="bi bi-book"></i> <?php echo htmlspecialchars((string)($note['course'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>
                </p>

                <p class="small text-muted mb-3"><?php echo htmlspecialchars(mb_strimwidth((string)$note['content'], 0, 180, '...'), ENT_QUOTES, 'UTF-8'); ?></p>

                <!-- Tags -->
                <div class="mb-3">
                  <?php foreach($note['tags'] as $tag): ?>
                    <span class="badge bg-light text-dark me-1">#<?php echo htmlspecialchars((string)$tag, ENT_QUOTES, 'UTF-8'); ?></span>
                  <?php endforeach; ?>
                </div>

                <!-- Stats -->
                <div class="d-flex justify-content-between small text-muted mb-3">
                  <span><i class="bi bi-file-text"></i> <?php echo number_format($note['words']); ?> words</span>
                  <span><i class="bi bi-calendar"></i> <?php echo date('M d', strtotime($note['date'])); ?></span>
                </div>

                <!-- Actions -->
                <div class="d-grid gap-2">
                  <?php if ((int)$note['owner_id'] === $user_id): ?><a class="btn btn-primary btn-sm" href="note_action.php?action=edit&amp;id=<?php echo (int)$note['id']; ?>"><i class="bi bi-pencil"></i> Edit note</a><?php endif; ?>
                  <div class="btn-group">
                    <a class="btn btn-outline-secondary btn-sm" href="note_action.php?action=download&amp;id=<?php echo (int)$note['id']; ?>"><i class="bi bi-download"></i> Download</a>
                    <?php if ((int)$note['owner_id'] === $user_id): ?><form method="post" action="note_action.php" class="d-inline" onsubmit="return confirm('Delete this note permanently?');"><input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($noteCsrfToken, ENT_QUOTES, 'UTF-8'); ?>"><input type="hidden" name="action" value="delete"><input type="hidden" name="note_id" value="<?php echo (int)$note['id']; ?>"><button class="btn btn-outline-danger btn-sm" aria-label="Delete note"><i class="bi bi-trash"></i></button></form><?php endif; ?>
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
</div>

<!-- New Note Modal -->
<div class="modal fade" id="newNoteModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-journal-plus"></i> Create New Note</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="newNoteForm" method="post" action="notes.php">
          <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
          <input type="hidden" name="action" value="create">
          <?php if ($noteSaveError): ?><div class="alert alert-danger"><?php echo htmlspecialchars($noteSaveError, ENT_QUOTES, 'UTF-8'); ?></div><?php endif; ?>
          <?php if (isset($_GET['saved'])): ?><div class="alert alert-success">Your note was saved.</div><?php endif; ?>
          <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" name="title" maxlength="255" placeholder="Enter note title" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Course</label>
            <input type="text" class="form-control" name="course_name" maxlength="255" placeholder="Optional course name">
          </div>
          <div class="mb-3">
            <label class="form-label">Category</label>
            <input type="text" class="form-control" name="category" maxlength="100" placeholder="Optional category">
          </div>
          <div class="mb-3">
            <label class="form-label">Tags (comma separated)</label>
            <input type="text" class="form-control" name="tags" maxlength="600" placeholder="e.g., javascript, functions, scope">
          </div>
          <div class="mb-3">
            <label class="form-label">Content</label>
            <textarea class="form-control" name="content" rows="10" maxlength="60000" placeholder="Write your notes here..." required></textarea>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="markFavorite" name="is_favorite" value="1">
            <label class="form-check-label" for="markFavorite">
              Mark as favorite
            </label>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" form="newNoteForm" class="btn btn-primary">
          <i class="bi bi-save"></i> Save Note
        </button>
      </div>
    </div>
  </div>
</div>

<?php include(__DIR__ . '/../../../includes/footer/footer.php'); ?>
