<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;

// Simple view routes for static pages
Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/expertise', 'expertise')->name('expertise');
Route::view('/team', 'team')->name('team');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route::get('/projects/{category}/{project}', [ProjectController::class, 'show'])->name('projects.show');
Route::view('/clients', 'clients')->name('clients');

Route::post('/about', [ContactController::class, 'submit'])->name('contact.submit');
