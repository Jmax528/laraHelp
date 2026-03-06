<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;

Route::view('/', 'home');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); // Redirect to login or homepage
})->name('logout');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('/create', 'create');

require __DIR__.'/auth.php';

Route::view('/faq', 'faq' );

Route::middleware('auth')->group(function () {

    // 👤 Regular user: open OWN chat (create if needed)
    Route::get('/chat', [ChatController::class, 'userChat'])
        ->name('chat.user');

    Route::post('/chat/store', [ChatController::class, 'storeCreateChat'])
        ->name('chat.store');

    Route::get('/chat/{chat}/closed', [ChatController::class, 'closeChat'])
        ->name('chat.closed');

    // 🛡 Admin: open chat with a specific user
    Route::get('/admin/chat/user/{user}', [ChatController::class, 'openUserChat'])
        ->middleware('admin')
        ->name('chat.admin.open');

    // Show an existing chat
    Route::get('/chat/{chat}', [ChatController::class, 'show'])
        ->name('chat.show');

    // ✉ Send message
    Route::post('/chat/{chat}/message', [ChatController::class, 'sendMessage'])
        ->name('chat.sendMessage');

});

