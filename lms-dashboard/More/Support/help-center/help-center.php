<?php
session_start();
include(__DIR__ . '/../../../includes/header/header.php');
include(__DIR__ . '/../../../includes/navbar/navbar.php');
include(__DIR__ . '/../../../includes/sidebar/sidebar.php');


$helpCategories = [
    [
        'id' => 1,
        'title' => 'Getting Started',
        'icon' => 'bi-rocket-takeoff',
        'color' => 'primary',
        'description' => 'Learn the basics and set up your account',
        'articles' => [
            ['title' => 'Creating Your Account', 'views' => 1250],
            ['title' => 'Dashboard Overview', 'views' => 980],
            ['title' => 'Completing Your Profile', 'views' => 875],
            ['title' => 'First Steps Guide', 'views' => 1100]
        ]
    ],
    [
        'id' => 2,
        'title' => 'Courses & Learning',
        'icon' => 'bi-book',
        'color' => 'success',
        'description' => 'Everything about courses and learning materials',
        'articles' => [
            ['title' => 'Enrolling in Courses', 'views' => 2100],
            ['title' => 'Accessing Course Materials', 'views' => 1850],
            ['title' => 'Completing Assignments', 'views' => 1650],
            ['title' => 'Taking Quizzes and Exams', 'views' => 1400]
        ]
    ],
    [
        'id' => 3,
        'title' => 'Account & Billing',
        'icon' => 'bi-credit-card',
        'color' => 'warning',
        'description' => 'Manage your account and subscription',
        'articles' => [
            ['title' => 'Subscription Plans', 'views' => 950],
            ['title' => 'Payment Methods', 'views' => 820],
            ['title' => 'Billing History', 'views' => 650],
            ['title' => 'Canceling Subscription', 'views' => 550]
        ]
    ],
    [
        'id' => 4,
        'title' => 'Technical Issues',
        'icon' => 'bi-tools',
        'color' => 'danger',
        'description' => 'Troubleshoot common technical problems',
        'articles' => [
            ['title' => 'Video Playback Issues', 'views' => 1200],
            ['title' => 'Login Problems', 'views' => 980],
            ['title' => 'Browser Compatibility', 'views' => 750],
            ['title' => 'Mobile App Issues', 'views' => 680]
        ]
    ],
    [
        'id' => 5,
        'title' => 'Certificates & Achievements',
        'icon' => 'bi-award',
        'color' => 'info',
        'description' => 'Information about certificates and badges',
        'articles' => [
            ['title' => 'Earning Certificates', 'views' => 1800],
            ['title' => 'Downloading Certificates', 'views' => 1500],
            ['title' => 'Badge System', 'views' => 920],
            ['title' => 'Sharing Achievements', 'views' => 850]
        ]
    ],
    [
        'id' => 6,
        'title' => 'Community & Support',
        'icon' => 'bi-people',
        'color' => 'secondary',
        'description' => 'Connect with others and get help',
        'articles' => [
            ['title' => 'Using Discussion Forums', 'views' => 680],
            ['title' => 'Study Groups', 'views' => 540],
            ['title' => 'Contacting Support', 'views' => 890],
            ['title' => 'Community Guidelines', 'views' => 420]
        ]
    ]
];

$popularArticles = [
    ['title' => 'How to Reset Your Password', 'category' => 'Account', 'views' => 3200],
    ['title' => 'Course Completion Requirements', 'category' => 'Courses', 'views' => 2800],
    ['title' => 'Troubleshooting Video Issues', 'category' => 'Technical', 'views' => 2500],
    ['title' => 'Certificate Download Guide', 'category' => 'Certificates', 'views' => 2300],
    ['title' => 'Upgrading Your Subscription', 'category' => 'Billing', 'views' => 2100]
];
?>

<div class="container-fluid mt-5 mb-5">
    <div class="row">
        <div class="col-12 text-center mb-5">
            <h1 class="display-4 mb-3"><i class="bi bi-question-circle me-3"></i>Help Center</h1>
            <p class="lead text-muted">Find answers to your questions and get the help you need</p>
        </div>
    </div>

    <!-- Search Section -->
    <div class="row mb-5">
        <div class="col-lg-8 offset-lg-2">
            <div class="card shadow-lg border-0">
                <div class="card-body p-4">
                    <div class="input-group input-group-lg">
                        <span class="input-group-text bg-white border-end-0">
                            <i class="bi bi-search"></i>
                        </span>
                        <input type="text" class="form-control border-start-0" id="helpSearch" 
                               placeholder="Search for help articles, guides, tutorials...">
                        <button class="btn btn-primary px-4" type="button">Search</button>
                    </div>
                    <div class="mt-3">
                        <small class="text-muted">Popular searches: </small>
                        <a href="#" class="badge bg-light text-dark me-2">reset password</a>
                        <a href="#" class="badge bg-light text-dark me-2">certificate</a>
                        <a href="#" class="badge bg-light text-dark me-2">enrollment</a>
                        <a href="#" class="badge bg-light text-dark me-2">payment</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="row mb-5">
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card text-center bg-primary text-white h-100">
                <div class="card-body">
                    <i class="bi bi-file-earmark-text fs-1 mb-2"></i>
                    <h3 class="mb-0">150+</h3>
                    <p class="mb-0">Help Articles</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card text-center bg-success text-white h-100">
                <div class="card-body">
                    <i class="bi bi-play-circle fs-1 mb-2"></i>
                    <h3 class="mb-0">50+</h3>
                    <p class="mb-0">Video Tutorials</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card text-center bg-info text-white h-100">
                <div class="card-body">
                    <i class="bi bi-chat-dots fs-1 mb-2"></i>
                    <h3 class="mb-0">24/7</h3>
                    <p class="mb-0">Support Available</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card text-center bg-warning text-white h-100">
                <div class="card-body">
                    <i class="bi bi-clock-history fs-1 mb-2"></i>
                    <h3 class="mb-0">&lt;2hrs</h3>
                    <p class="mb-0">Avg Response Time</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Help Categories -->
    <div class="row mb-5">
        <div class="col-12 mb-4">
            <h2 class="text-center mb-4">Browse by Category</h2>
        </div>
        <?php foreach($helpCategories as $category): ?>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 shadow-sm hover-card">
                <div class="card-body">
                    <div class="d-flex align-items-start mb-3">
                        <div class="rounded-circle bg-<?php echo $category['color']; ?> bg-opacity-10 p-3 me-3">
                            <i class="bi <?php echo $category['icon']; ?> fs-2 text-<?php echo $category['color']; ?>"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="card-title mb-2"><?php echo $category['title']; ?></h5>
                            <p class="text-muted small mb-0"><?php echo $category['description']; ?></p>
                        </div>
                    </div>
                    <hr>
                    <ul class="list-unstyled mb-0">
                        <?php foreach($category['articles'] as $article): ?>
                        <li class="mb-2">
                            <a href="#" class="text-decoration-none text-dark hover-link" 
                               onclick="viewArticle('<?php echo $article['title']; ?>'); return false;">
                                <i class="bi bi-file-text me-2 text-<?php echo $category['color']; ?>"></i>
                                <?php echo $article['title']; ?>
                                <small class="text-muted">(<?php echo number_format($article['views']); ?> views)</small>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="mt-3">
                        <a href="#" class="btn btn-outline-<?php echo $category['color']; ?> btn-sm w-100">
                            View All Articles <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Popular Articles -->
    <div class="row mb-5">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="bi bi-star-fill me-2"></i>Most Popular Articles</h5>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <?php foreach($popularArticles as $index => $article): ?>
                        <a href="#" class="list-group-item list-group-item-action" 
                           onclick="viewArticle('<?php echo $article['title']; ?>'); return false;">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" 
                                     style="width: 40px; height: 40px;">
                                    <strong class="text-primary"><?php echo $index + 1; ?></strong>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1"><?php echo $article['title']; ?></h6>
                                    <small class="text-muted">
                                        <span class="badge bg-secondary me-2"><?php echo $article['category']; ?></span>
                                        <i class="bi bi-eye me-1"></i><?php echo number_format($article['views']); ?> views
                                    </small>
                                </div>
                                <i class="bi bi-chevron-right text-muted"></i>
                            </div>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Support Sidebar -->
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header bg-success text-white">
                    <h6 class="mb-0"><i class="bi bi-headset me-2"></i>Need More Help?</h6>
                </div>
                <div class="card-body">
                    <p class="small">Can't find what you're looking for? Our support team is here to help!</p>
                    <div class="d-grid gap-2">
                        <a href="/user-dashboard/More/Support/report-issue.php" class="btn btn-success">
                            <i class="bi bi-chat-dots me-2"></i>Contact Support
                        </a>
                        <a href="/user-dashboard/More/Support/feedback.php" class="btn btn-outline-success">
                            <i class="bi bi-chat-left-text me-2"></i>Send Feedback
                        </a>
                    </div>
                </div>
            </div>

            <div class="card shadow">
                <div class="card-header bg-info text-white">
                    <h6 class="mb-0"><i class="bi bi-book me-2"></i>Quick Links</h6>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2">
                            <a href="/user-dashboard/More/Support/faq.php" class="text-decoration-none">
                                <i class="bi bi-arrow-right-circle me-2"></i>FAQ
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="text-decoration-none">
                                <i class="bi bi-arrow-right-circle me-2"></i>Video Tutorials
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="text-decoration-none">
                                <i class="bi bi-arrow-right-circle me-2"></i>Community Forum
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="text-decoration-none">
                                <i class="bi bi-arrow-right-circle me-2"></i>System Status
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-decoration-none">
                                <i class="bi bi-arrow-right-circle me-2"></i>Terms of Service
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Article Modal -->
<div class="modal fade" id="articleModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="articleTitle"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="articleContent">
                <!-- Article content will be loaded here -->
            </div>
            <div class="modal-footer">
                <div class="me-auto">
                    <span class="text-muted">Was this helpful?</span>
                    <button class="btn btn-sm btn-outline-success ms-2" onclick="rateArticle('yes')">
                        <i class="bi bi-hand-thumbs-up"></i> Yes
                    </button>
                    <button class="btn btn-sm btn-outline-danger ms-1" onclick="rateArticle('no')">
                        <i class="bi bi-hand-thumbs-down"></i> No
                    </button>
                </div>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<style>
.hover-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.hover-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15) !important;
}

.hover-link:hover {
    color: var(--bs-primary) !important;
}
</style>

<script>
function viewArticle(title) {
    document.getElementById('articleTitle').textContent = title;
    
    // Sample article content
    const content = `
        <div class="mb-4">
            <div class="alert alert-info">
                <i class="bi bi-info-circle me-2"></i>
                Last updated: ${new Date().toLocaleDateString()}
            </div>
        </div>
        
        <h5>Overview</h5>
        <p>This comprehensive guide will walk you through the steps needed to ${title.toLowerCase()}. Follow the instructions below to get started.</p>
        
        <h5 class="mt-4">Step-by-Step Instructions</h5>
        <ol>
            <li class="mb-2">Navigate to your dashboard</li>
            <li class="mb-2">Click on the relevant section</li>
            <li class="mb-2">Follow the on-screen instructions</li>
            <li class="mb-2">Confirm your changes</li>
            <li class="mb-2">You're all set!</li>
        </ol>
        
        <h5 class="mt-4">Common Issues</h5>
        <div class="accordion" id="commonIssues">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#issue1">
                        Issue #1: Unable to complete the process
                    </button>
                </h2>
                <div id="issue1" class="accordion-collapse collapse" data-bs-parent="#commonIssues">
                    <div class="accordion-body">
                        Try clearing your browser cache and cookies, then attempt the process again.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#issue2">
                        Issue #2: Error message appears
                    </button>
                </h2>
                <div id="issue2" class="accordion-collapse collapse" data-bs-parent="#commonIssues">
                    <div class="accordion-body">
                        Make sure you have a stable internet connection and try again. If the problem persists, contact support.
                    </div>
                </div>
            </div>
        </div>
        
        <h5 class="mt-4">Need More Help?</h5>
        <p>If you're still having trouble, please <a href="/user-dashboard/More/Support/report-issue.php">contact our support team</a>.</p>
    `;
    
    document.getElementById('articleContent').innerHTML = content;
    
    const modal = new bootstrap.Modal(document.getElementById('articleModal'));
    modal.show();
}

function rateArticle(rating) {
    alert(`Thank you for your feedback! You rated this article as ${rating === 'yes' ? 'helpful' : 'not helpful'}.`);
}

// Search functionality
document.getElementById('helpSearch').addEventListener('keyup', function(e) {
    if (e.key === 'Enter') {
        const searchTerm = this.value;
        alert(`Searching for: ${searchTerm}`);
    }
});
</script>

<?php
include(__DIR__ . '/../../../includes/footer/footer.php');
?>
