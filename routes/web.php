<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProductoController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [HomeController::class, 'logout']);


//Marcas
Route::name('marca.')->prefix('/marcas')->group(function () {
    Route::get('/', [MarcaController::class, 'index'])->name('index');
    Route::get('/nuevo', [MarcaController::class, 'create'])->name('create');
    Route::post('/save', [MarcaController::class, 'save'])->name('save');
    Route::get('/editar/{id}', [MarcaController::class, 'edit'])->name('edit');
    Route::post('/editar/{id}', [MarcaController::class, 'update'])->name('update');
    Route::get('/eliminar/{id}', [MarcaController::class, 'remove'])->name('remove');
});


Route::name('producto.')->prefix('/productos')->group(function () {
    Route::get('/', [ProductoController::class, 'index'])->name('index');
    Route::get('/nuevo', [ProductoController::class, 'create'])->name('create');
    Route::post('/save', [ProductoController::class, 'save'])->name('save');
    Route::get('/editar/{id}', [ProductoController::class, 'edit'])->name('edit');
    Route::post('/editar/{id}', [ProductoController::class, 'update'])->name('update');
    Route::get('/eliminar/{id}', [ProductoController::class, 'remove'])->name('remove');
});