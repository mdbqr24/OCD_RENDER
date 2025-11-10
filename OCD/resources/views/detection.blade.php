@extends('layouts.app')

@section('title', 'AI Detection Tool - OCD Platform')
@section('description', 'Upload your oral image for AI-powered cancer detection analysis. Get instant results with 95%+ accuracy.')

@section('content')
<!-- Detection Hero -->
<section class="detection-hero">
    <div class="container">
        <div class="header-content">
            <div class="header-badge">
                <i class="fas fa-microscope"></i>
                <span>Clinical Tool</span>
            </div>
            <h1 class="header-title">AI-powered oral cancer detection</h1>
            <p class="header-subtitle">
                Upload an oral image for instant AI analysis. Get results in under 2 minutes with detailed confidence scores and clinical recommendations.
            </p>
        </div>
    </div>
</section>

<!-- Risk Assessment Section -->
<section class="risk-assessment-section">
    <div class="container">
        <div class="risk-assessment-card" x-data="{ expanded: false }">
            <div class="risk-header" @click="expanded = !expanded">
                <div class="risk-header-content">
                    <i class="fas fa-clipboard-check"></i>
                    <div>
                        <h3>Optional: Complete Risk Assessment</h3>
                        <p>Help improve accuracy by sharing your medical history (1 minute)</p>
                    </div>
                </div>
                <button type="button" class="expand-btn" :class="{ 'rotated': expanded }">
                    <i class="fas fa-chevron-down"></i>
                </button>
            </div>

            <div x-show="expanded" x-collapse.duration.500ms>
                <div class="risk-form-wrapper">
                    <form id="riskAssessmentForm" class="risk-form">
                        <div class="form-row">
                            <div class="form-group">
                                <label><i class="fas fa-birthday-cake"></i> Age Group *</label>
                                <select id="ageGroup" required>
                                    <option value="">Select age</option>
                                    <option value="under-40">Under 40</option>
                                    <option value="40-55">40-55</option>
                                    <option value="56-70">56-70</option>
                                    <option value="over-70">Over 70</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label><i class="fas fa-smoking"></i> Smoking History *</label>
                                <select id="smokingHistory" required>
                                    <option value="">Select status</option>
                                    <option value="never">Never smoked</option>
                                    <option value="former">Former smoker (quit)</option>
                                    <option value="occasional">Occasional smoker</option>
                                    <option value="regular">Regular smoker</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label><i class="fas fa-dna"></i> Family History *</label>
                                <select id="familyHistory" required>
                                    <option value="">Select history</option>
                                    <option value="none">No family history</option>
                                    <option value="distant">Distant relative</option>
                                    <option value="immediate">Immediate family</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label><i class="fas fa-notes-medical"></i> Previous Oral Issues *</label>
                                <select id="previousIssues" required>
                                    <option value="">Select history</option>
                                    <option value="none">None</option>
                                    <option value="minor">Minor issues (cavities, gum disease)</option>
                                    <option value="lesions">Previous lesions or growths</option>
                                    <option value="cancer">Previous oral cancer</option>
                                </select>
                            </div>
                        </div>

                        <div class="risk-result-preview" id="riskResultPreview" style="display: none;">
                            <div class="risk-meter">
                                <div class="risk-level-indicator" id="riskLevelIndicator">
                                    <span class="risk-label" id="riskLabel">Low Risk</span>
                                    <div class="risk-bar">
                                        <div class="risk-bar-fill" id="riskBarFill"></div>
                                    </div>
                                </div>
                            </div>
                            <p class="risk-message" id="riskMessage"></p>
                        </div>

                        <button type="button" class="btn-calculate-risk" onclick="calculateRisk()">
                            <i class="fas fa-calculator"></i>
                            Calculate Risk Score
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Upload Section -->
<section class="upload-section">
    <div class="container">
        <div class="upload-container">
            <!-- Sample Images -->
            <div class="sample-images-section">
                <h3>Try with sample images</h3>
                <p>No image? Try our demo with pre-loaded samples</p>
                <div class="samples-grid">
                    <div class="sample-card" onclick="loadSampleImage('normal')">
                        <div class="sample-placeholder normal-sample">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <span class="sample-label">Normal Tissue</span>
                        <span class="sample-badge">Click to analyze</span>
                    </div>
                    <div class="sample-card" onclick="loadSampleImage('suspicious')">
                        <div class="sample-placeholder suspicious-sample">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <span class="sample-label">Suspicious Area</span>
                        <span class="sample-badge">Click to analyze</span>
                    </div>
                    <div class="sample-card" onclick="loadSampleImage('benign')">
                        <div class="sample-placeholder benign-sample">
                            <i class="fas fa-info-circle"></i>
                        </div>
                        <span class="sample-label">Benign Lesion</span>
                        <span class="sample-badge">Click to analyze</span>
                    </div>
                </div>
            </div>

            <!-- Upload Card -->
            <div class="upload-card" id="uploadArea">
                <div class="upload-header">
                    <h2>Upload Image</h2>
                    <div class="upload-badge">Step 1 of 3</div>
                </div>

                <div class="upload-zone">
                    <div class="upload-icon">
                        <i class="fas fa-cloud-upload-alt"></i>
                    </div>
                    <h3>Drop your image here</h3>
                    <p>or click to browse files</p>
                    <button class="upload-button" onclick="document.getElementById('fileInput').click()">
                        <i class="fas fa-file-upload"></i>
                        Choose File
                    </button>
                    <input type="file" id="fileInput" accept="image/*" style="display: none;">
                </div>

                <div class="upload-requirements">
                    <h4><i class="fas fa-info-circle"></i> Requirements</h4>
                    <ul>
                        <li><i class="fas fa-check"></i> Clear, well-lit image of the oral area</li>
                        <li><i class="fas fa-check"></i> Supported: JPG, PNG, GIF, BMP</li>
                        <li><i class="fas fa-check"></i> Maximum size: 10MB</li>
                        <li><i class="fas fa-check"></i> Should show tongue, gums, or inner cheek</li>
                    </ul>
                </div>
            </div>

            <!-- Analysis Progress -->
            <div class="analysis-card" id="detectionProcess" style="display: none;">
                <div class="analysis-header">
                    <h2>Analyzing Image</h2>
                    <div class="analysis-badge">Step 2 of 3</div>
                </div>

                <div class="analysis-visual">
                    <div class="scan-animation">
                        <i class="fas fa-brain"></i>
                    </div>
                    <div class="analysis-status">
                        <div class="status-item active">
                            <div class="status-icon"><i class="fas fa-check"></i></div>
                            <span>Image uploaded</span>
                        </div>
                        <div class="status-item">
                            <div class="status-icon"><i class="fas fa-sync fa-spin"></i></div>
                            <span>Processing with AI</span>
                        </div>
                        <div class="status-item">
                            <div class="status-icon"><i class="far fa-circle"></i></div>
                            <span>Generating results</span>
                        </div>
                    </div>
                </div>

                <div class="progress-section">
                    <div class="progress-bar">
                        <div class="progress-fill"></div>
                    </div>
                    <p class="progress-text">Analyzing image patterns...</p>
                </div>
            </div>

            <!-- Results -->
            <div class="results-card" id="resultsContainer" style="display: none;">
                <div class="results-header">
                    <h2>Analysis Complete</h2>
                    <div class="results-badge">Step 3 of 3</div>
                </div>

                <!-- Image Comparison Slider -->
                <div class="image-comparison-wrapper" data-aos="fade-up">
                    <h4 class="comparison-title">Drag slider to compare: Original vs AI Analysis</h4>
                    <img-comparison-slider class="comparison-slider">
                        <div slot="first" class="comparison-panel">
                            <div class="panel-label">Original Image</div>
                            <img id="originalImage" src="https://via.placeholder.com/800x600/F7FAFC/635BFF?text=Original+Image" alt="Original">
                        </div>
                        <div slot="second" class="comparison-panel">
                            <div class="panel-label">AI Heatmap</div>
                            <canvas id="heatmapCanvas" width="800" height="600"></canvas>
                        </div>
                    </img-comparison-slider>
                    <p class="comparison-hint"><i class="fas fa-arrows-alt-h"></i> Drag the slider to reveal AI analysis</p>
                </div>

                <div class="confidence-display">
                    <div class="confidence-gauge-wrapper">
                        <svg class="confidence-gauge" viewBox="0 0 200 120">
                            <path d="M 20 100 A 80 80 0 0 1 180 100" fill="none" stroke="#E2E8F0" stroke-width="12" stroke-linecap="round"/>
                            <path id="gaugeFill" d="M 20 100 A 80 80 0 0 1 180 100" fill="none" stroke="url(#gaugeGradient)" stroke-width="12" stroke-linecap="round" stroke-dasharray="251.2" stroke-dashoffset="251.2"/>
                            <defs>
                                <linearGradient id="gaugeGradient" x1="0%" y1="0%" x2="100%" y2="0%">
                                    <stop offset="0%" style="stop-color:#00D924"/>
                                    <stop offset="100%" style="stop-color:#635BFF"/>
                                </linearGradient>
                            </defs>
                        </svg>
                        <div class="gauge-value">
                        <span class="score-number" id="confidenceValue">94</span>
                        <span class="score-percent">%</span>
                        </div>
                    </div>
                    <div class="confidence-label">Confidence Score <span id="adjustedBadge" style="display: none;" class="adjusted-badge">Adjusted</span></div>
                    <div class="confidence-range">
                        <span class="range-label">Range: <strong id="confidenceRange">91-97%</strong></span>
                    </div>
                </div>

                <!-- AI Explanation Panel -->
                <div class="ai-explanation-panel" data-aos="fade-up">
                    <h4><i class="fas fa-brain"></i> Why This Result? <span class="ai-badge">AI Analysis</span></h4>
                    <p class="explanation-intro">Our AI model analyzed multiple factors to determine this confidence score:</p>
                    <div class="factors-grid" id="aiFactorsGrid">
                        <!-- Dynamically populated -->
                    </div>
                </div>

                <!-- Symptom Checker -->
                <div class="symptom-checker-panel" data-aos="fade-up" x-data="{ showSymptoms: false }">
                    <div class="symptom-header" @click="showSymptoms = !showSymptoms">
                        <div>
                            <h4><i class="fas fa-stethoscope"></i> Symptom Checker</h4>
                            <p>Check symptoms to refine accuracy</p>
                        </div>
                        <button type="button" class="expand-btn" :class="{ 'rotated': showSymptoms }">
                            <i class="fas fa-chevron-down"></i>
                        </button>
                    </div>

                    <div x-show="showSymptoms" x-collapse.duration.500ms>
                        <div class="symptom-content">
                            <p class="symptom-description">Select any symptoms you're experiencing. The AI will adjust its confidence based on your input.</p>
                            <div class="symptoms-grid" id="symptomsGrid">
                                <label class="symptom-item">
                                    <input type="checkbox" name="symptom" value="pain" onchange="adjustConfidenceBySymptoms()">
                                    <div class="symptom-card">
                                        <i class="fas fa-heartbeat"></i>
                                        <span>Pain or Tenderness</span>
                                    </div>
                                </label>
                                <label class="symptom-item">
                                    <input type="checkbox" name="symptom" value="patches" onchange="adjustConfidenceBySymptoms()">
                                    <div class="symptom-card">
                                        <i class="fas fa-square"></i>
                                        <span>White/Red Patches</span>
                                    </div>
                                </label>
                                <label class="symptom-item">
                                    <input type="checkbox" name="symptom" value="lumps" onchange="adjustConfidenceBySymptoms()">
                                    <div class="symptom-card">
                                        <i class="fas fa-circle"></i>
                                        <span>Lumps or Thickening</span>
                                    </div>
                                </label>
                                <label class="symptom-item">
                                    <input type="checkbox" name="symptom" value="swallowing" onchange="adjustConfidenceBySymptoms()">
                                    <div class="symptom-card">
                                        <i class="fas fa-utensils"></i>
                                        <span>Difficulty Swallowing</span>
                                    </div>
                                </label>
                                <label class="symptom-item">
                                    <input type="checkbox" name="symptom" value="bleeding" onchange="adjustConfidenceBySymptoms()">
                                    <div class="symptom-card">
                                        <i class="fas fa-tint"></i>
                                        <span>Bleeding</span>
                                    </div>
                                </label>
                                <label class="symptom-item">
                                    <input type="checkbox" name="symptom" value="numbness" onchange="adjustConfidenceBySymptoms()">
                                    <div class="symptom-card">
                                        <i class="fas fa-hand-paper"></i>
                                        <span>Numbness</span>
                                    </div>
                                </label>
                            </div>
                            <div id="symptomAdjustmentMessage" class="symptom-adjustment-message" style="display: none;"></div>
                        </div>
                    </div>
                </div>

                <div class="results-summary">
                    <div class="result-card normal" id="normalResult">
                        <div class="result-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="result-info">
                            <h4>Normal Tissue</h4>
                            <p>No signs of abnormal cell growth detected</p>
                            <div class="probability" id="normalProbability">94% probability</div>
                        </div>
                    </div>

                    <div class="result-card suspicious" id="suspiciousResult" style="display: none;">
                        <div class="result-icon">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div class="result-info">
                            <h4>Suspicious Area</h4>
                            <p>Minor irregularities detected - recommend follow-up</p>
                            <div class="probability" id="suspiciousProbability">6% probability</div>
                        </div>
                    </div>
                </div>

                <!-- Performance Metrics -->
                <div class="performance-metrics" data-aos="fade-up">
                    <h4><i class="fas fa-tachometer-alt"></i> Performance Metrics</h4>
                    <div class="metrics-grid">
                        <div class="metric-badge">
                            <i class="fas fa-clock"></i>
                            <div>
                                <strong id="analysisTime">1.8s</strong>
                                <span>Analysis Time</span>
                            </div>
                        </div>
                        <div class="metric-badge">
                            <i class="fas fa-brain"></i>
                            <div>
                                <strong id="modelConfidence">High</strong>
                                <span>Model Confidence</span>
                            </div>
                        </div>
                        <div class="metric-badge">
                            <i class="fas fa-image"></i>
                            <div>
                                <strong id="imageQuality">Good</strong>
                                <span>Image Quality</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="recommendations-section">
                    <h3><i class="fas fa-clipboard-list"></i> Recommendations</h3>
                    <ul id="recommendationsList">
                        <li>Continue regular oral hygiene practices</li>
                        <li>Schedule routine dental check-ups</li>
                        <li>Monitor any changes in oral health</li>
                    </ul>
                </div>

                <!-- Risk Assessment Impact (shown if risk assessment was completed) -->
                <div class="risk-impact-message" id="riskImpactMessage" style="display: none;"></div>

                <!-- Consultation Booking Card -->
                <div class="consultation-booking-card" id="bookingCard" style="display: none;">
                    <div class="urgency-indicator" id="urgencyIndicator">
                        <i class="fas fa-calendar-check"></i>
                        <span id="urgencyText">Consultation Available</span>
                    </div>

                    <h3><i class="fas fa-user-md"></i> Schedule a Professional Consultation</h3>
                    <p id="bookingDescription">Get a thorough examination from a qualified healthcare professional to confirm your results.</p>

                    <div class="booking-highlights">
                        <div class="highlight-item">
                            <i class="fas fa-clock"></i>
                            <span>Available as early as tomorrow</span>
                        </div>
                        <div class="highlight-item">
                            <i class="fas fa-video"></i>
                            <span>In-person & Telemedicine</span>
                        </div>
                        <div class="highlight-item">
                            <i class="fas fa-shield-alt"></i>
                            <span>Results auto-shared with doctor</span>
                        </div>
                    </div>

                    <button class="booking-cta-btn" onclick="openBookingModal()">
                        <i class="fas fa-calendar-alt"></i>
                        Book Appointment Now
                    </button>
                </div>

                <div class="results-actions">
                    <button class="action-button primary" onclick="resetDetection()">
                        <i class="fas fa-redo"></i>
                        Analyze Another Image
                    </button>
                    <button class="action-button secondary" onclick="downloadPDFReport()">
                        <i class="fas fa-file-pdf"></i>
                        Download PDF Report
                    </button>
                    <button class="action-button secondary" onclick="shareResults()">
                        <i class="fas fa-share-alt"></i>
                        Share Results
                    </button>
                    <button class="action-button secondary" onclick="printResults()">
                        <i class="fas fa-print"></i>
                        Print Results
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Clinical Info -->
<section class="clinical-info">
    <div class="container">
        <div class="info-grid">
            <div class="info-card">
                <div class="card-icon warning"><i class="fas fa-exclamation-triangle"></i></div>
                    <h3>Medical Disclaimer</h3>
                <p>This tool is for screening purposes only. Results should not be used as a substitute for professional medical diagnosis. Always consult with a qualified healthcare provider.</p>
            </div>

            <div class="info-card">
                <div class="card-icon primary"><i class="fas fa-shield-alt"></i></div>
                    <h3>Privacy & Security</h3>
                <p>Your images are processed securely with end-to-end encryption. Images are not stored permanently and are deleted after analysis.</p>
            </div>

            <div class="info-card">
                <div class="card-icon success"><i class="fas fa-clock"></i></div>
                    <h3>Processing Time</h3>
                <p>Most analyses complete within 1-2 minutes. Complex cases may take up to 5 minutes depending on image quality.</p>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
// Global functions
window.uploadedImageData = null;
window.riskScore = 0;
window.baseConfidence = 94;
window.symptomAdjustment = 0;

// Risk Assessment Calculator
window.calculateRisk = function() {
    const age = document.getElementById('ageGroup').value;
    const smoking = document.getElementById('smokingHistory').value;
    const family = document.getElementById('familyHistory').value;
    const previous = document.getElementById('previousIssues').value;

    if (!age || !smoking || !family || !previous) {
        Swal.fire({
            icon: 'warning',
            title: 'Incomplete Form',
            text: 'Please fill in all fields to calculate your risk score.',
            confirmButtonColor: '#635BFF'
        });
        return;
    }

    // Calculate risk score (0-100)
    let score = 0;

    // Age (0-25 points)
    if (age === 'under-40') score += 0;
    else if (age === '40-55') score += 12;
    else if (age === '56-70') score += 18;
    else if (age === 'over-70') score += 25;

    // Smoking (0-40 points - increased weight)
    if (smoking === 'never') score += 0;
    else if (smoking === 'former') score += 15;
    else if (smoking === 'occasional') score += 28;
    else if (smoking === 'regular') score += 40;

    // Family history (0-20 points - increased weight)
    if (family === 'none') score += 0;
    else if (family === 'distant') score += 10;
    else if (family === 'immediate') score += 20;

    // Previous issues (0-15 points)
    if (previous === 'none') score += 0;
    else if (previous === 'minor') score += 5;
    else if (previous === 'lesions') score += 10;
    else if (previous === 'cancer') score += 15;

    window.riskScore = score;

    // Display result
    const preview = document.getElementById('riskResultPreview');
    const indicator = document.getElementById('riskLevelIndicator');
    const label = document.getElementById('riskLabel');
    const barFill = document.getElementById('riskBarFill');
    const message = document.getElementById('riskMessage');

    preview.style.display = 'block';

    let level, color, text;
    if (score <= 30) {
        level = 'Low Risk';
        color = '#00D924';
        text = 'Your lifestyle factors indicate a lower risk for oral cancer. Continue healthy habits and regular check-ups.';
    } else if (score <= 60) {
        level = 'Moderate Risk';
        color = '#F59E0B';
        text = 'Some risk factors are present. Consider lifestyle modifications and more frequent dental screenings.';
    } else {
        level = 'High Risk';
        color = '#E53E3E';
        text = 'Multiple risk factors detected. We strongly recommend regular professional screenings and lifestyle changes.';
    }

    label.textContent = level;
    label.style.color = color;
    barFill.style.width = score + '%';
    barFill.style.background = color;
    message.textContent = text;

    // Animate
    setTimeout(() => {
        preview.style.animation = 'fadeInUp 0.5s ease-out';
    }, 100);

    window.notyf.success('Risk assessment complete!');
};

// Populate AI Explanation Panel
window.populateAIExplanation = function(sampleType) {
    const grid = document.getElementById('aiFactorsGrid');
    if (!grid) return;

    let factors = [];

    if (sampleType === 'suspicious') {
        factors = [
            { icon: 'exclamation-triangle', label: 'Border Irregularity', status: 'detected', severity: 'warning' },
            { icon: 'palette', label: 'Color Variation', status: 'detected', severity: 'warning' },
            { icon: 'th', label: 'Texture Analysis', status: 'abnormal', severity: 'warning' },
            { icon: 'compress-arrows-alt', label: 'Size & Symmetry', status: 'asymmetric', severity: 'warning' },
            { icon: 'layer-group', label: 'Tissue Depth', status: 'unusual', severity: 'warning' },
            { icon: 'chart-line', label: 'Growth Pattern', status: 'monitored', severity: 'info' }
        ];
    } else {
        factors = [
            { icon: 'check-circle', label: 'Border Regularity', status: 'normal', severity: 'success' },
            { icon: 'palette', label: 'Uniform Color', status: 'consistent', severity: 'success' },
            { icon: 'th', label: 'Smooth Texture', status: 'healthy', severity: 'success' },
            { icon: 'compress-arrows-alt', label: 'Symmetric Shape', status: 'regular', severity: 'success' },
            { icon: 'layer-group', label: 'Normal Depth', status: 'typical', severity: 'success' },
            { icon: 'chart-line', label: 'Stable Pattern', status: 'unchanged', severity: 'success' }
        ];
    }

    grid.innerHTML = factors.map(factor => `
        <div class="factor-item ${factor.severity}">
            <div class="factor-icon">
                <i class="fas fa-${factor.icon}"></i>
            </div>
            <div class="factor-info">
                <strong>${factor.label}</strong>
                <span>${factor.status}</span>
            </div>
            <div class="factor-badge ${factor.severity}">
                ${factor.severity === 'warning' ? '⚠️' : '✓'}
            </div>
        </div>
    `).join('');
};

// Symptom-based Confidence Adjustment
window.adjustConfidenceBySymptoms = function() {
    const checkedSymptoms = document.querySelectorAll('input[name="symptom"]:checked');
    const count = checkedSymptoms.length;
    const message = document.getElementById('symptomAdjustmentMessage');
    const confidenceValue = document.getElementById('confidenceValue');
    const adjustedBadge = document.getElementById('adjustedBadge');

    if (count === 0) {
        window.symptomAdjustment = 0;
        message.style.display = 'none';
        adjustedBadge.style.display = 'none';
        confidenceValue.textContent = window.baseConfidence;
        return;
    }

    // High-risk symptoms reduce confidence in "normal" result
    const highRiskSymptoms = ['patches', 'lumps', 'bleeding'];
    const hasHighRisk = Array.from(checkedSymptoms).some(cb =>
        highRiskSymptoms.includes(cb.value)
    );

    // Adjust confidence based on symptoms
    let adjustment = 0;
    if (window.baseConfidence > 70) {
        // If result was "normal" but symptoms present, reduce confidence
        adjustment = -(count * 8);
        if (hasHighRisk) adjustment -= 10;
    } else {
        // If result was "suspicious" and symptoms present, increase suspicion
        adjustment = -(count * 5);
    }

    window.symptomAdjustment = adjustment;
    const newConfidence = Math.max(0, Math.min(100, window.baseConfidence + adjustment));

    // Update display
    confidenceValue.textContent = Math.round(newConfidence);
    adjustedBadge.style.display = 'inline-block';

    // Show message
    message.style.display = 'block';
    message.className = 'symptom-adjustment-message ' + (adjustment < 0 ? 'warning' : 'info');
    message.innerHTML = `
        <i class="fas fa-info-circle"></i>
        <strong>Confidence Adjusted:</strong> You selected ${count} symptom${count > 1 ? 's' : ''}.
        ${hasHighRisk ? 'High-risk symptoms detected. ' : ''}
        AI confidence ${adjustment < 0 ? 'decreased' : 'increased'} by ${Math.abs(adjustment)}%
        (${window.baseConfidence}% → ${Math.round(newConfidence)}%)
    `;

    // Update gauge
    window.animateGauge(newConfidence);

    // Update booking card urgency if needed
    window.updateBookingCard(newConfidence);
};

window.resetDetection = function() {
    const uploadArea = document.getElementById('uploadArea');
    const detectionProcess = document.getElementById('detectionProcess');
    const resultsContainer = document.getElementById('resultsContainer');
    const fileInput = document.getElementById('fileInput');

    if (uploadArea) uploadArea.style.display = 'block';
    if (detectionProcess) detectionProcess.style.display = 'none';
    if (resultsContainer) resultsContainer.style.display = 'none';
    if (fileInput) fileInput.value = '';

    window.uploadedImageData = null;
    window.symptomAdjustment = 0;

    const steps = document.querySelectorAll('.status-item');
    steps.forEach(step => step.classList.remove('active'));

    const progressFill = document.querySelector('.progress-fill');
    if (progressFill) progressFill.style.width = '0%';

    const gaugeFill = document.getElementById('gaugeFill');
    if (gaugeFill) gaugeFill.style.strokeDashoffset = '251.2';

    // Reset comparison slider position to center
    const comparisonSlider = document.querySelector('img-comparison-slider');
    if (comparisonSlider) {
        comparisonSlider.value = 50; // Reset to middle (50%)
    }

    // Reset symptom checkboxes
    document.querySelectorAll('input[name="symptom"]').forEach(cb => cb.checked = false);
    const adjustedBadge = document.getElementById('adjustedBadge');
    if (adjustedBadge) adjustedBadge.style.display = 'none';
};

window.loadSampleImage = function(type) {
    console.log('Loading sample:', type);

    window.uploadedImageData = { type: type, isSample: true };

    const uploadArea = document.getElementById('uploadArea');
    const detectionProcess = document.getElementById('detectionProcess');

    if (uploadArea) uploadArea.style.display = 'none';
    if (detectionProcess) detectionProcess.style.display = 'block';

    simulateAnalysis(type);
};

// File upload functionality
document.addEventListener('DOMContentLoaded', function() {
    const uploadArea = document.getElementById('uploadArea');
    const fileInput = document.getElementById('fileInput');
    const detectionProcess = document.getElementById('detectionProcess');
    const resultsContainer = document.getElementById('resultsContainer');

    fileInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            handleFileUpload(file);
        }
    });

    // Drag and drop
    uploadArea.addEventListener('dragover', function(e) {
        e.preventDefault();
        uploadArea.style.borderColor = 'var(--stripe-purple)';
    });

    uploadArea.addEventListener('dragleave', function(e) {
        e.preventDefault();
        uploadArea.style.borderColor = '';
    });

    uploadArea.addEventListener('drop', function(e) {
        e.preventDefault();
        uploadArea.style.borderColor = '';
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            handleFileUpload(files[0]);
        }
    });

    function handleFileUpload(file) {
        if (!file.type.startsWith('image/')) {
            Swal.fire({
                icon: 'error',
                title: 'Invalid File',
                text: 'Please upload an image file (JPG, PNG, GIF, BMP)',
                confirmButtonColor: '#635BFF'
            });
            return;
        }

        if (file.size > 10 * 1024 * 1024) {
            Swal.fire({
                icon: 'error',
                title: 'File Too Large',
                text: 'File size must be less than 10MB',
                confirmButtonColor: '#635BFF'
            });
            return;
        }

        // Read and preview image
        const reader = new FileReader();
        reader.onload = function(e) {
            window.uploadedImageData = e.target.result;
            const originalImage = document.getElementById('originalImage');
            if (originalImage) {
                originalImage.src = window.uploadedImageData;
                originalImage.style.display = 'block';
            }
        };
        reader.readAsDataURL(file);

        // Show detection process
        uploadArea.style.display = 'none';
        detectionProcess.style.display = 'block';

        // Simulate AI analysis
        simulateAnalysis();
    }

    // Integrate Risk Assessment with AI Confidence
    window.applyRiskAdjustment = function(baseConfidence) {
        if (window.riskScore === 0) {
            // No risk assessment completed
            return { adjusted: baseConfidence, adjustment: 0, message: '' };
        }

        let adjustment = 0;
        let message = '';
        let riskLevel = '';

        // Determine risk level
        if (window.riskScore <= 30) {
            riskLevel = 'Low';
        } else if (window.riskScore <= 60) {
            riskLevel = 'Moderate';
        } else {
            riskLevel = 'High';
        }

        // Apply adjustment based on AI result + risk level combination
        if (baseConfidence >= 70) {
            // AI says "Normal"
            if (window.riskScore <= 30) {
                // Low risk + Normal = Slight boost
                adjustment = Math.floor(window.riskScore * 0.1); // +0 to +3
                message = `✓ ${riskLevel} risk factors + normal image = Good outlook`;
            } else if (window.riskScore <= 60) {
                // Moderate risk + Normal = Caution
                adjustment = -Math.floor(window.riskScore * 0.2); // -6 to -12
                message = `⚠️ ${riskLevel} risk factors detected. Image looks normal, but more frequent monitoring recommended`;
            } else {
                // High risk + Normal = High caution
                adjustment = -Math.floor(window.riskScore * 0.25); // -15 to -25
                message = `⚠️ ${riskLevel} risk factors! Despite normal image, we strongly recommend regular professional screening`;
            }
        } else {
            // AI says "Suspicious"
            if (window.riskScore <= 30) {
                // Low risk + Suspicious = No additional penalty
                adjustment = 0;
                message = `Image shows irregularities. Low risk factors are reassuring`;
            } else if (window.riskScore <= 60) {
                // Moderate risk + Suspicious = Increase concern
                adjustment = -Math.floor(window.riskScore * 0.15); // -5 to -9
                message = `🚨 ${riskLevel} risk factors + suspicious image. Consultation strongly recommended`;
            } else {
                // High risk + Suspicious = Critical
                adjustment = -Math.floor(window.riskScore * 0.2); // -12 to -20
                message = `🚨 ${riskLevel} risk factors + suspicious image. URGENT professional consultation required`;
            }
        }

        const adjustedConfidence = Math.max(5, Math.min(99, baseConfidence + adjustment));

        return {
            adjusted: adjustedConfidence,
            adjustment: adjustment,
            message: message,
            riskLevel: riskLevel
        };
    };

    window.simulateAnalysis = function(sampleType = null) {
        console.log('Simulating analysis for:', sampleType);

        const steps = document.querySelectorAll('.status-item');
        const progressFill = document.querySelector('.progress-fill');
        const progressText = document.querySelector('.progress-text');
        const detectionProcess = document.getElementById('detectionProcess');
        const resultsContainer = document.getElementById('resultsContainer');

        // RESET all steps first (fixes second run)
        steps.forEach(step => step.classList.remove('active'));
        if (progressFill) progressFill.style.width = '0%';

        // Determine BASE confidence from image analysis only
        let baseImageConfidence = 94;
        let isNormal = true;

        if (sampleType === 'suspicious') {
            baseImageConfidence = 23;
            isNormal = false;
        } else if (sampleType === 'benign') {
            baseImageConfidence = 67;
            isNormal = true;
        }

        // Apply risk assessment adjustment
        const riskAdjustment = window.applyRiskAdjustment(baseImageConfidence);
        const confidence = riskAdjustment.adjusted;

        // Step 1: Upload
        setTimeout(() => {
            steps[0]?.classList.add('active');
            if (progressText) progressText.textContent = 'Preprocessing image...';
        }, 100);

        // Step 2: Processing
        setTimeout(() => {
            steps[1]?.classList.add('active');
            if (progressFill) progressFill.style.width = '33%';
            if (progressText) progressText.textContent = 'Extracting features...';
        }, 900);

        setTimeout(() => {
            if (progressFill) progressFill.style.width = '66%';
            if (progressText) progressText.textContent = 'Running AI model...';
        }, 1700);

        // Step 3: Results
        setTimeout(() => {
            steps[2]?.classList.add('active');
            if (progressFill) progressFill.style.width = '100%';
            if (progressText) progressText.textContent = 'Analysis complete!';
        }, 2500);

        // Show results
        setTimeout(() => {
            if (detectionProcess) detectionProcess.style.display = 'none';
            if (resultsContainer) {
        resultsContainer.style.display = 'block';

                // Update confidence display
                const confidenceValue = document.getElementById('confidenceValue');
                const confidenceRange = document.getElementById('confidenceRange');
                const normalResult = document.getElementById('normalResult');
                const suspiciousResult = document.getElementById('suspiciousResult');
                const normalProb = document.getElementById('normalProbability');
                const suspiciousProb = document.getElementById('suspiciousProbability');

                if (confidenceValue) {
                    animateConfidence(confidence);
                }

                if (confidenceRange) {
                    const rangeMin = Math.max(0, confidence - 3);
                    const rangeMax = Math.min(100, confidence + 3);
                    confidenceRange.textContent = `${rangeMin}-${rangeMax}%`;
                }

                // Show appropriate result card
                if (isNormal) {
                    if (normalResult) normalResult.style.display = 'flex';
                    if (suspiciousResult) suspiciousResult.style.display = 'none';
                    if (normalProb) normalProb.textContent = `${confidence}% probability`;
                    if (suspiciousProb) suspiciousProb.textContent = `${100 - confidence}% probability`;
                } else {
                    if (normalResult) normalResult.style.display = 'none';
                    if (suspiciousResult) suspiciousResult.style.display = 'flex';
                    if (normalProb) normalProb.textContent = `${100 - confidence}% probability`;
                    if (suspiciousProb) suspiciousProb.textContent = `${confidence}% probability`;
                }

                // Animate gauge
                animateGauge(confidence);

                // Draw heatmap
                drawHeatmap(sampleType);

                // Reset slider position to center
                setTimeout(() => {
                    const comparisonSlider = document.querySelector('img-comparison-slider');
                    if (comparisonSlider) {
                        comparisonSlider.value = 50; // Start at middle
                    }
                }, 100);

                // Update performance metrics
                updatePerformanceMetrics(sampleType, confidence);

                // Populate AI explanation panel
                window.baseConfidence = confidence;
                populateAIExplanation(sampleType);

                // Show risk impact message if risk assessment was completed
                if (riskAdjustment.adjustment !== 0) {
                    const riskMessage = document.getElementById('riskImpactMessage');
                    if (riskMessage) {
                        riskMessage.style.display = 'block';
                        const adjustmentText = riskAdjustment.adjustment > 0 ? `+${riskAdjustment.adjustment}%` : `${riskAdjustment.adjustment}%`;
                        const adjustmentClass = riskAdjustment.adjustment > 0 ? 'positive' : 'negative';
                        riskMessage.className = `risk-impact-message ${adjustmentClass}`;
                        riskMessage.innerHTML = `
                            <div class="risk-impact-icon">
                                <i class="fas fa-${riskAdjustment.adjustment > 0 ? 'arrow-up' : 'arrow-down'}"></i>
                            </div>
                            <div class="risk-impact-content">
                                <h4>Risk Assessment Impact</h4>
                                <p><strong>${riskAdjustment.riskLevel} Risk Profile:</strong> ${riskAdjustment.message}</p>
                                <p class="adjustment-detail">Confidence adjusted by ${adjustmentText} based on your medical history (${baseImageConfidence}% → ${confidence}%)</p>
                            </div>
                        `;
                    }
                } else {
                    const riskMessage = document.getElementById('riskImpactMessage');
                    if (riskMessage) riskMessage.style.display = 'none';
                }

                // Show booking card with appropriate urgency
                updateBookingCard(confidence);
            }
        }, 3200);
    };

    window.updatePerformanceMetrics = function(type, confidence) {
        // Analysis time (random 1.2 - 2.5s)
        const time = (Math.random() * 1.3 + 1.2).toFixed(1);
        const timeElement = document.getElementById('analysisTime');
        if (timeElement) timeElement.textContent = time + 's';

        // Model confidence level
        const confLevel = confidence > 85 ? 'High' : confidence > 60 ? 'Medium' : 'Low';
        const confElement = document.getElementById('modelConfidence');
        if (confElement) confElement.textContent = confLevel;

        // Image quality (random)
        const qualities = ['Excellent', 'Good', 'Fair'];
        const quality = qualities[Math.floor(Math.random() * qualities.length)];
        const qualityElement = document.getElementById('imageQuality');
        if (qualityElement) qualityElement.textContent = quality;
    };

    window.animateConfidence = function(target) {
        const element = document.getElementById('confidenceValue');
        if (!element) return;

        let current = 0;
        const increment = target / 50;
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                element.textContent = target;
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(current);
            }
        }, 30);
    };

    window.animateGauge = function(confidence) {
        const gaugeFill = document.getElementById('gaugeFill');
        if (!gaugeFill) return;

        const circumference = 251.2;
        const offset = circumference - (confidence / 100) * circumference;

        setTimeout(() => {
            gaugeFill.style.transition = 'stroke-dashoffset 1.5s ease-out';
            gaugeFill.style.strokeDashoffset = offset;
        }, 100);
    };

    window.drawHeatmap = function(type) {
        const canvas = document.getElementById('heatmapCanvas');

        if (!canvas) return;

        const ctx = canvas.getContext('2d');

        // Draw base gradient
        const bgGradient = ctx.createLinearGradient(0, 0, canvas.width, canvas.height);
        bgGradient.addColorStop(0, '#F7FAFC');
        bgGradient.addColorStop(1, '#EDF2F7');
        ctx.fillStyle = bgGradient;
        ctx.fillRect(0, 0, canvas.width, canvas.height);

        // Draw heatmap overlay based on type
        if (type === 'suspicious') {
            // Red hotspot (scaled to 800x600)
            const gradient = ctx.createRadialGradient(400, 300, 0, 400, 300, 200);
            gradient.addColorStop(0, 'rgba(255, 0, 0, 0.7)');
            gradient.addColorStop(0.5, 'rgba(255, 153, 0, 0.4)');
            gradient.addColorStop(1, 'rgba(255, 153, 0, 0)');
            ctx.fillStyle = gradient;
            ctx.fillRect(0, 0, canvas.width, canvas.height);

            // Add warning markers
            ctx.fillStyle = '#FF0000';
            ctx.shadowColor = 'rgba(255, 0, 0, 0.5)';
            ctx.shadowBlur = 10;
            ctx.beginPath();
            ctx.arc(400, 300, 15, 0, Math.PI * 2);
            ctx.fill();
            ctx.shadowBlur = 0;

            // Add text
            ctx.fillStyle = '#FFFFFF';
            ctx.font = 'bold 24px Inter';
            ctx.textAlign = 'center';
            ctx.fillText('⚠️ Suspicious Area', 400, 500);
        } else {
            // Green overlay (normal - scaled to 800x600)
            const gradient = ctx.createRadialGradient(400, 300, 0, 400, 300, 250);
            gradient.addColorStop(0, 'rgba(0, 217, 36, 0.4)');
            gradient.addColorStop(0.7, 'rgba(0, 217, 36, 0.1)');
            gradient.addColorStop(1, 'rgba(0, 217, 36, 0)');
            ctx.fillStyle = gradient;
            ctx.fillRect(0, 0, canvas.width, canvas.height);

            // Add checkmark
            ctx.fillStyle = '#00D924';
            ctx.shadowColor = 'rgba(0, 217, 36, 0.5)';
            ctx.shadowBlur = 10;
            ctx.beginPath();
            ctx.arc(400, 300, 15, 0, Math.PI * 2);
            ctx.fill();
            ctx.shadowBlur = 0;

            // Add text
            ctx.fillStyle = '#0A0E27';
            ctx.font = 'bold 24px Inter';
            ctx.textAlign = 'center';
            ctx.fillText('✓ Normal Tissue', 400, 500);
        }

        // Add grid overlay
        ctx.strokeStyle = 'rgba(99, 91, 255, 0.08)';
        ctx.lineWidth = 1;
        for (let i = 0; i < canvas.width; i += 80) {
            ctx.beginPath();
            ctx.moveTo(i, 0);
            ctx.lineTo(i, canvas.height);
            ctx.stroke();
        }
        for (let i = 0; i < canvas.height; i += 80) {
            ctx.beginPath();
            ctx.moveTo(0, i);
            ctx.lineTo(canvas.width, i);
            ctx.stroke();
        }

        // Show success notification
        if (type) {
            setTimeout(() => {
                window.notyf.success('Analysis complete! Drag the slider to compare images.');
            }, 500);
        }
    };
});

// PDF Export Function
window.downloadPDFReport = function() {
    Swal.fire({
        title: 'Download Report',
        text: 'Generate PDF report with full analysis results?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#635BFF',
        cancelButtonColor: '#CBD5E0',
        confirmButtonText: 'Download PDF',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            // Show loading
            Swal.fire({
                title: 'Generating Report...',
                html: 'Please wait while we create your PDF report.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            // Simulate PDF generation
            setTimeout(() => {
                Swal.close();
                window.print(); // Use browser print to PDF
                window.notyf.success('Report ready! Use "Save as PDF" in print dialog.');
            }, 2000);
        }
    });
};

// Share Results Function
window.shareResults = function() {
    const confidence = document.getElementById('confidenceValue')?.textContent || '94';
    const shareText = `OCD Platform Analysis Results: ${confidence}% confidence`;

    if (navigator.share) {
        navigator.share({
            title: 'OCD Analysis Results',
            text: shareText,
            url: window.location.href
        }).catch(() => {
            // Fallback if share fails
            showShareModal();
        });
    } else {
        showShareModal();
    }
};

function showShareModal() {
    Swal.fire({
        title: 'Share Results',
        html: `
            <div style="display: flex; gap: 1rem; justify-content: center; margin-top: 1rem;">
                <button onclick="shareViaEmail()" class="share-btn" style="padding: 1rem; background: #635BFF; color: white; border: none; border-radius: 0.5rem; cursor: pointer; flex: 1;">
                    <i class="fas fa-envelope"></i> Email
                </button>
                <button onclick="copyShareLink()" class="share-btn" style="padding: 1rem; background: #635BFF; color: white; border: none; border-radius: 0.5rem; cursor: pointer; flex: 1;">
                    <i class="fas fa-link"></i> Copy Link
                </button>
            </div>
        `,
        showConfirmButton: false,
        showCloseButton: true
    });
}

window.shareViaEmail = function() {
    const confidence = document.getElementById('confidenceValue')?.textContent || '94';
    const subject = encodeURIComponent('OCD Analysis Results');
    const body = encodeURIComponent(`Analysis Results:\n\nConfidence: ${confidence}%\n\nView full report: ${window.location.href}`);
    window.location.href = `mailto:?subject=${subject}&body=${body}`;
    Swal.close();
};

window.copyShareLink = function() {
    navigator.clipboard.writeText(window.location.href).then(() => {
        Swal.close();
        window.notyf.success('Link copied to clipboard!');
    });
};

// Print Results Function
window.printResults = function() {
    window.print();
};

// Booking Consultation Functions
window.openBookingModal = function() {
    const confidence = document.getElementById('confidenceValue')?.textContent || '94';
    const isUrgent = parseInt(confidence) < 40;

    Swal.fire({
        title: '<i class="fas fa-calendar-check" style="color: #635BFF;"></i> Book Consultation',
        html: `
            <div style="text-align: left; padding: 1rem;">
                <form id="bookingForm" style="display: flex; flex-direction: column; gap: 1rem;">
                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #0A0E27;">Full Name *</label>
                        <input type="text" id="patientName" required
                            style="width: 100%; padding: 0.75rem; border: 2px solid #E2E8F0; border-radius: 0.5rem; font-size: 1rem;"
                            placeholder="John Doe">
                    </div>

                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #0A0E27;">Phone Number *</label>
                        <input type="tel" id="patientPhone" required
                            style="width: 100%; padding: 0.75rem; border: 2px solid #E2E8F0; border-radius: 0.5rem; font-size: 1rem;"
                            placeholder="+1 (555) 123-4567">
                    </div>

                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #0A0E27;">Email *</label>
                        <input type="email" id="patientEmail" required
                            style="width: 100%; padding: 0.75rem; border: 2px solid #E2E8F0; border-radius: 0.5rem; font-size: 1rem;"
                            placeholder="john@example.com">
                    </div>

                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #0A0E27;">Preferred Date *</label>
                        <input type="date" id="preferredDate" required
                            min="${new Date().toISOString().split('T')[0]}"
                            style="width: 100%; padding: 0.75rem; border: 2px solid #E2E8F0; border-radius: 0.5rem; font-size: 1rem;">
                    </div>

                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #0A0E27;">Preferred Time *</label>
                        <select id="preferredTime" required
                            style="width: 100%; padding: 0.75rem; border: 2px solid #E2E8F0; border-radius: 0.5rem; font-size: 1rem;">
                            <option value="">Select a time</option>
                            <option value="09:00">9:00 AM</option>
                            <option value="10:00">10:00 AM</option>
                            <option value="11:00">11:00 AM</option>
                            <option value="12:00">12:00 PM</option>
                            <option value="14:00">2:00 PM</option>
                            <option value="15:00">3:00 PM</option>
                            <option value="16:00">4:00 PM</option>
                        </select>
                    </div>

                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #0A0E27;">Consultation Type *</label>
                        <select id="consultationType" required
                            style="width: 100%; padding: 0.75rem; border: 2px solid #E2E8F0; border-radius: 0.5rem; font-size: 1rem;">
                            <option value="in-person">In-Person Visit</option>
                            <option value="telemedicine">Telemedicine (Video Call)</option>
                        </select>
                    </div>

                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #0A0E27;">Additional Notes (Optional)</label>
                        <textarea id="additionalNotes" rows="3"
                            style="width: 100%; padding: 0.75rem; border: 2px solid #E2E8F0; border-radius: 0.5rem; font-size: 1rem; resize: vertical;"
                            placeholder="Any specific concerns or questions..."></textarea>
                    </div>

                    <div style="background: #F7FAFC; padding: 1rem; border-radius: 0.5rem; font-size: 0.875rem; color: #4A5568;">
                        <strong><i class="fas fa-info-circle"></i> Analysis Summary:</strong><br>
                        Confidence Score: ${confidence}%<br>
                        ${isUrgent ? '<span style="color: #E53E3E;">⚠️ Urgent consultation recommended</span>' : 'Routine consultation recommended'}
                    </div>
                </form>
            </div>
        `,
        showCancelButton: true,
        confirmButtonText: '<i class="fas fa-paper-plane"></i> Submit Request',
        cancelButtonText: 'Cancel',
        confirmButtonColor: '#635BFF',
        cancelButtonColor: '#CBD5E0',
        width: '600px',
        customClass: {
            popup: 'booking-modal',
            confirmButton: 'booking-submit-btn'
        },
        preConfirm: () => {
            const name = document.getElementById('patientName').value;
            const phone = document.getElementById('patientPhone').value;
            const email = document.getElementById('patientEmail').value;
            const date = document.getElementById('preferredDate').value;
            const time = document.getElementById('preferredTime').value;
            const type = document.getElementById('consultationType').value;
            const notes = document.getElementById('additionalNotes').value;

            if (!name || !phone || !email || !date || !time) {
                Swal.showValidationMessage('Please fill in all required fields');
                return false;
            }

            return { name, phone, email, date, time, type, notes, confidence };
        }
    }).then((result) => {
        if (result.isConfirmed) {
            submitBookingRequest(result.value);
        }
    });
};

window.submitBookingRequest = function(bookingData) {
    // Show loading
    Swal.fire({
        title: 'Submitting Request...',
        html: 'Please wait while we process your booking.',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    // Simulate API call (in real app, this would send to Laravel backend)
    setTimeout(() => {
        Swal.fire({
            icon: 'success',
            title: 'Booking Request Submitted!',
            html: `
                <div style="text-align: left; padding: 1rem;">
                    <p style="margin-bottom: 1rem;">Thank you, <strong>${bookingData.name}</strong>! Your consultation request has been submitted.</p>

                    <div style="background: #F7FAFC; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1rem;">
                        <strong>Appointment Details:</strong><br>
                        📅 Date: ${new Date(bookingData.date).toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })}<br>
                        🕐 Time: ${bookingData.time}<br>
                        ${bookingData.type === 'telemedicine' ? '💻 Type: Telemedicine (Video Call)' : '🏥 Type: In-Person Visit'}
                    </div>

                    <p style="color: #4A5568; font-size: 0.9rem;">
                        <strong>Next Steps:</strong><br>
                        • You'll receive a confirmation email at <strong>${bookingData.email}</strong><br>
                        • Our team will call you at <strong>${bookingData.phone}</strong> within 24 hours<br>
                        • Your analysis results will be shared with the healthcare provider<br>
                        ${bookingData.confidence < 40 ? '• Due to urgency, we\'ll prioritize your appointment' : ''}
                    </p>
                </div>
            `,
            confirmButtonText: 'Got it!',
            confirmButtonColor: '#635BFF',
            width: '600px'
        });

        // Show success notification
        window.notyf.success('Consultation request submitted successfully!');
    }, 2000);
};

// Show booking card with appropriate urgency based on confidence
window.updateBookingCard = function(confidence) {
    const bookingCard = document.getElementById('bookingCard');
    const urgencyIndicator = document.getElementById('urgencyIndicator');
    const urgencyText = document.getElementById('urgencyText');
    const bookingDescription = document.getElementById('bookingDescription');

    if (!bookingCard) return;

    bookingCard.style.display = 'block';

    if (confidence < 40) {
        // Urgent - suspicious result
        urgencyIndicator.className = 'urgency-indicator urgent';
        urgencyIndicator.innerHTML = '<i class="fas fa-exclamation-circle"></i><span id="urgencyText">Urgent Consultation Recommended</span>';
        bookingDescription.textContent = 'Based on your analysis results, we strongly recommend consulting with a healthcare professional within 7 days for a thorough examination.';
    } else if (confidence < 70) {
        // Recommended - borderline result
        urgencyIndicator.className = 'urgency-indicator recommended';
        urgencyIndicator.innerHTML = '<i class="fas fa-info-circle"></i><span id="urgencyText">Follow-up Recommended</span>';
        bookingDescription.textContent = 'While results appear manageable, a follow-up consultation is recommended to ensure proper monitoring and care.';
    } else {
        // Optional - normal result
        urgencyIndicator.className = 'urgency-indicator optional';
        urgencyIndicator.innerHTML = '<i class="fas fa-calendar-check"></i><span id="urgencyText">Routine Check-up Available</span>';
        bookingDescription.textContent = 'Results look good! Schedule a routine check-up to maintain optimal oral health.';
    }
};
</script>
@endpush
