<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GenerosController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

/*Role::create(["name" => "admin"]);
Role::create(["name" => "lector"]);
*/
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])
        ->name('login');


Route::group(['middleware' => ['auth']], function() {
Route::get('/index', [ProveedoresController::class, 'index'])->name('proveedores.index');
Route::get('/create', [ProveedoresController::class, 'create'])->name('proveedores.create');
Route::get('/edit/{id}', [ProveedoresController::class, 'edit'])->name('proveedores.edit');
Route::get('/show/{id}', [ProveedoresController::class, 'show'])->name('proveedores.show');

Route::post('/store', [ProveedoresController::class, 'store'])->name('proveedores.store');
Route::put('/update/{id}', [ProveedoresController::class, 'update'])->name('proveedores.update');
Route::delete('/destroy/{id}', [ProveedoresController::class, 'destroy'])->name('proveedores.destroy');

// RUTAS PARA GENEROS
Route::get('/generos', [GenerosController::class, 'index'])->name('generos.index'); // listar
Route::get('/generos/create', [GenerosController::class, 'create'])->name('generos.create'); // form crear
Route::post('/generos/store', [GenerosController::class, 'store'])->name('generos.store'); // functGuardar
Route::delete('generos/destroy/{id}', [GenerosController::class, 'destroy'])->name('generos.destroy'); // eliminar
Route::get('generos/edit/{id}', [GenerosController::class, 'edit'])->name('generos.edit'); // vistActualizar
Route::put('generos/update/{id}', [GenerosController::class, 'update'])->name('generos.update'); // functActualizar
Route::resource('categorias', CategoriaController::class);

// RUTAS PARA USUARIOS
Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index'); // listar
Route::get('/usuarios/create', [UserController::class, 'create'])->name('usuarios.create'); // form crea
Route::get('usuarios/edit/{id}', [UserController::class, 'edit'])->name('usuarios.edit'); // vistActualizar

// RUTAS PARA ROLES
Route::get('/roles', [UserController::class, 'index'])->name('roles.index'); // listar
Route::get('/roles/create', [UserController::class, 'create'])->name('roles.index'); // form crea
Route::get('roles/edit/{id}', [UserController::class, 'edit'])->name('roles.index'); // vistActualizar
});



