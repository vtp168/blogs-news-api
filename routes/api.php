<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\PostImageController;
use App\Http\Controllers\API\TagController;
use App\Http\Controllers\API\UserController;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('posts', PostController::class);

    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('tags', TagController::class);
    Route::apiResource('users', UserController::class);

    //delete Images
    Route::delete('/post-images/{id}', [PostImageController::class, 'destroy']);
    //active and publish post
    Route::put('/posts/{id}/publish', [PostController::class, 'togglePublish']);

    Route::patch('/posts/active/{id}',[PostController::class, 'active_post']);
    Route::delete('/posts/delete_post/{id}', [PostController::class, 'deletePost']);

});

// Move meta route outside the auth group for consistency
Route::get('/articles/meta', [PostController::class, 'meta']);

Route::get('/articles/category/{slug}', [PostController::class, 'getPostsByCategorySlug']);
Route::get('/articles', [PostController::class, 'articles']);
Route::get('/articles/{id}', [PostController::class, 'show']);
Route::post('/posts/upload', [PostController::class, 'upload']);
Route::post('/posts/test_upload', [PostController::class, 'upload_images']);


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test-api',function () {
    return response()->json([
        'message' => 'Welcome to the Blog API',
        'status' => 'success'
    ]);

});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::post('/login', [AuthController::class, 'login']);

Route::apiResource('categories', CategoryController::class)->except(['create', 'edit']);
Route::apiResource('tags', TagController::class)->except(['create', 'edit']);
