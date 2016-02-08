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

Route::resource("posts", "PostAPIController");

Route::resource("tlgProfiles", "TlgProfileAPIController");

Route::resource("authors", "AuthorAPIController");

Route::resource("resources", "ResourcesAPIController");

Route::resource("iwomenPosts", "IwomenPostAPIController");

Route::resource("iwomenPosts", "IwomenPostAPIController");

Route::resource("subResourceDetails", "SubResourceDetailAPIController");

Route::resource("comments", "CommentAPIController");

Route::resource("sisterDownloadApps", "SisterDownloadAppAPIController");

Route::resource("stickerStores", "StickerStoreAPIController");

Route::resource("users", "UserAPIController");

Route::resource("categories", "CategoryAPIController");

Route::resource("calendars", "CalendarAPIController");