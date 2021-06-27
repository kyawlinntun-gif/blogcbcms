<?php

use App\Http\Controllers\PostsController;
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

    Route::get('/posts/create', [PostsController::class, 'create']);
    Route::post('/posts', [PostsController::class, 'store']);

    /* ---------- End of Posts routes ---------- */
});

/* ---------- End of Auth middleware ---------- */
