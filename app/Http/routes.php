<?php

Route::get('/ctrl', function () {
    return view('ctrl.app');
});
Route::group(['prefix' => 'api/v1/'], function(){
    Route::resource('plano', 'PlanoController');
    Route::resource('empresa', 'EmpresaController');
    Route::resource('categoria', 'CategoriaController');
    Route::controllers([
        'empresainfos'      => 'EmpresaInfosController',
        'empresacardapio'   => 'CardapioController',
        'empresaticket'     => 'TicketController'
    ]);
});

//
//Route::group(['middleware' => ['web']], function () {
//    Route::get('home', function () {
//        return view('welcome');
//    });
//});
