<?php

/* Authentication routes */
Route::get('auth/login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@getLogout']);

/* Registration routes */
Route::get('auth/register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@getRegister']);
Route::post('auth/register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@postRegister']);

/* Password reset routes */
Route::get('password/reset/{token?}', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@showResetForm']);
Route::post('password/email', ['as' => 'auth.password.email', 'uses' => 'Auth\PasswordController@sendResetLinkEmail']);
Route::post('password/reset', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@reset']);

/* Welcome page routes */
Route::get('/', ['as' => 'welcome', 'uses' => 'PagesController@index']);

Route::group(['middleware' => 'auth'], function () {
    /* Home page routes */
	Route::get('home', ['as' => 'home', 'uses' => 'PagesController@home']);

    /* User profile routes */
	Route::get('user/profile', ['as' => 'user.profile', 'uses' => 'UsersController@edit']);
	Route::put('user/profile', ['as' => 'user.profile', 'uses' => 'UsersController@update']);

    /* Tasks routes */
    Route::resource('task', 'TaskController', ['except' => ['show']]);

    /* Subtask routes */
    Route::group(['prefix' => 'task/{task}'], function() {
        Route::get('subtask', ['as' => 'subtask.index', 'uses' => 'SubtaskController@index']);
        Route::get('subtask/create', ['as' => 'subtask.create', 'uses' => 'SubtaskController@create']);
        Route::get('subtask/{subtask}', ['as' => 'subtask.show', 'uses' => 'SubtaskController@show']);
        Route::get('subtask/{subtask}/edit', ['as' => 'subtask.edit', 'uses' => 'SubtaskController@edit']);
        Route::post('subtask', ['as' => 'subtask.store', 'uses' => 'SubtaskController@store']);
        Route::put('subtask/{subtask}', ['as' => 'subtask.update', 'uses' => 'SubtaskController@update']);
        Route::delete('subtask/{subtask}', ['as' => 'subtask.delete', 'uses' => 'SubtaskController@delete']);
    });
});

