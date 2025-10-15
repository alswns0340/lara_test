<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Layered\UserController as LayeredUserController;
use App\Http\Actions\UserIndexAction;
use App\Http\Controllers\TestRequestController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/register', [App\Http\Controllers\RegisterController::class, 'create'])
    ->middleware('guest')
    ->name('register');
Route::post('/register', [App\Http\Controllers\RegisterController::class, 'store'])
    ->middleware('guest');
Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])
    ->middleware('guest')
    ->name('login');
Route::post('/login', [App\Http\Controllers\LoginController::class, 'authenticate'])
    ->middleware('guest');
Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');
Route::get('/user',[UserController::class,'index']);
Route::post('/user',[UserController::class,'store']);

Route::get('/users', UserIndexAction::class);

Route::get('/layered/user/{id}',[LayeredUserController::class,'index']);

Route::get('/request-test', [TestRequestController::class, 'create'])->name('reqest.create');

Route::post('/request-test', [TestRequestController::class, 'store'])->name('request.store');

Route::prefix('response-demo')->name('response-demo.')->group(function () {
    Route::get('/string', [\App\Http\Controllers\ResponseDemoController::class, 'string'])->name('string');
    Route::get('/view', [\App\Http\Controllers\ResponseDemoController::class, 'view'])->name('view');
    Route::get('/json', [\App\Http\Controllers\ResponseDemoController::class, 'json'])->name('json');
    Route::get('/download', [\App\Http\Controllers\ResponseDemoController::class, 'download'])->name('download');
    Route::get('/redirect', [\App\Http\Controllers\ResponseDemoController::class, 'redirect'])->name('redirect');
    Route::get('/rediret-target', [\App\Http\Controllers\ResponseDemoController::class, 'redirectTarget'])->name('redirect-target');
});