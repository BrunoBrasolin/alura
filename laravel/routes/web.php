<?php


Route::get('/series', 'SeriesController@index')
    ->name('listar_series');
Route::get('/series/criar', 'SeriesController@create')
    ->name('form_criar_serie')
    ->middleware('autenticador'); // Forma de autenticar;
Route::post('/series/criar', 'SeriesController@store')
    ->middleware('autenticador'); // Forma de autenticar;
Route::delete('/series/{id}', 'SeriesController@destroy')
    ->middleware('autenticador'); // Forma de autenticar;
Route::post('/series/{id}/editaNome', 'SeriesController@edit')
    ->middleware('autenticador'); // Forma de autenticar;

Route::get('/series/{serieId}/temporadas', 'TemporadasController@index');
Route::get('/temporadas/{temporada}/episodios', 'EpisodiosController@index');
Route::post('/temporadas/{temporada}/episodios/assistir', 'EpisodiosController@assistir')
    ->middleware('autenticador'); // Forma de autenticar;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/entrar', 'EntrarController@index');
Route::post('/entrar', 'EntrarController@entrar');

Route::get('/registrar', 'RegistroController@create');
Route::post('/registrar', 'RegistroController@store');

Route::get('/sair', function () {
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/entrar');
});
