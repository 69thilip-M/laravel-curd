<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/students', [StudentController::class, 'index']);
Route::get('/students/create', [StudentController::class, 'create']);
Route::post('/students/create', [StudentController::class, 'store']);
Route::get('/students/edit/{id}', [StudentController::class, 'edit']);
Route::put('/students/edit/{id}', [StudentController::class, 'update']);
Route::get('/students/delete/{id}', [StudentController::class, 'destroy']);
