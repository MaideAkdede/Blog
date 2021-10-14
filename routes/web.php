<?php

use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/posts/{post:slug}', [PostController::class, 'show']);

/*Route::get('/users/{user:slug}', function (User $user) {
    $categories = Category::whereHas('posts')->orderBy('name')->get();
    $users = User::whereHas('posts')->orderBy('name')->get();
    //
    $posts = $user->posts;
    $user->load('posts.category');
    $posts->load('user');
    $page_title = "User : {$user->name}";

    return view('posts.index', compact('categories', 'users', 'posts', 'user', 'page_title'));
});*/
