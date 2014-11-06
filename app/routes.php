<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::filter('bananas', function ($route, $request) {
    $from = $request->get("from");
    if ($passwd !== 'banana') {
        $json = array("error" => "true", "message" => "Se fudeu!");
        return Response::json($json, 401);
    }
});

Route::filter('alex', function ($route, $request) {
    $passwd = $request->get("senha");
    if ($passwd !== 'banana') {
        $json = array("error" => "true", "message" => "Se fudeu!");
        return Response::json($json, 401);
    }
});

Route::group(array('prefix' => 'api/v1', 'before' => array('alex'), 'after' => 'bananas'), function() {
    Route::resource('artists', 'ArtistsController',
        array('except' => array('create', 'edit'))
    );
    Route::resource('songs', 'SongsController');
});
