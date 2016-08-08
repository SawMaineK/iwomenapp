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

Route::get("searchPosts", "PostAPIController@search");

Route::resource("tlgProfiles", "TlgProfileAPIController");

Route::resource("authors", "AuthorAPIController");

Route::post("authorUpload", "AuthorAPIController@authorUploadImage");

Route::resource("resources", "ResourcesAPIController");

Route::resource("iwomenPosts", "IwomenPostAPIController");

Route::get("searchIwomenPost", "IwomenPostAPIController@search");

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

Route::resource("avators", "AvatorAPIController");

Route::resource("postLikes", "PostLikeAPIController");

Route::resource("iwomenPostLikes", "IwomenPostLikeAPIController");

Route::post("post/like/check", "PostLikeAPIController@chkUserLike");

Route::post("iwomenPost/like/check", "IwomenPostLikeAPIController@chkUserLike");

Route::resource("apks", "ApkAPIController");

Route::resource("emails", "EmailAPIController");

Route::resource("shareUsers", "ShareUserAPIController");

Route::resource("pointPrices", "PointPriceAPIController");

Route::resource("subResourceDetailLikes", "SubResourceDetailLikeAPIController");

Route::post("subResourceDetailLikes/check", "SubResourceDetailLikeAPIController@chkUserLike");

Route::resource("resourceLikes", "ResourceLikeAPIController");

Route::post("resourceLikes/check", "ResourceLikeAPIController@chkUserLike");

Route::get("iwomenPost/weekContent", "IwomenPostAPIController@thisContent");

Route::get("resourcesWeekContents", "ResourcesAPIController@thisWeekContent");

Route::post("share/{id}", "PostAPIController@share");