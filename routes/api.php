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

Route::group(['namespace' => 'Auth'], function () {
    Route::post('login', 'JWTController@login');
});

Route::group(['middleware' => ['jwt.auth']], function () {
    Route::get('/clients', 'ClientController@get')->name('api.clients');
    Route::post('/clients', 'ClientController@store')->name('api.clients.create');
    Route::put('/clients/{client}', 'ClientController@update')->name('api.clients.update');
    Route::delete('/clients/{client}', 'ClientController@destroy')->name('api.clients.delete');

    Route::get('/leads', 'LeadController@get')->name('api.leads');
    Route::post('/leads', 'LeadController@store')->name('api.leads.create');
    Route::put('/leads/{lead}', 'LeadController@update')->name('api.leads.update');
    Route::delete('/leads/{lead}', 'LeadController@destroy')->name('api.leads.delete');
    Route::post('/quotations', 'QuotationController@create')->name('api.quotations.create');

    Route::post('/leads/promote', 'LeadController@promote')->name('api.leads.promote');

    Route::get('/projects', 'ProjectController@get')->name('api.projects');
    Route::post('/projects', 'ProjectController@store')->name('api.projects.create');
    Route::put('/projects/{project}', 'ProjectController@update')->name('api.projects.update');
    Route::delete('/projects/{project}', 'ProjectController@destroy')->name('api.projects.delete');
    
    Route::get('/account', 'AccountController@get');
    Route::put('/account', 'AccountController@update');
    
    Route::get('/texts', 'QuotationTextController@get')->name('api.texts');
//    Route::post('/texts', 'QuotationTextController@store')->name('api.texts.create');
    Route::put('/texts/{text}', 'QuotationTextController@update')->name('api.texts.update');
//    Route::delete('/texts/{text}', 'QuotationTextController@delete')->name('api.texts.delete');
});