/**
 * Techworld Technology Learning Platform
 * Extended JavaScript - Complete Interactive Features
 * Author: Techworld Dev Team
 * Version: 2.0
 */

// ============================================
// INITIALIZATION & CONFIGURATION
// ============================================

const TechworldApp = {
  config: {
    animationDuration: 800,
    notificationInterval: 5000,
    autoSaveInterval: 30000,
    sessionTimeout: 1800000, // 30 minutes
  },
  
  state: {
    darkMode: false,
    notifications: [],
    activeModals: [],
    studyTimer: null,
    studyTime: 0,
  }
};

// ============================================
// AOS ANIMATION INITIALIZATION
// ============================================

document.addEventListener('DOMContentLoaded', function() {
  const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  // Initialize AOS
  if (!prefersReducedMotion && typeof AOS !== 'undefined') {
    AOS.init({
      duration: 800,
      easing: 'ease-in-out',
      once: true,
      offset: 100,
      disable: 'mobile' // Disable on mobile for better performance
    });
  }
  
  // Refresh AOS on dynamic content load
  window.addEventListener('load', () => {
    if (!prefersReducedMotion && typeof AOS !== 'undefined') {
      AOS.refresh();
    }
  });
});

// ============================================
// COUNTER ANIMATION
// ============================================

function animateCounter(element) {
  const target = parseInt(element.getAttribute('data-target'));
  const duration = 2000;
  const step = target / (duration / 16);
  let current = 0;

  const timer = setInterval(() => {
    current += step;
    if (current >= target) {
      element.textContent = target;
      clearInterval(timer);
    } else {
      element.textContent = Math.floor(current);
    }
  }, 16);
}

// Animate all counters on page load
document.addEventListener('DOMContentLoaded', function() {
  const counters = document.querySelectorAll('.counter');
  
  // Use Intersection Observer for better performance
  const counterObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        animateCounter(entry.target);
        counterObserver.unobserve(entry.target);
      }
    });
  }, { threshold: 0.5 });

  counters.forEach(counter => {
    counterObserver.observe(counter);
  });
});

// ============================================
// PROGRESS BAR ANIMATION
// ============================================

function animateProgressBars() {
  const progressBars = document.querySelectorAll('.progress-bar[data-progress]');
  
  const progressObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const bar = entry.target;
        const progress = bar.getAttribute('data-progress');
        
        setTimeout(() => {
          bar.style.width = progress + '%';
        }, 100);
        
        progressObserver.unobserve(bar);
      }
    });
  }, { threshold: 0.3 });

  progressBars.forEach(bar => {
    progressObserver.observe(bar);
  });
}

document.addEventListener('DOMContentLoaded', animateProgressBars);

// ============================================
// TOOLTIP INITIALIZATION
// ============================================

document.addEventListener('DOMContentLoaded', function() {
  const tooltipTriggerList = [].slice.call(
    document.querySelectorAll('[data-bs-toggle="tooltip"]')
  );
  
  tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl, {
      trigger: 'hover',
      delay: { show: 500, hide: 100 }
    });
  });
});

// ============================================
// SMOOTH SCROLL NAVIGATION
// ============================================

document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      const href = this.getAttribute('href');
      
      // Skip empty anchors or modal triggers
      if (href === '#' || this.hasAttribute('data-bs-toggle')) {
        return;
      }
      
      e.preventDefault();
      const target = document.querySelector(href);
      
      if (target) {
        const offset = 100; // Account for fixed header
        const targetPosition = target.offsetTop - offset;
        
        window.scrollTo({
          top: targetPosition,
          behavior: 'smooth'
        });
      }
    });
  });
});

// ============================================
// ACTIVE NAVIGATION ON SCROLL
// ============================================

window.addEventListener('scroll', () => {
  const sections = document.querySelectorAll('div[id]');
  const navLinks = document.querySelectorAll('.nav-link');
  
  let current = '';
  sections.forEach(section => {
    const sectionTop = section.offsetTop;
    const sectionHeight = section.clientHeight;
    
    if (scrollY >= (sectionTop - 200)) {
      current = section.getAttribute('id');
    }
  });

  navLinks.forEach(link => {
    link.classList.remove('active');
    if (link.getAttribute('href') === `#${current}`) {
      link.classList.add('active');
    }
  });
});

// ============================================
// ACHIEVEMENT BADGES INTERACTION
// ============================================

document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('.achievement-badge').forEach(badge => {
    badge.addEventListener('click', function() {
      const achievementName = this.querySelector('p')?.textContent || 'Achievement';
      
      if (this.classList.contains('earned')) {
        showNotification('🎉 Achievement: ' + achievementName, 'success');
        
        // Add celebration animation
        this.style.animation = 'none';
        setTimeout(() => {
          this.style.animation = 'pulse 0.5s';
        }, 10);
      } else {
        showNotification('🔒 Keep learning to unlock: ' + achievementName, 'info');
      }
    });
  });
});

// ============================================
// NOTIFICATION SYSTEM
// ============================================

function showNotification(message, type = 'info') {
  const notificationContainer = getOrCreateNotificationContainer();
  
  const notification = document.createElement('div');
  notification.className = `alert alert-${type} alert-dismissible fade show notification-toast`;
  notification.style.cssText = `
    position: relative;
    margin-bottom: 10px;
    animation: slideInRight 0.3s ease-out;
  `;
  
  const icons = {
    success: 'check-circle-fill',
    danger: 'exclamation-triangle-fill',
    warning: 'exclamation-circle-fill',
    info: 'info-circle-fill'
  };
  
  notification.innerHTML = `
    <i class="bi bi-${icons[type]} me-2"></i>
    ${message}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  `;
  
  notificationContainer.appendChild(notification);
  
  // Auto dismiss after 5 seconds
  setTimeout(() => {
    notification.classList.remove('show');
    setTimeout(() => notification.remove(), 300);
  }, 5000);
}

function getOrCreateNotificationContainer() {
  let container = document.getElementById('notification-container');
  
  if (!container) {
    container = document.createElement('div');
    container.id = 'notification-container';
    container.style.cssText = `
      position: fixed;
      top: 100px;
      right: 20px;
      z-index: 9999;
      max-width: 350px;
    `;
    document.body.appendChild(container);
  }
  
  return container;
}

// Simulate live notifications
setInterval(() => {
  const notificationBadges = document.querySelectorAll('.notification-badge');
  notificationBadges.forEach(badge => {
    badge.style.animation = 'none';
    setTimeout(() => {
      badge.style.animation = 'bounce 1s ease-in-out infinite';
    }, 10);
  });
}, TechworldApp.config.notificationInterval);

// ============================================
// BACK TO TOP BUTTON
// ============================================

document.addEventListener('DOMContentLoaded', function() {
  const backToTopBtn = document.getElementById('backToTop');
  
  if (backToTopBtn) {
    window.addEventListener('scroll', () => {
      if (window.scrollY > 300) {
        backToTopBtn.style.display = 'block';
        backToTopBtn.style.animation = 'fadeIn 0.3s';
      } else {
        backToTopBtn.style.display = 'none';
      }
    });

    backToTopBtn.addEventListener('click', () => {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });
  }
});

// ============================================
// NEWSLETTER SUBSCRIPTION
// ============================================

document.addEventListener('DOMContentLoaded', function() {
  const newsletterForm = document.querySelector('footer form');
  
  if (newsletterForm) {
    newsletterForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const email = e.target.querySelector('input[type="email"]').value;
      
      // Validate email
      if (!validateEmail(email)) {
        showNotification('Please enter a valid email address', 'danger');
        return;
      }
      
      // Simulate API call
      showNotification('Thank you for subscribing! 🎉', 'success');
      e.target.reset();
      
      // Store in localStorage
      saveToLocalStorage('newsletter_email', email);
    });
  }
});

// ============================================
// SEARCH FUNCTIONALITY
// ============================================

function initializeSearch() {
  const searchInput = document.getElementById('searchInput');
  
  if (searchInput) {
    searchInput.addEventListener('input', debounce(function(e) {
      const query = e.target.value.toLowerCase();
      performSearch(query);
    }, 300));
  }
}

function performSearch(query) {
  if (query.length < 2) return;
  
  const courseCards = document.querySelectorAll('.course-card');
  let resultsFound = 0;
  
  courseCards.forEach(card => {
    const title = card.querySelector('h5')?.textContent.toLowerCase() || '';
    const description = card.querySelector('.text-muted')?.textContent.toLowerCase() || '';
    
    if (title.includes(query) || description.includes(query)) {
      card.closest('.col-md-6')?.style.setProperty('display', 'block');
      resultsFound++;
    } else {
      card.closest('.col-md-6')?.style.setProperty('display', 'none');
    }
  });
  
  if (resultsFound === 0) {
    showNotification('No courses found matching your search', 'info');
  }
}

document.addEventListener('DOMContentLoaded', initializeSearch);

// ============================================
// COURSE FILTERING
// ============================================

function initializeCourseFilters() {
  const filterButtons = document.querySelectorAll('[data-filter]');
  
  filterButtons.forEach(button => {
    button.addEventListener('click', function() {
      const filter = this.getAttribute('data-filter');
      
      // Update active button
      filterButtons.forEach(btn => btn.classList.remove('active'));
      this.classList.add('active');
      
      // Filter courses
      filterCourses(filter);
    });
  });
}

// ============================================
// OPTIONAL LIBRARY INITIALIZATIONS (SAFE)
// ============================================
document.addEventListener('DOMContentLoaded', function() {
  // Swiper (if included)
  if (typeof Swiper !== 'undefined') {
    try {
      const courseSwiper = new Swiper('.mySwiper', {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        breakpoints: {
          576: { slidesPerView: 2 },
          992: { slidesPerView: 3 }
        },
        pagination: { el: '.swiper-pagination', clickable: true },
        navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' }
      });
    } catch (err) {
      console.warn('Swiper init failed:', err);
    }
  }

  // GLightbox (if included)
  if (typeof GLightbox !== 'undefined' || typeof glightbox !== 'undefined') {
    try {
      const lightbox = GLightbox ? GLightbox({ selector: '.glightbox' }) : glightbox({ selector: '.glightbox' });
    } catch (err) {
      console.warn('GLightbox init failed:', err);
    }
  }
});

function filterCourses(category) {
  const courseCards = document.querySelectorAll('.course-card');
  
  courseCards.forEach(card => {
    const courseCategory = card.getAttribute('data-category');
    const parent = card.closest('.col-md-6');
    
    if (category === 'all' || courseCategory === category) {
      parent.style.display = 'block';
      card.style.animation = 'fadeIn 0.5s';
    } else {
      parent.style.display = 'none';
    }
  });
}

document.addEventListener('DOMContentLoaded', initializeCourseFilters);

// ============================================
// DARK MODE TOGGLE
// ============================================

function initializeDarkMode() {
  const darkModeToggle = document.getElementById('darkModeToggle');
  
  if (darkModeToggle) {
    // Check saved preference
    const savedMode = localStorage.getItem('darkMode');
    if (savedMode === 'enabled') {
      enableDarkMode();
    }
    
    darkModeToggle.addEventListener('click', function() {
      if (TechworldApp.state.darkMode) {
        disableDarkMode();
      } else {
        enableDarkMode();
      }
    });
  }
}

function enableDarkMode() {
  document.body.classList.add('dark-mode');
  TechworldApp.state.darkMode = true;
  localStorage.setItem('darkMode', 'enabled');
  showNotification('Dark mode enabled', 'success');
}

function disableDarkMode() {
  document.body.classList.remove('dark-mode');
  TechworldApp.state.darkMode = false;
  localStorage.setItem('darkMode', 'disabled');
  showNotification('Light mode enabled', 'success');
}

document.addEventListener('DOMContentLoaded', initializeDarkMode);

// ============================================
// STUDY TIMER
// ============================================

function initializeStudyTimer() {
  const startTimerBtn = document.getElementById('startTimer');
  const timerDisplay = document.getElementById('timerDisplay');
  
  if (startTimerBtn && timerDisplay) {
    startTimerBtn.addEventListener('click', function() {
      if (TechworldApp.state.studyTimer) {
        stopStudyTimer();
      } else {
        startStudyTimer();
      }
    });
  }
}

function startStudyTimer() {
  TechworldApp.state.studyTimer = setInterval(() => {
    TechworldApp.state.studyTime++;
    updateTimerDisplay();
  }, 1000);
  
  document.getElementById('startTimer').textContent = 'Stop Timer';
  showNotification('Study timer started', 'success');
}

function stopStudyTimer() {
  clearInterval(TechworldApp.state.studyTimer);
  TechworldApp.state.studyTimer = null;
  document.getElementById('startTimer').textContent = 'Start Timer';
  showNotification(`Study session completed: ${formatTime(TechworldApp.state.studyTime)}`, 'success');
  
  // Save study time
  saveStudyTime(TechworldApp.state.studyTime);
  TechworldApp.state.studyTime = 0;
}

function updateTimerDisplay() {
  const display = document.getElementById('timerDisplay');
  if (display) {
    display.textContent = formatTime(TechworldApp.state.studyTime);
  }
}

function formatTime(seconds) {
  const hours = Math.floor(seconds / 3600);
  const minutes = Math.floor((seconds % 3600) / 60);
  const secs = seconds % 60;
  
  return `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(secs).padStart(2, '0')}`;
}

function saveStudyTime(seconds) {
  const studyData = JSON.parse(localStorage.getItem('studyData') || '{"total": 0, "sessions": []}');
  studyData.total += seconds;
  studyData.sessions.push({
    duration: seconds,
    date: new Date().toISOString()
  });
  localStorage.setItem('studyData', JSON.stringify(studyData));
}

document.addEventListener('DOMContentLoaded', initializeStudyTimer);

// ============================================
// COURSE PROGRESS TRACKING
// ============================================

function updateCourseProgress(courseId, lessonId, completed = true) {
  const progressData = JSON.parse(localStorage.getItem('courseProgress') || '{}');
  
  if (!progressData[courseId]) {
    progressData[courseId] = {
      completedLessons: [],
      lastAccessed: null
    };
  }
  
  if (completed && !progressData[courseId].completedLessons.includes(lessonId)) {
    progressData[courseId].completedLessons.push(lessonId);
    showNotification('Lesson completed! 🎉', 'success');
  }
  
  progressData[courseId].lastAccessed = new Date().toISOString();
  localStorage.setItem('courseProgress', JSON.stringify(progressData));
  
  // Update UI
  updateProgressUI(courseId);
}

function updateProgressUI(courseId) {
  const progressBar = document.querySelector(`[data-course-id="${courseId}"] .progress-bar`);
  
  if (progressBar) {
    const progressData = JSON.parse(localStorage.getItem('courseProgress') || '{}');
    const courseData = progressData[courseId];
    const totalLessons = parseInt(progressBar.getAttribute('data-total-lessons') || 0);
    
    if (courseData && totalLessons > 0) {
      const progress = Math.round((courseData.completedLessons.length / totalLessons) * 100);
      progressBar.style.width = progress + '%';
      progressBar.textContent = progress + '%';
    }
  }
}

// ============================================
// BOOKMARKS & FAVORITES
// ============================================

function toggleBookmark(courseId) {
  const bookmarks = JSON.parse(localStorage.getItem('bookmarks') || '[]');
  const index = bookmarks.indexOf(courseId);
  
  if (index > -1) {
    bookmarks.splice(index, 1);
    showNotification('Removed from bookmarks', 'info');
  } else {
    bookmarks.push(courseId);
    showNotification('Added to bookmarks', 'success');
  }
  
  localStorage.setItem('bookmarks', JSON.stringify(bookmarks));
  updateBookmarkUI(courseId);
}

function updateBookmarkUI(courseId) {
  const bookmarkBtn = document.querySelector(`[data-bookmark-course="${courseId}"]`);
  
  if (bookmarkBtn) {
    const bookmarks = JSON.parse(localStorage.getItem('bookmarks') || '[]');
    const isBookmarked = bookmarks.includes(courseId);
    
    bookmarkBtn.innerHTML = isBookmarked 
      ? '<i class="bi bi-bookmark-fill"></i>' 
      : '<i class="bi bi-bookmark"></i>';
  }
}

// ============================================
// FORM AUTO-SAVE
// ============================================

function initializeAutoSave() {
  const forms = document.querySelectorAll('[data-autosave]');
  
  forms.forEach(form => {
    const formId = form.getAttribute('data-autosave');
    
    // Load saved data
    const savedData = localStorage.getItem(`form_${formId}`);
    if (savedData) {
      loadFormData(form, JSON.parse(savedData));
    }
    
    // Auto-save on input
    form.addEventListener('input', debounce(function() {
      const formData = new FormData(form);
      const data = Object.fromEntries(formData.entries());
      localStorage.setItem(`form_${formId}`, JSON.stringify(data));
    }, 1000));
  });
}

function loadFormData(form, data) {
  Object.keys(data).forEach(key => {
    const input = form.querySelector(`[name="${key}"]`);
    if (input) {
      input.value = data[key];
    }
  });
}

document.addEventListener('DOMContentLoaded', initializeAutoSave);

// ============================================
// KEYBOARD SHORTCUTS
// ============================================

document.addEventListener('keydown', function(e) {
  // Ctrl/Cmd + K: Open search
  if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
    e.preventDefault();
    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
      searchInput.focus();
    }
  }
  
  // Escape: Close modals
  if (e.key === 'Escape') {
    const modals = document.querySelectorAll('.modal.show');
    modals.forEach(modal => {
      bootstrap.Modal.getInstance(modal)?.hide();
    });
  }
});

// ============================================
// UTILITY FUNCTIONS
// ============================================

function debounce(func, wait) {
  let timeout;
  return function executedFunction(...args) {
    const later = () => {
      clearTimeout(timeout);
      func(...args);
    };
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
  };
}

function validateEmail(email) {
  const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return re.test(email);
}

function saveToLocalStorage(key, value) {
  try {
    localStorage.setItem(key, JSON.stringify(value));
    return true;
  } catch (e) {
    console.error('Error saving to localStorage:', e);
    return false;
  }
}

function getFromLocalStorage(key, defaultValue = null) {
  try {
    const item = localStorage.getItem(key);
    return item ? JSON.parse(item) : defaultValue;
  } catch (e) {
    console.error('Error reading from localStorage:', e);
    return defaultValue;
  }
}

// ============================================
// SESSION MANAGEMENT
// ============================================

function initializeSessionManagement() {
  let lastActivity = Date.now();
  
  // Track user activity
  ['mousedown', 'mousemove', 'keypress', 'scroll', 'touchstart'].forEach(event => {
    document.addEventListener(event, () => {
      lastActivity = Date.now();
    }, true);
  });
  
  // Check for inactivity
  setInterval(() => {
    const inactiveTime = Date.now() - lastActivity;
    
    if (inactiveTime > TechworldApp.config.sessionTimeout) {
      showNotification('Your session has expired due to inactivity', 'warning');
      // Optionally redirect to login
      // window.location.href = 'login.php';
    } else if (inactiveTime > TechworldApp.config.sessionTimeout - 60000) {
      showNotification('Your session will expire soon', 'info');
    }
  }, 60000); // Check every minute
}

document.addEventListener('DOMContentLoaded', initializeSessionManagement);

// ============================================
// CONSOLE WELCOME MESSAGE
// ============================================

console.log('%c Welcome to Techworld Technology! ', 'background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; font-size: 20px; padding: 10px; border-radius: 5px;');
console.log('%c Keep learning and growing! 🚀', 'color: #667eea; font-size: 14px;');
console.log('%c Advanced features enabled ✨', 'color: #28a745; font-size: 12px;');

// ============================================
// EXPORT FOR GLOBAL ACCESS
// ============================================

window.Techworld = {
  showNotification,
  toggleBookmark,
  updateCourseProgress,
  filterCourses,
  enableDarkMode,
  disableDarkMode,
  startStudyTimer,
  stopStudyTimer,
  ...TechworldApp
};


// Filter functionality
document.querySelectorAll('[data-filter]').forEach(btn => {
  btn.addEventListener('click', function() {
    document.querySelectorAll('[data-filter]').forEach(b => b.classList.remove('active', 'btn-primary'));
    document.querySelectorAll('[data-filter]').forEach(b => b.classList.add('btn-outline-primary'));
    this.classList.add('active', 'btn-primary');
    this.classList.remove('btn-outline-primary');
  });
});