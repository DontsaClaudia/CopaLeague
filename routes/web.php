<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Equipes
    Route::delete('equipes/destroy', 'EquipesController@massDestroy')->name('equipes.massDestroy');
    Route::post('equipes/media', 'EquipesController@storeMedia')->name('equipes.storeMedia');
    Route::post('equipes/ckmedia', 'EquipesController@storeCKEditorImages')->name('equipes.storeCKEditorImages');
    Route::resource('equipes', 'EquipesController');

    // Joueurs
    Route::delete('joueurs/destroy', 'JoueursController@massDestroy')->name('joueurs.massDestroy');
    Route::resource('joueurs', 'JoueursController');

    // Stades
    Route::delete('stades/destroy', 'StadesController@massDestroy')->name('stades.massDestroy');
    Route::post('stades/media', 'StadesController@storeMedia')->name('stades.storeMedia');
    Route::post('stades/ckmedia', 'StadesController@storeCKEditorImages')->name('stades.storeCKEditorImages');
    Route::resource('stades', 'StadesController');

    // Tournois
    Route::delete('tournois/destroy', 'TournoisController@massDestroy')->name('tournois.massDestroy');
    Route::resource('tournois', 'TournoisController');

    // Matchs
    Route::delete('matches/destroy', 'MatchsController@massDestroy')->name('matches.massDestroy');
    Route::resource('matches', 'MatchsController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
