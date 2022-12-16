<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AdminController::class)->group(function () {
    // Route::get('/orders/{id}', 'show');
    Route::get('/Add_Web_Link', 'Add_Web_Link');
    Route::get('/Add_Map', 'Add_Map');
    Route::get('/Add_Phone', 'Add_Phone');
    Route::get('/Add_SMS', 'Add_SMS');
    Route::get('/Add_WIFI', 'Add_WIFI');
    Route::post('/Web_Link', 'Web_Link');
    Route::post('/Map', 'Map');
    Route::post('/Phone', 'Phone');
    Route::post('/SMS', 'SMS');
    Route::post('/WIFI', 'WIFI');

    Route::get('/Edit_website_link/{id}', 'Edit_website_link');
    Route::post('/Edit_website_link_Confirm/{id}', 'Edit_website_link_Confirm');
    Route::get('/Edit_Map/{id}', 'Edit_Map');
    Route::post('/Edit_Map_Confirm/{id}', 'Edit_Map_Confirm');
    Route::get('/Edit_Phone/{id}', 'Edit_Phone');
    Route::post('/Edit_Phone_Confirm/{id}', 'Edit_Phone_Confirm');
    Route::get('/Edit_SMS/{id}', 'Edit_SMS');
    Route::post('/Edit_SMS_Confirm/{id}', 'Edit_SMS_Confirm');
    Route::get('/Edit_WIFI/{id}', 'Edit_WIFI');
    Route::post('/Edit_WIFI_Confirm/{id}', 'Edit_WIFI_Confirm');

    Route::get('/Delete_website_link/{id}', 'Delete_website_link');
    Route::get('/Delete_Map/{id}', 'Delete_Map');
    Route::get('/Delete_Phone/{id}', 'Delete_Phone');
    Route::get('/Delete_SMS/{id}', 'Delete_SMS');
    Route::get('/Delete_WIFI/{id}', 'Delete_WIFI');
});

