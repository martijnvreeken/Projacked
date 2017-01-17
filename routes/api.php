<?php

use Illuminate\Http\Request;

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

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:api');

Route::get('/clients', 'ClientController@get')->name('api.clients');
Route::post('/clients', 'ClientController@store')->name('api.clients.create');
Route::put('/clients/{client}', 'ClientController@update')->name('api.clients.update');
Route::delete('/clients/{client}', 'ClientController@destroy')->name('api.clients.delete');

Route::get('/leads', 'LeadController@get')->name('api.leads');
Route::post('/leads', 'LeadController@store')->name('api.leads.create');
Route::put('/leads/{lead}', 'LeadController@update')->name('api.leads.update');
Route::delete('/leads/{lead}', 'LeadController@destroy')->name('api.leads.delete');
