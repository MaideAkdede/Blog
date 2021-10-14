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

Route::get('/posts', function () {
    return view('posts');
});

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories/', function () {
    $categories = Category::all();

    return view('categories', [
        'categories' => $categories,
        'page_title' => 'All categories'
    ]);
});
Route::get('/users/', function () {
    $users = User::all();

    return view('/users', [
        'users' => $users,
        'page_title' => 'All Users'
    ]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    $categories = Category::whereHas('posts')->orderBy('name')->get();
    $users = User::whereHas('posts')->orderBy('name')->get();
    //
    $posts = $category->posts;
    $posts->load('category', 'user');
    $page_title = "Category : {$category->name}";
    //
    $currentCategory = $category;
    return view('posts', compact('categories', 'users', 'posts', 'category', 'currentCategory', 'page_title'));
})->name('single-category');

Route::get('/users/{user:slug}', function (User $user) {
    $categories = Category::whereHas('posts')->orderBy('name')->get();
    $users = User::whereHas('posts')->orderBy('name')->get();
    //
    $posts = $user->posts;
    $user->load('posts.category');
    $posts->load('user');
    $page_title = "User : {$user->name}";

    return view('posts', compact('categories', 'users', 'posts', 'user', 'page_title'));
});
