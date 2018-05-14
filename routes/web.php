<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index');

Route::get('/orders', 'OrderController@index');
Route::post('/orders', 'OrderController@save');
