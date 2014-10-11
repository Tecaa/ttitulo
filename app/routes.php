<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('/', ['uses' => 'HomeController@index']);

Route::get('/producto/crear', ['uses' => 'ProductoController@crear']);
Route::get('/producto/consultar', ['uses' => 'ProductoController@consultar']);
Route::get('/producto/editar', ['uses' => 'ProductoController@editar']);
Route::get('/producto/eliminar', ['uses' => 'ProductoController@eliminar']);

Route::get('/quienesSomos', ['uses'=> 'HomeController@quienesSomos']);

Route::get('/iniciarSesion', ['uses'=> 'HomeController@iniciarSesion']);

Route::get('/contacto', ['uses'=> 'HomeController@contacto']);

Route::get('/categorias/crear', ['uses' => 'CategoriasController@crear']);
Route::get('/categorias/consultar', ['uses' => 'CategoriasController@consultar']);
Route::get('/categorias/editar', ['uses' => 'CategoriasController@editar']);
Route::get('/categorias/eliminar', ['uses' => 'CategoriasController@eliminar']);

Route::get('/laboratorios/crear', ['uses' => 'LaboratoriosController@crear']);
Route::get('/laboratorios/consultar', ['uses' => 'LaboratoriosController@consultar']);
Route::get('/laboratorios/editar', ['uses' => 'LaboratoriosController@editar']);
Route::get('/laboratorios/eliminar', ['uses' => 'LaboratoriosController@eliminar']);

Route::get('/proveedores/crear', ['uses' => 'ProveedoresController@crear']);
Route::get('/proveedores/consultar', ['uses' => 'ProveedoresController@consultar']);
Route::get('/proveedores/editar', ['uses' => 'ProveedoresController@editar']);
Route::get('/proveedores/eliminar', ['uses' => 'ProveedoresController@eliminar']);

Route::get('/bancos/crear', ['uses' => 'BancosController@crear']);
Route::get('/bancos/consultar', ['uses' => 'BancosController@consultar']);
Route::get('/bancos/editar', ['uses' => 'BancosController@editar']);
Route::get('/bancos/eliminar', ['uses' => 'BancosController@eliminar']);

Route::get('/ciudades/crear', ['uses' => 'CiudadesController@crear']);
Route::get('/ciudades/consultar', ['uses' => 'CiudadesController@consultar']);
Route::get('/ciudades/editar', ['uses' => 'CiudadesController@editar']);
Route::get('/ciudades/eliminar', ['uses' => 'CiudadesController@eliminar']);

Route::get('/region/crear', ['uses' => 'RegionesController@crear']);
Route::get('/region/consultar', ['uses' => 'RegionesController@consultar']);
Route::get('/region/editar', ['uses' => 'RegionesController@editar']);
Route::get('/region/eliminar', ['uses' => 'RegionesController@eliminar']);

Route::get('/vendedor/crear', ['uses' => 'VendedoresController@crear']);
Route::get('/vendedor/consultar', ['uses' => 'VendedoresController@consultar']);
Route::get('/vendedor/editar', ['uses' => 'VendedoresController@editar']);
Route::get('/vendedor/eliminar', ['uses' => 'VendedoresController@eliminar']);

Route::get('/cliente/crear', ['uses' => 'ClientesController@crear']);
Route::get('/cliente/consultar', ['uses' => 'ClientesController@consultar']);
Route::get('/cliente/editar', ['uses' => 'ClientesController@editar']);
Route::get('/cliente/eliminar', ['uses' => 'ClientesController@eliminar']);

Route::get('/ventas', ['uses' => 'ListadosController@ventas']);

Route::get('/producto/creando', ['uses' => 'ProductoController@creando']);

Route::get('/listados/productos', ['uses' => 'ListadoController@productos']);