<?php
session_start();
require_once(__DIR__ . '/../includes/auth/auth.php');
require_once(__DIR__ . '/../includes/db/db.php');

function esc(mixed $value): string {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

$courseId = filter_input(INPUT_GET, 'course_id', FILTER_VALIDATE_INT);
$requestedLessonId = filter_input(INPUT_GET, 'lesson_id', FILTER_VALIDATE_INT);
$userId = $_SESSION['user_id'] ?? null;

$conn = get_db();

$course = null;
if ($courseId) {
    $stmt = $conn->prepare("\n        SELECT c.*, COALESCE(u.full_name, 'TechWorld Academy') AS instructor\n        FROM courses c\n        LEFT JOIN users u ON c.instructor_id = u.id\n        WHERE c.id = ? AND c.is_active = 1 AND c.is_published = 1\n        LIMIT 1\n    ");
    $stmt->execute([$courseId]);
    $course = $stmt->fetch(PDO::FETCH_ASSOC);
}

if (!$course) {
    $stmt = $conn->query("\n        SELECT c.*, COALESCE(u.full_name, 'TechWorld Academy') AS instructor\n        FROM courses c\n        LEFT JOIN users u ON c.instructor_id = u.id\n        WHERE c.is_active = 1 AND c.is_published = 1\n        ORDER BY c.created_at DESC\n        LIMIT 1\n    ");
    $course = $stmt->fetch(PDO::FETCH_ASSOC);
}

$modules = [];
$lessons = [];
$lessonsByModule = [];
$lessonMap = [];
$resourcesByLesson = [];
$progressMap = [];
$notes = [];
$questions = [];
$enrolled = false;

if ($course) {
    if ($userId) {
        $stmt = $conn->prepare("\n            SELECT id FROM enrollments\n            WHERE user_id = ? AND course_id = ? AND status IN ('active', 'completed')\n            LIMIT 1\n        ");
        $stmt->execute([$userId, $course['id']]);
        $enrolled = (bool)$stmt->fetch(PDO::FETCH_ASSOC);
    }

    $stmt = $conn->prepare("\n        SELECT * FROM course_modules\n        WHERE course_id = ? AND is_active = 1\n        ORDER BY order_number ASC, id ASC\n    ");
    $stmt->execute([$course['id']]);
    $modules = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt = $conn->prepare("\n        SELECT cl.*, cm.title AS module_title\n        FROM course_lessons cl\n        JOIN course_modules cm ON cl.module_id = cm.id\n        WHERE cm.course_id = ? AND cl.is_active = 1\n        ORDER BY cm.order_number ASC, cl.order_number ASC, cl.id ASC\n    ");
    $stmt->execute([$course['id']]);
    $lessons = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($lessons as $lesson) {
        $lessonsByModule[$lesson['module_id']][] = $lesson;
        $lessonMap[(int)$lesson['id']] = $lesson;
    }

    $lessonIds = array_keys($lessonMap);

    if ($lessonIds && $userId) {
        $placeholders = implode(',', array_fill(0, count($lessonIds), '?'));
        $params = array_merge([$userId], $lessonIds);

        $stmt = $conn->prepare("\n            SELECT lesson_id, status\n            FROM lesson_progress\n            WHERE user_id = ? AND lesson_id IN ($placeholders)\n        ");
        $stmt->execute($params);
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $progressMap[(int)$row['lesson_id']] = $row['status'];
        }
    }

    $accessibleLessonIds = $enrolled ? $lessonIds : array_values(array_map(static fn($lesson) => (int)$lesson['id'], array_filter($lessons, static fn($lesson) => (int)$lesson['is_free_preview'] === 1)));
    if ($accessibleLessonIds) {
        $placeholders = implode(',', array_fill(0, count($accessibleLessonIds), '?'));
        $stmt = $conn->prepare("\n            SELECT * FROM lesson_resources\n            WHERE lesson_id IN ($placeholders)\n            ORDER BY id ASC\n        ");
        $stmt->execute($accessibleLessonIds);
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $resourcesByLesson[(int)$row['lesson_id']][] = $row;
        }
    }
}

$activeLesson = null;
if ($requestedLessonId && isset($lessonMap[$requestedLessonId])) {
    $candidate = $lessonMap[$requestedLessonId];
    if ($enrolled || (int)$candidate['is_free_preview'] === 1) {
        $activeLesson = $candidate;
    }
}

if (!$activeLesson && $lessons) {
    foreach ($lessons as $lesson) {
        if ($enrolled || (int)$lesson['is_free_preview'] === 1) {
            $activeLesson = $lesson;
            break;
        }
    }
}



$activeLessonId = $activeLesson['id'] ?? null;

if ($activeLessonId && $userId) {
    $stmt = $conn->prepare("\n        SELECT note_content, created_at\n        FROM lesson_notes\n        WHERE user_id = ? AND lesson_id = ?\n        ORDER BY created_at DESC\n        LIMIT 10\n    ");
    $stmt->execute([$userId, $activeLessonId]);
    $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt = $conn->prepare("\n        SELECT question, created_at\n        FROM lesson_questions\n        WHERE lesson_id = ?\n        ORDER BY created_at DESC\n        LIMIT 10\n    ");
    $stmt->execute([$activeLessonId]);
    $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$completedCount = 0;
foreach ($progressMap as $status) {
    if ($status === 'completed') {
        $completedCount++;
    }
}

$totalCount = count($lessons);
$progressPercent = $totalCount > 0 ? round(($completedCount / $totalCount) * 100) : 0;

$activeResources = $activeLessonId ? ($resourcesByLesson[$activeLessonId] ?? []) : [];
$activeTitle = $activeLesson['title'] ?? 'Lesson';
$activeDuration = $activeLesson['video_duration'] ?? '';
$activeDescription = $activeLesson['description'] ?? '';
$activeContent = $activeLesson['content'] ?? '';
$activeVideoUrl = $activeLesson['video_url'] ?? '';

include(__DIR__ . '/..\includes\header\header.php');
include(__DIR__ . '/..\includes\navbar\navbar.php');
include(__DIR__ . '/..\includes\sidebar\sidebar.php');
?>

<style>
    .lesson-item:hover {
        background-color: #f8f9fa;
        cursor: pointer;
    }
    .lesson-item.active {
        background-color: #0d6efd;
        color: white;
    }
    .lesson-item.active .text-muted {
        color: rgba(255,255,255,0.7) !important;
    }
    .lesson-item.disabled {
        opacity: 0.7;
    }
    .video-container {
        position: relative;
        background: #000;
    }
    .video-placeholder {
        background: #111;
        color: #fff;
        min-height: 320px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 24px;
    }
</style>

<div class="container-fluid py-4">
    <div class="row">
        <!-- Sidebar - Course Content -->
        <div class="col-lg-3 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h6 class="mb-0"><i class="bi bi-list-ul me-2"></i>Course Content</h6>
                </div>
                <div class="card-body p-0" style="max-height: 600px; overflow-y: auto;">
                    <?php if (!$course): ?>
                        <div class="p-3 text-muted">No course found.</div>
                    <?php elseif (empty($modules)): ?>
                        <div class="p-3 text-muted">No modules available yet.</div>
                    <?php else: ?>
                        <div class="accordion accordion-flush">
                            <?php foreach ($modules as $index => $module): ?>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button <?php echo $index === 0 ? '' : 'collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#module<?php echo (int)$module['id']; ?>">
                                            <strong><?php echo esc(($index + 1) . '. ' . $module['title']); ?></strong>
                                        </button>
                                    </h2>
                                    <div id="module<?php echo (int)$module['id']; ?>" class="accordion-collapse collapse <?php echo $index === 0 ? 'show' : ''; ?>">
                                        <div class="list-group list-group-flush">
                                            <?php foreach (($lessonsByModule[$module['id']] ?? []) as $lesson): ?>
                                                <?php
                                                $isCompleted = isset($progressMap[(int)$lesson['id']]) && $progressMap[(int)$lesson['id']] === 'completed';
                                                $isActive = $activeLessonId && (int)$lesson['id'] === (int)$activeLessonId;
                                                $isLocked = !$enrolled && (int)$lesson['is_free_preview'] !== 1;
                                                $iconClass = $isCompleted ? 'bi-check-circle-fill text-success' : ($isActive ? 'bi-play-circle' : 'bi-circle');
                                                ?>
                                                <a href="#" class="list-group-item lesson-item <?php echo $isActive ? 'active' : ''; ?> <?php echo $isLocked ? 'disabled' : ''; ?>"
                                                   data-lesson-id="<?php echo (int)$lesson['id']; ?>"
                                                   data-video-url="<?php echo esc(!$isLocked ? ($lesson['video_url'] ?? '') : ''); ?>"
                                                   data-title="<?php echo esc($lesson['title']); ?>"
                                                   data-duration="<?php echo esc($lesson['video_duration'] ?? ''); ?>"
                                                   data-description="<?php echo esc(!$isLocked ? ($lesson['description'] ?? '') : ''); ?>"
                                                   data-content="<?php echo esc(!$isLocked ? ($lesson['content'] ?? '') : ''); ?>"
                                                   data-lesson-type="<?php echo esc($lesson['lesson_type'] ?? 'video'); ?>"
                                                   data-locked="<?php echo $isLocked ? '1' : '0'; ?>"
                                                   <?php echo $isLocked ? 'aria-disabled="true"' : ''; ?>>
                                                    <div class="d-flex align-items-center">
                                                        <i class="bi <?php echo $iconClass; ?> me-2"></i>
                                                        <div class="flex-grow-1">
                                                            <div class="small"><?php echo esc($lesson['title']); ?></div>
                                                            <div class="text-muted" style="font-size: 0.7rem;">
                                                                <?php if (!empty($lesson['video_duration'])): ?>
                                                                    <i class="bi bi-clock me-1"></i><?php echo esc($lesson['video_duration']); ?>
                                                                <?php else: ?>
                                                                    <i class="bi bi-clock me-1"></i>--:--
                                                                <?php endif; ?>
                                                                <?php if ((int)$lesson['is_free_preview'] === 1): ?>
                                                                    <span class="badge bg-success ms-1">Preview</span>
                                                                <?php endif; ?>
                                                                <?php if ($isLocked): ?>
                                                                    <span class="badge bg-secondary ms-1">Locked</span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Progress Card -->
            <div class="card shadow-sm mt-3">
                <div class="card-body">
                    <h6 class="fw-bold mb-3">Your Progress</h6>
                    <div class="progress mb-2" style="height: 25px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo (int)$progressPercent; ?>%;" id="progressBar">
                            <?php echo (int)$progressPercent; ?>%
                        </div>
                    </div>
                    <p class="small text-muted mb-0">
                        <span id="completedCount"><?php echo (int)$completedCount; ?></span> of <span id="totalCount"><?php echo (int)$totalCount; ?></span> lessons completed
                    </p>
                </div>
            </div>
        </div>

        <!-- Main Content - Video Player -->
        <div class="col-lg-9">
            <!-- Course Header -->
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h3 class="fw-bold mb-2"><?php echo esc($course['title'] ?? 'Course'); ?></h3>
                            <p class="text-muted mb-0">
                                <i class="bi bi-person-fill me-1"></i><?php echo esc($course['instructor'] ?? 'TechWorld Academy'); ?>
                            </p>
                        </div>
                        <a href="/Courses/courses.php" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-2"></i>Back to Courses
                        </a>
                    </div>
                </div>
            </div>

            <!-- Video Player -->
            <div class="card shadow-sm mb-4">
                <div class="video-container">
                    <?php if ($activeVideoUrl): ?>
                        <div class="ratio ratio-16x9">
                            <iframe
                                id="videoPlayer"
                                src="<?php echo esc($activeVideoUrl); ?>"
                                title="Lesson video"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen>
                            </iframe>
                        </div>
                    <?php else: ?>
                        <div class="video-placeholder">
                            <div>
                                <h5 class="mb-2">No video available</h5>
                                <p class="mb-0">This lesson does not include a video. Check the overview tab for lesson content.</p>
                            </div>
                        </div>
                        <iframe id="videoPlayer" src="about:blank" style="display:none" title="Lesson video"></iframe>
                    <?php endif; ?>
                </div>
                <div class="card-footer bg-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="fw-bold mb-1" id="currentLessonTitle"><?php echo esc($activeTitle); ?></h5>
                            <p class="text-muted small mb-0">
                                <i class="bi bi-clock me-1"></i><span id="currentDuration"><?php echo esc($activeDuration ?: '--:--'); ?></span>
                            </p>
                        </div>
                        <?php
                        $activeCompleted = $activeLessonId && isset($progressMap[(int)$activeLessonId]) && $progressMap[(int)$activeLessonId] === 'completed';
                        ?>
                        <button class="btn <?php echo $activeCompleted ? 'btn-secondary' : 'btn-success'; ?>" id="markCompleteBtn" <?php echo ($activeCompleted || !$activeLessonId || !$enrolled) ? 'disabled' : ''; ?>>
                            <i class="bi <?php echo $activeCompleted ? 'bi-check-circle-fill' : 'bi-check-circle'; ?> me-1"></i><?php echo $activeCompleted ? dash_t('Completed') : ((!$activeLessonId || !$enrolled) ? 'Enroll to continue' : dash_t('Mark Complete')); ?>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Tabs -->
            <div class="card shadow-sm">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#overview">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#resources">
                                Resources <span class="badge bg-primary" id="resourceCount"><?php echo count($activeResources); ?></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#notes">My Notes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#qa">Q&A</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="overview">
                            <h5 class="fw-bold mb-3">About This Lesson</h5>
                            <p id="lessonDescription"><?php echo esc($activeDescription ?: dash_t('No description available for this lesson.')); ?></p>
                            <?php if (!empty($activeContent)): ?>
                                <hr>
                                <div id="lessonContent"><?php echo nl2br(esc($activeContent)); ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="tab-pane fade" id="resources">
                            <h5 class="fw-bold mb-3">Downloadable Resources</h5>
                            <div class="list-group" id="resourceList">
                                <?php if (empty($activeResources)): ?>
                                    <div class="text-muted">No resources for this lesson.</div>
                                <?php else: ?>
                                    <?php foreach ($activeResources as $resource): ?>
                                        <a href="<?php echo esc($resource['file_path']); ?>" class="list-group-item list-group-item-action" download>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <i class="bi bi-file-earmark-text text-primary me-2"></i>
                                                    <?php echo esc($resource['title'] ?? $resource['file_name']); ?>
                                                </div>
                                                <span class="text-muted small">
                                                    <?php echo !empty($resource['file_size']) ? number_format($resource['file_size'] / 1024, 1) . ' KB' : ''; ?>
                                                    <i class="bi bi-download ms-2"></i>
                                                </span>
                                            </div>
                                        </a>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="notes">
                            <h5 class="fw-bold mb-3">My Notes</h5>
                            <form id="notesForm" class="mb-4">
                                <textarea class="form-control mb-2" rows="4" placeholder="Take notes while watching..." required></textarea>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save me-1"></i>Save Notes
                                </button>
                            </form>
                            <hr>
                            <h6 class="fw-bold mb-3">Previous Notes</h6>
                            <div id="notesList">
                                <?php if (empty($notes)): ?>
                                    <p class="text-muted mb-0">No notes for this lesson yet.</p>
                                <?php else: ?>
                                    <?php foreach ($notes as $note): ?>
                                        <div class="alert alert-info">
                                            <small class="text-muted d-block mb-1">
                                                <i class="bi bi-calendar me-1"></i><?php echo esc(date('M j, Y - g:i A', strtotime($note['created_at']))); ?>
                                            </small>
                                            <p class="mb-0"><?php echo esc($note['note_content']); ?></p>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="qa">
                            <h5 class="fw-bold mb-3">Questions & Answers</h5>
                            <form id="questionForm" class="mb-4">
                                <textarea class="form-control mb-2" rows="3" placeholder="Ask a question about this lesson..." required></textarea>
                                <button type="submit" class="btn btn-primary">Ask Question</button>
                            </form>
                            <hr>
                            <div id="questionsList">
                                <?php if (empty($questions)): ?>
                                    <p class="text-muted">No questions yet. Be the first to ask!</p>
                                <?php else: ?>
                                    <?php foreach ($questions as $question): ?>
                                        <div class="alert alert-light border">
                                            <small class="text-muted d-block mb-1">
                                                <i class="bi bi-calendar me-1"></i><?php echo esc(date('M j, Y - g:i A', strtotime($question['created_at']))); ?>
                                            </small>
                                            <p class="mb-0"><?php echo esc($question['question']); ?></p>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function getCsrfToken() {
    const meta = document.querySelector('meta[name="csrf-token"]');
    return meta ? meta.getAttribute('content') : '';
}

function getActiveLessonId() {
    const activeLesson = document.querySelector('.lesson-item.active');
    if (!activeLesson) return null;
    const id = activeLesson.dataset.lessonId;
    return id ? parseInt(id, 10) : null;
}

const lessonResources = <?php echo json_encode($resourcesByLesson, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT); ?>;

function updateResources(lessonId) {
    const container = document.getElementById('resourceList');
    const countBadge = document.getElementById('resourceCount');
    if (!container) return;

    container.innerHTML = '';
    const resources = lessonResources[String(lessonId)] || [];

    if (countBadge) {
        countBadge.textContent = resources.length;
    }

    if (!resources.length) {
        const empty = document.createElement('div');
        empty.className = 'text-muted';
        empty.textContent = window.twDashTranslate('No resources for this lesson.');
        container.appendChild(empty);
        return;
    }

    resources.forEach(resource => {
        const link = document.createElement('a');
        link.className = 'list-group-item list-group-item-action';
        link.href = resource.file_path || '#';
        link.setAttribute('download', '');

        const wrapper = document.createElement('div');
        wrapper.className = 'd-flex justify-content-between align-items-center';

        const left = document.createElement('div');
        left.innerHTML = '<i class="bi bi-file-earmark-text text-primary me-2"></i>' + (resource.title || resource.file_name || 'Resource');

        const right = document.createElement('span');
        right.className = 'text-muted small';
        if (resource.file_size) {
            right.textContent = (resource.file_size / 1024).toFixed(1) + ' KB ';
        }
        const icon = document.createElement('i');
        icon.className = 'bi bi-download ms-2';
        right.appendChild(icon);

        wrapper.appendChild(left);
        wrapper.appendChild(right);
        link.appendChild(wrapper);
        container.appendChild(link);
    });
}

function setLessonContent(data) {
    const titleEl = document.getElementById('currentLessonTitle');
    const durationEl = document.getElementById('currentDuration');
    const descEl = document.getElementById('lessonDescription');
    const contentEl = document.getElementById('lessonContent');

    if (titleEl) titleEl.textContent = data.title || 'Lesson';
    if (durationEl) durationEl.textContent = data.duration || '--:--';
    if (descEl) descEl.textContent = data.description || dash_t('No description available for this lesson.');
    if (contentEl) {
        contentEl.textContent = data.content || '';
        contentEl.style.display = data.content ? 'block' : 'none';
    }
}

function setVideoSource(url) {
    const videoPlayer = document.getElementById('videoPlayer');
    if (!videoPlayer) return;

    if (!url) {
        videoPlayer.src = 'about:blank';
        return;
    }

    const separator = url.includes('?') ? '&' : '?';
    videoPlayer.src = url + separator + 'autoplay=1';
}

function updateMarkCompleteButton(isCompleted) {
    const btn = document.getElementById('markCompleteBtn');
    if (!btn) return;

    if (isCompleted) {
        btn.innerHTML = '<i class="bi bi-check-circle-fill me-1"></i>Completed';
        btn.classList.remove('btn-success');
        btn.classList.add('btn-secondary');
        btn.disabled = true;
    } else {
        btn.innerHTML = '<i class="bi bi-check-circle me-1"></i>Mark Complete';
        btn.classList.remove('btn-secondary');
        btn.classList.add('btn-success');
        btn.disabled = false;
    }
}

function resetLessonLists() {
    const notesList = document.getElementById('notesList');
    const questionsList = document.getElementById('questionsList');

    if (notesList) {
        notesList.innerHTML = '<p class="text-muted mb-0">No notes for this lesson yet.</p>';
    }

    if (questionsList) {
        questionsList.innerHTML = '<p class="text-muted">No questions yet. Be the first to ask!</p>';
    }
}

// Lesson click handler
Array.from(document.querySelectorAll('.lesson-item')).forEach(item => {
    item.addEventListener('click', function(e) {
        e.preventDefault();

        if (this.dataset.locked === '1') {
            showNotification('This lesson is locked. Enroll to access full content.', 'warning');
            return;
        }

        document.querySelectorAll('.lesson-item').forEach(l => l.classList.remove('active'));
        this.classList.add('active');

        const data = {
            title: this.dataset.title,
            duration: this.dataset.duration,
            description: this.dataset.description,
            content: this.dataset.content
        };

        setLessonContent(data);
        setVideoSource(this.dataset.videoUrl);

        const icon = this.querySelector('i');
        const isCompleted = icon && icon.classList.contains('bi-check-circle-fill');
        updateMarkCompleteButton(isCompleted);

        const lessonId = parseInt(this.dataset.lessonId, 10);
        if (lessonId) {
            updateResources(lessonId);
        }

        resetLessonLists();
    });
});

// Mark complete handler
document.getElementById('markCompleteBtn').addEventListener('click', async function() {
    const lessonId = getActiveLessonId();
    if (!lessonId) {
        showNotification('Lesson ID missing.', 'danger');
        return;
    }

    try {
        const response = await fetch('/lms-dashboard/ajax/mark_lesson_complete/mark_lesson_complete.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-Token': getCsrfToken()
            },
            body: JSON.stringify({ lesson_id: lessonId, csrf_token: getCsrfToken() })
        });
        const data = await response.json();
        if (!data.success) {
            showNotification(data.message || 'Failed to update progress.', 'danger');
            return;
        }

        const activeLesson = document.querySelector('.lesson-item.active');
        if (activeLesson) {
            const icon = activeLesson.querySelector('i');
            if (icon) {
                icon.classList.remove('bi-circle', 'bi-play-circle');
                icon.classList.add('bi-check-circle-fill', 'text-success');
            }
        }

        if (typeof data.completed_lessons !== 'undefined' && typeof data.total_lessons !== 'undefined') {
            const completed = Number(data.completed_lessons) || 0;
            const total = Number(data.total_lessons) || 0;
            const percentage = total > 0 ? Math.round((completed / total) * 100) : 0;

            document.getElementById('progressBar').style.width = percentage + '%';
            document.getElementById('progressBar').textContent = percentage + '%';
            document.getElementById('completedCount').textContent = completed;
            document.getElementById('totalCount').textContent = total;
        }

        updateMarkCompleteButton(true);
        showNotification('Lesson marked as complete! ÃƒÆ’Ã‚Â°Ãƒâ€¦Ã‚Â¸Ãƒâ€¦Ã‚Â½ÃƒÂ¢Ã¢â€šÂ¬Ã‚Â°', 'success');
    } catch (err) {
        showNotification('Network error. Please try again.', 'danger');
    }
});

// Save notes handler
document.getElementById('notesForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    const textarea = this.querySelector('textarea');
    const note = textarea.value.trim();
    const lessonId = getActiveLessonId();

    if (!lessonId) {
        showNotification('Lesson ID missing.', 'danger');
        return;
    }

    if (note) {
        try {
            const form = new FormData();
            form.append('lesson_id', lessonId);
            form.append('note_content', note);
            form.append('csrf_token', getCsrfToken());

            const response = await fetch('/lms-dashboard/ajax/save_note/save_note.php', {
                method: 'POST',
                headers: { 'X-CSRF-Token': getCsrfToken() },
                body: form
            });
            const data = await response.json();
            if (!data.success) {
                showNotification(data.message || 'Failed to save note.', 'danger');
                return;
            }

            const now = new Date();
            const noteEl = document.createElement('div');
            noteEl.className = 'alert alert-info';
            noteEl.innerHTML = `
                <small class="text-muted d-block mb-1">
                    <i class="bi bi-calendar me-1"></i>${now.toLocaleString('en-US', { month: 'short', day: 'numeric', year: 'numeric', hour: '2-digit', minute: '2-digit' })}
                </small>
            `;
            const p = document.createElement('p');
            p.className = 'mb-0';
            p.textContent = note;
            noteEl.appendChild(p);
            document.getElementById('notesList').insertAdjacentElement('afterbegin', noteEl);
            textarea.value = '';
            showNotification('Note saved successfully!', 'success');
        } catch (err) {
            showNotification('Network error. Please try again.', 'danger');
        }
    }
});

// Ask question handler
document.getElementById('questionForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    const textarea = this.querySelector('textarea');
    const question = textarea.value.trim();
    const lessonId = getActiveLessonId();
    if (!lessonId) {
        showNotification('Lesson ID missing.', 'danger');
        return;
    }
    if (!question) {
        showNotification('Please enter a question.', 'danger');
        return;
    }

    try {
        const form = new FormData();
        form.append('lesson_id', lessonId);
        form.append('question', question);
        form.append('csrf_token', getCsrfToken());

        const response = await fetch('/lms-dashboard/ajax/ask_question/ask_question.php', {
            method: 'POST',
            headers: { 'X-CSRF-Token': getCsrfToken() },
            body: form
        });
        const data = await response.json();
        if (!data.success) {
            showNotification(data.message || 'Failed to post question.', 'danger');
            return;
        }
        textarea.value = '';
        showNotification('Question posted successfully!', 'success');
    } catch (err) {
        showNotification('Network error. Please try again.', 'danger');
    }
});

// Notification helper
function showNotification(message, type) {
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-${type} alert-dismissible fade show position-fixed top-0 end-0 m-3`;
    alertDiv.style.zIndex = '9999';
    alertDiv.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    document.body.appendChild(alertDiv);
    setTimeout(() => alertDiv.remove(), 3000);
}
</script>

<?php include(__DIR__ . '/..\includes\footer\footer.php'); ?>




