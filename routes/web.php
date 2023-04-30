<?php

use Illuminate\Support\Facades\Route;
use App\Jobs\Logger;

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

Route::get('/job_queue_worker', function () {
    Logger::dispatch();

    return response("Fin");
});

Route::get('/job_queue_worker_after_response', function () {
    Logger::dispatchAfterResponse();

    return response("Fin");
});

Route::get('/job_queue_worker_connection_database', function () {
    Logger::dispatch()->onConnection('database')->onQueue('secondary');

    return response("Fin");
});

Route::get('/job_queue_worker_queue_secondary', function () {
    //solo funciona si en la variable de entorno se cambia de sync a database
    Logger::dispatch()->onQueue('secondary');

    return response("Fin");
});
