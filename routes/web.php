<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ADMINISTRACION\HomeController;

use App\Http\Controllers\PRODUCTO\ProductoController;
use App\Http\Controllers\PROVEEDOR\ProveedorController;
use App\Http\Controllers\FACTURA\FacturaController;
use App\Http\Controllers\Categorias\CategoriaController;
use App\Http\Controllers\Usuarios\UsuarioControlle;
use App\Http\Controllers\Cliente\ClientesController;
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

Route::get('/',[HomeController::class, 'inicio']);

Route::get('iniciar',[HomeController::class, 'login'])->middleware('auth')->name('iniciar');
 


Route::get('/dashboard',[HomeController::class, 'raiz'])->middleware('auth')->name('dashboard');
require __DIR__.'/auth.php';

////////////////////////////// Rutas 

//Admin

//Productos
Route::get('producto/formregistro',[ProductoController::class, 'formproducto'])->middleware('auth')->middleware(['admin']);//Lista
Route::POST('producto/registro',[ProductoController::class, 'registro'])->middleware('auth')->middleware(['admin']);//Lista


Route::get('producto/lista',[ProductoController::class, 'listaproducto'])->middleware('auth')->middleware(['admin']);  //Lista

Route::POST('producto/buscar',[ProductoController::class, 'buscar'])->middleware('auth')->middleware(['admin']);

Route::get('producto/actualizar/{Idproducto}', [ProductoController::class, 'formactualizar'])->name('actualizarPro')->middleware('auth')->middleware(['admin']);
Route::post('producto/actualizar/{Idproducto}', [ProductoController::class, 'actualizar'])->name('actualizarProducto')->middleware('auth')->middleware(['admin']);

Route::get('producto/eliminar/{Idproducto}', [ProductoController::class, 'eliminar'])->name('eliminarProducto')->middleware(['admin']);
Route::get('producto/activar/{Idproducto}', [ProductoController::class, 'activar'])->name('activarProducto')->middleware(['admin']);


//Proveedores
Route::get('proveedor/formregistro',[ProveedorController::class, 'formproveedor'])->middleware('auth')->middleware(['admin']);//Lista
Route::POST('proveedor/registro',[ProveedorController::class, 'registro'])->middleware('auth')->middleware(['admin']);//Lista

Route::get('proveedor/lista',[ProveedorController::class, 'listaproveedor'])->middleware('auth')->middleware(['admin']);//lista
//Route::get('proveedor/visualizar',[ProveedorController::class, 'showClientes']);

Route::get('proveedor/buscar',[ProveedorController::class, 'formbuscar'])->middleware('auth')->middleware(['admin']);
Route::POST('proveedor/buscar',[ProveedorController::class, 'buscar'])->middleware('auth')->middleware(['admin']);

Route::get('proveedor/actualizar/{Idproveedor}', [ProveedorController::class, 'formactualizar'])->name('actualizarProve')->middleware('auth')->middleware(['admin']);
Route::post('proveedor/actualizar/{Idproveedor}', [ProveedorController::class, 'actualizar'])->name('actualizarProveedor')->middleware('auth')->middleware(['admin']);

Route::get('proveedor/eliminar/{Idproveedor}', [ProveedorController::class, 'eliminar'])->name('eliminarProve')->middleware(['admin']);
Route::get('proveedor/activar/{Idcategoria}', [ProveedorController::class, 'activar'])->name('activarProveedor')->middleware(['admin']);

//Items
Route::get('item/lista/{idfac}',[ItemController::class, 'listaitem'])->middleware('auth')->middleware(['admin']);

//Categoria
Route::get('categoria/formcategoria',[CategoriaController::class, 'formcategoria'])->middleware('auth')->middleware(['admin']);//Lista
Route::POST('categoria/formcategoria',[CategoriaController::class, 'regcategoria'])->middleware('auth')->middleware(['admin']);//Lista

Route::get('categoria/lista',[CategoriaController::class, 'listacategoria'])->middleware('auth')->middleware(['admin']);//lista

Route::POST('categoria/buscar',[CategoriaController::class, 'buscar'])->middleware('auth')->middleware(['admin']);

Route::get('categoria/actualizar/{Idcategoria}', [CategoriaController::class, 'formactualizar'])->name('actualizarCat')->middleware('auth')->middleware(['admin']);
Route::post('categoria/actualizar/{Idcategoria}', [CategoriaController::class, 'actualizar'])->name('actualizarCategoria')->middleware('auth')->middleware(['admin']);

Route::get('categoria/eliminar/{Idcategoria}', [CategoriaController::class, 'eliminar'])->name('eliminarCategoria')->middleware(['admin']);
Route::get('categoria/activar/{Idcategoria}', [CategoriaController::class, 'activar'])->name('activarCategoria')->middleware(['admin']);



//Proveedores
Route::get('usuario/formregistro',[UsuarioControlle::class, 'formusuario'])->middleware('auth')->middleware(['admin']);//Lista
Route::POST('usuario/registro',[UsuarioControlle::class, 'registro'])->middleware('auth')->middleware(['admin']);//Lista

Route::get('usuario/lista',[UsuarioControlle::class, 'listausuario'])->middleware('auth')->middleware(['admin']);//lista

Route::POST('usuario/buscar',[UsuarioControlle::class, 'buscar'])->middleware('auth')->middleware(['admin']);

Route::get('usuario/actualizar/{id}', [UsuarioControlle::class, 'formactualizar'])->name('actualizarUsu')->middleware('auth')->middleware(['admin']);
Route::post('usuario/actualizar/{id}', [UsuarioControlle::class, 'actualizar'])->name('actualizarUsuario')->middleware('auth')->middleware(['admin']);

Route::get('usuario/eliminar/{id}', [UsuarioControlle::class, 'eliminar'])->name('eliminarUsu')->middleware(['admin']);
Route::get('usuario/activar/{id}', [UsuarioControlle::class, 'activar'])->name('activarUsuario')->middleware(['admin']);

//Factura

Route::get('factura/formregistro',[FacturaController::class, 'formfactura'])->middleware('auth')->middleware(['admin']);
Route::POST('factura/registro',[FacturaController::class, 'registro'])->middleware('auth')->middleware(['admin']);

Route::get('factura/lista',[FacturaController::class, 'listafactura'])->middleware('auth')->middleware(['admin']);//lista
//Route::get('Factura/visualizar',[FacturaController::class, 'showClientes']);

Route::POST('factura/buscar',[FacturaController::class, 'buscar'])->middleware('auth')->middleware(['admin']);

Route::get('factura/actualizar/{Idfactura}', [FacturaController::class, 'formactualizar'])->name('actualizarFac')->middleware('auth')->middleware(['admin']);
Route::post('factura/actualizar/{Idfactura}', [FacturaController::class, 'actualizar'])->name('actualizarFactura')->middleware('auth')->middleware(['admin']);

Route::get('factura/eliminar/{Idfactura}', [FacturaController::class, 'eliminar'])->middleware('auth')->name('eliminarFac')->middleware(['admin']);
Route::get('factura/activar/{Idfactura}', [FacturaController::class, 'activar'])->middleware('auth')->name('activarFactura')->middleware(['admin']);

Route::get('factura/detalle/{Idfactura}', [FacturaController::class, 'facdetalle'])->middleware('auth')->name('facdetalle')->middleware(['admin']);

///===================================Clientes

Route::get('cliente/lista',[ClientesController::class, 'listaproducto']);  //Lista

Route::get('cliente/detalle/{Idproducto}', [ClientesController::class, 'detalle'])->name('clienteDet');


Route::get('cliente/listar/{Idcategoria}', [ClientesController::class, 'listar'])->name('clienteLis');

Route::POST('cliente/buscar',[ClientesController::class, 'buscar'])->middleware('auth');

Route::POST('cliente/item',[ClientesController::class, 'agregar'])->middleware('auth');