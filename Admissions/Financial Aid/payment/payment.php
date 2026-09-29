<?php 
session_start();
include(__DIR__ . '/../../../includes/lang/lang.php');
include(__DIR__ . '/../../../includes/header/header.php');
include(__DIR__ . '/../../../includes/navbar/navbar.php'); 
include(__DIR__ . '/../../../includes/sidebar/sidebar.php');
?>


<!-- PAYMENT PLANS PAGE -->

<!-- Hero Section -->
<section class="py-5 text-white" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);">
    <div class="container text-center">
        <h1 class="display-4 fw-bold mb-3">Payment Plans & Financial Options</h1>
        <p class="lead mb-4">Flexible payment solutions designed to support your educational goals</p>
        <p class="mb-0">We believe financial constraints shouldn't limit your academic aspirations</p>
    </div>
</section>

<!-- Overview Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6">
                <h2 class="fw-bold text-primary mb-4">Making Education Accessible</h2>
                <p class="lead">We understand that managing educational expenses can be challenging. That's why we've developed a range of flexible payment plans to accommodate different financial situations.</p>
                <p>Our payment options are designed to reduce financial stress while ensuring you can focus on what matters most—your education and personal growth.</p>
            </div>
            <div class="col-lg-6">
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-4 text-center">
                        <i class="bi bi-wallet2 text-success mb-3" style="font-size: 3rem;"></i>
                        <h4 class="fw-bold mb-3">Flexible Solutions</h4>
                        <p class="mb-0">Choose the payment plan that works best for your financial situation</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Payment Plans Section -->
<section class="py-5">
    <div class="container">
        <h2 class="fw-bold text-primary text-center mb-5">Available Payment Plans</h2>
        
        <div class="row g-4">
            <!-- Plan 1: Full Payment -->
            <div class="col-lg-4">
                <div class="card h-100 border-0 shadow-lg">
                    <div class="card-header text-white text-center py-4" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);">
                        <i class="bi bi-lightning-charge-fill mb-2" style="font-size: 2.5rem;"></i>
                        <h4 class="fw-bold mb-0">Full Payment Plan</h4>
                    </div>
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <span class="badge bg-success fs-5 py-2 px-3">Save 5%</span>
                        </div>
                        <h5 class="fw-bold text-primary mb-3">Best Value Option</h5>
                        <p class="mb-4">Pay your entire semester fees upfront and receive an automatic 5% discount on total tuition costs.</p>
                        
                        <h6 class="fw-bold mb-3">Benefits:</h6>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> 5% discount on tuition</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> No interest charges</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Priority registration</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> No monthly payment worries</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Immediate access to all services</li>
                        </ul>
                        
                        <div class="alert alert-info mt-4">
                            <small><i class="bi bi-info-circle me-2"></i>Payment due before semester begins</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Plan 2: Two-Part Payment -->
            <div class="col-lg-4">
                <div class="card h-100 border-0 shadow-lg">
                    <div class="card-header text-white text-center py-4" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                        <i class="bi bi-calendar-check-fill mb-2" style="font-size: 2.5rem;"></i>
                        <h4 class="fw-bold mb-0">Split Payment Plan</h4>
                    </div>
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <span class="badge bg-primary fs-5 py-2 px-3">Popular Choice</span>
                        </div>
                        <h5 class="fw-bold text-primary mb-3">Balanced Approach</h5>
                        <p class="mb-4">Divide your payment into two manageable installments without additional fees or interest charges.</p>
                        
                        <h6 class="fw-bold mb-3">Payment Structure:</h6>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i> 50% due at registration</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i> 50% due mid-semester</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i> No interest charges</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i> No processing fees</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i> Flexible due dates</li>
                        </ul>
                        
                        <div class="alert alert-warning mt-4">
                            <small><i class="bi bi-exclamation-triangle me-2"></i>Both payments must be completed to maintain enrollment</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Plan 3: Monthly Installments -->
            <div class="col-lg-4">
                <div class="card h-100 border-0 shadow-lg">
                    <div class="card-header text-white text-center py-4" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                        <i class="bi bi-calendar3 mb-2" style="font-size: 2.5rem;"></i>
                        <h4 class="fw-bold mb-0">Monthly Installment Plan</h4>
                    </div>
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <span class="badge bg-danger fs-5 py-2 px-3">Most Flexible</span>
                        </div>
                        <h5 class="fw-bold text-primary mb-3">Maximum Flexibility</h5>
                        <p class="mb-4">Spread your payments across the semester with affordable monthly installments and minimal interest.</p>
                        
                        <h6 class="fw-bold mb-3">Features:</h6>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-danger me-2"></i> 4-5 monthly payments</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-danger me-2"></i> Small interest fee (3-5%)</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-danger me-2"></i> Automatic payment options</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-danger me-2"></i> Payment reminders sent</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-danger me-2"></i> Budget-friendly amounts</li>
                        </ul>
                        
                        <div class="alert alert-secondary mt-4">
                            <small><i class="bi bi-clock me-2"></i>Application required - approval within 48 hours</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Payment Methods Section -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="fw-bold text-primary text-center mb-5">Accepted Payment Methods</h2>
        
        <div class="row g-4">
            <div class="col-md-3 col-6 text-center">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <i class="bi bi-credit-card-fill text-primary mb-3" style="font-size: 2.5rem;"></i>
                        <h6 class="fw-bold">Credit/Debit Cards</h6>
                        <p class="small text-muted mb-0">Visa, Mastercard, Amex</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 text-center">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <i class="bi bi-bank text-success mb-3" style="font-size: 2.5rem;"></i>
                        <h6 class="fw-bold">Bank Transfer</h6>
                        <p class="small text-muted mb-0">Direct bank payments</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 text-center">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <i class="bi bi-phone-fill text-info mb-3" style="font-size: 2.5rem;"></i>
                        <h6 class="fw-bold">Mobile Money</h6>
                        <p class="small text-muted mb-0">MTN, Vodafone, AirtelTigo</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 text-center">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <i class="bi bi-cash-stack text-warning mb-3" style="font-size: 2.5rem;"></i>
                        <h6 class="fw-bold">Cash Payment</h6>
                        <p class="small text-muted mb-0">At campus office</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Financial Aid & Scholarships Section -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h2 class="fw-bold text-primary mb-4">Financial Aid & Scholarships</h2>
                <p class="mb-3">Beyond our flexible payment plans, we offer various financial assistance programs to help you achieve your educational goals.</p>
                
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <h5 class="fw-bold mb-2"><i class="bi bi-award-fill text-warning me-2"></i>Merit-Based Scholarships</h5>
                        <p class="mb-0">Scholarships awarded based on academic excellence and achievements. Covers 25-100% of tuition fees.</p>
                    </div>
                </div>
                
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <h5 class="fw-bold mb-2"><i class="bi bi-heart-fill text-danger me-2"></i>Need-Based Financial Aid</h5>
                        <p class="mb-0">Financial assistance for students demonstrating financial need. Application and documentation required.</p>
                    </div>
                </div>
                
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <h5 class="fw-bold mb-2"><i class="bi bi-briefcase-fill text-info me-2"></i>Work-Study Programs</h5>
                        <p class="mb-0">Part-time employment opportunities on campus to help offset educational costs while gaining experience.</p>
                    </div>
                </div>
                
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="fw-bold mb-2"><i class="bi bi-people-fill text-success me-2"></i>Emergency Fund</h5>
                        <p class="mb-0">Short-term financial assistance for students facing unexpected financial hardships.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="card border-0 shadow-lg" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <div class="card-body p-5 text-white">
                        <h3 class="fw-bold mb-4">How to Apply for Financial Aid</h3>
                        <div class="mb-4">
                            <div class="d-flex align-items-start mb-3">
                                <div class="bg-white text-primary rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; min-width: 40px;">
                                    <span class="fw-bold">1</span>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">Complete Application</h6>
                                    <p class="mb-0 small">Fill out the financial aid application form online or at the office</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-start mb-3">
                                <div class="bg-white text-primary rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; min-width: 40px;">
                                    <span class="fw-bold">2</span>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">Submit Documents</h6>
                                    <p class="mb-0 small">Provide required financial documents and academic records</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-start mb-3">
                                <div class="bg-white text-primary rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; min-width: 40px;">
                                    <span class="fw-bold">3</span>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">Review Process</h6>
                                    <p class="mb-0 small">Our team reviews your application within 10-15 business days</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-start">
                                <div class="bg-white text-primary rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; min-width: 40px;">
                                    <span class="fw-bold">4</span>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">Receive Decision</h6>
                                    <p class="mb-0 small">Get notified of your aid package and accept the offer</p>
                                </div>
                            </div>
                        </div>
                        <a href="support.php" class="btn btn-light btn-lg w-100 fw-bold">Apply for Financial Aid</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Important Information Section -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="fw-bold text-primary text-center mb-5">Important Information</h2>
        
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <h5 class="fw-bold text-primary mb-3"><i class="bi bi-calendar-event me-2"></i>Payment Deadlines</h5>
                        <ul class="mb-0">
                            <li class="mb-2">Full payment: 1 week before semester begins</li>
                            <li class="mb-2">First installment (50%): At registration</li>
                            <li class="mb-2">Second installment (50%): Week 8 of semester</li>
                            <li class="mb-2">Monthly plans: 1st of each month</li>
                            <li>Late payment fee: GHS 100 per week</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <h5 class="fw-bold text-primary mb-3"><i class="bi bi-shield-check me-2"></i>Refund Policy</h5>
                        <ul class="mb-0">
                            <li class="mb-2">100% refund: Before semester starts</li>
                            <li class="mb-2">75% refund: Within first 2 weeks</li>
                            <li class="mb-2">50% refund: Weeks 3-4</li>
                            <li class="mb-2">25% refund: Weeks 5-6</li>
                            <li>No refund: After week 6</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <h5 class="fw-bold text-primary mb-3"><i class="bi bi-file-text me-2"></i>Required Documents</h5>
                        <p class="mb-2">For payment plan applications, please prepare:</p>
                        <ul class="mb-0">
                            <li class="mb-2">Valid identification (National ID or Passport)</li>
                            <li class="mb-2">Proof of enrollment or admission letter</li>
                            <li class="mb-2">Financial aid application (if applicable)</li>
                            <li class="mb-2">Bank statement or income proof (for installments)</li>
                            <li>Guarantor information (for monthly plans)</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <h5 class="fw-bold text-primary mb-3"><i class="bi bi-question-circle me-2"></i>Enrollment Status</h5>
                        <p class="mb-2">Payment plan impacts on your enrollment:</p>
                        <ul class="mb-0">
                            <li class="mb-2">Full access granted after first payment</li>
                            <li class="mb-2">Course materials available immediately</li>
                            <li class="mb-2">Library and facilities access maintained</li>
                            <li class="mb-2">Transcript held until full payment</li>
                            <li>Registration blocked if payment overdue by 2+ weeks</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-5">
    <div class="container">
        <h2 class="fw-bold text-primary text-center mb-5">Frequently Asked Questions</h2>
        
        <div class="accordion" id="paymentFAQ">
            <div class="accordion-item border-0 shadow-sm mb-3">
                <h2 class="accordion-header">
                    <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                        Can I change my payment plan after registration?
                    </button>
                </h2>
                <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#paymentFAQ">
                    <div class="accordion-body">
                        Yes, you can request a payment plan change within the first two weeks of the semester. Contact the Financial Aid Office to discuss your options and complete the necessary paperwork.
                    </div>
                </div>
            </div>
            
            <div class="accordion-item border-0 shadow-sm mb-3">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                        What happens if I miss a payment deadline?
                    </button>
                </h2>
                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#paymentFAQ">
                    <div class="accordion-body">
                        A late payment fee of GHS 100 per week will be applied. If payment is overdue by more than two weeks, your registration may be blocked, and you may lose access to certain services until the payment is settled.
                    </div>
                </div>
            </div>
            
            <div class="accordion-item border-0 shadow-sm mb-3">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                        Are there any hidden fees with payment plans?
                    </button>
                </h2>
                <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#paymentFAQ">
                    <div class="accordion-body">
                        No hidden fees. The full payment and split payment plans have no additional charges. The monthly installment plan includes a transparent 3-5% interest fee, which is clearly stated upfront during application.
                    </div>
                </div>
            </div>
            
            <div class="accordion-item border-0 shadow-sm mb-3">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                        Can international students apply for payment plans?
                    </button>
                </h2>
                <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#paymentFAQ">
                    <div class="accordion-body">
                        Yes, all payment plans are available to international students. However, additional documentation may be required for verification purposes. Please contact the International Student Office for specific requirements.
                    </div>
                </div>
            </div>
            
            <div class="accordion-item border-0 shadow-sm mb-3">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                        How do I apply for scholarships or financial aid?
                    </button>
                </h2>
                <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#paymentFAQ">
                    <div class="accordion-body">
                        Visit the Financial Aid Office or click the "Apply for Financial Aid" button on this page. You'll need to complete an application form and submit supporting documents. Applications are typically reviewed within 10-15 business days.
                    </div>
                </div>
            </div>
            
            <div class="accordion-item border-0 shadow-sm">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">
                        Can parents or sponsors make payments on my behalf?
                    </button>
                </h2>
                <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#paymentFAQ">
                    <div class="accordion-body">
                        Absolutely! Parents, guardians, or sponsors can make payments directly. They'll need your student ID number and can use any of our accepted payment methods. Payment receipts will be linked to your student account.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact CTA Section -->
<section class="py-5 text-white" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
    <div class="container text-center">
        <h2 class="fw-bold mb-3">Need Help Choosing a Payment Plan?</h2>
        <p class="lead mb-4">Our Financial Aid team is here to help you find the best payment solution for your situation</p>
        <div class="row justify-content-center">
            <div class="col-md-3 mb-3 mb-md-0">
                <div class="p-3">
                    <i class="bi bi-telephone-fill mb-2" style="font-size: 2rem;"></i>
                    <h6 class="fw-bold">Call Us</h6>
                    <p class="mb-0">+233 XX XXX XXXX</p>
                </div>
            </div>
            <div class="col-md-3 mb-3 mb-md-0">
                <div class="p-3">
                    <i class="bi bi-envelope-fill mb-2" style="font-size: 2rem;"></i>
                    <h6 class="fw-bold">Email Us</h6>
                    <p class="mb-0">finance@school.edu</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-3">
                    <i class="bi bi-geo-alt-fill mb-2" style="font-size: 2rem;"></i>
                    <h6 class="fw-bold">Visit Us</h6>
                    <p class="mb-0">Mon-Fri, 8AM-5PM</p>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <a href="support.php" class="btn btn-light btn-lg px-5 shadow fw-bold">Contact Financial Aid Office</a>
        </div>
    </div>
</section>

<?php
include(__DIR__ . '/../../../Modals/modals/modals.php'); 
include(__DIR__ . '/../../../includes/footer/footer.php'); 
?>
