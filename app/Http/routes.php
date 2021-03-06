<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
*/



    Route::auth();

    Route::get('/home', [
        'as' => 'home',
        'uses'=> 'HomeController@index'
    ]);

// New orders routes
    Route::get('/crearOrden', 'HomeController@createOrder');
    Route::post('/postCrearOrden', 'HomeController@postCreateOrder');

    Route::get('/crearCompania', 'CorporationController@createCorporation');
    Route::post('/postCrearCompania','CorporationController@postCreateCorporation');

    Route::post('/postCrearConfirmacion','HomeController@postCreateConfirmation');
    Route::post('/postConfirmar','HomeController@postConfirm');

    Route::post('/postConfirmarEfectivo','HomeController@postConfirmarEfectivo');
    Route::post('/postConfirmarTC','HomeController@postConfirmarTC');
    Route::post('/postConfirmarOxxo','HomeController@postConfirmarOxxo');



    Route::get('/verOrden/{id}','HomeController@viewOrder');
    Route::get('/verConfirmacion/{id}','HomeController@viewConfirmation');

    Route::get('/generarPagoOxxo/{id}','HomeController@getOxxoPaymentView');
    Route::get('/generarPagoTC/{id}','HomeController@getCreditcardPaymentView');

    Route::post('/postPagoTC','HomeController@postCCPayment');

    Route::get('/registerCarrier','FrontendController@registerCarrier');

    Route::get('/asociarTransportista/{id}','HomeController@asociarTransportista');
    Route::post('/postAsociarTransportista','HomeController@postAsociarTransportista');

    Route::post('/postShipment','HomeController@postShipment');

    Route::get('/datosPago','HomeController@mostrarDatosPago');

    Route::post('/autorizarEnvio/{id}','HomeController@autorizarEnvio');

    Route::get('/registroTransportista','FrontendController@registroTransportista');

    Route::get('/', function () {
        return view('welcome');
    });






Route::group(['middleware'=>'cors','prefix' => 'api/v1'], function(){
    Route::resource('authenticate', 'AuthenticateController',['only'=>['index']]);
    Route::post('authenticate','AuthenticateController@authenticate');
    Route::get('authenticate/user', 'AuthenticateController@getAuthenticatedUser');
});

Route::group(['middleware' => 'cors', 'prefix' => 'api/v1'], function(){
    Route::resource('orderconfirmations', 'OrderconfirmationsController');
});