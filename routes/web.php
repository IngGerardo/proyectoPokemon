<?php

//Rutas página principal
Route::get('/','inicioController@consultarTipos');

//Rutas de pokemones por tipo
Route::get('/tipos/{id}','inicioController@tipoxpokemon');

Route::post('/PDF','inicioController@pdf');

Route::post('/Tipopokemon','inicioController@tipo');

Route::post('/Quitar','inicioController@quitar');

Route::post('/poketip/{idp}','inicioController@ponertipo');

Route::get('/poketipo/{idp}','inicioController@poketipo');

Route::get('/quitartipo/{idu}/{idp}','inicioController@quitartipo');