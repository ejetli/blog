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
	/*Auth::routes();
	//Authentication Routes
	Route::get('auth/login', ['as' => 'login', 'uses' => 'Auth\RegisterController@getlogin']);
	Route::post('auth/login', 'Auth\RegisterController@postlogin');
	Route::get('auth/logout', '['as' => 'logout', 'uses' => Auth\RegisterController@getlogout']);
	//Registrartion Routes
	Route::get('auth/register', 'Auth\RegisterController@getRegister');
	Route::post('auth/register', 'Auth\RegisterController@postRegister');
		
	// Password Reset Routes
	Route::get('passord/reset/{token?}, 'Auth\ForgotPasswordController@showResetForm');
	Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
	Route::post('password/reset', 'Auth\PasswordController@rest');
	*/

	Route::resource('categories', 'CategoryController', ['except' => ['create']]);
	Route::resource('tags', 'TagController', ['except' => ['create']]);

	Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug','[\w\d\-\_]+');
	Route::get('blog', ['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);
	Route::get('contact', 'PagesController@getContact');
	Route::get('about', 'PagesController@getAbout');
	Route::get('/','PagesController@getIndex');
	Route::resource('posts', 'PostController');



Auth::routes();

  // Route::get('/', 'PagesController@getIndex');
// Route::get('/home', 'HomeController@index')->name('home');
