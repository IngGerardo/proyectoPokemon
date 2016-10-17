<?php

//Rutas página principal
Route::get('/','inicioController@consultarTipos');

//Rutas de pokemones por tipo
Route::get('/RegistroPokemon','inicioController@registroPokemon');

Route::get('/tipos/{id}','inicioController@tipoxpokemon');

Route::post('/Poder','inicioController@poder');

Route::post('/PDF','inicioController@pdf');

Route::post('/Tipopokemon','inicioController@tipo');

Route::post('/Quitar','inicioController@quitar');

Route::post('/polvosPokemon','inicioController@polvosPokemon');

Route::post('/caramelosPokemon','inicioController@caramelosPokemon');

Route::post('/guardarPokemon','inicioController@guardarPokemon');

Route::post('/poketip/{idp}','inicioController@ponertipo');

Route::get('/poketipo/{idp}','inicioController@poketipo');

Route::get('/quitartipo/{idu}/{idp}','inicioController@quitartipo');

