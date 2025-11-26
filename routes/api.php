<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\API\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/users/{user}',function(){})->name('api.users.show');
Route::get('/comments/{comment}',function(){})->name('api.comments.show');

Route::apiResource('articles', ArticleController::class)->names('api.articles');
Route::post('/publishers', [PublisherController::class, 'store']);

Route::middleware('auth:sanctum')->get('/user',function(Request $request){
    return $request->user();
});

Route::group([
        'middleware'=>'api',
        'prefix'=>'auth'
],function($router){
    Route::post('login',[AuthController::class,'login']);
    Route::post('logout',[AuthController::class,'logout']);
    Route::post('refresh',[AuthController::class,'refresh']);
    Route::get('me',[AuthController::class,'me']);
    });