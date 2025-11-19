<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;

Route::view('/', 'home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::view('/faq', 'faq' );

Route::view('/chat', 'chat' );
Route::get('/chat', [ChatController::class, 'chat'] )->name('chat');
Route::post('/chat', [ChatController::class, 'send'] )->name('chat');
