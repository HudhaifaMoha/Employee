<?php

use App\Http\Controllers\EmployeeCardController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/employee/{slug}/card', [EmployeeCardController::class, 'show'])->name('employee.card');
Route::get('/employee/{slug}/verify', [EmployeeCardController::class, 'verify'])->name('employee.verify');