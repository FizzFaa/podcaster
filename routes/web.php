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
Route::group(['middleware'=>['verified','auth']],function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile', [App\Http\Controllers\AdminController::class,'manageprofile'])->name('profile');
    Route::post('/profile', [App\Http\Controllers\AdminController::class,'updateprofile'])->name('updateprofile');
    Route::get('/categories', [App\Http\Controllers\CategoryController::class,'index'])->name('categories');
    Route::get('category-delete/{id}',[App\Http\Controllers\CategoryController::class,'destroy'])->name('category-delete');
    Route::get('category-edit/{id}',[App\Http\Controllers\CategoryController::class,'edit'])->name('category-edit');
    Route::post('category-edit/{id}', [App\Http\Controllers\CategoryController::class,'update'])->name('categoy-edit');
    Route::post('category-add', [App\Http\Controllers\CategoryController::class,'store'])->name('categoy-add');
    Route::get('/category-add', [App\Http\Controllers\CategoryController::class,'create'])->name('category-add');
    Route::get('/posts', [App\Http\Controllers\BlogController::class,'index'])->name('posts');
    Route::get('/podcasts', [App\Http\Controllers\PodcastController::class,'index'])->name('podcasts');
    Route::get('/events', [App\Http\Controllers\EventsController::class,'index'])->name('events');
    Route::get('/videos', [App\Http\Controllers\VideoController::class,'index'])->name('videos');
	
});

