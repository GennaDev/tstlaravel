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

Route::get('/sse-page', function () {
    return view('page.sse'); // Убедитесь, что ваш файл находится в директории resources/views/page/sse.blade.php
})->name('sse-page');

Route::get('/calculate', function () {
    return view('page.calculate');
})->name('calculate');

Route::get('/rpc-example', function () {
    return view('page.rpc_example');
})->name('rpc-example');

Route::get('/fetch-data', 'App\Http\Controllers\DataController@fetchData')->name('fetch-data');

Route::get('/sse', 'App\Http\Controllers\SSEController@index')->name('sse-event');

Route::get('/webhook', 'App\Http\Controllers\WebhookController@handleWebhook')->name('webhook');

Route::post('/rpc', 'App\Http\Controllers\RpcController@handleRpc')->name( 'handleRpc');
