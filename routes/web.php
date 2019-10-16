<?php
use App\Events\notifications;
use App\User;
use App\Notifications\report;
use Illuminate\Http\Request;

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

Route::fallback(function ()
{
    return redirect('/home');
});


Route::get('login/{provider}','Auth\LoginController@redirect');
Route::get('login/twitter/callback', 'Auth\LoginController@TwitterCallback');
Route::get('login/{provider}/callback','Auth\LoginController@Callback');
Route::get('logout','\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes();

Route::post('/profile/updateAvatar','profilecontroller@updateAvatar');

Route::get('/product/search','productController@search');
Route::get('/product/create','productController@create');
Route::get('/products/{cat}/{brand?}','productController@category');
Route::post('/product/drop/{id}','productController@drop');
Route::post('/product/report/{id}','productController@report');


Route::group(['middleware' => ['auth','admin']], function () {

	Route::get('/admin/approve/{id}','adminController@approve');
	Route::get('/admin/pinProduct/{id}','productController@destroy');
	Route::get('/admin/forget/{id}','productController@drop');
	Route::get('/admin/pinUser/{id}','adminController@pinUser');
	Route::get('/admin/unpinUser/{id}','adminController@unpinUser');

	Route::get('/admin/makeAdmin/{id}','adminController@makeAdmin');


    Route::resource('/admin','adminController');
    
});


Route::resource('/profile','profilecontroller');
Route::resource('/product','productController');
Route::get('/home/{lang}','HomeController@lang');
Route::get('/home', 'HomeController@index')->name('home');
