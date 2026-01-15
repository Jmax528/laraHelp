<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\FaqController;

Route::view('/', 'home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
Route::post('/faq/create', [FaqController::class, 'create'])->name('faq.create');
Route::post('/faq/update', [FaqController::class, 'update'])->name('faq.update');
Route::post('/faq/delete', [FaqController::class, 'delete'])->name('faq.delete');

Route::view('/chat', 'chat' );
Route::get('/chat', [ChatController::class, 'chat'] )->name('chat');
Route::post('/chat', [ChatController::class, 'send'] )->name('chat');
