<?php

//Rutas página principal
Route::get('/','inicioController@consultarTipos');

//Rutas de pokemones por tipo
Route::get('/RegistroPokemon','inicioController@registroPokemon');

Route::get('/tipos/{id}','inicioController@tipoxpokemon');

Route::post('/Poder','inicioController@poder');

Route::post('/PDF','inicioController@pdf');

Route::post('/Tipo','inicioController@tipo');

Route::post('/Quitar','inicioController@quitar');

Route::post('/guardarPokemon','inicioController@guardarPokemon');