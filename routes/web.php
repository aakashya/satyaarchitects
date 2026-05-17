<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;

// Simple view routes for static pages
Route::view('/', 'home')->name('home');
Route::redirect('/about', '/contact-us', 301);
Route::view('/contact-us', 'about')->name('about');
Route::view('/expertise', 'expertise')->name('expertise');
Route::view('/team', 'team')->name('team');
Route::view('/about-us', 'about-us')->name('about-us');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route::get('/projects/{category}/{project}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/insights', [BlogController::class, 'insights'])->name('insights');
Route::get('/blogs/{slug}', [BlogController::class, 'show'])->name('blogs.show');
Route::view('/clients', 'clients')->name('clients');

Route::post('/contact-us', [ContactController::class, 'submit'])->name('contact.submit');
