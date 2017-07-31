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

Route::get('/nome/nome2/nome3', function(){
   return 'Rota grande';
})->name('rota.nomeada');

Route::any('/any', function(){
    return "Route any";
});

Route::match(['get', 'post'], '/match', function(){
    return "Route match";
});

Route::post('/post', function(){
   return "Route post";
});

Route::get('/contato', function(){
    return 'Route Contato';
});

Route::get('/empresa', function() {
    return view('empresa');
});

Route::get('/', function () {
    return redirect()->route('rota.nomeada');
});
