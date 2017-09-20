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



Route::any('index','ExcelController@index');
Route::any('show','ExcelController@show');

Route::any('export','ExcelController@export');
Route::any('import','ExcelController@import');
Route::any('detail','ExcelController@detail');
Route::any('ichunk','ExcelController@ichunk');
Route::any('deal','ExcelController@deal');
Route::any('sdeal','ExcelController@sdeal');
Route::any('insert','ExcelController@insert');
Route::any('insertlib','ExcelController@insertlib');

