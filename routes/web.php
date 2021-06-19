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
 
Auth::routes();
Auth::routes(['verify'=>true]);
// Route::group(['middleware'=>['verified']],function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile', [App\Http\Controllers\AdminController::class,'manageprofile'])->name('profile');
    Route::get('/categories', [App\Http\Controllers\AdminController::class,'manageprofile'])->name('categories');
    Route::get('/posts', [App\Http\Controllers\AdminController::class,'manageprofile'])->name('posts');
    Route::get('/podcasts', [App\Http\Controllers\AdminController::class,'manageprofile'])->name('podcasts');
    Route::get('/events', [App\Http\Controllers\AdminController::class,'manageprofile'])->name('events');
    Route::get('/videos', [App\Http\Controllers\AdminController::class,'manageprofile'])->name('videos');
	Route::post('/profile', [App\Http\Controllers\AdminController::class,'updateprofile'])->name('updateprofile');
// });

