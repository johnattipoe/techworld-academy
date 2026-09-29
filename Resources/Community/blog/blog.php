<?php 
session_start();
include(__DIR__ . '/../../../includes/lang/lang.php');
include(__DIR__ . '/../../../includes/header/header.php');
include(__DIR__ . '/../../../includes/navbar/navbar.php'); 
include(__DIR__ . '/../../../includes/sidebar/sidebar.php');
?>

<!-- BLOG.PHP -->

<!-- Page Hero Section -->
<section class="bg-primary text-white py-5" data-aos="fade-down">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-8 mx-auto text-center">
          <div class="badge bg-light text-primary mb-3">Community Resources</div>
          <h1 class="display-4 fw-bold mb-3">TecWorld Blog</h1>
          <p class="lead mb-4">Stay updated with the latest tech trends, tutorials, student stories, and industry insights.</p>
          <div class="input-group input-group-lg mb-3" style="max-width: 500px; margin: 0 auto;">
            <input type="text" class="form-control" placeholder="Search articles...">
            <button class="btn btn-light" type="button">
              <i class="bi bi-search"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Categories Section -->
<section class="py-4 bg-light" data-aos="fade-up">
    <div class="container">
      <div class="d-flex flex-wrap justify-content-center gap-2">
        <a href="?category=all" class="btn btn-primary">All Articles</a>
        <a href="?category=tutorials" class="btn btn-outline-primary">Tutorials</a>
        <a href="?category=career" class="btn btn-outline-primary">Career Advice</a>
        <a href="?category=tech-trends" class="btn btn-outline-primary">Tech Trends</a>
        <a href="?category=student-stories" class="btn btn-outline-primary">Student Stories</a>
        <a href="?category=industry-news" class="btn btn-outline-primary">Industry News</a>
      </div>
    </div>
</section>

<!-- Featured Post Section -->
<section class="py-5" data-aos="fade-up">
    <div class="container">
      <div class="card border-0 shadow-lg overflow-hidden">
        <div class="row g-0">
          <div class="col-md-6">
            <img src="/assets/project/sale prediction.jpeg" class="img-fluid h-100 object-fit-cover" alt="Featured Post">
          </div>
          <div class="col-md-6">
            <div class="card-body p-5">
              <div class="mb-3">
                <span class="badge bg-primary">Featured</span>
                <span class="badge bg-secondary ms-2">Tech Trends</span>
              </div>
              <h2 class="fw-bold mb-3">The Future of AI in Ghana: Opportunities and Challenges</h2>
              <p class="mb-3">Explore how artificial intelligence is transforming industries in Ghana and what it means for tech professionals. Learn about emerging opportunities and how to position yourself for success.</p>
              <div class="d-flex align-items-center mb-3">
                <span class="d-inline-flex align-items-center justify-content-center rounded-circle me-2 bg-primary text-white fw-bold" style="width: 40px; height: 40px;" aria-hidden="true">KN</span>
                <div>
                  <small class="fw-bold d-block">Dr. Kwame Nkrumah</small>
                  <small class="text-muted">October 25, 2025 • 8 min read</small>
                </div>
              </div>
              <a href="blog-post.php?id=1" class="btn btn-primary">Read Full Article</a>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Recent Posts Section -->
<section class="py-5 bg-light" data-aos="fade-up">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0">Recent Articles</h2>
        <div class="dropdown">
          <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
            Sort by: Latest
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Latest</a></li>
            <li><a class="dropdown-item" href="#">Most Popular</a></li>
            <li><a class="dropdown-item" href="#">Most Viewed</a></li>
          </ul>
        </div>
      </div>
      <div class="row g-4">
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <img src="/assets/project/e-commerce.jpeg" class="card-img-top" alt="Blog Post">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="badge bg-success">Tutorials</span>
                <small class="text-muted">Oct 28, 2025</small>
              </div>
              <h5 class="card-title fw-bold">Getting Started with React Hooks: A Beginner's Guide</h5>
              <p class="card-text">Master React Hooks with this comprehensive guide covering useState, useEffect, and custom hooks with practical examples.</p>
              <div class="d-flex align-items-center mb-3">
                <span class="d-inline-flex align-items-center justify-content-center rounded-circle me-2 bg-primary text-white fw-bold" style="width: 30px; height: 30px; font-size: 0.75rem;" aria-hidden="true">AS</span>
                <small class="text-muted">By Ama Serwaa • 5 min read</small>
              </div>
              <a href="blog-post.php?id=2" class="btn btn-outline-primary btn-sm">Read More</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <img src="/assets/blog/career%20tip.jpeg" class="card-img-top" alt="Blog Post">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="badge bg-warning text-dark">Career Advice</span>
                <small class="text-muted">Oct 26, 2025</small>
              </div>
              <h5 class="card-title fw-bold">5 Skills Every Developer Needs in 2025</h5>
              <p class="card-text">Discover the most in-demand technical and soft skills that will set you apart in the competitive tech job market.</p>
              <div class="d-flex align-items-center mb-3">
                <span class="d-inline-flex align-items-center justify-content-center rounded-circle me-2 bg-primary text-white fw-bold" style="width: 30px; height: 30px; font-size: 0.75rem;" aria-hidden="true">GM</span>
                <small class="text-muted">By Grace Mensah • 6 min read</small>
              </div>
              <a href="blog-post.php?id=3" class="btn btn-outline-primary btn-sm">Read More</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <img src="/assets/blog/success%20stories.jpeg" class="card-img-top" alt="Blog Post">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="badge bg-info">Student Stories</span>
                <small class="text-muted">Oct 24, 2025</small>
              </div>
              <h5 class="card-title fw-bold">From Zero to Full Stack Developer in 6 Months</h5>
              <p class="card-text">Meet Samuel, who transformed his career through dedication and our comprehensive web development program.</p>
              <div class="d-flex align-items-center mb-3">
                <span class="d-inline-flex align-items-center justify-content-center rounded-circle me-2 bg-primary text-white fw-bold" style="width: 30px; height: 30px; font-size: 0.75rem;" aria-hidden="true">SO</span>
                <small class="text-muted">By Samuel Owusu • 7 min read</small>
              </div>
              <a href="blog-post.php?id=4" class="btn btn-outline-primary btn-sm">Read More</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <img src="/assets/cert/cert-aws.jpeg" class="card-img-top" alt="Blog Post">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="badge bg-danger">Tech Trends</span>
                <small class="text-muted">Oct 22, 2025</small>
              </div>
              <h5 class="card-title fw-bold">Cloud Computing Trends Shaping Africa's Tech Landscape</h5>
              <p class="card-text">Explore how cloud technologies are revolutionizing businesses across Africa and creating new opportunities.</p>
              <div class="d-flex align-items-center mb-3">
                <span class="d-inline-flex align-items-center justify-content-center rounded-circle me-2 bg-primary text-white fw-bold" style="width: 30px; height: 30px; font-size: 0.75rem;" aria-hidden="true">YB</span>
                <small class="text-muted">By Yaw Boateng • 8 min read</small>
              </div>
              <a href="blog-post.php?id=5" class="btn btn-outline-primary btn-sm">Read More</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <img src="/assets/project/fitness tracker.jpeg" class="card-img-top" alt="Blog Post">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="badge bg-success">Tutorials</span>
                <small class="text-muted">Oct 20, 2025</small>
              </div>
              <h5 class="card-title fw-bold">Building Your First REST API with Node.js and Express</h5>
              <p class="card-text">Step-by-step guide to creating a fully functional REST API from scratch with authentication and database integration.</p>
              <div class="d-flex align-items-center mb-3">
                <span class="d-inline-flex align-items-center justify-content-center rounded-circle me-2 bg-primary text-white fw-bold" style="width: 30px; height: 30px; font-size: 0.75rem;" aria-hidden="true">KM</span>
                <small class="text-muted">By Kofi Mensah • 10 min read</small>
              </div>
              <a href="blog-post.php?id=6" class="btn btn-outline-primary btn-sm">Read More</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="card h-100 border-0 shadow-sm">
            <img src="/assets/blog/career%20tip.jpeg" class="card-img-top" alt="Blog Post">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="badge bg-secondary">Industry News</span>
                <small class="text-muted">Oct 18, 2025</small>
              </div>
              <h5 class="card-title fw-bold">Tech Salaries in Ghana: 2025 Comprehensive Report</h5>
              <p class="card-text">Analysis of current salary trends for developers, designers, and other tech professionals in Ghana's job market.</p>
              <div class="d-flex align-items-center mb-3">
                <span class="d-inline-flex align-items-center justify-content-center rounded-circle me-2 bg-primary text-white fw-bold" style="width: 30px; height: 30px; font-size: 0.75rem;" aria-hidden="true">AB</span>
                <small class="text-muted">By Akosua Boateng • 9 min read</small>
              </div>
              <a href="blog-post.php?id=7" class="btn btn-outline-primary btn-sm">Read More</a>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center mt-5">
        <nav aria-label="Blog pagination">
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
    </div>
</section>

<!-- Newsletter Section -->
<section class="py-5 bg-primary text-white" data-aos="fade-up">
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-lg-6">
          <h2 class="fw-bold mb-3">Subscribe to Our Newsletter</h2>
          <p class="mb-4">Get the latest articles, tutorials, and tech news delivered to your inbox weekly.</p>
          <form class="row g-3 justify-content-center">
            <div class="col-auto">
              <input type="email" class="form-control form-control-lg" placeholder="Enter your email" required>
            </div>
            <div class="col-auto">
              <button type="submit" class="btn btn-light btn-lg fw-bold">Subscribe</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</section>

<?php
 include(__DIR__ . '/../../../Modals/modals/modals.php');
 include(__DIR__ . '/../../../includes/footer/footer.php'); 
 ?>
