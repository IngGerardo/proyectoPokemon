<?php

//Rutas página principal
Route::get('/','inicioController@consultarTipos');

//Rutas de pokemones por tipo
Route::get('/tipos/{id}','inicioController@tipoxpokemon');

Route::post('/PDF','inicioController@pdf');

Route::post('/Tipo','inicioController@tipo');

Route::post('/Quitar','inicioController@quitar');
