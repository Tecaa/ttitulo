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
Route::get('/login', ['uses' => 'HomeController@login']);
Route::get('/logout', ['uses' => 'HomeController@logout', 'before' => 'auth']);
Route::post('/logeando', ['uses' => 'HomeController@logeando']);

Route::get('/producto/crear', ['uses' => 'ProductoController@crear', 'before' => 'administrador']);
Route::get('/producto/consultar/{codigo_producto}', ['uses' => 'ProductoController@consultar']);
Route::get('/producto/editar/{codigo_producto}', ['uses' => 'ProductoController@editar', 'before' => 'administrador']);
Route::get('/producto/eliminar', ['uses' => 'ProductoController@eliminar', 'before' => 'administrador']);
//Route::get('/producto/listar', ['uses' => 'ProductoController@listar']);
Route::get('/producto/categoria/{codigo_categoria}/{page?}', ['uses' => 'ProductoController@listarCategoria']);
Route::any('/producto/creando', ['uses' => 'ProductoController@creando', 'before' => 'administrador']);
Route::post('/producto/obtener', ['uses' => 'ProductoController@obtener']);
Route::any('/producto/editando/{codigo_producto}', ['uses' => 'ProductoController@editando', 'before' => 'administrador']);
Route::any('/producto/eliminando/{codigo_producto}', ['uses' => 'ProductoController@eliminando', 'before' => 'administrador']);
Route::any('/producto/activando/{codigo_producto}', ['uses' => 'ProductoController@activando', 'before' => 'administrador']);
Route::get('/producto/ajustar/{codigo_producto}', ['uses' => 'ProductoController@ajustar', 'before' => 'administrador']);
Route::any('/producto/ajustando/{codigo_producto}', ['uses' => 'ProductoController@ajustando', 'before' => 'administrador']);
Route::get('/producto/stockCritico', ['uses' => 'ProductoController@stockCritico', 'before' => 'administrador']);

Route::get('/quienesSomos', ['uses'=> 'HomeController@quienesSomos']);

Route::get('/iniciarSesion', ['uses'=> 'HomeController@iniciarSesion']);

Route::get('/contacto', ['uses'=> 'HomeController@contacto']);
//Form request:: POST action will trigger to controller
Route::post('/contacto/enviar','HomeController@enviarContacto');

Route::get('/categorias/crear', ['uses' => 'CategoriasController@crear', 'before' => 'administrador']);
Route::get('/categorias/consultar', ['uses' => 'CategoriasController@consultar']);
Route::any('/categorias/creando', ['uses' => 'CategoriasController@creando', 'before' => 'administrador']);
Route::get('/categorias/editar/{cod_categoria}', ['uses' => 'CategoriasController@editar', 'before' => 'administrador']);
Route::any('/categorias/editando/{cod_categoria}', ['uses' => 'CategoriasController@editando', 'before' => 'administrador']);
Route::get('/categorias/eliminar', ['uses' => 'CategoriasController@eliminar', 'before' => 'administrador']);
Route::any('/categorias/eliminando/{cod_categoria}', ['uses' => 'CategoriasController@eliminando', 'before' => 'administrador']);

Route::get('/laboratorios/crear', ['uses' => 'LaboratoriosController@crear', 'before' => 'administrador']);
Route::any('/laboratorios/creando', ['uses' => 'LaboratoriosController@creando', 'before' => 'administrador']);
Route::get('/laboratorios/consultar', ['uses' => 'LaboratoriosController@consultar']);
Route::get('/laboratorios/editar/{cod_laboratorio}', ['uses' => 'LaboratoriosController@editar', 'before' => 'administrador']);
Route::any('/laboratorios/editando/{cod_laboratorio}', ['uses' => 'LaboratoriosController@editando', 'before' => 'administrador']);
Route::get('/laboratorios/eliminar', ['uses' => 'LaboratoriosController@eliminar', 'before' => 'administrador']);
Route::any('/laboratorios/eliminando/{cod_laboratorio}', ['uses' => 'LaboratoriosController@eliminando', 'before' => 'administrador']);

Route::get('/proveedores/crear', ['uses' => 'ProveedoresController@crear', 'before' => 'administrador']);
Route::any('/proveedores/creando', ['uses' => 'ProveedoresController@creando', 'before' => 'administrador']);
Route::get('/proveedores/consultar', ['uses' => 'ProveedoresController@consultar']);
Route::get('/proveedores/editar/{cod_prov}', ['uses' => 'ProveedoresController@editar', 'before' => 'administrador']);
Route::any('/proveedores/editando/{cod_prov}', ['uses' => 'ProveedoresController@editando', 'before' => 'administrador']);
Route::get('/proveedores/eliminar', ['uses' => 'ProveedoresController@eliminar', 'before' => 'administrador']);
Route::get('/proveedores/eliminando/{cod_prov}', ['uses' => 'ProveedoresController@eliminando', 'before' => 'administrador']);

Route::get('/bancos/crear', ['uses' => 'BancosController@crear', 'before' => 'administrador']);
Route::any('/bancos/creando', ['uses' => 'BancosController@creando', 'before' => 'administrador']);
Route::get('/bancos/consultar', ['uses' => 'BancosController@consultar']);
Route::get('/bancos/editar/{cod_banco}', ['uses' => 'BancosController@editar', 'before' => 'administrador']);
Route::any('/bancos/editando/{cod_banco}', ['uses' => 'BancosController@editando', 'before' => 'administrador']);
Route::get('/bancos/eliminar', ['uses' => 'BancosController@eliminar', 'before' => 'administrador']);
Route::any('/bancos/eliminando/{cod_banco}', ['uses' => 'BancosController@eliminando', 'before' => 'administrador']);

Route::get('/ciudades/crear', ['uses' => 'CiudadesController@crear', 'before' => 'administrador|vendedor']);
Route::any('/ciudades/creando', ['uses' => 'CiudadesController@creando', 'before' => 'administrador|vendedor']);
Route::get('/ciudades/consultar', ['uses' => 'CiudadesController@consultar']);
Route::get('/ciudades/editar/{cod_ciudad}', ['uses' => 'CiudadesController@editar', 'before' => 'vendedor']);
Route::any('/ciudades/editando/{cod_ciudad}', ['uses' => 'CiudadesController@editando', 'before' => 'vendedor']);
Route::get('/ciudades/eliminar/cod_ciudad', ['uses' => 'CiudadesController@eliminar', 'before' => 'vendedor']);
Route::any('/ciudades/eliminando/{cod_ciudad}', ['uses' => 'CiudadesController@eliminando', 'before' => 'vendedor']);

Route::get('/vendedor/crear', ['uses' => 'VendedoresController@crear', 'before' => 'administrador']);
Route::any('/vendedor/creando', ['uses' => 'VendedoresController@creando', 'before' => 'administrador']);
Route::get('/vendedor/consultar', ['uses' => 'VendedoresController@consultar']);
Route::get('/vendedor/editar/{rut}', ['uses' => 'VendedoresController@editar', 'before' => 'administrador']);
Route::any('/vendedor/editando/{rut}', ['uses' => 'VendedoresController@editando', 'before' => 'administrador']);
Route::get('/vendedor/eliminar', ['uses' => 'VendedoresController@eliminar', 'before' => 'administrador']);
Route::any('/vendedor/eliminando/{rut}', ['uses' => 'VendedoresController@eliminando', 'before' => 'administrador']);

Route::get('/cliente/crear', ['uses' => 'ClientesController@crear', 'before' => 'vendedor']);
Route::get('/cliente/registrarse', ['uses' => 'ClientesController@registrar']);
Route::any('/cliente/creando', ['uses' => 'ClientesController@creando', 'before' => 'vendedor']);
Route::any('/cliente/registrando', ['uses' => 'ClientesController@registrando']);
Route::get('/cliente/consultar', ['uses' => 'ClientesController@consultar']);
Route::get('/cliente/editar/{rut}', ['uses' => 'ClientesController@editar', 'before' => 'vendedor']);
Route::any('/cliente/editando/{rut}', ['uses' => 'ClientesController@editando', 'before' => 'vendedor']);
Route::get('/cliente/eliminar', ['uses' => 'ClientesController@eliminar', 'before' => 'vendedor']);
Route::any('/cliente/eliminando/{rut}', ['uses' => 'ClientesController@eliminando', 'before' => 'vendedor']);


Route::get('/listado/productos', ['uses' => 'ListadoController@productos', 'before' => 'vendedor']);
Route::get('/listado/eliminados', ['uses' => 'ListadoController@eliminados', 'before' => 'administrador']);
Route::get('/listado/proveedores', ['uses' => 'ListadoController@proveedores', 'before' => 'administrador']);
Route::get('/agendaProveedores', ['uses' => 'ListadoController@agendaProveedores', 'before' => 'administrador']);
Route::get('/listado/categorias', ['uses' => 'ListadoController@categorias', 'before' => 'vendedor']);
Route::get('/listado/laboratorios', ['uses' => 'ListadoController@laboratorios', 'before' => 'vendedor']);
Route::get('/listado/compras', ['uses' => 'ListadoController@compras', 'before' => 'administrador']);
Route::get('/listado/pedidos', ['uses' => 'ListadoController@listadoPedido', 'before' => 'vendedor']);
Route::get('/listado/carroCompras', ['uses' => 'ListadoController@carroCompras']);
Route::get('/listado/vendedores', ['uses' => 'ListadoController@listarVendedor', 'before' => 'administrador']);
Route::get('/listado/clientes', ['uses' => 'ListadoController@listadoClientes', 'before' => 'administrador']);
Route::get('/listado/bancos', ['uses' => 'ListadoController@listadoBancos', 'before' => 'administrador']);
Route::get('/listado/ciudades', ['uses' => 'ListadoController@listadoCiudades', 'before' => 'administrador']);
//Route::get('/listado/listarProductos', ['uses' => 'ListadoController@listProductos', 'before' => 'administrador']);
//Route::get('/listado/listarCat', ['uses' => 'ListadoController@listarCat', 'before' => 'administrador']);
//Route::get('/listado/listarLab', ['uses' => 'ListadoController@listarLab', 'before' => 'administrador']);
Route::get('/listado/ajustes', ['uses' => 'ListadoController@ajustes', 'before' => 'administrador']);

Route::get('/cosulta/laboratorios', ['uses' => 'ConsultasController@consultaLab']);

Route::any('/boleta/aceptarPedido/{cod_documento}', ['uses' => 'BoletaController@aceptarPedido', 'before' => 'vendedor']);
Route::any('/boleta/rechazarPedido/{cod_documento}', ['uses' => 'BoletaController@rechazarPedido', 'before' => 'vendedor']);
Route::get('/boleta/pedido/{cod_documento}', ['uses' => 'BoletaController@pedido', 'before' => 'vendedor']);
Route::get('/boleta/historial', ['uses' => 'BoletaController@historial', 'before' => 'administrador']);
Route::get('/boleta/{cod_documento}', ['uses' => 'BoletaController@detalle', 'before' => 'administrador']);
Route::get('/facturas/{cod_documento}', ['uses' => 'FacturaController@detalle', 'before' => 'administrador']);

Route::post('/venta/pedido', ['uses' => 'BoletaController@crearPedido', 'before' => 'auth']);
Route::get('/venta/local', ['uses' => 'BoletaController@ventaLocal', 'before' => 'vendedor']);
Route::post('/venta/local/crear', ['uses' => 'BoletaController@crearboleta', 'before' => 'vendedor']);
Route::get('/venta/internet/{cod_documento}', ['uses' => 'BoletaController@ventaInternet', 'before' => 'vendedor']);
//Route::get('/venta/ordenCompra', ['uses' => 'BoletaController@ordenCompra']);
Route::get('/compra/factura', ['uses' => 'FacturaController@factura', 'before' => 'administrador']);
Route::post('/compra/factura/crear', ['uses' => 'FacturaController@crearFactura', 'before' => 'administrador']);

Route::get('/venta/internet/pago', ['uses' => 'PagoController@pago', 'before' => 'vendedor']);

Route::get('/sesion', ['uses' => function() {
  if (Auth::user()->tipo_usuario == "administrador")
    return Redirect::to('/sesion/administrador'); 
  else if (Auth::user()->tipo_usuario == "cliente")
    return Redirect::to('/sesion/cliente'); 
    //return Redirect::to('/'); 
  if (Auth::user()->tipo_usuario == "vendedor")
    return Redirect::to('/sesion/vendedor'); 
  
  }, 'before' => 'auth']);

Route::get('/sesion/cliente', ['uses' => 'HomeController@cliente', 'before' => 'cliente']);
Route::get('/sesion/vendedor', ['uses' => 'HomeController@vendedor', 'before' => 'vendedor']);
Route::get('/sesion/administrador', ['uses' => 'HomeController@administrador', 'before' => 'administrador']);

Route::get('/informe/opcion', ['uses' => 'InformeController@opcion', 'before' => 'vendedor']);