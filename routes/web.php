<?php

use App\Http\Controllers\PhoneNumberAnalysisController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PhoneNumberAnalysisController::class, 'index'])->name('phone-numbers.index');
