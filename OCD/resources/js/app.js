// Stripe-Inspired JavaScript for OCD Platform
console.log('🚀 OCD Platform Loaded - Stripe Design');

// Modern DOM utilities
const $ = (selector) => document.querySelector(selector);
const $$ = (selector) => document.querySelectorAll(selector);

// Navigation
document.addEventListener('DOMContentLoaded', function() {
    const hamburger = $('#hamburger');
    const navMenu = $('#navMenu');
    const navbar = $('.navbar');

        // Mobile menu toggle
    if (hamburger && navMenu) {
        hamburger.addEventListener('click', function() {
            navMenu.classList.toggle('active');
            document.body.style.overflow = navMenu.classList.contains('active') ? 'hidden' : '';
        });

        // Close menu on link click
        navMenu.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', () => {
                navMenu.classList.remove('active');
                document.body.style.overflow = '';
            });
        });
    }

    // Navbar scroll effect + Page progress bar + Back to top
    const progressBar = $('.page-progress-bar');
    const backToTop = $('#backToTop');

    window.addEventListener('scroll', function() {
        // Navbar
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }

        // Progress bar
        if (progressBar) {
            const windowHeight = document.documentElement.scrollHeight - window.innerHeight;
            const scrolled = (window.scrollY / windowHeight);
            progressBar.style.transform = `scaleX(${scrolled})`;
        }

        // Back to top button
        if (backToTop) {
            if (window.scrollY > 500) {
                backToTop.classList.add('show');
            } else {
                backToTop.classList.remove('show');
            }
        }
    });

    // Back to top click
    if (backToTop) {
        backToTop.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href === '#') return;

            const target = $(href);
            if (target) {
                e.preventDefault();
                const offsetTop = target.offsetTop - 80;
                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    });
});

// Scroll Animations
document.addEventListener('DOMContentLoaded', function() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
                observer.unobserve(entry.target);
                }
            });
        }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });

    // Animate elements on scroll
    const animateElements = $$('.feature-card, .info-card, .stat-box, .about-feature');
    animateElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'opacity 0.6s ease-out, transform 0.6s ease-out';
        observer.observe(el);
    });
});

// Counter Animation
document.addEventListener('DOMContentLoaded', function() {
    const animateCounter = (element, target) => {
        let current = 0;
        const increment = target / 100;
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                element.textContent = target;
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(current);
            }
        }, 20);
    };

    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                const text = counter.textContent;
                const number = parseInt(text.replace(/[^\d]/g, ''));

                if (number > 0) {
                    const suffix = text.replace(/[\d]/g, '');
                    counter.textContent = '0' + suffix;

                    setTimeout(() => {
                        let current = 0;
                        const increment = number / 50;
                        const timer = setInterval(() => {
                            current += increment;
                            if (current >= number) {
                                counter.textContent = number + suffix;
                                clearInterval(timer);
                            } else {
                                counter.textContent = Math.floor(current) + suffix;
                            }
                        }, 30);
                    }, 300);
                }

                counterObserver.unobserve(counter);
            }
        });
    }, { threshold: 0.5 });

    // Observe all stat numbers
    const counters = $$('.stat-value, .stat-number, .metric-value');
    counters.forEach(counter => counterObserver.observe(counter));
});

// File Upload (for detection page)
document.addEventListener('DOMContentLoaded', function() {
    const fileInput = $('#fileInput');
    const uploadArea = $('#uploadArea');
    const detectionProcess = $('#detectionProcess');
    const resultsContainer = $('#resultsContainer');

    if (!fileInput || !uploadArea) return;

    // File input change
    fileInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) handleFileUpload(file);
    });

    // Drag and drop
    uploadArea.addEventListener('dragover', function(e) {
        e.preventDefault();
        uploadArea.classList.add('dragover');
    });

    uploadArea.addEventListener('dragleave', function(e) {
        e.preventDefault();
        uploadArea.classList.remove('dragover');
    });

    uploadArea.addEventListener('drop', function(e) {
        e.preventDefault();
        uploadArea.classList.remove('dragover');
        const files = e.dataTransfer.files;
        if (files.length > 0) handleFileUpload(files[0]);
    });

    function handleFileUpload(file) {
        if (!file.type.startsWith('image/')) {
            alert('Please upload an image file.');
            return;
        }

        if (file.size > 10 * 1024 * 1024) {
            alert('File size must be less than 10MB.');
            return;
        }

        // Show processing
        uploadArea.style.display = 'none';
        if (detectionProcess) {
            detectionProcess.style.display = 'block';
            simulateAnalysis();
        }
    }

    function simulateAnalysis() {
        const steps = $$('.status-item');
        const progressFill = $('.progress-fill');
        const progressText = $('.progress-text');

        // Step 1: Upload
        steps[0]?.classList.add('active');

        // Step 2: Processing
        setTimeout(() => {
            steps[1]?.classList.add('active');
            if (progressFill) progressFill.style.width = '50%';
            if (progressText) progressText.textContent = 'Running AI model...';
        }, 1000);

        // Step 3: Results
        setTimeout(() => {
            steps[2]?.classList.add('active');
            if (progressFill) progressFill.style.width = '100%';
            if (progressText) progressText.textContent = 'Analysis complete!';
        }, 2500);

        // Show results
        setTimeout(() => {
            if (detectionProcess) detectionProcess.style.display = 'none';
            if (resultsContainer) resultsContainer.style.display = 'block';
        }, 3500);
    }
});

// Global reset function
window.resetDetection = function() {
    const uploadArea = $('#uploadArea');
    const detectionProcess = $('#detectionProcess');
    const resultsContainer = $('#resultsContainer');
    const fileInput = $('#fileInput');

    if (uploadArea) uploadArea.style.display = 'block';
    if (detectionProcess) detectionProcess.style.display = 'none';
    if (resultsContainer) resultsContainer.style.display = 'none';
    if (fileInput) fileInput.value = '';

    // Reset steps
    $$('.status-item').forEach(step => step.classList.remove('active'));

    const progressFill = $('.progress-fill');
    if (progressFill) progressFill.style.width = '0%';
};

// Form handling
document.addEventListener('DOMContentLoaded', function() {
    const contactForm = $('.contact-form');
    const newsletterForms = $$('.newsletter-form');

    // Contact form
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const submitBtn = this.querySelector('.submit-button');
            const originalText = submitBtn.innerHTML;

            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
            submitBtn.disabled = true;

            setTimeout(() => {
                alert('Thank you! We\'ll get back to you within 24 hours.');
                this.reset();
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }, 2000);
        });
    }

    // Newsletter forms
    newsletterForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalContent = submitBtn.innerHTML;

            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
            submitBtn.disabled = true;

            setTimeout(() => {
                alert('Thanks for subscribing!');
                this.reset();
                submitBtn.innerHTML = originalContent;
                submitBtn.disabled = false;
            }, 1500);
        });
    });
});

console.log('✅ OCD Platform Ready!');
