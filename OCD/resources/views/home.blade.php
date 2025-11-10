@extends('layouts.app')

@section('title', 'OCD - Oral Cancer Detection Platform')
@section('description', 'AI-powered oral cancer detection with 95%+ accuracy. Early detection saves lives.')

@section('content')
<!-- Hero Section - Stripe Style -->
<section class="hero">
    <div class="hero-background">
        <div class="hero-grid"></div>
    </div>
    <div class="container">
    <div class="hero-content">
            <div class="hero-badge">
                <span class="badge-dot"></span>
                AI-Powered Diagnostic Platform
            </div>
            <h1 class="hero-title">
                Financial infrastructure<br>
                <span class="gradient-text">to detect oral cancer</span>
            </h1>
            <p class="hero-subtitle">
                Join thousands of healthcare providers using our AI-powered platform to detect oral cancer early.
                Get instant, reliable results with 95%+ accuracy in minutes, not weeks.
            </p>
            <div class="hero-cta">
                <a href="{{ route('detection') }}" class="btn-primary">
                    Start detection
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
                    <div class="metric-value">50K+</div>
                    <div class="metric-label">Images analyzed</div>
                </div>
                <div class="metric">
                    <div class="metric-value">&lt;2min</div>
                    <div class="metric-label">Average analysis time</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="features-section">
    <div class="container">
        <div class="section-header">
            <h2>A fully integrated suite of<br>diagnostic and AI products</h2>
            <p>Use OCD to handle all of your diagnostic needs, manage patient workflows, and deliver faster, more accurate results.</p>
                        </div>
            <div class="features-grid" id="features">
                <div class="feature-card" data-aos="fade-up" data-aos-delay="0">
                    <div class="feature-icon">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none">
                            <rect width="40" height="40" rx="8" fill="#635BFF" opacity="0.1"/>
                            <path d="M20 12V28M14 20H26" stroke="#635BFF" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <h3>AI Detection</h3>
                    <p>Advanced neural networks trained on thousands of medical images for unparalleled accuracy.</p>
                    <a href="{{ route('detection') }}" class="feature-link">
                        Start detecting
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none">
                            <path d="M2 6H10M10 6L6 2M10 6L6 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                    </a>
                        </div>
            <div class="feature-card" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-icon">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none">
                        <rect width="40" height="40" rx="8" fill="#635BFF" opacity="0.1"/>
                        <circle cx="20" cy="20" r="6" stroke="#635BFF" stroke-width="2"/>
                        <circle cx="20" cy="20" r="2" fill="#635BFF"/>
                    </svg>
                </div>
                <h3>Instant Analysis</h3>
                <p>Get comprehensive results in under 2 minutes with detailed confidence scores and recommendations.</p>
                <a href="#" class="feature-link">
                    View results
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none">
                        <path d="M2 6H10M10 6L6 2M10 6L6 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </a>
            </div>
            <div class="feature-card" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-icon">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none">
                        <rect width="40" height="40" rx="8" fill="#635BFF" opacity="0.1"/>
                        <path d="M14 20L18 24L26 16" stroke="#635BFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                        </div>
                <h3>Privacy First</h3>
                <p>Enterprise-grade encryption and HIPAA-compliant processing ensures your data stays secure.</p>
                <a href="#" class="feature-link">
                    Learn about security
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none">
                        <path d="M2 6H10M10 6L6 2M10 6L6 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </a>
                    </div>
            <div class="feature-card" data-aos="fade-up" data-aos-delay="300">
                <div class="feature-icon">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none">
                        <rect width="40" height="40" rx="8" fill="#635BFF" opacity="0.1"/>
                        <path d="M20 14V26M14 20H26" stroke="#635BFF" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </div>
                <h3>Clinical Validation</h3>
                <p>Developed with leading oncologists and validated through extensive clinical trials.</p>
                <a href="{{ route('about') }}" class="feature-link">
                    Read research
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none">
                        <path d="M2 6H10M10 6L6 2M10 6L6 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section with ApexCharts -->
<section class="stats-section">
    <div class="container">
        <div class="stats-dashboard">
            <div class="stats-header" data-aos="fade-up">
                <h2>Platform Performance</h2>
                <p>Real-time statistics and accuracy metrics</p>
            </div>

            <div class="stats-grid-enhanced">
                <div class="stat-card" data-aos="fade-up" data-aos-delay="0">
                    <div class="stat-card-header">
                        <i class="fas fa-hospital"></i>
                        <span>Healthcare Facilities</span>
            </div>
                    <div class="stat-number-large">1,200+</div>
                    <div class="stat-trend">
                        <i class="fas fa-arrow-up"></i>
                        <span>+12% this month</span>
            </div>
            </div>

                <div class="stat-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="stat-card-header">
                        <i class="fas fa-globe"></i>
                        <span>Countries Worldwide</span>
            </div>
                    <div class="stat-number-large">45+</div>
                    <div class="stat-trend">
                        <i class="fas fa-arrow-up"></i>
                        <span>Expanding globally</span>
            </div>
        </div>

                <div class="stat-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="stat-card-header">
                        <i class="fas fa-users"></i>
                        <span>Lives Impacted</span>
    </div>
                    <div class="stat-number-large">500K+</div>
                    <div class="stat-trend">
                        <i class="fas fa-arrow-up"></i>
                        <span>Growing daily</span>
        </div>
                </div>
            </div>

            <!-- ApexCharts Visualization -->
            <div class="charts-row">
                <div class="chart-card" data-aos="fade-up" data-aos-delay="300">
                    <h3>Detection Accuracy</h3>
                    <div id="accuracyChart"></div>
                </div>
                <div class="chart-card" data-aos="fade-up" data-aos-delay="400">
                    <h3>Monthly Analyses</h3>
                    <div id="analysesChart"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="about-section">
    <div class="container">
        <div class="about-content">
            <div class="about-text">
                <h2>Built for healthcare<br>providers worldwide</h2>
                <p>
                    Oral cancer is one of the most common cancers worldwide, with over 300,000 new cases diagnosed annually.
                    Early detection is crucial for successful treatment and improved patient outcomes.
                </p>
                <p>
                    Our AI-powered detection system uses state-of-the-art machine learning algorithms to analyze oral images
                    and identify potential signs of cancer at its earliest stages. This technology helps healthcare
                    professionals make faster, more accurate diagnoses—saving lives.
                </p>
                <div class="about-features">
                    <div class="about-feature">
                        <i class="fas fa-brain"></i>
                        <div>
                            <h4>Advanced AI Technology</h4>
                            <p>Deep learning models trained on 500,000+ medical images for unparalleled accuracy</p>
            </div>
        </div>
                    <div class="about-feature">
                        <i class="fas fa-user-md"></i>
                        <div>
                            <h4>Clinical Validation</h4>
                            <p>Developed with leading oncologists and validated through extensive clinical trials</p>
                </div>
            </div>
                    <div class="about-feature">
                        <i class="fas fa-shield-alt"></i>
                        <div>
                            <h4>HIPAA Compliant</h4>
                            <p>Enterprise-grade security with full regulatory compliance and data protection</p>
                </div>
            </div>
                </div>
            </div>
            <div class="about-visual">
                <div class="medical-illustration">
                    <svg width="100%" height="100%" viewBox="0 0 400 400" fill="none">
                        <circle cx="200" cy="200" r="150" stroke="url(#grad1)" stroke-width="2" opacity="0.3"/>
                        <circle cx="200" cy="200" r="120" stroke="url(#grad1)" stroke-width="2" opacity="0.5"/>
                        <circle cx="200" cy="200" r="90" stroke="url(#grad1)" stroke-width="2" opacity="0.7"/>
                        <circle cx="200" cy="200" r="60" fill="url(#grad1)" opacity="0.2"/>
                        <defs>
                            <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="100%">
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

<!-- CTA Section -->
<section class="cta-final">
    <div class="container">
        <div class="cta-content">
            <h2>Ready to get started?</h2>
            <p>Join thousands of healthcare providers using our AI-powered detection platform</p>
            <div class="cta-buttons">
                <a href="{{ route('detection') }}" class="btn btn-primary btn-large">
                    Start detection <i class="fas fa-arrow-right"></i>
                </a>
                <a href="{{ route('contact') }}" class="btn btn-secondary btn-large">
                    Contact us <i class="fas fa-envelope"></i>
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

.stats-section {
    padding: var(--space-5xl) 0;
    background: var(--gray-900);
    color: var(--white);
}

.stats-wrapper {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: var(--space-4xl);
}

.stat-box {
    display: flex;
    align-items: center;
    gap: var(--space-xl);
}

.stat-icon {
    width: 64px;
    height: 64px;
    background: rgba(99, 91, 255, 0.2);
    border-radius: var(--radius-xl);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.75rem;
    color: var(--stripe-purple-light);
    flex-shrink: 0;
    transition: var(--transition);
}

.stat-content {
    flex: 1;
}

.stat-number {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--white);
    line-height: 1;
    margin-bottom: var(--space-sm);
}

.stat-text {
    font-size: 1rem;
    color: var(--gray-400);
}

.features-section {
    padding: var(--space-5xl) 0;
    background: var(--white);
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: var(--space-xl);
}

.feature-card {
    padding: var(--space-2xl);
    background: var(--white);
    border: 1px solid var(--gray-200);
    border-radius: var(--radius-xl);
    transition: var(--transition);
}

.feature-card:hover {
    border-color: var(--stripe-purple);
    box-shadow: 0 8px 24px rgba(99, 91, 255, 0.1);
    transform: translateY(-4px);
}

.feature-icon {
    margin-bottom: var(--space-lg);
}

.feature-card h3 {
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--gray-900);
    margin-bottom: var(--space-md);
}

.feature-card p {
    font-size: 1rem;
    color: var(--gray-600);
    line-height: 1.7;
    margin-bottom: var(--space-lg);
}

.feature-link {
    display: inline-flex;
    align-items: center;
    gap: var(--space-sm);
    font-size: 0.9375rem;
    font-weight: 600;
    color: var(--stripe-purple);
    transition: var(--transition);
}

.feature-link:hover {
    gap: var(--space-md);
}

@media (max-width: 1024px) {
    .stats-wrapper {
        grid-template-columns: 1fr;
        gap: var(--space-2xl);
    }
}

@media (max-width: 768px) {
    .features-grid {
        grid-template-columns: 1fr;
    }

    .hero-metrics {
        flex-direction: column;
        gap: var(--space-xl);
    }

    .stat-box {
        flex-direction: column;
        text-align: center;
        gap: var(--space-md);
    }
}

/* ApexCharts Stats Dashboard */
.stats-dashboard {
    max-width: 1200px;
    margin: 0 auto;
}

.stats-header {
    text-align: center;
    margin-bottom: var(--space-3xl);
}

.stats-header h2 {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--white);
    margin-bottom: var(--space-sm);
}

.stats-header p {
    color: var(--gray-400);
    font-size: 1.125rem;
}

.stats-grid-enhanced {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: var(--space-xl);
    margin-bottom: var(--space-3xl);
}

.stat-card {
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(10px);
    padding: var(--space-2xl);
    border-radius: var(--radius-xl);
    border: 1px solid rgba(255, 255, 255, 0.1);
    transition: var(--transition);
}

.stat-card:hover {
    background: rgba(255, 255, 255, 0.08);
    transform: translateY(-4px);
}

.stat-card-header {
    display: flex;
    align-items: center;
    gap: var(--space-sm);
    margin-bottom: var(--space-lg);
    color: var(--gray-400);
    font-size: 0.9375rem;
}

.stat-card-header i {
    font-size: 1.25rem;
    color: var(--stripe-purple-light);
}

.stat-number-large {
    font-size: 3rem;
    font-weight: 700;
    color: var(--white);
    line-height: 1;
    margin-bottom: var(--space-md);
}

.stat-trend {
    display: flex;
    align-items: center;
    gap: var(--space-xs);
    color: var(--stripe-green);
    font-size: 0.875rem;
    font-weight: 600;
}

.stat-trend i {
    font-size: 0.875rem;
}

.charts-row {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: var(--space-xl);
}

.chart-card {
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(10px);
    padding: var(--space-2xl);
    border-radius: var(--radius-xl);
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.chart-card h3 {
    font-size: 1.25rem;
    font-weight: 600;
    color: var(--white);
    margin-bottom: var(--space-lg);
}

@media (max-width: 768px) {
    .stats-grid-enhanced,
    .charts-row {
        grid-template-columns: 1fr;
    }
}
</style>
@endpush

@push('scripts')
<script>
// Initialize ApexCharts
document.addEventListener('DOMContentLoaded', function() {
    // Accuracy Chart (Radial Bar)
    const accuracyOptions = {
        series: [95.3],
        chart: {
            type: 'radialBar',
            height: 280,
            fontFamily: 'Inter, sans-serif'
        },
        plotOptions: {
            radialBar: {
                hollow: {
                    size: '65%',
                },
                dataLabels: {
                    name: {
                        fontSize: '16px',
                        color: '#fff',
                        offsetY: -10
                    },
                    value: {
                        fontSize: '40px',
                        fontWeight: 700,
                        color: '#fff',
                        formatter: function(val) {
                            return val + '%';
                        }
                    }
                },
                track: {
                    background: 'rgba(255, 255, 255, 0.1)',
                }
            }
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'dark',
                type: 'horizontal',
                shadeIntensity: 0.5,
                gradientToColors: ['#00D4FF'],
                inverseColors: false,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 100]
            }
        },
        colors: ['#635BFF'],
        labels: ['Accuracy Rate'],
    };

    const accuracyChart = new ApexCharts(document.querySelector("#accuracyChart"), accuracyOptions);
    accuracyChart.render();

    // Monthly Analyses Chart (Area)
    const analysesOptions = {
        series: [{
            name: 'Analyses',
            data: [1200, 1850, 2400, 3200, 4100, 5200]
        }],
        chart: {
            type: 'area',
            height: 280,
            fontFamily: 'Inter, sans-serif',
            toolbar: {
                show: false
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth',
            width: 3
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'dark',
                type: 'vertical',
                shadeIntensity: 0.5,
                gradientToColors: ['#00D4FF'],
                opacityFrom: 0.7,
                opacityTo: 0.1,
            }
        },
        colors: ['#635BFF'],
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            labels: {
                style: {
                    colors: '#A0AEC0'
                }
            }
        },
        yaxis: {
            labels: {
                style: {
                    colors: '#A0AEC0'
                },
                formatter: function(val) {
                    return val.toLocaleString();
                }
            }
        },
        grid: {
            borderColor: 'rgba(255, 255, 255, 0.1)',
            strokeDashArray: 4
        },
        tooltip: {
            theme: 'dark',
            y: {
                formatter: function(val) {
                    return val.toLocaleString() + ' analyses';
                }
            }
        }
    };

    const analysesChart = new ApexCharts(document.querySelector("#analysesChart"), analysesOptions);
    analysesChart.render();
});
</script>
@endpush
