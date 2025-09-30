<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::view('/', 'welcome')->name('welcome');
    Route::get('/register', [RegistrationController::class, 'create'])->name('register.create');
    Route::post('/register', [RegistrationController::class, 'store']);
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});

Route::post('/logout', [LoginController::class, 'destroy']);

Route::get('/profile', [ProfileController::class, 'show'])->middleware('auth');
Route::post('/profile', [ProfileController::class, 'save'])->middleware('auth');
Route::patch('/profile', [ProfileController::class, 'update'])->middleware('auth');
Route::delete('/profile', [ProfileController::class, 'destroy'])->middleware('auth');


Route::get('/tasks', [TaskController::class, 'index'])->name('home')->middleware('auth');
Route::get('/tasks/create', [TaskController::class, 'create'])->middleware('auth');
Route::post('/tasks', [TaskController::class, 'store'])->middleware('auth');
Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->middleware('auth');

Route::patch('/tasks/{id}', [TaskController::class, 'update'])->middleware('auth');
Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->middleware('auth');
