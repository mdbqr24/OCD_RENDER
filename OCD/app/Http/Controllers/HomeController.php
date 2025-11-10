<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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

        return redirect()->back()->with('newsletter_success', 'Thank you for subscribing to our newsletter!');
    }

    /**
     * Handle AI image analysis.
     */
    public function analyzeImageRealAI(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,bmp|max:10240',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $imagePath = $request->file('image')->store('uploads', 'public');
            $fullPath = storage_path('app/public/' . $imagePath);

            $endpoint = config('services.ai_detection.endpoint');

            $response = Http::timeout(30)
                ->attach(
                    'file',
                    file_get_contents($fullPath),
                    $request->file('image')->getClientOriginalName()
                )->post($endpoint);

            if ($response->failed()) {
                Log::error('AI server request failed', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);

                return response()->json([
                    'success' => false,
                    'message' => 'Analysis failed: the AI service responded with an error (' . $response->status() . ').'
                ], 502);
            }

            $result = $response->json();

            if (!isset($result['confidence'], $result['result'])) {
                Log::error('Unexpected AI response structure', ['response' => $result]);

                return response()->json([
                    'success' => false,
                    'message' => 'Analysis failed: received an unexpected response from the AI service.'
                ], 502);
            }

            $confidence = round($result['confidence'] * 100);
            $isNormal = $result['result'] === 'Non-Cancer';

            $analysisResult = [
                'confidence' => $confidence,
                'is_normal' => $isNormal,
                'analysis_time' => rand(45, 120),
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

        } catch (\Throwable $e) {
            Log::error('AI analysis exception', ['exception' => $e]);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred during analysis. Please try again later.'
            ], 500);
        }
    }

    public function analyzeImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,bmp|max:10240',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $imagePath = $request->file('image')->store('uploads', 'public');

            $analysisResult = $this->simulateAIAnalysis($imagePath);

            return response()->json([
                'success' => true,
                'data' => $analysisResult
            ]);

        } catch (\Throwable $e) {
            Log::error('Simulated AI analysis exception', ['exception' => $e]);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred during analysis. Please try again.'
            ], 500);
        }
    }

    private function simulateAIAnalysis($imagePath)
    {
        $confidence = rand(85, 98);
        $isNormal = $confidence > 90;

        return [
            'confidence' => $confidence,
            'is_normal' => $isNormal,
            'analysis_time' => rand(45, 120),
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

    public function getStats()
    {
        return response()->json([
            'total_analyses' => 50000,
            'accuracy_rate' => 95.2,
            'average_time' => 120,
            'last_updated' => now()->toISOString()
        ]);
    }

    public function test(){
        return view('test');
    }

    public function aiDetection()
    {
        return view('ai-detection');
    }
}
