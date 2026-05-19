<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MasterClassController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Главная страница
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');

// Аутентификация
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// ============= МАСТЕР-КЛАССЫ =============
// ВАЖНО: конкретные маршруты ДОЛЖНЫ быть перед маршрутами с параметрами!

// 1. Сначала ВСЕ конкретные маршруты (без параметров)
Route::middleware('auth')->group(function () {
    // Создание мастер-класса - конкретный маршрут (без параметров)
    Route::get('/master-class/create', [MasterClassController::class, 'create'])->name('master-class.create');
    Route::post('/master-class', [MasterClassController::class, 'store'])->name('master-class.store');
});

// 2. Затем маршруты с параметрами {id}
Route::get('/master-class/{id}', [MasterClassController::class, 'show'])->name('master-class.show');

// 3. Маршруты с действиями над конкретным мастер-классом
Route::middleware('auth')->group(function () {
    Route::post('/master-class/{id}/book', [BookingController::class, 'book'])->name('master-class.book');
    Route::delete('/master-class/{id}/cancel', [BookingController::class, 'cancel'])->name('master-class.cancel');
});

// 4. Просмотр категории
Route::get('/craft/{id}', [MasterClassController::class, 'showCraft'])->name('craft.show');

// 5. Профиль пользователя
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});




