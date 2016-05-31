<?php

//Route::get('/', 'Site\HomeController@getIndex');
Route::group([], function(){
    Route::controllers([
            '/' => 'Site\HomeController'
        ]);
});
Route::get('restaurante', function() { return view('site.profile'); });
Route::get('pesquisa', function() { return view('site.pesquisa'); });
Route::get('ctrl', function () { return view('ctrl.app'); });

Route::group(['prefix' => 'api/v1/'], function(){
    Route::resource('plano',    'Ctrl\PlanoController');
    Route::resource('empresa',  'Ctrl\EmpresaController');
    Route::resource('categoria','Ctrl\CategoriaController');
    Route::resource('bairro',   'Ctrl\BairroController');
    Route::resource('pagamento','Ctrl\PagamentoController');
    Route::controllers([
        'empresainfos'      => 'Ctrl\EmpresaInfosController',
        'empresacardapio'   => 'Ctrl\CardapioController',
        'empresaticket'     => 'Ctrl\TicketController'
    ]);
});