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

Route::filter('alexlog', function ($route, $request) {
    $from = $request->get("from");
    if (!empty($from)) {
        Log::info("Acesso from {$from}");
    }

});

Route::filter('alex', function ($route, $request) {
    $passwd = $request->get("senha");
    if ($passwd !== 'banana') {
        $json = array("error" => "true", "message" => "Se fudeu!");
        return Response::json($json, 401);
    }
});

Route::filter('alexlang', function ($route, $request) {

    $lang = strtolower($request->get("lang"));

    if (in_array($lang, array('en', 'pt', 'es_cl', 'es_ar'))) {
        App::setLocale($lang);
    }
});



Route::group(array('prefix' => 'api/v1', 'before' => array('alex', 'alexlang'), 'after' => 'alexlog'), function() {
    Route::resource('artists', 'ArtistsController',
        array('except' => array('create', 'edit'))
    );
    Route::resource('songs', 'SongsController');
});
