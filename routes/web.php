<?php

use Illuminate\Support\Facades\Route;
use App\Http\Contollers\testController;
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
//     return view('homeapgeController');
// });
Route::get('/', [App\Http\Controllers\HomepageController::class, 'index'])->name('');

Route::get('/testroute/{key}', [App\Http\Controllers\HomepageController::class, 'testroute'])->name('testroute');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/newtab/{key}', ['uses' =>'SomeController@doSomething']);

Route::get('/test', [App\Http\Controllers\testController::class, 'test'])->name('test');
Route::get('/cookie/get','App\Http\Controllers\testController@getCookie');

Auth::routes();