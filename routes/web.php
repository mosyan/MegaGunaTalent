<?php

use App\Http\Controllers\GermanCourseController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GermanCourseController::class, 'index'])->name('home');
Route::get('/enroll-now', [GermanCourseController::class, 'enroll'])->name('enroll');
Route::post('/enroll-now', [GermanCourseController::class, 'storeEnrollment'])->name('enroll.store');
