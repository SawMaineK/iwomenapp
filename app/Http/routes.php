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
    return redirect('/administration');
});

Route::get('/apk/download', function(){

    $apk = App\Models\Apk::orderBy('version_id','desc')->first();
    $file= public_path(). "/apk/".$apk->name;
    $apk->download_count += 1;
    $apk->update();
    $headers = array(
        'Content-Type: application/apk',
    );
    return Response::download($file, $apk->name, $headers);
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


Route::group(['middleware' => 'web', 'prefix' => 'admin'], function () {
    Route::auth();

    Route::get('/import', 'HomeController@import');

    Route::resource('competition-question',             'CompetitionQuestionController');
    Route::post('competition-question/{id}/update',     'CompetitionQuestionController@update');
    Route::get('competition-question/{id}/delete',      'CompetitionQuestionController@destroy');

    Route::resource('competition-answers',              'CompetitionAnswerController');
    Route::get('competition-answers-correct/{id}',      'CompetitionAnswerController@correct');
    Route::get('competition-answers-uncorrect/{id}',    'CompetitionAnswerController@uncorrect');

    Route::resource('group-users',                      'GroupUserController');
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

        Route::resource('app', 'APKController');

        Route::resource('competition', 'CompetitionController');

        Route::resource('error_report', 'AndroidErrorReportController');

        Route::resource('review', 'ReviewController');

        Route::post('competitionanswer', 'CompetitionController@answer');

        Route::get('competitionanswer/{id}', 'CompetitionController@getUserAnswer');

        Route::get('competitiongroup', 'CompetitionController@getGroupUser');

	});
});




Route::get('administration',  'LoginController@index');

Route::group(['middleware' => ['web']], function () {
    // Route::auth();

    Route::post('administration',  'LoginController@postLogin');
        Route::group(['middleware' => ['admin']], function () {
            Route::get('logout',        'LoginController@logout');

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


            Route::resource('gcms', 'GcmController');

            Route::get('gcms/{id}/delete', [
                'as' => 'gcms.delete',
                'uses' => 'GcmController@destroy',
            ]);


            Route::resource('gcmMessages', 'GcmMessageController');

            Route::get('gcmMessages/{id}/delete', [
                'as' => 'gcmMessages.delete',
                'uses' => 'GcmMessageController@destroy',
            ]);


            Route::resource('subResourceDetails', 'SubResourceDetailController');

            Route::get('subResourceDetails/{id}/delete', [
                'as' => 'subResourceDetails.delete',
                'uses' => 'SubResourceDetailController@destroy',
            ]);

            Route::resource('mutipleQuestions', 'MutipleQuestionController');

            Route::get('mutipleQuestions/{id}/delete', [
                'as' => 'mutipleQuestions.delete',
                'uses' => 'MutipleQuestionController@destroy',
            ]);


            Route::resource('mutipleOptions', 'MutipleOptionController');

            Route::get('mutipleOptions/{id}/delete', [
                'as' => 'mutipleOptions.delete',
                'uses' => 'MutipleOptionController@destroy',
            ]);

            
            Route::resource('mutipleAnswers', 'MutipleAnswerController');

            Route::get('mutipleAnswers/{id}/delete', [
                'as' => 'mutipleAnswers.delete',
                'uses' => 'MutipleAnswerController@destroy',
            ]);


            Route::resource('avators', 'AvatorController');

            Route::get('avators/{id}/delete', [
                'as' => 'avators.delete',
                'uses' => 'AvatorController@destroy',
            ]);

            Route::resource('postLikes', 'PostLikeController');

            Route::get('postLikes/{id}/delete', [
                'as' => 'postLikes.delete',
                'uses' => 'PostLikeController@destroy',
            ]);


            Route::resource('iwomenPostLikes', 'IwomenPostLikeController');

            Route::get('iwomenPostLikes/{id}/delete', [
                'as' => 'iwomenPostLikes.delete',
                'uses' => 'IwomenPostLikeController@destroy',
            ]);


            Route::resource('apks', 'ApkController');

            Route::get('apks/{id}/delete', [
                'as' => 'apks.delete',
                'uses' => 'ApkController@destroy',
            ]);


            Route::resource('emails', 'EmailController');

            Route::get('emails/{id}/delete', [
                'as' => 'emails.delete',
                'uses' => 'EmailController@destroy',
            ]);

            Route::resource('shareUsers', 'ShareUserController');

            Route::get('shareUsers/{id}/delete', [
                'as' => 'shareUsers.delete',
                'uses' => 'ShareUserController@destroy',
            ]);


        });

    });


Route::resource('pointPrices', 'PointPriceController');

Route::get('pointPrices/{id}/delete', [
    'as' => 'pointPrices.delete',
    'uses' => 'PointPriceController@destroy',
]);
