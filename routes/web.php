<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', 'IndexController@index');

Route::post('/flickr/search', 'FlickrController@search');
Route::post('/flickr/photo-info', 'FlickrController@photoInfo');

Route::group(array('middleware' => 'auth'), function() {
    Route::resource('category', 'CategoryController');
});

View::composer('*', function($view){
    View::share('viewName', str_replace('.', '-', $view->getName()));
});

