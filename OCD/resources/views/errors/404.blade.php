@extends('layouts.app')

@section('title', '404 - Page Not Found')

@section('content')
<section class="error-page">
    <div class="container">
        <div class="error-content">
            <div class="error-visual">
                <svg class="error-illustration" viewBox="0 0 400 300" fill="none">
                    <!-- 404 Illustration -->
                    <circle cx="200" cy="150" r="120" stroke="url(#grad404)" stroke-width="2" opacity="0.2"/>
                    <circle cx="200" cy="150" r="90" stroke="url(#grad404)" stroke-width="2" opacity="0.4"/>
                    <circle cx="200" cy="150" r="60" fill="url(#grad404)" opacity="0.1"/>

                    <!-- 404 Text -->
                    <text x="200" y="170" text-anchor="middle" font-size="80" font-weight="700" fill="#635BFF" opacity="0.3">404</text>

                    <defs>
                        <linearGradient id="grad404" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" style="stop-color:#635BFF"/>
                            <stop offset="100%" style="stop-color:#00D4FF"/>
                        </linearGradient>
                    </defs>
                </svg>
            </div>

            <div class="error-text">
                <h1 class="error-title">Page not found</h1>
                <p class="error-description">
                    Sorry, we couldn't find the page you're looking for. The page may have been moved or doesn't exist.
                </p>

                <div class="error-actions">
                    <a href="{{ route('home') }}" class="btn-primary">
                        <i class="fas fa-home"></i>
                        Back to Home
                    </a>
                    <a href="{{ route('detection') }}" class="btn-secondary">
                        <i class="fas fa-microscope"></i>
                        Try Detection Tool
                    </a>
                </div>

                <div class="quick-links-404">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('detection') }}">AI Detection</a></li>
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.error-page {
    min-height: calc(100vh - 80px);
    display: flex;
    align-items: center;
    padding: var(--space-5xl) 0;
    background: linear-gradient(180deg, #FAFAFA 0%, #FFFFFF 100%);
}

.error-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--space-4xl);
    align-items: center;
    max-width: 1000px;
    margin: 0 auto;
}

.error-illustration {
    width: 100%;
    max-width: 400px;
    height: auto;
    margin: 0 auto;
    animation: float 3s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-20px); }
}

.error-title {
    font-size: 3.5rem;
    font-weight: 700;
    color: var(--gray-900);
    margin-bottom: var(--space-lg);
}

.error-description {
    font-size: 1.125rem;
    color: var(--gray-600);
    line-height: 1.7;
    margin-bottom: var(--space-2xl);
}

.error-actions {
    display: flex;
    gap: var(--space-md);
    margin-bottom: var(--space-3xl);
}

.quick-links-404 h3 {
    font-size: 1rem;
    font-weight: 600;
    color: var(--gray-700);
    margin-bottom: var(--space-md);
}

.quick-links-404 ul {
    list-style: none;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: var(--space-sm);
}

.quick-links-404 a {
    color: var(--stripe-purple);
    font-weight: 500;
    transition: var(--transition);
}

.quick-links-404 a:hover {
    color: var(--stripe-purple-light);
    padding-left: var(--space-xs);
}

@media (max-width: 768px) {
    .error-content {
        grid-template-columns: 1fr;
        text-align: center;
    }

    .error-actions {
        flex-direction: column;
    }

    .error-title {
        font-size: 2.5rem;
    }
}
</style>
@endpush

