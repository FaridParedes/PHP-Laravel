<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\BodegaController;
use App\Http\Controllers\ProducController;
use App\Http\Controllers\SalidaController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProveedorController;

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

Route::get('/home', function () {
    return view('home');
})->middleware(['auth']);

/* Rutas productos */
Route::get('products/show', [ProducController::class, 'index'])->middleware(['auth']);

Route::get('products/create',[ProducController::class, 'create'])->middleware(['admin']);

Route::post('/products/store', [ProducController::class, 'store'])->middleware(['admin']);

Route::get('/products/edit/{product}', [ProducController::class, 'edit'])->middleware(['admin']);

Route::put('/products/update/{product}', [ProducController::class, 'update'])->middleware(['admin']);

Route::delete('/products/destroy/{id}', [ProducController::class, 'destroy'])->middleware(['admin']);

/* Rutas bodegas */

Route::get('bodegas/show', [BodegaController::class, 'index'])->middleware(['auth']);

Route::get('bodegas/create',[BodegaController::class, 'create'])->middleware(['admin']);

Route::match(['get', 'post'], '/bodegas/content', [BodegaController::class, 'show'])->middleware(['auth']);

Route::get('/bodegas/content/edit/{bodega}', [BodegaController::class, 'content_edit'])->middleware(['admin']);

Route::put('/bodegas/content/update/{bodega}', [BodegaController::class, 'content_update'])->middleware(['admin']);

Route::delete('/bodegas/content/destroy/{id}', [BodegaController::class, 'content_destroy'])->middleware(['admin']);

Route::post('/bodegas/store', [BodegaController::class, 'store'])->middleware(['admin'])->middleware(['admin']);

Route::get('/bodegas/edit/{bodega}', [BodegaController::class, 'edit'])->middleware(['admin']);

Route::put('/bodegas/update/{bodega}', [BodegaController::class, 'update'])->middleware(['admin']);

Route::delete('/bodegas/destroy/{id}', [BodegaController::class, 'destroy'])->middleware(['admin']);

/* Rutas marcas */

Route::get('marcas/show', [MarcaController::class, 'index'])->middleware(['auth']);

Route::get('marcas/create',[MarcaController::class, 'create'])->middleware(['admin']);

Route::post('/marcas/store', [MarcaController::class, 'store'])->middleware(['admin']);

Route::get('/marcas/edit/{marca}', [MarcaController::class, 'edit'])->middleware(['admin']);

Route::put('/marcas/update/{marca}', [MarcaController::class, 'update'])->middleware(['admin']);

Route::delete('/marcas/destroy/{id}', [MarcaController::class, 'destroy'])->middleware(['admin']);

/* Rutas categorias */

Route::get('categorias/show', [CategoriaController::class, 'index'])->middleware(['auth']);

Route::get('categorias/create',[CategoriaController::class, 'create'])->middleware(['admin']);

Route::post('/categorias/store', [CategoriaController::class, 'store'])->middleware(['admin']);

Route::get('/categorias/edit/{categoria}', [CategoriaController::class, 'edit'])->middleware(['admin']);

Route::put('/categorias/update/{categoria}', [CategoriaController::class, 'update'])->middleware(['admin']);

Route::delete('/categorias/destroy/{id}', [CategoriaController::class, 'destroy'])->middleware(['admin']);

/* Rutas proveedores */

Route::get('/proveedores/show', [ProveedorController::class, 'index'])->middleware(['auth']);

Route::get('/proveedores/create',[ProveedorController::class, 'create'])->middleware(['admin']);

Route::post('/proveedores/store', [ProveedorController::class, 'store'])->middleware(['admin']);

Route::get('/proveedores/edit/{proveedor}', [ProveedorController::class, 'edit'])->middleware(['admin']);

Route::put('/proveedores/update/{proveedor}', [ProveedorController::class, 'update'])->middleware(['admin']);

Route::delete('/proveedores/destroy/{id}', [ProveedorController::class, 'destroy'])->middleware(['admin']);

/* Rutas entradas */

Route::get('/entradas/show', [EntradaController::class, 'index'])->middleware(['auth']);

Route::get('/entradas/create',[EntradaController::class, 'create'])->middleware(['admin']);

Route::post('/entradas/store', [EntradaController::class, 'store'])->middleware(['admin']);

Route::get('/entradas/edit/{entrada}', [EntradaController::class, 'edit'])->middleware(['admin']);

Route::put('/entradas/update/{entrada}', [EntradaController::class, 'update'])->middleware(['admin']);

Route::delete('/entradas/destroy/{id}', [EntradaController::class, 'destroy'])->middleware(['admin']);

/* Rutas salidas */

Route::get('/salidas/show', [SalidaController::class, 'index'])->middleware(['auth']);

Route::get('/salidas/create',[SalidaController::class, 'create'])->middleware(['admin']);

Route::post('/salidas/store', [SalidaController::class, 'store'])->middleware(['admin']);

Route::get('/salidas/edit/{salida}', [SalidaController::class, 'edit'])->middleware(['admin']);

Route::put('/salidas/update/{salida}', [SalidaController::class, 'update'])->middleware(['admin']);

Route::delete('/salidas/destroy/{id}', [SalidaController::class, 'destroy'])->middleware(['admin']);


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//rutas para generar reportes de Productos
Route::get('/reports/productos-bodegas',[ReportsController::class,'show'])->middleware(['ana'],['admin']);
Route::post('/reports/productos-bodegas/validate',[ReportsController::class,'validar'])->middleware(['ana'],['admin']);
//Route::get('/reports/productos-bodegas/show',[ReportsController::class,'productoxbodega'])->middleware(['ana'],['admin']);

//Rutas para generar reportes de Entradas
Route::get('/reports/entradas-bodegas',[ReportsController::class,'showE'])->middleware(['ana'],['admin']);
Route::post('/reports/entradas-bodegas/validate',[ReportsController::class,'validarE'])->middleware(['ana'],['admin']);
//Route::get('/reports/entradas-bodegas/show',[ReportsController::class,'entradaxbodega'])->middleware(['ana'],['admin']);

//Rutas para generar reportes de Salidas
Route::get('/reports/salidas-bodegas',[ReportsController::class,'showS'])->middleware(['ana'],['admin']);
Route::post('/reports/salidas-bodegas/validate',[ReportsController::class,'validarS'])->middleware(['ana'],['admin']);
//Route::get('/reports/salidas-bodegas/show',[ReportsController::class,'salidasxbodegas'])->middleware(['ana'],['admin']);

//Rutas para generar reportes de Productos x Marcas
Route::get('/reports/productos-marcas',[ReportsController::class,'showM'])->middleware(['ana'],['admin']);
Route::post('/reports/productos-marcas/validate',[ReportsController::class,'validarM'])->middleware(['ana'],['admin']);

//Rutas para generar reportes de Productos x Categorias
Route::get('/reports/productos-categorias',[ReportsController::class,'showC'])->middleware(['ana'],['admin']);
Route::post('/reports/productos-categorias/validate',[ReportsController::class,'validarC'])->middleware(['ana'],['admin']);