<?php
session_start();
include(__DIR__ . '/..\..\..\includes\header\header.php');
include(__DIR__ . '/..\..\..\includes\navbar\navbar.php');
include(__DIR__ . '/..\..\..\includes\sidebar\sidebar.php');

$jobs = [
    [
        'id' => 1,
        'title' => 'Senior Full Stack Developer',
        'company' => 'TechCorp Solutions',
        'location' => 'Remote',
        'type' => 'Full-time',
        'salary' => '$100,000 - $130,000',
        'experience' => '5+ years',
        'posted' => '2 days ago',
        'logo' => 'assets/images/companies/techcorp.jpg',
        'description' => 'We are looking for an experienced Full Stack Developer to join our growing team.',
        'requirements' => ['React', 'Node.js', 'MongoDB', 'AWS', 'Docker'],
        'benefits' => ['Health Insurance', 'Remote Work', '401(k)', 'Unlimited PTO'],
        'category' => 'Web Development'
    ],
    [
        'id' => 2,
        'title' => 'Data Scientist',
        'company' => 'DataViz Analytics',
        'location' => 'New York, NY',
        'type' => 'Full-time',
        'salary' => '$110,000 - $150,000',
        'experience' => '3+ years',
        'posted' => '1 day ago',
        'logo' => 'assets/images/companies/dataviz.jpg',
        'description' => 'Join our data science team to work on cutting-edge machine learning projects.',
        'requirements' => ['Python', 'Machine Learning', 'SQL', 'TensorFlow', 'Statistics'],
        'benefits' => ['Health Insurance', 'Stock Options', 'Gym Membership', 'Learning Budget'],
        'category' => 'Data Science'
    ],
    [
        'id' => 3,
        'title' => 'Mobile App Developer (iOS)',
        'company' => 'AppMakers Inc',
        'location' => 'San Francisco, CA',
        'type' => 'Full-time',
        'salary' => '$95,000 - $125,000',
        'experience' => '3+ years',
        'posted' => '3 days ago',
        'logo' => 'assets/images/companies/appmakers.jpg',
        'description' => 'Create beautiful and performant iOS applications for millions of users.',
        'requirements' => ['Swift', 'SwiftUI', 'iOS SDK', 'Git', 'REST APIs'],
        'benefits' => ['Health Insurance', 'Equity', 'Flexible Hours', 'Relocation Assistance'],
        'category' => 'Mobile Development'
    ],
    [
        'id' => 4,
        'title' => 'Cybersecurity Analyst',
        'company' => 'SecureNet Systems',
        'location' => 'Washington, DC',
        'type' => 'Full-time',
        'salary' => '$85,000 - $115,000',
        'experience' => '2+ years',
        'posted' => '5 days ago',
        'logo' => 'assets/images/companies/securenet.jpg',
        'description' => 'Protect our clients from cyber threats and security breaches.',
        'requirements' => ['Network Security', 'SIEM Tools', 'Incident Response', 'Security+', 'Linux'],
        'benefits' => ['Health Insurance', 'Certification Training', 'Retirement Plan', 'Bonuses'],
        'category' => 'Security'
    ],
    [
        'id' => 5,
        'title' => 'Frontend Developer (React)',
        'company' => 'WebFlow Studios',
        'location' => 'Remote',
        'type' => 'Contract',
        'salary' => '$80,000 - $100,000',
        'experience' => '2+ years',
        'posted' => '1 week ago',
        'logo' => 'assets/images/companies/webflow.jpg',
        'description' => 'Build responsive and interactive web applications using React.',
        'requirements' => ['React', 'JavaScript', 'HTML/CSS', 'TypeScript', 'Git'],
        'benefits' => ['Flexible Schedule', 'Remote Work', 'Project Bonuses'],
        'category' => 'Web Development'
    ],
    [
        'id' => 6,
        'title' => 'DevOps Engineer',
        'company' => 'CloudScale Technologies',
        'location' => 'Austin, TX',
        'type' => 'Full-time',
        'salary' => '$105,000 - $140,000',
        'experience' => '4+ years',
        'posted' => '4 days ago',
        'logo' => 'assets/images/companies/cloudscale.jpg',
        'description' => 'Manage and optimize our cloud infrastructure and deployment pipelines.',
        'requirements' => ['AWS', 'Kubernetes', 'Docker', 'Terraform', 'CI/CD', 'Python'],
        'benefits' => ['Health Insurance', 'Stock Options', 'Remote Work', 'Learning Budget', '401(k)'],
        'category' => 'Cloud Computing'
    ],
    [
        'id' => 7,
        'title' => 'UI/UX Designer',
        'company' => 'DesignHub Creative',
        'location' => 'Los Angeles, CA',
        'type' => 'Full-time',
        'salary' => '$75,000 - $95,000',
        'experience' => '3+ years',
        'posted' => '2 days ago',
        'logo' => 'assets/images/companies/designhub.jpg',
        'description' => 'Create stunning user interfaces and exceptional user experiences.',
        'requirements' => ['Figma', 'Adobe XD', 'User Research', 'Prototyping', 'UI Design'],
        'benefits' => ['Health Insurance', 'Creative Freedom', 'Flexible Hours', 'Design Tools Budget'],
        'category' => 'Design'
    ],
    [
        'id' => 8,
        'title' => 'Junior Python Developer',
        'company' => 'StartupX',
        'location' => 'Remote',
        'type' => 'Full-time',
        'salary' => '$60,000 - $75,000',
        'experience' => '0-1 years',
        'posted' => '3 days ago',
        'logo' => 'assets/images/companies/startupx.jpg',
        'description' => 'Great opportunity for new graduates to start their tech career.',
        'requirements' => ['Python', 'Django/Flask', 'SQL', 'Git', 'REST APIs'],
        'benefits' => ['Health Insurance', 'Mentorship Program', 'Remote Work', 'Learning Resources'],
        'category' => 'Programming'
    ]
];
?>

<div class="container-fluid mt-5 mb-5">
    <div class="row">
        <div class="col-12 mb-4">
            <h1><i class="bi bi-building me-2"></i>Job Board</h1>
            <p class="lead">Find your dream job in tech. Browse opportunities from top companies.</p>
        </div>
    </div>

    <!-- Statistics -->
    <div class="row mb-4">
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card bg-primary text-white text-center">
                <div class="card-body">
                    <i class="bi bi-briefcase fs-1"></i>
                    <h3 class="mt-2"><?php echo count($jobs); ?></h3>
                    <p class="mb-0">Active Jobs</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card bg-success text-white text-center">
                <div class="card-body">
                    <i class="bi bi-building fs-1"></i>
                    <h3 class="mt-2">45</h3>
                    <p class="mb-0">Companies</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card bg-info text-white text-center">
                <div class="card-body">
                    <i class="bi bi-bookmark-fill fs-1"></i>
                    <h3 class="mt-2">8</h3>
                    <p class="mb-0">Saved Jobs</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card bg-warning text-white text-center">
                <div class="card-body">
                    <i class="bi bi-send-fill fs-1"></i>
                    <h3 class="mt-2">12</h3>
                    <p class="mb-0">Applications</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Search and Filter -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-search"></i></span>
                                <input type="text" id="searchJobs" class="form-control" placeholder="Search jobs, companies, keywords...">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <select id="categoryFilter" class="form-select">
                                <option value="">All Categories</option>
                                <option value="Web Development">Web Development</option>
                                <option value="Data Science">Data Science</option>
                                <option value="Mobile Development">Mobile</option>
                                <option value="Security">Security</option>
                                <option value="Cloud Computing">Cloud</option>
                                <option value="Design">Design</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select id="typeFilter" class="form-select">
                                <option value="">All Types</option>
                                <option value="Full-time">Full-time</option>
                                <option value="Part-time">Part-time</option>
                                <option value="Contract">Contract</option>
                                <option value="Internship">Internship</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select id="locationFilter" class="form-select">
                                <option value="">All Locations</option>
                                <option value="Remote">Remote</option>
                                <option value="On-site">On-site</option>
                                <option value="Hybrid">Hybrid</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select id="experienceFilter" class="form-select">
                                <option value="">All Levels</option>
                                <option value="0-1">Entry Level</option>
                                <option value="2-4">Mid Level</option>
                                <option value="5+">Senior Level</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Job Listings -->
    <div class="row">
        <div class="col-lg-8">
            <div id="jobsContainer">
                <?php foreach($jobs as $job): ?>
                <div class="card mb-3 shadow-sm hover-card job-item" 
                     data-title="<?php echo strtolower($job['title'] . ' ' . $job['company']); ?>"
                     data-category="<?php echo $job['category']; ?>"
                     data-type="<?php echo $job['type']; ?>"
                     data-location="<?php echo $job['location']; ?>"
                     data-experience="<?php echo $job['experience']; ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2 text-center">
                                <img src="<?php echo $job['logo']; ?>" class="img-fluid rounded" alt="<?php echo $job['company']; ?>" style="max-width: 80px;">
                            </div>
                            <div class="col-md-7">
                                <h5 class="card-title mb-2"><?php echo $job['title']; ?></h5>
                                <p class="text-muted mb-2">
                                    <i class="bi bi-building me-2"></i><?php echo $job['company']; ?>
                                </p>
                                <p class="text-muted small mb-2">
                                    <i class="bi bi-geo-alt me-2"></i><?php echo $job['location']; ?>
                                    <span class="ms-3"><i class="bi bi-clock me-2"></i><?php echo $job['type']; ?></span>
                                    <span class="ms-3"><i class="bi bi-briefcase me-2"></i><?php echo $job['experience']; ?></span>
                                </p>
                                <p class="mb-2"><?php echo $job['description']; ?></p>
                                <div class="mb-2">
                                    <?php foreach(array_slice($job['requirements'], 0, 4) as $skill): ?>
                                        <span class="badge bg-secondary me-1"><?php echo $skill; ?></span>
                                    <?php endforeach; ?>
                                    <?php if(count($job['requirements']) > 4): ?>
                                        <span class="badge bg-light text-dark">+<?php echo count($job['requirements']) - 4; ?> more</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-3 text-end">
                                <h5 class="text-success mb-3"><?php echo $job['salary']; ?></h5>
                                <small class="text-muted d-block mb-3">Posted <?php echo $job['posted']; ?></small>
                                <button class="btn btn-primary btn-sm w-100 mb-2" onclick="viewJob(<?php echo $job['id']; ?>)">
                                    <i class="bi bi-eye"></i> View Details
                                </button>
                                <button class="btn btn-outline-primary btn-sm w-100 mb-2" onclick="saveJob(<?php echo $job['id']; ?>)">
                                    <i class="bi bi-bookmark"></i> Save
                                </button>
                                <button class="btn btn-success btn-sm w-100" onclick="applyJob(<?php echo $job['id']; ?>)">
                                    <i class="bi bi-send"></i> Apply Now
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- No Results Message -->
            <div id="noResults" class="alert alert-info text-center" style="display: none;">
                <i class="bi bi-info-circle fs-3 d-block mb-2"></i>
                <h5>No jobs found</h5>
                <p>Try adjusting your search or filter criteria.</p>
            </div>

            <!-- Pagination -->
            <nav aria-label="Job pagination">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Job Alerts -->
            <div class="card shadow mb-4">
                <div class="card-header bg-primary text-white">
                    <h6 class="mb-0"><i class="bi bi-bell"></i> Job Alerts</h6>
                </div>
                <div class="card-body">
                    <p class="small">Get notified about new jobs matching your preferences.</p>
                    <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#jobAlertModal">
                        <i class="bi bi-plus-circle"></i> Create Alert
                    </button>
                </div>
            </div>

            <!-- Featured Companies -->
            <div class="card shadow mb-4">
                <div class="card-header bg-success text-white">
                    <h6 class="mb-0"><i class="bi bi-star"></i> Featured Companies</h6>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                            <img src="assets/images/companies/techcorp.jpg" class="rounded me-3" width="40" alt="TechCorp">
                            <div>
                                <h6 class="mb-0">TechCorp Solutions</h6>
                                <small class="text-muted">15 open positions</small>
                            </div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                            <img src="assets/images/companies/dataviz.jpg" class="rounded me-3" width="40" alt="DataViz">
                            <div>
                                <h6 class="mb-0">DataViz Analytics</h6>
                                <small class="text-muted">8 open positions</small>
                            </div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                            <img src="assets/images/companies/cloudscale.jpg" class="rounded me-3" width="40" alt="CloudScale">
                            <div>
                                <h6 class="mb-0">CloudScale Tech</h6>
                                <small class="text-muted">12 open positions</small>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Career Resources -->
            <div class="card shadow">
                <div class="card-header bg-info text-white">
                    <h6 class="mb-0"><i class="bi bi-book"></i> Career Resources</h6>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2">
                            <a href="#" class="text-decoration-none">
                                <i class="bi bi-file-earmark-text text-primary"></i> Resume Tips
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="text-decoration-none">
                                <i class="bi bi-chat-dots text-success"></i> Interview Preparation
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="text-decoration-none">
                                <i class="bi bi-currency-dollar text-warning"></i> Salary Guide
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-decoration-none">
                                <i class="bi bi-graph-up text-info"></i> Career Growth Tips
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Job Detail Modal -->
<div class="modal fade" id="jobDetailModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="jobDetailTitle"></h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="jobDetailBody">
                <!-- Job details will be loaded here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-primary" onclick="saveJobFromModal()">
                    <i class="bi bi-bookmark"></i> Save Job
                </button>
                <button type="button" class="btn btn-success" onclick="applyJobFromModal()">
                    <i class="bi bi-send"></i> Apply Now
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Job Alert Modal -->
<div class="modal fade" id="jobAlertModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title"><i class="bi bi-bell"></i> Create Job Alert</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="jobAlertForm">
                    <div class="mb-3">
                        <label class="form-label">Job Title or Keywords</label>
                        <input type="text" class="form-control" placeholder="e.g., Web Developer, Data Scientist">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Location</label>
                        <input type="text" class="form-control" placeholder="e.g., Remote, New York">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Job Type</label>
                        <select class="form-select">
                            <option>All Types</option>
                            <option>Full-time</option>
                            <option>Part-time</option>
                            <option>Contract</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email Frequency</label>
                        <select class="form-select">
                            <option>Daily</option>
                            <option>Weekly</option>
                            <option>Instant</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="createJobAlert()">
                    <i class="bi bi-check-circle"></i> Create Alert
                </button>
            </div>
        </div>
    </div>
</div>

<style>
.hover-card {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.hover-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.12) !important;
}
</style>

<script>
const jobs = <?php echo json_encode($jobs); ?>;
let currentJobId = null;

// Filter functionality
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchJobs');
    const categoryFilter = document.getElementById('categoryFilter');
    const typeFilter = document.getElementById('typeFilter');
    const locationFilter = document.getElementById('locationFilter');
    const experienceFilter = document.getElementById('experienceFilter');
    const noResults = document.getElementById('noResults');
    
    function filterJobs() {
        const searchTerm = searchInput.value.toLowerCase();
        const category = categoryFilter.value;
        const type = typeFilter.value;
        const location = locationFilter.value;
        const experience = experienceFilter.value;
        
        const items = document.querySelectorAll('.job-item');
        let visibleCount = 0;
        
        items.forEach(item => {
            const title = item.dataset.title;
            const itemCategory = item.dataset.category;
            const itemType = item.dataset.type;
            const itemLocation = item.dataset.location;
            const itemExperience = item.dataset.experience;
            
            const matchesSearch = title.includes(searchTerm);
            const matchesCategory = !category || itemCategory === category;
            const matchesType = !type || itemType === type;
            const matchesLocation = !location || 
                (location === 'Remote' && itemLocation === 'Remote') ||
                (location === 'On-site' && itemLocation !== 'Remote');
            const matchesExperience = !experience || itemExperience.includes(experience);
            
            if (matchesSearch && matchesCategory && matchesType && matchesLocation && matchesExperience) {
                item.style.display = '';
                visibleCount++;
            } else {
                item.style.display = 'none';
            }
        });
        
        noResults.style.display = visibleCount === 0 ? 'block' : 'none';
    }
    
    searchInput.addEventListener('input', filterJobs);
    categoryFilter.addEventListener('change', filterJobs);
    typeFilter.addEventListener('change', filterJobs);
    locationFilter.addEventListener('change', filterJobs);
    experienceFilter.addEventListener('change', filterJobs);
});

function viewJob(id) {
    const job = jobs.find(j => j.id === id);
    if (!job) return;
    
    currentJobId = id;
    document.getElementById('jobDetailTitle').textContent = job.title;
    
    let detailHTML = `
        <div class="row mb-4">
            <div class="col-md-3 text-center">
                <img src="${job.logo}" class="img-fluid rounded" alt="${job.company}">
            </div>
            <div class="col-md-9">
                <h4>${job.company}</h4>
                <p class="text-muted mb-2">
                    <i class="bi bi-geo-alt me-2"></i>${job.location}
                    <span class="ms-3"><i class="bi bi-clock me-2"></i>${job.type}</span>
                    <span class="ms-3"><i class="bi bi-briefcase me-2"></i>${job.experience}</span>
                </p>
                <h5 class="text-success">${job.salary}</h5>
                <p class="small text-muted">Posted ${job.posted}</p>
            </div>
        </div>
        
        <h5 class="mb-3">Job Description</h5>
        <p>${job.description}</p>
        
        <h5 class="mb-3 mt-4">Required Skills</h5>
        <div class="mb-3">
            ${job.requirements.map(skill => `<span class="badge bg-primary me-1 mb-1">${skill}</span>`).join('')}
        </div>
        
        <h5 class="mb-3 mt-4">Benefits</h5>
        <ul>
            ${job.benefits.map(benefit => `<li>${benefit}</li>`).join('')}
        </ul>
        
        <h5 class="mb-3 mt-4">About the Role</h5>
        <p>This is an exciting opportunity to join ${job.company} as a ${job.title}. We are looking for a passionate individual who can contribute to our growing team and help us achieve our goals.</p>
    `;
    
    document.getElementById('jobDetailBody').innerHTML = detailHTML;
    
    const modal = new bootstrap.Modal(document.getElementById('jobDetailModal'));
    modal.show();
}

function saveJob(id) {
    alert(window.twDashTranslate('Job saved successfully! You can find it in your saved jobs.'));
}

function saveJobFromModal() {
    if (currentJobId) {
        saveJob(currentJobId);
    }
}

function applyJob(id) {
    const job = jobs.find(j => j.id === id);
    if (job) {
        if (confirm(`Do you want to apply for ${job.title} at ${job.company}?`)) {
            alert(window.twDashTranslate('Application submitted successfully! The company will review your profile and contact you soon.'));
        }
    }
}

function applyJobFromModal() {
    if (currentJobId) {
        applyJob(currentJobId);
        bootstrap.Modal.getInstance(document.getElementById('jobDetailModal')).hide();
    }
}

function createJobAlert() {
    alert(window.twDashTranslate('Job alert created successfully! You will receive notifications based on your preferences.'));
    bootstrap.Modal.getInstance(document.getElementById('jobAlertModal')).hide();
}
</script>

<?php
include(__DIR__ . '/..\..\..\includes\footer\footer.php');
?>