<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OfflineController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Registration Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('tasks.index');
    }
    return redirect()->route('login');
});

Route::get('/offline', [OfflineController::class, 'index']);

// Task routes - protected by auth middleware
Route::middleware('auth')->group(function () {
    Route::get('/all-tasks', [TaskController::class, 'allTasks'])->name('tasks.all');
    Route::resource('tasks', TaskController::class);
});
