<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/message', 'App\Http\Controllers\UserController@getmessage')->name('message');



Route::post('validate','App\Http\Controllers\UserController@chckValidation');