	<?php

		/*
		|--------------------------------------------------------------------------
		| Application Routes
		|--------------------------------------------------------------------------
		|
		| Here is where you can register all of the routes for an application.
		| It's a breeze. Simply tell Laravel the URIs it should respond to
		| and give it the controller to call when that URI is requested.
		|
		*/

		use App\User;
		


		Route::get('/', 'WelcomeController@index');
		Route::get('home', 'HomeController@index');
		Route::get('headerlight', 'HeaderController@headerlightindex');
		

		Route::get('contact', 'PagesController@contact');

		Route::get('blogitems','PagesController@blogitems');

		Route::get('postitems','PagesController@postitems');


		Route::get('productlists/{type}/{typeid}', [
			'uses' => 'PagesController@productlists'
			]);

		Route::get('productgrids/{type}/{typeid}', [
			'uses' => 'PagesController@productgrids'
			]);

		Route::get('collectionlists', 'CollectionsController@collectionlist');

				

		// Route::get('test', 'TestController@index');

		
			Route::get('layout', function() {
				  return View::make('layouts.test');
				});
		Route::post('tryajax','TestController@likeindex');
		
		

		Route::resource('profiles','ProfilesController');


		Route::controllers([
			'auth' => 'Auth\AuthController',
			'password' => 'Auth\PasswordController',
			]);


		Route::group(['middleware' => 'auth'],function()
		{
			
			Route::post('wishliststore', [
			'uses' => 'ProductController@wishliststore'
			]);

			Route::post('wishlistcancel', [
			'uses' => 'ProductController@wishlistcancel'
			]);
			
			Route::get('wishlist', 'PagesController@wishlist');

			Route::group(['middleware' => 'roleware'],function()
			{
				Route::resource('dashboard','DashboardController');
				Route::resource('userspannel','UserspannelController');
				Route::resource('maincategorys','MaincategoryController');
				Route::resource('categorys','CategoryController');
				Route::resource('mainslides','MainslideController');
				Route::resource('collections','CollectionsController');
				Route::resource('brands','BrandsController');
				Route::resource('posts','PostsController');
				Route::resource('blogs','BlogsController');
				Route::resource('products','ProductController');
				Route::resource('productdetails','ProductdetailController');
				Route::get('productdetailcreate/{id}', [
					'uses' => 'ProductdetailController@customcreate'
					]);
				Route::get('dashboarduserprofile', [
					'uses' => 'ProfilesController@dashboarduserindex'
					]);
				Route::get('bgphoto', [
					'uses' => 'DashboardController@bgchange'
					]);
				
			});
			
			
		});

	