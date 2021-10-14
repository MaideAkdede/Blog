<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        // Home Page
        //$posts = Post::latest('published_at')->with('category', 'user');
        $categories = Category::whereHas('posts')->orderBy('name');
        $users = User::whereHas('posts')->orderBy('name');

        /* if (request('search')) {
             $posts
                 ->where('title', 'like', '%' . request('search') . '%')
                 ->orWhere('excerpt', 'like', '%' . request('search') . '%')
                 ->orWhere('body', 'like', '%' . request('search') . '%');
         }*/
        return view('posts', [
            'posts' => Post::filter(request(['search']))->latest('published_at')->with('category', 'user')->get(),
            'categories' => $categories->get(),
            'users' => $users->get(),
            'page_title' => 'La liste des posts'
        ]);

    }

    public function show(Post $post)
    {
        $page_title = "Le post : {$post->title}";
        return view('post', compact('post', 'page_title'));
    }
}
