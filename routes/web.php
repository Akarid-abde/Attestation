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


// Route users
Route::get('users','UserController@index')->middleware('auth');
Route::get('/user/create','UserController@create')->middleware('auth');
Route::post('users','UserController@store')->middleware('auth');
Route::get('users/{id}/edit','UserController@edit')->middleware('auth');
Route::put('users/{id}','UserController@update')->middleware('auth');
Route::delete('users/{id}','UserController@destroy')->middleware('auth');



// Route Retraits
Route::get('retraits','RetraitController@index')->middleware('auth');
Route::get('/retraits/create','RetraitController@create')->middleware('auth');
Route::post('retraits','RetraitController@store')->middleware('auth');
Route::get('retraits/{id}/edit','RetraitController@edit')->middleware('auth');
Route::put('retraits/{id}','RetraitController@update')->middleware('auth');
Route::delete('retraits/{id}','RetraitController@destroy')->middleware('auth');




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

// Template
Route::get('/nav', function () {
    return view('template');
})->middleware('auth');

// Attestation de travail
Route::get('Atravail','AtttController@index')->middleware('auth');
// Generate pdf Attestation Travial
Route::get('/Atravail/pdf', 'AtttController@pdf')->middleware('auth');
Route::get('/Atravail/pdf/{id}', 'AtttController@pdfE')->middleware('auth')->name('AttestationTravail');

Route::get('/Atravail/create','AtttController@create')->middleware('auth');
Route::post('Atravail','AtttController@store')->middleware('auth');
Route::get('Atravail/{id}/edit','AtttController@edit')->middleware('auth');
Route::put('Atravail/{id}','AtttController@update')->middleware('auth');
Route::delete('Atravail/{id}','AtttController@destroy')->middleware('auth');
// Route::post('find','AtttController@find')->middleware('auth');

Route::get('/find','AtttController@index');
Route::get('/find/action','AtttController@find')->name('find.action');
