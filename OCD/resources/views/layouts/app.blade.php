<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'OCD - Oral Cancer Detection Platform')</title>
    <meta name="description" content="@yield('description', 'AI-powered oral cancer detection with 95%+ accuracy. Early detection saves lives.')">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- External Libraries -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

    <!-- Styles -->
    @if(app()->environment('production'))
        @php
            $manifestPath = public_path('build/manifest.json');
            $manifest = file_exists($manifestPath) ? json_decode(file_get_contents($manifestPath), true) : [];
            $cssPath = $manifest['resources/css/app.css']['file'] ?? null;
        @endphp
        @if($cssPath)
            <link rel="stylesheet" href="{{ asset('build/' . $cssPath) }}">
        @endif
    @else
        @vite(['resources/css/app.css'])
    @endif
    @stack('styles')
</head>
<body>
    <!-- Stripe-Style Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="{{ route('home') }}" class="nav-logo">
                <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <!-- Outer Circle with Gradient -->
                    <circle cx="18" cy="18" r="17" fill="url(#logoGradient)" stroke="url(#strokeGradient)" stroke-width="2"/>

                    <!-- AI Brain/Scan Icon -->
                    <path d="M18 8C13.5817 8 10 11.5817 10 16C10 18.5 11 20.5 12.5 22C13.5 23 14.5 23.5 15.5 24C16 24.2 16.5 24.5 16.8 24.8C17.2 25.2 17.5 25.8 17.5 26.5V27C17.5 27.5523 17.9477 28 18.5 28C19.0523 28 19.5 27.5523 19.5 27V26.5C19.5 25.8 19.8 25.2 20.2 24.8C20.5 24.5 21 24.2 21.5 24C22.5 23.5 23.5 23 24.5 22C26 20.5 27 18.5 27 16C27 11.5817 23.4183 8 19 8H18Z" fill="white" fill-opacity="0.9"/>

                    <!-- AI Scan Lines -->
                    <path d="M12 14H16M20 14H24M12 18H24" stroke="#A5B4FC" stroke-width="1.5" stroke-linecap="round"/>

                    <!-- AI Dot -->
                    <circle cx="18" cy="16" r="2" fill="#635BFF"/>

                    <defs>
                        <linearGradient id="logoGradient" x1="0" y1="0" x2="36" y2="36" gradientUnits="userSpaceOnUse">
                            <stop offset="0%" stop-color="#635BFF"/>
                            <stop offset="100%" stop-color="#0A2540"/>
                        </linearGradient>
                        <linearGradient id="strokeGradient" x1="0" y1="0" x2="36" y2="36" gradientUnits="userSpaceOnUse">
                            <stop offset="0%" stop-color="#7C73FF"/>
                            <stop offset="100%" stop-color="#635BFF"/>
                        </linearGradient>
                    </defs>
                </svg>
                <span>OCD</span>
            </a>

            <ul class="nav-menu" id="navMenu">
                <li><a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ route('detection') }}" class="nav-link {{ request()->routeIs('detection') ? 'active' : '' }}">Demo</a></li>
                <li><a href="{{ route('ai.detection') }}" class="nav-link {{ request()->routeIs('ai.detection') ? 'active' : '' }}">AI Detection</a></li>
                <li><a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>
                <li><a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
            </ul>

            <div class="nav-actions">
                <a href="{{ route('ai.detection') }}" class="btn-get-started">Get started →</a>
            </div>

            <div class="hamburger" id="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </div>
    </nav>

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-error">
            <i class="fas fa-exclamation-circle"></i>
            <span>{{ $errors->first() }}</span>
        </div>
    @endif

    <!-- Page Progress Bar -->
    <div class="page-progress-bar"></div>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Floating Action Buttons -->
    <div class="floating-actions">
        <a href="{{ route('ai.detection') }}" class="floating-cta" title="Try AI Detection">
            <i class="fas fa-microscope"></i>
            <span>Try AI</span>
        </a>
        <button class="back-to-top" id="backToTop" title="Back to Top">
            <i class="fas fa-arrow-up"></i>
        </button>
    </div>

    <!-- Stripe-Style Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <!-- Brand Section -->
                <div class="footer-section">
                    <div class="footer-logo">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                            <rect width="32" height="32" rx="8" fill="url(#gradient-footer)"/>
                            <path d="M16 8L16 24M12 16L20 16" stroke="white" stroke-width="2" stroke-linecap="round"/>
                            <defs>
                                <linearGradient id="gradient-footer" x1="0" y1="0" x2="32" y2="32">
                                    <stop stop-color="#635BFF"/>
                                    <stop offset="1" stop-color="#0A2540"/>
                                </linearGradient>
                            </defs>
                        </svg>
                        <span>OCD</span>
                    </div>
                    <p>Medical-grade AI infrastructure for early oral cancer detection.</p>
                    <div class="social-links">
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
                        <a href="#" aria-label="GitHub"><i class="fab fa-github"></i></a>
                    </div>
                </div>

                <!-- Products -->
                <div class="footer-section">
                    <h4>Products</h4>
                    <ul>
                        <li><a href="{{ route('detection') }}">AI Detection</a></li>
                        <li><a href="#features">Features</a></li>
                        <li><a href="#">Integrations</a></li>
                        <li><a href="#">API</a></li>
                    </ul>
                </div>

                <!-- Resources -->
                <div class="footer-section">
                    <h4>Resources</h4>
                    <ul>
                        <li><a href="{{ route('about') }}">About</a></li>
                        <li><a href="#">Documentation</a></li>
                        <li><a href="#">Clinical Studies</a></li>
                        <li><a href="#">Support</a></li>
                    </ul>
                </div>

                <!-- Newsletter -->
                <div class="footer-section">
                    <h4>Stay Updated</h4>
                    <p>Get the latest updates on AI medical technology.</p>
                    <form class="newsletter-form" id="footerNewsletterForm">
                        @csrf
                        <input type="email" name="email" placeholder="Your email" required>
                        <button type="submit" aria-label="Subscribe">
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </form>
                    <div class="newsletter-success" style="display: none;">
                        <i class="fas fa-check-circle"></i>
                        <span>Thanks for subscribing!</span>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} OCD Platform. All rights reserved. |
                    <a href="#" onclick="showPrivacyPolicy(); return false;">Privacy</a> |
                    <a href="#" onclick="showTermsOfService(); return false;">Terms</a> |
                    <a href="#" onclick="showCookiePolicy(); return false;">Cookies</a>
                </p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    @if(app()->environment('production'))
        @php
            $jsPath = $manifest['resources/js/app.js']['file'] ?? null;
        @endphp
        @if($jsPath)
            <script type="module" src="{{ asset('build/' . $jsPath) }}"></script>
        @endif
    @else
        @vite(['resources/js/app.js'])
    @endif

    <!-- External Libraries -->
    <!-- Alpine Plugins -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>

    <!-- Alpine Core -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script type="module" src="https://unpkg.com/img-comparison-slider@8/dist/index.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/img-comparison-slider@8/dist/styles.css">

    <!-- Initialize Libraries -->
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            easing: 'ease-out',
            once: true,
            offset: 100
        });

        // Initialize Notyf (Global Toast Notifications)
        window.notyf = new Notyf({
            duration: 4000,
            position: { x: 'right', y: 'top' },
            types: [
                {
                    type: 'success',
                    background: '#00D924',
                    icon: {
                        className: 'fas fa-check-circle',
                        tagName: 'i',
                        color: 'white'
                    }
                },
                {
                    type: 'error',
                    background: '#EF4444',
                    icon: {
                        className: 'fas fa-exclamation-circle',
                        tagName: 'i',
                        color: 'white'
                    }
                }
            ]
        });

        // Footer Newsletter Handling
        const footerNewsletter = document.getElementById('footerNewsletterForm');
        if (footerNewsletter) {
            footerNewsletter.addEventListener('submit', function(e) {
                e.preventDefault();
                const email = this.querySelector('input[type="email"]').value;
                const submitBtn = this.querySelector('button');
                const successMsg = this.parentElement.querySelector('.newsletter-success');

                if (email) {
                    // Show loading
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';

                    setTimeout(() => {
                        // Hide form, show success
                        this.style.display = 'none';
                        if (successMsg) {
                            successMsg.style.display = 'flex';
                        }
                        window.notyf.success('Successfully subscribed to newsletter!');
                    }, 1000);
                }
            });
        }

        // Privacy Policy Modal
        window.showPrivacyPolicy = function() {
            Swal.fire({
                title: 'Privacy Policy',
                html: `
                    <div style="text-align: left; max-height: 400px; overflow-y: auto; padding: 1rem;">
                        <h3 style="color: #635BFF; margin-bottom: 1rem;">Data Protection & Privacy</h3>
                        <p style="margin-bottom: 1rem;">Your privacy is our top priority. This policy outlines how we handle your data.</p>

                        <h4 style="color: #2D3748; margin-top: 1rem; margin-bottom: 0.5rem;">Information We Collect</h4>
                        <p>We collect only the medical images you upload for analysis. No personal identifying information is required.</p>

                        <h4 style="color: #2D3748; margin-top: 1rem; margin-bottom: 0.5rem;">How We Use Your Data</h4>
                        <p>Images are processed using our AI model and automatically deleted after 24 hours. We do not store or share your data.</p>

                        <h4 style="color: #2D3748; margin-top: 1rem; margin-bottom: 0.5rem;">HIPAA Compliance</h4>
                        <p>Our platform is fully HIPAA compliant with enterprise-grade encryption and security measures.</p>

                        <p style="margin-top: 1rem; font-size: 0.875rem; color: #718096;">Last updated: {{ date('F Y') }}</p>
                    </div>
                `,
                width: '600px',
                confirmButtonColor: '#635BFF',
                confirmButtonText: 'Close'
            });
        };

        // Terms of Service Modal
        window.showTermsOfService = function() {
            Swal.fire({
                title: 'Terms of Service',
                html: `
                    <div style="text-align: left; max-height: 400px; overflow-y: auto; padding: 1rem;">
                        <h3 style="color: #635BFF; margin-bottom: 1rem;">Platform Usage Terms</h3>

                        <h4 style="color: #2D3748; margin-top: 1rem; margin-bottom: 0.5rem;">Acceptance of Terms</h4>
                        <p>By using OCD Platform, you agree to these terms and conditions.</p>

                        <h4 style="color: #2D3748; margin-top: 1rem; margin-bottom: 0.5rem;">Medical Disclaimer</h4>
                        <p><strong>This tool is for screening purposes only.</strong> Results should not be used as a substitute for professional medical diagnosis. Always consult with a qualified healthcare provider.</p>

                        <h4 style="color: #2D3748; margin-top: 1rem; margin-bottom: 0.5rem;">Service Availability</h4>
                        <p>We strive for 99.9% uptime but cannot guarantee uninterrupted service. The platform is provided "as is".</p>

                        <h4 style="color: #2D3748; margin-top: 1rem; margin-bottom: 0.5rem;">Intellectual Property</h4>
                        <p>All AI models, algorithms, and platform designs are proprietary to OCD Platform.</p>

                        <p style="margin-top: 1rem; font-size: 0.875rem; color: #718096;">Last updated: {{ date('F Y') }}</p>
                    </div>
                `,
                width: '600px',
                confirmButtonColor: '#635BFF',
                confirmButtonText: 'Close'
            });
        };

        // Cookie Policy Modal
        window.showCookiePolicy = function() {
            Swal.fire({
                title: 'Cookie Policy',
                html: `
                    <div style="text-align: left; max-height: 400px; overflow-y: auto; padding: 1rem;">
                        <h3 style="color: #635BFF; margin-bottom: 1rem;">How We Use Cookies</h3>

                        <h4 style="color: #2D3748; margin-top: 1rem; margin-bottom: 0.5rem;">Essential Cookies</h4>
                        <p>We use essential cookies to maintain your session and ensure platform functionality.</p>

                        <h4 style="color: #2D3748; margin-top: 1rem; margin-bottom: 0.5rem;">Analytics Cookies</h4>
                        <p>Anonymous usage data helps us improve the platform. No personal information is collected.</p>

                        <h4 style="color: #2D3748; margin-top: 1rem; margin-bottom: 0.5rem;">Your Control</h4>
                        <p>You can disable cookies in your browser settings, though some features may not work properly.</p>

                        <p style="margin-top: 1rem; font-size: 0.875rem; color: #718096;">Last updated: {{ date('F Y') }}</p>
                    </div>
                `,
                width: '600px',
                confirmButtonColor: '#635BFF',
                confirmButtonText: 'Accept & Close'
            });
        };
    </script>

    @stack('scripts')
</body>
</html>
