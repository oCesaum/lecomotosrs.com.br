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


use Illuminate\Http\Request;

Route::get('/', 'SiteController@home' );


Route::get('sobre', 'SiteController@pageSobre' );
Route::get('contato', 'SiteController@pageContato' );
Route::get('veiculos', 'SiteController@archive' );
Route::get('veiculos/{link}', 'SiteController@single' )->where('link', '[a-zA-Z0-9/_.-]+');

Route::get('busca', 'SiteController@busca' );

Route::get('limpar-cache', function(){
	Cache::forget('products');
	Cache::forget('banners');
	return 'ok';
})->middleware('cors');


Route::post('contato', 'SiteController@postContato' );
Route::post('proposta', 'SiteController@postProposta' );

Route::get('sitemap','SiteController@sitemap');

