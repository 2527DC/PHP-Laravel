<?php

use App\Http\Controllers\UserControler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('message', function () {
    return "chethan";
});

// Route::post('validate', [UserControler::class, 'validateUser']);

Route::post('validate', [UserControler::class, 'validateCustomRules']);



// Route::get('name', 'App\Http\Controllers@name');   // this the older version  larvel 8
Route::get('name', [UserControler::class, 'name']);