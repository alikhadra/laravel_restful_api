<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => '/v1' ,'middleware' => 'auth.basic.once' ], function () {

    // Route::apiResource('lessons', LessonController::class);
    // Route::apiResource('users'  , UserController::class);
    // Route::apiResource('tags'   , TagController::class);

    Route::apiResource('lessons', 'API\LessonController');
    Route::apiResource('users',   'API\UserController');
    Route::apiResource('tags',    'API\TagController');

Route::any('lesson', function () {
    $message = "Please make sure to update your code to use the newer version of our API.
    You should use lessons instead of lesson";

    return response()->json(
        ['data' => $message,
        'link' => url('documentation/api'),
        ] , 404 );
});
    // Route::redirect('lesson', 'lessons');

    // Route::get('users/{id}/lesson', [RelationshipController::class, 'userLessons']);
    // Route::get('lessons/{id}/tags', [RelationshipController::class, 'lessonTags']);
    // Route::get('tags/{id}/lessons', [RelationshipController::class, 'tagLessons']);

    Route::get('users/{id}/lessons', 'API\RelationshipController@userLessons');
    Route::get('lessons/{id}/tags', 'API\RelationshipController@LessonTags');
    Route::get('tags/{id}/lessons', 'API\RelationshipController@tagLessons');
    Route::get('/login', 'API\LoginController@login')->name('login');

});
