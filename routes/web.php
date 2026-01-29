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

require __DIR__.'/auth.php';

Route::view('/faq', 'faq' );

Route::middleware('auth')->group(function () {

    // 👤 Regular user: open OWN chat (auto-create if needed)
    Route::get('/chat', [ChatController::class, 'userChat'])
        ->name('chat.user');

    // 🛡 Admin: open chat with a specific user
    Route::get('/admin/chat/user/{user}', [ChatController::class, 'openUserChat'])
        ->middleware('admin')
        ->name('chat.admin.open');

    // Show an existing chat
    Route::get('/chat/{chat}', [ChatController::class, 'show'])
        ->name('chat.show');

    // ✉ Send message
    Route::post('/chat/{chat}/message', [ChatController::class, 'create'])
        ->name('chat.create');

});

