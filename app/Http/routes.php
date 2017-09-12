<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','FirstController@index');
Route::get('/contact', 'FirstController@contact');
Route::get('/service', 'FirstController@service');
Route::auth();

Route::get('/home', 'HomeController@index');

Route::post('/process', 'ProcessController@index');
Route::get('/process', 'ProcessController@index');
Route::get('/runnaz_backend', 'BackendController@index');
Route::post('/processlogin', 'ProcessController@login_p');
Route::post('/processregister', 'ProcessController@processregister');
Route::get('/process_success', 'ProcessController@process_success');
// register admin
Route::get('/create_admin', 'BackendController@create_admin');
Route::post('/create_admin', 'BackendController@post_create_admin');
Route::get('/view_admin', 'BackendController@view_admin');
// service
Route::get('/create_service', 'BackendController@create_service');
Route::post('/create_service', 'BackendController@post_create_service');
Route::get('/view_service', 'BackendController@view_service');
Route::get('/edit_service/{id}', 'BackendController@edit_service');
Route::put('/update_service/{id}', 'BackendController@update_service');
Route::get('/delete_service/{id}', 'BackendController@delete_service');

// items
Route::get('/create_item', 'BackendController@create_item');
Route::post('/create_item', 'BackendController@post_create_item');
Route::get('/view_item', 'BackendController@view_item');
Route::get('/edit_item/{id}', 'BackendController@edit_item');
Route::put('/update_item/{id}', 'BackendController@update_item');
Route::get('/delete_item/{id}', 'BackendController@delete_item');

// system
Route::get('/create_system', 'BackendController@create_system');
Route::post('/create_system', 'BackendController@post_create_system');
Route::get('/view_system', 'BackendController@view_system');
Route::get('/edit_system/{id}', 'BackendController@edit_system');
Route::put('/update_system/{id}', 'BackendController@update_system');
Route::get('/delete_system/{id}', 'BackendController@delete_system');

// order
Route::get('/new_order', 'BackendController@new_order');
Route::get('/shipped_order', 'BackendController@shipped_order');
Route::get('/cancelled_order', 'BackendController@cancelled_order');
Route::get('/delivered_order', 'BackendController@delivered_order');
Route::get('/return_order', 'BackendController@return_order');
Route::get('/shipped/{id}', 'BackendController@shipped');
Route::get('/cancelled/{id}', 'BackendController@cancelled');
Route::get('/delivered/{id}', 'BackendController@delivered');
Route::get('/returned/{id}', 'BackendController@returned');

// erran
Route::get('/create_erran', 'BackendController@create_erran');
Route::post('/create_erran', 'BackendController@post_create_erran');
Route::get('/view_erran', 'BackendController@view_erran');
Route::get('/edit_erran/{id}', 'BackendController@edit_erran');
Route::put('/update_erran/{id}', 'BackendController@update_erran');
Route::get('/delete_erran/{id}', 'BackendController@delete_erran');
Route::get('/new_erran', 'BackendController@new_erran');
Route::get('/treated_erran', 'BackendController@treated_erran');
Route::get('/new_custom_erran', 'BackendController@new_custom_erran');
Route::get('/treated_custom_erran', 'BackendController@treated_custom_erran');
// =====================view register Agent========================================
Route::get('/view_agent', 'BackendController@view_agent');
// =====================view register Agent========================================
Route::get('/view_merchant', 'BackendController@view_merchant');
// =====================Delivered========================================
Route::get('/delivered_erran/{id}', 'BackendController@delivered_erran');
// =====================cancelled========================================
Route::get('/cancelled_erran/{id}', 'BackendController@cancelled_erran');
// =====================Delivered custom========================================
Route::get('/delivered_custom_erran/{id}', 'BackendController@delivered_custom_erran');
// =====================cancelled custom========================================
Route::get('/cancelled_custom_erran/{id}', 'BackendController@cancelled_custom_erran');
//==========================================================================================================
Route::get('/merchant', 'FirstController@merchant');
Route::post('/merchant', 'FirstController@post_merchant');
Route::get('/postlga/{id}', 'FirstController@getlga');

// Agent
Route::get('/agent', 'FirstController@agent');
Route::post('/agent', 'FirstController@post_agent');
// Deliveries
//Route::get('/delivery', 'FirstController@delivery');
//request erran
Route::get('/erran', 'FirstController@erran');
Route::post('/erran', 'FirstController@post_erran');
//verification
Route::get('/verification', 'FirstController@verification');
Route::post('/verification', 'FirstController@post_verification');

Route::post('sendmessage', 'ChatController@sendMessage');
//custom
Route::get('/custom', 'FirstController@custom');
Route::post('/custom', 'FirstController@post_custom');
Route::get('/sss{str}', 'FirstController@sss');