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
Route::get('/api/category', [App\Http\Controllers\Api\ApiController::class, 'getCategories'])->name('api.getCategories');
Route::get('/api/header', [App\Http\Controllers\Api\ApiController::class, 'getHeader'])->name('api.header');

// Normal
Route::get('/list', [\App\Http\Controllers\Normal\ListController::class, 'index'])->name('list');
Route::get('/pdetail/{productId}', [\App\Http\Controllers\Normal\ProductDetailController::class, 'index'])->name('pdetail.index');
Route::get('/pdetail/cancel/{productId}', [\App\Http\Controllers\Normal\ProductDetailController::class, 'cancel'])->name('pdetail.cancel');


// UserPage
Route::get('/ulogin', [\App\Http\Controllers\UserPage\ULoginController::class, 'index'])->name('ulogin.index');
Route::post('/ulogin', [\App\Http\Controllers\UserPage\ULoginController::class, 'login'])->name('ulogin.login');
Route::get('/usignup', [\App\Http\Controllers\UserPage\USignupController::class, 'index'])->name('usignup.index');
Route::post('/usignup', [\App\Http\Controllers\UserPage\USignupController::class, 'signup'])->name('usignup.signup');
Route::get('/uremind', [\App\Http\Controllers\UserPage\UPassReminderController::class, 'index'])->name('uremind.index');
Route::post('/uremind', [\App\Http\Controllers\UserPage\UPassReminderController::class, 'change'])->name('uremind.change');
Route::middleware(['check.login.user'])->group(function(){
    Route::get('/ulogout', [\App\Http\Controllers\UserPage\ULoginController::class, 'logout'])->name('ulogin.logout');
    Route::get('/umypage', [\App\Http\Controllers\UserPage\UMypageController::class, 'index'])->name('umypage.index');
    Route::get('/uedit', [\App\Http\Controllers\UserPage\UEditController::class, 'index'])->name('uedit.index');
    Route::post('/uedit', [\App\Http\Controllers\UserPage\UEditController::class, 'update'])->name('uedit.update');
    Route::get('/buy/{productId}', [\App\Http\Controllers\Normal\ProductDetailController::class, 'buy'])->name('pdetail.buy');
});

// ShopPage
Route::get('/slogin', [\App\Http\Controllers\ShopPage\SLoginController::class, 'index'])->name('slogin.index');
Route::post('/slogin', [\App\Http\Controllers\ShopPage\SLoginController::class, 'login'])->name('slogin.login');
Route::get('/ssignup', [\App\Http\Controllers\ShopPage\SSignupController::class, 'index'])->name('ssignup.index');
Route::post('/ssignup', [\App\Http\Controllers\ShopPage\SSignupController::class, 'signup'])->name('ssignup.signup');
Route::get('/sremind', [\App\Http\Controllers\ShopPage\SPassReminderController::class, 'index'])->name('sremind.index');
Route::post('/sremind', [\App\Http\Controllers\ShopPage\SPassReminderController::class, 'change'])->name('sremind.change');
Route::middleware(['check.login.employer'])->group(function(){
    Route::get('/slogout', [\App\Http\Controllers\ShopPage\SLoginController::class, 'logout'])->name('slogin.logout');
    Route::get('/smypage', [\App\Http\Controllers\ShopPage\SMypageController::class, 'index'])->name('smypage.index');
    Route::get('/editshop', [\App\Http\Controllers\ShopPage\SEditShopController::class, 'index'])->name('editshop.index');
    Route::post('/editshop', [\App\Http\Controllers\ShopPage\SEditShopController::class, 'update'])->name('editshop.update');
    Route::get('/pregist', [\App\Http\Controllers\ShopPage\SProductRegistController::class, 'index'])->name('pregist.index');
    Route::post('/pregist', [\App\Http\Controllers\ShopPage\SProductRegistController::class, 'regist'])->name('pregist.regist');
    Route::get('/pedit/{productId}', [\App\Http\Controllers\ShopPage\SProductEditController::class, 'index'])->name('pedit.index');
    Route::post('/pedit/{productId}', [\App\Http\Controllers\ShopPage\SProductEditController::class, 'submit'])->name('pedit.submit');
    Route::get('/addemployer', [\App\Http\Controllers\ShopPage\SAddEmployerController::class, 'index'])->name('addemployer.index');
    Route::post('/addemployer', [\App\Http\Controllers\ShopPage\SAddEmployerController::class, 'add'])->name('addemployer.add');
    Route::get('/editemployer/{employerId}', [\App\Http\Controllers\ShopPage\SEditEmployerController::class, 'index'])->name('editemployer.index');
    Route::post('/editemployer', [\App\Http\Controllers\ShopPage\SEditEmployerController::class, 'edit'])->name('editemployer.edit');
    Route::get('/slist/nowsale', [\App\Http\Controllers\ShopPage\SProductListController::class, 'nowsale'])->name('slist.nowsale');
    Route::get('/slist/sold', [\App\Http\Controllers\ShopPage\SProductListController::class, 'sold'])->name('slist.sold');
});
