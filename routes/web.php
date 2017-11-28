<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('download/{slashData?}',['as'=>'download.file','uses'=>'Controller@download'])->where('slashData', '(.*)');
/*Route::group(['prefix' => 'download'],function(){
	Route::get('{name}',['as'=>'download.file','uses'=>'Controller@download']);
	dd('mohamed');
});*/
Route::group(['prefix' => 'backend', 'namespace' => 'Backend'], function () {
	Route::get('image/{path}',['as'=>'image.get','uses'=>'ImageController@get']);
	Route::post('image',['as'=>'image.upload','uses'=>'ImageController@upload']);
	Route::delete('image/{path}',['as'=>'image.delete','uses'=>'ImageController@remove']);
});
Route::group(['prefix' => 'backend', 'namespace' => 'Backend','middleware'=>['auth','backend']], function () {
	Route::get('/',['uses'=>'BackendController@index','as'=>'backend.home']);
	Route::resource('pages', 'PageController');
	Route::resource('users', 'UsersController');	
	Route::resource('sliders', 'SliderController');
	Route::resource('roles', 'RoleController');
	
//	Route::resource('advertise', 'AdvertiseController');
	Route::resource('post', 'PostController');
	Route::resource('category', 'CategoryController');
	Route::resource('program', 'ProgramController');
	Route::resource('eposide', 'ProgramEposidesController');
	Route::resource('broadcast', 'ProgramProdcastController');	

	Route::get('setting/index', array('as'=>'setting.index','uses'=>'SettingController@index'));
	Route::post('setting/edit', array('as'=>'setting.edit','uses'=>'SettingController@update'));
		
});
Route::group(['middleware'=>['frontend','web']],function(){
	Route::get('/user/redirect', ['as'=>'redirect','uses'=>'Auth\LoginController@redirect']);

	Route::get('/logout', ['as'=>'logout','uses'=>'Auth\LoginController@logout']);
	Route::get('register/verify/{confirmation_code}','Auth\RegisterController@confirmCode');
	
	Route::get('/',['as'=>'home','uses'=>'FrontendController@index']);
	Route::get('/home', 'FrontendController@index');
	Route::get('/about', 'FrontendController@about');
	Route::get('/live', 'FrontendController@live');
	Route::get('/news', 'FrontendController@news');
	Route::get('/news_detail/{slug}', 'FrontendController@newsDetail');
	
	Route::get('/programs', 'FrontendController@programs');
	Route::get('/program_detail/{slug}', 'FrontendController@programDetails');
	
	
	// ../contact message submit  (ajax url)
	Route::post('/contact/submit', 'FrontendController@ContactPageSubmit')->name('contactPageSubmit');

	Route::get('page/{slug}', 'FrontendController@page');
	Route::get('article/{slug}', 'FrontendController@article');
		
	Auth::routes();
	Route::get('/redirect/{type}', 'SocialAuthController@redirect');
	Route::get('/callback', 'SocialAuthController@callback');
    Route::get('language/{name}',['as'=>'lanuage.change' , 'uses' => 'FrontendController@changeLanguage']);		
});
