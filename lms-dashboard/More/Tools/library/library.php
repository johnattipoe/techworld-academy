<?php
session_start();
require_once(__DIR__ . '/../../../includes/auth/auth.php');
require_once(__DIR__ . '/../../../../Database/db/db.php');
$pdo = get_db();
$libraryItems = [];
$historyCount = 0;
try {
    $sql = "SELECT id,title,author,category,'E-Book' AS type,'' AS cover,description,pages,published_year AS year,rating,CASE WHEN COALESCE(file_path,'') <> '' THEN 'Available' ELSE 'Catalog only' END AS status,COALESCE(file_format,'PDF') AS format FROM ebooks
            UNION ALL
            SELECT id,title,COALESCE(course_name,'TechWorld Academy') AS author,category,'Document' AS type,'' AS cover,description,pages,YEAR(uploaded_date) AS year,0 AS rating,CASE WHEN COALESCE(file_path,'') <> '' THEN 'Available' ELSE 'Catalog only' END AS status,COALESCE(file_type,'PDF') AS format FROM documents
            ORDER BY title";
    $libraryItems = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    $accessStmt = $pdo->prepare('SELECT COUNT(DISTINCT resource_type, resource_id) FROM user_resource_access WHERE user_id = ?');
    $accessStmt->execute([(int)$_SESSION['user_id']]);
    $historyCount = (int)$accessStmt->fetchColumn();
} catch (PDOException $e) {
    error_log('LMS library catalogue query failed: ' . $e->getMessage());
}
include(__DIR__ . '/../../../includes/header/header.php');
include(__DIR__ . '/../../../includes/navbar/navbar.php');
include(__DIR__ . '/../../../includes/sidebar/sidebar.php');
?>
<div class="container-fluid mt-5 mb-5">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-3"><i class="bi bi-collection me-2"></i>Digital Library</h1>
            <p class="lead">Access a vast collection of books, research papers, and educational resources.</p>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card bg-primary text-white">
                <div class="card-body text-center">
                    <i class="bi bi-book fs-1"></i>
                    <h3 class="mt-2"><?php echo count($libraryItems); ?></h3>
                    <p class="mb-0">Total Books</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card bg-success text-white">
                <div class="card-body text-center">
                    <i class="bi bi-check-circle fs-1"></i>
                    <h3 class="mt-2"><?php echo count(array_filter($libraryItems, function($item) { return $item['status'] == 'Available'; })); ?></h3>
                    <p class="mb-0">Available</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card bg-warning text-white">
                <div class="card-body text-center">
                    <i class="bi bi-bookmark-fill fs-1"></i>
                    <h3 class="mt-2"><?php echo count(array_unique(array_filter(array_column($libraryItems, 'category')))); ?></h3>
                    <p class="mb-0">Categories</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card bg-info text-white">
                <div class="card-body text-center">
                    <i class="bi bi-clock-history fs-1"></i>
                    <h3 class="mt-2"><?php echo $historyCount; ?></h3>
                    <p class="mb-0">Resources viewed</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Search and Filter Section -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-search"></i></span>
                        <input type="text" id="searchLibrary" class="form-control" placeholder="Search by title or author...">
                    </div>
                </div>
                <div class="col-md-3">
                    <select id="categoryFilter" class="form-select">
                        <option value="">All Categories</option>
                        <?php foreach($categories as $cat): ?>
                            <?php if($cat !== 'All'): ?>
                                <option value="<?php echo $cat; ?>"><?php echo $cat; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <select id="typeFilter" class="form-select">
                        <option value="">All Types</option>
                        <?php foreach($types as $type): ?>
                            <?php if($type !== 'All'): ?>
                                <option value="<?php echo $type; ?>"><?php echo $type; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <select id="statusFilter" class="form-select">
                        <option value="">All Status</option>
                        <option value="Available">Available</option>
                        <option value="Borrowed">Borrowed</option>
                    </select>
                </div>
                <div class="col-md-1">
                    <button class="btn btn-outline-secondary w-100" id="resetFilters">
                        <i class="bi bi-arrow-clockwise"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Library Items Grid -->
    <div class="row" id="libraryContainer">
        <?php foreach($libraryItems as $item): ?>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4 library-item" 
             data-title="<?php echo strtolower($item['title'] . ' ' . $item['author']); ?>"
             data-category="<?php echo $item['category']; ?>"
             data-type="<?php echo $item['type']; ?>"
             data-status="<?php echo $item['status']; ?>">
            <div class="card h-100 shadow-sm hover-effect">
                <div class="position-relative">
                    <img src="<?php echo $item['cover']; ?>" class="card-img-top" alt="<?php echo $item['title']; ?>" style="height: 300px; object-fit: cover;">
                    <span class="position-absolute top-0 end-0 badge bg-<?php echo $item['status'] == 'Available' ? 'success' : 'warning'; ?> m-2">
                        <?php echo $item['status']; ?>
                    </span>
                    <span class="position-absolute top-0 start-0 badge bg-primary m-2">
                        <?php echo $item['type']; ?>
                    </span>
                </div>
                <div class="card-body d-flex flex-column">
                    <span class="badge bg-secondary mb-2 align-self-start"><?php echo $item['category']; ?></span>
                    <h5 class="card-title"><?php echo $item['title']; ?></h5>
                    <p class="text-muted small mb-2"><i class="bi bi-person"></i> <?php echo $item['author']; ?></p>
                    <p class="card-text text-muted small flex-grow-1"><?php echo $item['description']; ?></p>
                    
                    <div class="mt-2">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <small class="text-muted">
                                <i class="bi bi-file-earmark-text"></i> <?php echo $item['pages']; ?> pages
                            </small>
                            <small class="text-warning">
                                <i class="bi bi-star-fill"></i> <?php echo $item['rating']; ?>
                            </small>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <small class="text-muted">
                                <i class="bi bi-calendar"></i> <?php echo $item['year']; ?>
                            </small>
                            <small class="text-muted">
                                <i class="bi bi-file-earmark-arrow-down"></i> <?php echo $item['format']; ?>
                            </small>
                        </div>
                        
                        <div class="btn-group w-100" role="group">
                            <button class="btn btn-primary btn-sm" <?php echo $item['status'] != 'Available' ? 'disabled' : ''; ?>>
                                <i class="bi bi-book"></i> Read
                            </button>
                            <button class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-download"></i>
                            </button>
                            <button class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-bookmark"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- No Results Message -->
    <div id="noResults" class="alert alert-info text-center" style="display: none;">
        <i class="bi bi-info-circle fs-3 d-block mb-2"></i>
        <h5>No items found</h5>
        <p>Try adjusting your search or filter criteria.</p>
    </div>
</div>

<style>
.hover-effect {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.hover-effect:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15) !important;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchLibrary');
    const categoryFilter = document.getElementById('categoryFilter');
    const typeFilter = document.getElementById('typeFilter');
    const statusFilter = document.getElementById('statusFilter');
    const resetBtn = document.getElementById('resetFilters');
    const noResults = document.getElementById('noResults');
    
    function filterLibrary() {
        const searchTerm = searchInput.value.toLowerCase();
        const selectedCategory = categoryFilter.value;
        const selectedType = typeFilter.value;
        const selectedStatus = statusFilter.value;
        
        const items = document.querySelectorAll('.library-item');
        let visibleCount = 0;
        
        items.forEach(item => {
            const title = item.dataset.title;
            const category = item.dataset.category;
            const type = item.dataset.type;
            const status = item.dataset.status;
            
            const matchesSearch = title.includes(searchTerm);
            const matchesCategory = !selectedCategory || category === selectedCategory;
            const matchesType = !selectedType || type === selectedType;
            const matchesStatus = !selectedStatus || status === selectedStatus;
            
            if (matchesSearch && matchesCategory && matchesType && matchesStatus) {
                item.style.display = '';
                visibleCount++;
            } else {
                item.style.display = 'none';
            }
        });
        
        noResults.style.display = visibleCount === 0 ? 'block' : 'none';
    }
    
    searchInput.addEventListener('input', filterLibrary);
    categoryFilter.addEventListener('change', filterLibrary);
    typeFilter.addEventListener('change', filterLibrary);
    statusFilter.addEventListener('change', filterLibrary);
    
    resetBtn.addEventListener('click', function() {
        searchInput.value = '';
        categoryFilter.value = '';
        typeFilter.value = '';
        statusFilter.value = '';
        filterLibrary();
    });
});
</script>

<?php
include(__DIR__ . '/..\..\..\includes\footer\footer.php');
?>