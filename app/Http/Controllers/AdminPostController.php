<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50)
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required|max:255',
            'excerpt' => 'required',
            'body' => 'required',
            'slug' => 'required',
            'thumbnail', 'image',
            'category_id' => 'required', Rule::exists('categories', 'id'),
        ]);
        //update thumbnail path
        $attributes['thumbnail'] = request()->file('thumbnail')?->store('thumbnails');
        //unset($attributes['thumbnail']);

        $attributes['user_id'] = auth()->id();
        $attributes['published_at'] = now('Europe/Brussels');

        $post = Post::create($attributes);
        return redirect('/posts/' . $post->slug)->with('success', 'Your post has been created and is now published');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $attributes = request()->validate([
            'title' => 'required|max:255',
            'excerpt' => 'required',
            'body' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'thumbnail', 'image',
            'category_id' => 'required', Rule::exists('categories', 'id'),
        ]);
        if (isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')?->store('thumbnails');
        }
        $post->update($attributes);
        return back()->with('success', 'Post successfully updated!');
    }
}
