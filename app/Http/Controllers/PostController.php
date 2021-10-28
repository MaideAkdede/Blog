<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use http\Client\Response;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

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
        return view('/posts.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required|max:255',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => 'required', Rule::exists('categories', 'id'),
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['slug'] = Str::slug($attributes['title']);
        $attributes['published_at'] = now('Europe/Brussels');

        $post = Post::create($attributes);

        return redirect('/posts/' . $post->slug)->with('success', 'Your post has been created and is now published');
    }
}
