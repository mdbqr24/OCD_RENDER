@extends('layouts.app')

@section('title', 'Welcome to OCD Platform')
@section('description', 'AI-powered oral cancer detection platform. Get started with instant, accurate diagnostic support.')

@section('content')
<!-- Welcome Hero -->
<section class="hero">
    <div class="hero-background">
        <div class="hero-grid"></div>
    </div>
    <div class="container">
        <div class="hero-content">
            <div class="hero-badge">
                <span class="badge-dot"></span>
                Welcome to OCD Platform
            </div>
            <h1 class="hero-title">
                The future of<br>
                <span class="gradient-text">oral cancer detection</span>
            </h1>
            <p class="hero-subtitle">
                Experience the power of AI-driven diagnostics. Our platform helps healthcare providers detect oral cancer early with 95%+ accuracy, transforming patient outcomes worldwide.
            </p>
            <div class="hero-cta">
                <a href="{{ route('detection') }}" class="btn-primary">
                    Get started
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <path d="M3 8H13M13 8L8 3M13 8L8 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                <a href="{{ route('about') }}" class="btn-secondary">
                    Learn more
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <path d="M3 8H13M13 8L8 3M13 8L8 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
            </div>
            <div class="hero-metrics">
                <div class="metric">
                    <div class="metric-value">95%</div>
                    <div class="metric-label">Accuracy rate</div>
                </div>
                <div class="metric">
                    <div class="metric-value">1,200+</div>
                    <div class="metric-label">Healthcare facilities</div>
                </div>
                <div class="metric">
                    <div class="metric-value">24/7</div>
                    <div class="metric-label">Availability</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quick Links -->
<section class="about-section">
    <div class="container">
        <div class="section-header">
            <h2>What would you like to do?</h2>
            <p>Choose an option to get started with our platform</p>
        </div>

        <div class="features-grid">
            <a href="{{ route('detection') }}" class="feature-card" style="text-decoration: none;">
                <div class="feature-icon">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none">
                        <rect width="40" height="40" rx="8" fill="#635BFF" opacity="0.1"/>
                        <path d="M20 12V28M14 20H26" stroke="#635BFF" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </div>
                <h3>Try Detection Tool</h3>
                <p>Upload an oral image and get instant AI-powered analysis with detailed results and recommendations.</p>
                <span class="feature-link">
                    Start now
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none">
                        <path d="M2 6H10M10 6L6 2M10 6L6 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </span>
            </a>

            <a href="{{ route('about') }}" class="feature-card" style="text-decoration: none;">
                <div class="feature-icon">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none">
                        <rect width="40" height="40" rx="8" fill="#635BFF" opacity="0.1"/>
                        <circle cx="20" cy="20" r="8" stroke="#635BFF" stroke-width="2"/>
                        <circle cx="20" cy="20" r="2" fill="#635BFF"/>
                    </svg>
                </div>
                <h3>Learn About Us</h3>
                <p>Discover how our AI technology works and learn about our mission to improve healthcare outcomes.</p>
                <span class="feature-link">
                    Read more
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none">
                        <path d="M2 6H10M10 6L6 2M10 6L6 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </span>
            </a>

            <a href="{{ route('contact') }}" class="feature-card" style="text-decoration: none;">
                <div class="feature-icon">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none">
                        <rect width="40" height="40" rx="8" fill="#635BFF" opacity="0.1"/>
                        <path d="M12 14L20 20L28 14M12 14V26H28V14" stroke="#635BFF" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </div>
                <h3>Contact Us</h3>
                <p>Have questions or want to partner with us? Get in touch with our team and we'll respond within 24 hours.</p>
                <span class="feature-link">
                    Get in touch
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none">
                        <path d="M2 6H10M10 6L6 2M10 6L6 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </span>
            </a>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta-final">
    <div class="container">
        <div class="cta-content">
            <h2>Ready to experience the future?</h2>
            <p>Join thousands of healthcare providers using our AI-powered detection platform</p>
            <div class="cta-buttons">
                <a href="{{ route('detection') }}" class="btn btn-primary btn-large">
                    Start detection <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.hero {
    position: relative;
    min-height: 100vh;
    display: flex;
    align-items: center;
    padding-top: 80px;
    overflow: hidden;
}

.hero-background {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(180deg, #FAFAFA 0%, #FFFFFF 100%);
    z-index: 0;
}

.hero-grid {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image:
        linear-gradient(rgba(99, 91, 255, 0.03) 1px, transparent 1px),
        linear-gradient(90deg, rgba(99, 91, 255, 0.03) 1px, transparent 1px);
    background-size: 60px 60px;
    opacity: 0.5;
}

.hero .container {
    position: relative;
    z-index: 1;
}

.hero-content {
    max-width: 800px;
    text-align: center;
    margin: 0 auto;
    padding: var(--space-5xl) 0;
}

.badge-dot {
    width: 6px;
    height: 6px;
    background: var(--stripe-purple);
    border-radius: 50%;
    animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}

@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.5; }
}

.hero-title {
    font-size: clamp(2.5rem, 6vw, 5rem);
    font-weight: 700;
    line-height: 1.1;
    letter-spacing: -0.03em;
    color: var(--gray-900);
    margin-bottom: var(--space-xl);
}

.gradient-text {
    background: linear-gradient(135deg, var(--stripe-purple) 0%, var(--stripe-blue) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.hero-metrics {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: var(--space-4xl);
    padding-top: var(--space-2xl);
    border-top: 1px solid var(--gray-200);
}

.metric {
    text-align: center;
}

.metric-value {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--gray-900);
    line-height: 1;
    margin-bottom: var(--space-sm);
}

.metric-label {
    font-size: 0.875rem;
    color: var(--gray-600);
    text-transform: lowercase;
}

@media (max-width: 768px) {
    .hero-metrics {
        flex-direction: column;
        gap: var(--space-xl);
    }
}
</style>
@endpush
