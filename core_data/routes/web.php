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

//  resource for CORS routes
//
//route::resource('api/books', 'BooksController');;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});


Route::resource('/books', 'BooksController');    



Route::get('/index', 'BooksController@index');
Route::get('/show/{id}', 'BooksController@show');


Route::get('/create', 'BooksController@create');
Route::post('/store', 'BooksController@store');


Route::get('/edit/{id}', 'BooksController@edit');
Route::put('/update/{id}', 'BooksController@update');


Route::get('/delete/{id}', 'BooksController@destroy');


//  Search Route
//
Route::post( '/search', 'SearchController@search');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//  Logout link has to be manually coded in here as it was removed in Laravel 5.3
//
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');