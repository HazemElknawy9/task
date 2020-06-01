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
Auth::routes(['verify' => true]);

Route::get('maintenance', function () {
  if (setting()->status == 'open') {
    return redirect('/');
  }
  return view('Maintenance');
});

Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],
function(){
  Route::middleware(['auth'])->group(function () {
  Route::group(['middleware'=>'Maintenance'], function(){
    Route::get('/', 'WelcomeController@index')->name('welcome')->middleware('verified');
  });  
});     
});

Auth::routes(['register' => false]);

Route::get('register', 'Auth\RegisterController@showRegistrationForm');
Route::match(['get', 'post'], 'active/account', 'WelcomeController@activeAccount');
Route::post('register', 'Auth\RegisterController@register')->name('register');

