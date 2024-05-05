<?php

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


Route::get('/home', function () {
    return view('home', ["title" => "Home", "rooms" => [["title" => "Lab 201", "desc" => "lab unaki1"], ["title" => "Lab 202", "desc" => "lab unaki2"]]]);
});
