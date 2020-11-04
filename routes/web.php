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

// Route::get('/', function () {
//     return view('game');
// });

Route::resource('/', 'GameController');
Route::post('games/judg', 'GameController@result');
Route::get('games/new', 'GameController@create');

Route::get('broadcast/{msg}&{result}', function ($msg, $result) {
    broadcast(new \App\Events\ExampleEvent($msg, $result));
    return 'k';
});
