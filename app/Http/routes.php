<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/th', function () {
    return view('layouts.app1');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
    Route::get('/import', 'HomeController@import');
});


/*
|--------------------------------------------------------------------------
| API routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'api', 'namespace' => 'API'], function ()
{
	Route::group(['prefix' => 'v1'], function ()
	{
        require Config::get('generator.path_api_routes');
	});
});

Route::resource('posts', 'PostController');

Route::get('posts/{id}/delete', [
    'as' => 'posts.delete',
    'uses' => 'PostController@destroy',
]);


Route::resource('tlgProfiles', 'TlgProfileController');

Route::get('tlgProfiles/{id}/delete', [
    'as' => 'tlgProfiles.delete',
    'uses' => 'TlgProfileController@destroy',
]);


Route::resource('authors', 'AuthorController');

Route::get('authors/{id}/delete', [
    'as' => 'authors.delete',
    'uses' => 'AuthorController@destroy',
]);


Route::resource('resources', 'ResourcesController');

Route::get('resources/{id}/delete', [
    'as' => 'resources.delete',
    'uses' => 'ResourcesController@destroy',
]);


Route::resource('iwomenPosts', 'IwomenPostController');

Route::get('iwomenPosts/{id}/delete', [
    'as' => 'iwomenPosts.delete',
    'uses' => 'IwomenPostController@destroy',
]);


Route::resource('subResourceDetails', 'SubResourceDetailController');

Route::get('subResourceDetails/{id}/delete', [
    'as' => 'subResourceDetails.delete',
    'uses' => 'SubResourceDetailController@destroy',
]);


Route::resource('comments', 'CommentController');

Route::get('comments/{id}/delete', [
    'as' => 'comments.delete',
    'uses' => 'CommentController@destroy',
]);


Route::resource('sisterDownloadApps', 'SisterDownloadAppController');

Route::get('sisterDownloadApps/{id}/delete', [
    'as' => 'sisterDownloadApps.delete',
    'uses' => 'SisterDownloadAppController@destroy',
]);


Route::resource('stickerStores', 'StickerStoreController');

Route::get('stickerStores/{id}/delete', [
    'as' => 'stickerStores.delete',
    'uses' => 'StickerStoreController@destroy',
]);


Route::resource('users', 'UserController');

Route::get('users/{id}/delete', [
    'as' => 'users.delete',
    'uses' => 'UserController@destroy',
]);


Route::resource('categories', 'CategoryController');

Route::get('categories/{id}/delete', [
    'as' => 'categories.delete',
    'uses' => 'CategoryController@destroy',
]);


Route::resource('calendars', 'CalendarController');

Route::get('calendars/{id}/delete', [
    'as' => 'calendars.delete',
    'uses' => 'CalendarController@destroy',
]);

Route::resource('roles', 'RoleController');

Route::get('roles/{id}/delete', [
    'as' => 'roles.delete',
    'uses' => 'RoleController@destroy',
]);
