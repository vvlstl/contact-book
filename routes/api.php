<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => 'Contact'], function (){
    Route::get('/', 'ContactController');
    Route::get('/contacts', 'SearchContactController');
    Route::get('/contact/{contact}', 'ShowContactController');
    Route::delete('/contact/{contact}', 'DeleteContactController');
    Route::patch('/contact/{contact}', 'UpdateContactController');
    Route::post('/new', 'StoreNewContactController');
});
