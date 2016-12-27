<?php

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
    return view('index');
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/preferences', function () {
    return view('preferences');
});

Route::get('/examples', function () {
    return view('examples/index');
});

Route::get('/examples/canvas', function () {
    return view('examples/canvas/index');
});

Route::get('/examples/canvas/example00', function () {
    return view('examples/canvas/example00');
});
