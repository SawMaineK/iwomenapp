<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where all API routes are defined.
|
*/

Route::get("postCounts/{user_id}", "PostAPIController@getPostCount");

Route::post("file/imageUpload", "PostAPIController@postUploadImage");

Route::post("file/audioUpload", "PostAPIController@postUploadAudio");

Route::post("file/videoUpload", "PostAPIController@postUploadVideo");

Route::post("usersUpload", "UserAPIController@postUploadImage");

Route::post("login", "UserAPIController@login");

Route::get("checkRole/{id}", "UserAPIController@checkRole");

Route::resource("posts", "PostAPIController");

Route::resource("tlgProfiles", "TlgProfileAPIController");

Route::resource("authors", "AuthorAPIController");

Route::resource("resources", "ResourcesAPIController");

Route::resource("iwomenPosts", "IwomenPostAPIController");

Route::resource("iwomenPosts", "IwomenPostAPIController");

Route::resource("comments", "CommentAPIController");

Route::resource("sisterDownloadApps", "SisterDownloadAppAPIController");

Route::resource("stickerStores", "StickerStoreAPIController");

Route::resource("users", "UserAPIController");

Route::resource("categories", "CategoryAPIController");

Route::resource("calendars", "CalendarAPIController");

Route::get("dates", "CalendarAPIController@getCalendarDate");

Route::get("events", "CalendarAPIController@getEvent");

Route::resource("roles", "RoleAPIController");

Route::resource("gcms", "GcmAPIController");

Route::resource("gcmMessages", "GcmMessageAPIController");

Route::resource("subResourceDetails", "SubResourceDetailAPIController");

Route::resource("mutipleQuestions", "MutipleQuestionAPIController");

Route::resource("mutipleOptions", "MutipleOptionAPIController");

Route::resource("mutipleAnswers", "MutipleAnswerAPIController");