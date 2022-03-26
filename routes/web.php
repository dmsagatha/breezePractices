<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('import-users', [UserController::class, 'index']);
Route::post("parse-csv", [UserController::class, 'importUsers'])->name('parse-csv');

require __DIR__.'/auth.php';
