<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Display the homepage.
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Display the detection page.
     */
    public function detection()
    {
        return view('detection');
    }

    /**
     * Display the about page.
     */
    public function about()
    {
        return view('about');
    }

    /**
     * Display the contact page.
     */
    public function contact()
    {
        return view('contact');
    }

    /**
     * Handle contact form submission.
     */
    public function submitContact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:1000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Here you would typically send an email or save to database
        // For demo purposes, we'll just flash a success message

        return redirect()->back()->with('success', 'Thank you for your message! We\'ll get back to you soon.');
    }

    /**
     * Handle newsletter subscription.
     */
    public function subscribeNewsletter(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Here you would typically save to database or integrate with email service
        // For demo purposes, we'll just flash a success message

        return redirect()->back()->with('newsletter_success', 'Thank you for subscribing to our newsletter!');
    }

    /**
     * Handle AI image analysis.
     */
    public function analyzeImageRealAI(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,bmp|max:10240', // 10MB max
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Store uploaded image locally
            $imagePath = $request->file('image')->store('uploads', 'public');
            $fullPath = storage_path('app/public/' . $imagePath);

            // Send image to Python AI model API
            $endpoint = config('services.ai_detection.endpoint');

            $response = Http::timeout(30)
                ->attach(
                    'file',
                    file_get_contents($fullPath),
                    $request->file('image')->getClientOriginalName()
                )->post($endpoint);

            if ($response->failed()) {
                throw new \Exception('AI model request failed.');
            }

            $result = $response->json(); // { result: "Cancer", confidence: 0.87 }

            // Build a similar structure to your original simulation
            $confidence = round($result['confidence'] * 100);
            $isNormal = $result['result'] === 'Non-Cancer';

            $analysisResult = [
                'confidence' => $confidence,
                'is_normal' => $isNormal,
                'analysis_time' => rand(45, 120), // optional: approximate analysis time
                'recommendations' => $isNormal ? [
                    'Continue regular oral hygiene practices',
                    'Schedule routine dental check-ups',
                    'Monitor any changes in oral health'
                ] : [
                    'Schedule immediate consultation with a specialist',
                    'Avoid tobacco and alcohol',
                    'Monitor symptoms closely',
                    'Follow up with healthcare provider'
                ],
                'image_path' => $imagePath,
                'timestamp' => now()->toISOString()
            ];

            return response()->json([
                'success' => true,
                'data' => $analysisResult
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred during analysis. Please try again.'
            ], 500);
        }
    }

    public function analyzeImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,bmp|max:10240', // 10MB max
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Store the uploaded image
            $imagePath = $request->file('image')->store('uploads', 'public');

            // Simulate AI analysis (replace with actual AI model integration)
            $analysisResult = $this->simulateAIAnalysis($imagePath);

            return response()->json([
                'success' => true,
                'data' => $analysisResult
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred during analysis. Please try again.'
            ], 500);
        }
    }

    /**
     * Simulate AI analysis (replace with actual AI model integration).
     */
    private function simulateAIAnalysis($imagePath)
    {
        // This is a simulation - replace with actual AI model calls
        $confidence = rand(85, 98);
        $isNormal = $confidence > 90;

        return [
            'confidence' => $confidence,
            'is_normal' => $isNormal,
            'analysis_time' => rand(45, 120), // seconds
            'recommendations' => $isNormal ? [
                'Continue regular oral hygiene practices',
                'Schedule routine dental check-ups',
                'Monitor any changes in oral health'
            ] : [
                'Schedule immediate consultation with a specialist',
                'Avoid tobacco and alcohol',
                'Monitor symptoms closely',
                'Follow up with healthcare provider'
            ],
            'image_path' => $imagePath,
            'timestamp' => now()->toISOString()
        ];
    }

    /**
     * Get analysis statistics for dashboard.
     */
    public function getStats()
    {
        // This would typically come from database
        return response()->json([
            'total_analyses' => 50000,
            'accuracy_rate' => 95.2,
            'average_time' => 120, // seconds
            'last_updated' => now()->toISOString()
        ]);
    }

    public function test(){
        return view('test');
    }

    /**
     * Display the AI detection page with real AI integration.
     */
    public function aiDetection()
    {
        return view('ai-detection');
    }
}
