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
    return view('welcome');
});

Route::get("/actors", "ActorController@directory");
Route::get("/actor", "ActorController@directory2");

Route::get("/actors/add","ActorController@add");

Route::post("/actors/add","ActorController@store");

Route::get("/actor/{id}/edit","ActorController@edit");
Route::post("/actor/{id}/edit","ActorController@edit");
