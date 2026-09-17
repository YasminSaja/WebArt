<?php

use Illuminate\Support\Facades\Route; 

//Visitor

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/arts', function () {
    return view('arts');
})->name('arts');

Route::get('/artist', function () {
    return view('artist');
})->name('artist');

Route::get('/category', function () {
    return view('category');
})->name('category');

//login 

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');


Route::get('/pending-approval', function () {
    return view('auth.pending');
})->name('pending.approval');

//Admin

Route::get('/dashboard', function () {
    return view('admin.index');
})->name('admin');

//User

Route::get('/profile', function () {
    return view('user.profile');
})->name('user.profile');

Route::get('/profile/home', function () {
    return view('user.home');
})->name('user.home');

Route::get('/profile/arts', function () {
    return view('user.arts');
})->name('user.arts');

Route::get('/profile/artist', function () {
    return view('user.artist');
})->name('user.artist');

Route::get('/profile/category', function () {
    return view('user.category');
})->name('user.category');


//form edit and add

Route::get('/profile/art', function () {
    return view('form.art');
})->name('form.art');

Route::get('/profile/update', function () {
    return view('form.profile');
})->name('form.profile');

Route::get('/profile/art/edit', function () {
    return view('form.edit-art');
})->name('form.edit.art');

// Art Detail
Route::get('/art/{id}', function ($id) {
    return view('art.detail', compact('id'));
})->name('art.detail');

// Artist Detail
Route::get('/artist/{id}', function ($id) {
    return view('artist.detail', compact('id'));
})->name('artist.detail');