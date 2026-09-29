<?php
session_start();
include(__DIR__ . '/..\..\..\includes\header\header.php');
include(__DIR__ . '/..\..\..\includes\navbar\navbar.php');
include(__DIR__ . '/..\..\..\includes\sidebar\sidebar.php');

$careerPaths = [
    [
        'id' => 1,
        'title' => 'Full Stack Web Developer',
        'category' => 'Web Development',
        'level' => 'Beginner to Advanced',
        'duration' => '6-12 months',
        'salary' => '$70,000 - $120,000',
        'demand' => 'High',
        'description' => 'Master both frontend and backend development to build complete web applications.',
        'skills' => ['HTML/CSS', 'JavaScript', 'React', 'Node.js', 'MongoDB', 'Git'],
        'steps' => [
            'Learn HTML, CSS, and JavaScript basics',
            'Master a frontend framework (React/Vue)',
            'Learn backend with Node.js or Python',
            'Understand databases (SQL/NoSQL)',
            'Build portfolio projects',
            'Deploy applications to production'
        ],
        'jobs' => ['Frontend Developer', 'Backend Developer', 'Full Stack Engineer']
    ],
    [
        'id' => 2,
        'title' => 'Data Scientist',
        'category' => 'Data Science',
        'level' => 'Intermediate to Advanced',
        'duration' => '12-18 months',
        'salary' => '$90,000 - $150,000',
        'demand' => 'Very High',
        'description' => 'Analyze complex data to help organizations make better decisions.',
        'skills' => ['Python', 'Statistics', 'Machine Learning', 'SQL', 'Data Visualization', 'R'],
        'steps' => [
            'Learn Python and statistics fundamentals',
            'Master data analysis libraries (Pandas, NumPy)',
            'Study machine learning algorithms',
            'Learn data visualization (Matplotlib, Tableau)',
            'Work on real-world datasets',
            'Build a data science portfolio'
        ],
        'jobs' => ['Data Analyst', 'ML Engineer', 'Business Intelligence Analyst']
    ],
    [
        'id' => 3,
        'title' => 'Mobile App Developer',
        'category' => 'Mobile Development',
        'level' => 'Beginner to Advanced',
        'duration' => '8-14 months',
        'salary' => '$75,000 - $130,000',
        'demand' => 'High',
        'description' => 'Create mobile applications for iOS and Android platforms.',
        'skills' => ['Swift/Kotlin', 'React Native', 'Flutter', 'Mobile UI/UX', 'API Integration', 'Firebase'],
        'steps' => [
            'Choose a platform (iOS/Android/Cross-platform)',
            'Learn platform-specific language',
            'Understand mobile UI/UX principles',
            'Master mobile development frameworks',
            'Learn app deployment process',
            'Build and publish apps to app stores'
        ],
        'jobs' => ['iOS Developer', 'Android Developer', 'React Native Developer']
    ],
    [
        'id' => 4,
        'title' => 'Cybersecurity Analyst',
        'category' => 'Security',
        'level' => 'Intermediate to Advanced',
        'duration' => '10-16 months',
        'salary' => '$80,000 - $140,000',
        'demand' => 'Very High',
        'description' => 'Protect organizations from cyber threats and security breaches.',
        'skills' => ['Network Security', 'Ethical Hacking', 'Security Tools', 'Linux', 'Cryptography', 'Risk Assessment'],
        'steps' => [
            'Learn networking fundamentals',
            'Study common security threats and vulnerabilities',
            'Master security tools (Wireshark, Metasploit)',
            'Get certified (Security+, CEH, CISSP)',
            'Practice ethical hacking in labs',
            'Gain hands-on experience with real scenarios'
        ],
        'jobs' => ['Security Analyst', 'Penetration Tester', 'Security Engineer']
    ],
    [
        'id' => 5,
        'title' => 'Cloud Solutions Architect',
        'category' => 'Cloud Computing',
        'level' => 'Advanced',
        'duration' => '12-18 months',
        'salary' => '$110,000 - $180,000',
        'demand' => 'Very High',
        'description' => 'Design and implement cloud infrastructure and solutions.',
        'skills' => ['AWS/Azure/GCP', 'DevOps', 'Kubernetes', 'Terraform', 'CI/CD', 'Security'],
        'steps' => [
            'Learn cloud computing fundamentals',
            'Master a cloud platform (AWS/Azure/GCP)',
            'Study containerization and orchestration',
            'Learn Infrastructure as Code',
            'Understand cloud security best practices',
            'Get cloud certifications'
        ],
        'jobs' => ['Cloud Engineer', 'DevOps Engineer', 'Solutions Architect']
    ],
    [
        'id' => 6,
        'title' => 'UI/UX Designer',
        'category' => 'Design',
        'level' => 'Beginner to Advanced',
        'duration' => '6-10 months',
        'salary' => '$65,000 - $110,000',
        'demand' => 'High',
        'description' => 'Create intuitive and beautiful user interfaces and experiences.',
        'skills' => ['Figma', 'Adobe XD', 'User Research', 'Prototyping', 'Visual Design', 'Usability Testing'],
        'steps' => [
            'Learn design fundamentals and principles',
            'Master design tools (Figma, Adobe XD)',
            'Study user research methods',
            'Practice creating wireframes and prototypes',
            'Build a design portfolio',
            'Learn about accessibility and responsive design'
        ],
        'jobs' => ['UI Designer', 'UX Designer', 'Product Designer']
    ]
];
?>

<div class="container-fluid mt-5 mb-5">
    <div class="row">
        <div class="col-12 text-center mb-4">
            <h1><i class="bi bi-briefcase me-2"></i>Career Path Explorer</h1>
            <p class="lead">Discover your perfect tech career and create a roadmap to success</p>
        </div>
    </div>

    <!-- Career Quiz Prompt -->
    <div class="row mb-4">
        <div class="col-md-10 offset-md-1">
            <div class="card bg-gradient-primary text-white shadow-lg">
                <div class="card-body text-center p-4">
                    <i class="bi bi-compass fs-1 mb-3"></i>
                    <h3>Not sure which path to choose?</h3>
                    <p class="mb-3">Take our career assessment quiz to find the best career path based on your interests and skills.</p>
                    <button class="btn btn-light btn-lg" data-bs-toggle="modal" data-bs-target="#careerQuizModal">
                        <i class="bi bi-play-fill"></i> Start Career Quiz
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="row mb-4">
        <div class="col-md-10 offset-md-1">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Category</label>
                            <select id="categoryFilter" class="form-select">
                                <option value="">All Categories</option>
                                <option value="Web Development">Web Development</option>
                                <option value="Data Science">Data Science</option>
                                <option value="Mobile Development">Mobile Development</option>
                                <option value="Security">Security</option>
                                <option value="Cloud Computing">Cloud Computing</option>
                                <option value="Design">Design</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Experience Level</label>
                            <select id="levelFilter" class="form-select">
                                <option value="">All Levels</option>
                                <option value="Beginner">Beginner</option>
                                <option value="Intermediate">Intermediate</option>
                                <option value="Advanced">Advanced</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Market Demand</label>
                            <select id="demandFilter" class="form-select">
                                <option value="">All</option>
                                <option value="High">High</option>
                                <option value="Very High">Very High</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Career Paths Grid -->
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="row" id="careerPathsContainer">
                <?php foreach($careerPaths as $path): ?>
                <div class="col-lg-6 mb-4 career-path-item" 
                     data-category="<?php echo $path['category']; ?>"
                     data-level="<?php echo explode(' ', $path['level'])[0]; ?>"
                     data-demand="<?php echo $path['demand']; ?>">
                    <div class="card h-100 shadow-sm hover-effect">
                        <div class="card-header bg-primary text-white">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0"><?php echo $path['title']; ?></h5>
                                <span class="badge bg-light text-dark"><?php echo $path['category']; ?></span>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="text-muted"><?php echo $path['description']; ?></p>
                            
                            <div class="row mb-3">
                                <div class="col-6">
                                    <small class="text-muted d-block"><i class="bi bi-bar-chart"></i> Level</small>
                                    <strong><?php echo $path['level']; ?></strong>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted d-block"><i class="bi bi-clock"></i> Duration</small>
                                    <strong><?php echo $path['duration']; ?></strong>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-6">
                                    <small class="text-muted d-block"><i class="bi bi-currency-dollar"></i> Salary Range</small>
                                    <strong class="text-success"><?php echo $path['salary']; ?></strong>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted d-block"><i class="bi bi-graph-up-arrow"></i> Demand</small>
                                    <span class="badge bg-<?php echo $path['demand'] == 'Very High' ? 'success' : 'info'; ?>">
                                        <?php echo $path['demand']; ?>
                                    </span>
                                </div>
                            </div>
                            
                            <h6 class="mb-2">Key Skills:</h6>
                            <div class="mb-3">
                                <?php foreach(array_slice($path['skills'], 0, 6) as $skill): ?>
                                    <span class="badge bg-secondary me-1 mb-1"><?php echo $skill; ?></span>
                                <?php endforeach; ?>
                            </div>
                            
                            <h6 class="mb-2">Potential Roles:</h6>
                            <ul class="small mb-3">
                                <?php foreach($path['jobs'] as $job): ?>
                                    <li><?php echo $job; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="card-footer bg-light">
                            <button class="btn btn-primary w-100" onclick="viewCareerPath(<?php echo $path['id']; ?>)">
                                <i class="bi bi-arrow-right-circle"></i> View Full Roadmap
                            </button>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            
            <!-- No Results Message -->
            <div id="noResults" class="alert alert-info text-center" style="display: none;">
                <i class="bi bi-info-circle"></i> No career paths match your filters. Try adjusting your criteria.
            </div>
        </div>
    </div>
</div>

<!-- Career Quiz Modal -->
<div class="modal fade" id="careerQuizModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title"><i class="bi bi-clipboard-check"></i> Career Assessment Quiz</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="quizContent">
                    <div class="mb-4">
                        <h6>Question 1 of 5</h6>
                        <p class="lead">What type of work do you enjoy most?</p>
                        <div class="list-group">
                            <label class="list-group-item">
                                <input class="form-check-input me-2" type="radio" name="q1" value="creative">
                                Creative and visual design work
                            </label>
                            <label class="list-group-item">
                                <input class="form-check-input me-2" type="radio" name="q1" value="analytical">
                                Analyzing data and solving complex problems
                            </label>
                            <label class="list-group-item">
                                <input class="form-check-input me-2" type="radio" name="q1" value="building">
                                Building applications and systems
                            </label>
                            <label class="list-group-item">
                                <input class="form-check-input me-2" type="radio" name="q1" value="security">
                                Protecting systems and investigating threats
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Next Question</button>
            </div>
        </div>
    </div>
</div>

<!-- Career Detail Modal -->
<div class="modal fade" id="careerDetailModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="careerDetailTitle"></h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="careerDetailBody">
                <!-- Career details will be loaded here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success">
                    <i class="bi bi-bookmark-plus"></i> Save to My Goals
                </button>
            </div>
        </div>
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

.bg-gradient-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}
</style>

<script>
const careerPaths = <?php echo json_encode($careerPaths); ?>;

// Filter functionality
document.addEventListener('DOMContentLoaded', function() {
    const categoryFilter = document.getElementById('categoryFilter');
    const levelFilter = document.getElementById('levelFilter');
    const demandFilter = document.getElementById('demandFilter');
    const noResults = document.getElementById('noResults');
    
    function filterCareers() {
        const category = categoryFilter.value;
        const level = levelFilter.value;
        const demand = demandFilter.value;
        
        const items = document.querySelectorAll('.career-path-item');
        let visibleCount = 0;
        
        items.forEach(item => {
            const itemCategory = item.dataset.category;
            const itemLevel = item.dataset.level;
            const itemDemand = item.dataset.demand;
            
            const matchesCategory = !category || itemCategory === category;
            const matchesLevel = !level || itemLevel === level;
            const matchesDemand = !demand || itemDemand === demand;
            
            if (matchesCategory && matchesLevel && matchesDemand) {
                item.style.display = '';
                visibleCount++;
            } else {
                item.style.display = 'none';
            }
        });
        
        noResults.style.display = visibleCount === 0 ? 'block' : 'none';
    }
    
    categoryFilter.addEventListener('change', filterCareers);
    levelFilter.addEventListener('change', filterCareers);
    demandFilter.addEventListener('change', filterCareers);
});

function viewCareerPath(id) {
    const career = careerPaths.find(c => c.id === id);
    if (!career) return;
    
    document.getElementById('careerDetailTitle').textContent = career.title;
    
    let stepsHTML = '<h5 class="mb-3">Learning Roadmap</h5><div class="timeline">';
    career.steps.forEach((step, index) => {
        stepsHTML += `
            <div class="d-flex mb-3">
                <div class="flex-shrink-0">
                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" 
                         style="width: 40px; height: 40px;">
                        ${index + 1}
                    </div>
                </div>
                <div class="flex-grow-1 ms-3">
                    <p class="mb-0">${step}</p>
                </div>
            </div>
        `;
    });
    stepsHTML += '</div>';
    
    let skillsHTML = '<h5 class="mb-3 mt-4">Required Skills</h5><div class="row">';
    career.skills.forEach(skill => {
        skillsHTML += `
            <div class="col-md-4 mb-2">
                <span class="badge bg-primary p-2 w-100">${skill}</span>
            </div>
        `;
    });
    skillsHTML += '</div>';
    
    document.getElementById('careerDetailBody').innerHTML = stepsHTML + skillsHTML;
    
    const modal = new bootstrap.Modal(document.getElementById('careerDetailModal'));
    modal.show();
}
</script>

<?php
include(__DIR__ . '/..\..\..\includes\footer\footer.php');
?>