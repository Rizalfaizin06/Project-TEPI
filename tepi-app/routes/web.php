<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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


Route::get('/home', [HomeController::class, 'index'])->name('home-page');
Route::post('/room/details', [RoomController::class, 'details']);
Route::post('/room/booking', [RoomController::class, 'booking']);
Route::post('/room/add_owner', [RoomController::class, 'add_booking_owner']);
Route::get('/room/check_owner', [RoomController::class, 'check_booking_owner']);
Route::get('/room/confirmation', [RoomController::class, 'booking_confirmation'])->name('booking_confirmation');
Route::post('/room/access', [RoomController::class, 'access']);
Route::post('/student/category', [StudentController::class, 'getGroupCategory'])->name('get-category');

