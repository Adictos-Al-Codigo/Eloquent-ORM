<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Models\Categorias;

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
    return view('welcome');
});

Route::get('/Home', [ProductoController::class,'HomeVista'])->name('Principal');
Route::get('/Productos', [ProductoController::class,'ProductoVista'])->name('Principal/Productos');
Route::get('/Categorias', [ProductoController::class,'CategoriaVista'])->name('Principal/Categorias');
Route::get('/Categorias/Crear',[ProductoController::class,'CrearCategoria'])->name('crear-categorias');
Route::post('/CategoriasSave',[ProductoController::class,'CategoriaSave'])->name('CategoriasSave');
Route::get('/Categorias/Editar/{id}',[ProductoController::class,'CategoriaEdit'])->name('Categorias-Edit');
Route::post('/Categoria/Actualizar/{id}', [ProductoController::class, 'CategoriaUpdate'])->name('CategoriaUpdate');
Route::get('/Categoria/Eliminar/{id}', [ProductoController::class, 'CategoriaDelete'])->name('CategoriaEliminar');

Route::get('/Productos-Crear', function(){
    $Categoria = Categorias::all();
    return view('layouts.crear_productos', compact('Categoria'));
})->name('Productos-Crear');
Route::post('/ProductosSave',[ProductoController::class,'ProductoSave'])->name('ProductosSave');
Route::get('/Productos/Edit/{id}',[ProductoController::class,'ProductosEdit'])->name('ProductosEdit');
Route::post('/Productos/Update/{id}',[ProductoController::class,'ProductosUpdate'])->name('ProductosUpdate');
Route::get('/Productos/Delete/{id}',[ProductoController::class,'DeleteProducto'])->name('ProductosDelete');
Route::get('/Productos/Categoria/{id}',[ProductoController::class, 'CategoriaProducto'])->name('ProductosCategorias');
Route::get('/Productos/Foto/{id}', [ProductoController::class, 'VistaFoto'])->name('Fotos');
Route::post('/Productos/Foto/Guardar/{id}', [ProductoController::class, 'FotosGuardar'])->name('SavePhoto');
Route::get('/Productos/Fotos/Delete/{producto_id}/{foto_id}',[ProductoController::class, 'DeletePhoto'])->name('DeletePhoto');

