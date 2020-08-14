<?php

//--------------------------------------------------------------------------
// RUTAS PARA VISITANTE DE LA PAGINA
//--------------------------------------------------------------------------

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');

Route::get('/productoWeb', 'ProductoController@leerWeb')->name('productoWeb');

Route::get('/receta-principal', 'RecetaController@leerprincipal')->name('receta-principal');


//--------------------------------------------------------------------------
// RUTAS CON AUTENTIFICACION 
//--------------------------------------------------------------------------

Route::group(['middleware' => 'auth'], function(){
// principal
// ────────────────────────────────────────────────────────────────────────────────
Route::get('/principal', 'AdminController@mostrar')->name('principal');

// Usuarios
// ────────────────────────────────────────────────────────────────────────────────
Route::get('/user', 'UsuarioController@leer')->name('user');

Route::get('/user_editar/{id}', 'UsuarioController@editar')->name('editarUser');

Route::put('/user_editar/{id}', 'UsuarioController@update')->name('updateUser');

Route::delete('/bajaUser/{id}', 'UsuarioController@baja')->name('bajaUser');

Route::get('/userpdf', 'UsuarioController@exporPdf')->name('userpdf');


// Empleado
// ────────────────────────────────────────────────────────────────────────────────
Route::get('/empleado', 'UsuarioController@leerEmpleado')->name('empleado');

Route::get('/empleado_alta', 'UsuarioController@accederEmpleado')->name('empleado_alta');

Route::post('/altaEmpleado', 'UsuarioController@altaEmpleado')->name('altaEmpleado');

Route::get('/empleado_editar/{id}', 'UsuarioController@editarEmpleado')->name('editarEmpleado');

Route::put('/empleado_editar/{id}', 'UsuarioController@updateEmpleado')->name('updateEmpleado');

Route::delete('/bajaEmpleado/{id}', 'UsuarioController@bajaEmpleado')->name('bajaEmpleado');


// notas
// ────────────────────────────────────────────────────────────────────────────────
Route::get('/notas', 'NotaController@leer')->name('notas');

Route::get('/notas-archivo', 'NotaController@archivo')->name('notas_archivo');

Route::get('/nota_alta', 'NotaController@acceder')->name('nota_alta');

Route::post('/altaNota', 'NotaController@alta')->name('altaNota');

Route::delete('/bajaNota/{id}', 'NotaController@baja')->name('bajaNota');

Route::get('/nota-archivar/{id}', 'NotaController@archivarNota')->name('archivarNota');


// comentario
// ────────────────────────────────────────────────────────────────────────────────
Route::get('/comentario', 'ComentarioController@mostrar')->name('comentario');

Route::get('/comentario', 'ComentarioController@leer')->name('comentario');


// proveedor
// ────────────────────────────────────────────────────────────────────────────────
Route::get('/proveedor', 'ProveedorController@leer')->name('proveedor');

Route::get('/proveedor_alta', 'ProveedorController@acceder')->name('proveedor_alta');

Route::post('/altaProveedor', 'ProveedorController@alta')->name('altaProveedor');

Route::get('/proveedor_editar/{id}', 'ProveedorController@editar')->name('proveedor_editar');

Route::put('/updateProveedor/{id}', 'ProveedorController@update')->name('updateProveedor');

Route::delete('/bajaProveedor/{id}', 'ProveedorController@baja')->name('bajaProveedor');


// tipomateriaprima
// ────────────────────────────────────────────────────────────────────────────────
Route::get('/tipomp', 'TipoMateriaPrimaController@leer')->name('tipomp');

Route::get('/tipomp_alta', 'TipoMateriaPrimaController@acceder')->name('tipomp_alta');

Route::post('/altaTipomp', 'TipoMateriaPrimaController@alta')->name('altaTipomp');

Route::get('/tipomp_editar/{id}', 'TipoMateriaPrimaController@editar')->name('editarTipomp');

Route::put('/tipomp_editar/{id}', 'TipoMateriaPrimaController@update')->name('updateTipomp');

Route::delete('/bajaTipomp/{id}', 'TipoMateriaPrimaController@baja')->name('bajaTipomp');


// materiaprima
// ────────────────────────────────────────────────────────────────────────────────
Route::get('/materiaprima', 'MateriaPrimaController@leer')->name('materiaprima');

Route::get('/materiaprima_alta', 'MateriaPrimaController@acceder')->name('materiaprima_alta');

Route::post('/altaMateriaPrima', 'MateriaPrimaController@alta')->name('altaMateriaPrima');

Route::get('/materiaprima_editar/{id}', 'MateriaPrimaController@editar')->name('editarMateriaPrima');

Route::put('/materiaprima_editar/{id}', 'MateriaPrimaController@update')->name('updateMateriaPrima');

Route::delete('/bajaMateriaPrima/{id}', 'MateriaPrimaController@baja')->name('bajaMateriaPrima');


// planilla ingreso/egreso
// ────────────────────────────────────────────────────────────────────────────────
Route::get('/mpplanillaingresoegreso', 'PlantillaController@leer')->name('mpplanillaingresoegresos');

Route::get('/mpplanillaingresoegreso_alta', 'PlantillaController@acceder')->name('mpplanillaingresoegresos_alta');

Route::post('/altampplanillaingresoegreso', 'PlantillaController@alta')->name('altampplanillaingresoegresos');

Route::get('/mpplanillaingresoegreso_editar/{id}', 'PlantillaController@editar')->name('editarmpplanillaingresoegresos');

Route::put('/mpplanillaingresoegreso_editar/{id}', 'PlantillaController@update')->name('updatempplanillaingresoegresos');

Route::delete('/bajampplanillaingresoegreso/{id}', 'PlantillaController@baja')->name('bajampplanillaingresoegresos');

Route::get('/imprimir', 'PlantillaController@imprimir')->name('imprimir');

Route::get('/imprimir2', 'PlantillaController@imprimir2')->name('imprimir2');

Route::post('/altaNota2', 'PlantillaController@notastock')->name('notastock');


// receta
// ────────────────────────────────────────────────────────────────────────────────
Route::get('/receta', 'RecetaController@leer')->name('receta');

Route::get('/receta_alta', 'RecetaController@acceder')->name('receta_alta');

Route::post('/altaReceta', 'RecetaController@alta')->name('altaReceta');

Route::get('/receta_editar/{id}', 'RecetaController@editar')->name('editarReceta');

Route::put('/receta_editar/{id}', 'RecetaController@update')->name('updateReceta');

Route::delete('/bajaReceta/{id}', 'RecetaController@baja')->name('bajaReceta');


// producto
// ────────────────────────────────────────────────────────────────────────────────
Route::get('/producto', 'ProductoController@leer')->name('producto');

Route::get('/producto_alta', 'ProductoController@acceder')->name('producto_alta');

Route::post('/altaProducto', 'ProductoController@alta')->name('altaProducto');

Route::get('/producto_editar/{id}', 'ProductoController@editar')->name('editarProducto');

Route::put('/producto_editar/{id}', 'ProductoController@update')->name('updateProducto');

Route::delete('/bajaProducto/{id}', 'ProductoController@baja')->name('bajaProducto');


// foto
// ────────────────────────────────────────────────────────────────────────────────
Route::get('/foto', 'FotoController@leer')->name('foto');

Route::get('/foto_alta', 'FotoController@acceder')->name('foto_alta');

Route::post('/altaFoto', 'FotoController@alta')->name('altaFoto');

Route::get('/foto_editar/{id}', 'FotoController@editar')->name('editarFoto');

Route::put('/foto_editar/{id}', 'FotoController@update')->name('updateFoto');

Route::delete('/bajaFoto/{id}', 'FotoController@baja')->name('bajaFoto');


// Producto Precio
// ────────────────────────────────────────────────────────────────────────────────
Route::get('/productoprecio', 'ProductoPrecioController@leer')->name('productoprecio');

Route::get('/productoprecio_alta', 'ProductoPrecioController@acceder')->name('productoprecio_alta');

Route::post('/altaProductoPrecio', 'ProductoPrecioController@alta')->name('altaProductoPrecio');

Route::get('/productoprecio_editar/{id}', 'ProductoPrecioController@editar')->name('editarProductoPrecio');

Route::put('/productoprecio_editar/{id}', 'ProductoPrecioController@update')->name('updateProductoPrecio');

Route::delete('/bajaProductoPrecio/{id}', 'ProductoPrecioController@baja')->name('bajaProductoPrecio');


Route::get('/venta-principal/{id}', 'ProductoVentaController@leerprincipal')->name('venta-principal');

Route::post('/venta-principal', 'ProductoVentaController@pedido')->name('pedido');

Route::get('/carrito-compra', 'ProductoVentaController@leercarrito')->name('carrito');

Route::delete('/bajaProductoVenta2/{id}', 'ProductoVentaController@baja2')->name('bajaProductoVenta2');

Route::get('/confirmarcompra', 'ProductoVentaController@ConfirmarCompra')->name('ConfirmarCompra');

// Stock final
// ────────────────────────────────────────────────────────────────────────────────
Route::get('/stock', 'PlantillaController@stock')->name('stock');


// // Stock
// // ────────────────────────────────────────────────────────────────────────────────
// Route::get('/stock', 'StockController@leer')->name('stock');

// Route::get('/stock_alta', 'StockController@acceder')->name('stock_alta');

// Route::post('/altaStock', 'StockController@alta')->name('altaStock');

// Route::get('/stock_editar/{id}', 'StockController@editar')->name('editarStock');

// Route::put('/stock_editar/{id}', 'StockController@update')->name('updateStock');

// Route::delete('/bajaStock/{id}', 'StockController@baja')->name('bajaStock');


// Venta
// ────────────────────────────────────────────────────────────────────────────────
Route::get('/venta', 'VentaController@leer')->name('venta');

Route::get('/venta_alta', 'VentaController@acceder')->name('venta_alta');

Route::post('/altaVenta', 'VentaController@alta')->name('altaVenta');

Route::get('/venta_editar/{id}', 'VentaController@editar')->name('editarVenta');

Route::put('/venta_editar/{id}', 'VentaController@update')->name('updateVenta');

Route::delete('/bajaVenta/{id}', 'VentaController@baja')->name('bajaVenta');


// Producto-Venta
// ────────────────────────────────────────────────────────────────────────────────
Route::get('/productoventa', 'ProductoVentaController@leer')->name('productoventa');

Route::get('/productoventa_alta', 'ProductoVentaController@acceder')->name('productoventa_alta');

Route::post('/altaProductoVenta', 'ProductoVentaController@alta')->name('altaProductoVenta');

Route::get('/productoventa_editar/{id}', 'ProductoVentaController@editar')->name('editarProductoVenta');

Route::put('/productoventa_editar/{id}', 'ProductoVentaController@update')->name('updateProductoVenta');

Route::delete('/bajaProductoVenta/{id}', 'ProductoVentaController@baja')->name('bajaProductoVenta');


// tipomovimiento
// ────────────────────────────────────────────────────────────────────────────────
Route::get('/tipomov', 'TipoMovimientoController@leer')->name('tipomov');

Route::get('/tipomov_alta', 'TipoMovimientoController@acceder')->name('tipomov_alta');

Route::post('/altaTipomov', 'TipoMovimientoController@alta')->name('altaTipomov');

Route::get('/tipomov_editar/{id}', 'TipoMovimientoController@editar')->name('editarTipomov');

Route::put('/tipomov_editar/{id}', 'TipoMovimientoController@update')->name('updateTipomov');

Route::delete('/bajaTipomov/{id}', 'TipoMovimientoController@baja')->name('bajaTipomov');


// cliente
// ────────────────────────────────────────────────────────────────────────────────
Route::get('/cliente', 'ClienteController@leer')->name('cliente');

Route::get('/cliente_alta', 'ClienteController@acceder')->name('cliente_alta');

Route::post('/altaCliente', 'ClienteController@alta')->name('altaCliente');

Route::get('/cliente_editar/{id}', 'ClienteController@editar')->name('editarCliente');

Route::put('/cliente_editar/{id}', 'ClienteController@update')->name('updateCliente');

Route::delete('/bajaCliente/{id}', 'ClienteController@baja')->name('bajaCliente');

Route::get('/clientespdf', 'ClienteController@exporPdf')->name('clientespdf');



// Materia Prima-Receta
// ────────────────────────────────────────────────────────────────────────────────
Route::get('/materiaprimareceta', 'MateriaprimaRecetaController@leer')->name('materiaprimareceta');

Route::get('/materiaprimareceta_alta', 'MateriaprimaRecetaController@acceder')->name('materiaprimareceta_alta');

Route::post('/altaMateriaprimaReceta', 'MateriaprimaRecetaController@alta')->name('altaMateriaprimaReceta');

Route::get('/materiaprimareceta_editar/{id}', 'MateriaprimaRecetaController@editar')->name('editarMateriaprimaReceta');

Route::put('/materiaprimareceta_editar/{id}', 'MateriaprimaRecetaController@update')->name('updateMateriaprimaReceta');

Route::delete('/bajaMateriaprimaReceta/{id}', 'MateriaprimaRecetaController@baja')->name('bajaMateriaprimaReceta');


// Materia Prima-Ingreso Egreso
// ────────────────────────────────────────────────────────────────────────────────
Route::get('/mpplanillaingresoegresodetalle', 'MateriaprimaPlantillaController@leer')->name('mpplanillaingresoegresodetalle');

Route::get('/mpplanillaingresoegresodetalle_alta', 'MateriaprimaPlantillaController@acceder')->name('mpplanillaingresoegresodetalle_alta');

Route::post('/altaMpplanillaingresoegresodetalle', 'MateriaprimaPlantillaController@alta')->name('altaMpplanillaingresoegresodetalle');

Route::get('/mpplanillaingresoegresodetalle_editar/{id}', 'MateriaprimaPlantillaController@editar')->name('editarMpplanillaingresoegresodetalle');

Route::put('/mpplanillaingresoegresodetalle_editar/{id}', 'MateriaprimaPlantillaController@update')->name('updateMpplanillaingresoegresodetalle');

Route::delete('/bajaMpplanillaingresoegresodetalle/{id}', 'MateriaprimaPlantillaController@baja')->name('bajaMpplanillaingresoegresodetalle');

});