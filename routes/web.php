<?php

use Illuminate\Support\Facades\Route;

// Simple view routes for static pages
Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/expertise', 'expertise')->name('expertise');
Route::view('/team', 'team')->name('team');
Route::view('/projects', 'projects')->name('projects');
Route::view('/clients', 'clients')->name('clients');
