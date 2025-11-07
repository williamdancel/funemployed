<?php

use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;

// ===================== CHAT API ROUTES =====================
Route::prefix('chat')->group(function () {
    Route::get('/stream', [ChatController::class, 'streamMessages']);
    Route::get('/messages', [ChatController::class, 'getMessages']);
    Route::post('/messages', [ChatController::class, 'sendMessage']);
    Route::get('/rooms', [ChatController::class, 'getRooms']);
});