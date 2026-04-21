<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;

// Simple view routes for static pages
Route::view('/', 'home')->name('home');
Route::redirect('/about', '/contact-us', 301);
Route::view('/contact-us', 'about')->name('about');
Route::view('/expertise', 'expertise')->name('expertise');
Route::view('/team', 'team')->name('team');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route::get('/projects/{category}/{project}', [ProjectController::class, 'show'])->name('projects.show');
Route::view('/clients', 'clients')->name('clients');
Route::view('/insights', 'insights')->name('insights');

Route::post('/contact-us', [ContactController::class, 'submit'])->name('contact.submit');
