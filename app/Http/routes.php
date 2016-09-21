<?php

Route::get('/', function () {
    return view('apl');
});

Route::POST('/logn','logn@logn');

Route::auth('/login', function(){
	return redirect::route('/abc');
});

Route::get('/home', function () {
    return view('apl');
});

//Route::get('/home', 'HomeController@index');
Route::get('/master/{ket?}/{aksi?}/{name?}','apl@master');
Route::get('/data/{ket?}/{aksi?}/{name?}','apl@data');
Route::POST('/simpan/{ket?}/{aksi?}/{name?}','apl@data');


Route::group(array('prefix'=>'/templates/'),function(){
    Route::get('{template}', array( function($template)
    {
        $template = str_replace(".html","",$template);
        View::addExtension('html','php');
        return View::make('layouts.'.$template);
    }));
});

//resource
