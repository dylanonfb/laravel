<?php

use Illuminate\Support\Facades\Route;
use App\Models\Service;

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

// Route::get('/landing', function () {
//     return view('landing');
// });

Route::get('/landing/{slug}', function ($slug) {
    return view('landing',[
'post' => $slug
]);
});

Route::get('/services', function () {
    $services=Service::all();
     return view('services',[
         'services' => $services
    ]);
});

Route::get('/about-us', function () {
    $services=Service::all();
     return view('about');
});

Route::get('/contact-us', function () {
    $services=Service::all();
     return view('contact');
});
Route::get('/search', function () {
    $services=Service::where('service_name','LIKE','%'.$_GET['query'].'%')->get();
     return view('services',[
         'services'=>$services
        ]);
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::middleware(['auth:sanctum', 'verified'])->get('/landing', function () {
     return view('landing');
 });
