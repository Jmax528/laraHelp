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


Route::middleware('auth')->group(function () {
    Route::get('/chat/{chat}', [ChatController::class, 'show'] )
        ->name('chat.show');

    Route::post('/chat/{chat}/message', [ChatController::class, 'create'] )
        ->name('chat.create');

    Route::get('/admin/chat/user/{user}', [ChatController::class, 'loadUserChat'])
        ->middleware('auth');

    Route::get('/admin/chat/user/{user}', [ChatController::class, 'openUserChat'])
        ->middleware(['auth', 'admin']);


});
