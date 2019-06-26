<?php

 use App\Service;
 use App\RendezVous;
 use App\Doctor;
 use App\Resource;
 use App\Patient;
 use Illuminate\Support\Arr;

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
    $services = Service::all();
    $servicesRDV = Service::pluck('name', 'id')->all();

    return view('home', compact('services', 'servicesRDV'));
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



Route::group(['middleware' => ['Admin','DataUpdate']], function () {


    /* Route::get('admin/serdoc/{id}', function ($id) {

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



    Route::get('admin/ren/{id}', function ($id) {

        $service = Service::findOrfail(2);
        dd($service->rendezvouses()->whereId(1)->get());

    });
 */




    /*     Route::get('/admin',['as'=>'admin.index','uses'=>'AdminUsersController@index']);
     */
    Route::resource('admin/users', 'AdminUsersController');

    Route::resource('admin/specialites', 'SpecialiteController');

    Route::resource('admin/doctors', 'DoctorController');

    Route::resource('admin/RendezService', 'AdminRendezVousController');

    Route::resource('admin/services', 'ServiceController');

    Route::resource('admin/resources', 'ResourceController');

    Route::resource('admin/patients', 'PatientController');

    Route::resource('admin/media', 'PhotoController');

    Route::get('admin/calendar', 'AdminHorairesController@index');

    Route::resource('admin/calendar', 'AdminHorairesController');
});







Route::resource('/rendezvous', 'RendezVousController');
Route::post('rendezvous/recherche', ['as'=>'rendezvous.recherchepost','uses'=>'RendezVousController@recherche']);

/* Route::get('rendezvous/recherche','RendezVousController@store'); */





/* Route::get('/services/create/{id}', function ($id) {

    $service = Service::findOrfail($id);
    return view('rendezvous.create', compact('service'));

}); */




// Date

/* Route::get('/date', function () {
    $date = new DateTime('2000-01-01');
    $date->add(new DateInterval('PT10H30S'));
    echo "<h1>".$date->format('Y-m-d H:i:s') ."</h1><br>";

    $date = new DateTime('2000-01-01');
    $date->add(new DateInterval('P7Y24M4DT4H3M2S'));
    echo "<h1>".$date->format('Y-m-d H:i:s')."</h1><br>";
}); */


