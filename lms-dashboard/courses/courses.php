<?php
session_start();
require_once(__DIR__ . '/../includes/auth/auth.php');
require_once(__DIR__ . '/../../Database/db/db.php');

$conn = get_db();

// Fetch courses from database with defensive handling
try {
    $stmt = $conn->query("
        SELECT 
            c.*,
            u.full_name as instructor,
            COALESCE(cat.name, 'General') as category,
            COALESCE(e.students, 0) as students,
            COALESCE(r.rating, 0) as rating,
            COALESCE(cm.modules_count, 0) as modules_count
        FROM courses c
        LEFT JOIN users u ON c.instructor_id = u.id
        LEFT JOIN categories cat ON c.category_id = cat.id
        LEFT JOIN (
            SELECT course_id, COUNT(*) as students
            FROM enrollments
            GROUP BY course_id
        ) e ON c.id = e.course_id
        LEFT JOIN (
            SELECT course_id, AVG(rating) as rating
            FROM reviews
            GROUP BY course_id
        ) r ON c.id = r.course_id
        LEFT JOIN (
            SELECT course_id, COUNT(*) as modules_count
            FROM course_modules
            GROUP BY course_id
        ) cm ON c.id = cm.course_id
        ORDER BY c.created_at DESC
    ");
    $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Fallback query with minimal joins
    $stmt = $conn->query("
        SELECT 
            c.*,
            'TechWorld Academy' as instructor,
            'General' as category,
            0 as students,
            0 as rating,
            0 as modules_count
        FROM courses c
        ORDER BY c.created_at DESC
    ");
    $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Calculate statistics
$totalCourses = count($courses);
$totalStudents = array_sum(array_column($courses, 'students'));
$totalInstructors = count(array_unique(array_column($courses, 'instructor_id')));
$avgRating = $totalCourses > 0 ? round(array_sum(array_column($courses, 'rating')) / $totalCourses, 1) : 0;

// Get unique categories
try {
    $stmt = $conn->query("SELECT DISTINCT name FROM categories WHERE is_active = 1 ORDER BY name");
    $categories = $stmt->fetchAll(PDO::FETCH_COLUMN);
} catch (PDOException $e) {
    // Fallback: get categories from courses
    $categories = array_unique(array_column($courses, 'category'));
}

include(__DIR__ . '/../includes/header/header.php');
include(__DIR__ . '/../includes/navbar/navbar.php');
include(__DIR__ . '/../includes/sidebar/sidebar.php');
?>

<div class="container-fluid py-4">
  <!-- Page Header -->
  <div class="row mb-4" data-aos="fade-down">
    <div class="col-md-8">
      <h2 class="fw-bold text-white"><i class="bi bi-book-fill"></i> All Courses</h2>
      <p class="text-white-50">Explore our comprehensive collection of courses</p>
    </div>
    <div class="col-md-4 text-end">
      <button class="btn btn-light">
        <i class="bi bi-grid-3x3-gap"></i> Grid View
      </button>
      <button class="btn btn-outline-light">
        <i class="bi bi-list"></i> List View
      </button>
    </div>
  </div>

  <!-- Statistics -->
  <div class="row mb-4">
    <div class="col-md-3" data-aos="zoom-in" data-aos-delay="100">
      <div class="card text-white stat-card" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
        <div class="card-body text-center">
          <i class="bi bi-book-fill" style="font-size: 2.5rem;"></i>
          <h3 class="fw-bold mt-2 counter" data-target="<?php echo $totalCourses; ?>">0</h3>
          <p class="mb-0">Total Courses</p>
        </div>
      </div>
    </div>
    <div class="col-md-3" data-aos="zoom-in" data-aos-delay="200">
      <div class="card bg-success text-white stat-card">
        <div class="card-body text-center">
          <i class="bi bi-people-fill" style="font-size: 2.5rem;"></i>
          <h3 class="fw-bold mt-2 counter" data-target="<?php echo $totalStudents; ?>">0</h3>
          <p class="mb-0">Total Students</p>
        </div>
      </div>
    </div>
    <div class="col-md-3" data-aos="zoom-in" data-aos-delay="300">
      <div class="card bg-warning text-white stat-card">
        <div class="card-body text-center">
          <i class="bi bi-person-badge-fill" style="font-size: 2.5rem;"></i>
          <h3 class="fw-bold mt-2 counter" data-target="<?php echo $totalInstructors; ?>">0</h3>
          <p class="mb-0">Expert Instructors</p>
        </div>
      </div>
    </div>
    <div class="col-md-3" data-aos="zoom-in" data-aos-delay="400">
      <div class="card bg-info text-white stat-card">
        <div class="card-body text-center">
          <i class="bi bi-star-fill" style="font-size: 2.5rem;"></i>
          <h3 class="fw-bold mt-2"><?php echo $avgRating; ?></h3>
          <p class="mb-0">Average Rating</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Swiper Demo Carousel -->
  <div class="row mb-4" data-aos="fade-up">
    <div class="col-12">
      <div class="card p-3">
        <h5 class="mb-3">Featured Courses</h5>
        <div class="swiper-container mySwiper">
          <div class="swiper-wrapper">
            <?php foreach(array_slice($courses, 0, 6) as $i => $slide): ?>
              <?php $thumbClass = 'thumb-' . (($i % 3) + 1); ?>
              <div class="swiper-slide">
                <div class="card h-100">
                  <div class="row g-0">
                    <div class="col-4">
                      <div class="h-100 rounded-start <?php echo $thumbClass; ?>" style="min-height:100%; background-size:cover; background-position:center;"></div>
                    </div>
                    <div class="col-8">
                      <div class="card-body">
                        <h6 class="fw-bold mb-1"><?php echo htmlspecialchars($slide['title']); ?></h6>
                        <p class="small text-muted mb-1"><?php echo htmlspecialchars($slide['instructor']); ?> • <?php echo htmlspecialchars($slide['level'] ?? 'Beginner'); ?></p>
                        <p class="mb-2 small text-muted"><?php echo htmlspecialchars(substr($slide['description'],0,80)); ?>...</p>
                        <div class="d-flex justify-content-between align-items-center">
                          <span class="text-primary fw-semibold">$<?php echo number_format($slide['price'] ?? 0, 2); ?></span>
                          <a href="#" class="btn btn-sm btn-outline-primary">View</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
          <!-- Add Pagination -->
          <div class="swiper-pagination"></div>
          <!-- Add Navigation -->
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <!-- Filters Sidebar -->
    <div class="col-lg-3 mb-4">
      <div class="card shadow-sm" data-aos="fade-right">
        <div class="card-header bg-primary text-white">
          <h5 class="mb-0"><i class="bi bi-funnel-fill"></i> Filters</h5>
        </div>
        <div class="card-body">
          <!-- Search -->
          <div class="mb-4">
            <label class="fw-bold mb-2">Search Courses</label>
            <input type="text" class="form-control" id="searchInput" placeholder="Search by title...">
          </div>

          <!-- Category Filter -->
          <div class="mb-4">
            <label class="fw-bold mb-2">Category</label>
            <select class="form-select" id="categoryFilter">
              <option value="all">All Categories</option>
              <?php foreach($categories as $cat): ?>
                <option value="<?php echo $cat; ?>"><?php echo $cat; ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <!-- Level Filter -->
          <div class="mb-4">
            <label class="fw-bold mb-2">Level</label>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="Beginner" id="beginner">
              <label class="form-check-label" for="beginner">Beginner</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="Intermediate" id="intermediate">
              <label class="form-check-label" for="intermediate">Intermediate</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="Advanced" id="advanced">
              <label class="form-check-label" for="advanced">Advanced</label>
            </div>
          </div>

          <!-- Price Range -->
          <div class="mb-4">
            <label class="fw-bold mb-2">Price Range</label>
            <input type="range" class="form-range" min="0" max="100" id="priceRange">
            <div class="d-flex justify-content-between small">
              <span>$0</span>
              <span id="priceValue">$100</span>
            </div>
          </div>

          <!-- Rating Filter -->
          <div class="mb-4">
            <label class="fw-bold mb-2">Minimum Rating</label>
            <select class="form-select">
              <option value="0">All Ratings</option>
              <option value="4.5">4.5 ⭐ & up</option>
              <option value="4.0">4.0 ⭐ & up</option>
              <option value="3.5">3.5 ⭐ & up</option>
            </select>
          </div>

          <!-- Clear Filters -->
          <button class="btn btn-outline-danger w-100">
            <i class="bi bi-x-circle"></i> Clear All Filters
          </button>
        </div>
      </div>

      <!-- Featured Categories -->
      <div class="card shadow-sm mt-4" data-aos="fade-right" data-aos-delay="100">
        <div class="card-header bg-success text-white">
          <h6 class="mb-0"><i class="bi bi-bookmark-star"></i> Popular Categories</h6>
        </div>
        <div class="list-group list-group-flush">
          <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
            Development
            <span class="badge bg-primary rounded-pill">24</span>
          </a>
          <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
            Data Science
            <span class="badge bg-primary rounded-pill">18</span>
          </a>
          <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
            AI & ML
            <span class="badge bg-primary rounded-pill">15</span>
          </a>
          <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
            Design
            <span class="badge bg-primary rounded-pill">12</span>
          </a>
        </div>
      </div>
    </div>

    <!-- Courses Grid -->
    <div class="col-lg-9">
      <!-- Sort Options -->
      <div class="d-flex justify-content-between align-items-center mb-4" data-aos="fade-left">
        <div>
          <span class="text-white">Showing <strong><?php echo $totalCourses; ?></strong> courses</span>
        </div>
        <div>
          <select class="form-select form-select-sm">
            <option selected>Sort by: Popularity</option>
            <option>Sort by: Newest</option>
            <option>Sort by: Price (Low to High)</option>
            <option>Sort by: Price (High to Low)</option>
            <option>Sort by: Rating</option>
            <option>Sort by: Title (A-Z)</option>
          </select>
        </div>
      </div>

      <!-- Courses Cards -->
      <div class="row" id="coursesContainer">
        <?php if(count($courses) > 0): ?>
          <?php foreach($courses as $index => $course): ?>
          <div class="col-md-6 col-lg-4 mb-4 course-item" data-category="<?php echo htmlspecialchars($course['category']); ?>" data-level="<?php echo htmlspecialchars($course['level'] ?? 'Beginner'); ?>" data-aos="fade-up" data-aos-delay="<?php echo ($index % 3) * 100; ?>">
            <div class="card h-100 shadow-sm hover-shadow">
              <!-- Course Image -->
              <div class="position-relative">
                <?php if(!empty($course['thumbnail'])): ?>
                  <img src="../assets/courses/<?php echo htmlspecialchars($course['thumbnail']); ?>" class="card-img-top" style="height: 180px; object-fit: cover;" alt="<?php echo htmlspecialchars($course['title']); ?>">
                <?php else: ?>
                  <div class="card-img-top" style="height: 180px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <div class="d-flex align-items-center justify-content-center h-100">
                      <i class="bi bi-play-circle-fill text-white" style="font-size: 4rem; opacity: 0.3;"></i>
                    </div>
                  </div>
                <?php endif; ?>
                
                <?php if($course['students'] > 100): ?>
                <span class="position-absolute top-0 end-0 m-2 badge bg-danger">Best Seller</span>
                <?php endif; ?>
                
                <span class="position-absolute top-0 start-0 m-2 badge bg-warning text-dark"><?php echo htmlspecialchars($course['level'] ?? 'Beginner'); ?></span>
                <button class="btn btn-light btn-sm position-absolute bottom-0 end-0 m-2 rounded-circle" style="width: 40px; height: 40px;">
                  <i class="bi bi-heart"></i>
                </button>
              </div>

              <div class="card-body">
                <!-- Category Badge -->
                <span class="badge bg-primary mb-2"><?php echo htmlspecialchars($course['category']); ?></span>

                <!-- Course Title -->
                <h5 class="card-title fw-bold"><?php echo htmlspecialchars($course['title']); ?></h5>

                <!-- Instructor -->
                <p class="text-muted small mb-2">
                  <i class="bi bi-person"></i> <?php echo htmlspecialchars($course['instructor'] ?? 'TechWorld Academy'); ?>
                </p>

                <!-- Rating -->
                <div class="d-flex align-items-center mb-2">
                  <span class="text-warning me-1">
                    <?php 
                    $fullStars = floor($course['rating']);
                    $halfStar = ($course['rating'] - $fullStars) >= 0.5;
                    for($i=0; $i < $fullStars; $i++): ?>
                      <i class="bi bi-star-fill"></i>
                    <?php endfor; 
                    if($halfStar): ?>
                      <i class="bi bi-star-half"></i>
                    <?php endif;
                    for($i=0; $i < (5 - ceil($course['rating'])); $i++): ?>
                      <i class="bi bi-star"></i>
                    <?php endfor; ?>
                  </span>
                  <span class="fw-bold me-1"><?php echo number_format($course['rating'], 1); ?></span>
                  <span class="text-muted small">(<?php echo number_format($course['students']); ?> students)</span>
                </div>

                <!-- Course Info -->
                <div class="d-flex justify-content-between small text-muted mb-3">
                  <span><i class="bi bi-clock"></i> <?php echo htmlspecialchars($course['duration'] ?? '40 hours'); ?></span>
                  <span><i class="bi bi-book"></i> <?php echo $course['modules_count']; ?> modules</span>
                  <span><i class="bi bi-bar-chart"></i> <?php echo htmlspecialchars($course['level'] ?? 'Beginner'); ?></span>
                </div>

                <!-- Description -->
                <p class="small text-muted mb-3"><?php echo htmlspecialchars(substr($course['description'], 0, 100)); ?>...</p>

                <hr>

                <!-- Price & Action -->
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <span class="h4 fw-bold text-primary mb-0">$<?php echo number_format($course['price'] ?? 0, 2); ?></span>
                  </div>
                  <button type="button" class="btn btn-primary btn-sm enroll-btn" 
                          data-bs-toggle="modal" 
                          data-bs-target="#enrollModal"
                          data-course-id="<?php echo $course['id']; ?>"
                          data-course-title="<?php echo htmlspecialchars($course['title']); ?>"
                          data-course-price="<?php echo $course['price'] ?? 0; ?>"
                          data-course-instructor="<?php echo htmlspecialchars($course['instructor'] ?? 'TechWorld Academy'); ?>"
                          data-course-category="<?php echo htmlspecialchars($course['category']); ?>"
                          data-course-description="<?php echo htmlspecialchars($course['description']); ?>"
                          data-course-level="<?php echo htmlspecialchars($course['level'] ?? 'Beginner'); ?>"
                          data-course-duration="<?php echo htmlspecialchars($course['duration'] ?? '40 hours'); ?>">
                    <i class="bi bi-cart-plus"></i> Enroll
                  </button>
                </div>
              </div>

              <!-- Card Footer -->
              <div class="card-footer bg-light">
                <div class="d-flex justify-content-between align-items-center small">
                  <span class="text-muted"><i class="bi bi-clock-history"></i> Updated <?php echo date('M Y', strtotime($course['updated_at'] ?? $course['created_at'] ?? 'now')); ?></span>
                  <a href="#" class="text-decoration-none course-details-btn"
                     data-bs-toggle="modal"
                     data-bs-target="#courseDetailsModal"
                     data-course-id="<?php echo $course['id']; ?>"
                     data-course-title="<?php echo htmlspecialchars($course['title']); ?>"
                     data-course-price="<?php echo $course['price'] ?? 0; ?>"
                     data-course-instructor="<?php echo htmlspecialchars($course['instructor'] ?? 'TechWorld Academy'); ?>"
                     data-course-category="<?php echo htmlspecialchars($course['category']); ?>"
                     data-course-description="<?php echo htmlspecialchars($course['description']); ?>"
                     data-course-level="<?php echo htmlspecialchars($course['level'] ?? 'Beginner'); ?>"
                     data-course-duration="<?php echo htmlspecialchars($course['duration'] ?? '40 hours'); ?>"
                     data-course-students="<?php echo $course['students']; ?>"
                     data-course-rating="<?php echo number_format($course['rating'], 1); ?>"
                     data-course-modules="<?php echo $course['modules_count']; ?>">
                    <i class="bi bi-info-circle"></i> Details
                  </a>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="col-12">
            <div class="alert alert-info text-center">
              <i class="bi bi-info-circle me-2"></i>No courses available at the moment. Check back soon!
            </div>
          </div>
        <?php endif; ?>
      </div>

      <!-- Pagination -->
      <div class="row mt-4">
        <div class="col-12">
          <nav>
            <ul class="pagination justify-content-center">
              <li class="page-item disabled">
                <a class="page-link" href="#"><i class="bi bi-chevron-left"></i></a>
              </li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item">
                <a class="page-link" href="#"><i class="bi bi-chevron-right"></i></a>
              </li>
            </ul>
          </nav>
        </div>
      </div>

      <!-- Load More Button -->
      <div class="text-center mt-3" data-aos="fade-up">
        <button class="btn btn-outline-light btn-lg">
          <i class="bi bi-arrow-clockwise"></i> Load More Courses
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Custom JavaScript for Filters -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  // Search functionality
  const searchInput = document.getElementById('searchInput');
  if(searchInput) {
    searchInput.addEventListener('input', function() {
      const query = this.value.toLowerCase();
      filterCourses();
    });
  }

  // Category filter
  const categoryFilter = document.getElementById('categoryFilter');
  if(categoryFilter) {
    categoryFilter.addEventListener('change', filterCourses);
  }

  // Level checkboxes
  document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
    checkbox.addEventListener('change', filterCourses);
  });

  // Price range slider
  const priceRange = document.getElementById('priceRange');
  const priceValue = document.getElementById('priceValue');
  if(priceRange) {
    priceRange.addEventListener('input', function() {
      priceValue.textContent = '$' + this.value;
      filterCourses();
    });
  }

  function filterCourses() {
    const searchQuery = searchInput.value.toLowerCase();
    const selectedCategory = categoryFilter.value;
    const selectedLevels = Array.from(document.querySelectorAll('input[type="checkbox"]:checked')).map(cb => cb.value);
    const maxPrice = parseFloat(priceRange.value);

    document.querySelectorAll('.course-item').forEach(course => {
      const title = course.querySelector('.card-title').textContent.toLowerCase();
      const category = course.getAttribute('data-category');
      const level = course.getAttribute('data-level');
      const price = parseFloat(course.querySelector('.h4').textContent.replace('$', ''));

      let show = true;

      // Search filter
      if(searchQuery && !title.includes(searchQuery)) {
        show = false;
      }

      // Category filter
      if(selectedCategory !== 'all' && category !== selectedCategory) {
        show = false;
      }

      // Level filter
      if(selectedLevels.length > 0 && !selectedLevels.includes(level)) {
        show = false;
      }

      // Price filter
      if(price > maxPrice) {
        show = false;
      }

      course.style.display = show ? 'block' : 'none';
    });
  }
});
</script>

<!-- Course Details Modal -->
<div class="modal fade" id="courseDetailsModal" tabindex="-1" aria-labelledby="courseDetailsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="courseDetailsModalLabel">
          <i class="bi bi-book me-2"></i><span id="detailModalTitle">Course Details</span>
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <!-- Course Overview -->
          <div class="col-lg-8 mb-3">
            <h6 class="fw-bold text-primary mb-3"><i class="bi bi-file-text me-2"></i>Course Overview</h6>
            <p id="detailModalDescription" class="text-muted"></p>
            
            <h6 class="fw-bold text-primary mb-3 mt-4"><i class="bi bi-check2-circle me-2"></i>What You'll Learn</h6>
            <ul class="list-unstyled">
              <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Master the fundamentals and advanced concepts</li>
              <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Build real-world projects from scratch</li>
              <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Learn industry best practices and techniques</li>
              <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Get hands-on experience with practical exercises</li>
              <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Earn a certificate upon completion</li>
            </ul>

            <h6 class="fw-bold text-primary mb-3 mt-4"><i class="bi bi-list-ul me-2"></i>Course Content</h6>
            <div class="accordion" id="courseModulesAccordion">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#module1">
                    <i class="bi bi-folder me-2"></i>Module 1: Introduction
                  </button>
                </h2>
                <div id="module1" class="accordion-collapse collapse show" data-bs-parent="#courseModulesAccordion">
                  <div class="accordion-body">
                    <ul class="list-unstyled">
                      <li class="mb-2"><i class="bi bi-play-circle me-2 text-primary"></i>Welcome to the course</li>
                      <li class="mb-2"><i class="bi bi-play-circle me-2 text-primary"></i>Course overview and objectives</li>
                      <li class="mb-2"><i class="bi bi-play-circle me-2 text-primary"></i>Setting up your environment</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#module2">
                    <i class="bi bi-folder me-2"></i>Module 2: Core Concepts
                  </button>
                </h2>
                <div id="module2" class="accordion-collapse collapse" data-bs-parent="#courseModulesAccordion">
                  <div class="accordion-body">
                    <ul class="list-unstyled">
                      <li class="mb-2"><i class="bi bi-play-circle me-2 text-primary"></i>Understanding fundamentals</li>
                      <li class="mb-2"><i class="bi bi-play-circle me-2 text-primary"></i>Advanced techniques</li>
                      <li class="mb-2"><i class="bi bi-play-circle me-2 text-primary"></i>Practical applications</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <h6 class="fw-bold text-primary mb-3 mt-4"><i class="bi bi-people me-2"></i>Student Reviews</h6>
            <div class="card mb-2">
              <div class="card-body">
                <div class="d-flex mb-2">
                  <div class="flex-shrink-0">
                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                      <i class="bi bi-person"></i>
                    </div>
                  </div>
                  <div class="flex-grow-1 ms-3">
                    <h6 class="mb-1">Sarah Johnson</h6>
                    <div class="text-warning mb-1">
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                    </div>
                    <p class="small text-muted mb-0">Excellent course! The instructor explains everything clearly and the hands-on projects really helped me understand the concepts.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Course Info Sidebar -->
          <div class="col-lg-4">
            <div class="card bg-light mb-3">
              <div class="card-body text-center">
                <h3 class="text-primary mb-2" id="detailModalPrice">$0.00</h3>
                <button class="btn btn-primary w-100 mb-2" id="detailEnrollBtn">
                  <i class="bi bi-cart-plus me-2"></i>Enroll Now
                </button>
                <p class="small text-muted mb-0">30-Day Money-Back Guarantee</p>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <h6 class="fw-bold mb-3">Course Information</h6>
                <ul class="list-unstyled">
                  <li class="mb-2">
                    <i class="bi bi-person-fill text-primary me-2"></i>
                    <strong>Instructor:</strong><br>
                    <span class="ms-4" id="detailModalInstructor"></span>
                  </li>
                  <li class="mb-2">
                    <i class="bi bi-tag-fill text-primary me-2"></i>
                    <strong>Category:</strong><br>
                    <span class="ms-4" id="detailModalCategory"></span>
                  </li>
                  <li class="mb-2">
                    <i class="bi bi-clock-fill text-primary me-2"></i>
                    <strong>Duration:</strong><br>
                    <span class="ms-4" id="detailModalDuration"></span>
                  </li>
                  <li class="mb-2">
                    <i class="bi bi-bar-chart-fill text-primary me-2"></i>
                    <strong>Level:</strong><br>
                    <span class="ms-4" id="detailModalLevel"></span>
                  </li>
                  <li class="mb-2">
                    <i class="bi bi-book-fill text-primary me-2"></i>
                    <strong>Modules:</strong><br>
                    <span class="ms-4" id="detailModalModules"></span>
                  </li>
                  <li class="mb-2">
                    <i class="bi bi-people-fill text-primary me-2"></i>
                    <strong>Students:</strong><br>
                    <span class="ms-4" id="detailModalStudents"></span>
                  </li>
                  <li class="mb-2">
                    <i class="bi bi-star-fill text-warning me-2"></i>
                    <strong>Rating:</strong><br>
                    <span class="ms-4" id="detailModalRating"></span>
                  </li>
                </ul>

                <hr>

                <h6 class="fw-bold mb-3">This Course Includes:</h6>
                <ul class="list-unstyled small">
                  <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Lifetime access</li>
                  <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Certificate of completion</li>
                  <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Downloadable resources</li>
                  <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Access on mobile and desktop</li>
                  <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Q&A support</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Enrollment Payment Modal -->
<div class="modal fade" id="enrollModal" tabindex="-1" aria-labelledby="enrollModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="enrollModalLabel">
          <i class="bi bi-credit-card me-2"></i>Complete Your Enrollment
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <!-- Course Details Sidebar -->
          <div class="col-lg-4 mb-3">
            <div class="card bg-light h-100">
              <div class="card-body">
                <h5 class="card-title" id="modalCourseTitle">Course Name</h5>
                <p class="text-muted small mb-2">
                  <i class="bi bi-person-fill me-1"></i><span id="modalCourseInstructor">Instructor</span>
                </p>
                <p class="text-muted small mb-2">
                  <i class="bi bi-tag-fill me-1"></i><span id="modalCourseCategory">Category</span>
                </p>
                <p class="text-muted small mb-2">
                  <i class="bi bi-clock-fill me-1"></i><span id="modalCourseDuration">Duration</span>
                </p>
                <p class="text-muted small mb-3">
                  <i class="bi bi-bar-chart-fill me-1"></i><span id="modalCourseLevel">Level</span>
                </p>
                <p class="small mb-3" id="modalCourseDescription">Course description</p>
                <hr>
                <div class="text-center">
                  <h3 class="text-success mb-0" id="modalCoursePrice">$0.00</h3>
                  <p class="text-muted small mb-0">Course Fee</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Payment Form -->
          <div class="col-lg-8">
            <form id="enrollmentForm" method="POST" action="/enroll/enroll.php">
              <input type="hidden" name="course_id" id="enrollCourseId">
              <input type="hidden" name="amount" id="enrollAmount">
              
              <!-- Payment Gateway Selection -->
              <div class="mb-4">
                <label class="form-label fw-bold">
                  <i class="bi bi-wallet2 me-2"></i>Select Payment Gateway
                </label>
                <div class="row g-3">
                  <div class="col-md-4">
                    <div class="form-check card p-3 h-100">
                      <input class="form-check-input" type="radio" name="gateway" value="paystack" id="modal-paystack" checked>
                      <label class="form-check-label w-100" for="modal-paystack">
                        <div class="d-flex align-items-center">
                          <div class="flex-grow-1">
                            <strong class="d-block">Paystack</strong>
                            <small class="text-muted">Ghana's #1 Payment</small>
                          </div>
                        </div>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-check card p-3 h-100">
                      <input class="form-check-input" type="radio" name="gateway" value="stripe" id="modal-stripe">
                      <label class="form-check-label w-100" for="modal-stripe">
                        <div class="d-flex align-items-center">
                          <div class="flex-grow-1">
                            <strong class="d-block">Stripe</strong>
                            <small class="text-muted">International Cards</small>
                          </div>
                        </div>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-check card p-3 h-100">
                      <input class="form-check-input" type="radio" name="gateway" value="paypal" id="modal-paypal">
                      <label class="form-check-label w-100" for="modal-paypal">
                        <div class="d-flex align-items-center">
                          <div class="flex-grow-1">
                            <strong class="d-block">PayPal</strong>
                            <small class="text-muted">Global Payment</small>
                          </div>
                        </div>
                      </label>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Email Confirmation -->
              <div class="mb-4">
                <label class="form-label fw-bold">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="your.email@example.com" required>
                <small class="text-muted">Payment receipt will be sent to this email</small>
              </div>

              <!-- Payment Summary -->
              <div class="card bg-light mb-4">
                <div class="card-body">
                  <h6 class="fw-bold mb-3">Payment Summary</h6>
                  <div class="d-flex justify-content-between mb-2">
                    <span>Course Fee:</span>
                    <strong id="summaryPrice">$0.00</strong>
                  </div>
                  <div class="d-flex justify-content-between mb-2">
                    <span>Discount:</span>
                    <strong class="text-success">$0.00</strong>
                  </div>
                  <hr>
                  <div class="d-flex justify-content-between">
                    <strong>Total Amount:</strong>
                    <strong class="text-primary h5" id="summaryTotal">$0.00</strong>
                  </div>
                </div>
              </div>

              <!-- Terms and Conditions -->
              <div class="mb-4">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="acceptTerms" required>
                  <label class="form-check-label small" for="acceptTerms">
                    I agree to the <a href="#" class="text-primary">Terms & Conditions</a> and <a href="#" class="text-primary">Privacy Policy</a>
                  </label>
                </div>
              </div>

              <!-- Submit Button -->
              <button type="submit" class="btn btn-success btn-lg w-100">
                <i class="bi bi-lock-fill me-2"></i>Proceed to Secure Payment
              </button>

              <p class="text-center text-muted small mt-3 mb-0">
                <i class="bi bi-shield-check me-1"></i>
                Your payment information is secure and encrypted
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
// Handle course details modal population
document.addEventListener('DOMContentLoaded', function() {
  const detailsModal = document.getElementById('courseDetailsModal');
  
  detailsModal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    
    // Get course data
    const courseId = button.getAttribute('data-course-id');
    const courseTitle = button.getAttribute('data-course-title');
    const coursePrice = button.getAttribute('data-course-price');
    const courseInstructor = button.getAttribute('data-course-instructor');
    const courseCategory = button.getAttribute('data-course-category');
    const courseDescription = button.getAttribute('data-course-description');
    const courseLevel = button.getAttribute('data-course-level');
    const courseDuration = button.getAttribute('data-course-duration');
    const courseStudents = button.getAttribute('data-course-students');
    const courseRating = button.getAttribute('data-course-rating');
    const courseModules = button.getAttribute('data-course-modules');
    
    // Update modal content
    document.getElementById('detailModalTitle').textContent = courseTitle;
    document.getElementById('detailModalDescription').textContent = courseDescription;
    document.getElementById('detailModalPrice').textContent = '$' + parseFloat(coursePrice).toFixed(2);
    document.getElementById('detailModalInstructor').textContent = courseInstructor;
    document.getElementById('detailModalCategory').textContent = courseCategory;
    document.getElementById('detailModalDuration').textContent = courseDuration;
    document.getElementById('detailModalLevel').textContent = courseLevel;
    document.getElementById('detailModalModules').textContent = courseModules + ' modules';
    document.getElementById('detailModalStudents').textContent = parseInt(courseStudents).toLocaleString() + ' enrolled';
    document.getElementById('detailModalRating').textContent = courseRating + ' ⭐';
    
    // Handle enroll button click
    document.getElementById('detailEnrollBtn').onclick = function() {
      // Close details modal
      bootstrap.Modal.getInstance(detailsModal).hide();
      
      // Open enrollment modal with data
      setTimeout(() => {
        const enrollBtn = document.querySelector('.enroll-btn[data-course-id="' + courseId + '"]');
        if (enrollBtn) {
          enrollBtn.click();
        }
      }, 300);
    };
  });
  
  // Handle enrollment modal data population
  const enrollModal = document.getElementById('enrollModal');
  
  enrollModal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    
    // Get course data from button attributes
    const courseId = button.getAttribute('data-course-id');
    const courseTitle = button.getAttribute('data-course-title');
    const coursePrice = button.getAttribute('data-course-price');
    const courseInstructor = button.getAttribute('data-course-instructor');
    const courseCategory = button.getAttribute('data-course-category');
    const courseDescription = button.getAttribute('data-course-description');
    const courseLevel = button.getAttribute('data-course-level');
    const courseDuration = button.getAttribute('data-course-duration');
    
    // Convert USD to GHS (1 USD = 12 GHS)
    const priceUSD = parseFloat(coursePrice);
    const priceGHS = priceUSD * 12;
    
    // Update modal content
    document.getElementById('modalCourseTitle').textContent = courseTitle;
    document.getElementById('modalCourseInstructor').textContent = courseInstructor;
    document.getElementById('modalCourseCategory').textContent = courseCategory;
    document.getElementById('modalCourseDuration').textContent = courseDuration;
    document.getElementById('modalCourseLevel').textContent = courseLevel;
    document.getElementById('modalCourseDescription').textContent = courseDescription;
    document.getElementById('modalCoursePrice').innerHTML = 'GH₵ ' + priceGHS.toFixed(2) + '<br><small class="text-muted">≈ $' + priceUSD.toFixed(2) + ' USD</small>';
    
    // Update summary
    document.getElementById('summaryPrice').textContent = 'GH₵ ' + priceGHS.toFixed(2);
    document.getElementById('summaryTotal').textContent = 'GH₵ ' + priceGHS.toFixed(2);
    
    // Update hidden form fields
    document.getElementById('enrollCourseId').value = courseId;
    document.getElementById('enrollAmount').value = priceGHS.toFixed(2);
  });
});
</script>

<?php include(__DIR__ . '/../includes/footer/footer.php'); ?>
