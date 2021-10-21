<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
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

Route::get('/register',
    [RegisterController::class, 'create'])
    ->middleware('guest');
Route::post('/register',
    [RegisterController::class, 'store'])
    ->middleware('guest');
// seul un utilisateur authentifié peut se Log Out
Route::post('/logout',
    [SessionController::class, 'destroy'])
    ->middleware('auth');
// Afficher formulaire de Login qui n'est accessible que au utilisateur non connecté
Route::get('/login',
    [SessionController::class, 'create'])
    ->middleware('guest');
//
Route::post('/sessions',
    [SessionController::class, 'store'])
    ->middleware('guest');

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
