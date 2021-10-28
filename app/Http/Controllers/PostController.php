<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use http\Client\Response;

class PostController extends Controller
{
    public function index()
    {

        $users = User::whereHas('posts')->orderBy('name');
        $filters = request()->only('search', 'category', 'user');

        return view('posts.index', [
            'posts' => Post::filter($filters)
                ->latest('published_at')
                ->with('category', 'user')
                ->paginate(9)
                ->withQueryString(),
            'users' => $users->get(),
            'page_title' => 'La liste des posts',
        ]);
    }

    public function show(Post $post)
    {
        $page_title = "Le post : {$post->title}";
        return view('posts.show', compact('post', 'page_title'));
    }

    public function create()
    {
        if (auth()->guest()){
            abort(\Illuminate\Http\Response::HTTP_FORBIDDEN);
        }
        if (auth()->user() != ''){
            abort(\Illuminate\Http\Response::HTTP_FORBIDDEN);
        }
        return view('/posts.create');
    }
}
