<?php 
session_start();
include(__DIR__ . '/../../../includes/lang/lang.php');
include(__DIR__ . '/../../../includes/header/header.php'); 
include(__DIR__ . '/../../../includes/navbar/navbar.php');
include(__DIR__ . '/../../../includes/sidebar/sidebar.php');
?>

<!-- Hero Section -->
<section class="bg-dark text-white text-center py-5">
  <div class="container">
    <h1 class="fw-bold">Blockchain Technology</h1>
    <p class="lead">Master decentralized systems, smart contracts, and blockchain applications</p>
  </div>
</section>

<!-- Course Overview -->
<section class="py-5">
  <div class="container">
    <div class="row align-items-center g-4">
      <div class="col-lg-6" data-aos="fade-right">
        <img src="assets/images/blockchain-course.jpg" class="img-fluid rounded shadow-sm" alt="Blockchain Course">
      </div>
      <div class="col-lg-6" data-aos="fade-left">
        <h2 class="fw-bold mb-3">Course Overview</h2>
        <p>
          This comprehensive course introduces the fundamentals of blockchain technology, exploring its architecture,
          consensus mechanisms, and real-world use cases. Students will learn how to develop decentralized applications
          (DApps) and work with smart contracts on leading platforms such as Ethereum and Hyperledger.
        </p>
        <ul class="list-unstyled mt-3">
          <li><i class="bi bi-check-circle-fill text-success me-2"></i> Blockchain fundamentals and distributed ledgers</li>
          <li><i class="bi bi-check-circle-fill text-success me-2"></i> Cryptocurrency and digital wallet concepts</li>
          <li><i class="bi bi-check-circle-fill text-success me-2"></i> Smart contracts using Solidity</li>
          <li><i class="bi bi-check-circle-fill text-success me-2"></i> Decentralized Applications (DApps)</li>
          <li><i class="bi bi-check-circle-fill text-success me-2"></i> Blockchain security and scalability</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- Course Modules -->
<section class="bg-light py-5">
  <div class="container">
    <h2 class="text-center fw-bold mb-5">Course Modules</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
          <div class="card-body">
            <h5 class="card-title text-primary">Module 1: Blockchain Fundamentals</h5>
            <p class="card-text small">Learn the core concepts, components, and structure of blockchain systems and how they differ from traditional databases.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
          <div class="card-body">
            <h5 class="card-title text-primary">Module 2: Cryptography & Consensus</h5>
            <p class="card-text small">Understand public/private keys, hashing, proof-of-work, proof-of-stake, and how consensus mechanisms secure blockchain networks.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
          <div class="card-body">
            <h5 class="card-title text-primary">Module 3: Smart Contracts</h5>
            <p class="card-text small">Get hands-on with Ethereum and Solidity to build, test, and deploy smart contracts that automate trust-based systems.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row g-4 mt-2">
      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
          <div class="card-body">
            <h5 class="card-title text-primary">Module 4: DApp Development</h5>
            <p class="card-text small">Design and develop decentralized applications that leverage blockchain for transparency and automation.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
          <div class="card-body">
            <h5 class="card-title text-primary">Module 5: Blockchain Platforms</h5>
            <p class="card-text small">Explore popular frameworks like Hyperledger, Ethereum, and Binance Smart Chain to understand their real-world applications.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
          <div class="card-body">
            <h5 class="card-title text-primary">Module 6: Future of Blockchain</h5>
            <p class="card-text small">Discover emerging trends such as NFTs, DeFi, and blockchain integration in finance, healthcare, and supply chain systems.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Benefits -->
<section class="py-5">
  <div class="container">
    <h2 class="text-center fw-bold mb-4">Why Enroll in This Course?</h2>
    <div class="row g-4 text-center">
      <div class="col-md-3">
        <i class="bi bi-laptop fs-1 text-primary mb-2"></i>
        <h6>Hands-on Learning</h6>
        <p class="small text-muted">Work on blockchain projects and deploy real-world DApps.</p>
      </div>
      <div class="col-md-3">
        <i class="bi bi-award fs-1 text-success mb-2"></i>
        <h6>Industry Certification</h6>
        <p class="small text-muted">Earn a verified certificate upon completion.</p>
      </div>
      <div class="col-md-3">
        <i class="bi bi-people fs-1 text-info mb-2"></i>
        <h6>Expert Instructors</h6>
        <p class="small text-muted">Learn from blockchain professionals and developers.</p>
      </div>
      <div class="col-md-3">
        <i class="bi bi-briefcase fs-1 text-warning mb-2"></i>
        <h6>Career Advancement</h6>
        <p class="small text-muted">Prepare for roles such as Blockchain Developer and Crypto Analyst.</p>
      </div>
    </div>
  </div>
</section>

<!-- Call to Action -->
<section class="bg-primary text-white text-center py-5">
  <div class="container">
    <h2 class="fw-bold">Ready to Start Your Blockchain Journey?</h2>
    <p class="lead mb-4">Join our next cohort and gain the skills to innovate in the decentralized future.</p>
    <a href="apply.php?course=blockchain" class="btn btn-light btn-lg">
      <i class="bi bi-send me-2"></i> Apply Now
    </a>
  </div>
</section>

<?php 
include(__DIR__ . '/../../../Modals/modals/modals.php');
include(__DIR__ . '/../../../includes/footer/footer.php'); 
?>
