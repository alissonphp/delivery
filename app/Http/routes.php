<?php

Route::get('/', function() { return view('site.index'); });
Route::get('restaurante', function() { return view('site.profile'); });
Route::get('/ctrl', function () {
    return view('ctrl.app');
});
Route::group(['prefix' => 'api/v1/'], function(){
    Route::resource('plano',    'Ctrl\PlanoController');
    Route::resource('empresa',  'Ctrl\EmpresaController');
    Route::resource('categoria','Ctrl\CategoriaController');
    Route::controllers([
        'empresainfos'      => 'Ctrl\EmpresaInfosController',
        'empresacardapio'   => 'Ctrl\CardapioController',
        'empresaticket'     => 'Ctrl\TicketController'
    ]);
});