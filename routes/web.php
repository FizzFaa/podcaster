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
    Auth::routes();

Auth::routes(['verify'=>true]);
 

Route::group(['middleware'=>['verified','auth'], 'prefix'=>'admin'],function(){


    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile', [App\Http\Controllers\AdminController::class,'manageprofile'])->name('profile');
    Route::post('/profile', [App\Http\Controllers\AdminController::class,'updateprofile'])->name('updateprofile');
   //categories routes
    Route::get('/categories', [App\Http\Controllers\CategoryController::class,'index'])->name('categories');
    Route::get('category-delete/{id}',[App\Http\Controllers\CategoryController::class,'destroy'])->name('category-delete');
    Route::get('category-edit/{id}',[App\Http\Controllers\CategoryController::class,'edit'])->name('category-edit');
    Route::post('category-edit/{id}', [App\Http\Controllers\CategoryController::class,'update'])->name('categoy-edit');
    Route::post('category-add', [App\Http\Controllers\CategoryController::class,'store'])->name('categoy-add');
    Route::get('/category-add', [App\Http\Controllers\CategoryController::class,'create'])->name('category-add');
    //end categories routes
    //blog routes
    Route::get('/blogs', [App\Http\Controllers\BlogController::class,'getBlogs'])->name('blogs');
    Route::get('blog-delete/',[App\Http\Controllers\BlogController::class,'destroy'])->name('blog-delete');
    Route::get('blog-edit/',[App\Http\Controllers\BlogController::class,'edit'])->name('blog-edit');
    Route::post('blog-edit/', [App\Http\Controllers\BlogController::class,'update'])->name('blog-edit-post');
    Route::post('blog-add', [App\Http\Controllers\BlogController::class,'store'])->name('blog-add');
    Route::get('/blog-add', [App\Http\Controllers\BlogController::class,'addBlog'])->name('blog-add');
    //end blog routes
     //Video routes
    Route::get('/videos', [App\Http\Controllers\VideoController::class,'getVideos'])->name('videos');
    Route::get('video-delete/',[App\Http\Controllers\VideoController::class,'destroy'])->name('video-delete');
    Route::get('video-edit/',[App\Http\Controllers\VideoController::class,'edit'])->name('video-edit');
    Route::post('video-edit/', [App\Http\Controllers\VideoController::class,'update'])->name('video-edit-post');
    Route::post('video-add', [App\Http\Controllers\VideoController::class,'store'])->name('video-add');
    Route::get('/video-add', [App\Http\Controllers\VideoController::class,'addVideo'])->name('video-add');
    //end Video routes
    
    //Podcasts routes
    Route::get('/podcasts', [App\Http\Controllers\PodcastController::class,'getPodcasts'])->name('podcasts');
    Route::get('podcast-delete/',[App\Http\Controllers\PodcastController::class,'destroy'])->name('podcast-delete');
    Route::get('podcast-edit/',[App\Http\Controllers\PodcastController::class,'edit'])->name('podcast-edit');
    Route::post('podcast-edit/', [App\Http\Controllers\PodcastController::class,'update'])->name('podcast-edit-post');
    Route::post('podcast-add', [App\Http\Controllers\PodcastController::class,'store'])->name('podcast-add');
    Route::get('/podcast-add', [App\Http\Controllers\PodcastController::class,'addPodcast'])->name('podcast-add');
    //Podcasts Video routes
   
    
    Route::get('/events', [App\Http\Controllers\EventsController::class,'index'])->name('events');
    
    
	
});
Route::post('cke', [App\Http\Controllers\EventsController::class,'store'])->name('cke');
//Routes Front End
Route::get('/', [App\Http\Controllers\BlogController::class, 'index'])->name('user.home');
Route::group(['prefix'=>'user'],function(){
Route::get('/', [App\Http\Controllers\BlogController::class, 'index'])->name('user.home');
Route::get('/videos', [App\Http\Controllers\VideoController::class, 'index'])->name('user.videos');
Route::get('/podcasts', [App\Http\Controllers\PodcastController::class, 'index'])->name('user.audios');
Route::get('/post-details/', [App\Http\Controllers\BlogController::class, 'create'])->name('posts.details');
Route::get('/post-details-videos/', [App\Http\Controllers\VideoController::class, 'create'])->name('posts.details.videos');
Route::get('/post-details-podcast/', [App\Http\Controllers\PodcastController::class, 'create'])->name('posts.details.audios');
Route::get('/popular/{id}', [App\Http\Controllers\BlogController::class, 'popularPosts'])->name('popular.details');
Route::get('/getprevioustitle', [App\Http\Controllers\BlogController::class, 'prev'])->name('posts.prev');
Route::get('/getnexttitle', [App\Http\Controllers\BlogController::class, 'next'])->name('posts.next');

Route::get('/popularposts', [App\Http\Controllers\BlogController::class, 'getPopularPosts'])->name('post.popular');

});