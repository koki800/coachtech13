<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

Route::get('/',function(){
    return view('inquiry');
});

Route::post('/confirm',[ContactController::class,'confirm']);

Route::post('/delete0',[ContactController::class,'delete0']);

Route::post('/register',[ContactController::class,'register']);

Route::get('/ad_system',[ContactController::class,'ad_system']);

Route::post('/search',[ContactController::class,'search']);

Route::post('/delete',[ContactController::class,'delete']);

