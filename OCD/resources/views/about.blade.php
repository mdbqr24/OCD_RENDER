@extends('layouts.app')

@section('title', 'About OCD Platform - AI Cancer Detection')
@section('description', 'Learn about our AI-powered oral cancer detection platform. Built by medical professionals and data scientists.')

@section('content')
<!-- About Hero -->
<section class="detection-hero">
    <div class="container">
        <div class="header-content">
            <div class="header-badge">
                <i class="fas fa-info-circle"></i>
                <span>About Us</span>
            </div>
            <h1 class="header-title">Built for better<br>healthcare outcomes</h1>
            <p class="header-subtitle">
                We're combining cutting-edge AI technology with medical expertise to revolutionize oral cancer detection and save lives through early diagnosis.
            </p>
        </div>
    </div>
</section>

<!-- Mission Section -->
<section class="about-section">
    <div class="container">
        <div class="about-content">
            <div class="about-text">
                <h2>Our Mission</h2>
                <p class="lead">
                    To make early oral cancer detection accessible to everyone through advanced AI technology that empowers healthcare providers with instant, accurate diagnostic support.
                </p>
                <p>
                    Oral cancer affects over 300,000 people worldwide annually, with survival rates dramatically improving when detected early. Traditional screening methods can miss subtle early-stage changes, leading to late diagnoses when treatment is less effective.
                </p>
                <p>
                    Our platform bridges this gap by providing healthcare professionals with a powerful AI assistant that analyzes oral images with medical-grade accuracy, helping catch potential issues before they become critical.
                </p>
            </div>
            <div class="about-visual">
                <div class="medical-illustration">
                    <svg width="100%" height="100%" viewBox="0 0 400 400" fill="none">
                        <circle cx="200" cy="200" r="150" stroke="url(#grad2)" stroke-width="2" opacity="0.3"/>
                        <circle cx="200" cy="200" r="120" stroke="url(#grad2)" stroke-width="2" opacity="0.5"/>
                        <circle cx="200" cy="200" r="90" stroke="url(#grad2)" stroke-width="2" opacity="0.7"/>
                        <circle cx="200" cy="200" r="60" fill="url(#grad2)" opacity="0.2"/>
                        <defs>
                            <linearGradient id="grad2" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" style="stop-color:#635BFF;stop-opacity:1" />
                                <stop offset="100%" style="stop-color:#00D4FF;stop-opacity:1" />
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section">
    <div class="container">
        <div class="stats-wrapper">
            <div class="stat-box" data-aos="zoom-in" data-aos-delay="0">
                <div class="stat-icon">
                    <i class="fas fa-hospital"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-number">1,200+</div>
                    <div class="stat-text">Healthcare facilities using our platform</div>
                </div>
            </div>
            <div class="stat-box" data-aos="zoom-in" data-aos-delay="100">
                <div class="stat-icon">
                    <i class="fas fa-globe"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-number">45+</div>
                    <div class="stat-text">Countries worldwide</div>
                </div>
            </div>
            <div class="stat-box" data-aos="zoom-in" data-aos-delay="200">
                <div class="stat-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-number">95%+</div>
                    <div class="stat-text">Accuracy rate validated</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Technology Section -->
<section class="about-section">
    <div class="container">
        <div class="section-header">
            <h2>Advanced AI Technology</h2>
            <p>How our platform works behind the scenes</p>
        </div>

        <div class="features-grid">
            <div class="feature-card" data-aos="fade-up" data-aos-delay="0">
                <div class="feature-icon">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none">
                        <rect width="40" height="40" rx="8" fill="#635BFF" opacity="0.1"/>
                        <path d="M20 12V28M14 20H26" stroke="#635BFF" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    </div>
                <h3>Deep Learning</h3>
                <p>Our neural networks are trained on 500,000+ medical images, learning to identify patterns invisible to the human eye.</p>
                    </div>

            <div class="feature-card" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-icon">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none">
                        <rect width="40" height="40" rx="8" fill="#635BFF" opacity="0.1"/>
                        <circle cx="20" cy="20" r="6" stroke="#635BFF" stroke-width="2"/>
                    </svg>
                </div>
                <h3>Clinical Validation</h3>
                <p>Validated through peer-reviewed studies and real-world clinical trials with oncologists worldwide.</p>
            </div>

            <div class="feature-card" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-icon">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none">
                        <rect width="40" height="40" rx="8" fill="#635BFF" opacity="0.1"/>
                        <path d="M14 20L18 24L26 16" stroke="#635BFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    </div>
                <h3>Continuous Learning</h3>
                <p>Our AI improves over time as it processes more images, constantly refining its diagnostic capabilities.</p>
                    </div>

            <div class="feature-card" data-aos="fade-up" data-aos-delay="300">
                <div class="feature-icon">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none">
                        <rect width="40" height="40" rx="8" fill="#635BFF" opacity="0.1"/>
                        <path d="M20 14V26M14 20H26" stroke="#635BFF" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </div>
                <h3>HIPAA Compliant</h3>
                <p>Full compliance with healthcare regulations, ensuring patient data privacy and security at all times.</p>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="about-section" style="background: var(--gray-50);">
    <div class="container">
        <div class="section-header">
            <h2>Built by experts</h2>
            <p>Our team combines medical expertise with AI innovation</p>
        </div>

        <div class="info-grid">
            <div class="info-card" data-aos="zoom-in" data-aos-delay="0">
                <div class="card-icon primary">
                    <i class="fas fa-user-md"></i>
                </div>
                <h3>Medical Advisors</h3>
                <p>Leading oncologists and oral surgeons guide our development, ensuring clinical accuracy and real-world applicability.</p>
            </div>

            <div class="info-card" data-aos="zoom-in" data-aos-delay="100">
                <div class="card-icon success">
                    <i class="fas fa-brain"></i>
                </div>
                <h3>AI Researchers</h3>
                <p>PhDs in machine learning and computer vision from top universities develop our cutting-edge algorithms.</p>
            </div>

            <div class="info-card" data-aos="zoom-in" data-aos-delay="200">
                <div class="card-icon warning">
                    <i class="fas fa-code"></i>
                </div>
                <h3>Engineers</h3>
                <p>Experienced software engineers ensure our platform is fast, secure, and scales to serve thousands of healthcare providers.</p>
            </div>
        </div>
    </div>
</section>

<!-- Modal (Alpine.js) -->
<div x-data="{ showModal: false }"
     @open-modal.window="showModal = $event.detail.modal === 'ai-tech'"
     @keydown.escape.window="showModal = false"
     class="modal-container">
    <div x-show="showModal"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="modal-overlay"
         @click="showModal = false">
    </div>

    <div x-show="showModal"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform scale-90"
         x-transition:enter-end="opacity-100 transform scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 transform scale-100"
         x-transition:leave-end="opacity-0 transform scale-90"
         class="modal-content">
        <button @click="showModal = false" class="modal-close">
            <i class="fas fa-times"></i>
        </button>
        <div class="modal-header">
            <i class="fas fa-brain"></i>
            <h2>How Our AI Technology Works</h2>
        </div>
        <div class="modal-body">
            <div class="tech-step">
                <div class="step-badge">01</div>
                <h4>Image Preprocessing</h4>
                <p>Images are normalized, enhanced, and prepared for neural network processing using advanced computer vision techniques.</p>
            </div>
            <div class="tech-step">
                <div class="step-badge">02</div>
                <h4>Feature Extraction</h4>
                <p>Our CNN model extracts thousands of features from the image, identifying patterns invisible to the human eye.</p>
            </div>
            <div class="tech-step">
                <div class="step-badge">03</div>
                <h4>Deep Learning Analysis</h4>
                <p>Multiple neural network layers analyze the features using models trained on 500,000+ medical images.</p>
            </div>
            <div class="tech-step">
                <div class="step-badge">04</div>
                <h4>Confidence Scoring</h4>
                <p>Results are validated through ensemble methods, providing accurate confidence scores and recommendations.</p>
            </div>
        </div>
    </div>
</div>

<!-- Impact Section -->
<section class="cta-final">
    <div class="container">
        <div class="cta-content">
            <h2>Making an impact</h2>
            <p>Our platform has helped detect early-stage oral cancer in thousands of patients, significantly improving treatment outcomes and survival rates.</p>
            <div class="cta-buttons">
                <a href="{{ route('detection') }}" class="btn btn-primary btn-large">
                    Try Detection Tool <i class="fas fa-arrow-right"></i>
                </a>
                <a href="{{ route('contact') }}" class="btn btn-secondary btn-large">
                    Partner With Us <i class="fas fa-handshake"></i>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.lead {
    font-size: 1.25rem;
    color: var(--gray-600);
    line-height: 1.8;
    margin-bottom: var(--space-2xl);
}
</style>
@endpush
