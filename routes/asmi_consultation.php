<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Consultation\SenderConsultController;

Route::post('/send_consult', [SenderConsultController::class, "send_consultation"])->name('send_consultation');
Route::post('/send_subscribe', [SenderConsultController::class, "send_subscribe"])->name('send_subscribe');
Route::get('/thencs_consult', [SenderConsultController::class, "show_thencs"])->name('thencs_consult');
