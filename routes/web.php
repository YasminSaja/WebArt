<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KaryaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

/*
|--------------------------------------------------------------------------
| Auth
|--------------------------------------------------------------------------
*/

Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.post');

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.post');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::get('/pending-approval', [AuthController::class, 'pending'])
    ->name('pending.approval');

/*
|--------------------------------------------------------------------------
| Karya (artworks)
|--------------------------------------------------------------------------
*/

Route::get('/arts', [KaryaController::class, 'index'])
    ->name('arts');

Route::middleware('auth')->group(function () {
    Route::get('/arts/create', [KaryaController::class, 'create'])
        ->name('form.art');

    Route::post('/arts', [KaryaController::class, 'store'])
        ->name('arts.store');

    Route::post('/profile/arts', [KaryaController::class, 'store'])
        ->name('profile.art.store');

    Route::get('/arts/{id}/edit', [KaryaController::class, 'edit'])
        ->name('arts.edit');

    Route::put('/arts/{id}', [KaryaController::class, 'update'])
        ->name('arts.update');

    Route::delete('/arts/{id}', [KaryaController::class, 'destroy'])
        ->name('arts.destroy');
});

Route::get('/arts/{id}', [KaryaController::class, 'show'])
    ->name('art.detail');

/*
|--------------------------------------------------------------------------
| Artist
|--------------------------------------------------------------------------
*/

Route::get('/artist', [ArtistController::class, 'index'])
    ->name('artist');

Route::get('/artist/{id}', [ArtistController::class, 'show'])
    ->name('artist.profile');

/*
|--------------------------------------------------------------------------
| Category
|--------------------------------------------------------------------------
*/

Route::get('/category', [CategoryController::class, 'index'])
    ->name('category');

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])
        ->name('admin.dashboard');

    Route::patch('/admin/users/{id}/approve', [AdminController::class, 'approve'])
        ->name('admin.users.approve');

    Route::patch('/admin/users/{id}/reject', [AdminController::class, 'reject'])
        ->name('admin.users.reject');

    Route::delete('/admin/users/{id}', [AdminController::class, 'destroyUser'])
        ->name('admin.users.destroy');

    Route::delete('/admin/arts/{id}', [KaryaController::class, 'destroy'])
        ->name('admin.arts.destroy');
});

/*
|--------------------------------------------------------------------------
| User
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])
        ->name('user.profile');

    Route::get('/profile/home', [ProfileController::class, 'home'])
        ->name('user.home');

    Route::get('/profile/arts', [ProfileController::class, 'arts'])
        ->name('user.arts');

    Route::get('/profile/artist', [ProfileController::class, 'artist'])
        ->name('user.artist');

    Route::get('/profile/category', [ProfileController::class, 'category'])
        ->name('user.category');

    Route::get('/profile/edit', [ProfileController::class, 'editForm'])
        ->name('form.profile');

    Route::put('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
});
