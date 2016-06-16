<?php

Route::get('/', 'Site\HomeController@getIndex');
Route::get('sobre', 'Site\HomeController@getSobre');
Route::get('anuncie', 'Site\HomeController@getAnuncie');
Route::get('cardapios/{id}', 'Site\HomeController@getCardapios');
Route::get('taxa/{id}', 'Site\HomeController@getTaxa');
Route::get('restaurante/{slug}', 'Site\HomeController@getRestaurante');
Route::get('pesquisa', 'Site\HomeController@getPesquisa');
//Route::group([], function(){
//    Route::controllers([
//            'beta' => 'Site\HomeController'
//        ]);
//});
Route::get('ctrl', function () { return view('ctrl.app'); });
Route::post('login', 'Ctrl\AuthenticateController@Authenticate');


Route::group(['prefix' => 'api/v1/', 'middleware' => ['jwt.auth']], function(){
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