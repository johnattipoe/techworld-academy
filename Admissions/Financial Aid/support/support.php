<?php 
session_start();
include(__DIR__ . '/../../../includes/lang/lang.php');
include(__DIR__ . '/../../../includes/header/header.php');
include(__DIR__ . '/../../../includes/navbar/navbar.php'); 
include(__DIR__ . '/../../../includes/sidebar/sidebar.php');
?>


<!-- STUDENT SUPPORT PAGE -->

<!-- Hero Section -->
<section class="py-5 text-white" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);">
    <div class="container text-center">
        <h1 class="display-4 fw-bold mb-3">Student Support Services</h1>
        <p class="lead mb-4">Comprehensive support to ensure your success throughout your academic journey</p>
        <p class="mb-0">We're committed to your wellbeing, growth, and achievement</p>
    </div>
</section>

<!-- Overview Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h2 class="fw-bold text-success mb-4">Your Success Is Our Priority</h2>
                <p class="lead">We understand that academic success extends beyond the classroom. Our comprehensive support services are designed to help you overcome challenges, achieve your goals, and thrive during your time with us.</p>
                <p>From financial assistance to mental health support, career counseling to academic tutoring, we provide a network of resources tailored to meet your unique needs.</p>
            </div>
            <div class="col-lg-6">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="card border-0 shadow-sm text-center p-3">
                            <i class="bi bi-people-fill text-success mb-2" style="font-size: 2.5rem;"></i>
                            <h4 class="fw-bold mb-0">500+</h4>
                            <small class="text-muted">Students Helped Monthly</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card border-0 shadow-sm text-center p-3">
                            <i class="bi bi-clock-fill text-primary mb-2" style="font-size: 2.5rem;"></i>
                            <h4 class="fw-bold mb-0">24/7</h4>
                            <small class="text-muted">Emergency Support</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card border-0 shadow-sm text-center p-3">
                            <i class="bi bi-award-fill text-warning mb-2" style="font-size: 2.5rem;"></i>
                            <h4 class="fw-bold mb-0">95%</h4>
                            <small class="text-muted">Satisfaction Rate</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card border-0 shadow-sm text-center p-3">
                            <i class="bi bi-headset text-info mb-2" style="font-size: 2.5rem;"></i>
                            <h4 class="fw-bold mb-0">15+</h4>
                            <small class="text-muted">Support Programs</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Financial Support Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-success mb-3">Financial Support Services</h2>
            <p class="lead text-muted">We're here to help you navigate the financial aspects of your education</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="bi bi-person-badge-fill text-success" style="font-size: 3rem;"></i>
                        </div>
                        <h5 class="fw-bold text-primary mb-3">Financial Counseling</h5>
                        <p class="mb-3">One-on-one personalized sessions with experienced financial counselors to help you create sustainable payment plans and understand all available funding options.</p>
                        <ul class="list-unstyled small">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Budget planning assistance</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Payment plan guidance</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Financial literacy workshops</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="bi bi-shield-fill-check text-danger" style="font-size: 3rem;"></i>
                        </div>
                        <h5 class="fw-bold text-primary mb-3">Emergency Financial Aid</h5>
                        <p class="mb-3">Short-term emergency assistance for students facing unexpected financial hardships such as medical expenses, family emergencies, or natural disasters.</p>
                        <ul class="list-unstyled small">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Quick application process</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>48-hour response time</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Up to GHS 5,000 assistance</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="bi bi-wallet2 text-info" style="font-size: 3rem;"></i>
                        </div>
                        <h5 class="fw-bold text-primary mb-3">Scholarship Assistance</h5>
                        <p class="mb-3">Expert guidance in identifying and applying for scholarships, grants, and external funding opportunities that match your profile and needs.</p>
                        <ul class="list-unstyled small">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Scholarship database access</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Application review service</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Essay writing workshops</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="bi bi-briefcase-fill text-warning" style="font-size: 3rem;"></i>
                        </div>
                        <h5 class="fw-bold text-primary mb-3">Work-Study Programs</h5>
                        <p class="mb-3">Flexible part-time employment opportunities on campus that allow you to earn while you learn and gain valuable work experience.</p>
                        <ul class="list-unstyled small">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Flexible scheduling</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>15-20 hours per week</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Competitive hourly rates</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="bi bi-book-fill text-primary" style="font-size: 3rem;"></i>
                        </div>
                        <h5 class="fw-bold text-primary mb-3">Textbook Assistance</h5>
                        <p class="mb-3">Financial support and resources to help you obtain required course materials without straining your budget.</p>
                        <ul class="list-unstyled small">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Textbook loan program</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Digital resource access</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Book vouchers available</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="bi bi-piggy-bank-fill text-success" style="font-size: 3rem;"></i>
                        </div>
                        <h5 class="fw-bold text-primary mb-3">Financial Literacy</h5>
                        <p class="mb-3">Workshops and resources to help you develop essential money management skills for your academic journey and beyond.</p>
                        <ul class="list-unstyled small">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Budgeting workshops</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Debt management advice</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Savings strategies</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Academic Support Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-primary mb-3">Academic Support Services</h2>
            <p class="lead text-muted">Resources to help you excel in your studies</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">
                        <i class="bi bi-journal-text text-primary mb-3" style="font-size: 3rem;"></i>
                        <h5 class="fw-bold mb-3">Tutoring Services</h5>
                        <p class="small mb-0">Free peer and professional tutoring in all major subjects. Group and one-on-one sessions available.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">
                        <i class="bi bi-pencil-square text-success mb-3" style="font-size: 3rem;"></i>
                        <h5 class="fw-bold mb-3">Writing Center</h5>
                        <p class="small mb-0">Professional assistance with essays, research papers, and writing assignments at any stage of the process.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">
                        <i class="bi bi-laptop text-info mb-3" style="font-size: 3rem;"></i>
                        <h5 class="fw-bold mb-3">Computer Labs</h5>
                        <p class="small mb-0">24/7 access to computer labs with latest software and technology for academic projects.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">
                        <i class="bi bi-bookmark-star text-warning mb-3" style="font-size: 3rem;"></i>
                        <h5 class="fw-bold mb-3">Study Groups</h5>
                        <p class="small mb-0">Organized study groups and peer learning communities for collaborative learning.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Personal Wellbeing Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-info mb-3">Personal Wellbeing Services</h2>
            <p class="lead text-muted">Supporting your mental, physical, and emotional health</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <i class="bi bi-heart-pulse-fill text-danger mb-3" style="font-size: 2.5rem;"></i>
                        <h5 class="fw-bold mb-3">Counseling Services</h5>
                        <p class="mb-3">Professional mental health counseling and therapy services available to all students. Confidential, free, and accessible.</p>
                        <div class="small">
                            <p class="mb-1"><strong>Services Include:</strong></p>
                            <ul class="mb-0">
                                <li>Individual counseling</li>
                                <li>Group therapy sessions</li>
                                <li>Crisis intervention</li>
                                <li>Stress management</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <i class="bi bi-hospital-fill text-danger mb-3" style="font-size: 2.5rem;"></i>
                        <h5 class="fw-bold mb-3">Health Services</h5>
                        <p class="mb-3">On-campus health clinic providing basic medical care, health education, and wellness programs for students.</p>
                        <div class="small">
                            <p class="mb-1"><strong>Available Services:</strong></p>
                            <ul class="mb-0">
                                <li>General consultations</li>
                                <li>Vaccinations</li>
                                <li>Health screenings</li>
                                <li>First aid</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <i class="bi bi-person-arms-up text-success mb-3" style="font-size: 2.5rem;"></i>
                        <h5 class="fw-bold mb-3">Wellness Programs</h5>
                        <p class="mb-3">Holistic wellness programs focusing on physical fitness, nutrition, mindfulness, and work-life balance.</p>
                        <div class="small">
                            <p class="mb-1"><strong>Programs Offered:</strong></p>
                            <ul class="mb-0">
                                <li>Fitness classes</li>
                                <li>Meditation sessions</li>
                                <li>Nutrition workshops</li>
                                <li>Yoga and sports</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Career & Professional Development Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-warning mb-3">Career & Professional Development</h2>
            <p class="lead text-muted">Preparing you for a successful career</p>
        </div>

        <div class="row g-4 align-items-center">
            <div class="col-lg-6">
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-5">
                        <h4 class="fw-bold mb-4">Career Services</h4>
                        <div class="mb-4">
                            <h6 class="fw-bold"><i class="bi bi-briefcase-fill text-warning me-2"></i>Career Counseling</h6>
                            <p class="small mb-3">Personalized guidance to help you explore career paths, set goals, and develop professional skills.</p>
                        </div>
                        <div class="mb-4">
                            <h6 class="fw-bold"><i class="bi bi-file-earmark-text-fill text-primary me-2"></i>Resume & CV Building</h6>
                            <p class="small mb-3">Expert assistance in creating compelling resumes, cover letters, and professional portfolios.</p>
                        </div>
                        <div class="mb-4">
                            <h6 class="fw-bold"><i class="bi bi-people-fill text-success me-2"></i>Interview Preparation</h6>
                            <p class="small mb-3">Mock interviews, feedback sessions, and strategies to help you ace your interviews.</p>
                        </div>
                        <div>
                            <h6 class="fw-bold"><i class="bi bi-building text-info me-2"></i>Job Placement Support</h6>
                            <p class="small mb-0">Access to job boards, employer connections, and internship opportunities.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="row g-3">
                    <div class="col-12">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4 text-center">
                                <i class="bi bi-graph-up-arrow text-success mb-2" style="font-size: 2.5rem;"></i>
                                <h5 class="fw-bold mb-2">85%</h5>
                                <p class="small text-muted mb-0">Employment Rate Within 6 Months</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-3 text-center">
                                <i class="bi bi-building text-primary mb-2" style="font-size: 2rem;"></i>
                                <h6 class="fw-bold mb-1">200+</h6>
                                <small class="text-muted">Partner Companies</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-3 text-center">
                                <i class="bi bi-calendar-event text-warning mb-2" style="font-size: 2rem;"></i>
                                <h6 class="fw-bold mb-1">50+</h6>
                                <small class="text-muted">Career Events/Year</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <h6 class="fw-bold mb-3">Upcoming Events</h6>
                                <div class="d-flex align-items-center mb-2">
                                    <i class="bi bi-calendar-check text-primary me-2"></i>
                                    <small>Career Fair - Oct 15, 2025</small>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <i class="bi bi-calendar-check text-primary me-2"></i>
                                    <small>Resume Workshop - Oct 20, 2025</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-calendar-check text-primary me-2"></i>
                                    <small>Networking Mixer - Oct 28, 2025</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Diversity & Inclusion Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-primary mb-3">Diversity & Inclusion Support</h2>
            <p class="lead text-muted">Creating a welcoming environment for all students</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">
                        <i class="bi bi-globe text-info mb-3" style="font-size: 3rem;"></i>
                        <h5 class="fw-bold mb-3">International Student Services</h5>
                        <p class="small">Support with visa matters, cultural adjustment, and connecting with the international community.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">
                        <i class="bi bi-universal-access text-primary mb-3" style="font-size: 3rem;"></i>
                        <h5 class="fw-bold mb-3">Disability Services</h5>
                        <p class="small">Accommodations and support for students with disabilities to ensure equal access to education.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">
                        <i class="bi bi-house-heart text-danger mb-3" style="font-size: 3rem;"></i>
                        <h5 class="fw-bold mb-3">LGBTQ+ Support</h5>
                        <p class="small">Safe spaces, resources, and advocacy for LGBTQ+ students and allies on campus.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How to Access Support Section -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="fw-bold text-center text-primary mb-5">How to Access Support Services</h2>
        
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-5">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="d-flex align-items-start mb-4">
                                    <div class="bg-primary text-white rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; min-width: 50px;">
                                        <h5 class="mb-0">1</h5>
                                    </div>
                                    <div>
                                        <h5 class="fw-bold mb-2">Visit the Student Services Office</h5>
                                        <p class="mb-0 small">Walk in during office hours (Mon-Fri, 8AM-5PM) or schedule an appointment online.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="d-flex align-items-start mb-4">
                                    <div class="bg-success text-white rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; min-width: 50px;">
                                        <h5 class="mb-0">2</h5>
                                    </div>
                                    <div>
                                        <h5 class="fw-bold mb-2">Call or Email Us</h5>
                                        <p class="mb-0 small">Reach out via phone or email to speak with a support coordinator who can direct you to the right service.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="d-flex align-items-start mb-4">
                                    <div class="bg-warning text-white rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; min-width: 50px;">
                                        <h5 class="mb-0">3</h5>
                                    </div>
                                    <div>
                                        <h5 class="fw-bold mb-2">Use the Student Portal</h5>
                                        <p class="mb-0 small">Access many services online through your student portal, including appointment booking and resource access.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="d-flex align-items-start mb-4">
                                    <div class="bg-info text-white rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; min-width: 50px;">
                                        <h5 class="mb-0">4</h5>
                                    </div>
                                    <div>
                                        <h5 class="fw-bold mb-2">Emergency Support</h5>
                                        <p class="mb-0 small">For urgent matters, call our 24/7 emergency hotline or visit campus security who can connect you immediately.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="alert alert-info mt-4 mb-0">
                            <i class="bi bi-info-circle me-2"></i>
                            <strong>Confidentiality:</strong> All support services maintain strict confidentiality. Your privacy and wellbeing are our top priorities.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Support Hours & Contact Section -->
<section class="py-5">
    <div class="container">
        <h2 class="fw-bold text-center text-primary mb-5">Support Hours & Contact Information</h2>
        
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4 text-center">
                        <i class="bi bi-clock-fill text-primary mb-3" style="font-size: 3rem;"></i>
                        <h5 class="fw-bold mb-3">Office Hours</h5>
                        <div class="text-start">
                            <p class="mb-2"><strong>Monday - Friday:</strong><br>8:00 AM - 5:00 PM</p>
                            <p class="mb-2"><strong>Saturday:</strong><br>9:00 AM - 1:00 PM</p>
                            <p class="mb-0"><strong>Sunday:</strong><br>Closed</p>
                        </div>
                        <div class="alert alert-success mt-3 mb-0">
                            <small><i class="bi bi-telephone-fill me-2"></i>24/7 Emergency Hotline Available</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4 text-center">
                        <i class="bi bi-geo-alt-fill text-danger mb-3" style="font-size: 3rem;"></i>
                        <h5 class="fw-bold mb-3">Visit Us</h5>
                        <p><strong>Student Services Building</strong><br>
                        Ground Floor, Room 105<br>
                        Main Campus<br>
                        Accra, Ghana</p>
                        <a href="#" class="btn btn-outline-primary btn-sm">Get Directions</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4 text-center">
                        <i class="bi bi-envelope-fill text-info mb-3" style="font-size: 3rem;"></i>
                        <h5 class="fw-bold mb-3">Contact Details</h5>
                        <div class="text-start">
                            <p class="mb-2"><i class="bi bi-telephone-fill text-success me-2"></i><strong>Phone:</strong><br>+233 XX XXX XXXX</p>
                            <p class="mb-2"><i class="bi bi-headset text-danger me-2"></i><strong>Emergency:</strong><br>+233 XX XXX XXXX</p>
                            <p class="mb-0"><i class="bi bi-envelope text-primary me-2"></i><strong>Email:</strong><br>support@school.edu</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="fw-bold text-center text-primary mb-5">Student Testimonials</h2>
        
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="bi bi-quote text-success" style="font-size: 2rem;"></i>
                        </div>
                        <p class="mb-3">"The financial counseling team helped me create a payment plan that worked for my family. I was able to continue my studies without the constant worry about fees."</p>
                        <div class="d-flex align-items-center">
                            <div class="bg-primary text-white rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                <i class="bi bi-person-fill"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0">Kwame A.</h6>
                                <small class="text-muted">Business Administration, 3rd Year</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="bi bi-quote text-success" style="font-size: 2rem;"></i>
                        </div>
                        <p class="mb-3">"The counseling services gave me the tools to manage my anxiety during exam periods. The support I received was life-changing and completely confidential."</p>
                        <div class="d-flex align-items-center">
                            <div class="bg-success text-white rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                <i class="bi bi-person-fill"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0">Ama B.</h6>
                                <small class="text-muted">Computer Science, 2nd Year</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="bi bi-quote text-success" style="font-size: 2rem;"></i>
                        </div>
                        <p class="mb-3">"The career services team reviewed my resume and prepared me for interviews. Within three months of graduation, I landed my dream job at a top company!"</p>
                        <div class="d-flex align-items-center">
                            <div class="bg-warning text-white rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                <i class="bi bi-person-fill"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0">Kofi M.</h6>
                                <small class="text-muted">Engineering, Graduate</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-5">
    <div class="container">
        <h2 class="fw-bold text-center text-primary mb-5">Frequently Asked Questions</h2>
        
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="accordion" id="supportFAQ">
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                Are support services free for all students?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#supportFAQ">
                            <div class="accordion-body">
                                Yes, all basic support services including counseling, tutoring, career services, and financial counseling are completely free for enrolled students. Some specialized services may have nominal fees, but financial assistance is available for students who need it.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                Is counseling confidential?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#supportFAQ">
                            <div class="accordion-body">
                                Absolutely. All counseling sessions are completely confidential. Information is only shared with your written consent or in rare cases where there is imminent danger to yourself or others, as required by law and professional ethics.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                How quickly can I get emergency financial assistance?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#supportFAQ">
                            <div class="accordion-body">
                                Emergency financial aid applications are processed within 48 hours. For urgent cases, same-day assistance may be available. Contact the Financial Aid Office immediately to discuss your situation and start the application process.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                Can I access support services remotely?
                            </button>
                        </h2>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#supportFAQ">
                            <div class="accordion-body">
                                Yes! Many services are available remotely including virtual counseling sessions, online tutoring, career counseling via video call, and financial consultations through email or phone. Check the student portal for remote service options.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                Do I need an appointment or can I walk in?
                            </button>
                        </h2>
                        <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#supportFAQ">
                            <div class="accordion-body">
                                Both options are available. While appointments ensure dedicated time with a counselor or advisor, walk-ins are welcome during office hours. For counseling and career services, we recommend scheduling appointments to guarantee availability.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">
                                What if I'm struggling but don't know which service I need?
                            </button>
                        </h2>
                        <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#supportFAQ">
                            <div class="accordion-body">
                                That's perfectly fine! Contact the general Student Services office, and our team will assess your needs and direct you to the appropriate resources. We're here to help you navigate all available support options.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-0 shadow-sm">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq7">
                                Are support services available during holidays and breaks?
                            </button>
                        </h2>
                        <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#supportFAQ">
                            <div class="accordion-body">
                                Basic services operate on reduced hours during breaks, and the 24/7 emergency hotline remains available year-round. Check the academic calendar or contact Student Services for specific holiday hours and available services during break periods.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Resources Section -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="fw-bold text-center text-primary mb-5">Additional Resources</h2>
        
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <i class="bi bi-file-earmark-pdf-fill text-danger mb-3" style="font-size: 2.5rem;"></i>
                        <h6 class="fw-bold mb-3">Student Handbook</h6>
                        <p class="small mb-3">Comprehensive guide to all student services and policies</p>
                        <a href="#" class="btn btn-sm btn-outline-primary">Download PDF</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <i class="bi bi-book-fill text-primary mb-3" style="font-size: 2.5rem;"></i>
                        <h6 class="fw-bold mb-3">Resource Library</h6>
                        <p class="small mb-3">Online articles, videos, and self-help materials</p>
                        <a href="#" class="btn btn-sm btn-outline-primary">Access Library</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <i class="bi bi-calendar-week-fill text-success mb-3" style="font-size: 2.5rem;"></i>
                        <h6 class="fw-bold mb-3">Workshop Calendar</h6>
                        <p class="small mb-3">Upcoming workshops and training sessions</p>
                        <a href="#" class="btn btn-sm btn-outline-primary">View Calendar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <i class="bi bi-chat-dots-fill text-info mb-3" style="font-size: 2.5rem;"></i>
                        <h6 class="fw-bold mb-3">Peer Support Network</h6>
                        <p class="small mb-3">Connect with student support volunteers</p>
                        <a href="#" class="btn btn-sm btn-outline-primary">Join Network</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Emergency Resources Section -->
<section class="py-5">
    <div class="container">
        <div class="card border-0 shadow-lg" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
            <div class="card-body p-5 text-white">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <h3 class="fw-bold mb-3"><i class="bi bi-exclamation-triangle-fill me-2"></i>Crisis & Emergency Support</h3>
                        <p class="mb-3">If you or someone you know is experiencing a mental health crisis or emergency, immediate help is available 24/7.</p>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-telephone-fill me-3" style="font-size: 1.5rem;"></i>
                                    <div>
                                        <strong>Campus Emergency Line</strong><br>
                                        <span class="h5 mb-0">+233 XX XXX XXXX</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-headset me-3" style="font-size: 1.5rem;"></i>
                                    <div>
                                        <strong>National Crisis Hotline</strong><br>
                                        <span class="h5 mb-0">999</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center mt-4 mt-lg-0">
                        <div class="bg-white text-dark rounded p-4">
                            <i class="bi bi-shield-fill-check text-danger mb-2" style="font-size: 3rem;"></i>
                            <h5 class="fw-bold mb-2">You're Not Alone</h5>
                            <p class="small mb-0">Help is available. Reach out anytime, day or night.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="py-5 bg-light">
    <div class="container text-center">
        <h2 class="fw-bold text-primary mb-3">Ready to Get Support?</h2>
        <p class="lead text-muted mb-4">Don't wait to reach out. Our team is here to help you succeed.</p>
        <div class="d-flex flex-wrap justify-content-center gap-3">
            <a href="/contact/contact.php" class="btn btn-success btn-lg px-5 shadow">
                <i class="bi bi-envelope-fill me-2"></i>Contact Support Team
            </a>
            <a href="#" class="btn btn-outline-primary btn-lg px-5">
                <i class="bi bi-calendar-check me-2"></i>Schedule Appointment
            </a>
            <a href="#" class="btn btn-outline-secondary btn-lg px-5">
                <i class="bi bi-chat-dots me-2"></i>Live Chat
            </a>
        </div>
        
        <div class="mt-5">
            <p class="text-muted mb-2">Follow us for updates, tips, and resources:</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="#" class="text-primary" style="font-size: 1.5rem;"><i class="bi bi-facebook"></i></a>
                <a href="#" class="text-info" style="font-size: 1.5rem;"><i class="bi bi-twitter"></i></a>
                <a href="#" class="text-danger" style="font-size: 1.5rem;"><i class="bi bi-instagram"></i></a>
                <a href="#" class="text-primary" style="font-size: 1.5rem;"><i class="bi bi-linkedin"></i></a>
            </div>
        </div>
    </div>
</section>

<?php 
include(__DIR__ . '/../../../Modals/modals/modals.php');
include(__DIR__ . '/../../../includes/footer/footer.php'); 
?>
