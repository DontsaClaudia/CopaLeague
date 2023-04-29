<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Equipes
    Route::post('equipes/media', 'EquipesApiController@storeMedia')->name('equipes.storeMedia');
    Route::apiResource('equipes', 'EquipesApiController');

    // Joueurs
    Route::apiResource('joueurs', 'JoueursApiController');

    // Matchs
    Route::apiResource('matchs', 'MatchsApiController');

    // Stades
    Route::apiResource('stades', 'StadesApiController');
});
