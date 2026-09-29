<?php
session_start();
include(__DIR__ . '/..\..\..\includes\header\header.php');
include(__DIR__ . '/..\..\..\includes\navbar\navbar.php');
include(__DIR__ . '/..\..\..\includes\sidebar\sidebar.php');

$faqCategories = [
    [
        'id' => 'general',
        'title' => 'General Questions',
        'icon' => 'bi-question-circle',
        'faqs' => [
            [
                'question' => 'What is this platform about?',
                'answer' => 'Our platform is a comprehensive learning management system designed to help students access courses, tutorials, and educational resources. We offer a wide range of subjects and skill levels to help you achieve your learning goals.'
            ],
            [
                'question' => 'How do I create an account?',
                'answer' => 'Click on the "Sign Up" button in the top right corner of the homepage. Fill in your details including name, email, and password. Verify your email address through the link sent to your inbox, and you\'re ready to start learning!'
            ],
            [
                'question' => 'Is there a mobile app available?',
                'answer' => 'Yes! Our mobile app is available for both iOS and Android devices. You can download it from the App Store or Google Play Store. The app offers all the features of the web platform with offline access to downloaded courses.'
            ],
            [
                'question' => 'Can I access courses on multiple devices?',
                'answer' => 'Absolutely! Your account can be accessed from any device. Your progress is automatically synced across all devices, so you can start learning on your computer and continue on your phone or tablet.'
            ]
        ]
    ],
    [
        'id' => 'courses',
        'title' => 'Courses & Learning',
        'icon' => 'bi-book',
        'faqs' => [
            [
                'question' => 'How do I enroll in a course?',
                'answer' => 'Browse our course catalog, select the course you\'re interested in, and click the "Enroll" button. Free courses will be immediately added to your dashboard, while paid courses require payment completion before access is granted.'
            ],
            [
                'question' => 'Can I preview a course before enrolling?',
                'answer' => 'Yes! Most courses offer preview lessons that you can watch without enrolling. Look for the "Preview" badge on lesson titles in the course curriculum section.'
            ],
            [
                'question' => 'How long do I have access to a course?',
                'answer' => 'Once you enroll in a course, you have lifetime access to all course materials, including future updates. You can learn at your own pace without any time restrictions.'
            ],
            [
                'question' => 'Are there deadlines for completing courses?',
                'answer' => 'No, there are no deadlines! Our courses are self-paced, allowing you to learn according to your own schedule. However, some instructor-led cohorts may have specific timelines.'
            ],
            [
                'question' => 'Can I download course materials?',
                'answer' => 'Yes, many courses offer downloadable resources such as PDFs, code files, and supplementary materials. Videos can also be downloaded for offline viewing in the mobile app.'
            ]
        ]
    ],
    [
        'id' => 'payment',
        'title' => 'Payment & Billing',
        'icon' => 'bi-credit-card',
        'faqs' => [
            [
                'question' => 'What payment methods do you accept?',
                'answer' => 'We accept all major credit cards (Visa, MasterCard, American Express), PayPal, and bank transfers. Some regions may have additional local payment options available at checkout.'
            ],
            [
                'question' => 'Is there a refund policy?',
                'answer' => 'Yes! We offer a 30-day money-back guarantee for all paid courses. If you\'re not satisfied with a course, contact our support team within 30 days of purchase for a full refund, no questions asked.'
            ],
            [
                'question' => 'Do you offer discounts or promotions?',
                'answer' => 'Yes, we regularly run promotions and offer discounts. Subscribe to our newsletter to receive notifications about special offers. We also offer student discounts with valid student ID verification.'
            ],
            [
                'question' => 'Can I purchase courses as a gift?',
                'answer' => 'Absolutely! You can purchase gift cards or directly gift specific courses to others. Simply select the "Buy as Gift" option during checkout and enter the recipient\'s email address.'
            ],
            [
                'question' => 'What happens if my payment fails?',
                'answer' => 'If your payment fails, you\'ll receive an error message explaining the issue. Common reasons include insufficient funds, expired cards, or bank restrictions. Try using a different payment method or contact your bank.'
            ]
        ]
    ],
    [
        'id' => 'technical',
        'title' => 'Technical Support',
        'icon' => 'bi-tools',
        'faqs' => [
            [
                'question' => 'Videos won\'t play or are buffering constantly',
                'answer' => 'Try these solutions: 1) Check your internet connection speed (minimum 3 Mbps recommended), 2) Clear your browser cache and cookies, 3) Try a different browser, 4) Lower the video quality in the player settings, 5) Disable browser extensions that might interfere with video playback.'
            ],
            [
                'question' => 'I forgot my password. How do I reset it?',
                'answer' => 'Click on "Forgot Password" on the login page. Enter your registered email address, and we\'ll send you a password reset link. Click the link in the email and create a new password. If you don\'t receive the email, check your spam folder.'
            ],
            [
                'question' => 'The website is loading slowly',
                'answer' => 'Slow loading can be caused by various factors. Try clearing your browser cache, disabling unnecessary browser extensions, checking your internet connection, or trying a different browser. If the problem persists, contact our technical support team.'
            ],
            [
                'question' => 'I can\'t download course materials',
                'answer' => 'Ensure you\'re logged in and enrolled in the course. Check if your browser is blocking downloads. Try right-clicking the download link and selecting "Save Link As". If issues continue, try a different browser or contact support.'
            ],
            [
                'question' => 'Which browsers are supported?',
                'answer' => 'We support the latest versions of Chrome, Firefox, Safari, and Edge. For the best experience, we recommend using the latest version of Google Chrome. Internet Explorer is not supported.'
            ]
        ]
    ],
    [
        'id' => 'certificates',
        'title' => 'Certificates & Progress',
        'icon' => 'bi-award',
        'faqs' => [
            [
                'question' => 'How do I earn a certificate?',
                'answer' => 'Complete all required lessons, quizzes, and assignments in a course. Once you meet the completion requirements (usually 100% progress and passing quiz scores), your certificate will be automatically generated.'
            ],
            [
                'question' => 'Are certificates accredited?',
                'answer' => 'Our certificates demonstrate completion of course content but are not accredited academic credentials. However, they are recognized by many employers and can be added to your resume, LinkedIn profile, or professional portfolio.'
            ],
            [
                'question' => 'How do I download my certificate?',
                'answer' => 'Go to your profile, click on "Certificates", and you\'ll see all your earned certificates. Click the "Download" button to get a PDF version. You can also share certificates directly to LinkedIn or other social platforms.'
            ],
            [
                'question' => 'My progress isn\'t being tracked correctly',
                'answer' => 'Make sure you\'re watching lessons completely and clicking "Mark as Complete" when finished. Clear your browser cache if progress seems stuck. If the issue persists, log out and log back in. Contact support if problems continue.'
            ],
            [
                'question' => 'Can I retake quizzes to improve my score?',
                'answer' => 'Yes! Most quizzes can be retaken multiple times. Your highest score will be recorded. However, some final exams may have attempt limits specified in the course details.'
            ]
        ]
    ],
    [
        'id' => 'account',
        'title' => 'Account Management',
        'icon' => 'bi-person-circle',
        'faqs' => [
            [
                'question' => 'How do I update my profile information?',
                'answer' => 'Go to Settings > Profile from your dashboard. Here you can update your name, email, profile picture, bio, and other personal information. Remember to click "Save Changes" after making updates.'
            ],
            [
                'question' => 'Can I change my email address?',
                'answer' => 'Yes, go to Settings > Account and enter your new email address. You\'ll need to verify the new email address before the change takes effect. Make sure you can access the new email inbox for verification.'
            ],
            [
                'question' => 'How do I cancel my subscription?',
                'answer' => 'Go to Settings > Billing > Subscription. Click "Cancel Subscription" and follow the prompts. You\'ll retain access until the end of your current billing period. You can reactivate anytime before the period ends.'
            ],
            [
                'question' => 'How do I delete my account?',
                'answer' => 'Go to Settings > Account > Delete Account. This action is permanent and will remove all your data, including course progress and certificates. Make sure to download any certificates before deleting your account.'
            ],
            [
                'question' => 'Can I have multiple accounts?',
                'answer' => 'Each user should maintain only one account. Multiple accounts may be flagged and suspended. If you need separate accounts for personal and business use, contact our support team for enterprise solutions.'
            ]
        ]
    ]
];
?>

<div class="container-fluid mt-5 mb-5">
    <div class="row">
        <div class="col-12 text-center mb-5">
            <h1 class="display-4 mb-3"><i class="bi bi-info-circle me-3"></i>Frequently Asked Questions</h1>
            <p class="lead text-muted">Find quick answers to common questions</p>
        </div>
    </div>

    <!-- Search Box -->
    <div class="row mb-5">
        <div class="col-lg-8 offset-lg-2">
            <div class="card shadow-lg border-0">
                <div class="card-body p-4">
                    <div class="input-group input-group-lg">
                        <span class="input-group-text bg-white border-end-0">
                            <i class="bi bi-search"></i>
                        </span>
                        <input type="text" class="form-control border-start-0" id="faqSearch" 
                               placeholder="Search FAQs...">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Category Pills -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex flex-wrap justify-content-center gap-2">
                <button class="btn btn-outline-primary active" data-category="all">
                    <i class="bi bi-grid me-2"></i>All
                </button>
                <?php foreach($faqCategories as $category): ?>
                <button class="btn btn-outline-primary" data-category="<?php echo $category['id']; ?>">
                    <i class="bi <?php echo $category['icon']; ?> me-2"></i><?php echo $category['title']; ?>
                </button>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<!-- FAQ Content -->
<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <?php foreach($faqCategories as $category): ?>
        <div class="faq-category mb-5" data-category="<?php echo $category['id']; ?>">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">
                        <i class="bi <?php echo $category['icon']; ?> me-2"></i>
                        <?php echo $category['title']; ?>
                    </h4>
                </div>
                <div class="card-body p-0">
                    <div class="accordion" id="accordion<?php echo $category['id']; ?>">
                        <?php foreach($category['faqs'] as $index => $faq): ?>
                        <div class="accordion-item faq-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" 
                                        data-bs-toggle="collapse" 
                                        data-bs-target="#collapse<?php echo $category['id'] . $index; ?>">
                                    <strong><?php echo $faq['question']; ?></strong>
                                </button>
                            </h2>
                            <div id="collapse<?php echo $category['id'] . $index; ?>" 
                                 class="accordion-collapse collapse" 
                                 data-bs-parent="#accordion<?php echo $category['id']; ?>">
                                <div class="accordion-body">
                                    <p class="mb-0"><?php echo $faq['answer']; ?></p>
                                    <hr class="my-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">Was this helpful?</small>
                                        <div>
                                            <button class="btn btn-sm btn-outline-success me-2" onclick="rateFAQ('yes')">
                                                <i class="bi bi-hand-thumbs-up"></i> Yes
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger" onclick="rateFAQ('no')">
                                                <i class="bi bi-hand-thumbs-down"></i> No
                                            </button>
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
        <?php endforeach; ?>

        <!-- No Results Message -->
        <div id="noResults" class="alert alert-info text-center" style="display: none;">
            <i class="bi bi-info-circle fs-3 d-block mb-2"></i>
            <h5>No matching FAQs found</h5>
            <p>Try different keywords or <a href="/user-dashboard/More/Support/help-center.php">browse our help center</a></p>
        </div>

        <!-- Still Need Help -->
        <div class="card shadow border-success">
            <div class="card-body text-center p-5">
                <i class="bi bi-question-circle fs-1 text-success mb-3"></i>
                <h4>Still have questions?</h4>
                <p class="text-muted mb-4">Can't find the answer you're looking for? Our support team is here to help!</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                    <a href="/user-dashboard/More/Support/report-issue.php" class="btn btn-success btn-lg">
                        <i class="bi bi-chat-dots me-2"></i>Contact Support
                    </a>
                    <a href="/user-dashboard/More/Support/help-center.php" class="btn btn-outline-success btn-lg">
                        <i class="bi bi-book me-2"></i>Visit Help Center
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<style>
.accordion-button:not(.collapsed) {
    background-color: #f8f9fa;
    color: var(--bs-primary);
}

.faq-item {
    border: none;
    border-bottom: 1px solid #dee2e6;
}

.faq-item:last-child {
    border-bottom: none;
}
</style>
<script>
// Category filtering
document.querySelectorAll('[data-category]').forEach(button => {
    if (button.tagName === 'BUTTON' && button.getAttribute('data-category') !== 'all') {
        button.addEventListener('click', function() {
            const category = this.getAttribute('data-category');
            
            // Update active button
            document.querySelectorAll('[data-category]').forEach(btn => {
                if (btn.tagName === 'BUTTON') btn.classList.remove('active');
            });
            this.classList.add('active');
            
            // Show/hide categories
            document.querySelectorAll('.faq-category').forEach(cat => {
                if (cat.getAttribute('data-category') === category) {
                    cat.style.display = 'block';
                } else {
                    cat.style.display = 'none';
                }
            });
        });
    }
});

// Show all categories
document.querySelector('[data-category="all"]').addEventListener('click', function() {
    document.querySelectorAll('[data-category]').forEach(btn => {
        if (btn.tagName === 'BUTTON') btn.classList.remove('active');
    });
    this.classList.add('active');
    
    document.querySelectorAll('.faq-category').forEach(cat => {
        cat.style.display = 'block';
    });
});

// Search functionality
document.getElementById('faqSearch').addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase();
    const faqItems = document.querySelectorAll('.faq-item');
    let visibleCount = 0;
    
    faqItems.forEach(item => {
        const question = item.querySelector('.accordion-button').textContent.toLowerCase();
        const answer = item.querySelector('.accordion-body p').textContent.toLowerCase();
        
        if (question.includes(searchTerm) || answer.includes(searchTerm)) {
            item.style.display = 'block';
            visibleCount++;
        } else {
            item.style.display = 'none';
        }
    });
    
    // Show all categories when searching
    if (searchTerm) {
        document.querySelectorAll('.faq-category').forEach(cat => {
            const visibleItems = cat.querySelectorAll('.faq-item[style*="display: block"]').length;
            cat.style.display = visibleItems > 0 ? 'block' : 'none';
        });
    }
    
    document.getElementById('noResults').style.display = visibleCount === 0 ? 'block' : 'none';
});

function rateFAQ(rating) {
    alert(`Thank you for your feedback! You rated this as ${rating === 'yes' ? 'helpful' : 'not helpful'}.`);
}
</script>
<?php
include(__DIR__ . '/..\..\..\includes\footer\footer.php');
?>