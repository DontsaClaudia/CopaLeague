<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Equipes
    Route::post('equipes/media', 'EquipesApiController@storeMedia')->name('equipes.storeMedia');
    Route::apiResource('equipes', 'EquipesApiController');

    // Joueurs
    Route::apiResource('joueurs', 'JoueursApiController');

    // Stades
    Route::post('stades/media', 'StadesApiController@storeMedia')->name('stades.storeMedia');
    Route::apiResource('stades', 'StadesApiController');

    // Tournois
    Route::apiResource('tournois', 'TournoisApiController');

    // Matchs
    Route::apiResource('matches', 'MatchsApiController');
});
