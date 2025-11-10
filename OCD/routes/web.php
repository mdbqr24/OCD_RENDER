<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/detection', [HomeController::class, 'detection'])->name('detection');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// Contact form submission
Route::post('/contact', [HomeController::class, 'submitContact'])->name('contact.submit');

// Newsletter subscription
Route::post('/newsletter', [HomeController::class, 'subscribeNewsletter'])->name('newsletter.subscribe');

// AI Analysis routes
Route::post('/analyze', [HomeController::class, 'analyzeImage'])->name('analyze.image');
Route::post('/analyzeAI', [HomeController::class, 'analyzeImageRealAI'])->name('analyzeAI.image');
Route::get('/stats', [HomeController::class, 'getStats'])->name('stats');
Route::get('/test', [HomeController::class, 'test'])->name('test');
Route::get('/ai-detection', [HomeController::class, 'aiDetection'])->name('ai.detection');
