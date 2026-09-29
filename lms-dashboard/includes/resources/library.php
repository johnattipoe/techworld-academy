<?php
declare(strict_types=1);

require_once __DIR__ . '/../auth/auth.php';
require_once __DIR__ . '/../../../Database/db/db.php';

$resourceTypes = [
    'documents' => ['table'=>'documents','title'=>'Documents','icon'=>'bi-file-earmark-text','search'=>['title','description','course_name','category']],
    'videos' => ['table'=>'resource_videos','title'=>'Video library','icon'=>'bi-play-btn','search'=>['title','course_name','category','instructor_name']],
    'ebooks' => ['table'=>'ebooks','title'=>'E-books','icon'=>'bi-book-half','search'=>['title','author','description','category']],
    'articles' => ['table'=>'articles','title'=>'Articles','icon'=>'bi-newspaper','search'=>['title','author','excerpt','content','category']],
    'tutorials' => ['table'=>'tutorials','title'=>'Tutorials','icon'=>'bi-play-circle','search'=>['title','description','category','instructor_name']],
];
$type = is_string($resourceType ?? null) ? $resourceType : '';
if (!isset($resourceTypes[$type])) {
    http_response_code(404);
    exit('Resource page not found.');
}
$config = $resourceTypes[$type];
$pageTitle = $config['title'];
$search = trim((string)($_GET['search'] ?? ''));
$category = trim((string)($_GET['category'] ?? ''));
$itemId = filter_var($_GET['id'] ?? null, FILTER_VALIDATE_INT);
$page = max(1, (int)($_GET['page'] ?? 1));
$perPage = 18;
$categories = $items = [];
$totalItems = 0;
$detail = null;
$loadError = '';

try {
    $pdo = get_db();
    $categories = $pdo->query('SELECT DISTINCT category FROM ' . $config['table'] . " WHERE category IS NOT NULL AND category <> '' ORDER BY category")->fetchAll(PDO::FETCH_COLUMN);
    if ($itemId) {
        $stmt = $pdo->prepare('SELECT * FROM ' . $config['table'] . ' WHERE id = ? LIMIT 1');
        $stmt->execute([$itemId]);
        $detail = $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
        if (!$detail) http_response_code(404);
    } else {
        $where = [];
        $params = [];
        if ($search !== '') {
            $or = [];
            foreach ($config['search'] as $column) {
                $or[] = $column . ' LIKE ?';
                $params[] = '%' . $search . '%';
            }
            $where[] = '(' . implode(' OR ', $or) . ')';
        }
        if ($category !== '') {
            $where[] = 'category = ?';
            $params[] = $category;
        }
        $clause = $where ? ' WHERE ' . implode(' AND ', $where) : '';
        $count = $pdo->prepare('SELECT COUNT(*) FROM ' . $config['table'] . $clause);
        $count->execute($params);
        $totalItems = (int)$count->fetchColumn();
        $sort = match ($type) {
            'videos' => 'views DESC, uploaded_date DESC',
            'ebooks' => 'rating DESC, downloads DESC',
            'articles' => 'featured DESC, published_date DESC',
            'tutorials' => 'rating DESC, students_count DESC',
            default => 'uploaded_date DESC, created_at DESC',
        };
        $stmt = $pdo->prepare('SELECT * FROM ' . $config['table'] . $clause . ' ORDER BY ' . $sort . ' LIMIT ' . $perPage . ' OFFSET ' . (($page - 1) * $perPage));
        $stmt->execute($params);
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (Throwable $e) {
    error_log('LMS resource query failed (' . $type . '): ' . $e->getMessage());
    $loadError = 'Resources are temporarily unavailable. Please try again later.';
}

$e = static fn($value): string => htmlspecialchars((string)($value ?? ''), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
$safeResourceUrl = static function ($value): string {
    if (!is_string($value) || trim($value) === '') return '';
    $value = trim($value);
    if (preg_match('~^https?://~i', $value) && filter_var($value, FILTER_VALIDATE_URL)) return $value;
    $uploadRoot = realpath(__DIR__ . '/../../../upload');
    $candidate = $uploadRoot ? realpath($uploadRoot . DIRECTORY_SEPARATOR . basename($value)) : false;
    return $uploadRoot && $candidate && str_starts_with($candidate, $uploadRoot . DIRECTORY_SEPARATOR) && is_file($candidate)
        ? '/upload/' . rawurlencode(basename($candidate)) : '';
};
include __DIR__ . '/../header/header.php';
include __DIR__ . '/../navbar/navbar.php';
include __DIR__ . '/../sidebar/sidebar.php';
?>
<main class="container-fluid py-4">
  <header class="d-flex flex-wrap justify-content-between align-items-end gap-3 mb-4">
    <div><span class="text-uppercase small text-primary fw-semibold">LEARNING RESOURCES</span><h1 class="h2 fw-bold mb-1"><?= $e($config['title']) ?></h1><p class="text-muted mb-0">Search and browse materials from the academy library.</p></div>
    <span class="badge text-bg-light p-2"><?= number_format($totalItems) ?> resources</span>
  </header>
  <?php if ($loadError): ?><div class="alert alert-warning" role="status"><?= $e($loadError) ?></div><?php endif; ?>
  <?php if ($detail): ?>
    <?php $title=$detail['title']??'Resource'; $body=$detail['content']??$detail['description']??$detail['excerpt']??''; $media=$safeResourceUrl($detail['video_path']??''); ?>
    <a class="btn btn-outline-secondary mb-3" href="<?= $e(strtok($_SERVER['REQUEST_URI'], '?')) ?>"><i class="bi bi-arrow-left me-1"></i>Back to library</a>
    <article class="card border-0 shadow-sm"><div class="card-body p-4 p-lg-5">
      <span class="badge text-bg-primary mb-3"><?= $e($detail['category']??'Learning resource') ?></span><h2 class="fw-bold"><?= $e($title) ?></h2>
      <p class="text-muted"><?= $e($detail['author']??$detail['instructor_name']??$detail['course_name']??'') ?></p>
      <?php if ($type==='videos' && $media): ?><div class="ratio ratio-16x9 mb-4"><video controls preload="metadata" src="<?= $e($media) ?>">Your browser does not support video playback.</video></div><?php endif; ?>
      <div><?= nl2br($e($body ?: 'Additional details for this resource have not been added yet.')) ?></div>
      <?php if (in_array($type,['documents','ebooks'],true)): $file=$safeResourceUrl($detail['file_path']??''); ?>
        <div class="mt-4"><?php if($file): ?><a class="btn btn-primary" href="<?= $e($file) ?>" download><i class="bi bi-download me-1"></i>Download file</a><?php else: ?><span class="text-muted">No downloadable file is attached yet.</span><?php endif; ?></div>
      <?php elseif ($type==='videos' && !$media): ?><div class="alert alert-info mt-4 mb-0">A video file has not been attached yet.</div><?php endif; ?>
    </div></article>
  <?php else: ?>
    <form method="get" class="card border-0 shadow-sm mb-4"><div class="card-body"><div class="row g-3 align-items-end">
      <div class="col-lg-6"><label class="form-label" for="resourceSearch">Search</label><input class="form-control" id="resourceSearch" type="search" name="search" value="<?= $e($search) ?>" placeholder="Search titles, topics, authors..."></div>
      <div class="col-lg-4"><label class="form-label" for="resourceCategory">Category</label><select class="form-select" id="resourceCategory" name="category"><option value="">All categories</option><?php foreach($categories as $option): ?><option value="<?= $e($option) ?>" <?= $category===$option?'selected':'' ?>><?= $e($option) ?></option><?php endforeach; ?></select></div>
      <div class="col-lg-2 d-flex gap-2"><button class="btn btn-primary flex-grow-1" type="submit">Filter</button><a class="btn btn-outline-secondary" href="<?= $e(strtok($_SERVER['REQUEST_URI'], '?')) ?>">Clear</a></div>
    </div></div></form>
    <div class="row g-4">
      <?php foreach($items as $item): $id=(int)$item['id']; $media=$safeResourceUrl($item['thumbnail']??$item['image']??''); ?>
      <div class="col-sm-6 col-xl-4"><article class="card h-100 border-0 shadow-sm">
        <?php if($type==='videos' && $media): ?><img src="<?= $e($media) ?>" class="card-img-top" alt="" style="height:190px;object-fit:cover"><?php else: ?><div class="d-flex align-items-center justify-content-center bg-light text-primary" style="height:130px"><i class="bi <?= $e($config['icon']) ?> fs-1"></i></div><?php endif; ?>
        <div class="card-body d-flex flex-column"><div class="d-flex justify-content-between gap-2 mb-2"><span class="badge text-bg-light"><?= $e($item['category']??'General') ?></span><?php if(!empty($item['difficulty_level'])): ?><span class="small text-muted"><?= $e($item['difficulty_level']) ?></span><?php endif; ?></div>
          <h2 class="h5"><?= $e($item['title']??'Untitled') ?></h2><p class="small text-muted"><?= $e($item['description']??$item['excerpt']??'') ?></p>
          <div class="small text-muted mb-3"><?php if(!empty($item['author'])): ?>By <?= $e($item['author']) ?><?php elseif(!empty($item['instructor_name'])): ?>By <?= $e($item['instructor_name']) ?><?php endif; ?><?php if(!empty($item['duration'])): ?> | <?= $e($item['duration']) ?><?php endif; ?></div>
          <div class="mt-auto d-flex justify-content-between align-items-center"><span class="small text-muted"><?php if(isset($item['rating'])): ?>Rating <?= number_format((float)$item['rating'],1) ?><?php elseif(isset($item['downloads'])): ?><?= number_format((int)$item['downloads']) ?> downloads<?php endif; ?></span><a class="btn btn-sm btn-primary" href="?id=<?= $id ?>">View details</a></div>
        </div></article></div>
      <?php endforeach; ?>
      <?php if(!$items && !$loadError): ?><div class="col-12"><div class="card border-0 text-center p-5"><i class="bi <?= $e($config['icon']) ?> fs-1 text-muted"></i><h2 class="h5 mt-3">No resources found</h2><p class="text-muted mb-0">Try a different search or category.</p></div></div><?php endif; ?>
    </div>
    <?php $pages=(int)ceil($totalItems/$perPage); if($pages>1): ?><nav class="mt-4" aria-label="Resource pages"><ul class="pagination justify-content-center"><?php for($n=1;$n<=$pages;$n++): ?><li class="page-item <?= $n===$page?'active':'' ?>"><a class="page-link" href="?<?= http_build_query(['search'=>$search,'category'=>$category,'page'=>$n]) ?>"><?= $n ?></a></li><?php endfor; ?></ul></nav><?php endif; ?>
  <?php endif; ?>
</main>
<?php include __DIR__ . '/../footer/footer.php'; ?>
