<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
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


/* ---------- Start of Auth middleware ---------- */

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@index')->name('home');
    
    /* ---------- Start of Posts routes ---------- */

    Route::get('/posts', [PostsController::class, 'index']);
    Route::get('/posts/create', [PostsController::class, 'create']);
    Route::post('/posts', [PostsController::class, 'store']);
    Route::delete('/posts/{post}', [PostsController::class, 'destroy']);
    Route::get('/posts/trash', [PostsController::class, 'trash']);
    Route::delete('/posts/trash/{post}', [PostsController::class, 'destroyPermanetly']);
    Route::post('/posts/restore/{post}', [PostsController::class, 'restoredPost']);
    Route::get('/posts/{post}', [PostsController::class, 'edit']);
    Route::put('/posts/{post}', [PostsController::class, 'update']);

    /* ---------- End of Posts routes ---------- */

    /* ---------- Start of Categories routes ---------- */
    
    Route::get('/categories', [CategoriesController::class, 'index']);
    Route::get('/categories/create', [CategoriesController::class, 'create']);
    Route::post('/categories', [CategoriesController::class, 'store']);
    Route::get('/categories/{category}', [CategoriesController::class, 'edit']);
    Route::put('/categories/{category}', [CategoriesController::class, 'update']);
    Route::delete('/categories/{category}', [CategoriesController::class, 'destroy']);

    /* ---------- End of Categories routes ---------- */

    /* ---------- Start of Tags routes ---------- */
    
    Route::get('/tags', [TagsController::class, 'index']);
    Route::get('/tags/create', [TagsController::class, 'create']);
    Route::post('/tags', [TagsController::class, 'store']);
    Route::get('/tags/{tag}', [TagsController::class, 'edit']);
    Route::put('/tags/{tag}', [TagsController::class, 'update']);
    Route::delete('/tags/{tag}', [TagsController::class, 'destroy']);

    /* ---------- End of Tags routes ---------- */

    /* ---------- Start of Users routes ---------- */
    
    Route::get('/users', [UsersController::class, 'index']);
    Route::get('/users/create', [UsersController::class, 'create']);
    Route::post('/users', [UsersController::class, 'store']);

    /* ---------- End of Users routes ---------- */
});

/* ---------- End of Auth middleware ---------- */
