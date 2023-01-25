<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/about', function () {
    return view('about');
})->name('about');


Route::get('/', [TodoController::class, 'index'])->name('index');
Route::post('/createtodo', [TodoController::class, 'create'])->name('createtodo');
Route::get('/deletetodo/{id}', [TodoController::class, 'delete'])->name('deletetodo');
Route::get('/updatetodo/{id}', [TodoController::class, 'update'])->name('updatetodo');


