<?php

 use App\Service;
 use App\RendezVous;
 use App\Doctor;
 use App\Resource;


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



Route::group(['middleware' => ['Admin']], function () {


    Route::get('admin/serdoc/{id}', function ($id) {

        $doctor = Doctor::findOrfail($id);
        $resource = Resource::findOrfail(1);
        $doctor->services()->toggle([6,7]);
        $resource->services()->toggle([6,7]);
        foreach ($doctor->services as $service) {
            echo $service->name.'<br>';
        }
        echo '<h1>Rsourcce </h1>';
        foreach ($resource->services as $service) {
            echo $service->name.'<br>';
        }

    });



    Route::get('/admin',['as'=>'admin.index','uses'=>'AdminUsersController@index']);

    Route::resource('admin/users', 'AdminUsersController');

    Route::resource('admin/specialites', 'SpecialiteController');

    Route::resource('admin/doctors', 'DoctorController');

    Route::resource('admin/services', 'ServiceController');

    Route::resource('admin/resources', 'ResourceController');

    Route::resource('admin/patients', 'PatientController');


});


Route::resource('/rendezvous', 'RendezVousController');


Route::get('/services/create/{id}', function ($id) {

    $service = Service::findOrfail($id);
    return view('rendezvous.create', compact('service'));

});









