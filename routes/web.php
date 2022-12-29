<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataTableAjaxCRUDController;
use App\Http\Controllers\Auth\ResetPasswordController;

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


Route::get('/nav', function () {
    return view('template');
})->middleware('auth');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user','UserController@index')->middleware('auth');
Route::get('/home', function () {
    return view('home');
})->middleware('auth');


Route::get('ajax-crud-datatable', [DataTableAjaxCRUDController::class, 'index']);
Route::post('store-company', [DataTableAjaxCRUDController::class, 'store']);
Route::post('edit-company', [DataTableAjaxCRUDController::class, 'edit']);
Route::post('delete-company', [DataTableAjaxCRUDController::class, 'destroy']);


Auth::routes(['verify' => true ]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/live_search','LiveSearch@index');
Route::get('/live_search/action','LiveSearch@action')->name('live_search.action');

// Attestation de travail
Route::get('/nav', function () {
    return view('template');
})->middleware('auth');