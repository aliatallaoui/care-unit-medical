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

/* Route::get('/', function () {
    return view('home');
}); */

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/* Route::get('/departments', function () {
    return view('departments');
}); */

/* Route::resource('/', 'PagesController'); */

/* Route::get('/','PagesController@index');
 */

/* Route::resource('pages', 'PagesController'); */

Route::get('/', function () {
    return view('home');

});

Route::resource('/', 'PagesController');


Route::get('/doctors', function () {
    return view('doctors');

});

Route::get('/departments', function () {
    return view('departments');

});

Route::get('/about', function () {
    return view('about');

});
Route::get('/contact', function () {
    return view('contact');

});






