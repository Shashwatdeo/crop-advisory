<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CropController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\PestAlertController;
use App\Http\Controllers\CropSuggestionController;
use App\Http\Controllers\Admin\PestController;
use App\Http\Controllers\Admin\AdminCropController;
use App\Http\Controllers\Admin\WeatherController as AdminWeatherController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminPestController;
use App\Http\Controllers\Admin\AdminCropSuggestionController;
use App\Http\Controllers\Admin\AdminUserController;

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Registration Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/', function () {
    return view('home');
})->name('home');

// Public Routes
Route::resource('crops', CropController::class)->only(['index', 'show']);
Route::get('/weather', [WeatherController::class, 'index'])->name('weather.index');
Route::post('/weather/check', [WeatherController::class, 'check'])->name('weather.check');
Route::get('/pest-alerts', [PestAlertController::class, 'index'])->name('pest-alerts.index');
Route::get('/crop-suggestions', [CropSuggestionController::class, 'index'])->name('crop-suggestions.index');
Route::post('/crop-suggestions', [CropSuggestionController::class, 'getSuggestions'])->name('crop-suggestions.getSuggestions');
Route::post('/crop-suggestions/store', [CropSuggestionController::class, 'store'])->name('crop-suggestions.store');
Route::get('/pest-alerts/filter', [PestAlertController::class, 'filter'])->name('pestalerts.filter');

// Admin Routes
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        // Crop management routes
        Route::resource('crops', AdminCropController::class);
        
        // Pest management
        Route::resource('pests', PestController::class);
        
        // Weather management
        Route::resource('weather', AdminWeatherController::class);
        
        // User management routes
        Route::resource('users', UserController::class);
    });
