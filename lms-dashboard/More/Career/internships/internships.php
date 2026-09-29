<?php
session_start();
include(__DIR__ . '/../../../includes/header/header.php');
include(__DIR__ . '/../../../includes/navbar/navbar.php');
include(__DIR__ . '/../../../includes/sidebar/sidebar.php');

$internships = [
    [
        'id' => 1,
        'title' => 'Software Engineering Intern',
        'company' => 'Google',
        'location' => 'Mountain View, CA',
        'duration' => '12 weeks',
        'stipend' => '$8,000/month',
        'type' => 'Summer 2025',
        'deadline' => '2025-03-15',
        'posted' => '1 week ago',
        'logo' => 'assets/images/companies/google.jpg',
        'description' => 'Work on real projects that impact millions of users worldwide.',
        'requirements' => ['Computer Science student', 'Proficient in one programming language', 'Problem-solving skills'],
        'benefits' => ['Housing stipend', 'Free meals', 'Transportation', 'Networking events', 'Mentorship'],
        'category' => 'Software Engineering',
        'remote' => false,
        'credits' => true
    ],
    [
        'id' => 2,
        'title' => 'Data Science Intern',
        'company' => 'Microsoft',
        'location' => 'Redmond, WA',
        'duration' => '10 weeks',
        'stipend' => '$7,500/month',
        'type' => 'Summer 2025',
        'deadline' => '2025-04-01',
        'posted' => '3 days ago',
        'logo' => 'assets/images/companies/microsoft.jpg',
        'description' => 'Analyze large datasets and build machine learning models.',
        'requirements' => ['Statistics or CS background', 'Python/R proficiency', 'SQL knowledge'],
        'benefits' => ['Relocation assistance', 'Health insurance', 'Employee discounts', 'LinkedIn Learning access'],
        'category' => 'Data Science',
        'remote' => false,
        'credits' => true
    ],
    [
        'id' => 3,
        'title' => 'Web Development Intern',
        'company' => 'Shopify',
        'location' => 'Remote',
        'duration' => '16 weeks',
        'stipend' => '$6,000/month',
        'type' => 'Fall 2025',
        'deadline' => '2025-06-30',
        'posted' => '2 days ago',
        'logo' => 'assets/images/companies/shopify.jpg',
        'description' => 'Build features for e-commerce platform used by millions.',
        'requirements' => ['HTML/CSS/JavaScript', 'React experience', 'Git proficiency'],
        'benefits' => ['Remote work', 'Flexible hours', 'Learning budget', 'Home office setup'],
        'category' => 'Web Development',
        'remote' => true,
        'credits' => true
    ],
    [
        'id' => 4,
        'title' => 'Mobile App Development Intern',
        'company' => 'Airbnb',
        'location' => 'San Francisco, CA',
        'duration' => '12 weeks',
        'stipend' => '$9,000/month',
        'type' => 'Summer 2025',
        'deadline' => '2025-03-20',
        'posted' => '5 days ago',
        'logo' => 'assets/images/companies/airbnb.jpg',
        'description' => 'Develop mobile features for iOS and Android applications.',
        'requirements' => ['iOS or Android development', 'Swift/Kotlin', 'Mobile UI/UX understanding'],
        'benefits' => ['Housing stipend', 'Travel credits', 'Wellness benefits', 'Return offer potential'],
        'category' => 'Mobile Development',
        'remote' => false,
        'credits' => false
    ],
    [
        'id' => 5,
        'title' => 'UX Design Intern',
        'company' => 'Adobe',
        'location' => 'San Jose, CA',
        'duration' => '12 weeks',
        'stipend' => '$7,000/month',
        'type' => 'Summer 2025',
        'deadline' => '2025-04-10',
        'posted' => '1 week ago',
        'logo' => 'assets/images/companies/adobe.jpg',
        'description' => 'Create user-centered designs for creative software products.',
        'requirements' => ['Design portfolio', 'Figma/Adobe XD', 'User research experience'],
        'benefits' => ['Creative Cloud access', 'Design workshops', 'Mentorship', 'Networking'],
        'category' => 'Design',
        'remote' => false,
        'credits' => true
    ],
    [
        'id' => 6,
        'title' => 'Cybersecurity Intern',
        'company' => 'Cisco',
        'location' => 'San Jose, CA',
        'duration' => '10 weeks',
        'stipend' => '$6,500/month',
        'type' => 'Summer 2025',
        'deadline' => '2025-03-25',
        'posted' => '4 days ago',
        'logo' => 'assets/images/companies/cisco.jpg',
        'description' => 'Learn about network security and threat detection.',
        'requirements' => ['CS or related major', 'Basic networking knowledge', 'Security interest'],
        'benefits' => ['Security certifications', 'Training programs', 'Full-time conversion'],
        'category' => 'Security',
        'remote' => false,
        'credits' => true
    ],
    [
        'id' => 7,
        'title' => 'Machine Learning Intern',
        'company' => 'Amazon',
        'location' => 'Seattle, WA',
        'duration' => '12 weeks',
        'stipend' => '$8,500/month',
        'type' => 'Summer 2025',
        'deadline' => '2025-03-30',
        'posted' => '6 days ago',
        'logo' => 'assets/images/companies/amazon.jpg',
        'description' => 'Work on ML models for recommendation systems.',
        'requirements' => ['ML coursework', 'Python/TensorFlow', 'Strong math background'],
        'benefits' => ['Housing assistance', 'Employee discounts', 'Career development', 'Gym membership'],
        'category' => 'Machine Learning',
        'remote' => false,
        'credits' => true
    ],
    [
        'id' => 8,
        'title' => 'Frontend Development Intern',
        'company' => 'Netflix',
        'location' => 'Los Gatos, CA',
        'duration' => '14 weeks',
        'stipend' => '$9,500/month',
        'type' => 'Summer 2025',
        'deadline' => '2025-04-05',
        'posted' => '2 days ago',
        'logo' => 'assets/images/companies/netflix.jpg',
        'description' => 'Build UI components for streaming platform.',
        'requirements' => ['React proficiency', 'JavaScript/TypeScript', 'Responsive design'],
        'benefits' => ['Netflix subscription', 'Unlimited PTO', 'Catered meals', 'Stock options'],
        'category' => 'Web Development',
        'remote' => false,
        'credits' => false
    ]
];
?>

<div class="container-fluid mt-5 mb-5">
    <div class="row">
        <div class="col-12 mb-4">
            <h1><i class="bi bi-person-workspace me-2"></i>Internship Opportunities</h1>
            <p class="lead">Kickstart your tech career with internships at top companies</p>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="row mb-4">
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card bg-gradient-primary text-white text-center">
                <div class="card-body">
                    <i class="bi bi-briefcase fs-1"></i>
                    <h3 class="mt-2"><?php echo count($internships); ?></h3>
                    <p class="mb-0">Active Internships</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card bg-gradient-success text-white text-center">
                <div class="card-body">
                    <i class="bi bi-building fs-1"></i>
                    <h3 class="mt-2">25</h3>
                    <p class="mb-0">Partner Companies</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card bg-gradient-info text-white text-center">
                <div class="card-body">
                    <i class="bi bi-bookmark-star fs-1"></i>
                    <h3 class="mt-2">5</h3>
                    <p class="mb-0">Saved</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card bg-gradient-warning text-white text-center">
                <div class="card-body">
                    <i class="bi bi-send-check fs-1"></i>
                    <h3 class="mt-2">3</h3>
                    <p class="mb-0">Applied</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters and Search -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-search"></i></span>
                                <input type="text" id="searchInternships" class="form-control" placeholder="Search internships...">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <select id="categoryFilter" class="form-select">
                                <option value="">All Categories</option>
                                <option value="Software Engineering">Software Engineering</option>
                                <option value="Data Science">Data Science</option>
                                <option value="Web Development">Web Development</option>
                                <option value="Mobile Development">Mobile</option>
                                <option value="Design">Design</option>
                                <option value="Security">Security</option>
                                <option value="Machine Learning">Machine Learning</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select id="typeFilter" class="form-select">
                                <option value="">All Terms</option>
                                <option value="Summer 2025">Summer 2025</option>
                                <option value="Fall 2025">Fall 2025</option>
                                <option value="Spring 2026">Spring 2026</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select id="locationFilter" class="form-select">
                                <option value="">All Locations</option>
                                <option value="remote">Remote Only</option>
                                <option value="onsite">On-site Only</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select id="creditsFilter" class="form-select">
                                <option value="">All</option>
                                <option value="true">Offers Credit</option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <button class="btn btn-outline-secondary w-100" onclick="resetFilters()">
                                <i class="bi bi-arrow-clockwise"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Internships Grid -->
    <div class="row">
        <div class="col-lg-9">
            <div id="internshipsContainer" class="row">
                <?php foreach($internships as $internship): ?>
                <div class="col-md-6 mb-4 internship-item"
                     data-title="<?php echo strtolower($internship['title'] . ' ' . $internship['company']); ?>"
                     data-category="<?php echo $internship['category']; ?>"
                     data-type="<?php echo $internship['type']; ?>"
                     data-remote="<?php echo $internship['remote'] ? 'true' : 'false'; ?>"
                     data-credits="<?php echo $internship['credits'] ? 'true' : 'false'; ?>">
                    <div class="card h-100 shadow-sm hover-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <img src="<?php echo $internship['logo']; ?>" class="rounded" width="60" alt="<?php echo $internship['company']; ?>">
                                    <div class="text-end">
                                        <?php if($internship['remote']): ?>
                                            <span class="badge bg-success mb-1">Remote</span><br>
                                         <?php endif; ?>
                                         <?php if($internship['credits']): ?>
                                            <span class="badge bg-info">Academic Credit</span>
                                         <?php endif; ?>
                                        </div>
                                    </div>
                                    <h5 class="card-title"><?php echo $internship['title']; ?></h5>
                        <p class="text-muted mb-2">
                            <i class="bi bi-building me-1"></i><?php echo $internship['company']; ?>
                        </p>
                        <p class="text-muted small mb-2">
                            <i class="bi bi-geo-alt me-1"></i><?php echo $internship['location']; ?>
                        </p>
                        
                        <p class="card-text small mb-3"><?php echo $internship['description']; ?></p>
                        
                        <div class="row mb-3">
                            <div class="col-6">
                                <small class="text-muted d-block">Duration</small>
                                <strong><?php echo $internship['duration']; ?></strong>
                            </div>
                            <div class="col-6">
                                <small class="text-muted d-block">Stipend</small>
                                <strong class="text-success"><?php echo $internship['stipend']; ?></strong>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <small class="text-muted d-block mb-1">Term</small>
                            <span class="badge bg-primary"><?php echo $internship['type']; ?></span>
                        </div>
                        
                        <div class="mb-3">
                            <small class="text-muted d-block mb-1">Key Requirements</small>
                            <?php foreach(array_slice($internship['requirements'], 0, 2) as $req): ?>
                                <small class="d-block"><i class="bi bi-check-circle text-success me-1"></i><?php echo $req; ?></small>
                            <?php endforeach; ?>
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <small class="text-danger">
                                <i class="bi bi-calendar-x"></i> Deadline: <?php echo date('M d, Y', strtotime($internship['deadline'])); ?>
                            </small>
                            <small class="text-muted">Posted <?php echo $internship['posted']; ?></small>
                        </div>
                    </div>
                    <div class="card-footer bg-light">
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary btn-sm" onclick="viewInternship(<?php echo $internship['id']; ?>)">
                                <i class="bi bi-eye"></i> View Details
                            </button>
                            <div class="btn-group btn-group-sm" role="group">
                                <button class="btn btn-outline-primary" onclick="saveInternship(<?php echo $internship['id']; ?>)">
                                    <i class="bi bi-bookmark"></i> Save
                                </button>
                                <button class="btn btn-success" onclick="applyInternship(<?php echo $internship['id']; ?>)">
                                    <i class="bi bi-send"></i> Apply
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
            <h5>No internships found</h5>
            <p>Try adjusting your search or filter criteria.</p>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="col-lg-3">
        <!-- Application Tips -->
        <div class="card shadow mb-4">
            <div class="card-header bg-primary text-white">
                <h6 class="mb-0"><i class="bi bi-lightbulb"></i> Application Tips</h6>
            </div>
            <div class="card-body">
                <ul class="small mb-0 ps-3">
                    <li class="mb-2">Apply early - positions fill quickly</li>
                    <li class="mb-2">Tailor your resume for each role</li>
                    <li class="mb-2">Prepare for technical interviews</li>
                    <li class="mb-2">Research the company culture</li>
                    <li>Follow up after applying</li>
                </ul>
            </div>
        </div>

        <!-- Application Deadlines -->
        <div class="card shadow mb-4">
            <div class="card-header bg-danger text-white">
                <h6 class="mb-0"><i class="bi bi-calendar-event"></i> Upcoming Deadlines</h6>
            </div>
            <div class="card-body p-0">
                <div class="list-group list-group-flush">
                    <?php 
                    $sortedInternships = $internships;
                    usort($sortedInternships, function($a, $b) {
                        return strtotime($a['deadline']) - strtotime($b['deadline']);
                    });
                    foreach(array_slice($sortedInternships, 0, 4) as $internship): 
                    ?>
                    <div class="list-group-item">
                        <small class="text-muted d-block"><?php echo $internship['company']; ?></small>
                        <strong class="small"><?php echo date('M d, Y', strtotime($internship['deadline'])); ?></strong>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Internship Resources -->
        <div class="card shadow mb-4">
            <div class="card-header bg-info text-white">
                <h6 class="mb-0"><i class="bi bi-book"></i> Resources</h6>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mb-0">
                    <li class="mb-2">
                        <a href="#" class="text-decoration-none">
                            <i class="bi bi-file-text text-primary"></i> Resume Templates
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-decoration-none">
                            <i class="bi bi-code-square text-success"></i> Coding Interview Prep
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-decoration-none">
                            <i class="bi bi-chat-dots text-warning"></i> Interview Questions
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-decoration-none">
                            <i class="bi bi-trophy text-danger"></i> Success Stories
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Internship Alert -->
        <div class="card shadow">
            <div class="card-header bg-warning text-dark">
                <h6 class="mb-0"><i class="bi bi-bell"></i> Get Alerts</h6>
            </div>
            <div class="card-body">
                <p class="small mb-3">Get notified about new internship opportunities</p>
                <button class="btn btn-warning w-100" data-bs-toggle="modal" data-bs-target="#internshipAlertModal">
                    <i class="bi bi-plus-circle"></i> Create Alert
                </button>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Internship Detail Modal -->
<div class="modal fade" id="internshipDetailModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="internshipDetailTitle"></h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="internshipDetailBody">
                <!-- Internship details will be loaded here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-primary" onclick="saveInternshipFromModal()">
                    <i class="bi bi-bookmark"></i> Save
                </button>
                <button type="button" class="btn btn-success" onclick="applyInternshipFromModal()">
                    <i class="bi bi-send"></i> Apply Now
                </button>
            </div>
        </div>
    </div>
</div>
<!-- Internship Alert Modal -->
<div class="modal fade" id="internshipAlertModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning text-dark">
                <h5 class="modal-title"><i class="bi bi-bell"></i> Create Internship Alert</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="internshipAlertForm">
                    <div class="mb-3">
                        <label class="form-label">Field of Interest</label>
                        <select class="form-select">
                            <option>Software Engineering</option>
                            <option>Data Science</option>
                            <option>Web Development</option>
                            <option>Mobile Development</option>
                            <option>Design</option>
                            <option>Security</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Preferred Term</label>
                        <select class="form-select">
                            <option>Summer 2025</option>
                            <option>Fall 2025</option>
                            <option>Spring 2026</option>
                            <option>Any</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Location Preference</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remoteOnly">
                            <label class="form-check-label" for="remoteOnly">
                                Remote only
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email Notifications</label>
                        <select class="form-select">
                            <option>Immediate</option>
                            <option>Daily Digest</option>
                            <option>Weekly Digest</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-warning" onclick="createInternshipAlert()">
                    <i class="bi bi-check-circle"></i> Create Alert
                </button>
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

.bg-gradient-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.bg-gradient-success {
    background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
}

.bg-gradient-info {
    background: linear-gradient(135deg, #2193b0 0%, #6dd5ed 100%);
}

.bg-gradient-warning {
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
}
</style>
<script>
const internships = <?php echo json_encode($internships); ?>;
let currentInternshipId = null;

// Filter functionality
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInternships');
    const categoryFilter = document.getElementById('categoryFilter');
    const typeFilter = document.getElementById('typeFilter');
    const locationFilter = document.getElementById('locationFilter');
    const creditsFilter = document.getElementById('creditsFilter');
    const noResults = document.getElementById('noResults');
    
    function filterInternships() {
        const searchTerm = searchInput.value.toLowerCase();
        const category = categoryFilter.value;
        const type = typeFilter.value;
        const location = locationFilter.value;
        const credits = creditsFilter.value;
        
        const items = document.querySelectorAll('.internship-item');
        let visibleCount = 0;
        
        items.forEach(item => {
            const title = item.dataset.title;
            const itemCategory = item.dataset.category;
            const itemType = item.dataset.type;
            const itemRemote = item.dataset.remote;
            const itemCredits = item.dataset.credits;
            
            const matchesSearch = title.includes(searchTerm);
            const matchesCategory = !category || itemCategory === category;
            const matchesType = !type || itemType === type;
            const matchesLocation = !location || 
                (location === 'remote' && itemRemote === 'true') ||
                (location === 'onsite' && itemRemote === 'false');
            const matchesCredits = !credits || itemCredits === credits;
            
            if (matchesSearch && matchesCategory && matchesType && matchesLocation && matchesCredits) {
                item.style.display = '';
                visibleCount++;
            } else {
                item.style.display = 'none';
            }
        });
        
        noResults.style.display = visibleCount === 0 ? 'block' : 'none';
    }
    
    searchInput.addEventListener('input', filterInternships);
    categoryFilter.addEventListener('change', filterInternships);
    typeFilter.addEventListener('change', filterInternships);
    locationFilter.addEventListener('change', filterInternships);
    creditsFilter.addEventListener('change', filterInternships);
});

function resetFilters() {
    document.getElementById('searchInternships').value = '';
    document.getElementById('categoryFilter').value = '';
    document.getElementById('typeFilter').value = '';
    document.getElementById('locationFilter').value = '';
    document.getElementById('creditsFilter').value = '';
    
    document.querySelectorAll('.internship-item').forEach(item => {
        item.style.display = '';
    });
    document.getElementById('noResults').style.display = 'none';
}

function viewInternship(id) {
    const internship = internships.find(i => i.id === id);
    if (!internship) return;
    
    currentInternshipId = id;
    document.getElementById('internshipDetailTitle').textContent = internship.title;
    
    const daysUntilDeadline = Math.ceil((new Date(internship.deadline) - new Date()) / (1000 * 60 * 60 * 24));
    
    let detailHTML = `
        <div class="row mb-4">
            <div class="col-md-3 text-center">
                <img src="${internship.logo}" class="img-fluid rounded mb-3" alt="${internship.company}">
                ${internship.remote ? '<span class="badge bg-success mb-2 d-block">Remote</span>' : ''}
                ${internship.credits ? '<span class="badge bg-info d-block">Academic Credit Available</span>' : ''}
            </div>
            <div class="col-md-9">
                <h4>${internship.company}</h4>
                <p class="text-muted mb-2">
                    <i class="bi bi-geo-alt me-2"></i>${internship.location}
                </p>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <small class="text-muted d-block">Duration</small>
                        <strong>${internship.duration}</strong>
                    </div>
                    <div class="col-md-4">
                        <small class="text-muted d-block">Stipend</small>
                        <strong class="text-success">${internship.stipend}</strong>
                    </div>
                    <div class="col-md-4">
                        <small class="text-muted d-block">Term</small>
                        <strong>${internship.type}</strong>
                    </div>
                </div>
                <div class="alert alert-warning">
                    <i class="bi bi-calendar-x me-2"></i>
                    <strong>Application Deadline:</strong> ${new Date(internship.deadline).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' })}
                    <span class="badge bg-danger ms-2">${daysUntilDeadline} days left</span>
                </div>
            </div>
        </div>
        
        <h5 class="mb-3">About the Internship</h5>
        <p>${internship.description}</p>
        <p>This is an excellent opportunity to gain hands-on experience at ${internship.company}, one of the leading companies in the tech industry. You'll work on real projects, collaborate with experienced professionals, and develop valuable skills that will boost your career.</p>
        
        <h5 class="mb-3 mt-4">Requirements</h5>
        <ul class="mb-4">
            ${internship.requirements.map(req => `<li>${req}</li>`).join('')}
        </ul>
        
        <h5 class="mb-3">Benefits & Perks</h5>
        <div class="row mb-4">
            ${internship.benefits.map(benefit => `
                <div class="col-md-6 mb-2">
                    <i class="bi bi-check-circle-fill text-success me-2"></i>${benefit}
                </div>
            `).join('')}
        </div>
        
        <h5 class="mb-3">What You'll Learn</h5>
        <ul class="mb-4">
            <li>Industry-standard development practices and tools</li>
            <li>Collaboration in a professional team environment</li>
            <li>Project management and agile methodologies</li>
            <li>Problem-solving and critical thinking skills</li>
            <li>Networking opportunities with industry professionals</li>
        </ul>
        
        <div class="alert alert-info">
            <h6 class="alert-heading"><i class="bi bi-info-circle me-2"></i>Application Process</h6>
            <ol class="mb-0 ps-3">
                <li>Submit your resume and cover letter</li>
                <li>Complete online assessment (if required)</li>
                <li>Phone or video screening</li>
                <li>Technical interview</li>
                <li>Final interview with team</li>
            </ol>
        </div>
    `;
    
    document.getElementById('internshipDetailBody').innerHTML = detailHTML;
    
    const modal = new bootstrap.Modal(document.getElementById('internshipDetailModal'));
    modal.show();
}

function saveInternship(id) {
    const internship = internships.find(i => i.id === id);
    if (internship) {
        alert(`${internship.title} at ${internship.company} saved successfully!`);
    }
}

function saveInternshipFromModal() {
    if (currentInternshipId) {
        saveInternship(currentInternshipId);
    }
}

function applyInternship(id) {
    const internship = internships.find(i => i.id === id);
    if (internship) {
        if (confirm(`Apply for ${internship.title} at ${internship.company}?\n\nMake sure you have:\n- Updated resume\n- Cover letter\n- Portfolio (if applicable)\n- Academic transcripts`)) {
            alert(window.twDashTranslate('Application submitted successfully! You will receive a confirmation email shortly.'));
        }
    }
}

function applyInternshipFromModal() {
    if (currentInternshipId) {
        applyInternship(currentInternshipId);
        bootstrap.Modal.getInstance(document.getElementById('internshipDetailModal')).hide();
    }
}

function createInternshipAlert() {
    alert('Internship alert created! You will receive notifications about new opportunities matching your preferences.');
    bootstrap.Modal.getInstance(document.getElementById('internshipAlertModal')).hide();
}
</script>
<?php
include(__DIR__ . '/../../../includes/footer/footer.php');
?>
