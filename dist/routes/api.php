<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// WhatsApp Bot Webhook
Route::match(['get', 'post'], '/whatsapp/webhook', [App\Http\Controllers\WhatsAppBotController::class, 'handle']);
