<?php

use App\Models\Post;
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
    $posts = Post::all();
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

Route::get('/n', function () {
    $user = new \App\Models\User();
    $user->name = 'Maide';
    $user->email = 'maide.akdede@student.hepl.be';
    $user->password = \Illuminate\Support\Facades\Hash::make('maide');

    $user->save();

    $user->email = 'maide.akdede@student.hepl.be';
    $user->save();
    return \App\Models\User::findOrFail(1);
});
