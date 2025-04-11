<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Middleware\FirstMiddleware;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/register',[AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'create']);
Route::get('/admin', [AuthController::class, 'index'])->name('admin.index'); 
Route::post('/admin', [AuthController::class, 'admin']);
Route::get('/', [ContactController::class, 'index'])->name('contact.form');
Route::post('/confirm',[ContactController::class, 'confirm'])->name('confirm.form');
Route::post('/thanks',[ContactController::class,'create']);

