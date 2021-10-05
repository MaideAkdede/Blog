<?php

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

Route::get('/posts', function () {
    return view('posts');
});

Route::get('/', function () {
    //$posts = Post::all();
    $posts = Post::with('category', 'user')->get();
    return view('posts', [
        'posts' => $posts,
        'page_title' => 'La liste des posts'
    ]);
});

Route::get('/posts/{post:slug}', function (Post $post) {

    //$post = Post::where('slug', $slug)->firstOrFail();
    $page_title = "Le post : {$post->title}";
    return view('post', compact('post', 'page_title'));
});

Route::get('/categories/', function () {
    $categories = Category::all();

    return view('categories', [
        'categories' => $categories,
        'page_title' => 'All categories'
    ]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    $page_title = "Category : {$category->name}";
    return view('category', compact('category', 'page_title'));
});

Route::get('/users/', function () {
    $users = User::all();

    return view('/users', [
        'users' => $users,
        'page_title' => 'All Users'
    ]);
});

Route::get('/users/{user:slug}', function (User $user) {
    $user->load('posts.category');
    $page_title = "User : {$user->name}";

    return view('user', compact('user', 'page_title'));
});
