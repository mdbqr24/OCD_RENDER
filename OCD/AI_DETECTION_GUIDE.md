# AI Detection Page Guide

## Overview
A new AI-powered detection page has been created that combines the beautiful design from the simulation page with real AI model integration.

## Pages Comparison

### 1. `/detection` - Simulation Page
- **Purpose:** Demo/simulation of the detection process
- **Features:** 
  - Beautiful UI with animations
  - Sample images for testing
  - Image comparison slider showing original vs AI heatmap
  - Simulated results (not using real AI)
- **Use Case:** Marketing, demos, presentations

### 2. `/test` - Basic AI Integration
- **Purpose:** Simple test page for AI model
- **Features:**
  - Basic upload form
  - Real AI predictions from Python model
  - Minimal UI design
- **Use Case:** Testing and development

### 3. `/ai-detection` - **NEW: Production-Ready AI Detection** ✨
- **Purpose:** Real AI detection with professional UI
- **Features:**
  - ✅ Beautiful, modern design (same as simulation)
  - ✅ Real AI model integration (DenseNet)
  - ✅ Risk assessment form
  - ✅ Symptom checker
  - ✅ Confidence scoring with adjustments
  - ✅ Professional recommendations
  - ✅ Booking consultation system
  - ✅ Export to PDF
  - ✅ Share results
  - ❌ **Removed:** Image comparison slider (as requested)
- **Use Case:** Production use with real patients/users

## What's Changed

### Improvements in `/ai-detection`:
1. **Real AI Integration:** Uses the actual DenseNet model from `ocmds/best_model_densenet.keras`
2. **No Comparison Slider:** After analysis, shows only the result card without image comparison
3. **Cleaner Results:** Focuses on AI predictions and recommendations
4. **Risk-Adjusted Confidence:** Combines AI prediction with risk factors
5. **Professional Design:** Maintains the beautiful Stripe-inspired UI

### Key Differences from Simulation:
- **Real Predictions:** Calls Python Flask API at `http://127.0.0.1:5000/predict_keras_model`
- **Actual Confidence:** Shows real confidence scores from the AI model
- **Two-Step Process:** Upload → Results (no comparison slider step)
- **Better Performance Metrics:** Shows actual analysis time

## How to Use

### Prerequisites
1. Make sure the Python AI server is running:
   ```bash
   cd ocmds
   python app.py
   ```
   The server should be running on `http://127.0.0.1:5000`

2. Make sure Laravel is running:
   ```bash
   php artisan serve
   ```

### Access the Page
Navigate to: `http://localhost:8000/ai-detection`

### Workflow
1. **Optional:** Complete the risk assessment form for adjusted confidence scores
2. **Upload:** Choose or drag an oral cavity image (JPG, PNG, GIF, BMP, max 10MB)
3. **Wait:** AI processes the image (1-3 seconds typically)
4. **Review Results:**
   - Confidence score gauge
   - Cancer/Non-Cancer determination
   - AI explanation factors
   - Performance metrics
   - Recommendations
5. **Optional:** Check symptoms to further adjust confidence
6. **Actions:**
   - Book a consultation
   - Download PDF report
   - Share results
   - Analyze another image

## Technical Details

### Route
```php
Route::get('/ai-detection', [HomeController::class, 'aiDetection'])->name('ai.detection');
```

### Controller Method
```php
public function aiDetection()
{
    return view('ai-detection');
}
```

### AI API Call
```javascript
fetch('{{ route("analyzeAI.image") }}', {
    method: 'POST',
    body: formData,
    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
})
```

### Backend Processing (HomeController)
```php
public function analyzeImageRealAI(Request $request)
{
    // Validates image
    // Stores temporarily
    // Sends to Python AI at http://127.0.0.1:5000/predict_keras_model
    // Returns: { result: "Cancer|Non-Cancer", confidence: 0.87 }
}
```

## Design Removed Features
- ❌ Image comparison slider (original vs heatmap)
- ❌ Sample image selection (can be added back if needed)

## Maintained Features
- ✅ Risk assessment calculator
- ✅ Symptom checker with confidence adjustment
- ✅ Beautiful UI animations
- ✅ Consultation booking modal
- ✅ PDF export functionality
- ✅ Share via email/link
- ✅ Medical disclaimers
- ✅ Performance metrics
- ✅ Recommendations based on results

## Future Enhancements
- [ ] Store analysis history in database
- [ ] User authentication for result tracking
- [ ] Integration with actual booking system
- [ ] Email notifications
- [ ] Multi-language support
- [ ] Mobile app version

## Troubleshooting

### "Analysis Failed" Error
**Cause:** Python AI server is not running
**Solution:** 
```bash
cd ocmds
python app.py
```

### "Connection Refused"
**Cause:** AI server not accessible on port 5000
**Solution:** Check if port 5000 is free and server is running

### "Invalid File" Error
**Cause:** File type not supported or too large
**Solution:** Use JPG, PNG, GIF, or BMP under 10MB

### Low Confidence Scores
**Cause:** Poor image quality or unclear tissue
**Solution:** Upload clear, well-lit images of oral cavity

## File Locations
- View: `resources/views/ai-detection.blade.php`
- Route: `routes/web.php`
- Controller: `app/Http/Controllers/HomeController.php`
- AI Model: `ocmds/best_model_densenet.keras`
- AI Server: `ocmds/app.py`

## Support
For issues or questions, refer to the main documentation or contact the development team.

---

**Created:** October 2025
**Last Updated:** October 2025
**Version:** 1.0

