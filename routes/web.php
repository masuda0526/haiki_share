<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/test', [\App\Http\Controllers\Base\BaseUserPageController::class, 'index'])->name('test');

// Api
Route::get('/api/area', [App\Http\Controllers\Api\ApiController::class, 'getAreas'])->name('api.getAreas');

// UserPage
Route::get('/ulogin', [\App\Http\Controllers\UserPage\ULoginController::class, 'index'])->name('ulogin.index');
Route::post('/ulogin', [\App\Http\Controllers\UserPage\ULoginController::class, 'login'])->name('ulogin.login');
Route::get('/usignup', [\App\Http\Controllers\UserPage\USignupController::class, 'index'])->name('usignup.index');
Route::post('/usignup', [\App\Http\Controllers\UserPage\USignupController::class, 'signup'])->name('usignup.signup');
Route::get('/umypage', [\App\Http\Controllers\UserPage\UMypageController::class, 'index'])->name('umypage.index');
