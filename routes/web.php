<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/page1', function () {
    return view('page.page1');
})->name('page1');

Route::get('/fetch-data', 'App\Http\Controllers\DataController@fetchData')->name('fetch-data');

Route::get('/sse', 'App\Http\Controllers\SSEController@index')->name('sse');

Route::get('/webhook', 'App\Http\Controllers\WebhookController@handleWebhook')->name('webhook');
