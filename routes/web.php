<?php

use App\Http\Controllers\TodosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tareas',[TodosController::class,'index'])->name('todos');

Route::post('/tareas',[TodosController::class,'store'])->name('todos');

Route::get('/tareas/{id}',[TodosController::class,'show'])->name('todos-edit');

Route::patch('/tareas/{id}',[TodosController::class,'update'])->name('todos-update');

Route::delete('/tareas/{id}',[TodosController::class,'destroy'])->name('todos-destroy');

Route::resource('categories',CategoriesController::class);