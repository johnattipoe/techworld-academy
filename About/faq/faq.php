<?php 
session_start();
include(__DIR__ . '/../../includes/lang/lang.php');
include(__DIR__ . '/../../includes/header/header.php');
include(__DIR__ . '/../../includes/navbar/navbar.php'); 
include(__DIR__ . '/../../includes/sidebar/sidebar.php');
?>

<!-- FAQ.PHP -->

<!-- FAQ Hero Section -->
<section class="bg-primary text-white py-5" data-aos="fade-down">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-8 mx-auto text-center">
          <h1 class="display-4 fw-bold mb-3">Frequently Asked Questions</h1>
          <p class="lead mb-4">Find answers to common questions about TecWorld Academy</p>
          <div class="input-group input-group-lg mb-3">
            <input type="text" class="form-control" placeholder="Search for answers..." id="faqSearch">
            <button class="btn btn-light" type="button">
              <i class="bi bi-search"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- FAQ Categories Section -->
<section class="py-5 bg-light" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Browse by Category</h2>
        <p class="lead">Quick navigation to find what you're looking for</p>
      </div>
      <div class="row g-3">
        <div class="col-lg-3 col-md-6">
          <a href="#admissions" class="text-decoration-none">
            <div class="card border-0 shadow-sm h-100 text-center hover-card">
              <div class="card-body p-4">
                <i class="bi bi-person-check text-primary fs-1 mb-3"></i>
                <h5 class="card-title fw-bold">Admissions</h5>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6">
          <a href="#programs" class="text-decoration-none">
            <div class="card border-0 shadow-sm h-100 text-center hover-card">
              <div class="card-body p-4">
                <i class="bi bi-book text-primary fs-1 mb-3"></i>
                <h5 class="card-title fw-bold">Programs</h5>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6">
          <a href="#support" class="text-decoration-none">
            <div class="card border-0 shadow-sm h-100 text-center hover-card">
              <div class="card-body p-4">
                <i class="bi bi-headset text-primary fs-1 mb-3"></i>
                <h5 class="card-title fw-bold">Admissions</h5>
                <p class="card-text small text-muted">Enrollment, requirements, application process</p>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6">
          <a href="#courses" class="text-decoration-none">
            <div class="card border-0 shadow-sm h-100 text-center hover-card">
              <div class="card-body p-4">
                <i class="bi bi-book text-success fs-1 mb-3"></i>
                <h5 class="card-title fw-bold">Courses</h5>
                <p class="card-text small text-muted">Programs, curriculum, duration, certificates</p>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6">
          <a href="#payment" class="text-decoration-none">
            <div class="card border-0 shadow-sm h-100 text-center hover-card">
              <div class="card-body p-4">
                <i class="bi bi-cash-stack text-warning fs-1 mb-3"></i>
                <h5 class="card-title fw-bold">Payment & Fees</h5>
                <p class="card-text small text-muted">Tuition, payment plans, scholarships</p>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6">
          <a href="#learning" class="text-decoration-none">
            <div class="card border-0 shadow-sm h-100 text-center hover-card">
              <div class="card-body p-4">
                <i class="bi bi-laptop text-info fs-1 mb-3"></i>
                <h5 class="card-title fw-bold">Learning</h5>
                <p class="card-text small text-muted">Schedule, format, online vs in-person</p>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6">
          <a href="#career" class="text-decoration-none">
            <div class="card border-0 shadow-sm h-100 text-center hover-card">
              <div class="card-body p-4">
                <i class="bi bi-briefcase text-danger fs-1 mb-3"></i>
                <h5 class="card-title fw-bold">Career Services</h5>
                <p class="card-text small text-muted">Job placement, internships, support</p>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6">
          <a href="#technical" class="text-decoration-none">
            <div class="card border-0 shadow-sm h-100 text-center hover-card">
              <div class="card-body p-4">
                <i class="bi bi-gear text-secondary fs-1 mb-3"></i>
                <h5 class="card-title fw-bold">Technical</h5>
                <p class="card-text small text-muted">Platform access, requirements, support</p>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6">
          <a href="#campus" class="text-decoration-none">
            <div class="card border-0 shadow-sm h-100 text-center hover-card">
              <div class="card-body p-4">
                <i class="bi bi-building text-primary fs-1 mb-3"></i>
                <h5 class="card-title fw-bold">Campus Life</h5>
                <p class="card-text small text-muted">Facilities, locations, student life</p>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6">
          <a href="#general" class="text-decoration-none">
            <div class="card border-0 shadow-sm h-100 text-center hover-card">
              <div class="card-body p-4">
                <i class="bi bi-question-circle text-success fs-1 mb-3"></i>
                <h5 class="card-title fw-bold">General</h5>
                <p class="card-text small text-muted">About us, policies, other questions</p>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
</section>

<!-- Admissions FAQs -->
<section class="py-5" id="admissions" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Admissions & Enrollment</h2>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="accordion" id="admissionsFaq">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#adm1">
                  Do I need prior experience to enroll?
                </button>
              </h2>
              <div id="adm1" class="accordion-collapse collapse show" data-bs-parent="#admissionsFaq">
                <div class="accordion-body">
                  No prior experience is required for most of our beginner-level courses. We offer programs for all skill levels from complete beginners to advanced professionals. Our admissions team will help you choose the right program based on your current skill level and career goals.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#adm2">
                  What are the admission requirements?
                </button>
              </h2>
              <div id="adm2" class="accordion-collapse collapse" data-bs-parent="#admissionsFaq">
                <div class="accordion-body">
                  Basic requirements include: minimum age of 18 years, completion of secondary education, proficiency in English, passion for technology, and commitment to learning. Some advanced courses may have specific prerequisites. You'll also need to complete an application form and may be required to take a placement test.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#adm3">
                  How long does the application process take?
                </button>
              </h2>
              <div id="adm3" class="accordion-collapse collapse" data-bs-parent="#admissionsFaq">
                <div class="accordion-body">
                  The application process typically takes 3-5 business days. Once you submit your application, our admissions team will review it and contact you within 48 hours. After acceptance, you can begin classes in the next available intake, usually within 2-4 weeks.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#adm4">
                  When do classes start?
                </button>
              </h2>
              <div id="adm4" class="accordion-collapse collapse" data-bs-parent="#admissionsFaq">
                <div class="accordion-body">
                  We have rolling admissions with new cohorts starting every month. Popular programs may have specific start dates. Check our schedule page or contact admissions for the next available start date for your chosen program.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#adm5">
                  Can I transfer credits from another institution?
                </button>
              </h2>
              <div id="adm5" class="accordion-collapse collapse" data-bs-parent="#admissionsFaq">
                <div class="accordion-body">
                  We evaluate transfer credits on a case-by-case basis. If you have completed similar coursework at an accredited institution or hold relevant industry certifications, you may be eligible for credit transfer. Contact our admissions office with your transcripts for evaluation.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#adm6">
                  Is there an age limit for enrollment?
                </button>
              </h2>
              <div id="adm6" class="accordion-collapse collapse" data-bs-parent="#admissionsFaq">
                <div class="accordion-body">
                  The minimum age is 18 years. There is no maximum age limit. We welcome students of all ages who are passionate about learning technology. We have successfully trained students ranging from 18 to 60+ years old.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Courses FAQs -->
<section class="py-5 bg-light" id="courses" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Courses & Programs</h2>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="accordion" id="coursesFaq">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#crs1">
                  What courses do you offer?
                </button>
              </h2>
              <div id="crs1" class="accordion-collapse collapse show" data-bs-parent="#coursesFaq">
                <div class="accordion-body">
                  We offer 100+ courses across 8 categories: Full Stack Web Development, Data Science & Analytics, Cybersecurity, AI & Machine Learning, Mobile App Development, Cloud Computing & DevOps, UX/UI Design, and Digital Marketing. Each program is designed to be comprehensive and industry-relevant.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#crs2">
                  How long are the programs?
                </button>
              </h2>
              <div id="crs2" class="accordion-collapse collapse" data-bs-parent="#coursesFaq">
                <div class="accordion-body">
                  Program durations vary: Short courses (4-8 weeks), Professional certificates (3-6 months), and Advanced diplomas (8-12 months). The duration depends on the complexity of the subject and whether you choose full-time or part-time learning.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#crs3">
                  Will I receive a certificate?
                </button>
              </h2>
              <div id="crs3" class="accordion-collapse collapse" data-bs-parent="#coursesFaq">
                <div class="accordion-body">
                  Yes! Upon successful completion, you'll receive a TecWorld Academy certificate. Many of our programs also prepare you for industry certifications from AWS, Microsoft, Google, CompTIA, and other leading organizations.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#crs4">
                  Are the courses accredited?
                </button>
              </h2>
              <div id="crs4" class="accordion-collapse collapse" data-bs-parent="#coursesFaq">
                <div class="accordion-body">
                  Yes, TecWorld Academy is accredited by Ghana's National Accreditation Board and holds ISO 9001:2015 certification. We're also authorized training partners for major tech companies including AWS, Microsoft, and Google.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#crs5">
                  Can I switch courses after enrollment?
                </button>
              </h2>
              <div id="crs5" class="accordion-collapse collapse" data-bs-parent="#coursesFaq">
                <div class="accordion-body">
                  Yes, you can switch to another program within the first two weeks of classes if you find the course isn't the right fit. Contact your academic advisor to discuss your options and any applicable fees.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#crs6">
                  What's included in the course fee?
                </button>
              </h2>
              <div id="crs6" class="accordion-collapse collapse" data-bs-parent="#coursesFaq">
                <div class="accordion-body">
                  Your course fee includes all learning materials, access to our learning platform, hands-on projects, career services, certification exam preparation, and lifetime access to course updates. Lab equipment and software are provided during classes.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Payment FAQs -->
<section class="py-5" id="payment" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Payment & Fees</h2>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="accordion" id="paymentFaq">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#pay1">
                  What are the payment options?
                </button>
              </h2>
              <div id="pay1" class="accordion-collapse collapse show" data-bs-parent="#paymentFaq">
                <div class="accordion-body">
                  We offer flexible payment options: Full upfront payment (15% discount), 3-month installment plan, 6-month installment plan, and scholarships. You can pay via mobile money, bank transfer, credit/debit card, or in-person at any of our campuses.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pay2">
                  Do you offer scholarships?
                </button>
              </h2>
              <div id="pay2" class="accordion-collapse collapse" data-bs-parent="#paymentFaq">
                <div class="accordion-body">
                  Yes! We offer merit-based scholarships (up to 50% off), Women in Tech scholarships (40% off), and need-based financial aid (30% off). Scholarship applications are reviewed monthly. Apply early as spots are limited.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pay3">
                  Is there a registration fee?
                </button>
              </h2>
              <div id="pay3" class="accordion-collapse collapse" data-bs-parent="#paymentFaq">
                <div class="accordion-body">
                  Yes, there's a one-time non-refundable registration fee of GH₵ 200 that covers administrative costs, student ID, and access to our learning platform. This fee is separate from tuition.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pay4">
                  What is your refund policy?
                </button>
              </h2>
              <div id="pay4" class="accordion-collapse collapse" data-bs-parent="#paymentFaq">
                <div class="accordion-body">
                  We offer a 14-day money-back guarantee. If you're not satisfied within the first two weeks of classes, we'll refund your tuition (minus registration fee). After 14 days, refunds are prorated based on time elapsed.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pay5">
                  Can my company sponsor my training?
                </button>
              </h2>
              <div id="pay5" class="accordion-collapse collapse" data-bs-parent="#paymentFaq">
                <div class="accordion-body">
                  Absolutely! We work with many companies for employee training. We can provide invoices, training agreements, and completion reports. Contact our corporate training department for special corporate rates and customized programs.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pay6">
                  Are there any hidden fees?
                </button>
              </h2>
              <div id="pay6" class="accordion-collapse collapse" data-bs-parent="#paymentFaq">
                <div class="accordion-body">
                  No hidden fees! The course fee covers everything you need for learning. The only additional costs might be optional industry certification exams (if you choose to take them) and personal items like laptops if you prefer to use your own.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Learning FAQs -->
<section class="py-5 bg-light" id="learning" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Learning Experience</h2>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="accordion" id="learningFaq">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#lrn1">
                  Can I study online or do I have to attend physically?
                </button>
              </h2>
              <div id="lrn1" class="accordion-collapse collapse show" data-bs-parent="#learningFaq">
                <div class="accordion-body">
                  We offer both options! You can choose in-person classes at our campuses, fully online learning, or our hybrid model that combines both. All formats provide the same quality education and lead to the same certification.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#lrn2">
                  What is the class schedule like?
                </button>
              </h2>
              <div id="lrn2" class="accordion-collapse collapse" data-bs-parent="#learningFaq">
                <div class="accordion-body">
                  We offer flexible schedules: Full-time (Monday-Friday, 9AM-4PM), Part-time evening (Monday-Friday, 6PM-9PM), Weekend classes (Saturday-Sunday, 9AM-4PM), and self-paced online. Choose what works best for your lifestyle.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#lrn3">
                  How many students are in a class?
                </button>
              </h2>
              <div id="lrn3" class="accordion-collapse collapse" data-bs-parent="#learningFaq">
                <div class="accordion-body">
                  We maintain small class sizes of 20-25 students to ensure personalized attention. This allows instructors to provide hands-on support and creates an interactive learning environment where everyone participates.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#lrn4">
                  Will I have access to course materials after graduation?
                </button>
              </h2>
              <div id="lrn4" class="accordion-collapse collapse" data-bs-parent="#learningFaq">
                <div class="accordion-body">
                  Yes! All graduates receive lifetime access to their course materials, including any future updates. You can revisit lessons, download resources, and stay current with evolving technologies.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#lrn5">
                  Do I need to bring my own laptop?
                </button>
              </h2>
              <div id="lrn5" class="accordion-collapse collapse" data-bs-parent="#learningFaq">
                <div class="accordion-body">
                  For in-person classes, computers are provided in our labs. However, we recommend bringing your own laptop for convenience and to practice at home. For online learners, you'll need a computer with minimum specifications (we'll provide the requirements).
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#lrn6">
                  What if I miss a class?
                </button>
              </h2>
              <div id="lrn6" class="accordion-collapse collapse" data-bs-parent="#learningFaq">
                <div class="accordion-body">
                  All classes are recorded and made available on our learning platform within 24 hours. You can watch the recording, access materials, and catch up. However, we encourage regular attendance for the best learning experience.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Career Services FAQs -->
<section class="py-5" id="career" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Career Services & Job Placement</h2>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="accordion" id="careerFaq">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#car1">
                  Do you provide job placement assistance?
                </button>
              </h2>
              <div id="car1" class="accordion-collapse collapse show" data-bs-parent="#careerFaq">
                <div class="accordion-body">
                  Yes! Our career services team provides resume building, LinkedIn optimization, interview preparation, job matching, and direct introductions to hiring companies. We have a 95% job placement rate within 6 months of graduation.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#car2">
                  Do you guarantee a job after graduation?
                </button>
              </h2>
              <div id="car2" class="accordion-collapse collapse" data-bs-parent="#careerFaq">
                <div class="accordion-body">
                  While we cannot legally guarantee employment (as hiring decisions are made by employers), we provide comprehensive support to maximize your chances. Our 95% placement rate speaks to our effectiveness. Success requires your active participation in job search activities.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#car3">
                  How long do I have access to career services?
                </button>
              </h2>
              <div id="car3" class="accordion-collapse collapse" data-bs-parent="#careerFaq">
                <div class="accordion-body">
                  Lifetime! Our career services are available to all alumni forever. Whether you graduate this year or five years ago, you can always access our job board, career counseling, and networking events.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#car4">
                  What companies hire your graduates?
                </button>
              </h2>
              <div id="car4" class="accordion-collapse collapse" data-bs-parent="#careerFaq">
                <div class="accordion-body">
                  Our graduates work at 200+ companies including MTN, Vodafone, Ecobank, GCB Bank, Jumia, Hubtel, Andela, Microsoft, Google, and many startups. We have partnerships with companies across Ghana, Africa, and internationally.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#car5">
                  Can I get an internship during my studies?
                </button>
              </h2>
              <div id="car5" class="accordion-collapse collapse" data-bs-parent="#careerFaq">
                <div class="accordion-body">
                  Yes! We facilitate internship placements with partner companies. Many students secure internships during their program, and some of these convert to full-time positions after graduation.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#car6">
                  What is the average starting salary for graduates?
                </button>
              </h2>
              <div id="car6" class="accordion-collapse collapse" data-bs-parent="#careerFaq">
                <div class="accordion-body">
                  The average starting salary is GH₵ 6,500 per month, but this varies by role, location, and experience. Career switchers typically see 200-300% salary increases. Our career team provides salary negotiation guidance.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Technical FAQs -->
<section class="py-5 bg-light" id="technical" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Technical Requirements & Support</h2>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="accordion" id="technicalFaq">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#tech1">
                  What are the technical requirements for online learning?
                </button>
              </h2>
              <div id="tech1" class="accordion-collapse collapse show" data-bs-parent="#technicalFaq">
                <div class="accordion-body">
                  Minimum requirements: Computer with Intel i3 processor (or equivalent), 4GB RAM, 128GB storage, stable internet connection (minimum 5 Mbps), webcam, and microphone. Recommended: Intel i5+, 8GB RAM, 256GB SSD for optimal experience.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tech2">
                  What software do I need?
                </button>
              </h2>
              <div id="tech2" class="accordion-collapse collapse" data-bs-parent="#technicalFaq">
                <div class="accordion-body">
                  We'll provide all necessary software and tools. Many are free and open-source. For paid software, we provide temporary licenses or campus access. You'll receive detailed setup instructions before classes start.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tech3">
                  Is technical support available?
                </button>
              </h2>
              <div id="tech3" class="accordion-collapse collapse" data-bs-parent="#technicalFaq">
                <div class="accordion-body">
                  Yes! Our IT support team is available Monday-Saturday, 8AM-8PM via email, phone, and WhatsApp. For urgent issues during class time, we provide immediate assistance to ensure smooth learning.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tech4">
                  Can I access the learning platform on mobile?
                </button>
              </h2>
              <div id="tech4" class="accordion-collapse collapse" data-bs-parent="#technicalFaq">
                <div class="accordion-body">
                  Yes, our learning platform is mobile-friendly. You can watch videos, read materials, and participate in discussions on your phone or tablet. However, we recommend using a computer for hands-on coding and practical exercises.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Still Have Questions Section -->
<section class="py-5 bg-primary text-white" data-aos="fade-up">
  <div class="container">
    <div class="row align-items-center">
      
      <!-- Text -->
      <div class="col-lg-8">
        <h2 class="fw-bold mb-3">Still Have Questions?</h2>
        <p class="lead mb-0">
          Can't find what you're looking for? Our team is ready to help with any questions 
          about <span class="fw-bold">TecWorld Academy</span>.
        </p>
      </div>

      <!-- Buttons -->
      <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
        <a href="/contact/contact.php" class="btn btn-light btn-lg px-5 mb-3 me-2 d-block d-md-inline-block">
          <i class="bi bi-envelope-fill me-2"></i> Contact Us
        </a>
        <a href="tel:+233XXXXXXXXX" class="btn btn-outline-light btn-lg px-5 d-block d-md-inline-block">
          <i class="bi bi-telephone-fill me-2"></i> Call Now
        </a>
      </div>

    </div>
  </div>
</section>

<!-- Campus Life FAQs -->
<section class="py-5" id="campus" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Campus Life & Facilities</h2>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="accordion" id="campusFaq">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#camp1">
                  Where are your campuses located?
                </button>
              </h2>
              <div id="camp1" class="accordion-collapse collapse show" data-bs-parent="#campusFaq">
                <div class="accordion-body">
                  We have three campuses: Main Campus in East Legon, Accra; Kumasi Campus in Adum, Kumasi; and Takoradi Campus in Market Circle, Takoradi. All campuses offer the same quality education and facilities.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#camp2">
                  What facilities do you have?
                </button>
              </h2>
              <div id="camp2" class="accordion-collapse collapse" data-bs-parent="#campusFaq">
                <div class="accordion-body">
                  Our facilities include modern computer labs with latest equipment, high-speed internet, air-conditioned classrooms, library with tech resources, study areas, student lounge, cafeteria, and free parking. All designed for optimal learning.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#camp3">
                  Can I visit the campus before enrolling?
                </button>
              </h2>
              <div id="camp3" class="accordion-collapse collapse" data-bs-parent="#campusFaq">
                <div class="accordion-body">
                  Absolutely! We encourage prospective students to visit. Schedule a campus tour through our website or contact admissions. We also offer virtual tours if you can't visit in person.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#camp4">
                  Are there student activities and clubs?
                </button>
              </h2>
              <div id="camp4" class="accordion-collapse collapse" data-bs-parent="#campusFaq">
                <div class="accordion-body">
                  Yes! We have coding clubs, hackathon teams, tech meetups, guest speaker sessions, networking events, and social activities. It's a great way to connect with peers and industry professionals.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#camp5">
                  Is there parking available?
                </button>
              </h2>
              <div id="camp5" class="accordion-collapse collapse" data-bs-parent="#campusFaq">
                <div class="accordion-body">
                  Yes, all our campuses offer free parking for students. There's also convenient public transportation access near all locations.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#camp6">
                  Do you provide meals or cafeteria services?
                </button>
              </h2>
              <div id="camp6" class="accordion-collapse collapse" data-bs-parent="#campusFaq">
                <div class="accordion-body">
                  Our main Accra campus has a cafeteria offering snacks and meals at affordable prices. All campuses have kitchen facilities where you can prepare your own food, and there are restaurants nearby.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- General FAQs -->
<section class="py-5 bg-light" id="general" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">General Questions</h2>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="accordion" id="generalFaq">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#gen1">
                  Is TecWorld Academy accredited?
                </button>
              </h2>
              <div id="gen1" class="accordion-collapse collapse show" data-bs-parent="#generalFaq">
                <div class="accordion-body">
                  Yes, we are fully accredited by Ghana's National Accreditation Board and hold ISO 9001:2015 certification. We're also authorized training partners for AWS, Microsoft, Google, CompTIA, Cisco, and Adobe.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#gen2">
                  How long has TecWorld Academy been operating?
                </button>
              </h2>
              <div id="gen2" class="accordion-collapse collapse" data-bs-parent="#generalFaq">
                <div class="accordion-body">
                  We were founded in 2015 and have been providing quality tech education for 10 years. We've graduated over 5,000 students who now work in leading companies across 30+ countries.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#gen3">
                  What makes TecWorld Academy different from other schools?
                </button>
              </h2>
              <div id="gen3" class="accordion-collapse collapse" data-bs-parent="#generalFaq">
                <div class="accordion-body">
                  Our key differentiators include: 95% job placement rate, small class sizes (20-25 students), industry-certified instructors with real-world experience, hands-on project-based learning, lifetime career support, and flexible learning options.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#gen4">
                  Do you offer corporate training?
                </button>
              </h2>
              <div id="gen4" class="accordion-collapse collapse" data-bs-parent="#generalFaq">
                <div class="accordion-body">
                  Yes! We provide customized corporate training programs for companies looking to upskill their teams. Contact our corporate training department for special rates and tailored curriculum.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#gen5">
                  Can international students enroll?
                </button>
              </h2>
              <div id="gen5" class="accordion-collapse collapse" data-bs-parent="#generalFaq">
                <div class="accordion-body">
                  Yes, we welcome international students! We have students from across Africa and beyond. Our online programs are accessible globally. For in-person classes, we can provide admission letters to support visa applications.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#gen6">
                  What is your student-to-instructor ratio?
                </button>
              </h2>
              <div id="gen6" class="accordion-collapse collapse" data-bs-parent="#generalFaq">
                <div class="accordion-body">
                  We maintain a 1:15 student-to-instructor ratio on average. This ensures each student receives adequate attention, mentorship, and support throughout their learning journey.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#gen7">
                  Do you provide accommodation assistance?
                </button>
              </h2>
              <div id="gen7" class="accordion-collapse collapse" data-bs-parent="#generalFaq">
                <div class="accordion-body">
                  While we don't provide on-campus housing, our student services team can help you find affordable accommodation near our campuses. We have partnerships with nearby hostels and landlords.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#gen8">
                  What languages are courses taught in?
                </button>
              </h2>
              <div id="gen8" class="accordion-collapse collapse" data-bs-parent="#generalFaq">
                <div class="accordion-body">
                  All courses are taught in English. Proficiency in English is required for enrollment as course materials, documentation, and most tech industry resources are in English.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#gen9">
                  Can I audit a class before enrolling?
                </button>
              </h2>
              <div id="gen9" class="accordion-collapse collapse" data-bs-parent="#generalFaq">
                <div class="accordion-body">
                  We offer free trial classes and demo sessions for prospective students. Contact admissions to schedule a trial class in your area of interest. This helps you experience our teaching style before committing.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#gen10">
                  How do I stay updated with TecWorld Academy news?
                </button>
              </h2>
              <div id="gen10" class="accordion-collapse collapse" data-bs-parent="#generalFaq">
                <div class="accordion-body">
                  Follow us on social media (Facebook, Twitter, Instagram, LinkedIn), subscribe to our newsletter, check our blog, or join our WhatsApp community. We regularly share updates about new courses, events, and opportunities.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Quick Links Section -->
<section class="py-5" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Quick Links</h2>
        <p class="lead">Find more information about TecWorld Academy</p>
      </div>
      <div class="row g-3">
        <div class="col-lg-3 col-md-6">
          <a href="/Courses/courses.php" class="btn btn-outline-primary w-100 py-3">
            <i class="bi bi-book me-2"></i>Browse Courses
          </a>
        </div>
        <div class="col-lg-3 col-md-6">
          <a href="/Admissions/General/admissions/admissions.php" class="btn btn-outline-success w-100 py-3">
            <i class="bi bi-pencil-square me-2"></i>Apply Now
          </a>
        </div>
        <div class="col-lg-3 col-md-6">
          <a href="schedule.php" class="btn btn-outline-warning w-100 py-3">
            <i class="bi bi-calendar-event me-2"></i>View Schedule
          </a>
        </div>
        <div class="col-lg-3 col-md-6">
          <a href="/contact/contact.php" class="btn btn-outline-info w-100 py-3">
            <i class="bi bi-chat-dots me-2"></i>Contact Support
          </a>
        </div>
      </div>
    </div>
</section>

<!-- Help Resources Section -->
<section class="py-5 bg-light" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Additional Resources</h2>
        <p class="lead">Helpful guides and documentation</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">
              <i class="bi bi-file-earmark-pdf text-danger fs-1 mb-3"></i>
              <h5 class="card-title">Course Catalog</h5>
              <p class="card-text">Download our complete course catalog with detailed program descriptions and pricing.</p>
              <a href="downloads/catalog.pdf" class="btn btn-outline-danger" download>
                <i class="bi bi-download me-2"></i>Download PDF
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">
              <i class="bi bi-calendar-check text-primary fs-1 mb-3"></i>
              <h5 class="card-title">Academic Calendar</h5>
              <p class="card-text">View our academic calendar with important dates, holidays, and program start dates.</p>
              <a href="calendar.php" class="btn btn-outline-primary">
                <i class="bi bi-calendar me-2"></i>View Calendar
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">
              <i class="bi bi-book text-success fs-1 mb-3"></i>
              <h5 class="card-title">Student Handbook</h5>
              <p class="card-text">Read our student handbook covering policies, procedures, and student life information.</p>
              <a href="downloads/handbook.pdf" class="btn btn-outline-success" download>
                <i class="bi bi-download me-2"></i>Download PDF
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">
              <i class="bi bi-question-circle text-warning fs-1 mb-3"></i>
              <h5 class="card-title">Admissions Guide</h5>
              <p class="card-text">Step-by-step guide to the application and enrollment process at TecWorld Academy.</p>
              <a href="downloads/admissions-guide.pdf" class="btn btn-outline-warning" download>
                <i class="bi bi-download me-2"></i>Download PDF
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">
              <i class="bi bi-cash-coin text-info fs-1 mb-3"></i>
              <h5 class="card-title">Financial Aid Guide</h5>
              <p class="card-text">Learn about scholarships, payment plans, and financial assistance options available.</p>
              <a href="downloads/financial-aid.pdf" class="btn btn-outline-info" download>
                <i class="bi bi-download me-2"></i>Download PDF
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">
              <i class="bi bi-play-circle text-danger fs-1 mb-3"></i>
              <h5 class="card-title">Video Tutorials</h5>
              <p class="card-text">Watch video tutorials on navigating our platform, registration process, and more.</p>
              <a href="tutorials.php" class="btn btn-outline-danger">
                <i class="bi bi-play me-2"></i>Watch Videos
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Contact Support Section -->
<section class="py-5 bg-primary text-white" data-aos="fade-up">
    <div class="container text-center">
      <h2 class="fw-bold mb-3">Couldn't Find Your Answer?</h2>
      <p class="lead mb-4">Our support team is ready to help you with any questions</p>
      <div class="row justify-content-center g-3">
        <div class="col-md-3">
          <div class="p-3">
            <i class="bi bi-telephone-fill fs-1 mb-2"></i>
            <h5>Call Us</h5>
            <p class="mb-0">+233 XX XXX XXXX</p>
            <small>Mon-Sat: 8AM-6PM</small>
          </div>
        </div>
        <div class="col-md-3">
          <div class="p-3">
            <i class="bi bi-envelope-fill fs-1 mb-2"></i>
            <h5>Email Us</h5>
            <p class="mb-0">info@tecworld.com</p>
            <small>24-hour response</small>
          </div>
        </div>
        <div class="col-md-3">
          <div class="p-3">
            <i class="bi bi-whatsapp fs-1 mb-2"></i>
            <h5>WhatsApp</h5>
            <p class="mb-0">+233 XX XXX XXXX</p>
            <small>Quick responses</small>
          </div>
        </div>
        <div class="col-md-3">
          <div class="p-3">
            <i class="bi bi-chat-dots-fill fs-1 mb-2"></i>
            <h5>Live Chat</h5>
            <p class="mb-0">Chat with us</p>
            <small>Online support</small>
          </div>
        </div>
      </div>
      <div class="mt-4">
        <a href="/contact/contact.php" class="btn btn-light btn-lg px-5">Contact Support Team</a>
      </div>
    </div>
</section>

<?php
 include(__DIR__ . '/../../Modals/modals/modals.php');
 include(__DIR__ . '/../../includes/footer/footer.php'); 
 ?>
