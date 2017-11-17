<?php

Route::get('/', 'ManagementController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
