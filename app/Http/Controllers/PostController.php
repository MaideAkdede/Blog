<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {

        $users = User::whereHas('posts')->orderBy('name');
        $filters = request()->only('search', 'category', 'user');

        /* if (request('search')) {
             $posts
                 ->where('title', 'like', '%' . request('search') . '%')
                 ->orWhere('excerpt', 'like', '%' . request('search') . '%')
                 ->orWhere('body', 'like', '%' . request('search') . '%');
         }*/
        return view('posts.index', [
            'posts' => Post::filter($filters)->latest('published_at')->with('category', 'user')->get(),
            'users' => $users->get(),
            'page_title' => 'La liste des posts',
        ]);

    }

    public function show(Post $post)
    {
        $page_title = "Le post : {$post->title}";
        return view('posts.show', compact('post', 'page_title'));
    }
}
