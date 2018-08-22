<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/blog/get', 'PostsController@getAllPosts');

Route::get('/post/edit/{id}', 'PostsController@singlePostShow');

Route::post('/post/store', 'PostsController@saveChanges');

Route::post('/post/create', 'PostsController@store');

Route::post('/post/delete', 'PostsController@delete');
