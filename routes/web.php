<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectController2;
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
    return view('welcome');
});



Route::get('/scraper',[ProjectController::class,'scraper']);
Route::get('/scraper2',[ProjectController2::class,'scraper2']);
Route::get('/employees',[EmployeeController::class,'index']);


