<?php
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
Route::get('/', 'MainController@index');
Route::get('/Administrador', function () {
    return view('auth/login');
});
// rutas para los eventos
Route::bind('evento', function($id){
 return SisBezaFest\Paquete::where('id', $id)->first(); 
});
//rutas del partner
Route::resource('partner/usuario','PersonaController');
Route::resource('partner/clientes','ClienteController');
Route::resource('partner/evento','EventoController');
Route::resource('partner/paquete','PaqueteController');
Route::resource('partner/tipopaquete','TipopaqueteController');
Route::resource('partner/preventa','PreventaController');
Route::resource('partner/tipodocumento','TipodocumentoController');
//rutas del administrador
Route::resource('administrador/tipodocumento','TipodocumentoController');
Route::resource('administrador/comprobante','TipoComprobanteController');
Route::resource('administrador/usuario','UsuarioController');
Route::resource('administrador/tipopago','TipoPagoController');
Route::resource('administrador/tipopersona','TipoPersonaController');
Route::resource('administrador/partner','PersonaController');
Route::resource('administrador/estado','EstadoController');
//index del cliente
Route::get('main/paquete/{id}','MainController@paquete');
Route::get('main',['as' => 'main','uses'=>'MainController@paquete']);
Route::get('administrador/empresa/buscarPersona','EmpresaController@buscarpersona');
//rutas carrito de compras
Route::get('main/shoppincar', 'ShoppingCartsController@index');
Route::get('main/shoppincar/{id}', 'InShoppingCartsController@strore')->name('shopping');
Route::resource('administrador/empresa','EmpresaController');
//tiene que estar autentificado para poder entrar a esta seccion
Route::get('main/listaCompras',['as' => 'buy-show','uses'=>'DetalleVentaController@index']);
Auth::routes();
//Route::resource('','HomeController');
//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/{str_slug($url)?}', 'HomeController@index');
//Route::get('/home', 'AdminController@index')->name('welcome'
//carrito
Route::get('main/cart',['as' => 'cart-show','uses'=>'CartController@show']);
Route::get('main/add/{evento}',['as' => 'cart-add','uses'=>'CartController@add']);
Route::get('main/delete/{evento}',['as' => 'cart-delete','uses'=>'CartController@delete']);
Route::get('main/trash',['as' => 'cart-trash','uses'=>'CartController@trash']);
Route::get('main/update/{id}/{canti?}',['as' => 'cart-update','uses'=>'CartController@update']);
// Enviamos nuestro pedido a PayPal
Route::get('main', 'PaymentController@index');
Route::post('main/paypal', 'PaymentController@payWithpaypal');
// Después de realizar el pago Paypal redirecciona a esta ruta
Route::get('main/status', 'PaymentController@getPaymentStatus');