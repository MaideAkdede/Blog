<?php

use App\Models\Post;
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

Route::get('/posts', function () {
    return view('posts');
});

Route::get('/', function () {
    return view('posts');
});

Route::get('/posts/{post}', function ($slug) {
    $post = Post::find($slug);
    return view('post', compact('post'));
})->where('post', '[A-z_\-]+');
