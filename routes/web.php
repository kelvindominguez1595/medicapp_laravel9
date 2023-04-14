<?php

use App\Http\Controllers\GenerosController;
use App\Http\Controllers\ProveedoresController;
use App\Models\Proveedores;
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

//RUTAS PARA GENEROS
Route::get('/generos', [GenerosController::class, 'index'])->name('generos.index'); //listar
Route::get('/generos/create', [GenerosController::class, 'create'])->name('generos.create'); //form crear
Route::post('/generos/store', [GenerosController::class, 'store'])->name('generos.store'); //functGuardar
Route::delete('generos/destroy/{id}', [GenerosController::class, 'destroy'])->name('generos.destroy'); //eliminar
Route::get('generos/edit/{id}', [GenerosController::class, 'edit'])->name('generos.edit'); //vistActualizar
Route::put('generos/update/{id}', [GenerosController::class, 'update'])->name('generos.update'); //functActualizar