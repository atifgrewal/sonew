<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::post('users/media', 'UsersApiController@storeMedia')->name('users.storeMedia');
    Route::apiResource('users', 'UsersApiController');

    // Players
    Route::post('players/media', 'PlayersApiController@storeMedia')->name('players.storeMedia');
    Route::apiResource('players', 'PlayersApiController');

    // Coach Category
    Route::post('coach-categories/media', 'CoachCategoryApiController@storeMedia')->name('coach-categories.storeMedia');
    Route::apiResource('coach-categories', 'CoachCategoryApiController');

    // Sports
    Route::post('sports/media', 'SportsApiController@storeMedia')->name('sports.storeMedia');
    Route::apiResource('sports', 'SportsApiController');
});
