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
/*
3 routes affiches la listes d'articles
- users, posts, categories
- changer titre en fonction de ce qui sera afficher
*/
Route::get('/posts', function () {
    return view('posts');
});
/*
 * Lien ALLvoir tout les posts
 * remplacer intituler de la class courante
- garder trace categorie courante
-afficher cat
- bouton liste toute catégorie
// ALL pots dans les options
afficher que l'item est selct
*/
Route::get('/', function () {
    // Home Page
    $posts = Post::latest('published_at')->with('category', 'user')->get();
    // Variables
    // $categories = all();
    $categories = Category::whereHas('posts')->orderBy('name')->get();
    $users = User::whereHas('posts')->orderBy('name')->get();
    //
    return view('posts', [
        'posts' => $posts,
        'categories' => $categories,
        'users' => $users,
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
    $categories = Category::whereHas('posts')->orderBy('name')->get();
    $users = User::whereHas('posts')->orderBy('name')->get();
    //
    $posts = $category->posts;
    $posts->load('category', 'user');
    $page_title = "Category : {$category->name}";
    //
    $currentCategory = $category;
    return view('posts', compact('categories', 'users', 'posts', 'category', 'currentCategory', 'page_title'));
});

Route::get('/users/', function () {
    $users = User::all();

    return view('/users', [
        'users' => $users,
        'page_title' => 'All Users'
    ]);
});

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
