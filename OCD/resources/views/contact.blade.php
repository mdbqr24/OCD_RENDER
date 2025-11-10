@extends('layouts.app')

@section('title', 'Contact Us - OCD Platform')
@section('description', 'Get in touch with our team. We\'re here to answer your questions about AI-powered oral cancer detection.')

@section('content')
<!-- Contact Hero -->
<section class="detection-hero">
    <div class="container">
        <div class="header-content">
            <div class="header-badge">
                <i class="fas fa-envelope"></i>
                <span>Contact Us</span>
            </div>
            <h1 class="header-title">Let's talk</h1>
            <p class="header-subtitle">
                Have questions about our platform? Want to partner with us? We're here to help. Reach out and we'll get back to you within 24 hours.
            </p>
        </div>
    </div>
</section>

<!-- Contact Methods -->
<section class="about-section">
    <div class="container">
        <div class="contact-content">
            <!-- Contact Info -->
            <div class="contact-info">
                <div class="info-card">
                    <div class="card-icon primary">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3>Email</h3>
                    <p>For general inquiries</p>
                    <a href="mailto:info@ocdplatform.com" style="color: var(--stripe-purple); font-weight: 600;">info@ocdplatform.com</a>
                    <div class="response-time">
                        <i class="fas fa-clock"></i>
                        <span>24-hour response time</span>
                    </div>
                </div>

                <div class="info-card">
                    <div class="card-icon success">
                        <i class="fas fa-phone"></i>
                    </div>
                    <h3>Phone</h3>
                    <p>Mon-Fri, 9am-6pm EST</p>
                    <a href="tel:+15551234567" style="color: var(--stripe-purple); font-weight: 600;">+1 (555) 123-4567</a>
                    <div class="office-status">
                        <span class="status-indicator open"></span>
                        <span class="status-text" id="officeStatus">Currently Open</span>
                    </div>
                </div>

                <div class="info-card">
                    <div class="card-icon warning">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h3>Office</h3>
                    <p>Visit our headquarters</p>
                    <p style="font-weight: 600; color: var(--gray-900);">123 Medical Plaza<br>San Francisco, CA 94102</p>
                    <a href="#" style="color: var(--stripe-purple); font-weight: 600; font-size: 0.9375rem; margin-top: var(--space-sm); display: inline-block;">
                        Get directions →
                    </a>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="contact-form-wrapper">
                <div class="form-card">
                    <h2>Send us a message</h2>
                    <p style="color: var(--gray-600); margin-bottom: var(--space-2xl);">Fill out the form below and we'll get back to you as soon as possible.</p>

                    <form class="contact-form" action="#" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">Full Name *</label>
                                <input type="text" id="name" name="name" required placeholder="John Doe">
                            </div>
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input type="email" id="email" name="email" required placeholder="john@example.com">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="tel" id="phone" name="phone" placeholder="+1 (555) 123-4567">
                            </div>
                            <div class="form-group">
                                <label for="subject">Subject *</label>
                                <select id="subject" name="subject" required>
                                    <option value="">Select a subject</option>
                                    <option value="general">General Inquiry</option>
                                    <option value="partnership">Partnership</option>
                                    <option value="support">Technical Support</option>
                                    <option value="demo">Request Demo</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="message">Message *</label>
                            <textarea id="message" name="message" rows="6" required placeholder="Tell us how we can help..."></textarea>
                        </div>

                        <div class="checkbox-group">
                            <label class="checkbox-label">
                                <input type="checkbox" name="newsletter">
                                <span>Send me updates about new features and research</span>
                            </label>
                        </div>

                        <button type="submit" class="submit-button">
                            <i class="fas fa-paper-plane"></i>
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section with Alpine.js Accordion -->
<section class="about-section" style="background: var(--gray-50);">
    <div class="container">
        <div class="section-header">
            <h2>Frequently Asked Questions</h2>
            <p>Quick answers to common questions about our platform</p>
        </div>

        <div class="faq-accordion" x-data="{ activeId: null }">
            <div class="faq-item" data-aos="fade-up" data-aos-delay="0">
                <button class="faq-question"
                        @click="activeId = activeId === 1 ? null : 1"
                        :class="{ 'active': activeId === 1 }">
                    <span>How accurate is the AI detection?</span>
                    <i class="fas fa-chevron-down"
                       :class="{ 'rotate': activeId === 1 }"
                       :style="activeId === 1 && 'transform: rotate(180deg)'"></i>
                </button>
                <div class="faq-answer" x-show="activeId === 1" x-collapse.duration.500ms>
                    <div>
                        <p>Our AI has been validated with 95%+ accuracy across diverse patient populations and has been peer-reviewed in leading medical journals. The model has been trained on over 500,000 medical images and continuously improves with each analysis.</p>
                    </div>
                </div>
            </div>

            <div class="faq-item" data-aos="fade-up" data-aos-delay="100">
                <button class="faq-question"
                        @click="activeId = activeId === 2 ? null : 2"
                        :class="{ 'active': activeId === 2 }">
                    <span>Is my data secure?</span>
                    <i class="fas fa-chevron-down"
                       :class="{ 'rotate': activeId === 2 }"
                       :style="activeId === 2 && 'transform: rotate(180deg)'"></i>
                </button>
                <div class="faq-answer" x-show="activeId === 2" x-collapse.duration.500ms>
                    <div>
                        <p>Yes. We use enterprise-grade encryption and are fully HIPAA compliant. Images are processed securely with end-to-end encryption and are not stored permanently. All data is automatically deleted after 24 hours.</p>
                    </div>
                </div>
            </div>

            <div class="faq-item" data-aos="fade-up" data-aos-delay="200">
                <button class="faq-question"
                        @click="activeId = activeId === 3 ? null : 3"
                        :class="{ 'active': activeId === 3 }">
                    <span>Can this replace a doctor?</span>
                    <i class="fas fa-chevron-down"
                       :class="{ 'rotate': activeId === 3 }"
                       :style="activeId === 3 && 'transform: rotate(180deg)'"></i>
                </button>
                <div class="faq-answer" x-show="activeId === 3" x-collapse.duration.500ms>
                    <div>
                        <p>No. Our tool is designed to assist healthcare professionals, not replace them. Results should always be reviewed by a qualified medical professional. This is a screening tool to help catch potential issues early.</p>
                    </div>
                </div>
            </div>

            <div class="faq-item" data-aos="fade-up" data-aos-delay="300">
                <button class="faq-question"
                        @click="activeId = activeId === 4 ? null : 4"
                        :class="{ 'active': activeId === 4 }">
                    <span>How long does analysis take?</span>
                    <i class="fas fa-chevron-down"
                       :class="{ 'rotate': activeId === 4 }"
                       :style="activeId === 4 && 'transform: rotate(180deg)'"></i>
                </button>
                <div class="faq-answer" x-show="activeId === 4" x-collapse.duration.500ms>
                    <div>
                        <p>Most analyses complete in under 2 minutes. Complex cases may take up to 5 minutes depending on image quality. The system processes images in real-time with minimal latency.</p>
                    </div>
                </div>
            </div>

            <div class="faq-item" data-aos="fade-up" data-aos-delay="400">
                <button class="faq-question"
                        @click="activeId = activeId === 5 ? null : 5"
                        :class="{ 'active': activeId === 5 }">
                    <span>What image quality is needed?</span>
                    <i class="fas fa-chevron-down"
                       :class="{ 'rotate': activeId === 5 }"
                       :style="activeId === 5 && 'transform: rotate(180deg)'"></i>
                </button>
                <div class="faq-answer" x-show="activeId === 5" x-collapse.duration.500ms>
                    <div>
                        <p>Clear, well-lit images work best. We support JPG, PNG, GIF, and BMP formats up to 10MB in size. Ensure the oral area is clearly visible and in focus for optimal results.</p>
                    </div>
                </div>
            </div>

            <div class="faq-item" data-aos="fade-up" data-aos-delay="500">
                <button class="faq-question"
                        @click="activeId = activeId === 6 ? null : 6"
                        :class="{ 'active': activeId === 6 }">
                    <span>Can I integrate with my EMR?</span>
                    <i class="fas fa-chevron-down"
                       :class="{ 'rotate': activeId === 6 }"
                       :style="activeId === 6 && 'transform: rotate(180deg)'"></i>
                </button>
                <div class="faq-answer" x-show="activeId === 6" x-collapse.duration.500ms>
                    <div>
                        <p>Yes. We offer API integrations with major EMR systems including Epic, Cerner, and Allscripts. Contact us to discuss your specific requirements and integration timeline.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-final">
    <div class="container">
        <div class="cta-content">
            <h2>Ready to get started?</h2>
            <p>Try our AI detection tool today and see the difference for yourself</p>
            <div class="cta-buttons">
                <a href="{{ route('detection') }}" class="btn btn-primary btn-large">
                    Try Detection Tool <i class="fas fa-arrow-right"></i>
                </a>
                <a href="{{ route('about') }}" class="btn btn-secondary btn-large">
                    Learn More <i class="fas fa-info-circle"></i>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.contact-content {
    display: grid;
    grid-template-columns: 1fr 1.5fr;
    gap: var(--space-4xl);
    align-items: start;
}

.contact-info {
    display: flex;
    flex-direction: column;
    gap: var(--space-xl);
}

.form-card {
    background: var(--white);
    padding: var(--space-3xl);
    border-radius: var(--radius-2xl);
    border: 1px solid var(--gray-200);
    box-shadow: var(--shadow-xl);
}

.form-card h2 {
    font-size: 1.75rem;
    margin-bottom: var(--space-md);
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--space-lg);
}

.form-group {
    margin-bottom: var(--space-lg);
}

.form-group label {
    display: block;
    font-weight: 600;
    margin-bottom: var(--space-sm);
    color: var(--gray-800);
    font-size: 0.9375rem;
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    padding: var(--space-md);
    border: 2px solid var(--gray-300);
    border-radius: var(--radius-lg);
    font-family: var(--font-family);
    font-size: 1rem;
    transition: var(--transition);
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    outline: none;
    border-color: var(--stripe-purple);
    box-shadow: 0 0 0 4px rgba(99, 91, 255, 0.1);
}

.form-group textarea {
    resize: vertical;
    min-height: 150px;
}

.checkbox-group {
    margin-bottom: var(--space-xl);
}

.checkbox-label {
    display: flex;
    align-items: flex-start;
    gap: var(--space-sm);
    cursor: pointer;
    font-size: 0.9375rem;
    color: var(--gray-700);
}

.checkbox-label input[type="checkbox"] {
    width: auto;
    margin-top: 2px;
}

.submit-button {
    width: 100%;
    padding: var(--space-lg) var(--space-2xl);
    background: var(--stripe-purple);
    color: var(--white);
    border: none;
    border-radius: var(--radius-lg);
    font-weight: 700;
    font-size: 1.125rem;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: var(--space-sm);
    transition: var(--transition);
    box-shadow: 0 4px 12px rgba(99, 91, 255, 0.3);
}

.submit-button:hover {
    background: var(--stripe-purple-light);
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(99, 91, 255, 0.4);
}

.faq-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: var(--space-xl);
}

@media (max-width: 1024px) {
    .contact-content {
        grid-template-columns: 1fr;
    }

    .form-row {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .faq-grid {
        grid-template-columns: 1fr;
    }
}
</style>
@endpush

@push('scripts')
<script>
// Real-time form validation
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('.contact-form');
    if (!form) return;

    // Email validation
    const emailInput = form.querySelector('#email');
    if (emailInput) {
        emailInput.addEventListener('blur', function() {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (this.value && !emailRegex.test(this.value)) {
                this.style.borderColor = 'var(--error)';
                showFieldError(this, 'Please enter a valid email address');
            } else {
                this.style.borderColor = 'var(--stripe-green)';
                removeFieldError(this);
            }
        });
    }

    // Character counter for textarea
    const messageField = form.querySelector('#message');
    if (messageField) {
        const counter = document.createElement('div');
        counter.className = 'char-counter';
        counter.style.cssText = 'font-size: 0.875rem; color: var(--gray-500); margin-top: var(--space-xs);';
        messageField.parentNode.appendChild(counter);

        messageField.addEventListener('input', function() {
            const count = this.value.length;
            const max = 1000;
            counter.textContent = `${count} / ${max} characters`;
            counter.style.color = count > max * 0.9 ? 'var(--warning)' : 'var(--gray-500)';
        });
    }

    // Form submission
    form.addEventListener('submit', function(e) {
        e.preventDefault();

        const submitBtn = this.querySelector('.submit-button');
        const originalText = submitBtn.innerHTML;

        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
        submitBtn.disabled = true;

        // Simulate form submission
        setTimeout(() => {
            // Success animation
            submitBtn.innerHTML = '<i class="fas fa-check-circle"></i> Message Sent!';
            submitBtn.style.background = 'var(--stripe-green)';

            setTimeout(() => {
                this.reset();
                submitBtn.innerHTML = originalText;
                submitBtn.style.background = '';
                submitBtn.disabled = false;

                // Show success toast
                showToast('Thank you! We\'ll get back to you within 24 hours.', 'success');
            }, 1500);
        }, 2000);
    });

    function showFieldError(field, message) {
        let error = field.parentNode.querySelector('.field-error');
        if (!error) {
            error = document.createElement('div');
            error.className = 'field-error';
            error.style.cssText = 'color: var(--error); font-size: 0.875rem; margin-top: var(--space-xs);';
            field.parentNode.appendChild(error);
        }
        error.textContent = message;
    }

    function removeFieldError(field) {
        const error = field.parentNode.querySelector('.field-error');
        if (error) error.remove();
    }

    function showToast(message, type = 'success') {
        const toast = document.createElement('div');
        toast.className = `toast toast-${type}`;
        toast.innerHTML = `
            <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'}"></i>
            <span>${message}</span>
        `;
        toast.style.cssText = `
            position: fixed;
            bottom: var(--space-2xl);
            left: 50%;
            transform: translateX(-50%) translateY(100px);
            padding: var(--space-lg) var(--space-xl);
            background: var(--white);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-2xl);
            display: flex;
            align-items: center;
            gap: var(--space-md);
            z-index: 10000;
            transition: transform 0.3s ease-out;
        `;

        if (type === 'success') {
            toast.style.borderLeft = '4px solid var(--stripe-green)';
        }

        document.body.appendChild(toast);

        setTimeout(() => {
            toast.style.transform = 'translateX(-50%) translateY(0)';
        }, 100);

        setTimeout(() => {
            toast.style.transform = 'translateX(-50%) translateY(100px)';
            setTimeout(() => toast.remove(), 300);
        }, 3000);
    }
});

// Office hours status
document.addEventListener('DOMContentLoaded', function() {
    const statusText = document.getElementById('officeStatus');
    const statusIndicator = document.querySelector('.status-indicator');

    if (statusText && statusIndicator) {
        const now = new Date();
        const day = now.getDay();
        const hour = now.getHours();

        // Check if Mon-Fri, 9am-6pm EST
        const isOpen = day >= 1 && day <= 5 && hour >= 9 && hour < 18;

        if (isOpen) {
            statusText.textContent = 'Currently Open';
            statusIndicator.classList.add('open');
        } else {
            statusText.textContent = 'Currently Closed';
            statusIndicator.classList.remove('open');
            statusIndicator.classList.add('closed');
        }
    }
});
</script>
@endpush
