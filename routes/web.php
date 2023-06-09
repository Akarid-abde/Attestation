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
Route::delete('users/{id}/delete','UserController@destroy')->middleware('auth');
Route::get('search','UserController@search')->middleware('auth');
Route::get('/find','UserController@index');
Route::get('/find/action','UserController@find')->name('find.action');


// Route attestations
Route::get('attestations','AttestationController@index')->middleware('auth');
Route::get('/attestations/create','AttestationController@create')->middleware('auth');
Route::post('attestations','AttestationController@store')->middleware('auth');
Route::get('attestations/{id}/edit','AttestationController@edit')->middleware('auth');
Route::put('attestations/{id}','AttestationController@update')->middleware('auth');
Route::delete('attestations/{id}/delete','AttestationController@destroy')->middleware('auth');
Route::get('search','AttestationController@search')->middleware('auth');
Route::get('/find','AttestationController@index');
Route::get('/find/action','AttestationController@find')->name('find.action');



Route::get('/home', function () {
    return view('home');
})->middleware('auth');



Auth::routes(['verify' => true ]);
Route::get('/home', 'HomeController@index')->name('home');


// Template
Route::get('/nav', function () {
    return view('template');
})->middleware('auth');


Route::get('Atravail','AttestationController@index')->middleware('auth');
Route::get('/Atravail/pdf/{id}', 'AttestationController@generatePDF')->middleware('auth')->name('AttestationTravail');
Route::get('/TravailAttestation/pdf/{id}', 'AttestationController@generatePDF')->middleware('auth')->name('AttestationTravail2');
Route::get('/find/action','AttestationController@find')->name('find.action');

Route::get('JobAttestation','AttestationController@Job')->middleware('auth');
Route::get('/find2/action2','AttestationController@find2')->name('find2.action2');

