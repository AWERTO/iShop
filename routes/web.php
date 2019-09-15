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

Route::get('/',[
    'as'    => 'index',
    'uses'  => 'HomeController@index',

]);


Route::get('/blog','BlogController@index');
Route::get('/blog-detail','BlogController@detail');



Route::get('/product','ProductController@index');
Route::get('/product-categories','ProductController@categories');
Route::get('/product-detail','ProductController@detail');
Route::post('/product','ProductController@search');
Route::post('/product-sort','ProductController@sort');
Route::post('/product-price','ProductController@price');
Route::post('/wishlist','ProductController@wishlist');
Route::get('/reset-cart','CartController@reset');




Route::get('/cart','CartController@index');
Route::post('/reset-cart','CartController@reset');


Route::get('/about','AboutController@index');


Route::get('/contact','ContactController@index');
Route::get('/contact_create','ContactController@create');
Route::post('/contact', 'ContactController@store');

Route::post ('subscribe', 'SubscribeController@store');





Route::group(
    [
        'prefix' => 'admin',
        'namespace' => 'Admin',
        'as' => 'admin.',
    ],
    function(){
        Route::get('/', 'AdminController@index');

        Route::get('/checkPass', 'AdminController@setActive');

        Route::get('/main', 'AdminController@main');

        Route::get('/action', 'AdminController@action');

        Route::post('/action', 'AdminController@action');
    });