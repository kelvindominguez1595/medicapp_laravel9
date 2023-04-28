<?php

use App\Http\Controllers\ProveedoresController;
use App\Models\Proveedores;
use App\Http\Controllers\CategoriaController;
use App\Models\Categoria;
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

Route::get('/', [ProveedoresController::class, 'index'])->name('proveedores.index');
Route::get('/create', [ProveedoresController::class, 'create'])->name('proveedores.create');
Route::get('/edit/{id}', [ProveedoresController::class, 'edit'])->name('proveedores.edit');
Route::get('/show/{id}', [ProveedoresController::class, 'show'])->name('proveedores.show');

Route::post('/store', [ProveedoresController::class, 'store'])->name('proveedores.store');
Route::put('/update/{id}', [ProveedoresController::class, 'update'])->name('proveedores.update');
Route::delete('/destroy/{id}', [ProveedoresController::class, 'destroy'])->name('proveedores.destroy');

Route::resource("categorias",CategoriaController::class);