<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\TodosController;
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

Route::get('/', function () {
    return redirect()->route('todos');
});

Route::get('/todos', [TodosController::class, 'index'])->name('todos');

Route::post('/todos', [TodosController::class, 'store'])->name('todos');

Route::get('/todos/{id}', [TodosController::class, 'show'])->name('todos-show');

Route::patch('/todos/{id}', [TodosController::class, 'edit'])->name('todos-edit');

Route::delete('/todos/{id}', [TodosController::class, 'delete'])->name('todos-delete');


Route::get('/categories', [CategorieController::class, 'index'])->name('categories');

Route::get('/categories/{id}', [CategorieController::class, 'show'])->name('categories-show');

Route::post('/categories', [CategorieController::class, 'store'])->name('categories-store');

Route::patch('/categories/{id}', [CategorieController::class, 'update'])->name('categories-update');

Route::delete('/categories/{id}', [CategorieController::class, 'destroy'])->name('categories-delete');
